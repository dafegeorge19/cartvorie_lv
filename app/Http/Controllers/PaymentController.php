<?php

namespace App\Http\Controllers;

use App\Address;
use App\Order;
use App\OrderItem;
use App\Product;
use App\Session;
use App\State;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PaymentHelpers;
use Illuminate\Support\Facades\Hash;

class PaymentController extends Controller
{
    public function checkout()
    {
        return view('customer.checkout');
    }

    public function init_payment(Request $request)
    {
        $total_amount = 0;
        $total_weight = 0;
        $data = [];

        if ($request->session()->exists('cart')) {
            
            $cart = $request->session()->get('cart');

            
            if($cart == null) {// if some reason the cart is null then return empty result to Ajax request
                return response()->json();
            }

            foreach($cart as $product_id => $quantity) {

                $product = Product::find($product_id);

                if($product) {
                    $product_weight = $product->weight;
                    $product_price  = $product->product_price();
                    $product_price  = str_replace(',', '', $product_price);

                    $total_product_amount  = $product_price * $quantity;
                    $total_product_weight  = $product_weight * $quantity;
                    $total_amount         += $total_product_amount;
                    $total_weight         += $total_product_weight;
                }
                

            }

            $payment_helpers = new PaymentHelpers;
            $delivery_fee     = $payment_helpers->calc_delivery_fee($total_weight);

            $pk_key   = 'pk_test_8fbd0de67e651cbeb4cf803230616ef40a728e2d';
            $amount   = $total_amount + $delivery_fee;
            $currency = 'NGN';

            $data['pk_key']       = $pk_key;
            $data['amount']       = round($amount * 100);
            $data['currency']     = $currency;
            $data['total_amount'] = $total_amount;
            $data['delivery_fee'] = $delivery_fee;
            $data['total_weight'] = $total_weight;

            return response()->json($data);

        } else {
            return response()->json();
        }

    }

    public function get_state_areas (Request $request) {

        if($request->ajax()){

            $state_id = $request->id;

            if($state_id) {
                $state = State::find($state_id);

                if($state) {
                    $state_areas = $state->areas;
                    return response()->json($state_areas);
                }
            }

            return response()->json();
            
        }
    }

    public function get_user_addresses()
    {
        $data      = [];
        $counter   = 0;
        $addresses = Auth::user()->addresses->sortByDesc('created_at');

        if($addresses) {

            foreach($addresses as $address) {
                $state          = $address->state->name;
                $area           = $address->area->name;
                $street_address = $address->street_address;

                $data[$counter]['id']      = $address->id;
                $data[$counter]['address'] = $street_address . ', ' . $area . ', ' . $state;
                $counter++;

            }
            return response()->json($data);
        }

        return response()->json();
        
    }

    public function store_order(Request $request)
    {

        $paystack_payment_ref   = $request->paystack_payment_ref;
        $payment_type           = $request->payment_type;
        $total_products_amount  = $request->total_products_amount;
        $delivery_fee           = $request->delivery_fee;
        $total_products_weight  = $request->total_products_weight;
        $delivery_shipping_info = $request->delivery_shipping_info;

        // first check if the user request to create a new account
        
        if((int) $delivery_shipping_info['create_account']) {

            // then create account for the user using billing details to fill the user's fields
            $email          = $delivery_shipping_info['billing_email'];
            $password       = $delivery_shipping_info['account_password'];
            $hased_password = Hash::make($password);

            $create_user = new User();
            $create_user->first_name        = $delivery_shipping_info['billing_first_name'];
            $create_user->other_names       = $delivery_shipping_info['billing_other_names'];
            $create_user->phone_number      = $delivery_shipping_info['billing_phone_number'];
            $create_user->email             = $delivery_shipping_info['billing_email'];
            $create_user->email_verified_at = now();
            $create_user->role              = 'customer';
            $create_user->password          = $hased_password;

            if($create_user->save()) { //if the user is successfuly cretaed the log the user in
                Auth::attempt(['email' => $email, 'password' => $password], true);
            }

        }

        $order = new Order();

        if(Auth::user()) {
            $order->user_id = Auth::user()->id;
        }

        $order->billing_first_name     = $delivery_shipping_info['billing_first_name'];
        $order->billing_other_names    = $delivery_shipping_info['billing_other_names'];
        $order->billing_state_id       = $delivery_shipping_info['billing_state'];
        $order->billing_area_id        = $delivery_shipping_info['billing_area'];
        $order->billing_street_address = $delivery_shipping_info['billing_street_address'];
        $order->billing_phone_number   = $delivery_shipping_info['billing_phone_number'];
        $order->billing_email          = $delivery_shipping_info['billing_email'];

        if($delivery_shipping_info['deliver_to_diferent_address']) { // if the user request to deliver to different address
            $order->delivery_first_name     = $delivery_shipping_info['delivery_first_name'];
            $order->delivery_other_names    = $delivery_shipping_info['delivery_other_names'];
            $order->delivery_state_id       = $delivery_shipping_info['delivery_state'];
            $order->delivery_area_id        = $delivery_shipping_info['delivery_area'];
            $order->delivery_street_address = $delivery_shipping_info['delivery_street_address'];
            $order->delivery_phone_number   = $delivery_shipping_info['delivery_phone_number'];
            $order->delivery_email          = $delivery_shipping_info['delivery_email'];
        } else { // else just fill the billing address in the dilivery fields
            $order->delivery_first_name     = $delivery_shipping_info['billing_first_name'];
            $order->delivery_other_names    = $delivery_shipping_info['billing_other_names'];
            $order->delivery_state_id       = $delivery_shipping_info['billing_state'];
            $order->delivery_area_id        = $delivery_shipping_info['billing_area'];
            $order->delivery_street_address = $delivery_shipping_info['billing_street_address'];
            $order->delivery_phone_number   = $delivery_shipping_info['billing_phone_number'];
            $order->delivery_email          = $delivery_shipping_info['billing_email'];
        }
        
        $order->order_note            = $delivery_shipping_info['order_note'];
        $order->paystack_payment_ref  = $paystack_payment_ref;
        $order->total_products_amount = $total_products_amount;
        $order->delivery_fee          = $delivery_fee;
        $order->total_products_weight = $total_products_weight;
        $order->payment_type          = $payment_type;

        if($order->save()) {

            $cart = $request->session()->get('cart');
            foreach($cart as $product_id => $quantity) {
                $product             = Product::find($product_id);
                $product_sales_price = $product->sales_price;
                $product_price       = 0;

                if ($product_sales_price <= 0) {
                    $product_price = $product->price;
                } else {
                    $product_price = $product->sales_price;
                }

                $order_item                 = new OrderItem();
                $order_item->order_id       = $order->id;
                $order_item->product_id     = $product->id;
                $order_item->product_name   = $product->name;
                $order_item->product_weight = $product->weight;
                $order_item->unit_price     = str_replace(',', '', $product_price);
                $order_item->quantity       = $quantity;

                $order_item ->save();

            }

            $request->session()->forget('cart');
            return response()->json([
                'status' => 'success',
                'order_id' => $order->id
            ]);
        }

        return response()->json([
            'status' => 'fail'
        ]);

    }

    public function checkout_login(Request $request)
    {
        $email      = $request->email;
        $password   = $request->password;
        $rememberme = $request->rememberme;

        if (Auth::attempt(['email' => $email, 'password' => $password], $rememberme)) {
            return redirect()->back()->with([
                'type' => 'success',
                'message' => 'You are now login',
            ]);
        } else {
            return redirect()->back()->with([
                'type' => 'fail',
                'message' => 'Login credentials do not match our records.',
            ]);
        }

    }

    public function checkout_logout()
    {
        if(Auth::user()) {
            Auth::logout();
        }

        return redirect()->back()->with([
            'type' => 'success',
            'message' => 'You have logout',
        ]);
    }

    public function order_completed($order_id)
    {
        $order_details = Order::find($order_id);
        if(!$order_details) {
            return abort(404);
        }

        return view('customer.order_completed', [
            'order_details' => $order_details
        ]);
    }

}


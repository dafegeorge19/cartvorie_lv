<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(Request $request)
    {
        $cart          = $request->session()->get('cart');
        $cart_products = [];
        $counter       = 0;

        if(!is_null($cart) && count($cart) > 0) {

            foreach($cart as $product_id => $quantity) {
                $product = Product::find($product_id);

                $cart_products[$counter]['product_details'] = $product;
                $cart_products[$counter]['product_quantity'] = $quantity;

                $counter++;
            }

        }

        return view('customer.cart');
    }

    public function get_all_cart_products(Request $request)
    {
        $cart_products = [];
        $counter = 0;

        if ($request->session()->exists('cart')) {
            //if it exists, then check if the item is already in cart
            $cart = $request->session()->get('cart');

            
            if($cart == null) {// if some reason the cart is null then return empty result to Ajax request
                return response()->json();
            }

            foreach($cart as $product_id => $quantity) {
                $product = Product::find($product_id);

                if($product) {
                    $cart_products[$counter]['product_details'] = $product;
                    $cart_products[$counter]['supermarket_details'] = $product->supermarket;
                    $cart_products[$counter]['supermarket_state'] = $product->supermarket->state;
                    $cart_products[$counter]['supermarket_area'] = $product->supermarket->area;
                    $cart_products[$counter]['product_quantity'] = $quantity;
                    $cart_products[$counter]['product_image'] = $product->get_product_image(1);
                }

                $counter++;
            }
            
            return response()->json($cart_products);

        } else {
            return response()->json();
        }
    }

    public function add_to_cart(Request $request)
    {
        $product_id = $request->id;

        $product = Product::find($product_id);
        $cart = [];

        // if no product found then return null to the Ajax request of adding item to cart
        if(!$product){
            return response()->json();
        }

        // check if the cart session already exist
        if ($request->session()->exists('cart')) {
            //if it exists, then check if the item is already in cart
            $cart = $request->session()->get('cart');

            if(array_key_exists($product_id, $cart)) {//if the key already exists then just increment the quantity by one
                $cart[$product_id] += 1;
                session(['cart' => $cart]);
                return response()->json('success');
            } else { //if the product key does not exist then add the key and assign one to it
                $cart[$product_id] = 1;
                session(['cart' => $cart]);
                return response()->json('success');
            }

        } else {//if scart session does not exist then create it and add items to it
            $cart[$product_id] = 1;
            session(['cart' => $cart]);
            return response()->json('success');
        }

        return response()->json();
    }

    public function remove_from_cart(Request $request)
    {
        $product_id = $request->id;

        $product = Product::find($product_id);
        $cart = [];

        // if no product found then return null to the Ajax request
        if(!$product){
            return response()->json();
        }

        // check if the product is in cart
        if ($request->session()->exists('cart')) {
            $cart = $request->session()->get('cart');

            if(array_key_exists($product_id, $cart)) {

                if(count($cart) == 1) {
                    $request->session()->forget('cart');
                    return response()->json('success');
                } else {
                    unset($cart[$product_id]);
                    session(['cart' => $cart]);
                    return response()->json('success');
                }
                
            } else {
                return response()->json();
            }

        } else {
            return response()->json();
        }

        return response()->json();
    }






    public function increase_cart(Request $request)
    {
        $product_id = $request->id;

        $product = Product::find($product_id);
        $cart = [];

        // if no product found then return null to the Ajax request of adding item to cart
        if(!$product){
            return response()->json();
        }

        // check if the cart session already exist
        if ($request->session()->exists('cart')) {

            //if it exists, then check if the item is already in cart
            $cart = $request->session()->get('cart');

            if(array_key_exists($product_id, $cart)) {
                
                    $cart[$product_id] += 1;
                    session(['cart' => $cart]);
                    return response()->json('success');
                
            } else {

                $cart[$product_id] = 1;
                session(['cart' => $cart]);
                return response()->json('success');

            }

        } else {

            $cart[$product_id] = 1;
            session(['cart' => $cart]);
            return response()->json('success');

        }

        return response()->json();
    }






    public function decrease_cart(Request $request)
    {
        $product_id = $request->id;

        $product = Product::find($product_id);
        $cart = [];

        // if no product found then return null to the Ajax request of adding item to cart
        if(!$product){
            return response()->json();
        }

        // check if the cart session already exist
        if ($request->session()->exists('cart')) {
            //if it exists, then check if the item is already in cart
            $cart = $request->session()->get('cart');

            if(count($cart) <= 1 && array_key_exists($product_id, $cart)) {

                if($cart[$product_id] <= 1) {
                    $request->session()->forget('cart');
                    return response()->json('success1');
                } elseif ($cart[$product_id] > 1) {
                    $cart[$product_id] -= 1;
                    session(['cart' => $cart]);
                    return response()->json('success2');
                }

            } elseif (count($cart) > 1 && array_key_exists($product_id, $cart)) {

                if($cart[$product_id] <= 1) {
                    unset($cart[$product_id]);
                    session(['cart' => $cart]);
                    return response()->json('success1');
                } elseif ($cart[$product_id] > 1) {
                    $cart[$product_id] -= 1;
                    session(['cart' => $cart]);
                    return response()->json('success2');
                }

                session(['cart' => $cart]);
                return response()->json('success3');
            }

        } else {
            return response()->json();
        }

        return response()->json();
    }

    public function clear_cart(Request $request)
    {
        // check if the cart session already exist
        if ($request->session()->exists('cart')) {
            $request->session()->forget('cart');
            return response()->json('success');
        }

        return response()->json();
        
    }
}

<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Supermarket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('customer.index');
    }

    public function orders()
    {
        $user = Auth::user();
        // $customer_detail = $user->customer_detail;
        $orders = $user->orders->sortByDesc('created_at');
        return view('customer.orders', [
            'orders' => $orders
        ]);
    }

    public function order_details($order_id)
    {
        $order_details = Order::findOrFail($order_id);

        if($order_details->user_id != Auth::user()->id){
            return abort(404);
        }

        return view('customer.order_details', [
            'order_details' => $order_details
        ]);
    }
}

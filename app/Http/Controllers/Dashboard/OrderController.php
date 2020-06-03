<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard.order.all_orders', [
            'orders' => $orders
        ]);
    }


    public function order_delivered($id)
    {
        $order = Order::find($id);

        if($order){
            $order->delivered_at = now();
            
            if($order->save()) {
                return redirect()->back()->with([
                    'message' => 'Order has been marked ad delivered',
                    'type' => 'success'
                ]);
            }

        }

        return redirect()->back()->with([
            'message' => 'Error while performning action',
            'type' => 'fail'
        ]);
    }

}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::where('role', 'customer')->orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard.customer.all_customers', [
            'customers' => $customers
        ]);
    }

}

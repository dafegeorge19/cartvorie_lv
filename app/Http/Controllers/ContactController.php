<?php

namespace App\Http\Controllers;

use App\Mail\Contact_Us;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('customer.contact_us');
    }

    public function send_contact(Request $request)
    {
        // return $request;

        Mail::to('skip@sqtdemo.com.ng')->send(new Contact_Us($request));

        return redirect()->back()->with([
            'message' => 'Thanks for contacting us, one of our representatives will get back to you soon'
        ]);

    }
}

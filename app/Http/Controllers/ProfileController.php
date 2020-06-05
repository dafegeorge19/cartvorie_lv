<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('customer.edit_profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'username' => 'required',
            'phone_number' => 'required|numeric',
            'password' => 'nullable|min:6|confirmed'
        ]);

        // update user
        $user = Auth::user();
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->phone_number = $request->phone_number;
        if($request->password != '') {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        
        return redirect()->back()->with([
            'message' => 'Your profile has been updated successfully'
        ]);
    }

}

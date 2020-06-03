<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function save(Request $request)
    {

        $state_id       = $request->state;
        $area_id        = $request->area;
        $street_address = $request->street_address;
        $user_id        = Auth::user()->id;

        $address                 = new Address();
        $address->state_id       = $state_id;
        $address->area_id        = $area_id;
        $address->user_id        = $user_id;
        $address->street_address = $street_address;

        if($address->save()) {

            $user_addresses = Auth::user()->addresses;

            if($user_addresses->count() > 3) {
                $user_address = Auth::user()->addresses->sortByDesc('created_at')->last();
                $user_address->delete();
            }

            return response()->json('success');
        }

        return response()->json();

    }

    public function delete(Request $request)
    {
        $id = $request->address_id;
        $address = Address::find($id);

        if($address->delete()) {
            return response()->json('success');
        }

        return response()->json();

    }

    
}

<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;

class AreaController extends Controller
{

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



    
}

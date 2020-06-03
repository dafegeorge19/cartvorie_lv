<?php

namespace App\Http\Controllers;

use App\Area;
use App\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getAreas()
    {
        $areas = User::all();
        return response()->json($areas);
    }
}

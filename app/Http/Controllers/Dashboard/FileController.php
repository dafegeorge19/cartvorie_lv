<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function download_cv($cv_name, $agent_name)
    {
        if(file_exists('storage/uploads/agents/docs/cvs/'.$cv_name)) {
            $pathinfo = pathinfo($cv_name);
            $file_extension = $pathinfo['extension'];
            return Storage::download('public/uploads/agents/docs/cvs/'.$cv_name, $agent_name . '_cv'.'.'.$file_extension);
        } else {
            return abort(404);
        }
    }
}

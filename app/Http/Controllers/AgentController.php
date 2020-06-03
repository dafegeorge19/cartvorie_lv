<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Validation\Rule;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = User::where('role', 'agent')->get();

        return view('agent.all_agents', [
            'agents' => $agents
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function become_an_agent()
    {
        return view('agent.become_an_agent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_agent(Request $request)
    {
        $validatedData = $request->validate([
            'first_name'     => ['required', 'max:50'],
            'other_names'    => ['required', 'max:50'],
            'phone_number'   => ['required', 'max:20'],
            'email'          => ['required', 'unique:users'],
            'state'          => ['required', 'exists:states,id'],
            'area'           => ['required', 'exists:areas,id'],
            'street_address' => ['required', 'max:100'],
            'image'          => ['required', 'mimes:jpeg,jpg,png'],
            'cv'             => ['required', 'mimes:doc,docx,pdf'],
            'password'       => ['required', 'confirmed'],
        ]);

        
        $first_name     = $request->first_name;
        $other_names    = $request->other_names;
        $phone_number   = $request->phone_number;
        $email          = $request->email;
        $state_id       = $request->state;
        $area_id        = $request->area;
        $street_address = $request->street_address;
        $password       = $request->password;
        
        
        $agent                    = new User();
        $agent->first_name        = $first_name;
        $agent->other_names       = $other_names;
        $agent->phone_number      = $phone_number;
        $agent->email             = $email;
        $agent->email_verified_at = now();
        $agent->role              = 'agent';
        $agent->password          = Hash::make($password);
        
        if($agent->save()) {

            // save agent address
            $agent->addresses()->create([
                'state_id'       => $state_id,
                'area_id'        => $area_id,
                'street_address' => $street_address
            ]);
            
            // upload cv and save agent details
            if ($request->hasFile('cv')) { // check if file is available for upload
                $path = $request->cv->store('public/uploads/agents/docs/cvs');
                if($path) {
                    $cv_name = basename($path);
                    $agent->agent_detail()->create(['cv_name' => $cv_name]);
                }
            }

            //upload profile image
            $image = $request->image;
            if ($request->hasFile('image')) { // check if file is available for upload
                
                $image           = $request->image;
                $image_name      = $request->image->getClientOriginalName();
                $image_extension = $image->extension();
                $gen_image_name  = md5(now() . 'logo_name' . $image_name);
                $new_image_name  = $gen_image_name . '.' . $image_extension;
                $fited_image     = Image::make($image ->getRealPath())->fit(300, 300);
                $save_image      = $fited_image->save('storage/uploads/agents/images/profile_photos/' . $new_image_name, 60);  //save image to server

                if($save_image) {
                    $agent->images()->create(['name' => $new_image_name]);
                }
            }
            
            return redirect()->back()->with([
                'message' => 'New Agent has been saved.',
                'type' => 'success'
            ]);

        }

        return redirect()->back()->with([
            'message' => 'Agent was not save, there was an error while try to save it',
            'type'    => 'fail'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

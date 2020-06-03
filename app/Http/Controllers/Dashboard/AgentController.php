<?php

namespace App\Http\Controllers\Dashboard;

use App\Address;
use App\Area;
use App\Http\Controllers\Controller;
use App\State;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = User::where('role', 'agent')->orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard.agent.all_agents', [
            'agents' => $agents
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_agent()
    {
        $states = State::all();

        return view('dashboard.agent.add_agent', [
            'states' => $states
        ]);
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
            'first_name'     => ['required', 'max:255'],
            'other_names'    => ['required', 'max:255'],
            'phone_number'   => ['required', 'max:255'],
            'email'          => ['required', 'unique:users'],
            'state'          => ['required'],
            'area'           => ['required'],
            'street_address' => ['required'],
            'verify_email'   => ['required'],
            // 'image'          => ['required'],
            'cv'             => ['required'],
            'password'             => ['required'],
        ]);

        
        $first_name     = $request->first_name;
        $other_names    = $request->other_names;
        $phone_number   = $request->phone_number;
        $email          = $request->email;
        $state_id       = $request->state;
        $area_id        = $request->area;
        $street_address = $request->street_address;
        $verify_email   = $request->verify_email;
        $password        = $request->password;
        
        
        $agent = new User();
        $agent->first_name = $first_name;
        $agent->other_names = $other_names;
        $agent->phone_number = $phone_number;
        $agent->email  = $email;
        $agent->email_verified_at  = now();
        $agent->role  = 'agent';
        $agent->password  = Hash::make($password);
        
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
                // save agent address
                $agent->addresses()->create([
                    'state_id'       => $state_id,
                    'area_id'        => $area_id,
                    'street_address' => $street_address
                ]);
            }

            //upload profile image
            $image = $request->image;
            if ($request->hasFile('image')) { // check if file is available for upload
                
                $image           = $request->image;
                $user_id         = Auth::user()->id;
                $image_name      = $request->image->getClientOriginalName();
                $image_extension = $image->extension();
                $gen_image_name  = md5(now() . $user_id . 'logo_name' . $image_name);
                $new_image_name  = $gen_image_name . '.' . $image_extension;
                $fited_image     = Image::make($image ->getRealPath())->fit(300, 300);
                $save_image      = $fited_image->save('storage/uploads/agents/images/profile_photos/' . $new_image_name, 60);  //save image to server

                if($save_image) {
                    $agent->images()->create(['name' => $new_image_name]);
                }
            }
            
            return redirect()->route('all_agents')->with([
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
    public function view_agent($id)
    {
        $agent = User::find($id);

        if($agent) {
            return view('dashboard.agent.view_agent', [
                'agent' => $agent
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Error getting agent, the agent id might be wrong or you dont have permission to view the agent',
            'type'    => 'fail'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_agent($id)
    {
        $agent = User::find($id);
        $states = State::all();
        $areas = Area::where('state_id', $agent->addresses->first()->area->id)->get();

        if($agent) {
            return view('dashboard.agent.edit_agent', [
                'agent' => $agent,
                'states'      => $states,
                'areas'       => $areas
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Error getting agent, the agent id might be wrong or you dont have permission to edit the agent',
            'type'    => 'fail'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_agent(Request $request, $id)
    {
        // $validatedData = $request->validate([
        //     'first_name'     => ['required', 'max:255'],
        //     'other_names'    => ['required', 'max:255'],
        //     'phone_number'   => ['required', 'max:255'],
        //     'email'          => ['required', 'max:255'],
        //     'state'          => ['required'],
        //     'area'           => ['required'],
        //     'street_address' => ['required'],
        //     'verify_email'   => ['required'],
        //     'image'          => ['required'],
        //     // 'cv'             => ['required'],
        //     // 'password'       => ['required'],
        // ]);

        $agent = User::find($id);

        if($agent) {

            $first_name     = $request->first_name;
            $other_names    = $request->other_names;
            $phone_number   = $request->phone_number;
            $email          = $request->email;
            $state_id       = $request->state;
            $area_id        = $request->area;
            $street_address = $request->street_address;
            $verify_email   = $request->verify_email;
            $password       = $request->password;
            
            $agent->first_name        = $first_name;
            $agent->other_names       = $other_names;
            $agent->phone_number      = $phone_number;
            $agent->email             = $email;
            
            if($verify_email == 'yes') {
                $agent->email_verified_at = now();
            } elseif ($verify_email == 'no') {
                $agent->email_verified_at = null;
            }
            
            $agent->role              = 'agent';

            if(!$password) {
                $agent->password = Hash::make($password);
            }

            if($agent->save()) {

                // save agent address
                $agent_address =  $agent->addresses->first();

                if($agent_address) {

                    $agent_address->state_id       = $state_id;
                    $agent_address->area_id        = $area_id;
                    $agent_address->street_address = $street_address;
                    $agent_address->save();

                } else { //if for some reason the agent dont have address create one with the edit data

                    $agent->addresses()->create([
                        'state_id'       => $state_id,
                        'area_id'        => $area_id,
                        'street_address' => $street_address
                    ]);

                }
                
                
                // upload cv and save agent details
                if ($request->hasFile('cv')) { // check if file is available for upload
                    
                    $path = $request->cv->store('public/uploads/agents/docs/cvs');

                    if($path) {
                        $cv_name = basename($path);
                        $agent_detail = $agent->agent_detail;
                        $agent_detail->cv_name = $cv_name;
                        $agent_detail->save();
                    }

                }
    
                //upload profile image
                if ($request->hasFile('image')) { // check if file is available for upload

                    // first delete the curent logo from db
                    $agent_image = $agent->images;
                    if($agent_image) {
                        $agent->images()->delete();
                    }

                    
                    $image           = $request->image;
                    $user_id         = Auth::user()->id;
                    $image_name      = $request->image->getClientOriginalName();
                    $image_extension = $image->extension();
                    $gen_image_name  = md5(now() . $user_id . 'logo_name' . $image_name);
                    $new_image_name  = $gen_image_name . '.' . $image_extension;
                    $fited_image     = Image::make($image ->getRealPath())->fit(300, 300);
                    $save_image      = $fited_image->save('storage/uploads/agents/images/profile_photos/' . $new_image_name, 60);  //save image to server
    
                    if($save_image) {
                        $agent->images()->create(['name' => $new_image_name]);
                    }
                }
                
                return redirect()->back()->with([
                    'message' => 'Agent was updated Successfuly',
                    'type' => 'success'
                ]);
    
            }

        }


        return redirect()->back()->with([
            'message' => 'There was an error updating the agent',
            'type'    => 'fail'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_agent($id)
    {

        return redirect()->back()->with([
            'message' => 'There was no agent with this id',
            'type' => 'fail'
        ]);

        
        $agent = User::find($id);

        //if a supermarket with that id was found
        if($agent && $agent->role == 'agent') {

            // delete the agent
            $agent->delete();
            
            return redirect()->back()->with([
                'message' => 'Agent was deleted Successfuly',
                'type' => 'success'
            ]);

        }

        return redirect()->back()->with([
            'message' => 'There was no agent with this id',
            'type' => 'fail'
        ]);
    }

    /**
     * change switch the agent satus between active and inactive.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function agent_status($id)
    {
        $agent = User::find($id);

        //if a supermarket with that id was found
        if($agent && $agent->role == 'agent') {

            // delete the agent
            $agent_detail = $agent->agent_detail;
            $agent_status = $agent_detail->status;

            if($agent_status == 'disabled') {
                $agent_detail->status = 'enabled';
            } elseif ($agent_status == 'enabled') {
                $agent_detail->status = 'disabled';
            }

            if($agent_detail->save()) {
                return redirect()->back()->with([
                    'message' => 'Agent was deleted Successfuly',
                    'type' => 'success'
                ]);
            }
            
        }

        return redirect()->back()->with([
            'message' => 'There was no agent with this id',
            'type' => 'fail'
        ]);
    }

    

}

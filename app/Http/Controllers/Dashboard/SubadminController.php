<?php

namespace App\Http\Controllers\Dashboard;

use App\Area;
use App\Http\Controllers\Controller;
use App\State;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class SubadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subadmins = User::where('role', 'subadmin')->orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard.subadmin.all_subadmins', [
            'subadmins' => $subadmins
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_subadmin()
    {
        $states = State::all();

        return view('dashboard.subadmin.add_subadmin', [
            'states' => $states
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_subadmin(Request $request)
    {
        $validatedData = $request->validate([
            // 'first_name'     => ['required', 'max:255'],
            // 'other_names'    => ['required', 'max:255'],
            // 'phone_number'   => ['required', 'max:255'],
            'email'          => ['required', 'unique:users'],
            // 'state'          => ['required'],
            // 'area'           => ['required'],
            // 'street_address' => ['required'],
            // 'image'          => ['required'],
            // 'password'       => ['required'],
        ]);

        
        $first_name     = $request->first_name;
        $other_names    = $request->other_names;
        $phone_number   = $request->phone_number;
        $email          = $request->email;
        $state_id       = $request->state;
        $area_id        = $request->area;
        $street_address = $request->street_address;
        $password        = $request->password;
        
        
        $subadmin = new User();
        $subadmin->first_name = $first_name;
        $subadmin->other_names = $other_names;
        $subadmin->phone_number = $phone_number;
        $subadmin->email  = $email;
        $subadmin->email_verified_at  = now();
        $subadmin->role  = 'subadmin';
        $subadmin->password  = Hash::make($password);
        
        if($subadmin->save()) {

            // save subadmin address
            $subadmin->addresses()->create([
                'state_id'       => $state_id,
                'area_id'        => $area_id,
                'street_address' => $street_address
            ]);

            //upload profile image
            if ($request->hasFile('image')) { // check if file is available for upload
                
                $image           = $request->image;
                $user_id         = Auth::user()->id;
                $image_name      = $request->image->getClientOriginalName();
                $image_extension = $image->extension();
                $gen_image_name  = md5(now() . $user_id . 'logo_name' . $image_name);
                $new_image_name  = $gen_image_name . '.' . $image_extension;
                $fited_image     = Image::make($image ->getRealPath())->fit(300, 300);
                $save_image      = $fited_image->save('storage/uploads/subadmins/images/profile_photos/' . $new_image_name, 60);  //save image to server

                if($save_image) {
                    $subadmin->images()->create(['name' => $new_image_name]);
                }
            }
            
            return redirect()->route('all_subadmins')->with([
                'message' => 'New subadmin has been saved.',
                'type' => 'success'
            ]);

        }

        return redirect()->back()->with([
            'message' => 'Subadmin was not save, there was an error while try to save it',
            'type'    => 'fail'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view_subadmin($id)
    {
        $subadmin = User::find($id);

        if($subadmin) {
            return view('dashboard.subadmin.view_subadmin', [
                'subadmin' => $subadmin
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Error getting subadmin, the subadmin ID might be wrong or you dont have permission to view the subadmin',
            'type'    => 'fail'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_subadmin($id)
    {
        $subadmin = User::find($id);
        $states = State::all();
        $areas = Area::where('state_id', $subadmin->addresses->first()->area->id)->get();

        if($subadmin) {
            return view('dashboard.subadmin.edit_subadmin', [
                'subadmin' => $subadmin,
                'states'      => $states,
                'areas'       => $areas
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Error getting subadmin, the subadmin id might be wrong or you dont have permission to edit the subadmin',
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
    public function update_subadmin(Request $request, $id)
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

        $subadmin = User::find($id);

        if($subadmin) {

            $first_name     = $request->first_name;
            $other_names    = $request->other_names;
            $phone_number   = $request->phone_number;
            $email          = $request->email;
            $state_id       = $request->state;
            $area_id        = $request->area;
            $street_address = $request->street_address;
            $password       = $request->password;
            
            $subadmin->first_name   = $first_name;
            $subadmin->other_names  = $other_names;
            $subadmin->phone_number = $phone_number;
            $subadmin->email        = $email;

            if(!$password) {
                $subadmin->password = Hash::make($password);
            }

            if($subadmin->save()) {

                // save subadmin address
                $subadmin_address =  $subadmin->addresses->first();

                if($subadmin_address) {

                    $subadmin_address->state_id       = $state_id;
                    $subadmin_address->area_id        = $area_id;
                    $subadmin_address->street_address = $street_address;
                    $subadmin_address->save();

                } else { //if for some reason the subadmin dont have address create one with the edit data

                    $subadmin->addresses()->create([
                        'state_id'       => $state_id,
                        'area_id'        => $area_id,
                        'street_address' => $street_address
                    ]);

                }
    
                //upload profile image
                if ($request->hasFile('image')) { // check if file is available for upload

                    // first delete the curent logo from db
                    $subadmin_image = $subadmin->images;
                    if($subadmin_image) {
                        $subadmin->images()->delete();
                    }

                    $image           = $request->image;
                    $user_id         = Auth::user()->id;
                    $image_name      = $request->image->getClientOriginalName();
                    $image_extension = $image->extension();
                    $gen_image_name  = md5(now() . $user_id . 'logo_name' . $image_name);
                    $new_image_name  = $gen_image_name . '.' . $image_extension;
                    $fited_image     = Image::make($image ->getRealPath())->fit(300, 300);
                    $save_image      = $fited_image->save('storage/uploads/subadmins/images/profile_photos/' . $new_image_name, 60);  //save image to server

                    if($save_image) {
                        $subadmin->images()->create(['name' => $new_image_name]);
                    }

                }
                
                return redirect()->back()->with([
                    'message' => 'Subadmin was updated Successfuly',
                    'type' => 'success'
                ]);
    
            }

        }


        return redirect()->back()->with([
            'message' => 'There was an error updating the subadmin',
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
    public function delete_subadmin(Request $request, $id)
    {
        $subadmin = User::find($id);

        //if a supermarket with that id was found
        if($subadmin && $subadmin->role == 'subadmin') {

            // move all the products in this category to uncategorized category
            $products = $subadmin->products;
            if($products) {
                $subadmin->products()->update(['user_id' => 1]);
            }

            // delete the subadmin
            $subadmin->delete();
            
            return redirect()->back()->with([
                'message' => 'Subadmin was deleted Successfuly',
                'type' => 'success'
            ]);

        }

        return redirect()->back()->with([
            'message' => 'Delete was not successful',
            'type' => 'fail'
        ]);
    }

}

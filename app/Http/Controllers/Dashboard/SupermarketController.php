<?php

namespace App\Http\Controllers\Dashboard;

use App\Area;
use App\Http\Controllers\Controller;
use App\State;
use App\Supermarket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class SupermarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $supermarkets = Supermarket::orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard.supermarket.all_supermarkets', [
            'supermarkets' => $supermarkets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_supermarket()
    {
        $states = State::all();

        return view('dashboard.supermarket.add_supermarket', [
            'states' => $states
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_supermarket(Request $request)
    {

        $validatedData = $request->validate([
            'name'           => ['required', 'max:255'],
            'state'          => ['required'],
            'area'           => ['required'],
            'street_address' => ['required'],
            'description' => 'required',
            // 'logo'           => ['required'],
        ]);
        
        $name           = $request->name;
        $state_id       = $request->state;
        $area_id        = $request->area;
        $street_address = $request->street_address;
        $description    = $request->description;
        
        // generate slug
        $slug       = Str::slug($name, '-');
        $check_slug = Supermarket::where('slug', $slug)->first();
        $adder      = 1;

        if($check_slug == null) {
            $new_slug = $slug;
        } else {
            while($check_slug != null) {
                $new_slug   = $slug . '-' . $adder;
                $check_slug = Supermarket::where('slug', $new_slug)->first();
                $adder++;
            }
        }
        
        $supermarket                 = new Supermarket();
        $supermarket->name           = $name;
        $supermarket->slug           = $new_slug;
        $supermarket->state_id       = $state_id;
        $supermarket->area_id        = $area_id;
        $supermarket->street_address = $street_address;
        $supermarket->description    = $description;
        
        if($supermarket->save()) {
            
            if ($request->hasFile('logo')) { // if there is a logo file then upload the file

                $logo           = $request->logo;
                $user_id        = Auth::user()->id;
                $logo_name      = $request->logo->getClientOriginalName();
                $logo_extension = $logo->extension();
                $gen_logo_name  = md5(now() . $user_id . 'logo_name' . $logo_name);
                $new_logo_name  = $gen_logo_name . '.' . $logo_extension;
                $fited_logo     = Image::make($logo ->getRealPath())->fit(255, 197); 
                $save_logo      = $fited_logo->save('storage/uploads/supermarkets/images/logos/' . $new_logo_name, 60);  //save image to server

                if($save_logo) {
                    $supermarket->images()->create(['name' => $new_logo_name]);
                }

            }
            
            return redirect()->route('all_supermarkets')->with([
                'message' => 'New supermarket has been saved.',
                'type' => 'success'
            ]);

        }

        return redirect()->back()->with([
            'message' => 'Supermarket was not save, there was an error while try to save it',
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
    public function edit_supermarket($id)
    {
        $supermarket = Supermarket::find($id);
        $states = State::all();
        $areas = Area::where('state_id', $supermarket->state_id)->get();

        if($supermarket) {
            return view('dashboard.supermarket.edit_supermarket', [
                'supermarket' => $supermarket,
                'states'      => $states,
                'areas'       => $areas
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Error getting supermarket, the supermarket id might be wrong or you dont have permission to edit the suppermarket',
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
    public function update_supermarket(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'           => ['required', 'max:255'],
            'state'          => ['required'],
            'area'           => ['required'],
            'street_address' => ['required'],
            'description' => 'required',
            // 'logo'           => ['required'],
        ]);
        
        $supermarket = Supermarket::find($id);

        if($supermarket) {

            $name           = $request->name;
            $state_id       = $request->state;
            $area_id        = $request->area;
            $street_address = $request->street_address;
            $description    = $request->description;

            $supermarket->name           = $name;
            $supermarket->state_id       = $state_id;
            $supermarket->area_id        = $area_id;
            $supermarket->street_address = $street_address;
            $supermarket->description    = $description;

            if($supermarket->save()) {
            
                if ($request->hasFile('logo')) { // if there is a logo file then upload the file

                    // first delete the curent logo from db
                    $supermarket_logo = $supermarket->images;
                    if($supermarket_logo) {
                        $supermarket->images()->delete();
                    }

                    $logo           = $request->logo;
                    $user_id        = Auth::user()->id;
                    $logo_name      = $request->logo->getClientOriginalName();
                    $logo_extension = $logo->extension();
                    $gen_logo_name  = md5(now() . $user_id . 'logo_name' . $logo_name);
                    $new_logo_name  = $gen_logo_name . '.' . $logo_extension;
                    $fited_logo     = Image::make($logo ->getRealPath())->fit(255, 197); 
                    $save_logo      = $fited_logo->save('storage/uploads/supermarkets/images/logos/' . $new_logo_name, 60);  //save image to server

                    if($save_logo) {
                        $supermarket->images()->create(['name' => $new_logo_name]);
                    }

                }
                
                return redirect()->back()->with([
                    'message' => 'Supermarket was updated Successfuly',
                    'type' => 'success'
                ]);

            }
        }
        
        return redirect()->back()->with([
            'message' => 'There was an error updating your supermarket',
            'type'    => 'fail'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_supermarket($id)
    {
        $supermarket = Supermarket::find($id);

        //if a supermarket with that id was found
        if($supermarket) {
            // get all the products belonging to the supermarket
            $products = $supermarket->products;
            // if there is any product in the supermarket we need to delete the products first befor deleting the supermarket
            if($products) {
                $supermarket->products()->delete();
            }

            // now delete the supermarket
            $supermarket->delete();
            
            return redirect()->back()->with([
                'message' => 'Supermarket was deleted Successfuly',
                'type' => 'success'
            ]);

        }

        return redirect()->back()->with([
            'message' => 'There was no suppermarket with this id',
            'type' => 'fail'
        ]);

    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Area;
use App\Http\Controllers\Controller;
use App\State;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::paginate(10);

        return view('dashboard.location.all_states', [
            'states' => $states
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_state_areas($state_id)
    {
        $areas = Area::where('state_id', $state_id)->paginate(10);
        
        return view('dashboard.location.view_state_areas', [
            'areas' => $areas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_state()
    {
        return view('dashboard.location.add_state');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_area()
    {
        return view('dashboard.location.add_area');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_state(Request $request)
    {

        $validatedData = $request->validate([
            'names'  => 'required|max:255',
        ]);

        $names          = $request->names;
        $error_states   = [];
        $exploded_names = explode(',', $names);

        foreach($exploded_names as $state_name) {
            $state       = new State();
            $state->name = $state_name;
            if($state->save()) {
                //do nothing
            } else {
                $error_states[] = $state_name;
            }
        }

        if($error_states) {
            
            return redirect()->back()->with([
                'message' => 'the following states ' . implode(', ', $error_states) . ' where not saved',
                'type' => 'fail'
            ]);

        } else {

            return redirect()->back()->with([
                'message' => 'New states has been saved.',
                'type' => 'success'
            ]);

        }

        return redirect()->back()->with([
            'message' => 'States are not save, there was an error while try to save them',
            'type'    => 'fail'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_area(Request $request)
    {
        $validatedData = $request->validate([
            'names'  => 'required|max:255',
            'state'  => 'required',
        ]);
        
        $state_id = $request->state;
        $state    = State::findOrFail($state_id);

        if($state) {

            $names          = $request->names;
            $exploded_names = explode(',', $names);
            $error_areas    = [];

            foreach($exploded_names as $area_name) {
                if($state->areas()->create(['name' => $area_name])) {
                    //do nothing
                } else {
                    $error_areas[] = $area_name;
                }
            }

            if($error_areas) {
                        
                return redirect()->back()->with([
                    'message' => 'the following areas ' . implode(', ', $error_areas) . ' where not saved',
                    'type' => 'fail'
                ]);

            } else {

                return redirect()->back()->with([
                    'message' => 'New areas has been saved.',
                    'type' => 'success'
                ]);

            }

            return redirect()->back()->with([
                'message' => 'Areas are not save, there was an error while try to save them',
                'type'    => 'fail'
            ]);

        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_state($id)
    {
        $state = State::findOrFail($id);

        if($state) {
            return view('dashboard.location.edit_state', [
                'state' => $state
            ]);
        }

        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_area($id)
    {
        $area = Area::findOrFail($id);

        if($area) {
            return view('dashboard.location.edit_area', [
                'area' => $area
            ]);
        }

        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_state(Request $request, $id)
    {
        $state = State::findOrFail($id);

        if($state) {

            $state->name = $request->name;

            if($state->save()) {

                return redirect()->back()->with([
                    'message' => 'State as been updated',
                    'type'    => 'success'
                ]);

            }

        }
        
        return redirect()->back()->with([
            'message' => 'Error while updating state',
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
    public function update_area(Request $request, $id)
    {
        $area = Area::findOrFail($id);

        if($area) {
            $area->name = $request->name;
            if($area->save()) {
                return redirect()->back()->with([
                    'message' => 'area as been updated',
                    'type'    => 'success'
                ]);
            }
        }
        
        return redirect()->back()->with([
            'message' => 'Error while updating area',
            'type'    => 'fail'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_state($id)
    {
        $state = State::findOrFail($id);

        if($state) {

            $supermarkets = $state->supermarkets;

            if($supermarkets->count() != 0) {
                return redirect()->back()->with([
                    'message' => 'You can not delete a state that has supermarket in it',
                    'type'    => 'fail'
                ]);
            }

            // delete all the areas belonging to the state
            $areas = $state->areas;
            if($areas) {
                $state->areas()->delete();
            }


            if($state->delete()) {
                return redirect()->back()->with([
                    'message' => 'State has been deleted',
                    'type'    => 'success'
                ]);
            }

        }

        return redirect()->back()->with([
            'message' => 'There was an error while deleting state',
            'type'    => 'fail'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_area($id)
    {
        $area = Area::findOrFail($id);

        if($area) {

            $supermarkets = $area->supermarkets;

            if($supermarkets->count() != 0) {
                return redirect()->back()->with([
                    'message' => 'You can not delete an area that has supermarket in it',
                    'type'    => 'fail'
                ]);
            }

            if($area->delete()) {
                return redirect()->back()->with([
                    'message' => 'area has been deleted',
                    'type'    => 'success'
                ]);
            }

        }

        return redirect()->back()->with([
            'message' => 'There was an error while deleting area',
            'type'    => 'fail'
        ]);
    }
}

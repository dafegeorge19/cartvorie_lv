<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function all_category_types($category_id)
    {
        $category = Category::findOrFail($category_id);
        $types = $category->types;

        return view('dashboard.category.all_category_types', [
            'types' => $types
        ]);
    }

    public function add_type()
    {
        return view('dashboard.category.add_type');
    }

    public function store_type(Request $request)
    {
        $validatedData = $request->validate([
            'names'  => 'required|max:255',
            'category'  => 'required',
        ]);
        
        $category_id = $request->category;
        $category    = Category::findOrFail($category_id);

        if($category) {

            $names          = $request->names;
            $exploded_names = explode(',', $names);
            $error_types   = [];

            foreach($exploded_names as $type_name) {
                if($category->types()->create(['name' => $type_name])) {
                    //do nothing
                } else {
                    $error_types[] = $type_name;
                }
            }

            if(count($error_types)) {
                        
                return redirect()->back()->with([
                    'message' => 'the following types ' . implode(', ', $error_types) . ' where not saved',
                    'type' => 'fail'
                ]);

            } else {

                return redirect()->back()->with([
                    'message' => 'New types has been saved.',
                    'type' => 'success'
                ]);

            }

            return redirect()->back()->with([
                'message' => 'Types are not save, there was an error while try to save them',
                'type'    => 'fail'
            ]);

        }
    }

    public function edit_type($id)
    {
        $type = Type::findOrFail($id);

        if($type) {
            return view('dashboard.category.edit_type', [
                'type' => $type
            ]);
        }

        return abort(404);
    }

    public function update_type(Request $request, $id)
    {
        $type = Type::findOrFail($id);

        if($type) {
            $type->name = $request->name;
            if($type->save()) {
                return redirect()->back()->with([
                    'message' => 'type as been updated',
                    'type'    => 'success'
                ]);
            }
        }
        
        return redirect()->back()->with([
            'message' => 'Error while updating type',
            'type'    => 'fail'
        ]);
    }

    public function delete_type($id)
    {
        $type = Type::findOrFail($id);

        if($type) {
            
            if($type->delete()) {
                return redirect()->back()->with([
                    'message' => 'type has been deleted',
                    'type'    => 'success'
                ]);
            }

        }

        return redirect()->back()->with([
            'message' => 'There was an error while deleting type',
            'type'    => 'fail'
        ]);
    }

    public function get_category_type(Request $request)
    {
        if($request->ajax()){

            $category_id = $request->id;

            if($category_id) {
                $category = Category::find($category_id);

                if($category) {
                    $category_types = $category->types;
                    return response()->json($category_types);
                }
            }

            return response()->json();
            
        }
    }


}

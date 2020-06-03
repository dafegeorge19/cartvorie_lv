<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard.category.all_categories', [
            'categories' => $categories
        ]);
    }

    

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_category()
    {
        return view('dashboard.category.add_category');
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_category(Request $request)
    {
        $validatedData = $request->validate([
            'name'  => 'required|max:100',
            'image' => 'required|Image'
        ]);

        $name = $request->name;

        // generate slug
        $slug = Str::slug($name, '-');
        $check_slug = Category::where('slug', $slug)->first();
        $adder = 1;

        if($check_slug == null) {
            $new_slug = $slug;
        } else {
            while($check_slug != null) {
                $new_slug   = $slug . '-' . $adder;
                $check_slug = Category::where('slug', $new_slug)->first();
                $adder++;
            }
        }
        
        $category       = new Category();
        $category->name = $name;
        $category->slug = $new_slug;
        
        if($category->save()) {

            if ($request->hasFile('image')) { // if there is a logo file then upload the file

                $image           = $request->image;
                $user_id         = Auth::user()->id;
                $image_name      = $request->image->getClientOriginalName();
                $image_extension = $image->extension();
                $gen_image_name  = md5(now() . $user_id . 'logo_name' . $image_name);
                $new_image_name  = $gen_image_name . '.' . $image_extension;
                $fited_image     = Image::make($image ->getRealPath())->fit(220, 197);
                $save_image      = $fited_image->save('storage/uploads/categories/images/' . $new_image_name, 60);  //save image to server

                if($save_image) {
                    $category->images()->create(['name' => $new_image_name]);
                }

            }
            
            return redirect()->route('all_categories')->with([
                'message' => 'New category has been saved.',
                'type' => 'success'
            ]);

        }

        return redirect()->back()->with([
            'message' => 'Catigory was not save, there was an error while try to save it',
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
    public function edit_category($id)
    {
        $category = Category::find($id);

        if($category) {
            return view('dashboard.category.edit_category', [
                'category' => $category
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Error getting product, the product id might be wrong or you dont have permission to edit the product',
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
    public function update_category(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:100',
        ]);

        $category = Category::find($id);

        if($category) {

            $category->name = $request->name;
            if($category->save()) {

                if ($request->hasFile('image')) { // if there is a logo file then upload the file

                    // first delete the curent image from db
                    $category_images = $category->images;
                    if($category_images) {
                        $category->images()->delete();
                    }

                    $image           = $request->image;
                    $user_id          = Auth::user()->id;
                    $image_name      = $request->image->getClientOriginalName();
                    $image_extension = $image->extension();
                    $gen_image_name  = md5(now() . $user_id . 'logo_name' . $image_name);
                    $new_image_name  = $gen_image_name . '.' . $image_extension;
                    $fited_image     = Image::make($image ->getRealPath())->fit(220, 197);
                    $save_image      = $fited_image->save('storage/uploads/categories/images/' . $new_image_name, 60);  //save image to server
    
                    if($save_image) {
                        $category->images()->create(['name' => $new_image_name]);
                    }
    
                }

                return redirect()->back()->with([
                    'message' => 'category was updated Successfuly',
                    'type' => 'success'
                ]);
            }

        }

        return redirect()->back()->with([
            'message' => 'There was an error updating your category',
            'type'    => 'fail'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_category($id)
    {
        $category = Category::find($id);

        //if a product with that id was found
        if($category && $category->slug != 'uncategorized') {

            // get all the images belonging to the category
            $category_images = $category->images;

            // if there is any image then delete them first
            if($category_images) {
                $category->images()->delete();
            }

            // move all the products in this category to uncategorized category
            $products = $category->products;
            if($products) {
                $category->products()->update(['category_id' => 1]);
            }

            // now delete the product
            $category->delete();
            
            return redirect()->back()->with([
                'message' => 'Category was deleted Successfuly',
                'type' => 'success'
            ]);

        }

        return redirect()->back()->with([
            'message' => 'Error while trying to feature category',
            'type' => 'fail'
        ]);
    }

    public function feature_catgory($id)
    {
        $category = Category::find($id);

        //if a supermarket with that id was found
        if($category) {

            if($category->featured) {
                $category->featured = null;
            } else {
                $category->featured = now();
            }

            if($category->save()) {

                $categories = Category::where('featured', '!=', null)->get();
                if($categories->count() > 3) {
                    $last = $categories->sortByDesc('featured')->last();
                    $last->featured = null;
                    $last->save();
                }

                return redirect()->back()->with([
                    'message' => 'Category was feature',
                    'type' => 'success'
                ]);
            }
            
        }

        return redirect()->back()->with([
            'message' => 'Error while trying to feature category',
            'type' => 'fail'
        ]);
    }
}

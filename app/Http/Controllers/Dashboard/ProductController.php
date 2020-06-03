<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\Supermarket;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = '';

        if(Auth::user()->role == 'superadmin'){
            $products = Product::orderBy('created_at', 'desc')->paginate(10);
        } else {
            $products = Product::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        }
        
        return view('dashboard.product.all_products', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_product()
    {
        $supermarkets = Supermarket::all();
        $categories   = Category::all();

        return view('dashboard.product.add_product', [
            'supermarkets' => $supermarkets,
            'categories'   => $categories,
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_product(Request $request)
    {
        $validatedData = $request->validate([
            // 'name'         => ['required', 'max:255'],
            // 'weight'       => ['required'],
            // 'price'        => ['required'],
            // 'sales_price'  => ['required'],
            // 'supermarket ' => ['required'],
            // 'category '    => ['required'],
            // 'image1'       => ['required'],
            // // 'image2'       => ['required'],
            // // 'image3'       => ['required'],
            // 'description'  => ['required'],
        ]);
        
        $name        = $request->name;
        $weight      = $request->weight;
        $price       = $request->price;
        $sales_price = $request->sales_price;
        $supermarket = $request->supermarket;
        $category    = $request->category;
        $type        = $request->type;
        $description = $request->description;
        $user_id     = Auth::user()->id;

        // generate slug
        $slug       = Str::slug($name, '-');
        $check_slug = Product::where('slug', $slug)->first();
        $adder      = 1;

        if($check_slug == null) {
            $new_slug = $slug;
        } else {
            while($check_slug != null) {
                $new_slug   = $slug . '-' . $adder;
                $check_slug = Product::where('slug', $new_slug)->first();
                $adder++;
            }
        }
        
        $product                 = new Product();
        $product->name           = $name;
        $product->weight         = $weight;
        $product->price          = $price;
        $product->sales_price    = $sales_price;
        $product->user_id        = $user_id;
        $product->supermarket_id = $supermarket;
        $product->category_id    = $category;
        $product->type_id        = $type;
        $product->description    = $description;
        $product->slug           = $new_slug;
        
        if($product->save()) {
            
            if ($request->hasFile('image1')) { // if there is a logo file then upload the file
                $image1           = $request->image1;
                $image1_name      = $request->image1->getClientOriginalName();
                $image1_extension = $image1->extension();
                $gen_image1_name  = md5(now() . $user_id . 'logo_name' . $image1_name);
                $new_image1_name  = 'image1_'.$gen_image1_name . '.' . $image1_extension;
                $fited_image1     = Image::make($image1 ->getRealPath())->fit(500, 500);
                $save_image1      = $fited_image1->save('storage/uploads/products/images/' . $new_image1_name, 60);  //save image to server

                if($save_image1) {
                    $product->images()->create(['name' => $new_image1_name]);
                }

            }

            if ($request->hasFile('image2')) { // if there is a logo file then upload the file
                $image2           = $request->image2;
                $user_id          = Auth::user()->id;
                $image2_name      = $request->image2->getClientOriginalName();
                $image2_extension = $image2->extension();
                $gen_image2_name  = md5(now() . $user_id . 'logo_name' . $image2_name);
                $new_image2_name  = 'image2_'.$gen_image2_name . '.' . $image2_extension;
                $fited_image2     = Image::make($image2 ->getRealPath())->fit(500, 500);
                $save_image2      = $fited_image2->save('storage/uploads/products/images/' . $new_image2_name, 60);  //save image to server

                if($save_image2) {
                    $product->images()->create(['name' => $new_image2_name]);
                }

            }

            if ($request->hasFile('image3')) { // if there is a logo file then upload the file
                $image3           = $request->image3;
                $user_id          = Auth::user()->id;
                $image3_name      = $request->image3->getClientOriginalName();
                $image3_extension = $image3->extension();
                $gen_image3_name  = md5(now() . $user_id . 'logo_name' . $image3_name);
                $new_image3_name  = 'image3_'.$gen_image3_name . '.' . $image3_extension;
                $fited_image3     = Image::make($image3 ->getRealPath())->fit(500, 500);
                $save_image3      = $fited_image3->save('storage/uploads/products/images/' . $new_image3_name, 60);  //save image to server

                if($save_image3) {
                    $product->images()->create(['name' => $new_image3_name]);
                }

            }

            if ($request->hasFile('image4')) { // if there is a logo file then upload the file
                $image4           = $request->image4;
                $user_id          = Auth::user()->id;
                $image4_name      = $request->image4->getClientOriginalName();
                $image4_extension = $image4->extension();
                $gen_image4_name  = md5(now() . $user_id . 'logo_name' . $image4_name);
                $new_image4_name  = 'image4_'.$gen_image4_name . '.' . $image4_extension;
                $fited_image4     = Image::make($image4 ->getRealPath())->fit(500, 500);
                $save_image4      = $fited_image4->save('storage/uploads/products/images/' . $new_image4_name, 60);  //save image to server

                if($save_image4) {
                    $product->images()->create(['name' => $new_image4_name]);
                }

            }

            if ($request->hasFile('image5')) { // if there is a logo file then upload the file
                $image5           = $request->image5;
                $user_id          = Auth::user()->id;
                $image5_name      = $request->image5->getClientOriginalName();
                $image5_extension = $image5->extension();
                $gen_image5_name  = md5(now() . $user_id . 'logo_name' . $image5_name);
                $new_image5_name  = 'image5_'.$gen_image5_name . '.' . $image5_extension;
                $fited_image5     = Image::make($image5 ->getRealPath())->fit(500, 500);
                $save_image5      = $fited_image5->save('storage/uploads/products/images/' . $new_image5_name, 60);  //save image to server

                if($save_image5) {
                    $product->images()->create(['name' => $new_image5_name]);
                }

            }

            if ($request->hasFile('image6')) { // if there is a logo file then upload the file
                $image6           = $request->image6;
                $user_id          = Auth::user()->id;
                $image6_name      = $request->image6->getClientOriginalName();
                $image6_extension = $image6->extension();
                $gen_image6_name  = md5(now() . $user_id . 'logo_name' . $image6_name);
                $new_image6_name  = 'image6_'.$gen_image6_name . '.' . $image6_extension;
                $fited_image6     = Image::make($image6 ->getRealPath())->fit(500, 500);
                $save_image6      = $fited_image6->save('storage/uploads/products/images/' . $new_image6_name, 60);  //save image to server

                if($save_image6) {
                    $product->images()->create(['name' => $new_image6_name]);
                }

            }
            
            return redirect()->route('all_products')->with([
                'message' => 'New product has been saved.',
                'type'    => 'success'
            ]);

        }

        return redirect()->back()->with([
            'message' => 'Product was not save, there was an error while try to save it',
            'type'    => 'fail'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view_product($id)
    {
        $product      = Product::find($id);
        $supermarkets = Supermarket::all();
        $categories   = Category::all();

        if($product) {
            return view('dashboard.product.view_product', [
                'product'      => $product,
                'supermarkets' => $supermarkets,
                'categories'   => $categories
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Error getting product, the product id might be wrong or you dont have permission to edit the product',
            'type'    => 'fail'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_product($id)
    {
        $product      = Product::find($id);
        $supermarkets = Supermarket::all();
        $categories   = Category::all();
        $types   = Type::all();

        if($product) {
            return view('dashboard.product.edit_product', [
                'product'      => $product,
                'supermarkets' => $supermarkets,
                'categories'   => $categories,
                'types'   => $types
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
    public function update_product(Request $request, $id)
    {
        $validatedData = $request->validate([
            // 'name'         => ['required', 'max:255'],
            // 'weight'       => ['required'],
            // 'price'        => ['required'],
            // 'sales_price'  => ['required'],
            // 'supermarket ' => ['required'],
            // 'category '    => ['required'],
            // 'image1'       => ['required'],
            // // 'image2'       => ['required'],
            // // 'image3'       => ['required'],
            // 'description'  => ['required'],
        ]);

        $product = Product::find($id);

        if($product) {
            $name        = $request->name;
            $weight      = $request->weight;
            $price       = $request->price;
            $sales_price = $request->sales_price;
            $supermarket = $request->supermarket;
            $category    = $request->category;
            $type    = $request->type;
            $description = $request->description;
            
            $product->name           = $name;
            $product->weight         = $weight;
            $product->price          = $price;
            $product->sales_price    = $sales_price;
            $product->supermarket_id = $supermarket;
            $product->category_id    = $category;
            $product->type_id    = $type;
            $product->description    = $description;


            if($product->save()) {
            
                if ($request->hasFile('image1')) { // if there is a logo file then upload the file

                    // first delete the curent image1 from db
                    $product_image1 = $product->get_product_image(1);
                    if($product_image1) {
                        $product->images()->where('name', $product_image1)->delete();
                    }

                    $image1           = $request->image1;
                    $user_id          = Auth::user()->id;
                    $image1_name      = $request->image1->getClientOriginalName();
                    $image1_extension = $image1->extension();
                    $gen_image1_name  = md5(now() . $user_id . 'logo_name' . $image1_name);
                    $new_image1_name  = 'image1_'.$gen_image1_name . '.' . $image1_extension;
                    $fited_image1     = Image::make($image1 ->getRealPath())->fit(500, 500);
                    $save_image1      = $fited_image1->save('storage/uploads/products/images/' . $new_image1_name, 60);  //save image to server
    
                    if($save_image1) {
                        $product->images()->create(['name' => $new_image1_name]);
                    }
    
                }
    
                if ($request->hasFile('image2')) { // if there is a logo file then upload the file

                    // first delete the curent image2 from db
                    $product_image2 = $product->get_product_image(2);
                    if($product_image2) {
                        $product->images()->where('name', $product_image2)->delete();
                    }

                    $image2           = $request->image2;
                    $user_id          = Auth::user()->id;
                    $image2_name      = $request->image2->getClientOriginalName();
                    $image2_extension = $image2->extension();
                    $gen_image2_name  = md5(now() . $user_id . 'logo_name' . $image2_name);
                    $new_image2_name  = 'image2_'.$gen_image2_name . '.' . $image2_extension;
                    $fited_image2     = Image::make($image2 ->getRealPath())->fit(500, 500);
                    $save_image2      = $fited_image2->save('storage/uploads/products/images/' . $new_image2_name, 60);  //save image to server
    
                    if($save_image2) {
                        $product->images()->create(['name' => $new_image2_name]);
                    }
    
                }
    
                if ($request->hasFile('image3')) { // if there is a logo file then upload the file

                    // first delete the curent image3 from db
                    $product_image3 = $product->get_product_image(3);
                    if($product_image3) {
                        $product->images()->where('name', $product_image3)->delete();
                    }

                    $image3           = $request->image3;
                    $user_id          = Auth::user()->id;
                    $image3_name      = $request->image3->getClientOriginalName();
                    $image3_extension = $image3->extension();
                    $gen_image3_name  = md5(now() . $user_id . 'logo_name' . $image3_name);
                    $new_image3_name  = 'image3_'.$gen_image3_name . '.' . $image3_extension;
                    $fited_image3     = Image::make($image3 ->getRealPath())->fit(500, 500);
                    $save_image3      = $fited_image3->save('storage/uploads/products/images/' . $new_image3_name, 60);  //save image to server
    
                    if($save_image3) {
                        $product->images()->create(['name' => $new_image3_name]);
                    }
    
                }

                if ($request->hasFile('image4')) { // if there is a logo file then upload the file

                    // first delete the curent image4 from db
                    $product_image4 = $product->get_product_image(4);
                    if($product_image4) {
                        $product->images()->where('name', $product_image4)->delete();
                    }

                    $image4           = $request->image4;
                    $user_id          = Auth::user()->id;
                    $image4_name      = $request->image4->getClientOriginalName();
                    $image4_extension = $image4->extension();
                    $gen_image4_name  = md5(now() . $user_id . 'logo_name' . $image4_name);
                    $new_image4_name  = 'image4_'.$gen_image4_name . '.' . $image4_extension;
                    $fited_image4     = Image::make($image4 ->getRealPath())->fit(500, 500);
                    $save_image4      = $fited_image4->save('storage/uploads/products/images/' . $new_image4_name, 60);  //save image to server
    
                    if($save_image4) {
                        $product->images()->create(['name' => $new_image4_name]);
                    }
    
                }

                if ($request->hasFile('image5')) { // if there is a logo file then upload the file

                    // first delete the curent image5 from db
                    $product_image5 = $product->get_product_image(5);
                    if($product_image5) {
                        $product->images()->where('name', $product_image5)->delete();
                    }

                    $image5           = $request->image5;
                    $user_id          = Auth::user()->id;
                    $image5_name      = $request->image5->getClientOriginalName();
                    $image5_extension = $image5->extension();
                    $gen_image5_name  = md5(now() . $user_id . 'logo_name' . $image5_name);
                    $new_image5_name  = 'image5_'.$gen_image5_name . '.' . $image5_extension;
                    $fited_image5     = Image::make($image5 ->getRealPath())->fit(500, 500);
                    $save_image5      = $fited_image5->save('storage/uploads/products/images/' . $new_image5_name, 60);  //save image to server
    
                    if($save_image5) {
                        $product->images()->create(['name' => $new_image5_name]);
                    }
    
                }

                if ($request->hasFile('image6')) { // if there is a logo file then upload the file

                    // first delete the curent image6 from db
                    $product_image6 = $product->get_product_image(6);
                    if($product_image6) {
                        $product->images()->where('name', $product_image6)->delete();
                    }

                    $image6           = $request->image6;
                    $user_id          = Auth::user()->id;
                    $image6_name      = $request->image6->getClientOriginalName();
                    $image6_extension = $image6->extension();
                    $gen_image6_name  = md5(now() . $user_id . 'logo_name' . $image6_name);
                    $new_image6_name  = 'image6_'.$gen_image6_name . '.' . $image6_extension;
                    $fited_image6     = Image::make($image6 ->getRealPath())->fit(500, 500);
                    $save_image6      = $fited_image6->save('storage/uploads/products/images/' . $new_image6_name, 60);  //save image to server
    
                    if($save_image6) {
                        $product->images()->create(['name' => $new_image6_name]);
                    }
    
                }
                
                return redirect()->back()->with([
                    'message' => 'Product was updated Successfuly',
                    'type'    => 'success'
                ]);
    
            }


        }

        return redirect()->back()->with([
            'message' => 'There was an error updating your product',
            'type'    => 'fail'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_product($id)
    {
        $product = Product::find($id);

        //if a product with that id was found
        if($product) {

            // get all the images belonging to the product
            $product_images = $product->images;

            // if there is any image then delete them first
            if($product_images) {
                $product->images()->delete();
            }

            // now delete the product
            $product->delete();
            
            return redirect()->back()->with([
                'message' => 'Supermarket was deleted Successfuly',
                'type'    => 'success'
            ]);

        }

        return redirect()->back()->with([
            'message' => 'There was no suppermarket with this id',
            'type'    => 'fail'
        ]);
    }

    
}

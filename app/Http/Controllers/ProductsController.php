<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Supermarket;
use App\Type;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // return $request;

        $products = Product::orderBy('created_at', 'desc')->get();
        if(!$products) {
            return abort(404);
        }

        if(isset($request->product_name) && $request->product_name != '') {
            $products = Product::where('name', 'like', '%'.$request->product_name.'%')->orderBy('created_at', 'desc')->get();
        }

        if(isset($request->category_name) && $request->category_name != '') {
            $category =Category::where('name', $request->category_name)->first();
            $products = $products->where('category_id', $category->id);
        }

        if(isset($request->type_id) && $request->type_id != '') {
            $type = Type::find($request->type_id);
            if($type) {
                $products = $products->where('type_id', $type->id);
            }
        }

        if(isset($request->min_price) && !is_null($request->min_price) && is_numeric($request->min_price)) {
            $products = $products->where('price', '>=', $request->min_price);
        }

        if(isset($request->max_price) && !is_null($request->max_price) && is_numeric($request->max_price && $request->max_price > 0)) {
            $products = $products->where('price', '<=', $request->max_price);
        }

        if(isset($request->store_id) && $request->store_id != '') {
            $products = $products->where('supermarket_id', $request->store_id);
        }
        
        return view('customer.products', [
            'products' => $products
        ]);

    }

    public function supermarket_categories(Request $request) {

        $data = [];
        $supermarket_id = $request->id;

        $categories = Category::all();

        foreach($categories as $category) {
            $products = $category->products()->where('supermarket_id', $supermarket_id)->get();

            if($products->count() != 0) {
                $data[] = $category;
            }
            
        }

        return response()->json($data);
        
    }

    public function view_single_product($slug) {

        $product = Product::where('slug', $slug)->first();

        if($product) {
            return view('customer.product', [
                'product' => $product
            ]);
        }
        
    }

    public function stores(Request $request)
    {
        $stores = Supermarket::all();

        if(isset($request->category_name) && $request->category_name != '') {
            $category =Category::where('name', $request->category_name)->first();
            $category_stores = [];
            foreach($stores as $store) {
                $category_products = $store->products->where('category_id', $category->id);
                if($category_products->count()) {
                    $category_stores[] = $store;
                }
            }
            $stores = collect($category_stores);
        }

        return view('customer.stores', [
            'stores' => $stores
        ]);
    }

    public function store(Request $request, $slug)
    {
        $store = Supermarket::where('slug', $slug)->first();
        if(!$store) {
            return abort(404);
        }

        $store_products = $store->products()->orderBy('created_at', 'desc')->get();

        if(isset($request->category_name) && $request->category_name != '') {
            $category =Category::where('name', $request->category_name)->first();
            $store_products = $store_products->where('category_id', $category->id);
        }

        if(isset($request->min_price) && !is_null($request->min_price) && is_numeric($request->min_price)) {
            $store_products = $store_products->where('price', '>=', $request->min_price);
        }

        if(isset($request->max_price) && is_numeric($request->max_price) && $request->max_price >0) {
            $store_products = $store_products->where('price', '<=', $request->max_price);
        }

        return view('customer.store', [
            'store' => $store,
            'store_products' => $store_products
        ]);
    }

    public function categories()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(12);
        return view('customer.categories', [
            'categories' =>$categories
        ]);
    }


}

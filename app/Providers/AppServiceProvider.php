<?php

namespace App\Providers;

use App\Area;
use App\Category;
use App\Product;
use App\State;
use App\Supermarket;
use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $categories   = Category::all();
        $supermarkets = Supermarket::all();
        $products     = Product::orderBy('created_at', 'desc')->paginate(12);
        $states       = State::orderBy('name', 'asc')->get();
        $areas        = Area::orderBy('name', 'asc')->get();

        $agemts = User::where([
            ['role', '=', 'agent'],
            ['email_verified_at', '!=', null],
        ])->orderBy('created_at', 'desc')->paginate(12);

        $subadmins = User::where([
            ['role', '=', 'subadmin']
        ])->orderBy('created_at', 'desc')->paginate(12);

        

        View::share('categories', $categories);
        View::share('supermarkets', $supermarkets);
        View::share('products', $products);
        View::share('agents', $agemts);
        View::share('subadmins', $subadmins);
        View::share('states', $states);
        View::share('areas', $areas);


        // some usefull variables
        if(!isset($_GET['category_name'])){
            $_GET['category_name']  = '';
        }

        if(!isset($_GET['type_id'])){
            $_GET['type_id']  = '';
        }

        if(!isset($_GET['price_mitter'])){
            $_GET['price_mitter']  = '';
        }

        if(!isset($_GET['min_price'])){
            $_GET['min_price']  = 0;
        }

        if(!isset($_GET['max_price'])){
            $_GET['max_price']  = 0;
        }

        if(!isset($_GET['product_name'])){
            $_GET['product_name']  = '';
        }

        if(!isset($_GET['store_id'])){
            $_GET['store_id']  = '';
        }

        if(!isset($_GET['page'])){
            $_GET['page']  = 1;
        }

    }
}

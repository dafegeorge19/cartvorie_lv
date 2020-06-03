<?php

// use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::view('demo', 'email.contact');
Route::get('getDemoAreas', 'TestController@getAreas');


Route::get('/', 'HomeController@index');
Route::permanentRedirect('/home', '/');

// Pages
Route::view('/about_us', 'customer.about_us');
Route::view('/delivery_terms', 'customer.delivery_terms');
Route::view('/terms_and_conditions', 'customer.terms_and_conditions');


// my orders
Route::get('/orders', 'HomeController@orders')->middleware('auth');
Route::get('/order_details/{order_id}', 'HomeController@order_details')->middleware('auth');

// profile
Route::get('/edit_profile', 'ProfileController@edit')->middleware('auth');
Route::post('/update_profile', 'ProfileController@update')->middleware('auth');

// contact us page
Route::get('/contact_us', 'ContactController@index');
Route::post('/send_contact', 'ContactController@send_contact');

// view products
Route::get('/products', 'ProductsController@index');
Route::get('/product/{slug}', 'ProductsController@view_single_product');

// view stores
Route::get('/stores', 'ProductsController@stores');
Route::get('/store/{slug}', 'ProductsController@store');

// view 
Route::get('/categories', 'ProductsController@categories');
Route::post('/supermarket_categories', 'ProductsController@supermarket_categories');

Route::post('/get_all_states', 'Auth\RegisterController@get_all_states');

//area routes
Route::post('/get_state_areas', 'AreaController@get_state_areas'); // for ajax call only

//mailing list
Route::post('/store_mail', 'MailingListController@store_mail');

// address
Route::post('/save_address', 'AddressController@save');
Route::post('/delete_address', 'AddressController@delete');

// cart routes
Route::get('/cart', 'CartController@cart');
Route::post('/add_to_cart', 'CartController@add_to_cart');
Route::post('/remove_from_cart', 'CartController@remove_from_cart');
Route::post('/decrease_cart', 'CartController@decrease_cart');
Route::post('/increase_cart', 'CartController@increase_cart');
Route::post('/get_all_cart_products', 'CartController@get_all_cart_products');
// end cart routs

//checkout and pay routes
Route::get('/checkout', 'PaymentController@checkout');
Route::post('/checkout_login', 'PaymentController@checkout_login')->middleware('guest');
Route::get('/checkout_logout', 'PaymentController@checkout_logout')->middleware('auth');
Route::post('/get_user_addresses', 'PaymentController@get_user_addresses');
Route::post('/init_payment', 'PaymentController@init_payment');
Route::post('/store_order', 'PaymentController@store_order');
Route::get('/order_completed/{order_id}', 'PaymentController@order_completed');


Route::view('test', 'test');


//routes for admin dashbaords
    //admin dashboard routes
Route::get('admin/dashboard', 'Dashboard\DashboardController@index')->middleware('auth');
    //admin supermarket routes
Route::get('admin/all_supermarkets', 'Dashboard\SupermarketController@index')->name('all_supermarkets')->middleware('auth');
Route::get('admin/add_supermarket', 'Dashboard\SupermarketController@add_supermarket')->middleware('auth');
Route::post('admin/store_supermarket', 'Dashboard\SupermarketController@store_supermarket')->middleware('auth');
Route::get('admin/edit_supermarket/{id}', 'Dashboard\SupermarketController@edit_supermarket')->middleware('auth');
Route::post('admin/update_supermarket/{id}', 'Dashboard\SupermarketController@update_supermarket')->middleware('auth');
Route::get('admin/delete_supermarket/{id}', 'Dashboard\SupermarketController@delete_supermarket')->middleware('auth');
    //admin agent routes
Route::get('admin/all_agents', 'Dashboard\AgentController@index')->name('all_agents')->middleware('auth');
Route::get('admin/add_agent', 'Dashboard\AgentController@add_agent')->middleware('auth');
Route::post('admin/store_agent', 'Dashboard\AgentController@store_agent')->middleware('auth');
Route::get('admin/edit_agent/{id}', 'Dashboard\AgentController@edit_agent')->name('edit_agent')->middleware('auth');
Route::post('admin/update_agent/{id}', 'Dashboard\AgentController@update_agent')->middleware('auth');
Route::get('admin/view_agent/{id}', 'Dashboard\AgentController@view_agent')->middleware('auth');
Route::get('admin/delete_agent/{id}', 'Dashboard\AgentController@delete_agent')->middleware('auth');
Route::get('admin/agent_status/{id}', 'Dashboard\AgentController@agent_status')->middleware('auth');
    //admin product routes
Route::get('admin/all_products', 'Dashboard\ProductController@index')->name('all_products')->middleware('auth');
Route::get('admin/add_product', 'Dashboard\ProductController@add_product')->middleware('auth');
Route::post('admin/store_product', 'Dashboard\ProductController@store_product')->middleware('auth');
Route::get('admin/edit_product/{id}', 'Dashboard\ProductController@edit_product')->name('edit_product')->middleware('auth');
Route::post('admin/update_product/{id}', 'Dashboard\ProductController@update_product')->middleware('auth');
Route::get('admin/view_product/{id}', 'Dashboard\ProductController@view_product')->middleware('auth');
Route::get('admin/delete_product/{id}', 'Dashboard\ProductController@delete_product')->middleware('auth');
    //admin category routes
Route::get('admin/all_categories', 'Dashboard\CategoryController@index')->name('all_categories')->middleware('auth');
Route::get('admin/add_category', 'Dashboard\CategoryController@add_category')->middleware('auth');
Route::post('admin/store_category', 'Dashboard\CategoryController@store_category')->middleware('auth');
Route::get('admin/edit_category/{id}', 'Dashboard\CategoryController@edit_category')->name('edit_category')->middleware('auth');
Route::post('admin/update_category/{id}', 'Dashboard\CategoryController@update_category')->middleware('auth');
Route::get('admin/delete_category/{id}', 'Dashboard\CategoryController@delete_category')->middleware('auth');
Route::get('admin/feature_catgory/{id}', 'Dashboard\CategoryController@feature_catgory')->middleware('auth');
    // types
Route::get('admin/all_category_types/{category_id}', 'Dashboard\TypeController@all_category_types')->name('all_category_types')->middleware('auth');
Route::get('admin/add_type', 'Dashboard\TypeController@add_type')->middleware('auth');
Route::post('admin/store_type', 'Dashboard\TypeController@store_type')->middleware('auth');
Route::get('admin/edit_type/{id}', 'Dashboard\TypeController@edit_type')->name('edit_type')->middleware('auth');
Route::post('admin/update_type/{id}', 'Dashboard\TypeController@update_type')->middleware('auth');
Route::get('admin/delete_type/{id}', 'Dashboard\TypeController@delete_type')->middleware('auth');
Route::post('/get_category_type', 'Dashboard\TypeController@get_category_type'); // for ajax call only
    //admin customer routes
Route::get('admin/all_customers', 'Dashboard\CustomerController@index')->name('all_customers')->middleware('auth');
    //admin subadmin routes
Route::get('admin/all_subadmins', 'Dashboard\SubadminController@index')->name('all_subadmins')->middleware('auth');
Route::get('admin/add_subadmin', 'Dashboard\SubadminController@add_subadmin')->middleware('auth');
Route::post('admin/store_subadmin', 'Dashboard\SubadminController@store_subadmin')->middleware('auth');
Route::get('admin/edit_subadmin/{id}', 'Dashboard\SubadminController@edit_subadmin')->name('edit_subadmin')->middleware('auth');
Route::post('admin/update_subadmin/{id}', 'Dashboard\SubadminController@update_subadmin')->middleware('auth');
Route::get('admin/view_subadmin/{id}', 'Dashboard\SubadminController@view_subadmin')->middleware('auth');
Route::get('admin/delete_subadmin/{id}', 'Dashboard\SubadminController@delete_subadmin')->middleware('auth');
Route::get('admin/subadmin_status/{id}', 'Dashboard\SubadminController@subadmin_status')->middleware('auth');
    //admin order routes
Route::get('admin/all_orders', 'Dashboard\OrderController@index')->name('all_orders')->middleware('auth');
Route::get('admin/order_delivered/{id}', 'Dashboard\OrderController@order_delivered')->middleware('auth');
    //admin location routes
Route::get('admin/all_states', 'Dashboard\LocationController@index')->middleware('auth');
Route::get('admin/view_state_areas/{state_id}', 'Dashboard\LocationController@view_state_areas')->middleware('auth');
Route::get('admin/add_state', 'Dashboard\LocationController@add_state')->middleware('auth');
Route::get('admin/add_area', 'Dashboard\LocationController@add_area')->middleware('auth');
Route::post('admin/store_state', 'Dashboard\LocationController@store_state')->middleware('auth');
Route::post('admin/store_area', 'Dashboard\LocationController@store_area')->middleware('auth');
Route::get('admin/edit_state/{id}', 'Dashboard\LocationController@edit_state')->middleware('auth');
Route::get('admin/edit_area/{id}', 'Dashboard\LocationController@edit_area')->middleware('auth');
Route::post('admin/update_state/{id}', 'Dashboard\LocationController@update_state')->middleware('auth');
Route::post('admin/update_area/{id}', 'Dashboard\LocationController@update_area')->middleware('auth');
Route::get('admin/delete_state/{id}', 'Dashboard\LocationController@delete_state')->middleware('auth');
Route::get('admin/delete_area/{id}', 'Dashboard\LocationController@delete_area')->middleware('auth');

// agent
Route::get('agent/all_agents', 'AgentController@index');
Route::get('agent/become_an_agent', 'AgentController@become_an_agent');
Route::post('agent/store_agent', 'AgentController@store_agent');


// file routes
Route::get('agent/download_cv/{cv_name}/{agent_name}', 'Dashboard\FileController@download_cv')->middleware('auth');


Auth::routes(['verify' => true]);

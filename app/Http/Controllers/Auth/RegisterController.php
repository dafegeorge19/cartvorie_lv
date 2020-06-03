<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\State;
use App\Cities;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    private function redirectTo()
    {
        return '/';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'other_names' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'state' => ['required', 'exists:states,id'],
            'area' => ['required', 'exists:areas,id'],
            'street_address' => ['required', 'string', 'max:255'],
            'agreeTerms' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'other_names' => $data['other_names'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'role' => 'customer',
            'password' => Hash::make($data['password']),

            
        ]);

        
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        DB::table('addresses')->insert([
            'user_id' => Auth::user()->id,
            'state_id' => $request->state,
            'area_id' => $request->area,
            'street_Address' => $request->street_address,
        ]);
    }

    public function get_all_states (Request $request) {

        if($request->ajax()){
            
            $all_states = State::all();

            return response()->json($all_states);
        }
    }

    public function get_state_areas (Request $request) {

        if($request->ajax()){

            $state_id = $request->id;

            if($state_id) {
                $state = State::find($state_id);
                if($state) {
                    $state_areas = $state->areas;
                    return response()->json($state_areas);
                }
            }

            return response()->json();
            
        }
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
use DB;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use RealRashid\SweetAlert\Facades\Alert;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function user_create(RegisterRequest $request) 
    {

        // $user = User::create($request->validated());
        // auth()->login($user);
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'phone' => 'required'
        ]);
        if ($validator->fails()){
            return redirect('/')->with($validator->errors());
        }
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $user->assignRole('user');
        auth()->login($user);
        Alert::success('Account successfully registered.');
        return redirect('/');
    }
    // public function user_create(Request $request)
    // {
    
    //    $validator = Validator::make($request->all(), [
    //       'name' => 'required|unique:users,name',
    //       'email' => 'required|email|unique:users,email',
    //       'password' => 'required|min:6',
    //       'phone' => 'required'
    //   ]);
    //   if ($validator->fails()){
    //       return response()->json([
    //          "status" => false,
    //          "errors" => $validator->errors()
    //       ]);
    //   }
    //   $data = $request->all();
    //   dd($data);
    //   $data['password'] = Hash::make($data['password']);
    //   $user = User::create($data);
    //   $user->assignRole('user');
    //   auth()->login($user);
    //   return response()->json([
    //       "status" => true, 
    //       "redirect" => url("/profile")
    //   ]);
    
    // }
}

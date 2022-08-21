<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
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
            'firm' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'string', 'max:255'],
            'city' =>  ['required',  'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
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

        $lastUserID = User::orderBy("id", "DESC")->pluck("id")->first();
        $thisUserId = $lastUserID+1;

        Notification::create([
            'business' => $thisUserId,
            'message' => $data['name']." hat ein <a href='adminPanel/profile/".$thisUserId."'>Konto</a> beim b2b-Portal erstellt",
        ]);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'firmName' => $data['firm'],
            'zip' => $data['zip'],
            'city' => $data['city'],
            'street' => $data['street'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }
}

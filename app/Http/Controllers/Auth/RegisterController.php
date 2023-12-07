<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;



    class RegisterController extends Controller
    {
        use RegistersUsers;

        protected $redirectTo = RouteServiceProvider::HOME;

        public function __construct()
        {
            $this->middleware('guest');
        }

        protected function validator(array $data)
    {
        return Validator::make($data, [
            'users_fullname' => ['required', 'string', 'max:255'],
            'users_username' => ['required', 'string', 'max:50', 'unique:users'],
            'users_email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'users_fullname' => $data['users_fullname'],
            'users_username' => $data['users_username'],
            'users_email' => $data['users_email'],
            'users_password' => Hash::make($data['password']),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/beranda');
    }
}



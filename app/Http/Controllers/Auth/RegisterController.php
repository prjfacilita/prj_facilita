<?php

namespace App\Http\Controllers\Auth;

use App\Login;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
Use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{


    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
            'email' => 'required|string|max:255|unique:login',
            'password' => 'required|string|max:255|',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Login
     */
    protected function create(array $data)
    {
        $password = Hash::make($data['password']);
        return Login::create([
            'email' => $data['email'],
            'password' => $password,
            'permissao' => 1,
            'cpf' => $data['cpf'],
            'status' => 1,
        ]);
    }
}
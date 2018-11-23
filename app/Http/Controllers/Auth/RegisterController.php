<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


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

        /* $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('permissao');
            $table->string('cpf')->unique();
            $table->integer('status');
            $table->rememberToken();
            $table->timestamps();*/
        return Validator::make($data, [
            'email' => 'required|string|max:255|unique:login',

            'cpf' => 'required|string|max:255|unique:login'


        ]);



        // após validar enviar o email


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
         Login::create([
            'email' => $data['email'],
//            'password' =>  Hash::make($data['password']),
            'permissao' => 1,
            'cpf' => $data['cpf'],
            'status' => 1,
        ]);





//        $user = auth()->user();
////        Mail::to($user)->send(new Login($user));
//
//        Mail::send('emails.confirmacao', ['user' => $user], function ($m) use ($user) {
//            $m->from('rodrigo@apple.com', 'Facilita');
//
//            $m->to('rtelesc@gmail.com', $user->name)->subject($data['cpf']);
//        });

        Mail::send('emails.confirmacao', ['title' => 'teste', 'message' => 'teste'], function ($message)
        {
            $message->from('no-reply@scotch.io', 'Scotch.IO');
            $message->to('batman@batcave.io');
        });


    }
}
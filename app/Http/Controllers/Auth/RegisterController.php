<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use http\Env\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

use Illuminate\View\View;

use Illuminate\Support\Facades\Input;


class RegisterController extends Controller
{


    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/public/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function PreCadastro(){


        return view('auth.register',
                    ['email'        => Input::get('simulation-email'),
                    'nome'          => Input::get('simulation-name'),
                    'cpf'           => Input::get('simulation-cpf'),
                    'finalidade'    => Input::get('finalidade')

                ]);
//        return Input::get('simulation-email');
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

            'cpf' => 'required|string|max:255|unique:login|formato_cpf'


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




        $rand = $this->generateRandomString(6);


        $user = Login::create([
            'email' => $data['email'],
//            'password' =>  Hash::make($data['password']),
            'permissao' => 1,
            'cpf' => $data['cpf'],
            'status' => 1,
            'confirmation_code' => $rand,
        ]);

        Mail::send('emails.confirmacao', ['title' => 'teste', 'rand' =>  $rand], function ($message)
        {
            $message->from('rtelesc@gmail.com', 'Scotch.IO');
            $message->to('rtelesc@gmail.com');
        });



//        dispatch(new WelcomeEmail($user));





        return new $user;


    }



    public function generateRandomString($length) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
<?php

namespace Illuminate\Foundation\Auth;

use App\Simulacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;


trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm(Request $request)
    {



        if($request->allow_register == 1){

            return view('auth.register');
        }else{

            return view('index');
        }


    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {



        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        /*pegar email */

        $getID = DB::table('login')
            ->where('email', '=',  $request->email)
            ->where('cpf', '=',  $request->cpf)
//                ->orderBy('quantity', 'asc')
            ->first();


//        return $getID->id;

//        return $request->simulacao_id
//
//porrag;


        try{
            //Find the user object from model if it exists
            $simulacao= Simulacao::findOrFail($request->simulacao_id);

            //$request contain your post data sent from your edit from
            //$user is an object which contains the column names of your table

            //Set user object attributes
            $simulacao->user_id =  $getID->id;


            // Save/update user.
            // This will will update your the row in ur db.
            $simulacao->save();

            return view('api.ativacao', ['name' =>  $request->email, 'params' => $request->all()]);
        }
        catch(ModelNotFoundException $err){
            //Show error page
        }



        // pegar o id do usuario e inserir na table simulacao_id

        /**///simulacao_id e editar


    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
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
        //
        return 'ok';
    }
}

<?php
namespace App\Http\Controllers\Auth;





use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
Use Illuminate\Support\Facades\Hash;
use App\Login;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\DB;
//use App\Http\Controllers\Controller;
use App\Http\Controllers\EmprestimoController;
use Illuminate\Support\Facades\Session;
//use \Session;

class LoginController extends Controller
{

    protected $table = "login";
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {


        //validar os campos informados pelo usuario

        $rules = array(
            'email' => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        $validator = Validator::make(Input::all(), $rules);


        /// se o validador retornar erro
        ///
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator)// send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {



            // create our user data for the authentication
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );



            $selectIfActive = DB::table('login')
                ->where('status', '=', '1')
                ->where('email', '=',  $userdata['email'])
//                ->orderBy('quantity', 'asc')
                ->first();


            if(count($selectIfActive) > 0){

                if($selectIfActive->status == 1){

                    return view('api.ativacao',
                        ['email' =>  $userdata['email']]
                    );

                }
            }

            // se o status do usuário for 1, ele ainda não esta com o token confirmado



            //criar condição para enviar novamente o código  caso dê erro



            // verificar se o usuário esta ativado

            // attempt to do the login
            if (Auth::attempt($userdata)) {


                /// verificar se o usuário já esta ativado
                ///

                $key = new EmprestimoController();
                $token = (string) $key->ConfiguracoesAPI();




                return redirect()->intended('pedido');


            } else {

                // validation not successful, send back to form

               // echo 'erro!';
                return Redirect::to('/prj_facilita/public/login');

            }

        }
    }
    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        // Customization: validate if client status is active (1)
        $credentials['status'] = 1;
        return $credentials;
    }
    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $field
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request, $trans = 'auth.failed')
    {
        $errors = [$this->username() => trans($trans)];
        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }

    public function AtivacaoUsuario(Request $request, $code){




        // create our user data for the authentication
        $userdata = array(
            'confirmation_code' => $request->code,
        );



        // buscar email através do código de ativação

        $selectIfActive = DB::table('login')
            ->where('status', '=', '1')
            ->where('confirmation_code', '=',  $userdata['confirmation_code'])
//                ->orderBy('quantity', 'asc')
            ->first();

        //validar se retornou resultados
        if(count($selectIfActive) == 0){

            return 'o código que você inseriu não existe';
        }

        //atualizar senha e autorizar acesso


        return view('auth.cadastrar_senha',
            ['confirmation_code' => $selectIfActive->confirmation_code],
            ['email' => $selectIfActive->email]
        );

    }



    public function CriarSenha(Request $request){

//        return print_r($request);

        // tratar a senha,  update na senha e no status, que vai para status 2



        $rules = array(
            'email' => 'required|email', // make sure the email is an actual email
            'confirmation_code' => 'required|alphaNum|min:6' // password can only be alphanumeric and has to be greater than 3 characters
        );

        $validator = Validator::make(Input::all(), $rules);


        /// se o validador retornar erro
        ///
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator)// send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

           // update password e status


            if($request->senha == $request->confirm_password){
                DB::table('login')
                    ->where('email', $request->email)
                    ->update(array('status' => 2,  'password' =>  Hash::make($request->senha)));


                return redirect()->intended('home');
            }


        }

    }


    public function reset_code(Request $request){

      $this->AtivacaoUsuario($request);
    }

    public function ConfirmarUserLink(Request $request, $code){


        return $request->code; // validar o código

    }




}
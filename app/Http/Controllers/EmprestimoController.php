<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use GuzzleHttp\Client;
//use \kamermans\OAuth2\GrantType\ClientCredentials;
//use \kamermans\OAuth2\OAuth2Subscriber;

use kamermans\OAuth2\GrantType\ClientCredentials;
use kamermans\OAuth2\OAuth2Middleware;
use GuzzleHttp\HandlerStack;
use kamermans\OAuth2\GrantType\NullGrantType;
/*
 *
 * http://www.befirstcode.com/2017/03/integrate-swagger-in-laravel-project-l5.html
 * */

/**
 * Class EmprestimoController
 *
 * @package App\Http\Controllers
 *
 * @SWG\Swagger(
 *     basePath="",
 *     host="localhost:8000",
 *     schemes={"http"},
 *     @SWG\Info(
 *         version="0.1",
 *         title="Emprestimo Facilita API",
 *         @SWG\Contact(name="Rodrigo Teles Correia", url="rtelesc@gmail.com"),
 *     ),
 *     @SWG\Definition(
 *         definition="Error",
 *         required={"code", "message"},
 *         @SWG\Property(
 *             property="code",
 *             type="integer",
 *             format="int32"
 *         ),
 *         @SWG\Property(
 *             property="message",
 *             type="string"
 *         )
 *     )
 * )
 */
class EmprestimoController extends Controller
{

    public static function URL_ENDPOINT(){
        return 'https://c2gvw4lxh9.execute-api.sa-east-1.amazonaws.com/hmg/';
    }

    public static function URL_TOKEN_API(){
        return 'https://c2gvw4lxh9.execute-api.sa-east-1.amazonaws.com/hmg/oauth2/token';
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        /*Fazer consulta na api do banco cbss para retornar os dados do contrato e também limites*/
//        $this->ConfiguracoesAPI();
        return view('emprestimo.pedido');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     *
     */


    public function ConfiguracoesAPI(){

        // CHAMADA API FUNCIONANDO
//
//
//        $client = new Client();
//        $response = $client->get('https://c2gvw4lxh9.execute-api.sa-east-1.amazonaws.com/hmg/api/v1/ep/dominios/bancos', [
//            'form_params' =>
//                [
////                    'code'          => $code,
//                    'client_id'     => '721c4075-2c6f-41dd-b609-3d7c5aabb7fd',
//                    'client_secret' => 'uvMl9-rRr_Nexx4LuZYsgaRedsS7iLVEl5j2aBqO',
//                    'redirect_uri'  => 'https://c2gvw4lxh9.execute-api.sa-east-1.amazonaws.com/hmg',
//                    'grant_type'    => 'authorization_code'
//                ]
//        ]);
        $uri = $this->URL_TOKEN_API();
        $clientId = '721c4075-2c6f-41dd-b609-3d7c5aabb7fd';
        $secret = 'uvMl9-rRr_Nexx4LuZYsgaRedsS7iLVEl5j2aBqO';

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $uri, [
                'headers' =>
                    [
                        'Accept' => 'application/json',
                        'Accept-Language' => 'en_US',
                        'Content-Type' => 'application/x-www-form-urlencoded',
                    ],
                'body' => 'grant_type=client_credentials',

                'auth' => [$clientId, $secret, 'basic']
            ]
        );

        $data = json_decode($response->getBody(), true);

        $token = (string) $data['access_token'];


        session()->put('token_key',  $token);

        return $token;



    }


    /*
     *
//        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsIng1dCI6Im9uRXlwQllvVWY1QnFjYXFMOHRtWEZrQTRxcyJ9.eyJhdWQiOiJtaWNyb3NvZnQ6aWRlbnRpdHlzZXJ2ZXI6NzIxYzQwNzUtMmM2Zi00MWRkLWI2MDktM2Q3YzVhYWJiN2ZkIiwiaXNzIjoiaHR0cDovL2ZzLmNic3NkaWdpdGFsLmNvbS5ici9hZGZzL3NlcnZpY2VzL3RydXN0IiwiaWF0IjoxNTQ0NDUyMzE3LCJleHAiOjE1NDQ0NTU5MTcsImNsaWVudF9hcHAiOiJGYWNpbGl0YSBFUCIsImNsaWVudF9jb21wYW55IjoiRmFjaWxpdGEiLCJhcHB0eXBlIjoiQ29uZmlkZW50aWFsIiwiYXBwaWQiOiI3MjFjNDA3NS0yYzZmLTQxZGQtYjYwOS0zZDdjNWFhYmI3ZmQiLCJhdXRobWV0aG9kIjoiaHR0cDovL3NjaGVtYXMubWljcm9zb2Z0LmNvbS93cy8yMDA4LzA2L2lkZW50aXR5L2F1dGhlbnRpY2F0aW9ubWV0aG9kL3Bhc3N3b3JkIiwiYXV0aF90aW1lIjoiMjAxOC0xMi0xMFQxNDozMTo1Ny4wNzNaIiwidmVyIjoiMS4wIn0.W9ykvNf3P4s9hrZFm8ajCZtESlaAffnJfllSU6tr1Q6HREHdiEUKhexiogzvNd-ALPHl7qfoRMh2N6cAL5MUZSApbp8YFyR3LUGsk6k1RRPIHvWXGXJR6C3DLFQ3TbERWF_oTzQrM-pdV5SEkwszJocBDj-nds3UbgqIlI03CCBOmjfJgKhDpH63QMbFR4F7rGJLN3QqNcpaNkuYRNt4bb36ZGSwCgyyCsvSV0xL4skW3vU9eO6q7dE-9m_OS74NAB7XFFsuEp3jxU5ooKpiVPwY5x-XCmaRrQDgoXnLkVVttJtxTafQ8us4sZJQ-SJ7fRi6bipv61nOQba7ucuz5g';

       $client =   new Client([
            'base_uri' => 'https://c2gvw4lxh9.execute-api.sa-east-1.amazonaws.com/hmg/api/v1/ep/dominios/bancos',
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json',
            ],
        ]);


      $teste  =  $client->request('GET', 'https://c2gvw4lxh9.execute-api.sa-east-1.amazonaws.com/hmg/api/v1/ep/dominios/bancos');


        echo $teste->getStatusCode();

        echo $teste->getBody();

     *
     * */
    public function PedirEmprestimo(Request $request){

        /*Consultar API*/

        $this->ConfiguracoesAPI();

        //        echo session('token_key');
        return view('emprestimo.pedido');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Get(
     *     path="/api/emprestimo2",
     *     description="Returns dashboard overview.",
     *     operationId="api.emprestimo2.index",
     *     produces={"application/json"},
     *     tags={"emprestimo"},
     *     @SWG\Response(
     *         response=200,
     *         description="Dashboard overview."
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */

    public function get(){
        return response()->json([
            'result'    => [
                'statistics' => [
                    'users' => [
                        'name'  => 'Name',
                        'email' => 'user@example.com'
                    ]
                ],
            ],
            'message'   => '',
            'type'      => 'success',
            'status'    => 0
        ]);
    }
}

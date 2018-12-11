<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SimulacaoController extends Controller
{

    public function __construct()
    {

        $simulacao = new EmprestimoController();
        $simulacao->ConfiguracoesAPI();
//        EmprestimoController::ConfiguracoesAPI();
//        $this->middleware('auth');
    }

    public function Simular(Request $request){



        $token = session('token_key');

        $client =   new Client([
            'base_uri' => EmprestimoController::URL_TOKEN_API(),
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json',
            ],
        ]);



        $teste  =  $client->request('POST', EmprestimoController::URL_ENDPOINT(). 'api/v1/ep/simuladores',
            [
                \GuzzleHttp\RequestOptions::JSON => ["valorSolicitado" => $request->ValorSolicitado,
                  "qteParcelas" => [
                            10,
                        ],
                  "taxaJurosMensal" => '0.55',
                  "dataPrimeiraParcela" => "2019-01-20",
                  "tarifaCadastro" => '5.99']
            ]);



        return $teste->getBody();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


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
}

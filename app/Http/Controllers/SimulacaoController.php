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


    public function VerificarDataMes($dataPrimeiraParcela, $dateNow){


//        $dt_atual		= date("Y-m-d"); // data atual
        $timestamp_dt_atual 	= strtotime($dateNow); // converte para timestamp Unix

        $dt_expira		= "2012-10-05"; // data de expiração do anúncio
        $timestamp_dt_expira	= strtotime($dt_expira); // converte para timestamp Unix

// data atual é maior que a data de expiração
        if ($timestamp_dt_atual > $timestamp_dt_expira) // true
            echo  "Seu anuncio expirou! Deseja renovar?";
        else // false
            echo "Anuncio ativo";
    }
    public function Simular(Request $request){



        //fazer chamada do token
        $simulacao = new EmprestimoController();
        $token = $simulacao->ConfiguracoesAPI();

//        $token = session('token_key');

        $client =   new Client([
            'base_uri' => EmprestimoController::URL_TOKEN_API(),
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json',
            ],
        ]);



//        $data = $this->VerificarDataMes($request->dataPrimeiraParcela, date('Y-m-d',strtotime("+30 days")));

        $retorno01  =  $client->request('POST', EmprestimoController::URL_ENDPOINT(). 'api/v1/ep/simuladores',
            [
                \GuzzleHttp\RequestOptions::JSON => ["valorSolicitado" => number_format($request->valorSolicitado, 2, '.', ''),
                  "qteParcelas" => [
                            $request->qteParcelas,
                        ],
                  "taxaJurosMensal" => '5.99',
                  "dataPrimeiraParcela" =>  date('Y-m-d',strtotime("+30 days")) ,
                  "tarifaCadastro" => '5.99']
            ]);

//        $retorno02 =  $client->request('POST', EmprestimoController::URL_ENDPOINT(). 'api/v1/ep/simuladores',
//            [
//                \GuzzleHttp\RequestOptions::JSON => ["valorSolicitado" => number_format($request->valorSolicitado, 2, '.', ''),
//                    "qteParcelas" => [
//                        $request->qteParcelas,
//                    ],
//                    "taxaJurosMensal" => '11.99',
//                    "dataPrimeiraParcela" =>  date('Y-m-d',strtotime("+30 days")) ,
//                    "tarifaCadastro" => '11.99']
//            ]);

//         . PHP_EOL;


//        $teste = array ('retorno' => $retorno01, 'retorno2' => $retorno02);
        return $retorno01->getBody()->read(4);); // teste

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

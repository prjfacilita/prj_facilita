<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmprestimoController;
//use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class PropostaController extends Controller
{
    //


    public function __construct()
    {

        $get_Access_token = new EmprestimoController();
        $get_Access_token->ConfiguracoesAPI();
    }


    public function InserirProposta($id){


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


        /*CONSULTAR OS DADOS PARA ENVIO*/

        /*  "nome": "João da Silva",
  "cpf": "03552031383",
  "dataNascimento": "1980-05-12",
  "naturezaOcupacao": "ASSALARIADO",
  "genero": "MASCULINO",
  "rendaMensal": 2500,
  "uf": "SP"*/


        $data = DB::table('cadastro')->where('id',  $id)->first();
        $pontos = array(',','.','-');
        $cpf = str_replace( $pontos,   "",  Auth::user()->cpf);

        $retorno01  =  $client->request('POST', EmprestimoController::URL_ENDPOINT(). '/api/v1/ep/propostas',
            [
                \GuzzleHttp\RequestOptions::JSON => ["nome" => "João da Silva",
//                    "qteParcelas" => [
//                        $request->qteParcelas,
//                    ],
                    "cpf" => "03552031383",
                    "dataNascimento" => "1980-05-12",
  "naturezaOcupacao" => "ASSALARIADO",
  "genero" => "MASCULINO",
  "rendaMensal" => 2500,
  "uf" => "SP"
                ]
            ]);


        $arr = json_decode($retorno01);


        return $arr;
    }
}

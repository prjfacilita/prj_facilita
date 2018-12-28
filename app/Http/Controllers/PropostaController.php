<?php

namespace App\Http\Controllers;

use App\DadosBancarios;
use Illuminate\Http\Request;
use Illuminate\Database;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmprestimoController;
//use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
//use App\Http\Controllers\EmprestimoController
use App\Http\Controllers\DadosBancariosController;
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
                \GuzzleHttp\RequestOptions::JSON => ["nome" => $data->nome_completo,
//                    "qteParcelas" => [
//                        $request->qteParcelas,
//                    ],
                    "cpf" => $cpf,
                    "dataNascimento" =>  $data->dt_nasc ,
                    "naturezaOcupacao" => $data->nat_ocup,
                    "genero" => strtoupper($data->sexo),
                    "rendaMensal" => $data->salario,
                    "uf" => $data->uf_nasc
                ]
            ]);


        $arr = json_decode($retorno01->getBody());

        /*tratar retorno $arr*/



        /*inserir em dados bancários*/


        /*DATA =
           $table->increments('id');
            $table->string('nr_pedido')->default(0);
            $table->string('nro_proc_bco')->default(0);
            $table->string('cpf')->default(0);
            $table->string('banco')->default(0);
            $table->string('agencia')->default(0);
            $table->string('dig_ag')->default(0);
            $table->string('conta')->default(0);
            $table->string('dig_conta')->default(0);
            $table->string('tipo')->default(0);
            $table->string('conta_desde')->default(0);
            $table->string('id_cadastro')->default(0);

        */
        $dados_bancarios = new DadosBancarios();
        $dados_bancarios->nr_pedido = $arr->retorno->numeroProposta;
        $dados_bancarios->nro_proc_bco = $arr->retorno->identificadorOperacao ;
        $dados_bancarios->save();

        session()->put('id_dados_bancarios', $dados_bancarios->id);

        return $arr;
    }


    public function AnaliseCadsatral($id){


        /*CONSULTAR DADOS*/


        $data = DB::table('cadastro')->where('id',  $id)->first();

        /*INSERIR PROPOSTA*/

        $simulacao = new EmprestimoController();
        $token = $simulacao->ConfiguracoesAPI();

//        $token = session('token_key');


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://c2gvw4lxh9.execute-api.sa-east-1.amazonaws.com/hmg/api/v2/ep/propostas/055090000031/analisecadastral",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => "{\n    \"nomeMae\": \"Maria da Silva\",\n    \"email\": \"email@email.com\",\n    \"estadoCivil\": \"SOLTEIRO\",\n    \"naturalidade\": \"São Paulo\",\n    \"valorPatrimonio\": \"5000\",\n    \"documentosPessoais\": [\n        {\n            \"numeroDocumento\": 125478991,\n            \"tipoDocumento\": \"RG\"\n        }\n    ],\n    \"endereco\": {\n        \"cep\": 11740000,\n        \"logradouro\": \"Rua Butantã\",\n        \"numero\": 123,\n        \"bairro\": \"Pinheiros\",\n        \"cidade\": \"Sao Paulo\",\n        \"complemento\": \"10o andar\"\n    },\n    \"enderecoComercial\": {\n        \"cep\": 11740000,\n        \"logradouro\": \"Rua Butantã\",\n        \"numero\": 123,\n        \"bairro\": \"Pinheiros\",\n        \"cidade\": \"Sao Paulo\",\n        \"uf\": \"SP\",\n        \"complemento\": \"10o andar\"\n    },\n    \"telefones\": [\n        {\n            \"ddd\": 11,\n            \"numero\": 985478547,\n            \"tipoTelefone\": \"CELULAR\",\n            \"ramal\": 444\n        }\n    ],\n    \"renda\": {\n        \"tipoComprovanteRenda\": \"EXTRATO_FGTS\"\n    }\n}",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsIng1dCI6Im9uRXlwQllvVWY1QnFjYXFMOHRtWEZrQTRxcyJ9.eyJhdWQiOiJtaWNyb3NvZnQ6aWRlbnRpdHlzZXJ2ZXI6NzIxYzQwNzUtMmM2Zi00MWRkLWI2MDktM2Q3YzVhYWJiN2ZkIiwiaXNzIjoiaHR0cDovL2ZzLmNic3NkaWdpdGFsLmNvbS5ici9hZGZzL3NlcnZpY2VzL3RydXN0IiwiaWF0IjoxNTQ1OTk4MjM4LCJleHAiOjE1NDYwMDE4MzgsImNsaWVudF9hcHAiOiJGYWNpbGl0YSBFUCIsImNsaWVudF9jb21wYW55IjoiRmFjaWxpdGEiLCJhcHB0eXBlIjoiQ29uZmlkZW50aWFsIiwiYXBwaWQiOiI3MjFjNDA3NS0yYzZmLTQxZGQtYjYwOS0zZDdjNWFhYmI3ZmQiLCJhdXRobWV0aG9kIjoiaHR0cDovL3NjaGVtYXMubWljcm9zb2Z0LmNvbS93cy8yMDA4LzA2L2lkZW50aXR5L2F1dGhlbnRpY2F0aW9ubWV0aG9kL3Bhc3N3b3JkIiwiYXV0aF90aW1lIjoiMjAxOC0xMi0yOFQxMTo1NzoxOC4xNTRaIiwidmVyIjoiMS4wIn0.CH0e315fNA1hbL5m3cgd8ggcyCpxTlxvexeCDyRnydGT4hHvHQvLpngJUWpG0N5KIM4Z3NNRUxzs88dCnjDWqFR9emoXRGRF8qGjZ1Q1y3EjYujcBwHCW9WPNaiOs9u2UGEGgM0O6td6kxFwrl7n5y0oGnRWpcGfupg0_drstEhmacS1kSFqy95-5ob0BDpo8PGGFHLs8-2qRoT5ZtEeoRtENh9-pW0q5lmEOoMeAA2MSrIOtCSAS9Ly24WyZs04HVpZ74PHjppqABE_JRK8f_qf6Hx1l9J3lpxx3mkHFaFQAS02Drheb-4xgg3gDtEXx4MF2nC6FO9bPQ9qNOfYig",
                "Content-Type: application/json",
                "Postman-Token: 06ec2ce6-7d28-4a29-9f61-957d375a0f04",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
        /*CRIAR VÁRIAVEL NO SISTEMA PARA DEFINIR O ACESSO DIRETO PARA A PÁGINA DE STATUS*/

        /*ENNVIAR EMAIL PARA CLIENTE INFORMANDO QUE ESTA EM ANÁLISE*/
    }


    public  function RetornoAnalise(){

    }

}

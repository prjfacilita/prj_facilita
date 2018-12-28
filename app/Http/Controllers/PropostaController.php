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

        $client =   new Client([
            'base_uri' => EmprestimoController::URL_TOKEN_API(),
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json',
            ],
        ]);

        /*"nomeMae": "Maria da Silva",
  "email": "email@email.com",
  "estadoCivil": "SOLTEIRO",
  "naturalidade": "São Paulo",

   "valorPatrimonio":"5000",
  "documentosPessoais": [
    {
      "numeroDocumento": 125478991,
      "tipoDocumento": "RG"
    }
  ],
  "endereco": {
    "cep": 11740000,
    "logradouro": "Rua Butantã",
    "numero": 123,
    "bairro": "Pinheiros",
    "cidade": "Sao Paulo",

    "complemento": "10o andar"
  },
"enderecoComercial": {
    "cep": 11740000,
    "logradouro": "Rua Butantã",
    "numero": 123,
    "bairro": "Pinheiros",
    "cidade": "Sao Paulo",
    "uf":"SP",

    "complemento": "10o andar"
  },
  "telefones": [
    {
      "ddd": 11,
      "numero": 985478547,
      "tipoTelefone": "CELULAR",
      "ramal": 444
    }
  ],
  "renda": {

    "tipoComprovanteRenda": "EXTRATO_FGTS"
  }
}
*/
        $updateBody['nomeMae'] = "nome mae";
        $updateBody['naturalidade'] = "Santista teste";
        $updateBody["valorPatrimonio"] = "2000.0";
        $updateBody["documentosPessoais"]["numeroDocumento"]= "357732739";
        $updateBody["documentosPessoais"]["tipoDocumento"]=  "RG";
        $updateBody["endereco"]["cep"] = "117300000";
        $updateBody["endereco"]["logradouro"] = "117300000";
        $updateBody["endereco"]["numero"] = "815";
        $updateBody["endereco"]["bairro"] = "117300000";
        $updateBody["endereco"]["cidade"] = "117300000";
        $updateBody["endereco"]["complemento"] = "117300000";

        $retorno01  =  $client->request('PUT', EmprestimoController::URL_ENDPOINT(). '/api/v2/ep/propostas/055090000030/analisecadastral',
            [

                'body' => json_encode($updateBody, JSON_FORCE_OBJECT)

            ]);


        $arr = json_decode($retorno01->getBody());
        /*CRIAR VÁRIAVEL NO SISTEMA PARA DEFINIR O ACESSO DIRETO PARA A PÁGINA DE STATUS*/

        /*ENNVIAR EMAIL PARA CLIENTE INFORMANDO QUE ESTA EM ANÁLISE*/
    }


    public  function RetornoAnalise(){

    }

}

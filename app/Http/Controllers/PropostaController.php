<?php

namespace App\Http\Controllers;

use App\DadosBancarios;
use App\Login;
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


    /*
     *
     * Fluxo api banco
     *
     * ->
            /api/v1/ep/propostas

       ->

            /api/v1/ep/status
     *
     * Números propostas
     *
     *
     * REALIZANDO_ANALISE_PREVIA; (Demora alguns minutos para retornar)
     *
     *  CHAMAR API V2 PARA ANALISE CADASTRAL
     *
     * ANALISE_CADASTRAL_CONCLUIDA = 055090000040
     *
     *   -> Chamar api especificação financeira
     *      -> PUT METHOD
     *      /api/v1/ep/propostas/{numeroProposta}/especificacaofinanceira/055090000040
     *
     *    Chamar API para retorno da proposta completa e mostrar resumo
     *
     *
     *   -> Chamar api pendência documentos
     *
     *      /api/v1/ep/propostas/pendencias/
     *
     *   -> Chamar view pendências
     *
     *
     *
     * REPROVADA ->retorna view reprovada
     *
     * APROVADA -> 055090000002 (Formalizar Contrato)
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     * Proposta Aprovada
     *
     *  "codFaseAnaliseCredito": "FORMALIZACAO_PROPOSTA",
     *
     *
     *  -> Buscar documentos para formalização da proposta
     *
     * /api/v1/ep/propostas/{numeroProposta}/documentosformalizacao
     *
     *
     * Formaliza a proposta
     *
     * /api/v1/ep/propostas/{numeroProposta}/formalizacao
     *
     *
     * Após completar a proposta vem os contratos
     *
     * */


        public function __construct()
        {

            $get_Access_token = new EmprestimoController();
            $get_Access_token->ConfiguracoesAPI();

            $this->middleware('auth');

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
            $dados_bancarios->nro_proc_bco = $arr->retorno->identificadorOperacao;
            $dados_bancarios->id_cadastro = $id;
            $dados_bancarios->save();


            $status_anliase = new Login();
            $status_anliase->exists = true;
            $status_anliase->id = Auth::user()->id;
            $status_anliase->status_analise = 2;
            $status_anliase->save();
    //        session()->put('id_dados_bancarios', $dados_bancarios->id);

            return $arr;
        }




        /*Este metódo é chamado toda vez que o usuário acessa o sistemaa para verifiacar o status da proposta*/
        public function StatusPreAnalise($id){

            $data_cadastro = DB::table('cadastro')->where('id',  $id)->first();
            $data_banco = DB::table('dados_bancarios')->where('id_cadastro',  $id)->first();

            $simulacao = new EmprestimoController();
            $token = $simulacao->ConfiguracoesAPI();

    //        $token = session('token_key');


            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://c2gvw4lxh9.execute-api.sa-east-1.amazonaws.com/hmg/api/v1/ep/propostas/status?numerosPropostas=".$data_banco->nr_pedido."",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
    //            CURLOPT_POSTFIELDS => "{\n    \"nomeMae\": \"".$data_cadastro->nome_mae."\",\n    \"email\": \"".Auth::user()->email."\",\n    \"estadoCivil\": \"SOLTEIRO\",\n    \"naturalidade\": \"São Paulo\",\n    \"valorPatrimonio\": \"5000\",\n    \"documentosPessoais\": [\n        {\n            \"numeroDocumento\": 125478991,\n            \"tipoDocumento\": \"RG\"\n        }\n    ],\n    \"endereco\": {\n        \"cep\": 11740000,\n        \"logradouro\": \"Rua Butantã\",\n        \"numero\": 123,\n        \"bairro\": \"Pinheiros\",\n        \"cidade\": \"Sao Paulo\",\n        \"complemento\": \"10o andar\"\n    },\n    \"enderecoComercial\": {\n        \"cep\": 11740000,\n        \"logradouro\": \"Rua Butantã\",\n        \"numero\": 123,\n        \"bairro\": \"Pinheiros\",\n        \"cidade\": \"Sao Paulo\",\n        \"uf\": \"SP\",\n        \"complemento\": \"10o andar\"\n    },\n    \"telefones\": [\n        {\n            \"ddd\": 11,\n            \"numero\": 985478547,\n            \"tipoTelefone\": \"CELULAR\",\n            \"ramal\": 444\n        }\n    ],\n    \"renda\": {\n        \"tipoComprovanteRenda\": \"EXTRATO_FGTS\"\n    }\n}",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer ".$token."",
                    "Content-Type: application/json",
    //                "Postman-Token: 06ec2ce6-7d28-4a29-9f61-957d375a0f04",
                    "cache-control: no-cache"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);


            if ($err) {
                echo "cURL Error #:" . $err;
            } else {


                $response = json_decode($response, true);


    //        print_r($response);

                return $response['retorno']['listaSituacaoPropostas'][0]['statusProposta'];

            }
        }


        public function AnaliseCadsatral($id){


            /*CONSULTAR DADOS*/


            $data_cadastro = DB::table('cadastro')->where('id',  $id)->first();
            $data_banco = DB::table('dados_bancarios')->where('id_cadastro',  $id)->first();


            /*REALIZAR ANALISE CADASTRAL*/

            $simulacao = new EmprestimoController();
            $token = $simulacao->ConfiguracoesAPI();

    //        $token = session('token_key');


            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://c2gvw4lxh9.execute-api.sa-east-1.amazonaws.com/hmg/api/v2/ep/propostas/".$data_banco->nr_pedido."/analisecadastral",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => "{\n    \"nomeMae\": \"".$data_cadastro->nome_mae."\",\n    \"email\": \"".Auth::user()->email."\",\n    \"estadoCivil\": \"".$data_cadastro->estado_civil."\",\n    \"naturalidade\": \"$data_cadastro->nacionalidade\",\n    \"valorPatrimonio\": \"".$data_cadastro->val_patriominio."\",\n    \"documentosPessoais\": [\n        {\n            \"numeroDocumento\": ".$data_cadastro->nr_doc.",\n            \"tipoDocumento\": \"".$data_cadastro->tp_doc."\"\n        }\n    ],\n    \"endereco\": {\n        \"cep\": 11740000,\n        \"logradouro\": \"Rua Butantã\",\n        \"numero\": 123,\n        \"bairro\": \"Pinheiros\",\n        \"cidade\": \"Sao Paulo\",\n        \"complemento\": \"10o andar\"\n    },\n    \"enderecoComercial\": {\n        \"cep\": 11740000,\n        \"logradouro\": \"Rua Butantã\",\n        \"numero\": 123,\n        \"bairro\": \"Pinheiros\",\n        \"cidade\": \"Sao Paulo\",\n        \"uf\": \"SP\",\n        \"complemento\": \"10o andar\"\n    },\n    \"telefones\": [\n        {\n            \"ddd\": 11,\n            \"numero\": 985478547,\n            \"tipoTelefone\": \"CELULAR\",\n            \"ramal\": 444\n        }\n    ],\n    \"renda\": {\n        \"tipoComprovanteRenda\": \"EXTRATO_FGTS\"\n    }\n}",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer ".$token."",
                    "Content-Type: application/json",
    //                "Postman-Token: 06ec2ce6-7d28-4a29-9f61-957d375a0f04",
                    "cache-control: no-cache"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {




                return response('concluido com sucesso', 200)
                    ->header('Content-Type', 'text/plain');
    //            echo $response;



            }
            /*CRIAR VÁRIAVEL NO SISTEMA PARA DEFINIR O ACESSO DIRETO PARA A PÁGINA DE STATUS*/

            /*ENNVIAR EMAIL PARA CLIENTE INFORMANDO QUE ESTA EM ANÁLISE*/
        }


        /*Metódo responsável por controlar todo o status das propostas, ele vai definir para qual fase o usuário vai ser direcionado*/
        public function  ConsultarStatusProposta(){

            /*Consultar api e direcionar para metódo*/

            $data_cadastro = DB::table('cadastro')->where('email',  Auth::user()->email)->first();
            $data_banco = DB::table('dados_bancarios')->where('id_cadastro',  $data_cadastro->id)->first();

            $simulacao = new EmprestimoController();
            $token = $simulacao->ConfiguracoesAPI();

            //        $token = session('token_key');


            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://c2gvw4lxh9.execute-api.sa-east-1.amazonaws.com/hmg/api/v1/ep/propostas/status?numerosPropostas=".$data_banco->nr_pedido."",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                //            CURLOPT_POSTFIELDS => "{\n    \"nomeMae\": \"".$data_cadastro->nome_mae."\",\n    \"email\": \"".Auth::user()->email."\",\n    \"estadoCivil\": \"SOLTEIRO\",\n    \"naturalidade\": \"São Paulo\",\n    \"valorPatrimonio\": \"5000\",\n    \"documentosPessoais\": [\n        {\n            \"numeroDocumento\": 125478991,\n            \"tipoDocumento\": \"RG\"\n        }\n    ],\n    \"endereco\": {\n        \"cep\": 11740000,\n        \"logradouro\": \"Rua Butantã\",\n        \"numero\": 123,\n        \"bairro\": \"Pinheiros\",\n        \"cidade\": \"Sao Paulo\",\n        \"complemento\": \"10o andar\"\n    },\n    \"enderecoComercial\": {\n        \"cep\": 11740000,\n        \"logradouro\": \"Rua Butantã\",\n        \"numero\": 123,\n        \"bairro\": \"Pinheiros\",\n        \"cidade\": \"Sao Paulo\",\n        \"uf\": \"SP\",\n        \"complemento\": \"10o andar\"\n    },\n    \"telefones\": [\n        {\n            \"ddd\": 11,\n            \"numero\": 985478547,\n            \"tipoTelefone\": \"CELULAR\",\n            \"ramal\": 444\n        }\n    ],\n    \"renda\": {\n        \"tipoComprovanteRenda\": \"EXTRATO_FGTS\"\n    }\n}",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer ".$token."",
                    "Content-Type: application/json",
                    //                "Postman-Token: 06ec2ce6-7d28-4a29-9f61-957d375a0f04",
                    "cache-control: no-cache"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);


            if ($err) {
                echo "cURL Error #:" . $err;
            } else {


                $response = json_decode($response, true);


                //        print_r($response);

                $retorno =  $response['retorno']['listaSituacaoPropostas'][0]['statusProposta'];

                if($retorno == "REALIZANDO_ANALISE_PREVIA"){

                    $this->REALIZANDO_ANALISE_PREVIA();
                }

                if($retorno == "ANALISE_PREVIA_CONCLUIDA"){

                    $this->ANALISE_PREVIA_CONCLUIDA();
                }

                if($retorno == "REALIZANDO_ANALISE_CADASTRAL"){

                    $this->REALIZANDO_ANALISE_CADASTRAL();
                }

                if($retorno == "ANALISE_CADASTRAL_CONCLUIDA"){

                    $this->ANALISE_CADASTRAL_CONCLUIDA();
                }

                if($retorno == "REPROVADA"){
                    $this->REPROVADA();
                }

            }
        }

        /*Metódo para REALIZANDO_ANALISE_PREVIA*/
        public function REALIZANDO_ANALISE_PREVIA(){


            return view(    'emprestimo.status_analise');

        }

        /*Metódo para ANALISE_PREVIA_CONCLUID*/

        public function ANALISE_PREVIA_CONCLUIDA(){

            return view('emprestimo.status_analise');
        }


        /*mETÓDO PARA REALIZANDO_ANALISE_CADASTRAL*/
        public function REALIZANDO_ANALISE_CADASTRAL(){

            return view('emprestimo.status_analise');
        }


        /*Metódo para ANALISE_CADASTRAL_CONCLUIDA*/
        public function ANALISE_CADASTRAL_CONCLUIDA(){



//                return view('emprestimo.status_analise');
//                redirect()->route('/resumo');

//                $data = DB::table('cadastro')->where('email',  Auth::user()->email)->first();

//                return view('emprestimo.resumo');

            // chamar api de especificação financeira e retornar o resumo

            // chamar api de validação dos dados bancários
            // após continuar chamar as pendências e incluir o kitprobatóro
            /*Buscar proposta completa*/


            /**/

            $simulacao = new EmprestimoController();
            $token = $simulacao->ConfiguracoesAPI();


            $this->InserirEspecificacaoFinanceira();


            $data = DB::table('dados_bancarios')->where('cpf',  Auth::user()->cpf)->first();

            $data_pre_cadastro = DB::table('pre_cadastro')->where('cpf', Auth::user()->cpf)->first();


            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://c2gvw4lxh9.execute-api.sa-east-1.amazonaws.com/hmg/api/v1/ep/propostas/".$data->nr_pedido."",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
    //            CURLOPT_POSTFIELDS => "{\n    \"nomeMae\": \"".$data_cadastro->nome_mae."\",\n    \"email\": \"".Auth::user()->email."\",\n    \"estadoCivil\": \"SOLTEIRO\",\n    \"naturalidade\": \"São Paulo\",\n    \"valorPatrimonio\": \"5000\",\n    \"documentosPessoais\": [\n        {\n            \"numeroDocumento\": 125478991,\n            \"tipoDocumento\": \"RG\"\n        }\n    ],\n    \"endereco\": {\n        \"cep\": 11740000,\n        \"logradouro\": \"Rua Butantã\",\n        \"numero\": 123,\n        \"bairro\": \"Pinheiros\",\n        \"cidade\": \"Sao Paulo\",\n        \"complemento\": \"10o andar\"\n    },\n    \"enderecoComercial\": {\n        \"cep\": 11740000,\n        \"logradouro\": \"Rua Butantã\",\n        \"numero\": 123,\n        \"bairro\": \"Pinheiros\",\n        \"cidade\": \"Sao Paulo\",\n        \"uf\": \"SP\",\n        \"complemento\": \"10o andar\"\n    },\n    \"telefones\": [\n        {\n            \"ddd\": 11,\n            \"numero\": 985478547,\n            \"tipoTelefone\": \"CELULAR\",\n            \"ramal\": 444\n        }\n    ],\n    \"renda\": {\n        \"tipoComprovanteRenda\": \"EXTRATO_FGTS\"\n    }\n}",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer ".$token."",
                    "Content-Type: application/json",
    //                "Postman-Token: 06ec2ce6-7d28-4a29-9f61-957d375a0f04",
                    "cache-control: no-cache"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);


            if ($err) {
                echo "cURL Error #:" . $err;
            } else {


                $response = json_decode($response, true);


    //        print_r($response);

//                return $response;


                return view('emprestimo.resumo',
                    [

                        'valorPrincipal' => $response['retorno']['especificacaoFinanceira']['valorPrincipal'],
                        'iof' => $response['retorno']['especificacaoFinanceira']['iof'],
                        'cet'=> $response['retorno']['especificacaoFinanceira']['cet'],
                        'taxaJuros' => $response['retorno']['especificacaoFinanceira']['taxaJuros'],
                        'taxaJurosAno' => $response['retorno']['especificacaoFinanceira']['taxaJurosAno'],
                        'valorFinanciado' => $response['retorno']['especificacaoFinanceira']['valorFinanciado'],
                        'valorParcela' => $response['retorno']['especificacaoFinanceira']['valorParcela'],
                        'dataPrimeiraParcela' => $response['retorno']['especificacaoFinanceira']['dataPrimeiraParcela'],
                        'quantidadeParcelas' => $response['retorno']['especificacaoFinanceira']['quantidadeParcelas'],
                        'valorTC' => $response['retorno']['especificacaoFinanceira']['valorTC'],
                        'motivo_solicitacao' => $data_pre_cadastro->finalidade,
                        'dataSolicitacao' => $response['retorno']['dataStatusProposta']
                    ]
                );

            }

        }


        /*Metódo InserirEspecificacaoFinanceira*/

        public function InserirEspecificacaoFinanceira(){

        }

        /*Metódo para proposta REPROVADA*/

        public function REPROVADA(){

        }



}

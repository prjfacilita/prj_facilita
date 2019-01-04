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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Emprestimo;

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

//        $this->ChecarAnalise();
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

//      else{


            return view('emprestimo.pedido');

//        }
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


    public function EmprestimoDadosPessoais(Request $request){

        /*Verificar se cliente já fez alguma proposta e excluir do cadastro e se possuir excluir*/
//        return $request;



        $validator = Validator::make($request->all(), [
            'nome_solicitante' => 'required|max:30',
//            'name' => 'required|string|max:50',
//            'password' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }

        $dados_pessoais = new Emprestimo();
        $dados_pessoais->nome_completo      =   $request->nome_solicitante;
        $dados_pessoais->email              =   Auth::user()->email;
        $dados_pessoais->dt_nasc            =   $request->dtn_solicitante;
        $dados_pessoais->nr_doc             =   $request->nro_documento;
        $dados_pessoais->tp_doc             =   $request->tp_documento;
        $dados_pessoais->emissor            =   $request->solicitation_organ;
        $dados_pessoais->sexo               =   $request->sexo;
        $dados_pessoais->nacionalidade      =   $request->nacionalidade;
        $dados_pessoais->uf_nasc            =   $request->uf_nascimento;
        $dados_pessoais->tel_fixo           =   $request->telefone;
        $dados_pessoais->tel_cel            =   $request->celular;
        $dados_pessoais->nome_conj          =   $request->nome_conjuge;
        $dados_pessoais->cpf_conj           =   $request->cpf_conjuge;
        $dados_pessoais->dt_nasc_conj       =   $request->nasto_conjuge;
        $dados_pessoais->sexo_conj          =   $request->sexo_conjuge;
        $dados_pessoais->pb_exposta         =   $request->pb_exposta;
        $dados_pessoais->nome_mae           =   $request->nome_mae;
        $dados_pessoais->emissor            =   $request->solicitation_organ;
        $dados_pessoais->status_cadastro          =   1; // status do passo a passo cadastro;



//        $dados_pessoais->emissor            =   '1';
        $dados_pessoais->save();

//        Session::put('dados_emprestimo',['id_cadastro',$dados_pessoais->id]);
        // return Session::get('dados_emprestimo.id_cadastro')

        $request->session()->put('id_cadastro', $dados_pessoais->id);

        return response('Dados inseridos com sucesso'. $request->session()->get('id_cadastro').'', 200)
            ->header('Content-Type', 'text/plain');
        /*inputar no banco de dados*/
//        return $request->nome_solicitanteg;
    }


    public function EmprestimoRenda(Request $request){
        $validator = Validator::make($request->all(), [
            'salario' => 'required|max:30',
//            'name' => 'required|string|max:50',
//            'password' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }


        /*buscar no sistema se existe a falta da segunda parte no cadastro*/


        $data = DB::table('cadastro')->where('email',  Auth::user()->email)->first();

        if($data->status_cadastro == 1){



            $renda_ocupacao = new Emprestimo();

//        $value = $request->session()->get('id_cadastro');
            $renda_ocupacao->exists = true;
            $renda_ocupacao->id = $data->id; //already exists in database.
            $renda_ocupacao->salario = $request->salario;
            $renda_ocupacao->ocupacao = $request->ocupacao;
            $renda_ocupacao->escolaridade = $request->escolaridade;
            $renda_ocupacao->profissao = $request->profissao;
            $renda_ocupacao->cargo = $request->cargo;
            $renda_ocupacao->empresa = $request->empresa;
            $renda_ocupacao->data_admissao = $request->data_admissao;
            $renda_ocupacao->end_comercial = $request->end_comercial;
            $renda_ocupacao->end_comercial_nro = $request->end_com_nro;
            $renda_ocupacao->end_comercial_cep = $request->endereco_comercial_cep;
            $renda_ocupacao->bairro_comerc = $request->endereco_comercial_bairro;
            $renda_ocupacao->cidade_comerc = $request->endereco_comercial_cidade;
            $renda_ocupacao->uf_comerc = $request->endereco_comercial_uf;
            $renda_ocupacao->compl_comerc = $request->complemento_endereco_comercial;
            $renda_ocupacao->tel_comerc = $request->telefone_comercial;
            $renda_ocupacao->ramal = $request->ramal;
            $renda_ocupacao->status_cadastro = 2;

            $renda_ocupacao->save();


            $request->session()->put('id_cadastro', $request->session()->get('id_cadastro'));
            return response('Dados inseridos com sucesso', 200)
                ->header('Content-Type', 'text/plain');



        }






        /* salario: salario,
                ocupacao: ocupacao,
                escolaridade: escolaridade,
                profissao: profissao,
                cargo: cargo,
                empresa: empresa,
                data_admissao: data_admissao,
                end_comercial: end_comercial,
                end_com_nro: end_com_nro,
                endereco_comercial_cep: endereco_comercial_cep,
                endereco_comercial_bairro: endereco_comercial_bairro,
                endereco_comercial_cidade: endereco_comercial_cidade,
                endereco_comercial_uf: endereco_comercial_uf,
                complemento_endereco_comercial: complemento_endereco_comercial,
                telefone_comercial: telefone_comercial,
                ramal: ramal*/
    }

    public function EmprestimoEndereco(Request $request){



        $validator = Validator::make($request->all(), [
            'cep' => 'required|max:30',
//            'name' => 'required|string|max:50',
//            'password' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }

            /*
            var cep     =   $("#form-2 input[name=cep]").val();
            var endereco     =   $("#form-2 input[name=endereco]").val();
            var nro     =   $("#form-2 input[name=nro]").val();
            var complemento     =   $("#form-2 input[name=complemento]").val();
            var bairro     =   $("#form-2 input[name=bairro]").val();
            var cidade     =   $("#form-2 input[name=cidade]").val();
            var valor_patrimonio     =   $("#form-2 input[name=valor-patrimonio-name]").val();
            // var cep     =   $("#form-2 input[name=cep]").val();
            var residencia    =   $('#tipo-residencia-id').find(":selected").text();
            var escolaridade    =   $('#uf').find(":selected").text();*/


        $data = DB::table('cadastro')->where('email',  Auth::user()->email)->first();

        if($data->status_cadastro == 2) {
            $endereco = new Emprestimo();
            $endereco->exists = true;
            $endereco->id = $data->id; //already exists in database.
            $endereco->cep_res = $request->cep;
            $endereco->end_res = $request->endereco;
            $endereco->num_res = $request->nro;
            $endereco->compl_res = $request->complemento;
            $endereco->bairro_res = $request->bairro;
            $endereco->cidade_res = $request->cidade;
            $endereco->val_patriominio = $request->valor_patrimonio;
            $endereco->tipo_res = $request->residencia;
            $endereco->uf_res = $request->uf_id;
            $endereco->status_cadastro = 3;
            $endereco->save();

            $teste = new PropostaController();
            $retorno_dados = $teste->InserirProposta($data->id);
            /*CHAMAR CONTROLADOR PROPOSTA*/


            return response('concluido com sucesso', 200)
                ->header('Content-Type', 'text/plain');

        }


    }
    public function PedirEmprestimo(Request $request){

        /*Consultar API*/

        $this->ConfiguracoesAPI();

        /*BUSCAR DADOS DA ULTIMA SIMULAÇÃO*/


        $userId = Auth::id();
        $user = DB::table('simulacao')->where('user_id',  $userId)->orderBy('created_at', 'DESC')->first();
        /**/

        if(Auth::user()->status_analise == 2){
            // em análise

            $teste = new PropostaController();
            $retorno =  $teste->StatusPreAnalise(1);

//            print_r($retorno);


            if($retorno == "REALIZANDO_ANALISE_PREVIA"){

                return view('emprestimo.status_analise');

            }
            if($retorno == "ANALISE_PREVIA_CONCLUIDA"){


                return view('emprestimo.status_analise');


            }

            if($retorno == "REPROVADA"){

                return \view('emprestimo.status_reprovada');
            }


        }else{

            return view('emprestimo.pedido',
                ['valor_solicitacao'        => $user->valorSolicitado ,
                    'data_solicitacao'          =>  $user->created_at,
                    'qtde_parcelas'           =>  $user->qteParcelas,
                    'finalidade'    =>  'teste',
                    'simulacao_id' => $user->id

                ]);
        }


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

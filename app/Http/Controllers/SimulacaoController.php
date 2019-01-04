<?php

namespace App\Http\Controllers;

use App\Simulacao;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\PreCadastro;
use Illuminate\Support\Facades\DB;

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



        $retorno01  =  $client->request('POST', EmprestimoController::URL_ENDPOINT(). 'api/v1/ep/simuladores',
            [
                \GuzzleHttp\RequestOptions::JSON => ["valorSolicitado" => number_format($request->valorSolicitado, 2, '.', ''),
                  "qteParcelas" => [
                            $request->qteParcelas,
                        ],
                  "taxaJurosMensal" => '3.99',
                  "dataPrimeiraParcela" =>  date('Y-m-d',strtotime("+30 days")) ,
                  "tarifaCadastro" => '3.99']
            ]);


        $arr = json_decode($retorno01->getBody(), true);


        $insertedid = $this->StoreSimulation($arr, $request);


        return array("lastInserId" => $insertedid, "teste" => number_format($arr["retorno"]["planosPgamento"][0]["valorParcela"], 2, ',', '.')); // teste

    }



    public function StoreSimulation($arr, $request){

        /**armazenar simulação*/


//        return $arr;

        $simulacao = new Simulacao();


//        $table->string('taxaJurosMensal');
//        $table->string('valorSolicitado');
//        $table->string('qteParcelas');
//        $table->string('dataPrimeiraParcela');
//        $table->string('tarifaCadastro');
        $simulacao->taxaJurosMensal = '3.99';
        $simulacao->valorSolicitado = number_format($request->valorSolicitado, 2, '.', '');
        $simulacao->qteParcelas = $request->qteParcelas;
        $simulacao->dataPrimeiraParcela =  date('Y-m-d',strtotime("+30 days"));
        $simulacao->tarifaCadastro = '3.99';
        $simulacao->ValorParcela = $arr["retorno"]["planosPgamento"][0]['valorParcela'];
//        $simulacao->finalidade = ;
//        $simulacao->finalidade = $arr['taxaJurosMensal'];
        $simulacao->save();

        return $simulacao->id;



    }


    public function PreCadastro(Request $request){


        /*VERIFICAR NA TABELA pre_cadastro se já existe, se não existir cadastrar*/


        $selectIfActive = DB::table('pre_cadastro')
            ->where('email', '=',  $request->simulation_email)
            ->where('cpf', '=',  $request->simulation_cpf)
//                ->orderBy('quantity', 'asc')
            ->first();


        if(count($selectIfActive) > 0) {

            //retornar erro pois já existe cadastrado email ou cpf


//            return 0;

            return redirect()->intended('index');

        }



        /// inserir na tabela
        ///

//        return Input::get('finalidade');
        $pre_cadastro_save = new PreCadastro();

        $pre_cadastro_save->email = $request->simulation_email;
        $pre_cadastro_save->nome_compl = $request->simulation_name;
        $pre_cadastro_save->cpf = $request->simulation_cpf;
        $pre_cadastro_save->finalidade = (string) $request->finalidade;

        $pre_cadastro_save->save();



        print_r((string) $request->finaalidade);


        return false;

        return view('auth.register',
            ['email'        => $request->simulation_email,
                'nome'          => $request->simulation_name,
                'cpf'           =>$request->simulation_cpf,
                'finalidade'    => $request->finalidade,
                'simulacao_id' => $request->simulacao_id

            ]);

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

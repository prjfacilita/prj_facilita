<?php

namespace App\Http\Controllers;

use App\Emprestimo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use App\DadosBancarios;
use Illuminate\View\View;
//use App\Emprestimo;



class DadosBancariosController extends Controller
{
    //


    public function  InserirDadosBacnarios(Request $request){



//        try{

            $data               = DB::table('cadastro')->where('email',  Auth::user()->email)->first();

            $teste = new PropostaController();
            $retorno_dados = $teste->InserirProposta($data->id);

            if($retorno_dados)

            $id = $data->id;
            $data_bancarios     = DB::table('dados_bancarios')->where('id_cadastro', $id)->first();


            $dados_bancarios = new DadosBancarios();
            $dados_bancarios->exists = true;
            $dados_bancarios->id = $data_bancarios->id;
            $dados_bancarios->cpf = Auth::user()->cpf;
            $dados_bancarios->banco = $request->banco_id;
            $dados_bancarios->agencia = $request->nro_agencia;
            $dados_bancarios->dig_ag = substr($request->nro_agencia, -1);
            $dados_bancarios->conta = $request->nro_conta;
            $dados_bancarios->dig_conta = $request->dig_conta;
            $dados_bancarios->tipo = $request->tipo_conta;
            $dados_bancarios->conta_desde = $request->conta_desde;
            $dados_bancarios->save();




            $chamada_analise = new PropostaController();
            $chamada_analise->StatusPreAnalise($data->id);



        return response('concluido com sucesso', 200)
            ->header('Content-Type', 'text/plain');





    }
}

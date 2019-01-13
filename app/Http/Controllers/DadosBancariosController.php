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


        $data               = DB::table('cadastro')->where('email',  Auth::user()->email)->first();

        $id = $data->id;


        $data_bancarios     = DB::table('dados_bancarios')->where('id_cadastro', $id)->first();


        if($data->status_cadastro == 3) {


            $count = DB::table('dados_bancarios')->where('id_cadastro', $id)->count();
//            $id = DB::table('cadastro')->where('email',  Auth::user()->email)->first();

//            $count = $data;

            if($count > 0 ){


                $dados_bancarios = DadosBancarios::find($id);

            }else{
                $dados_bancarios = new DadosBancarios();
            }

//            $id_exists = session()->get('id_dados_bancarios');
//            $id_cadastro = $request->session()->get('id_cadastro');

//            $dados_bancarios = new DadosBancarios();
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
//            $dados_bancarios->id_cadastro = $data->id;
//            $dados_bancarios->status_cadastro = 4;
            $dados_bancarios->save();

            $chamada_analise = new PropostaController();
            $chamada_analise->StatusPreAnalise($data->id);



            return view('emprestimo.status_analise');
        }

    }
}

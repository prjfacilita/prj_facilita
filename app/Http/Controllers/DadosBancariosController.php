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


//        echo 'teste'.$id.'</br>';

//        print_r($id);

        $data_bancarios     = DB::table('dados_bancarios')->where('id_cadastro', $id)->first();




        print_r($data->id);
//        print_r($data_bancarios->id);

        if($data->status_cadastro == 3) {

//            $id_exists = session()->get('id_dados_bancarios');
//            $id_cadastro = $request->session()->get('id_cadastro');

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
//            $dados_bancarios->id_cadastro = $data->id;
//            $dados_bancarios->status_cadastro = 4;
            $dados_bancarios->save();


            return $data_bancarios;


//            $dados_emprestimo = new Emprestimo();
//            $dados_bancarios->exists = true;
//            $dados_bancarios->id_cadastro = ;
//            $dados_bancarios->id = $data->id;
//            $dados_bancarios->save();

            /*CONTA

             banco_id: banco_id,
                    nro_agencia: nro_agencia,
                    nro_conta:nro_conta,
                    tipo_conta: tipo_conta,
                    conta_desde: conta_desde,
                    nome_ref_pessoal: nome_ref_pessoal,
                    cpf_ref_pessoal: cpf_ref_pessoal,
                    grau_rel: grau_rel,
                    tel_relacionamento: tel_relacionamento

                        $table->string('cpf')->default(0);
                $table->string('banco')->default(0);
                $table->string('agencia')->default(0);
                $table->string('dig_ag')->default(0);
                $table->string('conta')->default(0);
                $table->string('dig_conta')->default(0);
                $table->string('tipo')->default(0);
                $table->string('conta_desde')->default(0);
                $table->string('id_cadastro')->default(0);


            NR_PEDIDO
            CPF
            BANCO
            AGENCIA
            DIG_AG
            CONTA
            DIG_CONTA
            TIPO
            CONTA_DESDE
    */

            $chamada_analise = new PropostaController();
            $chamada_analise->StatusPreAnalise($data->id);



            return view('emprestimo.status_analise');
        }

    }
}

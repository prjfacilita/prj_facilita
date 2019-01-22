<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Database;;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\File;

class FileController extends Controller
{
    //


    public function store(Request $request){

//        $request->image->store('1.png');


        /*CONSULTAR nr_pedido NO BANCO DE DADOS*/

//        $userId = Auth::id();
//        $user = DB::table('simulacao')->where('user_id',  $userId)->orderBy('created_at', 'DESC')->first();


        $data_cadastro                  =       DB::table('cadastro')->where('email',  Auth::user()->email)->first();

//        return $data_cadastro->id;
        $data_bancarios                 =       DB::table('dados_bancarios')->where('id_cadastro',  $data_cadastro->id)->first();



//        return  $data_bancarios->id;
        $image                          =       base64_encode(file_get_contents($request->file('image')));



//        return $image;
//        return $request->file('image')->extension();

        $store_image = new File();
        $store_image->nr_pedido         =       $data_bancarios->nr_pedido;
        $store_image->tipo              =       $request->file('image')->extension();
        $store_image->nome_doc          =       $request->file('image')->getClientOriginalName();
        $store_image->data_doc          =       '';
        $store_image->status_doc        =       '1';
        $store_image->base64_doc        =       $image;
        $store_image->tipo_doc          =       $request->tipodoc;
        $store_image->id_cadastro       =       $data_cadastro->id;
        $store_image->nr_doc            =       0;
        /*criar campo para identificação se o comprovante estar no nome do requerente*/
        $store_image->save();



        if($store_image){


            $send_api = new PropostaController();
             $send_api->INSERIR_DOCUMENTO($request);

//             redirect('pendencias');
            return redirect()->back()->withInput();


        }



//        return $image;

//        return $request->image;
    }
}

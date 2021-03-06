<?php

//use \Illuminate\Support\Facades\Input;
//use \Illuminate\Http\Request;

Route::any('/', function () {
    return view('index');
});

Route::get('/index', function(){
//    Auth::logout();
//    Session::flush();
    return redirect("/index");
})->name('index');


Auth::routes();


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('/home', function(){
    Auth::logout();
    Session::flush();
    return redirect("/login");
})->name('home');



Route::any('/index', function () {
    return view('index');
});



////Route::get('/atv', function(){
//
//    return view('atv');
//});


//Route::post('api/login', 'API\UserController@login');
//Route::post('api/register', 'API\UserController@register');
//Route::group(['middleware' => 'auth:api'], function(){
//    Route::post('details', 'API\UserController@details');
//});

//Route::any('official/form/reject-form}', 'FormStatus@rejectForm')->name('reject-form');
//


Route::post('/ativarconta', 'Auth\LoginController@CriarSenha');
Route::post('ativacao', [ 'as' => 'ativacao', 'uses' => 'Auth\LoginController@AtivacaoUsuario']);
Route::post('confirmacao', [ 'as' => 'confirmacao', 'uses' => 'Auth\LoginController@CriarSenha']);
//Route::post('confirmacao', [ 'as' => 'confirmacao', 'uses' => 'Auth\LoginController@CriarSenha']);

/// ROTA PARA  ENVIAR O CÓDIGO VIA FORMULARIO PARA ATIVAÇÃO DA CONTA
Route::post('reset_code', [ 'as' => 'reset_code', 'uses' => 'Auth\LoginController@reset_code']);

//$this->get('register1', 'Auth\RegisterController@showRegistrationForm')->name('register');
//$this->post('register1', 'Auth\RegisterController@register');


/////////////////////// ROTA PARA RECEBER CÓDIGO VIA URL
Route::get('confirmar-usuario/{code}', [ 'as' => 'confirmar-usuario/{code}', 'uses' => 'Auth\LoginController@AtivacaoUsuario']);





Route::get('pedido', [ 'as' => 'pedido', 'uses' => 'EmprestimoController@PedirEmprestimo']);
Route::get('pendencias', [ 'as' => 'pendencias', 'uses' => 'PropostaController@PENDENCIAS']);
//Route::get('/pendencias', 'PropostaController@PENDENCIAS')->name('pendencias');


//Route::get('ativar-conta', ['as' => 'ativar-conta', 'uses' => 'Auth\LoginController@CriarSenha']);

/*
 *
 *
 *
 *
 *
 * */


/*Conexão API Banco*/

Route::get('/banco/api/configuracoes', ['as' => '/banco/api/configuracoes', 'uses' => 'EmprestimoController@ConfiguracoesAPI']);




/* API FACILITA EMPRESTIMOS*/

Route::group(['prefix' => 'api/'], function () {
    Route::get('emprestimo2', 'EmprestimoController@get');

    /*ROTA PARA SIMULAR EMPRESTIMO E PARCELAS*/
    Route::post('simulador', 'SimulacaoController@Simular');
});



Route::post('pre_cadastro', 'SimulacaoController@PreCadastro')->name('pre_cadastro');
Route::post('pedido_emprestimo_parte01', 'EmprestimoController@EmprestimoDadosPessoais')->name('pedido_emprestimo_parte01');
Route::post('pedido_emprestimo_parte02', 'EmprestimoController@EmprestimoRenda')->name('pedido_emprestimo_parte02');
Route::post('pedido_emprestimo_parte03', 'EmprestimoController@EmprestimoEndereco')->name('pedido_emprestimo_parte03');
Route::post('pedido_emprestimo_parte04', 'DadosBancariosController@InserirDadosBacnarios')->name('pedido_emprestimo_parte04');
//Route::post('login', 'Auth\LoginController@login');

//
//Route::resource('resource-name','Controller', ['only' => ['index','store']]);

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');


Route::get('resumo', [ 'as' => 'resumo', 'uses' => 'PropostaController@ANALISE_CADASTRAL_CONCLUIDA']);
Route::get('enviar_documento', [ 'as' => 'enviar_documento', 'uses' => 'EmprestimoController@EnviarComprovanteDeResidencia']);
Route::get('enviar_comprovante_renda', [ 'as' => 'enviar_comprovante_renda', 'uses' => 'EmprestimoController@EnviarComprovanteDeRenda']);
Route::get('enviar_foto', [ 'as' => 'enviar_foto', 'uses' => 'EmprestimoController@EnviarFoto']);

Route::get('documentos_pendentes', [ 'as' => 'documentos_pendentes', 'uses' => 'PropostaController@DocumentosPendentes']);



Route::get('documento_formalizacao', 'PropostaController@RetornarDocumentoFormalizacao')->name('documento_formalizacao');


//Route::post
Route::post('alterar_pedido', 'EmprestimoController@AlterarPedido')->name('alterar_pedido');
//Route::resource('file','File');


Route::post('enviar_arquivo','FileController@store')->name('enviar_arquivo');


/*ROTAS PARA TESTAR FUNÇÕES*/

Route::get('teste_documento', 'PropostaController@INSERIR_DOCUMENTO')->name('teste_documento');
Route::get('teste_pdf', 'PropostaController@RetornarDocumentoFormalizacao')->name('teste_pdf');
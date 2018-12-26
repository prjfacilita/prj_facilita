<?php

//use \Illuminate\Support\Facades\Input;
//use \Illuminate\Http\Request;

Route::any('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
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



Route::post('pre_cadastro', 'Auth\RegisterController@PreCadastro')->name('pre_cadastro');
Route::post('pedido_emprestimo_parte01', 'EmprestimoController@EmprestimoDadosPessoais')->name('pedido_emprestimo_parte01');
Route::post('pedido_emprestimo_parte02', 'EmprestimoController@EmprestimoRenda')->name('pedido_emprestimo_parte02');
//Route::post('login', 'Auth\LoginController@login');

//
//Route::resource('resource-name','Controller', ['only' => ['index','store']]);

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
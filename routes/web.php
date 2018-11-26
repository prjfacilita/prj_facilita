<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('api/login', 'API\UserController@login');
Route::post('api/register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');
});

//Route::any('official/form/reject-form}', 'FormStatus@rejectForm')->name('reject-form');
//


//Route::post('/ativacao', 'Auth\LoginController@AtivacaoUsuario');
Route::post('ativacao', [ 'as' => 'ativacao', 'uses' => 'Auth\LoginController@AtivacaoUsuario']);
Route::post('confirmacao', [ 'as' => 'confirmacao', 'uses' => 'Auth\LoginController@CriarSenha']);
Route::post('reset_code', [ 'as' => 'reset_code', 'uses' => 'Auth\LoginController@reset_code']);

//$this->get('register1', 'Auth\RegisterController@showRegistrationForm')->name('register');
//$this->post('register1', 'Auth\RegisterController@register');



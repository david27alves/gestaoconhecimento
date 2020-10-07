<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/categorias', function (){
    return view('novacategoria');
})->name('categorias');
Route::get('/categoria/novo', 'CategoriaController@index');
Route::post('/categoria/novo', 'CategoriaController@store')->name('incluircategoria');

Route::get('/conhecimento', 'ConhecimentoController@index');
Route::get('/conhecimento/novo', 'ConhecimentoController@create')->name('conhecimento');
Route::post('/conhecimento/novo', 'ConhecimentoController@store')->name('incluirconhecimento');

Route::get('/conhecimento/{id}', 'ConhecimentoController@show')->name('verconhecimento');
Route::get('/conhecimento/editar/{id}', 'ConhecimentoController@edit')->name('editarconhecimento');
Route::post('/conhecimento/editar/{id}', 'ConhecimentoController@update')->name('editarconhecimentostore');
Route::get('/conhecimento/deletar/{id}', 'ConhecimentoController@destroy')->name('deletarconhecimento');

Route::get('/consulta/conhecimentos', 'ConsultaConhecimentoController@index')->name('consultaconhecimentos');

Route::get('/conhecimento/categoria/{id}', 'ConhecimentoController@index');


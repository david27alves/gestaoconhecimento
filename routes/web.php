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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/categoria', function (){
    return view('novacategoria');
})->name('categoria');
Route::get('/categoria/novo', 'NovaCategoriaController@index');
Route::post('/categoria/novo', 'NovaCategoriaController@store')->name('incluircategoria');

Route::get('/conhecimento/novo', 'ConhecimentoController@index')->name('conhecimento');

Route::post('/conhecimento/novo', 'ConhecimentoController@store')->name('incluirconhecimento');

Route::get('/consulta/conhecimentos', 'ConsultaConhecimentosController@index')->name('consultaconhecimentos');

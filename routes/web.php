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

// criando uma rota para um grupo de recursos específico
Route::resource('crud','CoronaController');

// criando uma rota para o recurso 'pais'
Route::resource('pais','PaisController');

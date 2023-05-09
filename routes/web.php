<?php

use App\Http\Controllers\CadastroCidadeController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\CadastroEstadoController;
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

Route::get('/', [CadastroController::class, 'index']);
Route::get('/cadastro', [CadastroController::class, 'create']);
Route::get('/cadastro/{id}', [CadastroController::class, 'show']);

Route::get('/inscricao_candidato', [CadastroController::class, 'ver']);
Route::get('/consulta/{cpf}', [CadastroController::class, 'consultar']);
Route::get('/verificacao/{cpf}', [CadastroController::class, 'consultarCpf']);

Route::resource('/cidades', CadastroCidadeController::class);
Route::get('/editar_cidade/{id}', [CadastroCidadeController::class, 'edit']);

Route::resource('/estados', CadastroEstadoController::class);
Route::get('/editar_estado/{id}', [CadastroEstadoController::class, 'edit']);

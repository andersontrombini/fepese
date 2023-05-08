<?php

use App\Http\Controllers\CadastroController;
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

Route::get('/cadastro/{cpf}', [CadastroController::class, 'consultar']);

Route::resource('/cidades', CadastroCidadeController::class);

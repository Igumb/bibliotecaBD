<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::apiResource('emprestimos', 'EmprestimoController');

Route::apiResource('clientes', 'ClienteController');

Route::post('/livros/cadastrar', 'LivroController@create');

Route::get('/livros', 'LivroController@list');

Route::get('/livros/{id}', 'LivroController@view');

Route::put('/livros/{id}', 'LivroController@edit');

Route::delete('/livros/{id}', 'LivroController@delete');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
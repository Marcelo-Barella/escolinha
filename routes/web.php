<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sobre', function () {
    return view('base.sobre');
})->name('sobre');

Route::get('/noticias', function () {
    return view('base.noticias');
})->name('noticias');

Route::get('/colaboradores', function () {
    return view('base.colaboradores');
})->name('usuarios');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
    Rota utiliza o método GET para obter uma lista de colaboradores. 
    A rota é mapeada para o método index() do controlador ColaboradoresController.
    Quando um usuário acessa a URL correspondente a esta rota no navegador, o Laravel chama o método index() do controlador ColaboradoresController e retorna a view correspondente.
    A view(colaboradores) é uma página que exibe a lista de colaboradores, e é renderizada pelo Laravel usando as informações fornecidas pelo método index() do controlador.
    Essa rota pode ser modificada de acordo com as necessidades, incluindo alterações no método HTTP utilizado, na URL e no controlador associado.
*/

Route::get('/colaboradores', [App\Http\Controllers\ColaboradoresController::class, 'index']);

Route::delete('/colaboradores/{id}',[App\Http\Controllers\ColaboradoresController::class, 'deletar_colaborador'])->name('deletar_colaborador');

Route::put('/colaboradores/{id}',[App\Http\Controllers\ColaboradoresController::class, 'atualizar_colaborador'])->name('atualizar_colaborador');


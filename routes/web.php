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

Route::get('/usuarios', function () {
    return view('base.usuarios');
})->name('usuarios');

Route::get('/pessoas', function () {
    return view('base.pessoas');
})->name('pessoas');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
    Rota utiliza o método GET para obter uma lista de usuarios. 
    A rota é mapeada para o método index() do controlador usuariosController.
    Quando um usuário acessa a URL correspondente a esta rota no navegador, o Laravel chama o método index() do controlador UsuariosController e retorna a view correspondente.
    A view(usuarios) é uma página que exibe a lista de usuarios, e é renderizada pelo Laravel usando as informações fornecidas pelo método index() do controlador.
    Essa rota pode ser modificada de acordo com as necessidades, incluindo alterações no método HTTP utilizado, na URL e no controlador associado.
*/

Route::get('/pessoas', [App\Http\Controllers\PessoasController::class, 'index']);

Route::delete('/pessoas/{CPF}',[App\Http\Controllers\PessoasController::class, 'deletar_pessoa'])->name('deletar_pessoa');

Route::put('/pessoas/{CPF}',[App\Http\Controllers\PessoasController::class, 'atualizar_pessoa'])->name('atualizar_pessoa');


Route::get('/usuarios', [App\Http\Controllers\UsuariosController::class, 'index']);

Route::delete('/usuarios/{id}',[App\Http\Controllers\UsuariosController::class, 'deletar_usuario'])->name('deletar_usuario');

Route::put('/usuarios/{id}',[App\Http\Controllers\UsuariosController::class, 'atualizar_usuario'])->name('atualizar_usuario');


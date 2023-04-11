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

Route::get('/colaboradores', [App\Http\Controllers\ColaboradoresController::class, 'index']);

Route::delete('/colaboradores/{id}',[App\Http\Controllers\ColaboradoresController::class, 'deletar_colaborador'])->name('deletar_colaborador');

Route::put('/colaboradores/{id}',[App\Http\Controllers\ColaboradoresController::class, 'atualizar_colaborador'])->name('atualizar_colaborador');

// Route::get('/colaboradores', 'ColaboradoresController@index')->name('Colaboradores.index');


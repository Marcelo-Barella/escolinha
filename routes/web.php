<?php

use Illuminate\Support\Facades\Auth;
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
// A rota /pessoas existe e funciona, mas não aparece no app.blade.php. Erro de que a rota não existe.
Route::get('/pessoas', function () {
    return view('base.pessoas');
})->name('pessoas');

Route::get('/disciplinas', function () {
    return view('base.disciplinas');
})->name('disciplinas');

Route::get('/', function () {
    return view('base.noticias');
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




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
    Rota utiliza o método GET para obter uma lista de usuarios. 
    A rota é mapeada para o método index() do controlador usuariosController.
    Quando um usuário acessa a URL correspondente a esta rota no navegador, o Laravel chama o método index() do controlador UsuariosController e retorna a view correspondente.
    A view(usuarios) é uma página que exibe a lista de usuarios, e é renderizada pelo Laravel usando as informações fornecidas pelo método index() do controlador.
    Essa rota pode ser modificada de acordo com as necessidades, incluindo alterações no método HTTP utilizado, na URL e no controlador associado.
*/

// Novas rotas a partir das rotas base
// Pessoas
Route::get('/pessoas', [App\Http\Controllers\PessoasController::class, 'index'])->name('pessoas');

Route::delete('/pessoas/{id}',[App\Http\Controllers\PessoasController::class, 'deletar_pessoa'])->name('deletar_pessoa');

Route::put('/pessoas/{id}',[App\Http\Controllers\PessoasController::class, 'atualizar_pessoa'])->name('atualizar_pessoa');

Route::post('/pessoas',[App\Http\Controllers\PessoasController::class, 'inserir_pessoa'])->name('inserir_pessoa');
//
// Disciplinas
Route::get('/disciplinas', [App\Http\Controllers\DisciplinasController::class, 'index'])->name('disciplinas');

Route::delete('/disciplinas/{id}',[App\Http\Controllers\DisciplinasController::class, 'deletar_disciplina'])->name('deletar_disciplina');

Route::put('/disciplinas/{id}',[App\Http\Controllers\DisciplinasController::class, 'atualizar_disciplina'])->name('atualizar_disciplina');

Route::post('/disciplinas',[App\Http\Controllers\DisciplinasController::class, 'inserir_disciplina'])->name('inserir_disciplina');
// Turmas
Route::get('/turmas', [App\Http\Controllers\TurmasController::class, 'index'])->name('turmas');

Route::delete('/turmas/{id}',[App\Http\Controllers\TurmasController::class, 'deletar_turma'])->name('deletar_turma');

Route::put('/turmas/{id}',[App\Http\Controllers\TurmasController::class, 'atualizar_turma'])->name('atualizar_turma');

Route::post('/turmas',[App\Http\Controllers\TurmasController::class, 'inserir_turma'])->name('inserir_turma');
//
// Rotas antigas para servir como base
// Usuários
Route::get('/usuarios', [App\Http\Controllers\UsuariosController::class, 'index'])->name('usuarios');

Route::delete('/usuarios/{id}',[App\Http\Controllers\UsuariosController::class, 'deletar_usuario'])->name('deletar_usuario');

Route::put('/usuarios/{id}',[App\Http\Controllers\UsuariosController::class, 'atualizar_usuario'])->name('atualizar_usuario');

Auth::routes();

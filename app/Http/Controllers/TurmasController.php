<?php

namespace App\Http\Controllers;

use App\Models\Turmas;
use Illuminate\Http\Request;

class TurmasController extends Controller
{
    public function index()
    {

        // DESCRIÇÃO: Usado para listar todas as colunas da tabela turmas

        // $turmas = Turmas::all();
        // return view('base.turmas', ['turma' => $turmas]);

        // DESCRIÇÃO: Usado para criar paginação na View Turmas.

        $itensPaginas = 8; // número de itens por página
        $turmas = Turmas::paginate($itensPaginas);

        return view('base.turmas', ['turmas' => $turmas]);
    }

    public function deletar_turma($id)
    {
        print_r('Chegou');
        // DESCRIÇÃO: Busca o ID do usuário para realizar a exclusão do registro
        // Quando encontrado, exclui o registro no banco de dados.
        $turma = Turmas::find($id);

        if ($turma) {
            $turma->delete();
            return view('base.turmas')->with('success', 'Turma excluída com sucesso!');
        } else {
            return view('base.turmas')->with('error', 'Turma não encontrada.');
        }
    }

    public function atualizar_turma($id, Request $request)
    {
        //A função updateTurma é uma função que atualiza os dados do usuário no banco de dados. 
        //$turma = new Turmas; cria um novo objeto da classe Turmas.
        //$turma->updateTurma($id, $request->nome, $request->email); chama a função updateTurma do objeto $turma, 
        //passando os parâmetros $id, $request->nome e $request->email. 
        //Essa função atualiza o nome e o email do usuário com o $id. 
        //return redirect('/turmas'); redireciona o usuário para a página /turmas.

        $turma = new Turmas;
        $turma->updateTurma(
            $id,
            $request->ano,
            $request->turno,
            $request->sala,
            $request->grau
        );
        return redirect('/turmas');
    }

    public function inserir_turma(Request $request){
        Turmas::create([

        'ano' => $request->ano,
        'turno' => $request->turno,
        'sala' => $request->sala,
        'grau' => $request->grau

        ]);

        return redirect('/turmas');        

        // return redirect('/turmas');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Disciplinas;
use Illuminate\Http\Request;

class DisciplinasController extends Controller
{
    public function index()
    {

        // DESCRIÇÃO: Usado para listar todas as colunas da tabela disciplinas

        // $disciplinas = Disciplinas::all();
        // return view('base.disciplinas', ['disciplina' => $disciplinas]);

        // DESCRIÇÃO: Usado para criar paginação na View Disciplinas.

        $itensPaginas = 8; // número de itens por página
        $disciplinas = Disciplinas::paginate($itensPaginas);

        return view('base.disciplinas', ['disciplinas' => $disciplinas]);
    }

    public function deletar_disciplina($id)
    {
        print_r('Chegou');
        // DESCRIÇÃO: Busca o ID do usuário para realizar a exclusão do registro
        // Quando encontrado, exclui o registro no banco de dados.
        $disciplina = Disciplinas::find($id);

        if ($disciplina) {
            $disciplina->delete();
            return view('base.disciplinas')->with('success', 'Disciplina excluída com sucesso!');
        } else {
            return view('base.disciplinas')->with('error', 'Disciplina não encontrada.');
        }
    }

    public function atualizar_disciplina($id, Request $request)
    {
        //A função updateDisciplina é uma função que atualiza os dados do usuário no banco de dados. 
        //$disciplina = new Disciplinas; cria um novo objeto da classe Disciplinas.
        //$disciplina->updateDisciplina($id, $request->nome, $request->email); chama a função updateDisciplina do objeto $disciplina, 
        //passando os parâmetros $id, $request->nome e $request->email. 
        //Essa função atualiza o nome e o email do usuário com o $id. 
        //return redirect('/disciplinas'); redireciona o usuário para a página /disciplinas.

        $disciplina = new Disciplinas;
        $disciplina->updateDisciplina(
            $id,$request->descricao);
        return redirect('/disciplinas');
    }

    public function inserir_disciplina(Request $request){
        Disciplinas::create([

            'descricao' => $request->descricao,

        ]);

        return redirect('/disciplinas');        

        // return redirect('/disciplinas');
    }
}

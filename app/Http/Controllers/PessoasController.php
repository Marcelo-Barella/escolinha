<?php

namespace App\Http\Controllers;

use App\Models\Pessoas;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
class PessoasController extends Controller
{
    public function index()
    {

        // DESCRIÇÃO: Usado para listar todas as colunas da tabela pessoas

        // $pessoas = Pessoas::all();
        // return view('base.pessoas', ['pessoa' => $pessoas]);

        // DESCRIÇÃO: Usado para criar paginação na View Pessoas.

        $itensPaginas = 8; // número de itens por página
        $pessoas = Pessoas::paginate($itensPaginas);

        return view('base.pessoas', ['pessoas' => $pessoas]);
    }

    public function deletar_pessoa($id)
    {
        // DESCRIÇÃO: Busca o ID do usuário para realizar a exclusão do registro
        // Quando encontrado, exclui o registro no banco de dados.
        $pessoa = Pessoas::find($id);

        if ($pessoa) {
            $pessoa->delete();
            return view('base.pessoas')->with('success', 'Pessoas excluída com sucesso!');
        } else {
            return view('base.pessoas')->with('error', 'Pessoas não encontrada.');
        }
    }

    public function atualizar_pessoa($id, Request $request)
    {
        //A função updatePessoa é uma função que atualiza os dados do usuário no banco de dados. 
        //$pessoa = new Pessoas; cria um novo objeto da classe Pessoas.
        //$pessoa->updatePessoa($id, $request->nome, $request->email); chama a função updatePessoa do objeto $pessoa, 
        //passando os parâmetros $id, $request->nome e $request->email. 
        //Essa função atualiza o nome e o email do usuário com o $id. 
        //return redirect('/pessoas'); redireciona o usuário para a página /pessoas.

        $pessoa = new Pessoas;
        $pessoa->updatePessoa(
            $id, $request->nome, $request->$telefone, $request->endereco, $request->sexo, $request->grupo);
        return redirect('/pessoas');
        
        // SEM MODEL

        // $pessoa = Pessoas::find($id);
        // $pessoa->nome = $request->input('nome');
        // $pessoa->email = $request->input('email');
        // $pessoa->save();
        
        // return view('pessoas')->with('success', 'Pessoas Atualizado com sucesso!');

        // UPDATE COM JSON

        // $pessoa = Pessoas::find($id);
        // if (!$pessoa) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Pessoas não encontrado'
        //     ]);
        // }

        // $pessoa->nome = $request->input('nome');
        // $pessoa->email = $request->input('email');
        // $pessoa->save();

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Pessoas atualizado com sucesso'
        // ]);
    }

    public function inserir_pessoa(Request $request){
        $validar = $request->validate([
            'cpf' => 'required',
            'telefone' => 'required',
            'endereco' => 'required',
            'nome' => 'required',
            'sexo' => 'required',
            'grupo' => 'required'
        ]);
        Pessoas::create($validar);
        

        return redirect('/pessoas');
    }
}

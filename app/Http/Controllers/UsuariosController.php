<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class UsuariosController extends Controller
{
    public function index()
    {

        // DESCRIÇÃO: Usado para listar todas as colunas da tabela users

        // $users = Usuarios::all();
        // return view('base.usuarios', ['users' => $users]);

        // DESCRIÇÃO: Usado para criar paginação na View Usuarios.

        $itensPaginas = 8; // número de itens por página
        $users = Usuarios::paginate($itensPaginas);

        return view('base.usuarios', ['users' => $users]);
    }

    public function deletar_usuario($id)
    {
        // DESCRIÇÃO: Busca o ID do usuário para realizar a exclusão do registro
        // Quando encontrado, exclui o registro no banco de dados.
        $user = Usuarios::find($id);

        if ($user) {
            $user->delete();
            return view('base.usuarios')->with('success', 'Usuário excluído com sucesso!');
        } else {
            return view('base.usuarios')->with('error', 'Usuário não encontrado.');
        }
    }

    public function atualizar_usuario($id, Request $request)
    {
        //A função updateUser é uma função que atualiza os dados do usuário no banco de dados. 
        //$user = new Usuarios; cria um novo objeto da classe Usuarios.
        //$user->updateUser($id, $request->name, $request->email); chama a função updateUser do objeto $user, 
        //passando os parâmetros $id, $request->name e $request->email. 
        //Essa função atualiza o nome e o email do usuário com o $id. 
        //return redirect('/usuarios'); redireciona o usuário para a página /usuarios.

        $user = new Usuarios;
        $user->updateUser($id, $request->name, $request->email);
        return redirect('/usuarios');
        
        // SEM MODEL

        // $user = Usuarios::find($id);
        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        // $user->save();
        
        // return view('usuarios')->with('success', 'Usuário Atualizado com sucesso!');

        // UPDATE COM JSON

        // $user = Usuarios::find($id);
        // if (!$user) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Usuário não encontrado'
        //     ]);
        // }

        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        // $user->save();

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Usuário atualizado com sucesso'
        // ]);
    }
}

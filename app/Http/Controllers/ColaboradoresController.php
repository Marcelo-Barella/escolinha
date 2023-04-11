<?php

namespace App\Http\Controllers;

use App\Models\Colaboradores;
use Illuminate\Http\Request;

class ColaboradoresController extends Controller
{
    public function index()
    {
        $users = Colaboradores::all();
        return view('base.colaboradores', ['users' => $users]);
    }

    public function deletar_colaborador($id)
    {
        $user = Colaboradores::find($id);
        if ($user) {
            $user->delete();
            return view('base.colaboradores')->with('success', 'Usuário excluído com sucesso!');
        } else {
            return view('base.colaboradores')->with('error', 'Usuário não encontrado.');
        }
    }

    public function atualizar_colaborador($id, Request $request)
    {
        $user = new Colaboradores;
        $user->updateUser($id, $request->name, $request->email);
        return redirect('/colaboradores');
        
        // SEM MODEL

        // $user = Colaboradores::find($id);
        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        // $user->save();
        
        // return view('colaboradores')->with('success', 'Usuário Atualizado com sucesso!');

        // UPDATE COM JSON

        // $user = Colaboradores::find($id);
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

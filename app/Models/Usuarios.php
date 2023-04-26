<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model

{
    protected $table = 'users';

    //A função updateUser atualiza um registro no banco de dados com base em sua chave primária. 
    //$user = Usuarios::find($id); busca um registro na tabela users com a chave primária $id. 
    //$user->name = $name; atualiza o nome do usuário para $name, 
    //$user->email = $email; atualiza o email do usuário para $email,
    //$user->save(); salva as alterações no banco de dados.

    public function updateUser($id, $name, $email)
    {
        $user = Usuarios::find($id);
        $user->name = $name;
        $user->email = $email;
        $user->save();
    }

}
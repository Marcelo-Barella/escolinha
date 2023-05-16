<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoas extends Model
{
    protected $table = 'pessoa';

    //A função updatepessoa atualiza um registro no banco de dados com base em sua chave primária. 
    //$pessoa = Usuarios::find($id); busca um registro na tabela pessoas com a chave primária $id. 
    //$pessoa->name = $name; atualiza o nome do usuário para $name, 
    //$pessoa->email = $email; atualiza o email do usuário para $email,
    //$pessoa->save(); salva as alterações no banco de dados.

    public function updatePessoa($id, $cpf, $nome, $telefone, $endereco, $sexo, $grupo)
    {
        $pessoa = Pessoas::find($id);
        $pessoa->cpf = $cpf;
        $pessoa->nome = $nome;
        $pessoa->telefone = $telefone;
        $pessoa->endereco = $endereco;
        $pessoa->sexo = $sexo;
        $pessoa->grupo = $grupo;
        $pessoa->save();
    }

    public function insertPessoa($id, $cpf, $nome, $telefone)
    {
        $pessoa = Pessoas::find($id);
        $pessoa->cpf = $cpf;
        $pessoa->nome = $nome;
        $pessoa->telefone = $telefone;
        $pessoa->endereco = $endereco;
        $pessoa->sexo = $sexo;
        $pessoa->grupo = $grupo;
        $pessoa->save();
    }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplinas extends Model
{
    use HasFactory;
    protected $table = 'disciplinas';
    protected $fillable = 
    ['id',
    'descricao'];

    //A função updatedisciplina atualiza um registro no banco de dados com base em sua chave primária. 
    //$disciplina = Usuarios::find($id); busca um registro na tabela disciplinas com a chave primária $id. 
    //$disciplina->name = $name; atualiza o nome do usuário para $name, 
    //$disciplina->email = $email; atualiza o email do usuário para $email,
    //$disciplina->save(); salva as alterações no banco de dados.

    public function updateDisciplina($id, $descricao)
    {
        $disciplina = Disciplinas::find($id);
        $disciplina->descricao = $descricao;
        $disciplina->save();
    }

    public function insertDisciplina($id, $descricao)
    {
        $disciplina = Disciplinas::find($id);
        $disciplina->descricao = $descricao;

        $disciplina->save();
    }

}

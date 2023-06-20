<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turmas extends Model
{
    use HasFactory;
    protected $table = 'turmas';
    protected $fillable = 
    ['id',
    'ano',
    'turno',
    'sala',
    'grau'];

    //A função updateturma atualiza um registro no banco de dados com base em sua chave primária. 
    //$turma = Usuarios::find($id); busca um registro na tabela turmas com a chave primária $id. 
    //$turma->name = $name; atualiza o nome do usuário para $name, 
    //$turma->email = $email; atualiza o email do usuário para $email,
    //$turma->save(); salva as alterações no banco de dados.

    public function updateTurma($id, $ano, $turno, $sala, $grau)
    {
        $turma = Turmas::find($id);
        $turma->ano = $ano;
        $turma->turno = $turno;
        $turma->sala = $sala;
        $turma->grau = $grau;
        $turma->save();
    }

    public function insertTurma($id, $ano, $turno, $sala, $grau)
    {
        $turma = Turmas::find($id);
        $turma->ano = $ano;
        $turma->turno = $turno;
        $turma->sala = $sala;
        $turma->grau = $grau;

        $turma->save();
    }

}


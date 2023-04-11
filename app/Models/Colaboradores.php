<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colaboradores extends Model

{
    protected $table = 'users';

    public function updateUser($id, $name, $email)
    {
        $user = Colaboradores::find($id);
        $user->name = $name;
        $user->email = $email;
        $user->save();
    }

}
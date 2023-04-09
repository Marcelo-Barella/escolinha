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
}

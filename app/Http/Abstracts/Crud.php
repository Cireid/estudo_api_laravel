<?php

namespace App\Http\Abstracts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


abstract class Crud extends Controller
{
    abstract public function mostrarTodos();

    abstract public function exibir($id);

    abstract public function inserir(Request $request);

    abstract public function atualizar(Request $request, $id);

    abstract public function deletar($id);
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $usuario = new User;
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->senha = $request->senha;

        $resultado = $usuario->save();

        if($resultado){
            return ['resultado' => 'usuario salvo com sucesso'];
        }else{
            return ['resultado' => 'houve um problema em criar o usuario'];
        }
    }

    public function update(Request $request, $id)
    {
        $usuario = User::find($id);
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->senha = $request->senha;

        $resultado = $usuario->save();

        if($resultado){
            return ['resultado' => 'Update realizado com sucesso'];
        }else{
            return ['resultado' => 'Houve um erro ao fazer o update das informações'];
        }
    }

    public function destroy($id)
    {
        $usuario = User::find($id)->delete();
        if($usuario){
            return ['Resultado' => 'Usuario deletado com sucesso'];
        }else{
            return ['Resultado' => 'Ocorreu um problema ao deletar usuario'];
        }
    }
}

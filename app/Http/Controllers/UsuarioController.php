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
        $usuario->nome_usuario = $request->nome_usuario;
        $usuario->email_usuario = $request->email_usuario;
        $usuario->senha_usuario = $request->senha_usuario;

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
        $usuario->nome_usuario= $request->nome_usuario;
        $usuario->email_usuario = $request->email_usuario;
        $usuario->senha_usuario = $request->senha_usuario;
        $usuario->tipo_usuario= $request->tipo_usuario;
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

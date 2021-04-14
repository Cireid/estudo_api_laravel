<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Abstracts\Crud;

class UsuarioController extends Crud
{
    public function mostrarTodos()
    {
        try {
            return User::all();
            return response()->json([
                'status' => "Funcional",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Ocorreu um error',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function inserir(Request $request)
    {
        try {
            $usuario = new User;
            $resultado = $usuario->create([
                'nome_usuario' => $request->nome_usuario,
                'email_usuario' => $request->email_usuario,
                'senha_usuario' => $request->senha_usuario,
            ]);
            return response()->json([
                'status' => 'Funcional',
                'data' => $resultado
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Ocorreu algum erro',
                'Error' => $e->getMessage(),
            ], 400);
        }
    }

    public function atualizar(Request $request, $id)
    {
        try {
            $usuario = User::find($id);
            $resultado = $usuario->update([
                'nome_usuario' => $request->nome_usuario,
                'email_usuario' => $request->email_usuario,
                'senha_usuario' => $request->senha_usuario,
                'tipo_usuario' => $request->tipo_usuario,
            ]);
            return response()->json([
                'status' => 'Funcional',
                'data' => $resultado
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Ocorreu um erro',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function deletar($id)
    {
        try {
            $usuario = User::find($id)->delete();
            return response()->json([
                'status' => 'Funcional',
                'data' => $usuario,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ocorreu um error',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function exibir($id)
    {
        try {
            $usuario = User::find($id);
            return response()->json([
                'status' => 'Funcional',
                'data' => $usuario,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ocorreu um erro',
                'error' => $e->getMEssage(),
            ], 400);
        }
    }

    public function login(Request $request)
    {
        try {
            $resultado = User::where('email_usuario', $request->email_usuario)
                ->where('senha_usuario', $request->senha_usuario)
                ->first();
            return response()->json([
                'Resultado' => $resultado
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'Resultado' => 'Não encontrado'
            ], 400);
        }
    }
}

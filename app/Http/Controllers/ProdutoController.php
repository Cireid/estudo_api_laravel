<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Http\Abstracts\Crud;

class ProdutoController extends Crud
{
    //
    public function mostrarTodos()
    {
        try {
            return Produto::all();
            return response()->json([
                'status' => 'Funcional'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Ocorreu um error',
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function inserir(Request $request)
    {
        try {
            $produto = new Produto;
            $resultado = $produto->create([
                'nome_produto' => $request->nome_produto,
                'descricao_produto' => $request->descricao_produto,
                'valor_produto' => $request->valor_produto,
                'quantidade_produto' => $request->quantidade_produto,
            ]);
            return response()->json([
                'status' => 'funcional',
                'data' => $resultado
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Ocorreu um error',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function atualizar(Request $request, $id)
    {
        try {
            $produto = Produto::find($id);
            $resultado = $produto->update([
                'nome_produto' => $request->nome_produto,
                'descricao_produto' => $request->descricao_produto,
                'valor_produto' => $request->valor_produto,
                'quantidade_produto' => $request->quantidade_produto,
            ]);
            return response()->json([
                'status' => 'Funcional',
                'data' => $resultado,
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
            $produto = Produto::find($id)->delete();
            return response()->json([
                'status' => 'Funcional',
                'data' => $produto,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Ocorreu um error',
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function exibir($id)
    {
        try {
            $produto = Produto::find($id);
            return response()->json([
                'status' => 'Exibido com sucesso',
                'data' => $produto
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ocorreu um erro',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}

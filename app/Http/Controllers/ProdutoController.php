<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Produto;

class ProdutoController extends Controller
{
    //
    function getProduto(){
        return Produto::all();
    }

    function getProdutoParams($id=null){
        return $id?Produto::find($id):Produto::all();
    }

    function addProduto(Request $request){
        $produto = new Produto;
        $produto->nome_produto = $request->nome_produto;
        $produto->descricao_produto = $request->descricao_produto;
        $produto->valor_produto = $request->valor_produto;
        $produto->quantidade_produto = $request->quantidade_produto;
        $produto->save();
    }

    function updateProduto(Request $request, $id){

        $produto = Produto::find($id);
        $produto->nome_produto = $request->nome_produto;
        $produto->descricao_produto = $request->descricao_produto;
        $produto->valor_produto = $request->valor_produto;
        $produto->quantidade_produto = $request->quantidade_produto;
        $produto->save();
    }

    function deletarProduto($id){
        $produto = Produto::find($id)->delete();
    }

    function procurarProduto($nome){
        return Produto::where('nome_produto','like','%'.$nome.'%')->get();
    }

    function testeData(Request $request){
        $regras = array(
            'nome_produto' => 'required', 
            'descricao_produto' => 'required',
            'valor_produto' => 'required',
            'quantidade_produto' => 'required',
        );
        $validator = Validator::make($request->all(),$regras);

        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }else{
            $produto = new Produto;
            $produto->nome_produto = $request->nome_produto;
            $produto->descricao_produto = $request->descricao_produto;
            $produto->valor_produto = $request->valor_produto;
            $produto->quantidade_produto = $request->quantidade_produto;
            $resultado = $produto->save();
            if($resultado){
                return ['Resultado' => 'Operação bem sucedida'];
            }else{
                return ['Resultado' => 'Houve algum problema'];
            }

        }
    }
}

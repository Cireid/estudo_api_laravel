<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('entrar', [UsuarioController::class, 'login']);

Route::prefix('usuario')->group(function(){
    Route::get('/', [UsuarioController::class, 'mostrarTodos']);
    Route::get('/{id}', [UsuarioController::class, 'exibir']);
    Route::post('/add', [UsuarioController::class, 'inserir']);
    Route::put('atualizar/{id}', [UsuarioController::class, 'atualizar']);
    Route::delete('deletar/{id}', [UsuarioController::class], 'deletar');
});

Route::prefix('produto')->group(function () {
    Route::get('/', [ProdutoController::class, 'mostrarTodos']);
    Route::get('/{id}', [ProdutoController::class, 'exibir']);
    Route::post('/add', [ProdutoController::class, 'inserir']);
    Route::put('update/{id}', [ProdutoController::class, 'atualizar']);
    Route::delete('delete/{id}', [ProdutoController::class, 'deletarProduto']);
    Route::get('pesquisar/{nome}', [ProdutoController::class, 'deletar']);
});
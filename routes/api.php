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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('usuario', UsuarioController::class);

Route::prefix('produto')->group(function () {
    Route::get('/', [ProdutoController::class, 'getProduto']);
    Route::get('/{id?}', [ProdutoController::class, 'getProdutoParams']);
    Route::post('add', [ProdutoController::class, 'addProduto']);
    Route::put('update/{id}', [ProdutoController::class, 'updateProduto']);
    Route::delete('delete/{id}', [ProdutoController::class, 'deletarProduto']);
    Route::get('pesquisar/{nome}', [ProdutoController::class, 'procurarProduto']);
});



Route::post('save', [ProdutoController::class, 'testeData']);
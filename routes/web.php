<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\TiposVariacaoController;
use App\Http\Controllers\VariacaoController;
use App\Http\Controllers\VariaProdutoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Rotas GET

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Rotas POST

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas autenticadas

Route::middleware(['auth'])->group(function () {

    //Home
    Route::get('/home', function () {
        return view('dashboard.home');
    })->name('home');

    //Lista de produtos
    Route::get('/listaprodutos', function () {
        return view('dashboard.listaprodutos');
    })->name('listaprodutos');
    Route::get('/listaprodutos', [ProdutosController::class, 'index'])->name('produtos.index');
    //Cadastrar produtos e variações
    Route::get('/cadastrarproduto', function () {
        return view('dashboard.cadastrarproduto');
    })->name('cadastrarproduto');
    Route::get('/cadastrarvariacao', function () {
        return view('dashboard.cadastrarvariacao');
    })->name('cadastrarvariacao');
    Route::get('/cadastrartipovariacao', function () {
        return view('dashboard.cadastrartipovariacao');
    })->name('cadastrartipovariacao');

    //Cadastrar produtos, variações e variações de produtos

    Route::post('/produtos', [ProdutosController::class, 'store'])->name('produtos.store');
    Route::post('/variacao', [VariacaoController::class, 'store'])->name('variacao.store');
    Route::post('/variaproduto', [VariaProdutoController::class, 'store'])->name('varia_produto.store');
    Route::post('/tiposvariacao', [TiposVariacaoController::class, 'store'])->name('tipos_variacao.store');

    //Buscar produtos, variações e usuários
    Route::get('/variacao/buscar', [VariacaoController::class, 'buscar'])->name('variacao.buscar');
    Route::get('/variaproduto/buscar', [VariaProdutoController::class, 'buscar'])->name('varia_produto.buscar');

    Route::get('/produtos/buscar', [ProdutosController::class, 'buscar'])->name('produtos.buscar');
    Route::get('/usuarios/buscar', [AuthController::class, 'buscar'])->name('usuarios.buscar');

    //Editar & atualizar
    Route::put('/editarproduto', function () {
        return view('dashboard.editarvenda');
    })->name('editarvenda');

//Carregar página de edição do produto
    Route::get('/produtos/{id}/editar', [ProdutosController::class, 'edit'])->name('produtos.edit');

//Atualizar informações do produto
    Route::put('/produtos/{id}', [ProdutosController::class, 'update'])->name('produtos.update');

    Route::put('/variacao/{id}/editar', [VariacaoController::class, 'edit'])->name('variacao.edit');
    Route::put('/variacao/{variacao}', [VariacaoController::class, 'update'])->name('variacao.update');

    Route::put('/tiposvariacao/{id}/editar', [TiposVariacaoController::class, 'edit'])->name('tiposvariacao.edit');
    Route::put('/tiposvariacao/{tiposvariacao}', [TiposVariacaoController::class, 'update'])->name('tipos_variacao.update');

    //Remover
    Route::delete('/produtos/{id}', [ProdutosController::class, 'destroy'])->name('produtos.destroy');
    Route::delete('/variacao/{id}', [VariacaoController::class, 'destroy'])->name('variacao.destroy');
    Route::delete('/tiposvariacao/{id}', [TiposVariacaoController::class, 'destroy'])->name('tipos_variacao.destroy');

});

<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;
use App\Http\Middleware\LogAcessoMiddleware;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::post('/', [PrincipalController::class, 'salvar'])->name('site.index');

Route::get('/sobre-nos', [SobreNosController::class, 'sobrenos'])->name('site.sobrenos');

Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');


Route::get('/login/{erro?}',  [LoginController::class, 'index'])->name('site.login');
Route::post('/login',  [LoginController::class, 'autenticar'])->name('site.login');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function(){
   
    Route::get('/home', [HomeController::class,'index'])->name('app.home');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
    
    Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::get('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::post('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar{id}/{msg?}', [FornecedorController::class, 'editar'])->name('app.fornecedor.editar');
    Route::get('/fornecedor/exluir{id}}', [FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');
    
    
    Route::resource('/produtos', 'ProdutoController');
    Route::resource('produto-detalhe', 'ProdutoDetalheController');

    Route::resource('/cliente', 'ClienteController' );
    Route::resource('/pedido', 'PedidoController' );
    Route::resource('/pedido-produto', 'PedidoProdutoController' );

    
});


Route::fallback(function() {
    echo '<h3>A rota acessada não existe <a href="'.route('site.index').'">Clique aqui</a></h3>';
});


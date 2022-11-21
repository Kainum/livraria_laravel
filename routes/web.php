<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GenerosController;
use App\Http\Controllers\EditorasController;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\ColecoesController;
use App\Http\Controllers\CorreiosController;
use App\Http\Controllers\EnderecosController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WishListController;
use App\Http\Requests\EnderecoRequest;
use Illuminate\Routing\RouteGroup;

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

Route::get('/', function () {
    return view('welcome');
});


// ROTAS PUBLICAS
Route::any('/search', [SearchController::class, 'getLivros'])->name('search');

Route::group(['prefix' => 'browse'], function () {
    Route::get('/',     [SearchController::class, 'getGeneros'])->name('browse');
    Route::get('/{id}', [SearchController::class, 'getColecoes'])->name('browse.colecoes');;
});

Route::get('/image/{image_path}', [ImageController::class, 'show'])->name('image.show');

Route::group(['prefix' => 'produto'/*, 'where'=>['id'=>'[0-9]+']*/], function () {
    Route::get('/',         function () { return redirect()->route('search'); });
    Route::get('/{id}',     [SearchController::class, 'viewProduto'])->name('produto.view');
});

Route::group(['prefix' => 'colecao'/*, 'where'=>['id'=>'[0-9]+']*/], function () {
    Route::get('/',         function () { return redirect()->route('search'); });
    Route::get('/{id}',     [SearchController::class, 'viewColecao'])->name('colecao.view');
});

Route::post('/frete', [CorreiosController::class, 'calcular'])->name('correios.frete');
// FIM ROTAS PUBLICAS

// ROTAS CLIENTE
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'wishlist'/*, 'where'=>['id'=>'[0-9]+']*/], function () {
        Route::get('/',     [WishListController::class, 'view'])->name('wishlist');
        Route::post('/add/{id}',[WishListController::class, 'addWishList'])->name('wishlist.add');
        Route::get('/rem/{id}', [WishListController::class, 'removeWishList'])->name('wishlist.remove');
    });

    Route::group(['prefix' => 'carrinho', ], function () {
        Route::get('/',             [CartController::class, 'cartPage'])->name('cart.page');
        Route::post('/',            [CartController::class, 'store'])->name('cart.store');
        Route::get('/{rowId}/add',    [CartController::class, 'cartAdd'])->name('cart.add');
        Route::get('/{rowId}/sub',    [CartController::class, 'cartSub'])->name('cart.sub');
        Route::get('/{rowId}/exclude', [CartController::class, 'cartExclude'])->name('cart.exclude');

        Route::post('/endereco',    [CartController::class, 'selecionarEndereco'])->name('cart.endereco');
        Route::post('/confirmar_pedido',    [CartController::class, 'confirmarPedido'])->name('cart.confirmar');
        Route::post('/concluir',    [CartController::class, 'concluirPedido'])->name('cart.concluir');
        Route::get('/compras',      [CartController::class, 'compras'])->name('cart.compras');
    });

    Route::group(['prefix' => 'profile'], function () {
        Route::group(['prefix' => 'enderecos'/*, 'where'=>['id'=>'[0-9]+']*/], function () {
            Route::any('/',         [EnderecosController::class, 'index'])->name('enderecos');
            Route::get('/create',   [EnderecosController::class, 'create'])->name('enderecos.create');
            Route::post('/store',   [EnderecosController::class, 'store'])->name('enderecos.store');
            Route::get('/{id}/destroy', [EnderecosController::class,  'destroy'])->name('enderecos.destroy');
            Route::get('/edit',     [EnderecosController::class,  'edit'])->name('enderecos.edit');
            Route::put('/{id}/update',  [EnderecosController::class,  'update'])->name('enderecos.update');
        });

        Route::get('/meus_pedidos', [CartController::class, 'meusPedidos'])->name('meus_pedidos');
    });
    
});
// FIM ROTAS CLIENTE

// ROTAS ADMIN
Route::group(['prefix' => 'admin'], function () {
    Route::get('login',     [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login',    [AdminAuthController::class, 'login'])->name('admin.login');
    Route::get('logout',    [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });

    Route::group(['prefix' => 'generos'/*, 'where'=>['id'=>'[0-9]+']*/], function () {
        Route::any('/',         [GenerosController::class, 'index'])->name('admin.generos');
        Route::get('/create',   [GenerosController::class, 'create'])->name('admin.generos.create');
        Route::post('/store',   [GenerosController::class, 'store'])->name('admin.generos.store');
        Route::get('/{id}/destroy', [GenerosController::class,  'destroy'])->name('admin.generos.destroy');
        Route::get('/edit',     [GenerosController::class,  'edit'])->name('admin.generos.edit');
        Route::put('/{id}/update',  [GenerosController::class,  'update'])->name('admin.generos.update');
    });

    Route::group(['prefix' => 'editoras'/*, 'where'=>['id'=>'[0-9]+']*/], function () {
        Route::any('/',         [EditorasController::class, 'index'])->name('admin.editoras');
        Route::get('/create',   [EditorasController::class, 'create'])->name('admin.editoras.create');
        Route::post('/store',   [EditorasController::class, 'store'])->name('admin.editoras.store');
        Route::get('/{id}/destroy', [EditorasController::class,  'destroy'])->name('admin.editoras.destroy');
        Route::get('/edit',     [EditorasController::class,  'edit'])->name('admin.editoras.edit');
        Route::put('/{id}/update',  [EditorasController::class,  'update'])->name('admin.editoras.update');
    });

    Route::group(['prefix' => 'livros'/*, 'where'=>['id'=>'[0-9]+']*/], function () {
        Route::any('/',         [LivrosController::class, 'index'])->name('admin.livros');
        Route::get('/create',   [LivrosController::class, 'create'])->name('admin.livros.create');
        Route::post('/store',   [LivrosController::class, 'store'])->name('admin.livros.store');
        Route::get('/{id}/destroy', [LivrosController::class,  'destroy'])->name('admin.livros.destroy');
        Route::get('edit',      [LivrosController::class,  'edit'])->name('admin.livros.edit');
        Route::put('/{id}/update',  [LivrosController::class,  'update'])->name('admin.livros.update');
    });

    Route::group(['prefix' => 'colecoes'/*, 'where'=>['id'=>'[0-9]+']*/], function () {
        Route::any('/',         [ColecoesController::class, 'index'])->name('admin.colecoes');
        Route::get('/create',   [ColecoesController::class, 'create'])->name('admin.colecoes.create');
        Route::post('/store',   [ColecoesController::class, 'store'])->name('admin.colecoes.store');
        Route::get('/{id}/destroy', [ColecoesController::class,  'destroy'])->name('admin.colecoes.destroy');
        Route::get('/edit',     [ColecoesController::class,  'edit'])->name('admin.colecoes.edit');
        Route::put('/{id}/update',  [ColecoesController::class,  'update'])->name('admin.colecoes.update');
    });
});
// FIM ROTAS ADMIN

Route::get('/layout', function () {
    return view('layout_admin');
});

require __DIR__.'/auth.php';
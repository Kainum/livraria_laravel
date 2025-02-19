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
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RelatoriosController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WishListController;


// ROTAS PUBLICAS
Route::controller(SearchController::class)->group(function () {
    Route::redirect('/', '/home');
    Route::get('/home', 'homePage')->name('home');

    Route::any('/search', 'getLivros')->name('search');

    Route::get('/browse', 'getGeneros')->name('browse');
    Route::get('/browse/{id}', 'getColecoes')->name('browse.colecoes');;

    Route::redirect('/produto', '/search');
    Route::get('/produto/{id}', 'viewProduto')->name('produto.view');

    Route::redirect('/colecao', '/search');
    Route::get('/colecao/{id}', 'viewColecao')->name('colecao.view');
});

Route::get('/image/{image_path}', [ImageController::class, 'show'])->name('image.show');

Route::post('/frete', [CorreiosController::class, 'calcular'])->name('correios.frete');
// FIM ROTAS PUBLICAS


// ROTAS CLIENTE
Route::middleware('auth')->group(function () {

    Route::prefix('wishlist')->controller(WishListController::class)->name('wishlist.')->group(function () {
        Route::get('/', 'view')->name('index');
        Route::post('/add/{id}', 'addWishList')->name('add');
        Route::get('/rem/{id}', 'removeWishList')->name('remove');
    });

    Route::prefix('carrinho')->name('cart.')->group(function () {
        Route::controller(CartController::class)->group(function () {
            Route::get('/', 'cartPage')->name('page');
            Route::post('/', 'store')->name('store');
            Route::get('/{rowId}/add', 'cartAdd')->name('add');
            Route::get('/{rowId}/sub', 'cartSub')->name('sub');
            Route::get('/{rowId}/exclude','cartExclude')->name('exclude');
    
            Route::post('/endereco', 'selecionarEndereco')->name('endereco');
        });

        Route::controller(PedidosController::class)->group(function () {
            Route::post('/confirmar_pedido', 'confirmarPedido')->name('confirmar');
            Route::post('/concluir', 'concluirPedido')->name('concluir');
        });
    });

    Route::prefix('profile')->group(function () {
        Route::controller(ProfileController::class)->name('profile.')->group(function () {
            Route::get('/', 'view')->name('view');
            Route::get('/edit', 'edit')->name('edit');
            Route::put('/update', 'update')->name('update');
    
            Route::get('/password/edit', 'editPassword')->name('password.edit');
            Route::put('/password/update', 'updatePassword')->name('password.update');
        });

        Route::prefix('enderecos')->controller(EnderecosController::class)->name('enderecos.')->group(function () {
            Route::any('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}/destroy', 'destroy')->name('destroy');
            Route::get('/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
        });

        Route::get('/meus_pedidos', [PedidosController::class, 'meusPedidos'])->name('meus_pedidos');
        Route::get('/meus_pedidos/{id}/cancelar', [PedidosController::class,  'cancelarPedido'])->name('pedido.cancelar');
    });
});
// FIM ROTAS CLIENTE

// ROTAS ADMIN
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('login');
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::middleware('auth:admin')->group(function () {
        Route::redirect('/', '/admin/dashboard');
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::prefix('generos')->controller(GenerosController::class)->name('generos.')->group(function () {
            Route::any('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}/destroy','destroy')->name('destroy');
            Route::get('/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
        });

        Route::prefix('editoras')->controller(EditorasController::class)->name('editoras.')->group(function () {
            Route::any('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}/destroy','destroy')->name('destroy');
            Route::get('/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
        });

        Route::prefix('livros')->controller(LivrosController::class)->name('livros.')->group(function () {
            Route::any('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}/destroy','destroy')->name('destroy');
            Route::get('/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
        });

        Route::prefix('colecoes')->controller(ColecoesController::class)->name('colecoes.')->group(function () {
            Route::any('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}/destroy','destroy')->name('destroy');
            Route::get('/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
        });

        Route::prefix('relatorios')->controller(RelatoriosController::class)->name('relatorios.')->group(function () {
            Route::get('/estoque', 'relatorioEstoque')->name('estoque.page');
            Route::post('/estoque', 'gerarRelEstoque')->name('estoque.gerar');
            Route::get('/vendas_periodo', 'relatorioVendasPeriodo')->name('vendas_periodo.page');
            Route::post('/vendas_periodo', 'gerarRelVendasPeriodo')->name('vendas_periodo.gerar');
        });
    });
});
// FIM ROTAS ADMIN

Route::get('/layout', function () {
    return view('layout_admin');
});

require __DIR__ . '/auth.php';

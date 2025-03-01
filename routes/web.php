<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CorreiosController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RelatoriosController;
use App\Http\Controllers\ShopNavigationController;
use App\Http\Controllers\WishListController;


// ROTAS PUBLICAS
Route::controller(ShopNavigationController::class)->group(function () {
    Route::redirect('/', '/home');
    Route::get('/home', 'home')->name('home');

    Route::any('/search', 'search')->name('search');

    Route::get('/browse', 'browse')->name('browse');
    Route::get('/browse/{slug}', 'view_collections_from_genre')->name('genre.view');

    Route::redirect('/collection', '/search');
    Route::get('/collection/{slug}', 'view_books_from_collection')->name('collection.view');
    
    Route::redirect('/book', '/search');
    Route::get('/book/{slug}', 'view_book')->name('product.view');
});

Route::post('/frete', [CorreiosController::class, 'calcular'])->name('correios.frete');


// ROTAS CLIENTE
Route::middleware('auth')->group(function () {

    Route::prefix('carrinho')->name('cart.')->group(function () {
        Route::controller(CartController::class)->group(function () {
            Route::get('/', 'cartPage')->name('page');
            Route::post('/', 'store')->name('store');
            Route::get('/add/{id}', 'cart_add')->name('add');
            Route::get('/sub/{id}', 'cart_sub')->name('sub');
            Route::get('/exclude/{id}', 'cart_exclude')->name('exclude');

            Route::post('/endereco', 'selecionarEndereco')->name('endereco');
        });

        Route::controller(OrderController::class)->group(function () {
            Route::post('/confirmar_pedido', 'confirmarPedido')->name('confirmar');
            Route::post('/concluir', 'concluirPedido')->name('concluir');
        });
    });

    Route::prefix('my-profile')->name('profile.')->group(function () {

        Route::controller(ProfileController::class)->group(function () {
            Route::get('/', 'view')->name('view');
            Route::get('/edit', 'edit')->name('edit');
            Route::post('/update', 'update')->name('update');

            Route::get('/password/edit', 'editPassword')->name('password.edit');
            Route::post('/password/update', 'updatePassword')->name('password.update');
        });

        Route::prefix('wishlist')->controller(WishListController::class)->name('wishlist.')->group(function () {
            Route::get('/', 'view')->name('index');
            Route::post('/add/{id}', 'wishlist_add')->name('add');
            Route::get('/rem/{id}', 'wishlist_remove')->name('remove');
        });

        Route::prefix('my-addresses')->controller(AddressController::class)->name('addresses.')->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
        });
        
        Route::prefix('my-orders')->controller(OrderController::class)->name('orders.')->group(function () {
            Route::get('/', 'meusPedidos')->name('index');
            Route::get('/cancelar/{id}', 'cancelarPedido')->name('cancel');
        });

    });
});
// FIM ROTAS CLIENTE

// ROTAS ADMIN
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->middleware('auth:admin')->name('admin.')->group(function () {

    Route::redirect('/', '/admin/dashboard');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::prefix('genres')->controller(GenreController::class)->name('genres.')->group(function () {
        Route::any('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('publishers')->controller(PublisherController::class)->name('publishers.')->group(function () {
        Route::any('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('books')->controller(BookController::class)->name('books.')->group(function () {
        Route::any('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('collections')->controller(CollectionController::class)->name('collections.')->group(function () {
        Route::any('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('relatorios')->controller(RelatoriosController::class)->name('relatorios.')->group(function () {
        Route::get('/estoque', 'relatorioEstoque')->name('estoque.page');
        Route::post('/estoque', 'gerarRelEstoque')->name('estoque.gerar');
        Route::get('/vendas_periodo', 'relatorioVendasPeriodo')->name('vendas_periodo.page');
        Route::post('/vendas_periodo', 'gerarRelVendasPeriodo')->name('vendas_periodo.gerar');
    });
});
// FIM ROTAS ADMIN

require __DIR__ . '/auth.php';

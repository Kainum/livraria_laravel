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
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SearchController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/browse',       [SearchController::class, 'getGeneros'])->name('browse');
Route::get('/browse/{id}',  [SearchController::class, 'getColecoes'])->name('browse.colecoes');;

Route::any('/search', [SearchController::class, 'getLivros'])->name('search');

Route::get('/image/{image_path}', [ImageController::class, 'show'])->name('image.show');

Route::group(['prefix' => 'produto', 'where'=>['id'=>'[0-9]+']], function () {
    Route::get('/',         [SearchController::class, 'getAll']);
    Route::get('/{id}',     [SearchController::class, 'view'])->name('produto.view');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('login',     [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login',    [AdminAuthController::class, 'login'])->name('admin.login');
    Route::get('logout',    [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });

    Route::group(['prefix' => 'generos', 'where'=>['id'=>'[0-9]+']], function () {
        Route::any('/',         [GenerosController::class, 'index'])->name('admin.generos');
        Route::get('/create',   [GenerosController::class, 'create'])->name('admin.generos.create');
        Route::post('/store',   [GenerosController::class, 'store'])->name('admin.generos.store');
        Route::get('/{id}/destroy', [GenerosController::class,  'destroy'])->name('admin.generos.destroy');
        Route::get('/{id}/edit',    [GenerosController::class,  'edit'])->name('admin.generos.edit');
        Route::put('/{id}/update',  [GenerosController::class,  'update'])->name('admin.generos.update');
    });

    Route::group(['prefix' => 'editoras', 'where'=>['id'=>'[0-9]+']], function () {
        Route::any('/',         [EditorasController::class, 'index'])->name('admin.editoras');
        Route::get('/create',   [EditorasController::class, 'create'])->name('admin.editoras.create');
        Route::post('/store',   [EditorasController::class, 'store'])->name('admin.editoras.store');
        Route::get('/{id}/destroy', [EditorasController::class,  'destroy'])->name('admin.editoras.destroy');
        Route::get('/{id}/edit',    [EditorasController::class,  'edit'])->name('admin.editoras.edit');
        Route::put('/{id}/update',  [EditorasController::class,  'update'])->name('admin.editoras.update');
    });

    Route::group(['prefix' => 'livros', 'where'=>['id'=>'[0-9]+']], function () {
        Route::any('/',         [LivrosController::class, 'index'])->name('admin.livros');
        Route::get('/create',   [LivrosController::class, 'create'])->name('admin.livros.create');
        Route::post('/store',   [LivrosController::class, 'store'])->name('admin.livros.store');
        Route::get('/{id}/destroy', [LivrosController::class,  'destroy'])->name('admin.livros.destroy');
        Route::get('/{id}/edit',    [LivrosController::class,  'edit'])->name('admin.livros.edit');
        Route::put('/{id}/update',  [LivrosController::class,  'update'])->name('admin.livros.update');
    });

    Route::group(['prefix' => 'colecoes', 'where'=>['id'=>'[0-9]+']], function () {
        Route::any('/',         [ColecoesController::class, 'index'])->name('admin.colecoes');
        Route::get('/create',   [ColecoesController::class, 'create'])->name('admin.colecoes.create');
        Route::post('/store',   [ColecoesController::class, 'store'])->name('admin.colecoes.store');
        Route::get('/{id}/destroy', [ColecoesController::class,  'destroy'])->name('admin.colecoes.destroy');
        Route::get('/{id}/edit',    [ColecoesController::class,  'edit'])->name('admin.colecoes.edit');
        Route::put('/{id}/update',  [ColecoesController::class,  'update'])->name('admin.colecoes.update');
    });
});

Route::get('/layout', function () {
    return view('layout_admin');
});

Route::group(['prefix' => 'cart', ], function () {
    Route::get('/',             [CartController::class, 'cartPage'])->name('cart.page');
    Route::post('/',            [CartController::class, 'store'])->name('cart.store');
    Route::get('/{rowId}/add',    [CartController::class, 'cartAdd'])->name('cart.add');
    Route::get('/{rowId}/sub',    [CartController::class, 'cartSub'])->name('cart.sub');
    Route::get('/{rowId}/exclude', [CartController::class, 'cartExclude'])->name('cart.exclude');
});

Route::get('/frete', [CorreiosController::class, 'calcular'])->name('correios.frete');


require __DIR__.'/auth.php';

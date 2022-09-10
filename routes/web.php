<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\GenerosController;
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

Route::get('/browse', [GenerosController::class, 'index']);

Route::group(['prefix' => 'admin'], function () {
    Route::get('login',     [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login',    [AdminAuthController::class, 'login'])->name('admin.login');
    Route::get('logout',    [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });

    Route::group(['prefix' => 'generos', 'where'=>['id'=>'[0-9]+']], function () {
        Route::get('/',         [GenerosController::class, 'index'])->name('admin.generos');
        Route::get('/create',   [GenerosController::class, 'create'])->name('admin.generos.create');
        Route::post('/store',   [GenerosController::class, 'store'])->name('admin.generos.store');
        Route::get('/{id}/destroy', [GenerosController::class,  'destroy'])->name('admin.generos.destroy');
        Route::get('/{id}/edit',    [GenerosController::class,  'edit'])->name('admin.generos.edit');
        Route::put('/{id}/update',  [GenerosController::class,  'update'])->name('admin.generos.update');
    });
});

Route::get('/layout', function () {
    return view('layout_admin');
});


require __DIR__.'/auth.php';

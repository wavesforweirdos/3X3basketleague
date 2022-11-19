<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EntityController;

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

Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/index', [UserController::class, 'index'])->name('home');

Route::get('/signin', function () {
    return view('signin');
})->name('signin');
Route::get('/signup', function () {
    return view('signup');
})->name('signup');

// --------- Rutas de Entity ----------
Route::get('/entity', [EntityController::class, 'index'])->name('entity');
Route::get('/entity/create', [EntityController::class, 'create'])->name('entity.create');
Route::get('/entity/edit/{id_entity}', [EntityController::class, 'edit'])->name('entity.edit');
Route::get('/entity/delete/{id_entity}', [EntityController::class, 'delete'])->name('entity.delete');
Route::get('/entity/{league}', [EntityController::class, 'edit'])->name('entity.show');

// --------- Rutas de League ----------
Route::get('/league/create', [EntityController::class, 'create'])->name('league.create');

// --------- Ruta 404  ----------
Route::get('/404', function () {
    return view('404');
});

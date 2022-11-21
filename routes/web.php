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
//Route::   (metodo:get/post)   ('url que se mostrará',[Controller::class, 'funcion a llamar'])->name('nombre de la ruta')


// --------- Rutas de User ----------
Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/index', [UserController::class, 'index'])->name('home');
Route::get('/signin', [UserController::class, 'signin'])->name('signin');
Route::get('/signup', [UserController::class, 'signup'])->name('signup');

// --------- Rutas de Entity ----------
Route::get('/entity', [EntityController::class, 'index'])->name('entity');
Route::get('/entity/create', [EntityController::class, 'create'])->name('entity.create');
Route::post('/entity/store', [EntityController::class, 'store'])->name('entity.store');
Route::get('/entity/edit/', [EntityController::class, 'edit'])->name('entity.edit');

// --------- Rutas de League ----------
Route::get('/league/create/{id_entity}', [EntityController::class, 'create'])->name('league.create');

// --------- Ruta 404  ----------
Route::get('/404', function () {
    return view('404');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\LeagueController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|e
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::   (metodo:get/post)   ('url que se mostrará',[Controller::class, 'funcion a llamar'])->name('nombre de la ruta')
Route::get('/', [EntityController::class, 'index'])->name('home');

// --------- Rutas de Entity ----------
Route::resource('entidad', EntityController::class)->parameters(['entidad' => 'entity'])->names('entity');
// --------- Rutas de League ----------
Route::resource('league', LeagueController::class)->parameters(['liga' => 'league'])->names('league');

// --------- Rutas de User ----------
// Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/index', [UserController::class, 'index'])->name('home');
Route::get('/signin', [UserController::class, 'signin'])->name('signin');
Route::get('/signup', [UserController::class, 'signup'])->name('signup');;


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;

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

//BasciRoute ===============> Route::   (metodo:get/post)   ('url que se mostrará',[Controller::class, 'funcion a llamar'])->name('nombre de la ruta')
//Generar DefaultRoutes ===> Route::resource('league', LeagueController::class)->parameters(['liga' => 'league'])->names('league');


Route::get('/', [EntityController::class, 'index'])->name('home');



// --------- Rutas de Entity ----------
Route::resource('entity', EntityController::class)->names('entity');

// --------- Rutas de League ----------
// Solo las rutas que tienen controlador y vista: el resto devuelve 404 en vez de un error 500.
// El formulario de crear una liga o un partido lleva parámetro y se declara aparte (abajo).
Route::resource('league', LeagueController::class)->except(['index', 'create'])->names('league');
Route::get('league/create/{league}', [LeagueController::class, 'create'])->name('league.create');

// --------- Rutas de Team ----------
Route::resource('team', TeamController::class)->only(['store', 'edit', 'update', 'destroy'])->names('team');
Route::get('league/{league}/team/create', [TeamController::class, 'create'])->name('team.create');

// --------- Rutas de Player ----------
Route::resource('player', PlayerController::class)->only(['destroy'])->names('player');

// --------- Rutas de Game ----------
Route::resource('game', GameController::class)->except(['index', 'show', 'create'])->names('game');
Route::get('game/create/{league}', [GameController::class, 'create'])->name('game.create');


// --------- Rutas de User ----------
// Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/index', [UserController::class, 'index'])->name('home');
Route::get('/signin', [UserController::class, 'signin'])->name('signin');
Route::get('/signup', [UserController::class, 'signup'])->name('signup');;

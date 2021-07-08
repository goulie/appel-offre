<?php

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

Route::get('/appels-offres', [App\Http\Controllers\souscrireController::class, 'offres']);
Route::get('/', [App\Http\Controllers\souscrireController::class, 'offres'])->name('');

Route::get('/offres/{id}', [App\Http\Controllers\souscrireController::class, 'index']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/envoie-du-soumissionnaire', [App\Http\Controllers\souscrireController::class, 'add'])->name('souscrire');

Route::post('/exportation_des_soumissionnaires', [App\Http\Controllers\HomeController::class, 'export'])->name('export');

Route::get('/logout', [App\Http\Controllers\HomeController::class, 'deco'])->name('logout');

Route::post('/add_offer', [App\Http\Controllers\HomeController::class, 'add'])->name('publier');

Route::get('/gestion_des_offres', [App\Http\Controllers\HomeController::class, 'gestion'])->name('gestion');

Route::get('/edition_offre/{id}', [App\Http\Controllers\HomeController::class, 'edit_offre']);

Route::get('/supp_offre/{id}', [App\Http\Controllers\HomeController::class, 'delete_offer']);
Route::post('/edition_offre', [App\Http\Controllers\HomeController::class, 'confirm'])->name('confirm');

Auth::routes();

//
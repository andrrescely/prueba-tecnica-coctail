<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\CocktailController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/get-cocteles', [ApiController::class, 'getData'])->middleware('auth');
Route::post('/save-coctel', [ApiController::class, 'store'])->middleware('auth');

// routes/web.php
Route::get('/cocteles', [CocktailController::class, 'index'])->name('cocteles.index');
Route::get('/cocteles/{id}/edit', [CocktailController::class, 'edit'])->name('cocteles.edit');
Route::put('/cocteles/{id}', [CocktailController::class, 'update'])->name('cocteles.update');
Route::delete('/cocteles/{id}', [CocktailController::class, 'destroy'])->name('cocteles.destroy');


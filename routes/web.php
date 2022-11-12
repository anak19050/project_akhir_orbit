<?php

use App\Http\Controllers\FoodController;
use App\Http\Controllers\IngridientController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('adminlte::auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/food', [FoodController::class, 'index'])->name('food.index');
Route::post('/food', [FoodController::class, 'store'])->name('food.store');

Route::get('/ingridient', [IngridientController::class, 'index'])->name('ingridient.index');
Route::post('/ingridient', [IngridientController::class, 'store'])->name('ingridient.store');

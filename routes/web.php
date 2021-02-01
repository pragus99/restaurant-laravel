<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CategoryController,FoodController,HomeController};
use GuzzleHttp\Middleware;

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

Auth::routes(['register'=>false]);

Route::get('/', [HomeController::class, 'index'])->name('/');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('category', CategoryController::class);
    Route::resource('food', FoodController::class);
});

Route::get('/menu', [FoodController::class, 'foodList'])->name('food.menu');
Route::get('/foods/{id}', [FoodController::class, 'show'])->name('food.show');

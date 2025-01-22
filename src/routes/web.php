<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/',[ItemController::class,'index']);
Route::get('/search',[ItemController::class,'search'])->name('search');
Route::get('/item{id}',[ItemController::class,'show'])->name('item.show');
// Route::get('/mylist', [ItemController::class, 'show'])->name('favorites.show');

Route::post('/favorite', [ItemController::class, 'store'])->name('favorite.store');
Route::delete('/favorite', [ItemController::class, 'destroy'])->name('favorite.destroy');


// Route::get('/mylist/{favorite_id}', [ItemController::class, 'show']);
// Route::get('/', function () {
//     return view('auth/register');
// });p


Route::post('/edit',[UserController::class,'edit']);
// Route::get('/login', [AuthController::class, 'index']);
// Route::get('register',[AuthController::class, 'index']);
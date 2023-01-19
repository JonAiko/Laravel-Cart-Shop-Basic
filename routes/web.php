<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Login;
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
#Login
Route::get('/',[PaginaController::class,'index'])->name('home');
Route::get('/login',[LoginController::class,'index'])->name('login.index');
Route::get('/register',[UserController::class,'create'])->name('users.create');
Route::post('/register/store',[UserController::class,'store'])->name('users.store');
Route::post('/login/store',[LoginController::class,'store'])->name('login.store');
Route::post('/login/destroy',[LoginController::class,'destroy'])->name('login.destroy');

Route::middleware('auth')->group(function(){
    Route::get('/cart',[CartController::class,'index'])->name('cart.index');
    Route::post('/cart/{product}/add',[CartController::class,'store'])->name('cart.store');
    Route::post('/cart/{id}/update',[CartController::class,'update'])->name('cart.update');
    Route::post('/cart/{id}/delete-item',[CartController::class,'deleteItem'])->name('cart.delkey');
    Route::post('/cart/destroy',[CartController::class,'destroy'])->name('cart.destroy');
});

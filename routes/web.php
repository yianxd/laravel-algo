<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\UserController;

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

Route::resource('/user',UserController::class);
//Route::get('/user/index',[UserController::class,'index'])->name('user.index');
//Route::post('/user/create',[UserController::class,'create'])->name('user.create');
//Route::get('/user/edit',[UserController::class,'edit'])->name('user.edit');

Route::resource('/client',ClientsController::class);





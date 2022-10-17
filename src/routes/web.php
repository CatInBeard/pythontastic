<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReplController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\AuthController;

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

Route::view('/', 'welcome')->name("welcome.show");

Route::get('/repl',[ReplController::class, 'show'])->name("repl.show");

Route::post('/repl',[ReplController::class, 'run'])->name("repl.run");

Route::get('/auth',[AuthController::class, 'showAuth'])->name("user.auth.show");

Route::post('/auth',[AuthController::class, 'runAuth'])->name("user.auth.run");

Route::get('/logout',[AuthController::class, 'logout'])->name("user.logout");

Route::get('/reg',[AuthController::class, 'showReg'])->name("user.reg.show");

Route::post('/reg',[AuthController::class, 'runReg'])->name("user.reg.run");

Route::get('/profile',[UserController::class, 'showProfile'])->name("user.profile.show")->middleware('auth');
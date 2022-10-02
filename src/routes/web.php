<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReplController;
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

Route::view('/', 'welcome')->name("welcome.show");

Route::get('/repl',[ReplController::class, 'show'])->name("repl.show");

Route::post('/repl',[ReplController::class, 'run'])->name("repl.run");

Route::get('/auth',[UserController::class, 'showAuth'])->name("user.auth.show");

Route::post('/auth',[UserController::class, 'runAuth'])->name("user.auth.run");

Route::get('/reg',[UserController::class, 'showReg'])->name("user.reg.show");

Route::post('/reg',[UserController::class, 'runReg'])->name("user.reg.run");
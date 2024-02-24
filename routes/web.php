<?php

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\SavedGameController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[GameController::class,'getPaginatedGames']);
Route::get('/game/{slug}/', [GameController::class, 'show'])->name('game.show');
Route::get('/sortByPlatforms',[GameController::class,'sortByPlatforms']);
Route::get('/searchGames',[GameController::class,'searchGames']);

Route::get('saveGame',[SavedGameController::class,'index'])->middleware('auth');
Route::post('saveGame',[SavedGameController::class,'store'])->middleware('auth');
Route::post('removeGame',[SavedGameController::class,'destroy'])->middleware('auth');

Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');

Route::get('login',[SessionsController::class,'create'])->middleware('guest')->name('login');
Route::post('login',[SessionsController::class,'store'])->middleware('guest');

Route::post('logout',[SessionsController::class,'destroy'])->middleware('auth');

Route::get('password-forgot', [ForgotPasswordController::class,'index'])->middleware('guest')->name('password.request');
Route::post('password-forgot', [ForgotPasswordController::class,'resetLink'])->middleware('guest')->name('password.email');
Route::get('password-reset/{token}', [ForgotPasswordController::class, 'resetToken'])->middleware('guest')->name('password.reset');
Route::post('password-reset', [ForgotPasswordController::class, 'updatePassword'])->middleware('guest')->name('password.update');
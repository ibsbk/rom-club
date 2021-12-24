<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'mainView'])->name('/');

Route::get('/authAdmin', [UserController::class, 'authAdminView'])->name('authAdmin');
Route::post('/authAdmin', [UserController::class, 'authAdminPost']);

Route::get('/lkAdmin', [UserController::class, 'lkAdminView'])->name('lkAdmin')->middleware(\App\Http\Middleware\GuestRedirect::class);;

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/createHero', [UserController::class, 'createHeroView'])->name('createHero')->middleware(\App\Http\Middleware\GuestRedirect::class);;
Route::post('/createHero', [UserController::class, 'createHeroPost'])->middleware(\App\Http\Middleware\GuestRedirect::class);;

Route::get('/createHistory', [UserController::class, 'createHistoryView'])->name('createHistory')->middleware(\App\Http\Middleware\GuestRedirect::class);
Route::post('/createHistory', [UserController::class, 'createHistoryPost'])->middleware(\App\Http\Middleware\GuestRedirect::class);;

Route::get('/history/{id}', [MainController::class, 'historyView']);
Route::get('/hero/{id}', [MainController::class, 'heroView']);

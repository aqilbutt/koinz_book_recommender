<?php

use App\Http\Controllers\KBR\MainController;

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

Route::get('/', [MainController::class, 'redirectToDefault']);
Route::get('/kbr', [MainController::class, 'index'])->name('kbr.index');
Route::post('/kbr', [MainController::class, 'store'])->name('kbr.store');

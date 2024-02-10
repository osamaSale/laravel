<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usersController;
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

Route::get('/', usersController::class . '@index')->name('users.index');
Route::get('/users/create', usersController::class . '@create')->name('users.create');
Route::post('/users', usersController::class . '@store')->name('users.store');
Route::get('/users/show/{id}', usersController::class . '@show')->name('users.show');
Route::get('/users/edit/{id}', usersController::class . '@edit')->name('users.edit');
Route::post('/users/update/{id}', usersController::class . '@update')->name('users.update');
Route::delete('/users/delete/{id}', usersController::class . '@delete')->name('users.delete');

<?php

use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usersController;
use App\Http\Controllers\Auth\RegisteredUserController;
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

Route::get('/', usersController::class . '@login')->name('users.login');
Route::get('/dashboard', usersController::class . '@index')->name('users.index')->middleware(['auth', 'verified']);
Route::middleware('auth')->group(function () {
Route::get('/users/create', usersController::class . '@create')->name('users.create');
Route::post('/users', usersController::class . '@store')->name('users.store');
Route::get('/users/show/{id}', usersController::class . '@show')->name('users.show');
Route::get('/users/edit/{id}', usersController::class . '@edit')->name('users.edit');
Route::post('/users/update/{id}', usersController::class . '@update')->name('users.update');
Route::delete('/users/delete/{id}', usersController::class . '@delete')->name('users.delete');
Route::post('/users/trashed/{id}', usersController::class . '@trashed')->name('users.trashed');
Route::get('/users/allListTrashed', usersController::class . '@allListTrashed')->name('users.allListTrashed');
Route::get('/detail', DetailController::class . '@detail')->name('detail.index');
Route::delete('/detail/delete/{id}', DetailController::class . '@delete')->name('detail.index');
Route::get('/detail/edit/{id}', DetailController::class . '@edit')->name('detail.edit');
Route::post('/detail/update/{id}', DetailController::class . '@update')->name('detail.update');
});


require __DIR__ . '/auth.php';

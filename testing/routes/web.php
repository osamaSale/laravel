<?php

use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', [UsersController::class, 'index']);
Route::post('/create', [UsersController::class, 'create']);
Route::get('/show/{id}', [UsersController::class, 'show']);
Route::put('/update/{id}', [UsersController::class, 'update']);
Route::delete('/delete/{id}', [UsersController::class, 'delete']);
Route::get('/trashed', [UsersController::class, 'trashed']);
Route::put('/trashed/edit/{id}', [UsersController::class, 'edittrashed']);

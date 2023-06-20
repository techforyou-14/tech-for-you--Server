<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\GameController;
use App\Models\Tree;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [UserController::class, 'login'])->name('users.login');
Route::post('users', [UserController::class, 'register'])->name('users.register');

Route::middleware('auth:api')->group(function () {
  //users
    Route::put('users/{id}', [UserController::class, 'update'])->name('users.update')->middleware('role:user');
    Route::post('users/logout', [UserController::class, 'logout'])->name('users.logout')->middleware('role:admin|user');
    Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.delete')->middleware('role:user');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show')->middleware('role:user');

    //trees
    Route::post('trees/create', [TreeController::class, 'create'])->name('trees.create')->middleware('role:user');
    Route::put('trees/{id}', [TreeUserController::class, 'update'])->name('trees.update')->middleware('role:user');
    Route::post('trees/logout', [TreeController::class, 'logout'])->name('trees.logout')->middleware('role:admin|user');
    Route::delete('/trees/{id}', [TreeController::class, 'delete'])->name('trees.delete')->middleware('role:user');
    Route::get('/users/{id}', [TreeController::class, 'show'])->name('trees.show')->middleware('role:user');
});
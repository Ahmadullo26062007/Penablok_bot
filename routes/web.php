<?php

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
    return view('admin.dashboard');
})->name('admin');

Route::resource('users',\App\Http\Controllers\UserController::class);
Route::resource('roles',\App\Http\Controllers\RoleController::class);
Route::resource('permissions',\App\Http\Controllers\PermissionController::class);
Route::resource('categories',\App\Http\Controllers\CategoriesController::class);
Route::resource('media',\App\Http\Controllers\MediaController::class);

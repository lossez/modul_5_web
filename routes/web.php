<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('/profile');
Route::get('/listapp', [App\Http\Controllers\HomeController::class, 'listapp'])->name('/listapp');

Auth::routes();
Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
Route::resource('/admin/author', App\Http\Controllers\Admin\AuthorController::class);
Route::resource('/admin/news', App\Http\Controllers\Admin\NewsController::class);
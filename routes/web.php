<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')
    ->middleware(['auth', 'isAdmin'])
    ->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category');
        Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('add-category');
        Route::post('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
        Route::get('view-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('view-category');
        Route::get('edit-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('edit-category');
        Route::put('edit-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
        Route::delete('delete-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('delete-category');
    });

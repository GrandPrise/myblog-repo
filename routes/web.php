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

        Route::get('orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders');
        Route::get('add-order', [App\Http\Controllers\OrderController::class, 'create'])->name('add-order');
        Route::post('add-order', [App\Http\Controllers\OrderController::class, 'store']);

        //         Route::get('categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('categories');
        //         Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('add-category');
        //         Route::post('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
        //         Route::get('view-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('view-category');
        //         Route::get('edit-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('edit-category');
        //         Route::put('edit-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
        //         Route::delete('delete-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('delete-category');

        //         Route::get('posts', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('posts');
        //         Route::get('add-post', [App\Http\Controllers\Admin\PostController::class, 'create'])->name('add-post');
        //         Route::post('add-post', [App\Http\Controllers\Admin\PostController::class, 'store']);
        //         Route::get('view-post/{id}', [App\Http\Controllers\Admin\PostController::class, 'show'])->name('view-post');
        //         Route::get('edit-post/{id}', [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('edit-post');
        //         Route::put('edit-post/{id}', [App\Http\Controllers\Admin\PostController::class, 'update']);
        //         Route::delete('delete-post/{id}', [App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('delete-post');
    });

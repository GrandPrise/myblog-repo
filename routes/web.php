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

// Route::prefix('confirmante')->group(function () {
//     Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

//     Route::get('orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders');
//     Route::get('add-order', [App\Http\Controllers\OrderController::class, 'create'])->name('add-order');
//     Route::post('add-order', [App\Http\Controllers\OrderController::class, 'store']);
// });
Route::prefix('dashboard')
    ->middleware(['auth', 'isAdmin'])
    ->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        Route::get('orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders');
        Route::get('add-order', [App\Http\Controllers\OrderController::class, 'create'])->name('add-order');
        Route::post('add-order', [App\Http\Controllers\OrderController::class, 'store']);
    });

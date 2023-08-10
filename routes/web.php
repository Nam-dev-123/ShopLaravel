<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\UserController;

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

Route::prefix('/admin')->group(function () {
    Route::get('/',[DashboardController::class, 'index'])->name('admin.dashboard');
    Route::prefix('/products')->group(function () {
        Route::get('/',[ProductController::class, 'index'])->name('products.index');
        Route::get('/create',[ProductController::class, 'create'])->name('products.create');
        Route::post('/create',[ProductController::class, 'store'])->name('products.create');
        Route::get('/edit/{id}',[ProductController::class, 'edit'])->name('products.edit');
        Route::put('/update/{id}',[ProductController::class, 'update'])->name('products.update');
        Route::get('delete/{id}', [ProductController::class, 'destroy'])->name('products.delete');
    });
    Route::prefix('/users')->group(function () {
        Route::get('/',[UserController::class, 'index'])->name('users.index');
        Route::get('/create',[UserController::class, 'create'])->name('users.create');
    });
});

Route::get('/test', function () {
    return view('fontend.pages.test');
});

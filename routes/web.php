<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\LoginContrroller;

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
    Route::get('/',[DashboardController::class, 'index'])->name('admin.dashboard')->middleware('LoginAdmin');
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
        Route::post('/create', [UserController::class, 'store'])->name('users.create');
        Route::get('/edit/{id}',[UserController::class, 'edit'])->name('users.edit');
        Route::put('/update/{id}',[UserController::class, 'update'])->name('users.update');
        Route::get('delete/{id}', [UserController::class, 'destroy'])->name('users.delete');
    });
});

Route::prefix('/login')->group(function () {
    Route::get('/',[LoginContrroller::class, 'index'])->name('login');
    Route::post('/getLogin',[LoginContrroller::class, 'login'])->name('login.getLogin');
    Route::get('/getLogout',[LoginContrroller::class, 'logout'])->name('login.getLogout');
});

Route::get('/test', function () {
//    return view('fontend.pages.test');
    return \App\Models\Product::find(1)->brand;
});


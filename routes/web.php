<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
    return view('home');
});

Route::get('category', [CategoryController::class, 'index'])->name('category.index');
Route::get('add-category', [CategoryController::class, 'add'])->name('category.add');
Route::post('add-category', [CategoryController::class, 'create']);

Route::get('product', [ProductController::class, 'index'])->name('product.index');
Route::get('add-product', [ProductController::class, 'add'])->name('product.add');
Route::post('add-product', [ProductController::class, 'create']);
Route::get('product/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('product/{id}', [ProductController::class, 'update']);
Route::get('product-delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

Route::get('upload', [CategoryController::class, 'test']);
Route::post('upload', [CategoryController::class, 'upload']);
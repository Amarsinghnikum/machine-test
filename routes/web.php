<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Import\PostController;

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

// Route::middleware(['auth'])->group(function () {
    
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/form', [PostController::class, 'form'])->name('form');
Route::post('import', [PostController::class, 'store'])->name('import');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/add-products', [ProductController::class, 'add']);
    Route::post('/insert-product', [ProductController::class, 'insert']);
    Route::get('edit-product/{id}/', [ProductController::class, 'edit']);
    Route::put('update-product/{id}/', [ProductController::class, 'update']);
    Route::get('/delete-product/{id}',[ProductController::class, 'destroy']);
});
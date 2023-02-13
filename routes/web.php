<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Category;
use App\Http\Controllers\product;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/dashboard/admin/category', [Category::class, 'index'])->name('all.category');
    Route::get('/dashboard/admin/product', [product::class, 'index'])->name('all.product');
    Route::post('/dashboard/admin/category/add', [Category::class, 'add'])->name('add.category');
    Route::post('/dashboard/admin/product/add', [product::class, 'add'])->name('add.product');
    Route::delete('/dashboard/admin/category/delete/{id}', [Category::class, 'destroy'])->name('delete.category');
    Route::delete('/dashboard/admin/product/delete/{id}', [product::class, 'destroy'])->name('delete.product');

    Route::get('/dashboard/admin/category/edit/{id}',[Category::class,'Edit'])->name('edit.category');
    Route::get('/dashboard/admin/product/edit/{id}',[product::class,'Edit'])->name('edit.product');
    Route::post('/dashboard/admin/category/update/{id}',[Category::class,'Update'])->name('update.category');
    Route::post('/dashboard/admin/product/update/{id}',[product::class,'Update'])->name('update.product');


    
});

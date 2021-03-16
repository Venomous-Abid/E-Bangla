<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout']);


Route::get('/all-categories',[App\Http\Controllers\ProductsController::class, 'show'])->middleware('auth');

Route::get('/create_product', function(){
    return view('admin.create_product');
})->middleware('auth');


Route::get('/product_delete/{id}',[App\Http\Controllers\ProductsController::class, 'destroy'])->middleware('auth');

Route::get('/product_create',[App\Http\Controllers\ProductsController::class, 'create'])->middleware('auth');

Route::post('/product_submit',[App\Http\Controllers\ProductsController::class, 'store'])->middleware('auth');


Route::get('/edit-categories', function(){
    return view('admin.edit-categories');
})->middleware('auth');

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout']);

//products
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


//categories

Route::get('/categories',[App\Http\Controllers\CategoryController::class, 'manageCategory'])->middleware('auth');

Route::get('/add_categories', function(){
    return view('admin.add_categories');
})->middleware('auth');

//sub_catergories
Route::get('/sub_categories', function(){
    return view('admin.categories');
})->middleware('auth');

Route::get('/add_Sub_Categories', function(){
    return view('admin.add_categories');
})->middleware('auth');

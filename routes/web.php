<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagController;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


route::resource('/product', ProductsController::class);
Route::resource('/category', CategoriesController::class);
Route::resource('/tag', TagController::class)->middleware(['auth'])->name('dashboard');

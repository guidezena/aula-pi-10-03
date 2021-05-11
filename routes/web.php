<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CarrinhoController;


require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::resource('/product', ProductsController::class);

Route::get('/trash/product',[ProductsController::class, 'trash'])->name('product.trash');
Route::patch('/product/restore/{Product}',[ProductsController::class, 'restore'])->name('product.restore');


Route::resource('/category', CategoriesController::class);
Route::resource('/tag', TagController::class);

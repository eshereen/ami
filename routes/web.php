<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;
/*  
Frontend Routes
*/

Route::get('/',[FrontendController::class,'index'])->name(name: 'home');
Route::get('/about',[FrontendController::class,'about'])->name('about');
Route::get('/services',[FrontendController::class,'services'])->name('services');
Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::get('/product/{slug}',[ProductController::class,'show'])->name('product.show');
Route::get('/contact',[ContactController::class,'contact'])->name('contact.index');
Route::post('/contact',[ContactController::class,'store'])->name('contact.store');
Route::get('/terms',[FrontendController::class,'terms'])->name('terms');
Route::get('/privacy',[FrontendController::class,'privacy'])->name('privacy');
Route::get('/blog',[BlogController::class,'index'])->name('blog.index');
Route::get('/blog/{slug}',[BlogController::class,'show'])->name('blog.show');

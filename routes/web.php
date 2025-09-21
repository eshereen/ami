<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
/*
Frontend Routes
*/

Route::get('/',[FrontendController::class,'index'])->name('welcome');
Route::get('/home',[FrontendController::class,'home'])->name('home');
Route::get('/home-1',[FrontendController::class,'home1'])->name('home-1');
Route::get('/home-2',[FrontendController::class,'home2'])->name('home-2');
Route::get('/home-3',[FrontendController::class,'home3'])->name('home-3');
Route::get('/home-4',[FrontendController::class,'home4'])->name('home-4');
Route::get('/about',[FrontendController::class,'about'])->name('about');
Route::get('/services',[FrontendController::class,'services'])->name('services');
Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::get('/product/{slug}',[ProductController::class,'show'])->name('product.show');
Route::get('/contact',[ContactController::class,'contact'])->name('contact.index');
Route::post('/contact',[ContactController::class,'contact'])->name('contact.store');
Route::get('/terms',[FrontendController::class,'terms'])->name('terms');
Route::get('/privacy',[FrontendController::class,'privacy'])->name('privacy');

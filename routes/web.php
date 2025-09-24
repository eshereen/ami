<?php

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
/*
Frontend Routes
*/

Route::get('/',[FrontendController::class,'index'])->name(name: 'home');
Route::get('/about',[FrontendController::class,'about'])->name('about');
Route::get('/services',[FrontendController::class,'services'])->name('services');
Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::get('/product/{slug}',[ProductController::class,'show'])->name('product.show');
Route::get('/categories',[ProductController::class,'categories'])->name('categories.index');
Route::get('/subcategories',[SubcategoryController::class,'subcategories'])->name('subcategories.index');

Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/subcategory/{slug}', [SubcategoryController::class, 'show'])->name('subcategory.show');
Route::get('/contact',[ContactController::class,'contact'])->name('contact.index');
Route::post('/contact',[ContactController::class,'store'])->name('contact.store');
Route::get('/terms',[FrontendController::class,'terms'])->name('terms');
Route::get('/privacy',[FrontendController::class,'privacy'])->name('privacy');
Route::get('/blog',[BlogController::class,'index'])->name('blog.index');
Route::get('/blog/{slug}',[BlogController::class,'show'])->name('blog.show');
Route::get('/services',[ServiceController::class,'index'])->name('services.index');
Route::get('/service/{slug}',[ServiceController::class,'show'])->name('service.show');

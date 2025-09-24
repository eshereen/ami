<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ServiceController;
/*
Frontend Routes
*/

Route::get('/',[FrontendController::class,'index'])->name(name: 'home');
Route::get('/about',[FrontendController::class,'about'])->name('about');
Route::get('/services',[FrontendController::class,'services'])->name('services');
Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::get('/product/{slug}',[ProductController::class,'show'])->name('product.show');
Route::get('/categories',[ProductController::class,'categories'])->name('categories.index');
Route::get('/subcategories',[ProductController::class,'subcategories'])->name('subcategories.index');
Route::get('/category/{slug}', function(string $slug){
    $category = Category::where('slug', $slug)->with(['subcategories' => function($q){ $q->withCount('products'); }])->firstOrFail();
    return view('pages.products.category', compact('category'));
})->name('category.show');
Route::get('/subcategory/{slug}', function(string $slug){
    $subcategory = Subcategory::where('slug', $slug)->with(['products', 'category'])->firstOrFail();
    $allProducts = \App\Models\Product::with(['subcategory.category'])->get();
    $allCategories = \App\Models\Category::with(['subcategories'])->get();
    return view('pages.products.subcategory', compact('subcategory', 'allProducts', 'allCategories'));
})->name('subcategory.show');
Route::get('/contact',[ContactController::class,'contact'])->name('contact.index');
Route::post('/contact',[ContactController::class,'store'])->name('contact.store');
Route::get('/terms',[FrontendController::class,'terms'])->name('terms');
Route::get('/privacy',[FrontendController::class,'privacy'])->name('privacy');
Route::get('/blog',[BlogController::class,'index'])->name('blog.index');
Route::get('/blog/{slug}',[BlogController::class,'show'])->name('blog.show');
Route::get('/services',[ServiceController::class,'index'])->name('services.index');
Route::get('/service/{slug}',[ServiceController::class,'show'])->name('service.show');

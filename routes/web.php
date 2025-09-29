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
use App\Http\Controllers\GallaryController;
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
Route::get('/gallaries',[GallaryController::class,'index'])->name('gallaries.index');
Route::get('/blog/{slug}',[BlogController::class,'show'])->name('blog.show');
Route::get('/services',[ServiceController::class,'index'])->name('services.index');
Route::get('/service/{slug}',[ServiceController::class,'show'])->name('service.show');

// XML Sitemap
Route::get('/sitemap.xml', function () {
    $products = Product::select(['slug', 'updated_at'])->get();
    $categories = Category::select(['slug', 'updated_at'])->get();
    $subcategories = Subcategory::select(['slug', 'updated_at'])->get();

    $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
    $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    // Home page
    $sitemap .= '<url>';
    $sitemap .= '<loc>' . url('/') . '</loc>';
    $sitemap .= '<lastmod>' . now()->toISOString() . '</lastmod>';
    $sitemap .= '<changefreq>daily</changefreq>';
    $sitemap .= '<priority>1.0</priority>';
    $sitemap .= '</url>';

    // Static pages
    $staticPages = [
        ['url' => '/about', 'priority' => '0.8'],
        ['url' => '/products', 'priority' => '0.9'],
        ['url' => '/categories', 'priority' => '0.8'],
        ['url' => '/subcategories', 'priority' => '0.7'],
        ['url' => '/services', 'priority' => '0.8'],
        ['url' => '/contact', 'priority' => '0.7'],
        ['url' => '/blog', 'priority' => '0.6'],
    ];

    foreach ($staticPages as $page) {
        $sitemap .= '<url>';
        $sitemap .= '<loc>' . url($page['url']) . '</loc>';
        $sitemap .= '<lastmod>' . now()->toISOString() . '</lastmod>';
        $sitemap .= '<changefreq>weekly</changefreq>';
        $sitemap .= '<priority>' . $page['priority'] . '</priority>';
        $sitemap .= '</url>';
    }

    // Products
    foreach ($products as $product) {
        $sitemap .= '<url>';
        $sitemap .= '<loc>' . route('product.show', $product->slug) . '</loc>';
        $sitemap .= '<lastmod>' . $product->updated_at->toISOString() . '</lastmod>';
        $sitemap .= '<changefreq>monthly</changefreq>';
        $sitemap .= '<priority>0.8</priority>';
        $sitemap .= '</url>';
    }

    // Categories
    foreach ($categories as $category) {
        $sitemap .= '<url>';
        $sitemap .= '<loc>' . route('category.show', $category->slug) . '</loc>';
        $sitemap .= '<lastmod>' . $category->updated_at->toISOString() . '</lastmod>';
        $sitemap .= '<changefreq>weekly</changefreq>';
        $sitemap .= '<priority>0.7</priority>';
        $sitemap .= '</url>';
    }

    // Subcategories
    foreach ($subcategories as $subcategory) {
        $sitemap .= '<url>';
        $sitemap .= '<loc>' . route('subcategory.show', $subcategory->slug) . '</loc>';
        $sitemap .= '<lastmod>' . $subcategory->updated_at->toISOString() . '</lastmod>';
        $sitemap .= '<changefreq>weekly</changefreq>';
        $sitemap .= '<priority>0.6</priority>';
        $sitemap .= '</url>';
    }

    $sitemap .= '</urlset>';

    return response($sitemap, 200)->header('Content-Type', 'application/xml');
})->name('sitemap');

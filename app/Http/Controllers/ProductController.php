<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index()
    {
        $products = Cache::remember('products_index_products_v1', 300, function () {
            return Product::select(['id','name','slug','model_name','description','image','subcategory_id','fuel_type','frequency'])
                ->with(['subcategory:id,name,category_id'])
                ->latest('id')
                ->take(300)
                ->get();
        });

        $subcategories = Cache::remember('products_index_subcategories_v1', 300, function () {
            return Subcategory::select(['id','name','category_id'])
                ->with(['category:id,name'])
                ->orderBy('name')
                ->get();
        });

        $categories = Cache::remember('products_index_categories_v1', 300, function () {
            return Category::select(['id','name','slug'])
                ->withCount('products')
                ->orderBy('name')
                ->get();
        });

        return view('pages.products.index', compact('products', 'subcategories', 'categories'));
    }

    public function categories()
    {
        $categories = Cache::remember('products_categories_v1', 300, function () {
            return Category::select(['id','name','slug'])
                ->with(['subcategories' => function ($q) {
                    $q->select('id','name','slug','category_id')->withCount('products');
                }])
                ->orderBy('name')
                ->get();
        });
        return view('pages.categories.index', compact('categories'));
    }



    public function show($slug)
    {
        $product = Cache::remember("product_show_{$slug}_v1", 300, function () use ($slug) {
            return Product::select(['id','name','slug','model_name','description','image','subcategory_id','fuel_type','frequency'])
                ->where('slug', $slug)
                ->with([
                    'subcategory:id,name,slug,category_id',
                    'subcategory.category:id,name,slug',
                    'applications:id,name,description,product_id',
                    'features:id,name,description,product_id',
                    'powertypes:id,name,value,product_id'
                ])
                ->firstOrFail();
        });

        $relatedProducts = Cache::remember("related_products_{$product->id}_v1", 300, function () use ($product) {
            return Product::select(['id','name','slug','model_name','image','fuel_type','frequency','subcategory_id'])
                ->where('subcategory_id', $product->subcategory_id)
                ->where('id', '!=', $product->id)
                ->with(['subcategory:id,name'])
                ->latest('id')
                ->take(4)
                ->get();
        });
        return view('pages.products.show', compact('product', 'relatedProducts'));
    }
}

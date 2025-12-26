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
            return Product::select(['id','name','slug','ami_model','description','image','subcategory_id','fuel_type','frequency'])
                ->with(['subcategory:id,brand,category_id'])
                ->latest('id')
                ->take(300)
                ->get();
        });

        $subcategories = Cache::remember('products_index_subcategories_v1', 300, function () {
            return Subcategory::select(['id','brand','category_id'])
                ->with(['category:id,name'])
                ->orderBy('brand')
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
                    $q->select('id','brand','slug','category_id')->withCount('products');
                }])
                ->orderBy('name')
                ->get();
        });
        return view('pages.categories.index', compact('categories'));
    }



    public function show($slug)
    {
        $product = Cache::remember("product_show_{$slug}_v1", 300, function () use ($slug) {
            return Product::select(['id','name','slug','ami_model','description','image','subcategory_id','fuel_type','frequency'])
                ->where('slug', $slug)
                ->with([
                    'subcategory:id,brand,slug,category_id',
                    'subcategory.category:id,name,slug',
                    'applications:id,name,description,product_id',
                    'features:id,name,description,product_id',
                    'powertypes:id,name,value,product_id'
                ])
                ->firstOrFail();
        });

        $relatedProducts = Cache::remember("related_products_{$product->id}_v1", 300, function () use ($product) {
            return Product::select(['id','name','slug','ami_model','image','fuel_type','frequency','subcategory_id'])
                ->where('subcategory_id', $product->subcategory_id)
                ->where('id', '!=', $product->id)
                ->with(['subcategory:id,brand'])
                ->latest('id')
                ->take(4)
                ->get();
        });
        return view('pages.products.show', compact('product', 'relatedProducts'));
    }

    public function genset()
    {
        $products = Product::select(['id','name','slug','ami_model','engine','description','image','subcategory_id'])
            ->with([
                'subcategory:id,brand',
                'powertype_values' => function($query) {
                    $query->with(['powertype:id,name,power_id']);
                }
            ])
            ->latest('id')
            ->paginate(20);

        return view('pages.genset', compact('products'));
    }
}

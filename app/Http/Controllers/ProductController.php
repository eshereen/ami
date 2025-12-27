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
            return Product::select(['id','name','slug','ami_model','description','image','engine','subcategory_id','fuel_type','frequency'])
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
            return Product::select(['id','name','slug','ami_model','description','image','engine','subcategory_id','fuel_type','frequency'])
                ->where('slug', $slug)
                ->with([
                    'subcategory:id,name,slug,category_id',
                    'subcategory.category:id,name,slug',
                    'applications:id,name,description,product_id',
                    'features:id,name,description,product_id',
                    'powertype_values.powertype.power'
                ])
                ->firstOrFail();
        });

        $relatedProducts = Cache::remember("related_products_{$product->id}_v1", 300, function () use ($product) {
            return Product::select(['id','name','slug','ami_model','image','engine','fuel_type','frequency','subcategory_id'])
                ->where('subcategory_id', $product->subcategory_id)
                ->where('id', '!=', $product->id)
                ->with(['subcategory:id,name'])
                ->latest('id')
                ->take(4)
                ->get();
        });
        return view('pages.products.show', compact('product', 'relatedProducts'));
    }

    public function genset()
    {
        $products = Product::select(['id','name','slug','ami_model','engine','description','image','subcategory_id','frequency'])
            ->with([
                'subcategory:id,name',
                'powertype_values' => function($query) {
                    $query->with(['powertype:id,name,power_id']);
                }
            ])
            ->latest('id')
            ->paginate(8);

        // Process power values for each product to avoid repeated filtering in view
        $products->getCollection()->transform(function ($product) {
            $product->standby_kva = $product->powertype_values->first(function($item) {
                return $item->powertype && $item->powertype->power_id == 1 && $item->powertype->name == 'KVA';
            });
            
            $product->standby_kw = $product->powertype_values->first(function($item) {
                return $item->powertype && $item->powertype->power_id == 1 && $item->powertype->name == 'KW';
            });
            
            $product->prime_kva = $product->powertype_values->first(function($item) {
                return $item->powertype && $item->powertype->power_id == 2 && $item->powertype->name == 'KVA';
            });
            
            $product->prime_kw = $product->powertype_values->first(function($item) {
                return $item->powertype && $item->powertype->power_id == 2 && $item->powertype->name == 'KW';
            });
            
            return $product;
        });

        // Get the Diesel Generator Sets category
        $category = \App\Models\Category::where('slug', 'diesel-generator-sets')->first();

        return view('pages.genset', compact('products', 'category'));
    }
}

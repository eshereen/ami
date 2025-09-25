<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Cache;

class SubcategoryController extends Controller
{
    public function show(string $slug)
    {
        $subcategory = Cache::remember("subcategory_show_{$slug}_v1", 300, function () use ($slug) {
            return Subcategory::where('slug', $slug)
                ->select(['id','name','slug','category_id'])
                ->with(['category:id,name,slug'])
                ->firstOrFail();
        });

        $allProducts = Cache::remember('subcategory_all_products_v1', 300, function () {
            return Product::select(['id','name','slug','model_name','description','image','subcategory_id','fuel_type','frequency'])
                ->with(['subcategory:id,name,category_id','subcategory.category:id,name'])
                ->latest('id')
                ->take(500)
                ->get();
        });

        $allCategories = Cache::remember('subcategory_all_categories_v1', 300, function () {
            return Category::select(['id','name','slug'])
                ->with(['subcategories' => function ($q) {
                    $q->select('id','name','slug','category_id')->withCount('products');
                }])
                ->orderBy('name')
                ->get();
        });

        // Related products: same category, different subcategories
        $relatedProducts = Cache::remember("subcategory_related_products_{$subcategory->id}_v1", 300, function () use ($subcategory) {
            return Product::select(['id','name','slug','model_name','image','fuel_type','frequency','subcategory_id'])
                ->with(['subcategory:id,name'])
                ->whereHas('subcategory', function ($q) use ($subcategory) {
                    $q->where('category_id', $subcategory->category_id)
                      ->where('id', '!=', $subcategory->id);
                })
                ->latest('id')
                ->take(6)
                ->get();
        });

        return view('pages.products.subcategory', compact('subcategory', 'allProducts', 'allCategories', 'relatedProducts'));
    }
    public function subcategories()
    {
        $subcategories = Cache::remember('subcategories_index_subcategories_v1', 300, function () {
            return Subcategory::select(['id','name','slug','category_id'])
                ->with(['category:id,name'])
                ->withCount('products')
                ->latest('id')
                ->take(500)
                ->get();
        });

        $categories = Cache::remember('subcategories_index_categories_v1', 300, function () {
            return Category::select(['id','name'])
                ->with(['subcategories' => function ($q) {
                    $q->select('id','name','slug','category_id')->withCount('products');
                }])
                ->orderBy('name')
                ->get();
        });
        return view('pages.subcategories.index', compact('subcategories', 'categories'));
    }
}



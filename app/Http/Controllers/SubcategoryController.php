<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;

class SubcategoryController extends Controller
{
    public function show(string $slug)
    {
        $subcategory = Subcategory::where('slug', $slug)
            ->with(['products', 'category'])
            ->firstOrFail();

        $allProducts = Product::with(['subcategory.category'])->get();
        $allCategories = Category::with(['subcategories'])->get();

        // Related products: same category, different subcategories
        $relatedProducts = Product::with(['subcategory'])
            ->whereHas('subcategory', function ($q) use ($subcategory) {
                $q->where('category_id', $subcategory->category_id)
                  ->where('id', '!=', $subcategory->id);
            })
            ->take(6)
            ->get();

        return view('pages.products.subcategory', compact('subcategory', 'allProducts', 'allCategories', 'relatedProducts'));
    }
    public function subcategories()
    {
        $subcategories = Subcategory::with(['products', 'category'])->get();
        $categories = Category::with(['subcategories'])->get();
        return view('pages.subcategories.index', compact('subcategories', 'categories'));
    }
}



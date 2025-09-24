<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show(string $slug)
    {
        $category = Category::where('slug', $slug)
            ->with(['subcategories' => function ($q) {
                $q->withCount('products');
            }])
            ->firstOrFail();

        return view('pages.products.category', compact('category'));
    }
}



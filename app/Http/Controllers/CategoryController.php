<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show(string $slug)
    {
        $category = Category::where('slug', $slug)
            ->with(['products' => function ($query) {
                $query->with(['subcategory', 'features', 'applications', 'powertypes']);
            }])
            ->firstOrFail();

        return view('pages.products.category', compact('category'));
    }
}



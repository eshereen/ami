<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['subcategory'])->get();
        $subcategories = Subcategory::with(['products'])->get();
        return view('pages.products.index', compact('products', 'subcategories'));
    }

    public function categories()
    {
        $categories = Category::with(['subcategories'])->get();
        return view('pages.categories.index', compact('categories'));
    }

    public function subcategories()
    {
        $subcategories = Subcategory::with(['products', 'category'])->get();
        $categories = Category::with(['subcategories'])->get();
        return view('pages.subcategories.index', compact('subcategories', 'categories'));
    }

    public function show($slug)
    {
        return view('pages.products.show', compact('slug'));
    }
}

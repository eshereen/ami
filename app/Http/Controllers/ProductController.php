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



    public function show($slug)
    {
        $product = Product::where('slug', $slug)->with(['subcategory.category','applications','features','powertypes'])->firstOrFail();
        $relatedProducts = Product::where('subcategory_id', $product->subcategory_id)
                                 ->where('id', '!=', $product->id)
                                 ->with(['subcategory'])
                                 ->take(4)
                                 ->get();
        return view('pages.products.show', compact('product', 'relatedProducts'));
    }
}

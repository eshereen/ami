<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Blog;
class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::with(['subcategory'])->get();
        $blogs = Blog::all();
        return view('pages.home', compact('products', 'blogs'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        return view('pages.services');
    }
    public function terms()
    {
        return view('pages.terms');
    }
    public function privacy()
    {
        return view('pages.privacy');
    }


}

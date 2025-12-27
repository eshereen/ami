<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Blog;
use Illuminate\Support\Facades\Cache;
class FrontendController extends Controller
{
    public function index()
    {
        $products = Cache::remember('home_products_v1', 300, function () {
            return Product::select(['id','name','slug','ami_model','description','image','subcategory_id','fuel_type','frequency'])
                ->with(['subcategory:id,name,category_id'])
                ->latest('id')
                ->take(60)
                ->get();
        });

        $blogs = Cache::remember('home_blogs_v1', 300, function () {
            return Blog::select(['id','title','slug','image','created_at'])
                ->latest('created_at')
                ->take(6)
                ->get();
        });
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

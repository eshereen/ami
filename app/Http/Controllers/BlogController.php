<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', true)
                    ->with('user')
                    ->orderBy('created_at', 'desc')
                    ->paginate(9);
        return view('pages.blog.index', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
                   ->where('status', true)
                   ->with('user')
                   ->firstOrFail();

        // Get related blogs (same category or recent posts)
        $relatedBlogs = Blog::where('status', true)
                           ->where('id', '!=', $blog->id)
                           ->with('user')
                           ->orderBy('created_at', 'desc')
                           ->take(3)
                           ->get();

        return view('pages.blog.show', compact('blog', 'relatedBlogs'));
    }
}

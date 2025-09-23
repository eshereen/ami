<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
   public function index()
   {
      return view('blog.index');
   }

   public function show($slug)
   {
      return view('blog.show', compact('slug'));
   }


}

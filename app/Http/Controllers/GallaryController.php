<?php

namespace App\Http\Controllers;

use App\Models\Gallary;
use Illuminate\Http\Request;

class GallaryController extends Controller
{
    public function index()
    {
        $gallaries = Gallary::with('product')
            ->where('status', 'galleries.active')
            ->paginate(12);
        return view('gallaries.index', compact('gallaries'));
    }
}

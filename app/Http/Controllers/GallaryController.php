<?php

namespace App\Http\Controllers;

use App\Models\Gallary;

class GallaryController extends Controller
{
    public function index()
    {
        $gallaries = Gallary::with('product')
            ->latest()
            ->paginate(12);

        return view('gallaries.index', compact('gallaries'));
    }
}

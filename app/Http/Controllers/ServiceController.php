<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('status', true)->get();
        
        // Get first service image for hero, or use default
        $heroImage = $services->first()?->image ?? null;
        
        return view('pages.services.index', compact('services', 'heroImage'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->where('status', true)->firstOrFail();
        return view('pages.services.show', compact('service'));
    }
}


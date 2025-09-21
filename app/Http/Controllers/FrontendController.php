<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function home()
    {
        return view('pages.home');
    }
    public function home1()
    {
        return view('pages.home-1');
    }
    public function home2()
    {
        return view('pages.home-2');
    }
    public function home3()
    {
        return view('pages.home-3');
    }
    public function home4()
    {
        return view('pages.home-4');
    }
    public function contact()
    {
        return view('pages.contact');
    }
    public function store(Request $request)
    {
        return view('pages.contact');
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

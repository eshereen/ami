<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);


        $contact = Contact::create($request->all());
        Mail::to('info@amigenset.comail.com')->cc('inquiry@amigenset.com')->later(now()->addSeconds(5), new ContactMail($contact));

        return redirect()->route('home')->with('success', 'Contact message sent successfully');
    }
}

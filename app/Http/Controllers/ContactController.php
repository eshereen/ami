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


        $contact = Contact::create($request->all());
        Mail::to('ami@email.com')->later(now()->addSeconds(5), new ContactMail($contact));

        return redirect()->route('contact.index')->with('success', 'Contact message sent successfully');
    }
}

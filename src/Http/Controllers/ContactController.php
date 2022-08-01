<?php

namespace Vanee\Contact\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Vanee\Contact\Models\Contact;
use Vanee\Contact\Mail\ContactMailable; 

class ContactController extends Controller
{
    public function index() {
        return view('contact::contact');
    }

    public function send(Request $request) {
       // Check mail configuration
        // Mail::to('vaneeofficialnet@gmail.com')->send(new ContactMailable($request->name, $request->message));
        Mail::to(config('contact.send_email_to'))->send(new ContactMailable($request->name, $request->message));
        Contact::create($request->all());
        return redirect(route('contact'));
    }
}

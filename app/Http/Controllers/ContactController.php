<?php

namespace App\Http\Controllers;

use App\Events\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'    => ['required'] ,
            'subject' => ['required'],
            'message' => ['required'],
            'email'   => ['required' ,  'email']
        ]);
        Contact::create($request->toArray());
         Event::dispatch(new ContactMail($request->toArray()));
        return back()->with('success' , 'Your Mail Sent Successfully');
    }

}

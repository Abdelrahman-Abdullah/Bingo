<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

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
        return back()->with('success' , 'Your Mail Sent Successfully');
    }

}

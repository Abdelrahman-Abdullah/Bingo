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
            // TODO: Valdiate the max and the min string length
            'name'    => ['required'] ,
            'subject' => ['required'],
            'message' => ['required'],
            'email'   => ['required' ,  'email']
        ]);
        // TODO: use $request->validated() instead of $request->toArray()
        Contact::create($request->toArray());
        // TODO: why are you dispatching an event here? you can just send the mail directly using the Queue
         Event::dispatch(new ContactMail($request->toArray()));
        return back()->with('success' , 'Your Mail Sent Successfully');
    }

}

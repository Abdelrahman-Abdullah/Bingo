<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\User;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __invoke()
    {
        return view('about' , [
            'galleries' => Gallery::all(),
            'teamMembers' => User::with('socialLink')->take(3)->get()
        ]);
    }
}

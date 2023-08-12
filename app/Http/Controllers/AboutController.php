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
            // TODO: Implement Roles & Permissions, not just as column in the user table
            'teamMembers' => User::where('is_admin' , true)->inRandomOrder()->take(3)->get()
        ]);
    }
}

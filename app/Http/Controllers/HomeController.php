<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
//
//class HomeController extends Controller
//{
//    public function index() {
////        $posts = Post::select([
////            'title' , 'thumbnail' , 'content' , 'created_at'
////        ])->latest()->take(3)->get();
////
//        $clients = cache::remember('clients' , 3600 ,
//            fn() =>
//            User::select([
//                'name' , 'bio' , 'thumbnail' , 'position','id'
//            ])->inRandomOrder()->take(3)->get()
//        );
//        return view('index');
//    }
//}

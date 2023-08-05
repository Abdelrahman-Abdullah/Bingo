<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\Service;
use Illuminate\Support\Facades\Cache;


class PostController extends Controller
{
    public function index()
    {
        return view('posts.blogs', [
            'allPostsWithSameCategory' => Post::filter(request(['category' , 'search']))->get()
        ]);
    }
    public function show($post)
    {
        $post = Post::where('title' , $post)->with('author' , 'comments')->first();
        return view('posts.post' , compact('post'));
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request , $postId) // Store User Comments
    {
        $request->validate([
            'msg'   => ['required']
        ]);
        auth()->user()->comments()->create([
            'content' => $request->msg,
            'post_id' => $postId
        ]);
        return back()->with('success' , 'Your Comment Added Successfully');

    }
}

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
        // TODO: use Form Request Validation in all requests, it's much cleaner
        $request->validate([
            'msg'   => ['required']
        ]);

        // TODO: use Route model binding with the post, so you make sure that the post exists.
        auth()->user()->comments()->create([
            'content' => $request->msg,
            'post_id' => $postId
        ]);
        return back()->with('success' , 'Your Comment Added Successfully');

    }
}

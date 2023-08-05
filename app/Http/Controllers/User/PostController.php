<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Services\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use function Symfony\Component\String\b;

class PostController extends Controller
{
    public function index()
    {
        return view('user.posts.index' , [
            // need to include the foreign key columns of the related models in the select() method.
            'posts' => Post::with('category')->select(
                'title' , 'content' , 'slug' ,'author_id','category_id' , 'id'
            )
                ->where('author_id' , auth()->id())
                ->orderByDesc('created_at')
                ->paginate(10)
                ->withQueryString()
        ]);

    }

    public function create()
    {
        return view('user.posts.create' , [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $validator = array_merge(
            Service::validatePost(),
            [
                'slug'  => Str::slug($request->title),
                'author_id' => auth()->id(),
                'thumbnail' => Service::CheckImage($request->file('thumbnail') , 'images/blog')

            ]
        );
        Post::create($validator);
        return redirect('user/posts')->with('success' , 'Post Created Successfully');
    }

    public function edit($post)
    {
        $post = Post::with('category')
            ->where('title' , $post)
            ->first();
        $categories = Category::all();

        return view('user.posts.edit' , [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(Request $request , Post $post)
    {
        $validater = array_merge(
            Service::validatePost($post),
            [
                'slug'  => Str::slug($request->title),
                'author_id' => auth()->id(),
                'thumbnail' => Service::CheckImage($request->file('thumbnail') , 'images/blog') ?? $post->thumbnail,

            ]

        );
        $post->update($validater);
        return redirect('user/posts')->with('success' , 'Post Updated Successfully');

    }


    public function destroy(Post $post)
    {
        try {
            $post->comments()->delete();
            $post->delete();
            return back()->with('deleted' , 'Post Deleted Successfully');
        } catch (\Exception $e){
            return $e->getMessage();
        }
    }
}

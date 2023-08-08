<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        View::composer(['index' ,'posts.post'],function ($view){
            $view->with('latestPosts' ,
                Post::where('is_published',true)->select([
                    'title' , 'thumbnail' , 'content' , 'created_at'
                ])->latest()->take(3)->get()
            );
        });

        View::composer(['index' , 'portfolio'] , function ($view){
            $view->with('clients' ,
                cache::remember('clients' , 3600 ,
                    fn() =>
                    User::select([
                        'name' , 'bio' , 'thumbnail' , 'position','id'
                    ])->inRandomOrder()->take(3)->get()
                )
            );
        });

    }
}

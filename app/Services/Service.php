<?php

namespace App\Services;

use App\Models\Plan;
use App\Models\Post;
use App\Models\User;
use Illuminate\Validation\Rule;

class Service
{
    public static function CheckImage($file , $path = 'images/client-logo'): ?string
    {
        if ($file){

            $fileName = $path.'/'.$file->getClientOriginalName();
            $file->move(public_path('storage/'.$path) , $fileName);
            return $fileName;
        }
        return null;
    }

    public static function validatePost(?Post $post = null ): array
    {
        $post ??= new  Post();
        return request()->validate([
            'title'   => ['required'],
            'content' => ['required'],
            'category_id' => ['required' , Rule::exists('categories' , 'id')],
            'thumbnail' => $post->exists
                ? ['image' , 'mimes:SVG,PNG,JPG,svg,jpg,png']
                : [ 'required','image' , 'mimes:SVG,PNG,JPG,svg,jpg,png'] ,
        ]);
    }

    public static function validatePlan(? Plan $plan = null): array
    {
        $plan ??= new Plan();
        return request()->validate([
            'type' => $plan->exists
                ? ['required' , 'min:4']
                : ['required' , 'min:4' , 'unique:plans,type'] ,

            'price' => ['required' , 'numeric' ,'max:150'],
            'description' =>['required' , 'string' , 'min:10' , 'max:100'],
            'properties' =>['required']
        ]);
    }

    public static function validateUser(?User $user = null)
    {
        $user ??= new User();
        return request()->validate([
            'name' => ['required' , 'string'],
            'position' => ['required' , 'string' , 'max:50'],
            'bio' => ['required' , 'string' , 'max:255'],
            'password' => ['required' , 'confirmed' , 'min:8'],
            'thumbnail' => ['image' , 'mimes:PNG,SVG,JPG,JPEG,png,svg,jpg,jpeg' ],
            'email' => $user->exists
                ? ['required' , 'email']
                : ['required' , 'email' , 'unique:'.User::class],

            'phone' => $user->exists
                ? ['required' , 'regex:/^\+?\d{1,4}\s?\(?\d{1,4}\)?[-\s]?\d{1,14}$/']
                : ['required' , 'regex:/^\+?\d{1,4}\s?\(?\d{1,4}\)?[-\s]?\d{1,14}$/' , 'unique:'.User::class]


        ]);
    }
}

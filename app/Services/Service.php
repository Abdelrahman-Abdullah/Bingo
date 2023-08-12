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
}

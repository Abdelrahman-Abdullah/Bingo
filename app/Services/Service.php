<?php

namespace App\Services;

use App\Models\Plan;
use App\Models\Post;
use App\Models\User;
use Illuminate\Validation\Rule;

// TODO: Use Better naming for your service classes
class Service
{
    // TODO: don't forget the convention of the naming of the methods
    // TODO: format your files, use the IDE to do that
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

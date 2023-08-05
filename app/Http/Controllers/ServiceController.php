<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __invoke()
    {
        return view('services' , [
            'services' => Service::all()
        ]);
    }

}

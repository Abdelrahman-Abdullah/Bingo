<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    // TODO: Single Action Controller must not be used for interacting with resources
    public function __invoke()
    {
        $portfolio = Portfolio::with('category')->get();
        return view('portfolio' , [
            'portfolio'  => $portfolio,
            'categories' => $portfolio->pluck('category'),
        ]);
    }
}

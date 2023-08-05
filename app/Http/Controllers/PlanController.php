<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PlanController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __construct(protected Plan $plan){}

    public function __invoke(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('pricing' , ['plans' => $this->plan->cachedPlan()]);
    }
}

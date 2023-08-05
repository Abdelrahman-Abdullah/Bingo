<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Cache;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['type' , 'price' , 'description'];

    public function cachedPlan()
    {
//       return Cache::remember('plans' , 3600 , function (){
            return Plan::select('price','type', 'description', 'id')
                    ->with('properties')->get();
//        });
    }

    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PortfolioCategory extends Model
{
    protected $fillable = ['name'];
    use HasFactory;

    public function portfolio(): HasMany
    {
        return $this->hasMany(Portfolio::class);
    }
}
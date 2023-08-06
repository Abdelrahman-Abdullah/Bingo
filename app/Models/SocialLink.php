<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SocialLink extends Model
{
    use HasFactory;
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class  , 'user_id');
    }
}
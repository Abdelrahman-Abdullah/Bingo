<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title' , 'content' , 'thumbnail' , 'slug' , 'category_id' , 'author_id', 'is_published'];

    // TODO: use Dedicated Class for Queries ( Query Builder )
    public function scopeFilter($query , array $filters)
    {
        $query->when($filters['category'] ?? false , function ($query , $category){
            $query->whereHas('category',fn($query)=>
                $query->where('name' ,$category)
            );
        });

        //  Search About Post
        $query->when($filters['search'] ?? false , function ($query , $search){
            $query->where(fn($query)=>
                $query->where('title' , 'like' , '%'.$search.'%')
                    ->orWhere('content','like' , '%'.$search.'%')
            );
        });
    }


    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class , 'author_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}

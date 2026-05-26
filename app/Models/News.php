<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'image',
        'excerpt',
        'content',
        'published_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
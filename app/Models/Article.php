<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'content', 'category_id', 'slug', 'published_at', 'views'];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Generate slug before saving
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            // Generate a slug if one wasn't provided
            if (!$article->slug) {
                $article->slug = Str::slug($article->title);
            }
        });

        static::updating(function ($article) {
            // Update the slug if the title changes
            if ($article->isDirty('title')) {
                $article->slug = Str::slug($article->title);
            }
        });
    }

    // Make sure existing articles get a slug
    public function getSlugAttribute($value)
    {
        if (!$value) {
            return Str::slug($this->title);
        }
        return $value;
    }

    // Define the URL for the model
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Add this method to your Article class
    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
        return $this;
    }

    public function getPublishedAtAttribute($value) : bool
    {
        return $this->attributes['published_at'] !== null &&
            now()->greaterThanOrEqualTo($this->attributes['published_at']);
    }
}

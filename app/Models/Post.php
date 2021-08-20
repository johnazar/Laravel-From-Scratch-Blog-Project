<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $with = ['category', 'author'];

    // default value
    protected $attributes = [
        'status' => 1
    ];


    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('category', fn ($query) =>
                $query->where('slug', $category)
            )
        );

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn ($query) =>
                $query->where('username', $author)
            )
        );
    }
    public function getStatusAttribute($attribute)
    {
        return $this->statusOptions()[$attribute];
    }
    public function statusOptions()
    {
        return [
            1 => 'Published',
            0 => 'Draft',
            2 => 'Edited'
        ];
    }
    public function scopePublished($query)
    {
        return $query->where('status',1);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function path()
    {
        return route('posts.show', $this->slug);
    }
    public function bookmarked()
    {
        return $this->belongsToMany(User::class,'user_post','user_id','post_id');
    }
}

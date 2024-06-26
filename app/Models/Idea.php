<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    // Eager load the user and comments relationship.
    protected $with = ['user:id,name,image', 'comments.user:id,name,image'];

    // Eager load the likes count.
    protected $withCount = ['likes'];

    protected $fillable = [
        'user_id', // This is the user who created the idea
        'content', // The idea itself
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'idea_like')->withTimestamps();
    }

    public function scopeSearch(Builder $query, $search = '')
    {
        return $query->where('content', 'like', '%' . $search . '%');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Discussion extends Model
{
    use HasFactory;

    protected $hidden = [];

    protected $guarded = [];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function category()
    {
        return $this->belongsTo(Category::class);
    }

    function discussionTags()
    {
        return $this->hasMany(DiscussionTag::class);
    }

    function tags()
    {
        return $this->belongsToMany(Tag::class, 'discussion_tags');
    }

    function comments()
    {
        return $this->morphMany(Comment::class, 'article');
    }

    function userFavorites()
    {
        Relation::morphMap([
            'discussion'=>'App\Models\Discussion',
            'experience'=>'App\Models\Experience',
        ]);

        return $this->morphToMany(User::class, 'article', 'favorites');
    }
}

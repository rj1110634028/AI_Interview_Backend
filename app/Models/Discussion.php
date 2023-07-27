<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    function discussionTags(){
        return $this->hasMany(DiscussionTag::class);
    }
    
    function tags()
    {
        return $this->belongsToMany(Tag::class, 'discussion_tags');
    }
}

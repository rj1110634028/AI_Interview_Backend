<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $guarded = [];

    function discussionTags()
    {
        return $this->hasMany(DiscussionTag::class);
    }

    function discussions()
    {
        return $this->belongsToMany(Discussion::class, 'discussion_tags');
    }
}

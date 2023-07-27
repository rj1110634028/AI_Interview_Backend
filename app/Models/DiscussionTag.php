<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscussionTag extends Model
{
    use HasFactory;
    
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $guarded = [];

    function discussion(){
        return $this->belongsTo(Discussion::class);
    }

    function tag(){
        return $this->belongsTo(Tag::class);
    }
}

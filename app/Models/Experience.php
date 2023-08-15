<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Experience extends Model
{
    use HasFactory;

    

    function comments()
    {
        Relation::morphMap([
            'discussion'=>'App\Models\Discussion',
            'experience'=>'App\Models\Experience',
        ]);

        return $this->morphMany(Comment::class, 'article');
    }

}

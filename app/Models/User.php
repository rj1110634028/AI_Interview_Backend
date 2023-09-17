<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $hidden = [
        'password'
    ];

    protected $guarded = [];

    function discussions()
    {
        return $this->hasMany(Discussion::class);
    }

    function experiences()
    {
        return $this->hasMany(Experience::class);
    }
    
    function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    
    function favoriteDiscussions()
    {
        Relation::morphMap([
            'discussion'=>'App\Models\Discussion',
            'experience'=>'App\Models\Experience',
        ]);

        return $this->morphedByMany(Discussion::class, 'article', 'favorites');
    }
    
    function favoriteExperiences()
    {
        Relation::morphMap([
            'discussion'=>'App\Models\Discussion',
            'experience'=>'App\Models\Experience',
        ]);

        return $this->morphedByMany(Experience::class, 'article', 'favorites');
    }

    function resume()
    {
        return $this->hasOne(Resume::class);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}

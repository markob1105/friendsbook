<?php

namespace App;

use App\Traits\Friendable;
use App\Status;
use App\Photo;
use App\Comment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    use Friendable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'birth_date', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }*/

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function photos()
    {
        return $this->hasManyThrough(Photo::class, Post::class);
    }

    public function statuses()
    {
        return $this->hasManyThrough(Status::class, Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

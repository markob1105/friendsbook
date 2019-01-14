<?php

namespace App;

use App\Photo;
use App\Comment;
use App\Status;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['post_type_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['hour'])) {

            $query->whereHour('created_at', Carbon::parse($filters['hour'])->hour);
        }

        if (isset($filters['month'])) {

            $query->whereMonth('created_at', Carbon::parse($filters['month'])->month);
        }

        if (isset($filters['year'])) {

            $query->whereYear('created_at', $filters['year']);
        }

        /*if ($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }*/
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /*public function user()
    {
        return $this->belongsTo(User::class);
    }*/

    public function addComment($body)
    {
       //return $this-> $comment = Auth::user()->comments()->create(compact('body'));
    }

    public function status()
    {
        return $this->hasOne(Status::class);
    }

    public function photo()
    {
        return $this->hasOne(Photo::class);
    }

}

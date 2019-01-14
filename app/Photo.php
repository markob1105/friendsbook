<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['thumbnail', 'post_id', 'medium', 'large', 'description'];
    //protected $fillable = ['post_id'];
    //protected $fillable = ['medium'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    protected $fillable = ['f_sender', 'f_receiver', 'f_status'];
}

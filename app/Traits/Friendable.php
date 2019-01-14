<?php

namespace App\Traits;

use App\Friendship;

trait Friendable
{
    public function addFriend($id){
        $friendship = Friendship::create([
            'f_sender' => $this->id,
            'f_receiver' => $id
        ]);

        if ($friendship)
        {
            return back();
        }

        return 'failed';
    }
}
<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
        /*$this->validate(request(), ['body' => 'required|min:2']);

        $post->addComment(request('body'));*/

        Comment::create([
            'body' => request('body'),
            'post_id' => $post->id,
            'user_id' => Auth::user()->id
        ]);

        return back();
    }
}

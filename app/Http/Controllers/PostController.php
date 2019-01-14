<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Friendship;
use App\Status;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $auth_user_id = Auth::user()->id;

        $friends1 = DB::table('friendships')
            ->where('f_status', 1)
            ->where('f_sender', $auth_user_id)
            ->pluck('f_receiver')
            ->toArray();

        $friends2 = DB::table('friendships')
            ->where('f_status', 1)
            ->where('f_receiver', $auth_user_id)
            ->pluck('f_sender')
            ->toArray();

        $friendsIds = array_merge($friends1, $friends2);
        $friendsIds[] = Auth::user()->id;

        $posts = Post::latest()
            ->whereIn('user_id', $friendsIds)
            ->get();

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store()
    {
        $this->validate(request(), [
            'body' => 'required'
        ]);

        $body = request('body');

        $post = Auth::user()->posts()->create([
            'post_type_id' => 1
        ]);

        $status = $post->status()->create([
            'body' => $body,
        ]);

        /*session()->flash(
            'message', 'Your status has now been published.'
        );*/

        return redirect('/');
    }

    public function show(Post $post)
    {

        return view('posts.show', compact('post'));
    }
}

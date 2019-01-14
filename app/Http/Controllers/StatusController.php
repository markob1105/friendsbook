<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {

        $statuses = Status::latest()
            ->filter(request(['hour', 'month', 'year']))
            ->get();

        return view('posts.index', compact('statuses'));
        }

    public function store()
    {
        $this->validate(request(), [
            'body' => 'required'
        ]);

        auth()->user()->publish(
            new Status(request(['body']))
        );

        /*session()->flash(
            'message', 'Your status has now been published.'
        );*/

        return redirect('/');
    }

    public function show(Status $status)
    {

        return view('posts.show', compact('status'));
    }
}

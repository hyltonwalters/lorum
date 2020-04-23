<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Channel;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Channel $channel, Thread $thread)
    {
        request()->validate([
            'body' => 'required',
        ]);

        $thread->addReply(
            [
                'body' => request('body'),
                'user_id' => auth()->id()
            ]
        );

        return redirect()->back();
    }
}

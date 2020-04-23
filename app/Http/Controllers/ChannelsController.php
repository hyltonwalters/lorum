<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Thread;
use Illuminate\Http\Request;

class ChannelsController extends Controller
{
    public function index(Channel $channel)
    {
        return view('threads.channel', compact('channel'));
    }
}

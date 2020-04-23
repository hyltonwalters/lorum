@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($channel->threads as $thread)
            <div class="card my-4">
                <div class="card-header">
                    <a href="{{ route('threads.show', [$channel->slug, $thread->channel_id]) }}">
                        <h4>{{ $thread->title }}</h4>
                    </a>
                </div>
                <div class="card-body">
                    {{ $thread->body }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-4">
                <div class="card-header">
                    <a href="#">{{ $thread->creator->name }}</a> posted:
                    {{ $thread->title }}
                </div>
                <div class="card-body">
                    <h4 class="body">{{ $thread->body }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($thread->replies as $reply)
            @include('partials.reply')
            @endforeach
        </div>
    </div>
</div>

@auth
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('replies.store', $thread->id) }}" method="POST">
                @csrf
                <div class="form-group my-4">
                    <textarea type="text" name="body" id="body" rows="6" placeholder="Have something to say?"
                        class="form-control"></textarea>
                </div>
                <button class="btn btn-outline-dark" type="submit">Submit</button>
            </form>
        </div>
    </div>
    @else
    <p class="lead text-center my-2">Please&nbsp;<a class="" href="{{ route('login') }}">sign in</a>&nbsp;to
        participate in this discussion.</p>
</div>
@endauth
@endsection

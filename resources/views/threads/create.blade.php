@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-4">
                <div class="card-header">Create a new thread</div>
                <div class="card-body">
                    <form action="{{ route('threads.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="channel_id">Choose one...</label>
                            <select class="form-control" name="channel_id" id="channel_id" required>
                                <option value="">Please select a channel</option>
                                @foreach ($channels as $channel)
                                <option value="{{ $channel->id }}"
                                    {{ old('channel_id') == $channel->id ? 'selected' : '' }}>{{ $channel->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('channel_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                                required>
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" id="body" rows="8"
                                class="form-control @error('body') is-invalid @enderror"
                                required>{{ old('body') }}</textarea>
                            @error('body')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-outline-primary w-100">Publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<div class="card my-4">
    <div class="card-header">
        <a href="#">
            {{ $reply->owner->name }}
        </a>
        said
        {{ $reply->created_at->diffForHumans() }}...
    </div>
    <div class="card-body">
        <h4 class="body">{{ $reply->body }}</h4>
    </div>
</div>

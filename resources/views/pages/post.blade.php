@extends("index")

@section("content")
@include("pages.welcome")

<div class="blog blog--post">
    <div class="blog__post-card blog__post-card--full mdl-card mdl-shadow--2dp">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">{{ $post->title }}</h2>
        </div>
        <div class="mdl-card__supporting-text">
            {!! $post->content  !!}
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <span class="blog__post-card--stat">
                    <i class="material-icons">update</i> {{ $post->created_at->diffForHumans() }}
                <i class="material-icons">&#xE417;</i> {{ $post->views }}
                </span>
        </div>
    </div>
</div>
@endsection
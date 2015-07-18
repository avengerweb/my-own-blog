@extends("index")

@section("content")
@include("pages.welcome")

<div class="content-container blog">
    <div class="post">
        <h1>

            {{ $post->title }} <br/>
        <span class="small">
            <span class="glyphicon glyphicon-time"></span> <span class="date">{{ $post->created_at }}</span>
            <span class="glyphicon glyphicon-eye-open"></span> <span class="views">{{ $post->views }}</span>
        </span>
        </h1>

        <div class="post-text">
        {!! $post->content  !!}
        </div>
    </div>
</div>
@endsection
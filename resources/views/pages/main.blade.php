@extends("index")

@section("content")
@include("pages.welcome")

<div class="content-container blog">
    <h1>Бложик</h1>
    @foreach($posts as $post)
    <div class="post">
        <h2>
            <a href="{!! $post->url() !!}">{{ $post->title }}</a> <br/>
            <span class="small">
                <span class="glyphicon glyphicon-time"></span> <span class="date">{{ $post->created_at }}</span>
                <span class="glyphicon glyphicon-eye-open"></span> <span class="views">{{ $post->views }}</span>
            </span>
        </h2>
        <div class="description">
            {!! $post->description  !!}
        </div>
        <div class="text-right">
            <a class="btn btn-default" href="{!! $post->url() !!}">Хочу больше <span class="glyphicon glyphicon-play"></span> </a>
        </div>
    </div>
    @endforeach
    {!! $posts->render() !!}
</div>
@endsection
@extends("index")

@section("content")
    <div class="welcome">
        <div class="title laravel-title">
            Laravel 5
        </div>
        <div class="title avenger-web">
            <div class="welcome-logo">
                Avenger<span class="last-word">Web</span>
            </div>
        </div>
        <div class="quote">{{ Inspiring::quote() }}</div>
    </div>
    <div class="blog hidden">
        @foreach($posts as $post)
        <div class="post">
            <h2>
                {{ $post->title }} <br/>
                <span class="small"><span class="glyphicon glyphicon-time"></span> <span class="date">{{ $post->created_at }}</span></span>
            </h2>
            <div class="description">
                {!! $post->description !!}
            </div>
            <div class="text-right">
                <a class="btn btn-default" href="">Read more <span class="glyphicon glyphicon-play"></span> </a>
            </div>
        </div>
        @endforeach
        {!! $posts->render() !!}
    </div>
@endsection

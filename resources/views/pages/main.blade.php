@extends("index")

@section("content")
@include("pages.welcome")

<div class="blog">
    <div class="mdl-typography--display-3">Статьи</div>
    @foreach($posts as $post)
        <div class="blog__post-card mdl-card mdl-shadow--4dp">
            <div class="mdl-card__title">
                <a href="{!! $post->url() !!}" class="mdl-card__title-text mdl-card__title-link">{{ $post->title }}</a>
            </div>
            <div class="mdl-card__supporting-text">
                {!! $post->description  !!}
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a href="{!! $post->url() !!}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    Подробнее
                </a>

                <span class="blog__post-card--stat">
                    <i class="material-icons">update</i> {{ $post->created_at->diffForHumans() }}
                    <i class="material-icons">&#xE417;</i> {{ $post->views }}
                </span>
            </div>
            {{--<div class="mdl-card__menu">--}}
                {{--<button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">--}}
                    {{--<i class="material-icons">share</i>--}}
                {{--</button>--}}
            {{--</div>--}}
        </div>
    @endforeach
    {!! $posts->render() !!}
</div>
@endsection
@extends("index")

@section("content")
<div class="container demo-blog__posts mdl-grid">
    {{--<div class="mdl-card coffee-pic mdl-cell mdl-cell--8-col">--}}
        {{--<div class="mdl-card__media mdl-color-text--grey-50">--}}
            {{--<h3><a href="entry.html">Coffee Pic</a></h3>--}}
        {{--</div>--}}
        {{--<div class="mdl-card__supporting-text meta mdl-color-text--grey-600">--}}
            {{--<div class="minilogo"></div>--}}
            {{--<div>--}}
                {{--<strong>The Newist</strong>--}}
                {{--<span>2 days ago</span>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="mdl-card something-else mdl-cell mdl-cell--8-col mdl-cell--4-col-desktop">--}}
        {{--<button class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--fab mdl-color--accent">--}}
            {{--<i class="material-icons mdl-color-text--white" role="presentation">add</i>--}}
            {{--<span class="visuallyhidden">add</span>--}}
        {{--</button>--}}
        {{--<div class="mdl-card__media mdl-color--white mdl-color-text--grey-600">--}}
            {{--<img src="images/logo.png">--}}
            {{--+1,337--}}
        {{--</div>--}}
        {{--<div class="mdl-card__supporting-text meta meta--fill mdl-color-text--grey-600">--}}
            {{--<div>--}}
                {{--<strong>The Newist</strong>--}}
            {{--</div>--}}
            {{--<ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right" for="menubtn">--}}
                {{--<li class="mdl-menu__item mdl-js-ripple-effect">About</li>--}}
                {{--<li class="mdl-menu__item mdl-js-ripple-effect">Message</li>--}}
                {{--<li class="mdl-menu__item mdl-js-ripple-effect">Favorite</li>--}}
                {{--<li class="mdl-menu__item mdl-js-ripple-effect">Search</li>--}}
            {{--</ul>--}}
            {{--<button id="menubtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">--}}
                {{--<i class="material-icons" role="presentation">more_vert</i>--}}
                {{--<span class="visuallyhidden">show menu</span>--}}
            {{--</button>--}}
        {{--</div>--}}
    {{--</div>--}}
    @foreach($posts as $post)
        <div class="mdl-card mdl-cell mdl-cell--12-col">
            @if ($post->announce_img)
                <div class="mdl-card__media mdl-color-text--grey-50" style="background-image: url('{{ $post->announce_img }}')">
                    <h3><a href="{!! $post->url() !!}">{{ $post->title }}</a></h3>
                </div>
                <div class="mdl-color-text--grey-600 mdl-card__supporting-text">
                    {!! $post->description !!}
                </div>
            @else
                <div class="mdl-card__title mdl-color-text--grey-50">
                    <h3 class="quote"><a href="{!! $post->url() !!}">{{ $post->title }}</a></h3>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    {!! $post->description !!}
                </div>
            @endif
            <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
                <div class="views-count">
                    {{ $post->views }}
                </div>
                <div>
                    <strong>{{ $post->category}}</strong>
                    <span class="human-date">{{ $post->created_at }}</span>
                </div>
            </div>
        </div>
    @endforeach

    <nav class="demo-nav mdl-cell mdl-cell--12-col">
        <div class="section-spacer"></div>
        <a href="entry.html" class="demo-nav__button" title="show more">
            More
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                <i class="material-icons" role="presentation">arrow_forward</i>
            </button>
        </a>
    </nav>
</div>
{{--<div class="content-container blog">--}}
    {{--<h1>Бложик</h1>--}}
    {{--@foreach($posts as $post)--}}
    {{--<div class="post">--}}
        {{--<h2>--}}
            {{--<a href="{!! $post->url() !!}">{{ $post->title }}</a> <br/>--}}
            {{--<span class="small">--}}
                {{--<span class="glyphicon glyphicon-time"></span> <span class="date">{{ $post->created_at }}</span>--}}
                {{--<span class="glyphicon glyphicon-eye-open"></span> <span class="views">{{ $post->views }}</span>--}}
            {{--</span>--}}
        {{--</h2>--}}
        {{--<div class="description">--}}
            {{--{!! $post->description  !!}--}}
        {{--</div>--}}
        {{--<div class="text-right">--}}
            {{--<a class="btn btn-default" href="{!! $post->url() !!}">Хочу больше <span class="glyphicon glyphicon-play"></span> </a>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--@endforeach--}}
    {{--{!! $posts->render() !!}--}}
{{--</div>--}}
@endsection
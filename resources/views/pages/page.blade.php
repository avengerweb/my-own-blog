@extends("index")

@section("content")
@include("pages.welcome")

<div class="blog blog--post">
    <div class="blog__post-card blog__post-card--full mdl-card mdl-shadow--2dp">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">{{ $page->title }}</h2>
        </div>
        <div class="mdl-card__supporting-text">
            {!! $page->content  !!}
        </div>
    </div>
</div>
@endsection

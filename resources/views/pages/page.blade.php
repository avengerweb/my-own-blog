@extends("index")

@section("content")
@include("pages.welcome")

<div class="content-container page">
    <div class="page">
        <h1>{{ $page->title }}</h1>

        <div class="post-text">
            {!! $page->content  !!}
        </div>
    </div>
</div>
@endsection
@section("scripts")
    <script>
        $(document).on("loaded", function() {
            console.log("Ajax / Not ajax load was done");
        });
    </script>
@endsection
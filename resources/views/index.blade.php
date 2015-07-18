@if (\Request::ajax())
    @yield("content")
@else
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="{{ Config::get("website.description") }}">
    <meta name="keywords" content="{{ Config::get("website.keywords") }}">
    <meta name="author" content="{{ Config::get("website.author") }}">

    <title>{{ Config::get("website.title") }}</title>

    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/css/style.css"/>


</head>
<body>
<header>
    <div class="menu-wrap">
        <nav class="menu">
            <div class="logo">
                <a href="/">
                    Avenger<span class="last-word">Web</span>
                </a>
            </div>
            <div class="icon-list">
                <a href="/" class="ajax"><i class="glyphicon glyphicon-home"></i><span>Главная</span></a>
                <a href="#"><i class="glyphicon glyphicon-user"></i><span>Обо мне</span></a>
                <a href="#"><i class="glyphicon glyphicon-picture"></i><span>Портфолио</span></a>
                <a href="#"><i class="glyphicon glyphicon-earphone"></i><span>Связь</span></a>
                <a class="direct" href="https://github.com/avengerweb/my-own-blog" target="_blank"><i class="glyphicon glyphicon-random"></i><span>GitHub</span></a>
            </div>
        </nav>
        <button class="close-button" id="close-button">Close Menu</button>
        <div class="morph-shape" id="morph-shape" data-morph-open="M-7.312,0H15c0,0,66,113.339,66,399.5C81,664.006,15,800,15,800H-7.312V0z;M-7.312,0H100c0,0,0,113.839,0,400c0,264.506,0,400,0,400H-7.312V0z">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100 800" preserveAspectRatio="none">
                <path d="M-7.312,0H0c0,0,0,113.839,0,400c0,264.506,0,400,0,400h-7.312V0z"/>
            </svg>
        </div>
    </div>
    <button class="menu-button hidden" id="open-button">Open Menu</button>
</header>
<main>
    <section id="content">
        <div class="container">
            @yield("content")
        </div>
    </section>
</main>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
{{--<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/locales.min.js"></script>--}}
<script src="/js/snap.svg-min.js"></script>
<script src="/js/ajax-nav.js"></script>
<script src="/js/AvengerWeb.js"></script>

{!! Config::get("website.counters") !!}

</body>
</html>
@endif
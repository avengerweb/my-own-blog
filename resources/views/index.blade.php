@if (\Request::ajax())
    @yield("content")
    @yield("scripts")
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

    <meta name="_token" content="<?=Crypt::encrypt(csrf_token()) ?>">

    <title>{{ Config::get("website.title") }}</title>

    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
    <link href="//fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="//storage.googleapis.com/code.getmdl.io/1.0.4/material.indigo-pink.min.css">

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
                <a href="/" class="ajax"><i class="material-icons">home</i><span>Главная</span></a>
                <a href="/about"><i class="material-icons">assignment_ind</i><span>Обо мне</span></a>
                <a href="#"><i class="material-icons">view_module</i><span>Портфолио</span></a>
                <a class="direct" href="https://github.com/avengerweb/my-own-blog" target="_blank"><i class="material-icons">transform</i><span>GitHub</span></a>
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
@include("pages.welcome")
<div class="demo-blog mdl-layout mdl-js-layout has-drawer is-upgraded">
    <main class="mdl-layout__content">
        <div id="content">
            @yield("content")
        </div>
        <footer class="mdl-mini-footer">
            <div class="mdl-mini-footer--left-section">
                <button class="mdl-mini-footer--social-btn social-btn social-btn__twitter">
                    <span class="visuallyhidden">Twitter</span>
                </button>
                <button class="mdl-mini-footer--social-btn social-btn social-btn__blogger">
                    <span class="visuallyhidden">Facebook</span>
                </button>
                <button class="mdl-mini-footer--social-btn social-btn social-btn__gplus">
                    <span class="visuallyhidden">Google Plus</span>
                </button>
            </div>
            <div class="mdl-mini-footer--right-section">
                <button class="mdl-mini-footer--social-btn social-btn__share">
                    <i class="material-icons" role="presentation">share</i>
                    <span class="visuallyhidden">share</span>
                </button>
            </div>
        </footer>
    </main>
    <div class="mdl-layout__obfuscator"></div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="//storage.googleapis.com/code.getmdl.io/1.0.4/material.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
{{--<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/locales.min.js"></script>--}}
@if (\App::isLocal())
<script src="/js/snap.svg-min.js"></script>
<script src="/js/ajax-nav.js"></script>
<script src="/js/AvengerWeb.js"></script>
@else
<script src="/js/main.js"></script>
@endif
@yield("scripts")
{!! Config::get("website.counters") !!}

</body>
</html>
@endif

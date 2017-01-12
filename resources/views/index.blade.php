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
</head>
<body>
    <div id="app" class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <a href="/" class="mdl-layout-title mdl-layout-title--link">AvengerWeb</a>
                <!-- Add spacer, to align navigation to the right -->
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation. We hide it in small screens. -->
                <nav class="mdl-navigation mdl-layout--large-screen-only">
                    <a class="mdl-navigation__link" href="/">Home</a>
                    <a class="mdl-navigation__link" href="/about">Обо мне</a>
                    <a class="mdl-navigation__link" href="https://github.com/avengerweb/">GitHub</a>
                </nav>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">AvengerWeb</span>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="/">Home</a>
                <a class="mdl-navigation__link" href="/about">Обо мне</a>
                <a class="mdl-navigation__link" href="https://github.com/avengerweb/">GitHub</a>
            </nav>
        </div>
        <div class="mdl-layout__content">
        <main>
            @yield("content")
        </main>

        <footer class="mdl-mini-footer">
            <div class="mdl-mini-footer__left-section">
                <div class="mdl-logo">AvengerWeb.com &copy; 2014-{{ \Carbon\Carbon::now()->year }}</div>
                <ul class="mdl-mini-footer__link-list">
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">About me</a></li>
                </ul>
            </div>
            <div class="mdl-mini-footer__right-section">
                <ul class="mdl-mini-footer__link-list">
                    <li>{{ config('version.version') }} ({{ config('version.revision') }}) ver.</li>
                </ul>
            </div>
        </footer>
        </div>
    </div>

<link rel="stylesheet" href="//code.getmdl.io/1.3.0/material.deep_purple-red.min.css" />
<link rel="stylesheet" href="/css/style.css?_={{ config('version.revision') }}"/>

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<script defer src="//code.getmdl.io/1.3.0/material.min.js"></script>
<link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">

{{--<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/locales.min.js"></script>--}}

@yield("scripts")
{!! Config::get("website.counters") !!}

</body>
</html>

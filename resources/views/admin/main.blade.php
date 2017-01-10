<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="<?=Crypt::encrypt(csrf_token()) ?>">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/css/bootstrap-datepicker.min.css">

    <!-- Custom styles for this template -->
    <link href="/css/admin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">AvengerWeb - Control panel</a>
        </div>
        @if (Auth::check())
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/admin/">Dashboard</a></li>
                <li><a href="/admin/settings">Settings</a></li>
                <li><a href="/admin/profile">Profile</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
        @endif
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @if (Auth::check())
            <ul class="nav nav-sidebar">
                <li><a href="{{ action("Admin\CategoriesController@index") }}">Blog: Categories</a></li>
                <li><a href="{{ action("Admin\PostsController@index") }}">Blog: Posts</a></li>
                <li><a href="{{ action("Admin\PostsController@create") }}">Blog: Posts: add</a></li>
            </ul>

            <ul class="nav nav-sidebar">
                <li><a href="{{ action("Admin\PagesController@index") }}">Pages</a></li>
                <li><a href="{{ action("Admin\PagesController@create") }}">Pages: add</a></li>
            </ul>

            <ul class="nav nav-sidebar">
                <li><a href="{{ action("Admin\PermissionsController@index") }}">Users: Permissions</a></li>
                <li><a href="{{ action("Admin\UsersController@index") }}">Users: Manage</a></li>

            </ul>
            @else
                <ul class="nav nav-sidebar">
                    <li><a href="/">Home</a></li>
                    <li><a href="/user/login">Log in</a></li>
                    <li><a href="/user/register">Register</a></li>
                    <li><a href="/user/password/email">Forget password?</a></li>
                </ul>
            @endif
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            @yield("content")
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/locales.min.js"></script>
<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/js/bootstrap-datepicker.min.js"></script>

<script src="/js/admin.js"></script>

@yield("scripts")

</body>
</html>
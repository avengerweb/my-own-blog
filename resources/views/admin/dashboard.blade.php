@extends("admin.main");

@section("content")
<h1 class="title">Dashboard</h1>

Hello, {{ Auth::user()->name }}!

@endsection
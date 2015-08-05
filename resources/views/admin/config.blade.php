@extends("admin.main");

@section("content")
<h1 class="title">Profile edit</h1>

@include('errors.list')

{!! Form::open(["action" => "DashboardController@postConfigEdit", "class" => "form-horizontal col-lg-4 col-md-8 col-sm-10"]) !!}

    <!--- Title Field --->
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', Config::get("website.title"), ['class' => 'form-control']) !!}
    </div>

    <!--- Meta: Keywords Field --->
    <div class="form-group">
        {!! Form::label('keywords', 'Meta: Keywords:') !!}
        {!! Form::text('keywords', Config::get("website.keywords"), ['class' => 'form-control']) !!}
    </div>

    <!--- Meta: Author Field --->
    <div class="form-group">
        {!! Form::label('author', 'Meta: Author:') !!}
        {!! Form::text('author', Config::get("website.author"), ['class' => 'form-control']) !!}
    </div>

    <!--- Meta: Description Field --->
    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', Config::get("website.description"), ['class' => 'form-control']) !!}
    </div>

    <!--- Counter code Field --->
    <div class="form-group">
        {!! Form::label('counters', 'Counter code:') !!}
        {!! Form::textarea('counters', Config::get("website.counters"), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
    <button class="btn btn-default">Save</button>
    </div>
{!! Form::close() !!}

@endsection

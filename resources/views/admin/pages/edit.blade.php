@extends("admin.main")

@section("content")
<h1 class="title">Page add</h1>

@include('errors.list')

{!! Form::open(["url" => action("Admin\PagesController@update", [$page->id]), "method" => "PUT", "class" => "form-horizontal"]) !!}

    <!--- Title Field --->
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', $page->title, ['class' => 'form-control']) !!}
    </div>

    <!--- URL Field --->
    <div class="form-group">
        {!! Form::label('url', 'URL:') !!}
        {!! Form::text('url', $page->url, ['class' => 'form-control']) !!}
    </div>

    <!--- Meta keywords Field --->
    <div class="form-group">
        {!! Form::label('keywords', 'Meta keywords:') !!}
        {!! Form::text('keywords', $page->keywords, ['class' => 'form-control']) !!}
    </div>

    <!--- Description Field --->
    <div class="form-group">
        {!! Form::label('description', 'Meta description:') !!}
        {!! Form::textarea('description', $page->description, ['class' => 'form-control']) !!}
    </div>

    <!--- Content Field --->
    <div class="form-group">
        {!! Form::label('content', 'Content:') !!}
        {!! Form::textarea('content', $page->content, ['class' => 'form-control html']) !!}
    </div>


    <!--- Select state Field --->
    <div class="form-group col-xs-3">
        {!! Form::label('active', 'Active:') !!}
        {!! Form::select('active', [0 => "Disabled", 1 => "Enabled"], $page->active, ['class' => 'form-control']) !!}
    </div>




    <div class="form-group">
    <button class="btn btn-default">Save</button>
    </div>
{!! Form::close() !!}

@endsection
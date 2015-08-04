@extends("admin.main")

@section("content")
<h1 class="title">Page add</h1>

@include('errors.list')

{!! Form::open(["action" => "Admin\PagesController@store", "method" => "POST", "class" => "form-horizontal"]) !!}

    <!--- Title Field --->
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <!--- Url Field --->
    <div class="form-group">
        {!! Form::label('url', 'Url:') !!}
        {!! Form::text('url', null, ['class' => 'form-control']) !!}
    </div>

    <!--- Keywords Field --->
    <div class="form-group">
        {!! Form::label('keywords', 'Meta keywords:') !!}
        {!! Form::text('keywords', null, ['class' => 'form-control']) !!}
    </div>

    <!--- Description Field --->
    <div class="form-group">
        {!! Form::label('description', 'Meta description:') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>

    <!--- Content Field --->
    <div class="form-group">
        {!! Form::label('content', 'Content:') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control html']) !!}
    </div>

    <!--- Select state Field --->
    <div class="form-group col-xs-3">
        {!! Form::label('active', 'Active:') !!}
        {!! Form::select('active', [0 => "Disabled", 1 => "Enabled"], 1, ['class' => 'form-control']) !!}
    </div>


    <div class="clearfix"></div>

    <div class="form-group">
        <button class="btn btn-default">Add</button>
    </div>
{!! Form::close() !!}

@endsection
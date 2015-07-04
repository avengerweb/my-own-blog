@extends("admin.main");

@section("content")
<h1 class="title">Post add</h1>

@include('errors.list')

{!! Form::open(["action" => "DashboardController@update", "class" => "form-horizontal col-lg-4 col-md-8 col-sm-10"]) !!}

    <!--- Title Field --->
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <!--- Description Field --->
    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control html']) !!}
    </div>

    <!--- Content Field --->
    <div class="form-group">
        {!! Form::label('content', 'Content:') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    </div>



    <div class="form-group">
    <button class="btn btn-default">Add</button>
    </div>
{!! Form::close() !!}

@endsection
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

    <!--- Description Field --->
    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', $page->description, ['class' => 'form-control html']) !!}
    </div>

    <!--- Content Field --->
    <div class="form-group">
        {!! Form::label('content', 'Content:') !!}
        {!! Form::textarea('content', $page->content, ['class' => 'form-control html']) !!}
    </div>

    <div class="col-xs-5 state-box">
        <!--- Select state Field --->
        <div class="form-group col-xs-5">
            {!! Form::label('state', 'State:') !!}
            {!! Form::select('state', [0 => "Disabled", 1 => "Enabled", 2 => "Show after date"], $page->state, ['class' => 'form-control']) !!}
        </div>
        <!--- Show date Field --->
        <div class="form-group col-xs-6">
            {!! Form::label('active_from', 'Show date:') !!}
            {!! Form::text('active_from', $page->active_from, ['class' => 'form-control datepicker']) !!}
        </div>
        <div class="clearfix"></div>
    </div>



    <div class="form-group">
    <button class="btn btn-default">Save</button>
    </div>
{!! Form::close() !!}

@endsection
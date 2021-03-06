@extends("admin.main")

@section("content")
    <h1 class="title">Post add</h1>

    @include('errors.list')

    {!! Form::open(["action" => "Admin\PostsController@store", "method" => "POST", "class" => "form-horizontal"]) !!}

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
        {!! Form::textarea('content', null, ['class' => 'form-control html']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('content', 'Cover:') !!}
        <div class="input-group">
            <input type="text" name="cover" class="form-control" id="js-cover-input" placeholder="Path or url">
            <span class="input-group-btn">
            <button class="btn btn-default js-uploader" type="button" data-input="#js-cover-input">Choose</button>
          </span>
        </div><!-- /input-group -->
    </div><!-- /input-group -->

    <div class="col-xs-5 state-box">
        <!--- Select state Field --->
        <div class="form-group col-xs-5">
            {!! Form::label('state', 'State:') !!}
            {!! Form::select('state', [0 => "Disabled", 1 => "Enabled", 2 => "Show after date"], 1, ['class' => 'form-control']) !!}
        </div>
        <!--- Show date Field --->
        <div class="form-group col-xs-6">
            {!! Form::label('Show after:', 'Show date:') !!}
            {!! Form::text('Show after:', null, ['class' => 'form-control datepicker']) !!}
        </div>

        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>

    <div class="form-group">
        <button class="btn btn-default">Add</button>
    </div>
    {!! Form::close() !!}

    @include('admin.upload')

@endsection
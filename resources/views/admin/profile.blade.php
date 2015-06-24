@extends("admin.main");

@section("content")
<h1 class="title">Profile edit</h1>

@include('errors.list')

{!! Form::open(["action" => "DashboardController@getCurrentProfile", "class" => "form-horizontal col-lg-4 col-md-8 col-sm-10"]) !!}
    <!--- Name Field --->
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', Auth::user()->name, ['class' => 'form-control']) !!}
    </div>

    <!--- Email Field --->
    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', Auth::user()->email, ['class' => 'form-control']) !!}
    </div>

    <hr />
    <div class="text-center">
        Fill if you need change a password
    </div>
    <!--- Password Field --->
    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <!--- Password Confirm Field --->
    <div class="form-group">
        {!! Form::label('password_confirmation', 'Confirm password:') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
    <button class="btn btn-default">Save</button>
    </div>
{!! Form::close() !!}

@endsection
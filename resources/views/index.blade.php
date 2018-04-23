@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>@lang('Latest blog posts')</h1>
        <div class="row">
            @foreach([1, 2, 3, 4] as $item)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Posts</div>

                        <div class="card-body">
                            one two
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

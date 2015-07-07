@extends("admin.main")

@section("content")
    <h1 class="title">Posts list</h1>

    <table class="table table-bordered table-hover posts-list">
        <thead>
            <tr>
                <th>Title</th>
                <th>Categories</th>
                <th>Status</th>
                <th>Create date</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->categories }}</td>
                <td>{{ $post->state }}</td>
                <td>{{ $post->created_at }}</td>
                <td class="text-center">
                    <a class="btn btn-default action-edit-post" href="{{ action("Admin\PostsController@edit", $post->id) }}">Edit</a>
                    <button class="btn btn-danger action-remove-post" data-action="{{ action("Admin\PostsController@destroy", $post->id) }}">Remove</button>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $posts->render() !!}
@endsection

@section("scripts")
    <script>
        $(document).ready(function() {
            var list = $(".posts-list");

            list.on("click", ".action-remove-post", function() {
                var tr = $(this).closest("tr");
                $.get($(this).data("action"), function(data) {

                    if (data.success) {
                        tr.remove();
                    }

                }, "json");
            });
        });
    </script>
@endsection
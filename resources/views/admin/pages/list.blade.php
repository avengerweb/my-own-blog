@extends("admin.main")

@section("content")
    <h1 class="title">Pages list</h1>

    <table class="table table-bordered table-hover pages-list">
        <thead>
            <tr>
                <th>Title</th>
                <th>URL</th>
                <th>Is active</th>
                <th>Create date</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        @foreach($pages as $page)
            <tr>
                <td>{{ $page->title }}</td>
                <td>{{ $page->url }}</td>
                <td>{{ $page->state }}</td>
                <td>{{ $page->created_at }}</td>
                <td class="text-center">
                    <a class="btn btn-default action-edit-page" href="{{ action("Admin\PagesController@edit", $page->id) }}">Edit</a>
                    <button class="btn btn-danger action-remove-page" data-action="{{ action("Admin\PagesController@destroy", $page->id) }}">Remove</button>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $pages->render() !!}
@endsection

@section("scripts")
    <script>
        $(document).ready(function() {
            var list = $(".pages-list");

            list.on("click", ".action-remove-page", function() {
                var tr = $(this).closest("tr");
                console.log(tr);
                $.delete($(this).data("action"), function(data) {
                    console.log(data);
                    if (data.success) {
                        tr.remove();
                        console.log("remove");
                    }

                }, "json");
            });
        });
    </script>
@endsection
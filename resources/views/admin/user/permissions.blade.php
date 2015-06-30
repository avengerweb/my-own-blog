@extends("admin.main")

@section("content")
    <h1 class="title">Permissions list</h1>

    @include("errors.list")
    {!! Form::open(["url" => action("Admin\PermissionsController@postStore"), 'class' => "col-xs-5"]) !!}
            <h3>Add permission</h3>
        <!--- Name Field --->
        <div class="form-group">
            {!! Form::label('permission', 'Permission name:') !!}
            {!! Form::text('permission', null, ['class' => 'form-control']) !!}
        </div>

        <!--- Permission Field --->
        <div class="form-group">
            {!! Form::label('level', 'Permission level:') !!}
            {!! Form::text('level', 0, ['class' => 'form-control']) !!}
        </div>

        <button type="submit" class="btn btn-default">Add</button>
    {!! Form::close() !!}
    <div class="clearfix"></div>
    <hr />
    <table class="table table-bordered table-hover categories-list">
        <thead>
            <tr>
                <th>Permission</th>
                <th>Level</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        @foreach($permissions as $permission)
            <tr>
                <td class="col-xs-5 name">
                    {{ $permission->permission }}
                </td>
                <td class="col-xs-5 level">
                    {{ $permission->level }}
                </td>
                <td class="text-center">
                    <button class="btn btn-default action-edit-permission" data-toggle="modal" data-target="#editPermission" data-action="{{ action("Admin\PermissionsController@postUpdate", $permission->id) }}">Edit</button>
                    <button class="btn btn-danger action-remove-permission" data-action="{{ action("Admin\PermissionsController@getDestroy", $permission->id) }}">Remove</button>
                </td>
            </tr>
        @endforeach
    </table>
    <!-- Modal -->
    <div class="modal fade" id="editPermission" tabindex="-1" role="dialog" aria-labelledby="editPermissionLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="editPermissionLabel">Edit permission</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open() !!}
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>Whoops!</strong> There were some problems with your input.
                        <br>
                        <ul>
                            <li></li>
                        </ul>
                    </div>
                    <!--- Name Field --->
                    <div class="form-group">
                        {!! Form::label('permission', 'Permission name:') !!}
                        {!! Form::text('permission', null, ['class' => 'form-control']) !!}
                    </div>

                    <!--- Permission Field --->
                    <div class="form-group">
                        {!! Form::label('level', 'Permission level:') !!}
                        {!! Form::text('level', 0, ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary action-save-permission">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script>
        $(document).ready(function() {
            var list = $(".categories-list");
            var modalForm = $("#editPermission form");
            list.on("click", ".action-edit-permission", function() {
                modalForm.attr("action", $(this).data("action"));
                modalForm.find("[name=permission]").val($(this).closest("tr").find(".name").html().trim());
                modalForm.find("[name=level]").val($(this).closest("tr").find(".level").html().trim());

            });

            $(".action-save-permission").click(function() {
                save();
            });

            modalForm.submit(function(e) {
                e.preventDefault();
                save();
            });

            var alertHolder = modalForm.find(".alert");
            alertHolder.hide();
            function save() {
                alertHolder.hide();
                $.post(modalForm.attr("action"), modalForm.serialize(), function(data) {
                    if (data.errors)
                    {
                        alertHolder.show();
                        var errorList = alertHolder.find("ul");
                        errorList.html("");
                        for (var key in data.errors) {
                            var errors = data.errors[key];

                            for (var id in errors) {
                                errorList.append("<li>"+ errors[id] +"</li>");
                            }
                        }
                    }
                    else
                        location.reload();
                });
            }

            list.on("click", ".action-remove-permission", function() {
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
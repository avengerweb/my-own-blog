@extends("admin.main")

@section("content")
    <h1 class="title">Users list</h1>

    @include("errors.list")
    {!! Form::open(["url" => action("Admin\UsersController@postStore"), 'class' => "col-xs-5"]) !!}
            <h3>Add user</h3>
        <!--- Name Field --->
        <div class="form-group">
            {!! Form::label('name', 'User name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <!--- Level Field --->
        <div class="form-group">
            {!! Form::label('level', 'User level:') !!}
            {!! Form::text('level', 0, ['class' => 'form-control']) !!}
        </div>

    <!--- Email Field --->
    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>

    <!--- Password Field --->
    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <!--- Password Field --->
    <div class="form-group">
        {!! Form::label('password_confirmation', 'Password confirm:') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>



        <button type="submit" class="btn btn-default">Add</button>
    {!! Form::close() !!}
    <div class="clearfix"></div>
    <hr />
    <table class="table table-bordered table-hover categories-list">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Level</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        @foreach($users as $user)
            <tr>
                <td class="col-xs-4 name">
                    {{ $user->name }}
                </td>
                <td class="col-xs-4 email">
                    {{ $user->email }}
                </td>
                <td class="col-xs-1 level">
                    {{ $user->access ? $user->access->level : "" }}
                </td>
                <td class="text-center">
                    <button class="btn btn-default action-edit-user" data-toggle="modal" data-target="#editUser" data-action="{{ action("Admin\UsersController@postUpdate", $user->id) }}">Edit</button>
                    <button class="btn btn-danger action-remove-user" data-action="{{ action("Admin\UsersController@getDestroy", $user->id) }}">Remove</button>
                </td>
            </tr>
        @endforeach
    </table>
    <!-- Modal -->
    <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="editUserLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="editUserLabel">Edit user</h4>
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
                        {!! Form::label('name', 'User name:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>

                    <!--- User Field --->
                    <div class="form-group">
                        {!! Form::label('level', 'User level:') !!}
                        {!! Form::text('level', 0, ['class' => 'form-control']) !!}
                    </div>
                    
                    <!--- Email Field --->
                    <div class="form-group">
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    </div>

                    <hr />
                    <div class="help-block">Not required</div>
                    <!--- Password Field --->
                    <div class="form-group">
                        {!! Form::label('password', 'Password:') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>

                    <!--- Password Field --->
                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'Password confirm:') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary action-save-user">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script>
        $(document).ready(function() {
            var list = $(".categories-list");
            var modalForm = $("#editUser form");
            list.on("click", ".action-edit-user", function() {
                modalForm.attr("action", $(this).data("action"));
                modalForm.find("[name=name]").val($(this).closest("tr").find(".name").html().trim());
                modalForm.find("[name=email]").val($(this).closest("tr").find(".email").html().trim());
                modalForm.find("[name=level]").val($(this).closest("tr").find(".level").html().trim());

            });

            $(".action-save-user").click(function() {
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

            list.on("click", ".action-remove-user", function() {
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
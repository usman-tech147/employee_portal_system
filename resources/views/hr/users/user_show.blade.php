@extends('layouts.master')
@section('message')
    <span id="message"></span>
@endsection
@section('heading')
    User Record
@endsection
@section('content')

    @include('hr.users.user_modals.create_modal')
    <div class="content">
        <section>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title float-left">Users Record</h3>
                    <button class="btn btn-primary float-right" onclick="userForm()"><i class="fas fa-plus"></i>
                        User
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="user_table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </section>
    </div>


    {{--<div class="wrapper">--}}
    {{--<div class="row">--}}
    {{--<div class="col-10 offset-1">--}}
    {{--<div class="card">--}}
    {{--<div class="card-header">--}}
    {{--<div class="row">--}}
    {{--<div class="col-11">--}}
    {{--<h3 class="card-title">--}}
    {{--Teachers Detail--}}
    {{--</h3>--}}
    {{--</div>--}}
    {{--<div class="col-1">--}}
    {{--<a href="{{route('users.create')}}" class="btn btn-primary"> <i class="fas fa-plus"></i>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<!-- /.card-header -->--}}
    {{--<div class="card-body">--}}
    {{--<table id="example1" class="table table-bordered table-striped">--}}
    {{--<thead>--}}
    {{--<tr>--}}
    {{--<th>ID</th>--}}
    {{--<th>Name</th>--}}
    {{--<th>Email</th>--}}
    {{--<th>Role</th>--}}
    {{--<th>Actions</th>--}}
    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody>--}}
    {{--@foreach ($users as $user)--}}
    {{--<tr>--}}
    {{--<td>{{$user->id}}</td>--}}
    {{--<td>{{$user->first_name}}</td>--}}
    {{--<td>{{$user->email}}</td>--}}
    {{--<td>--}}
    {{--@foreach($user->getRoleNames() as $role)--}}
    {{--{{$role}}--}}
    {{--@endforeach--}}
    {{--</td>--}}
    {{--<td>--}}
    {{--<a href="#" class="btn btn-warning"> <i class="fas fa-marker"></i> </a>--}}
    {{--<a href="#" class="btn btn-danger"> <i class="fas fa-trash"></i> </a>--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--@endforeach--}}

    {{--</tbody>--}}
    {{--<tfoot>--}}
    {{--<tr>--}}
    {{--<th>ID</th>--}}
    {{--<th>Name</th>--}}
    {{--<th>Email</th>--}}
    {{--<th>Role</th>--}}
    {{--<th> Actions</th>--}}
    {{--</tr>--}}
    {{--</tfoot>--}}
    {{--</table>--}}
    {{--</div>--}}
    {{--<!-- /.card-body -->--}}
    {{--</div>--}}
    {{--<!-- /.card -->--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@endsection

@section('js')
    <script>
        $('#user_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: false,
            ajax: {
                url: '{{route('all.registered.users')}}',
            },
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'role',
                    name: 'role'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            columnDefs: [
                {
                    "targets": 4,
                    "className": "text-center",
                }],
        });

        /**
         * USER FORM MODAL POP UP
         * **/
        function userForm() {
            getSchools();
            $('#modal-title').text('Add User Detail');
            $('#user_modal').modal('show');
            $('#user_modal form')[0].reset();
            $('#user_modal form').find('.invalid-feedback').remove();
            $('#user_modal form').find('.form-control').removeClass('is-invalid');
            $('.action').attr('id', 'store');
            $('.action').text('Save Record');
        }

        /**
         * GET ALL SCHOOL
         * **/
            function getSchools() {
            var url = '{{route('all.schools')}}';
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {

                    console.log(data.schools);

                    var template = '<option value="default">Choose...</option>';
                    $.each(data.schools, function (i, item) {
                        template += '<option value="' + item.id + '">' + item.name + '</option>';
                    });

                    $('#school_id').html(template);

                },
                error: function (jqxhr, status, exception) {
                    alert('Exception:', exception);
                }
            });
        }

        /**
         * GET SCHOOL DEPARTMENT
         * **/
        function getSchoolDepratments() {

            var id = $('#school_id').val();
            if (id != 'default') {
                var url = '{{route('user.school.departments',":id")}}';
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        var template = '<option value="default">Choose</option>';
                        $.each(data.departments, function (i, item) {
                            template += '<option value="' + item.id + '">' + item.name + '</option>';
                        });

                        $('#department_id').html(template);
                    },
                    error: function (jqxhr, status, exception) {
                        console.log('error');
                        alert('Exception:', exception);
                    }
                });
            }
            else {
                var template = '<option value="default">Choose...</option>';
                $('#department_id').html(template);
            }

        }


    </script>
@endsection



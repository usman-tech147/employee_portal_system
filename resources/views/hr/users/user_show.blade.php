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

        /**
         * POST and PATCH REQUEST FOR COURSE DETAIL
         * **/
        $('#userForm').submit(function (e) {

            if ($('.action').attr('id') == 'store') {

                // alert('id is store');
                formdata = new FormData(this);
                // formdata.set('school_id', $('#school_id option:selected').text());
                // formdata.set('department_id', $('#department_id option:selected').text());
                // for(var pair of formdata.entries()) {
                //     console.log(pair[0]+ ', '+ pair[1]);
                // }
                $.ajax({
                    url: '{{route('users.store')}}',
                    method: 'POST',
                    data: formdata,
                    contentType: false,
                    cache: false,
                    processData: false,
                    datatype: 'json',
                    success: function (data) {
                        $('#user_modal form').find('.invalid-feedback').remove();
                        $('#user_modal form').find('.form-control').removeClass('is-invalid');

                        console.log(data.request);
                        if (data.errors) {
                            $.each(data.errors, function (key, value) {
                                $('#' + key)
                                    .addClass('is-invalid')
                                    .after('<div class="invalid-feedback text-"><strong>'
                                        + value +
                                        '</strong></div>');
                            });
                        }
                        if (data.success) {
                            // console.log(data);
                            $('#userForm')[0].reset();
                            $('#user_modal').modal('hide');
                            html = '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>' + data.success + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                            $('#message').html(html);
                            $('#user_table').DataTable().ajax.reload();
                        }
                    },
                    error: function (jqxhr, status, exception) {
                        alert('this is exeption');
                    }
                });
            }
            {{--if ($('.action').attr('id') == 'updation') {--}}

                {{--formdata = new FormData(this);--}}
                {{--formdata.set('_method', 'PATCH');--}}
                {{--formdata.set('course_level', $('#course_level option:selected').text());--}}
                {{--formdata.set('program', $('#program option:selected').text());--}}
                {{--formdata.set('course_title', $('#course_title option:selected').text());--}}
                {{--formdata.set('semester', $('#semester option:selected').text());--}}

                {{--var c_id = $('#hidden_id').val();--}}
                {{--var url = '{{route('course_detail.update',":c_id")}}';--}}
                {{--url = url.replace(':c_id', c_id);--}}
                {{--$.ajax({--}}
                    {{--url: url,--}}
                    {{--type: 'POST',--}}
                    {{--data: formdata,--}}
                    {{--contentType: false,--}}
                    {{--cache: false,--}}
                    {{--processData: false,--}}
                    {{--datatype: 'json',--}}
                    {{--success: function (data) {--}}
                        {{--$('#course_detail_modal form').find('.invalid-feedback').remove();--}}
                        {{--$('#course_detail_modal form').find('.form-control').removeClass('is-invalid');--}}
                        {{--if (data.errors) {--}}
                            {{--$.each(data.errors, function (key, value) {--}}
                                {{--$('#' + key)--}}
                                    {{--.addClass('is-invalid')--}}
                                    {{--.after('<div class="invalid-feedback text-"><strong>'--}}
                                        {{--+ value +--}}
                                        {{--'</strong></div>');--}}
                            {{--});--}}
                        {{--}--}}
                        {{--if (data.success) {--}}
                            {{--$('#course_detail_form')[0].reset();--}}
                            {{--$('#course_detail_modal').modal('hide');--}}
                            {{--html = '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>' + data.success + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';--}}
                            {{--$('#message').html(html);--}}
                            {{--$('#course_table').DataTable().ajax.reload();--}}
                        {{--}--}}
                    {{--},--}}
                    {{--error: function (jqxhr, status, exception) {--}}
                        {{--alert('Exception:', exception);--}}
                    {{--}--}}
                {{--});--}}
            {{--}--}}
            e.preventDefault();
        });
    </script>
@endsection



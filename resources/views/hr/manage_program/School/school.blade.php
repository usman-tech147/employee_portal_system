@extends('layouts.master')
@section('message')
    <span id="message"></span>
@endsection
@section('heading')
    Manage School
@endsection
@section('content')
    @include('hr.manage_program.School.school_modals.create_and_edit_modal')
    <div class="content">
        <section>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title float-left">Schools Record</h3>
                    <button class="btn btn-primary float-right" onclick="schoolForm()"><i class="fas fa-plus"></i>
                        School
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="">
                        <table id="school_tbl" class="table table-bordered table-striped table-responsive-md">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>School Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
        </section>
    </div>
    @include('hr.manage_program.School.school_modals.delete_modal')
@endsection

@section('js')
    <script>
        /**
         * GET REQUEST FOR COURSE DETAIL
         * **/

        {{--$(document).ready(function() {--}}
            {{--$.ajax({--}}
                {{--url: '{{route('all.departments')}}',--}}
                {{--method: 'GET',--}}
                {{--contentType: false,--}}
                {{--cache: false,--}}
                {{--processData: false,--}}
                {{--datatype: 'json',--}}
                {{--success: function (data) {--}}
                    {{--console.log(data);--}}
                {{--},--}}
                {{--error: function (jqxhr, status, exception) {--}}
                    {{--alert('Exception:', jqxhr);--}}
                {{--}--}}
            {{--});--}}
        {{--});--}}

        $('#school_tbl').DataTable({
            processing: true,
            // serverSide: true,
            responsive: true,
            autoWidth: false,
            columnDefs:[
                {
                    targets:'_all',
                    className : 'text-center',
                }
            ],
            ajax: {
                url: '{{route('all.schools')}}',
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
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        /**
         * COURSE DETAIL FORM MODAL POP UP
         * **/
        function schoolForm() {
            // alert('working');
            $('#modal-title').text('Add School');
            $('#school_modal').modal('show');
            $('#school_modal form')[0].reset();
            $('#school_modal form').find('.invalid-feedback').remove();
            $('#school_modal form').find('.form-control').removeClass('is-invalid');
            $('.action').attr('id', 'store');
            $('.action').text('Save Record');
        }

        /**
         * POST and PATCH REQUEST FOR COURSE DETAIL
         * **/
        $('#school_form').submit(function (e) {
            if ($('.action').attr('id') == 'store') {
                data = new FormData(this);
                $.ajax({
                    url: '{{route('school.store')}}',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    datatype: 'json',
                    success: function (data) {
                        $('#school_modal form').find('.invalid-feedback').remove();
                        $('#school_modal form').find('.form-control').removeClass('is-invalid');
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
                            $('#school_form')[0].reset();
                            $('#school_modal').modal('hide');
                            html = '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>' + data.success + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                            $('#message').html(html);
                            $('#school_tbl').DataTable().ajax.reload();
                        }
                    },
                    error: function (jqxhr, status, exception) {
                        alert('Exception:', jqxhr);
                    }
                });
            }
            if ($('.action').attr('id') == 'updation') {
                var c_id = $('#hidden_id').val();
                var url = '{{route('school.update',":c_id")}}';
                url = url.replace(':c_id', c_id);
                var formdata = new FormData(this);
                formdata.set('_method', 'PATCH');
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formdata,
                    contentType: false,
                    cache: false,
                    processData: false,
                    datatype: 'json',
                    success: function (data) {
                        $('#school_modal form').find('.invalid-feedback').remove();
                        $('#school_modal form').find('.form-control').removeClass('is-invalid');
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
                            $('#school_form')[0].reset();
                            $('#school_modal').modal('hide');
                            html = '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>' + data.success + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                            $('#message').html(html);
                            $('#school_tbl').DataTable().ajax.reload();
                        }
                    },
                    error: function (jqxhr, status, exception) {
                        alert('Exception:', exception);
                    }
                });
            }
            e.preventDefault();
        });

        /**
         * GET REQUEST FOR EDIT COURSE DETAIL RECORD
         * **/
        function editSchool(id) {
            $('#school_form')[0].reset();
            $('#school_modal form').find('.invalid-feedback').remove();
            $('#school_modal form').find('.form-control').removeClass('is-invalid');
            var c_id = id;
            var url = '{{route('school.edit',":c_id")}}';
            url = url.replace(':c_id', c_id);
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#modal-title').text('Edit School');
                    $('#school_modal').modal('show');
                    $('.action').attr('id', 'updation');
                    $('.action').text('Update Record');
                    $('#name').val(data.name);
                    $('#hidden_id').val(data.id);
                },
                error: function (jqxhr, status, exception) {
                    alert('Exception:', exception);
                }
            });
        }


        /**
         * DELETE COURSE DETAIL MODAL POP UP
         * **/
        function deleteSchool(id) {
            $('#confirmModel').modal('show');
            $('#del').val(id);
            // $('.modal-title').text('CONFIRMATION');
        }

        /**
         * DELETE REQUEST FOR COURSE DETAIL
         * **/
        function deleteData() {
            var id = $('#del').val();
            var token = $("meta[name='csrf-token']").attr("content");

            var c_id = id;
            var url = '{{route('school.destroy',":c_id")}}';
            url = url.replace(':c_id', c_id);
            $.ajax(
                {
                    url: url,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (data) {
                        $('#confirmModel').modal('hide');
                        html = '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>' + data.success + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                        $('#message').html(html);
                        $('#school_tbl').DataTable().ajax.reload();
                    }
                });
        }

    </script>
@endsection
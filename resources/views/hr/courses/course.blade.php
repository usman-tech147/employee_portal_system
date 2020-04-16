@extends('layouts.master')
@section('message')
    <span id="message"></span>
@endsection
@section('heading')
    Courses
@endsection
@section('content')
    @include('hr.courses.course_modals.create_and_edit_modal')
    <div class="content">
        <section>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title float-left">Courses Record</h3>
                    <button class="btn btn-primary float-right" onclick="courseForm()"><i class="fas fa-plus"></i>
                        Course
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="">
                        <table id="course" class="table table-bordered table-striped table-responsive-md">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Course</th>
                                <th>Program</th>
                                <th>Course Code</th>
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
    @include('hr.courses.course_modals.delete_modal')
@endsection

@section('js')
    <script>
        /**
         * GET REQUEST FOR COURSES
         * **/
        $('#course').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: false,
            ajax: {
                url: '{{route('all.courses')}}',
            },
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'course_name',
                    name: 'course_name'
                },
                {
                    data: 'program',
                    name: 'program'
                },
                {
                    data: 'course_code',
                    name: 'course_code'
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
        function courseForm() {
            // alert('working');
            $.ajax({
                url: 'course/all/programs',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    html = '<select name="program" id="program" class="form-control custom-select" multiple>\n' +
                        '                                ' + data.data + ' \n' +
                        '                            </select>';
                    $('#program').html(html);
                    $('#modal-title').text('Add Course');
                    $('#course_modal').modal('show');
                    $('#course_modal form')[0].reset();
                    $('#course_modal form').find('.invalid-feedback').remove();
                    $('#course_modal form').find('.form-control').removeClass('is-invalid');
                    $('.action').attr('id', 'store');
                    $('.action').text('Save Record');
                },
                error: function (jqxhr, status, exception) {
                    alert('Exception:', exception);
                }
            });
        }

        /**
         * POST and PATCH REQUEST FOR COURSE DETAIL
         * **/
        $('#course_form').submit(function (e) {

            if ($('.action').attr('id') == 'store') {
                // data = new FormData(this);
                $.ajax({
                    url: '{{route('course.store')}}',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    datatype: 'json',
                    success: function (data) {
                        $('#course_modal form').find('.invalid-feedback').remove();
                        $('#course_modal form').find('.form-control').removeClass('is-invalid');
                        if (data.errors) {
                            console.log(data.errors);
                            $.each(data.errors, function (key, value) {
                                $('#' + key)
                                    .addClass('is-invalid')
                                    .after('<div class="invalid-feedback text-"><strong>'
                                        + value +
                                        '</strong></div>');
                            });
                        }
                        if (data.success) {
                            $('#course_form')[0].reset();
                            $('#course_modal').modal('hide');
                            html = '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>' + data.success + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                            $('#message').html(data.html);
                            $('#course').DataTable().ajax.reload();
                        }
                    },
                    error: function (jqxhr, status, exception) {
                        alert('Exception:', jqxhr);
                    }
                });
            }
            {{--if ($('.action').attr('id') == 'updation') {--}}
                {{--var c_id = $('#hidden_id').val();--}}
                {{--var url = '{{route('course_assessments.update',":c_id")}}';--}}
                {{--url = url.replace(':c_id', c_id);--}}
                {{--var formdata = new FormData(this);--}}
                {{--formdata.set('_method', 'PATCH');--}}
                {{--$.ajax({--}}
                    {{--url: url,--}}
                    {{--type: 'POST',--}}
                    {{--data: formdata,--}}
                    {{--contentType: false,--}}
                    {{--cache: false,--}}
                    {{--processData: false,--}}
                    {{--datatype: 'json',--}}
                    {{--success: function (data) {--}}
                        {{--$('#course_assessment_modal form').find('.invalid-feedback').remove();--}}
                        {{--$('#course_assessment_modal form').find('.form-control').removeClass('is-invalid');--}}
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
                            {{--$('#course_assessment_form')[0].reset();--}}
                            {{--$('#course_assessment_modal').modal('hide');--}}
                            {{--html = '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>' + data.success + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';--}}
                            {{--$('#message').html(html);--}}
                            {{--$('#course_assessment').DataTable().ajax.reload();--}}
                        {{--}--}}
                    {{--},--}}
                    {{--error: function (jqxhr, status, exception) {--}}
                        {{--alert('Exception:', exception);--}}
                    {{--}--}}
                {{--});--}}
            {{--}--}}


            e.preventDefault();
        });

        /**
         * GET REQUEST FOR EDIT COURSE DETAIL RECORD
         * **/
        {{--function editCourseAssessmet(id) {--}}
            {{--$('#course_assessment_form')[0].reset();--}}
            {{--$('#course_assessment_modal form').find('.invalid-feedback').remove();--}}
            {{--$('#course_assessment_modal form').find('.form-control').removeClass('is-invalid');--}}
            {{--var c_id = id;--}}
            {{--var url = '{{route('course_assessments.edit',":c_id")}}';--}}
            {{--url = url.replace(':c_id', c_id);--}}
            {{--$.ajax({--}}
                {{--url: url,--}}
                {{--type: 'GET',--}}
                {{--dataType: 'json',--}}
                {{--success: function (data) {--}}
                    {{--$('#modal-title').text('Edit Course Assessment');--}}
                    {{--$('#course_assessment_modal').modal('show');--}}
                    {{--$('.action').attr('id', 'updation');--}}
                    {{--$('.action').text('Update Record');--}}
                    {{--$('#course_level').val(data.course_level);--}}
                    {{--$('#program').val(data.program);--}}
                    {{--$('#course_title').val(data.course_title);--}}
                    {{--$('#course_code').val(data.course_code);--}}
                    {{--$('#semester').val(data.semester);--}}
                    {{--$('#final_result_submission').val(data.final_result_submission);--}}
                    {{--$('#moodle_usage_status').val(data.moodle_usage_status);--}}
                    {{--$('#hidden_id').val(data.id);--}}
                {{--},--}}
                {{--error: function (jqxhr, status, exception) {--}}
                    {{--alert('Exception:', exception);--}}
                {{--}--}}
            {{--});--}}
        {{--}--}}


        /**
         * DELETE COURSE DETAIL MODAL POP UP
         * **/
        function deleteCourse(id) {
            $('#confirmModel').modal('show');
            $('#del').val(id);
            // $('.modal-title').text('CONFIRMATION');
        }

        /**
         * DELETE REQUEST FOR COURSE
         * **/
        function deleteData() {
            var id = $('#del').val();
            var token = $("meta[name='csrf-token']").attr("content");

            var c_id = id;
            var url = '{{route('course.destroy',":c_id")}}';
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
                        console.log(data.success);
                        $('#confirmModel').modal('hide');
                        html = '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>' + data.success + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                        $('#message').html(html);
                        $('#course').DataTable().ajax.reload();
                    }
                });
        }

    </script>
@endsection
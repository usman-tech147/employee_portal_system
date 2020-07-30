@extends('layouts.master')
@section('message')
    <span id="message"></span>
@endsection
@section('heading')
    Courses Assessment
@endsection
@section('content')
    @include('teacher.teaching.Course_Assessment.course_assessments_modals.create_and_edit_modal')
    <div class="content">
        <section>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title float-left">Courses Assessment Record</h3>
                    <button class="btn btn-primary float-right" onclick="courseAssessmentForm()"><i class="fas fa-plus"></i>
                        Course Assessment
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="">
                        <table id="course_assessment" class="table table-bordered table-striped table-responsive-md">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Course Level</th>
                                <th>Program</th>
                                <th>Course Title</th>
                                <th>Course Code</th>
                                <th>Semester</th>
                                <th>Result Submission</th>
                                <th>Model Usage Status</th>
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
    {{--@include('teacher\teaching\Course_Assessment\course_assessments_modals\delete_modal')--}}
@endsection

@section('js')
    <script>
        /**
         * GET REQUEST FOR COURSE DETAIL
         * **/

        var courses;
        $('#course_assessment').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: false,
            ajax: {
                url: '{{route('all.courses.assessments')}}',
            },
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'course_level',
                    name: 'course_level'
                },
                {
                    data: 'program',
                    name: 'program'
                },
                {
                    data: 'course_title',
                    name: 'course_title'
                },
                {
                    data: 'course_code',
                    name: 'course_code'
                },
                {
                    data: 'semester',
                    name: 'semester'
                },
                {
                    data: 'final_result_submission',
                    name: 'final_result_submission',
                },
                {
                    data: 'moodle_usage_status',
                    name: 'moodle_usage_status'
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
        function courseAssessmentForm() {
            getCourseLevel();
            $('#modal-title').text('Add Course Assessment');
            $('#course_assessment_modal').modal('show');
            $('#course_assessment_modal form')[0].reset();
            $('#course_assessment_modal form').find('.invalid-feedback').remove();
            $('#course_assessment_modal form').find('.form-control').removeClass('is-invalid');
            $('.action').attr('id', 'store');
            $('.action').text('Save Record');
        }

        /**
         * COURSE DETAIL GET COURSE LEVELS
         * **/
        function getCourseLevel() {
            var url = '{{route('helper.course_levels')}}';
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {

                    var template = '<option value="default">Choose...</option>';
                    $.each(data.course_levels, function (i, item) {
                        template += '<option value="' + item.id + '">' + item.name + '</option>';
                    });

                    course_levels = data.course_levels;

                    $('#course_level').html(template);

                },
                error: function (jqxhr, status, exception) {
                    alert('Exception:', exception);
                }
            });
        }

        /**
         * COURSE DETAIL GET COURSE LEVEL PROGRAMS
         * **/
        function getPrograms() {
            var id = $('#course_level').val();
            var url = '{{route('helper.course_level.programs',":id")}}';
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    var template = '<option value="default">Choose...</option>';
                    $.each(data.programs, function (i, item) {
                        template += '<option value="' + item.id + '">' + item.name + '</option>';
                    });

                    $('#program').html(template);
                },
                error: function (jqxhr, status, exception) {
                    alert('Exception:', exception);
                }
            });
        }


        /**
         * COURSE DETAIL GET PROGRAM COURSES
         * **/
        function getCourses() {
            var id = $('#program').val();
            var url = '{{route('helper.program.courses',":id")}}';
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    courses = data.courses;
                    var template = '<option value="default">Choose...</option>';
                    $.each(data.courses, function (i, item) {
                        template += '<option value="' + item.id + '">' + item.course_name + '</option>';
                    });
                    $('#course_title').html(template);
                },
                error: function (jqxhr, status, exception) {
                    alert('Exception:', exception);
                }
            });
        }

        /**
         * COURSE DETAIL GET COURSE CODE
         * **/
        function getCourseCode() {
            id = $('#course_title').val();
            $.each(courses, function (i, item) {
                if (id == item.id) {
                    $('#course_code').val(item.course_code);
                }
            });
        }

        /**
         * POST and PATCH REQUEST FOR COURSE DETAIL
         * **/
        $('#course_assessment_form').submit(function (e) {

            if ($('.action').attr('id') == 'store') {
                formdata = new FormData(this);
                formdata.set('course_level', $('#course_level option:selected').text());
                formdata.set('program', $('#program option:selected').text());
                formdata.set('course_title', $('#course_title option:selected').text());

                $.ajax({
                    url: '{{route('course_assessments.store')}}',
                    method: 'POST',
                    data: formdata,
                    contentType: false,
                    cache: false,
                    processData: false,
                    datatype: 'json',
                    success: function (data) {
                        $('#course_assessment_modal form').find('.invalid-feedback').remove();
                        $('#course_assessment_modal form').find('.form-control').removeClass('is-invalid');
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
                            $('#course_assessment_form')[0].reset();
                            $('#course_assessment_modal').modal('hide');
                            html = '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>' + data.success + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                            $('#message').html(html);
                            $('#course_assessment').DataTable().ajax.reload();
                        }
                    },
                    error: function (jqxhr, status, exception) {
                        alert('Exception:', jqxhr);
                    }
                });
            }
            if ($('.action').attr('id') == 'updation') {
                var c_id = $('#hidden_id').val();
                var url = '{{route('course_assessments.update',":c_id")}}';
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
                        $('#course_assessment_modal form').find('.invalid-feedback').remove();
                        $('#course_assessment_modal form').find('.form-control').removeClass('is-invalid');
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
                            $('#course_assessment_form')[0].reset();
                            $('#course_assessment_modal').modal('hide');
                            html = '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>' + data.success + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                            $('#message').html(html);
                            $('#course_assessment').DataTable().ajax.reload();
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
        function editCourseAssessmet(id) {
            $('#course_assessment_form')[0].reset();
            $('#course_assessment_modal form').find('.invalid-feedback').remove();
            $('#course_assessment_modal form').find('.form-control').removeClass('is-invalid');
            var c_id = id;
            var url = '{{route('course_assessments.edit',":c_id")}}';
            url = url.replace(':c_id', c_id);
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#modal-title').text('Edit Course Assessment');
                    $('#course_assessment_modal').modal('show');
                    $('.action').attr('id', 'updation');
                    $('.action').text('Update Record');

                    $('#course_level').val(data.course_level);
                    $('#program').val(data.program);
                    $('#course_title').val(data.course_title);
                    $('#course_code').val(data.course_code);
                    $('#semester').val(data.semester);
                    $('#final_result_submission').val(data.final_result_submission);
                    $('#moodle_usage_status').val(data.moodle_usage_status);
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
        function deleteCourseAssessmet(id) {
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
            var url = '{{route('course_assessments.destroy',":c_id")}}';
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
                        $('#course_assessment').DataTable().ajax.reload();
                    }
                });
        }

    </script>
@endsection
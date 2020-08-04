@extends('layouts.master')
@section('message')
    <span id="message"></span>
@endsection
@section('heading')
    Courses Detail
@endsection
@section('content')
    @include('teacher.teaching.Course_Detail.course_detail_modals.create_modal')
    <div class="content">
        <section>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title float-left">Category Record</h3>
                    <button class="btn btn-primary float-right" onclick="courseDetailForm()"><i class="fas fa-plus"></i>
                        Course Detail
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="course_table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Course Level</th>
                            <th>Program</th>
                            <th>Course Title</th>
                            <th>Course Code</th>
                            <th>Smester</th>
                            <th>No Of Assessments</th>
                            <th>% Of Makeup Classes</th>
                            <th>Student Feedback</th>
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

    <div class="modal fade" id="confirmModel" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure. you want to remove this data...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="ok_button" onclick="deleteData()" class="btn btn-primary">Ok</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="hidden" id="del" value="">
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        /**
         * GET REQUEST FOR COURSE DETAIL
         * **/
        $('#course_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: false,
            ajax: {
                url: '{{route('all.courses.details')}}',
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
                    data: 'assessments',
                    name: 'assessments',
                },
                {
                    data: 'makeup_classes',
                    name: 'makeup_classes'
                },
                {
                    data: 'student_feedback',
                    name: 'student_feedback'
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
        function courseDetailForm() {
            getCourseLevel();
            $('#modal-title').text('Add Course Detail');
            $('#course_detail_modal').modal('show');
            $('#course_detail_modal form')[0].reset();
            $('#course_detail_modal form').find('.invalid-feedback').remove();
            $('#course_detail_modal form').find('.form-control').removeClass('is-invalid');
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

            alert('get programs works');
            var id = $('#course_level').val();

            if (id != 'default') {
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
            else {
                alert('get programs else part');
                var template = '<option value="default">Choose...</option>';
                $('#program').html(template);
            }

        }


        /**
         * COURSE DETAIL GET PROGRAM COURSES
         * **/
        function getCourses() {
            alert('get courses works');
            var id = $('#program').val();

            if (id != 'default') {
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
            else {

                alert('get courses else');
                var template = '<option value="default">Choose...</option>';
                $('#course_title').html(template);
            }
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
        $('#course_detail_form').submit(function (e) {
            if ($('.action').attr('id') == 'store') {

                formdata = new FormData(this);
                formdata.set('course_level', $('#course_level option:selected').text());
                formdata.set('program', $('#program option:selected').text());
                formdata.set('course_title', $('#course_title option:selected').text());
                formdata.set('semester', $('#semester option:selected').text());
                // alert(formdata.get('program'));
                // alert(data.get('program'));
                $.ajax({
                    url: '{{route('course_detail.store')}}',
                    method: 'POST',
                    data: formdata,
                    contentType: false,
                    cache: false,
                    processData: false,
                    datatype: 'json',
                    success: function (data) {
                        $('#course_detail_modal form').find('.invalid-feedback').remove();
                        $('#course_detail_modal form').find('.form-control').removeClass('is-invalid');
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
                            // console.log(data.success);
                            $('#course_detail_form')[0].reset();
                            $('#course_detail_modal').modal('hide');
                            html = '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>' + data.success + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                            $('#message').html(html);
                            $('#course_table').DataTable().ajax.reload();
                        }
                    },
                    error: function (jqxhr, status, exception) {
                        alert('Exception:', jqxhr);
                    }
                });
            }
            if ($('.action').attr('id') == 'updation') {

                formdata = new FormData(this);
                formdata.set('_method', 'PATCH');
                formdata.set('course_level', $('#course_level option:selected').text());
                formdata.set('program', $('#program option:selected').text());
                formdata.set('course_title', $('#course_title option:selected').text());
                formdata.set('semester', $('#semester option:selected').text());

                var c_id = $('#hidden_id').val();
                var url = '{{route('course_detail.update',":c_id")}}';
                url = url.replace(':c_id', c_id);
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formdata,
                    contentType: false,
                    cache: false,
                    processData: false,
                    datatype: 'json',
                    success: function (data) {
                        $('#course_detail_modal form').find('.invalid-feedback').remove();
                        $('#course_detail_modal form').find('.form-control').removeClass('is-invalid');
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
                            $('#course_detail_form')[0].reset();
                            $('#course_detail_modal').modal('hide');
                            html = '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>' + data.success + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                            $('#message').html(html);
                            $('#course_table').DataTable().ajax.reload();
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
        function editCourseDetail(id) {

            // console.log("course detail id is: " + id);

            $('#course_detail_form')[0].reset();
            $('#course_level').empty();
            $('#course_detail_modal form').find('.invalid-feedback').remove();
            $('#course_detail_modal form').find('.form-control').removeClass('is-invalid');
            var c_id = id;
            var url = '{{route('course_detail.edit',":c_id")}}';
            url = url.replace(':c_id', c_id);
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {

                    alert('edit part works')

                    level = data.data.course_level;
                    prog = data.data.program;
                    title = data.data.course_title;
                    code = data.data.course_code;

                    courses_level = data.c_level;
                    var template_1 = '<option value="default">Choose...</option>';
                    $.each(courses_level, function (i, item) {
                        if (item.name == level) {
                            template_1 += '<option value="' + item.id + '" selected>' + item.name + '</option>';
                        }
                        else {
                            template_1 += '<option value="' + item.id + '">' + item.name + '</option>';
                        }
                    });
                    $('#course_level').html(template_1);

                    programs = data.programs;
                    var template_2 = '<option value="default">Choose...</option>';
                    $.each(programs, function (i, item) {
                        if (item.name == prog) {
                            template_2 += '<option value="' + item.id + '" selected>' + item.name + '</option>';
                        }
                    });
                    $('#program').html(template_2);

                    courses = data.courses;
                    var template_3 = '<option value="default">Choose...</option>';
                    $.each(courses, function (i, item) {
                        if (item.course_name == title) {
                            template_3 += '<option value="' + item.id + '" selected>' + item.course_name + '</option>';
                            $("#course_code").attr("readonly", true);
                            $("#course_code").val(code);
                        }
                    });
                    $('#course_title').html(template_3);

                    $('#modal-title').text('Edit Course Detail');
                    $('#course_detail_modal').modal('show');
                    $('.action').attr('id', 'updation');
                    $('.action').text('Update');
                    $('#semester').val(data.data.semester);
                    $('#assessments').val(data.data.assessments);
                    $('#makeup_classes').val(data.data.makeup_classes);
                    $('#student_feedback').val(data.data.student_feedback);
                    $('#hidden_id').val(data.data.id);
                },
                error: function (jqxhr, status, exception) {
                    alert('Exception:', exception);
                }
            });
        }


        /**
         * DELETE COURSE DETAIL MODAL POP UP
         * **/
        function deleteCourseDetail(id) {
            $('#confirmModel').modal('show');
            $('#del').val(id);
            $('.modal-title').text('CONFIRMATION');
        }

        /**
         * DELETE REQUEST FOR COURSE DETAIL
         * **/
        function deleteData() {
            var id = $('#del').val();
            var token = $("meta[name='csrf-token']").attr("content");

            var c_id = id;
            var url = '{{route('course_detail.destroy',":c_id")}}';
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
                        $('#course_table').DataTable().ajax.reload();
                    }
                });
        }

    </script>
@endsection

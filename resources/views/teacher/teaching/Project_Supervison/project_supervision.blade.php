@extends('layouts.master')
@section('message')
    <span id="message"></span>
@endsection
@section('heading')
    Project Supervised
@endsection
@section('content')
    @include('teacher.teaching.Project_Supervison.project_supervision_modals.create_and_edit_modal')
    <div class="content">
        <section>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title float-left">Project Supervised Record</h3>
                    <button class="btn btn-primary float-right" onclick="projectSupervisedForm()"><i class="fas fa-plus"></i>
                        Project Supervised
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="">
                        <table id="project_supervised_tbl" class="table table-bordered table-striped table-responsive-md">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Project Title</th>
                                <th>Course Level</th>
                                <th>Program</th>
                                <th>No Of Students</th>
                                <th>Org Name</th>
                                <th>Project Type</th>
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
    @include('teacher.teaching.Project_Supervison.project_supervision_modals.delete_modal')
@endsection

@section('js')
    <script>
        /**
         * GET REQUEST FOR COURSE DETAIL
         * **/

        var courses;
        $('#project_supervised_tbl').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: false,
            ajax: {
                url: '{{route('all.project.supervises')}}',
            },
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'project_title',
                    name: 'project_title'
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
                    data: 'no_of_students',
                    name: 'no_of_students'
                },
                {
                    data: 'organization_name',
                    name: 'organization_name'
                },
                {
                    data: 'project_type',
                    name: 'project_type'
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
        function projectSupervisedForm() {
            getCourseLevel();
            $('#modal-title').text('Add Project Supervised');
            $('#project_supervised_modal').modal('show');
            $('#project_supervised_modal form')[0].reset();
            $('#project_supervised_modal form').find('.invalid-feedback').remove();
            $('#project_supervised_modal form').find('.form-control').removeClass('is-invalid');
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
         * POST and PATCH REQUEST FOR PROJECT SUPERVISED
         * **/
        $('#project_supervised_form').submit(function (e) {

            if ($('.action').attr('id') == 'store') {
                formdata = new FormData(this);
                formdata.set('course_level', $('#course_level option:selected').text());
                formdata.set('program', $('#program option:selected').text());

                // for(var pair of formdata.entries()) {
                //     console.log(pair[0]+ ', '+ pair[1]);
                // }

                $.ajax({
                    url: '{{route('project_supervision.store')}}',
                    method: 'POST',
                    data: formdata,
                    contentType: false,
                    cache: false,
                    processData: false,
                    datatype: 'json',
                    success: function (data) {
                        $('#project_supervised_modal form').find('.invalid-feedback').remove();
                        $('#project_supervised_modal form').find('.form-control').removeClass('is-invalid');
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
                            $('#project_supervised_form')[0].reset();
                            $('#project_supervised_modal').modal('hide');
                            html = '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>' + data.success + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                            $('#message').html(html);
                            $('#project_supervised_tbl').DataTable().ajax.reload();
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
        function deleteProjectSupervised(id) {
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
            var url = '{{route('project_supervision.destroy',":c_id")}}';
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
                        $('#project_supervised_tbl').DataTable().ajax.reload();
                    }
                });
        }

    </script>
@endsection
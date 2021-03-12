@extends('layouts.master')
@section('message')
    <span id="message"></span>
@endsection
@section('heading')
    Employee Final Report
@endsection
@section('content')
    <div class="content">
        <form id="report" data-toggle="validator">
            @csrf {{ method_field('POST')}}
            <section>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <h4><strong>Name:</strong></h4>
                                <h5> {{$user->first_name}} {{$user->last_name}} </h5>
                                <h4><strong>Email:</strong></h4>
                                <h5> {{$user->email}} </h5>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <h4><strong>Designation:</strong></h4>
                                <h5> {{$user->designation}} </h5>
                                <h4><strong>Department:</strong></h4>
                                <h5> {{$user->department->name}} </h5>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card-header">
                            <div class="row">
                                <h1> Teaching </h1>
                            </div>
                        </div>
                        <table class="table">
                            <thead class="thead-dark text-center">
                            <tr>
                                <th colspan="8"><h3>Course Details</h3></th>
                            </tr>
                            </thead>
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Course Level</th>
                                <th scope="col">Program</th>
                                <th scope="col">Course Title</th>
                                <th scope="col">Course Code</th>
                                <th scope="col">Semester</th>
                                <th scope="col">No Of Assessments</th>
                                <th scope="col">% Of Makeup Classes</th>
                                <th scope="col">Student Feedback</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($course_details as $c_detail)
                                <tr>
                                    <td>{{$c_detail->course_level}}</td>
                                    <td>{{$c_detail->program}}</td>
                                    <td>{{$c_detail->course_title}}</td>
                                    <td>{{$c_detail->course_code}}</td>
                                    <td>{{$c_detail->semester}}</td>
                                    <td>{{$c_detail->assessments}}</td>
                                    <td>{{$c_detail->makeup_classes}}</td>
                                    <td>{{$c_detail->student_feedback}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if($role == 'hr')
                            <div class="form-group row" style="font-size: large; margin-top: 10px; margin-bottom: 30px">
                                <label class="offset-6 col-sm-2 col-form-label">Total Marks:
                                    10</label>
                                <label for="inputEmail3" class="col-sm-2 col-form-label" style="margin: 0">Obtained
                                    Marks:</label>
                                <div class="col-sm-2">
                                    <input type="number" min="0" max="10" class="form-control" id="course_detail"
                                           name="course_detail"
                                           placeholder="marks"
                                           @if(isset($user_sessional_marks[0]->course_detail))
                                           value="{{$user_sessional_marks[0]->course_detail}}"
                                           @endif

                                           style="border: solid black">
                                </div>
                            </div>
                        @endif
                        <table class="table">
                            <thead class="thead-dark text-center">
                            <tr>
                                <th colspan="8"><h3>Course Assessments</h3></th>
                            </tr>
                            </thead>
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Course Level</th>
                                <th scope="col">Program</th>
                                <th scope="col">Course Title</th>
                                <th scope="col">Course Code</th>
                                <th scope="col">Semester</th>
                                <th scope="col">Final Result</th>
                                <th scope="col">Moodle Usage</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($course_assessments as $c_assessment)
                                <tr>
                                    <td>{{$c_assessment->course_level}}</td>
                                    <td>{{$c_assessment->program}}</td>
                                    <td>{{$c_assessment->course_title}}</td>
                                    <td>{{$c_assessment->course_code}}</td>
                                    <td>{{$c_assessment->semester}}</td>
                                    <td>{{$c_assessment->final_result_submission}}</td>
                                    <td>{{$c_assessment->moodle_usage_status}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if($role == 'hr')
                            <div class="form-group row" style="font-size: large; margin-top: 10px; margin-bottom: 30px">
                                <label class="offset-6 col-sm-2 col-form-label">Total Marks:
                                    10</label>
                                <label class="col-sm-2 col-form-label" style="margin: 0">Obtained
                                    Marks:</label>
                                <div class="col-sm-2">
                                    <input type="number" min="0" max="10" class="form-control" id="course_assessment"
                                           name="course_assessment" placeholder="marks"
                                           @if(isset($user_sessional_marks[0]->course_assessment))
                                           value="{{$user_sessional_marks[0]->course_assessment}}"
                                           @endif
                                           style="border: solid black">
                                </div>
                            </div>
                        @endif
                        <table class="table">
                            <thead class="thead-dark text-center">
                            <tr>
                                <th colspan="8"><h3>New Course</h3></th>
                            </tr>
                            </thead>
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Course Title</th>
                                <th scope="col">Course Code</th>
                                <th scope="col">Program</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($new_courses as $course)
                                <tr>
                                    <td>{{$course->course_title}}</td>
                                    <td>{{$course->course_code}}</td>
                                    <td>{{$course->program}}</td>
                                    <td>{{$course->status}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if($role == 'hr')
                            <div class="form-group row" style="font-size: large; margin-top: 10px; margin-bottom: 30px">
                                <label for="inputEmail3" class="offset-6 col-sm-2 col-form-label">Total Marks:
                                    10</label>
                                <label for="inputEmail3" class="col-sm-2 col-form-label" style="margin: 0">Obtained
                                    Marks:</label>
                                <div class="col-sm-2">
                                    <input type="number" min="0" max="10" class="form-control" id="new_course"
                                           name="new_course"
                                           placeholder="marks"
                                           @if(isset($user_sessional_marks[0]->new_course))
                                           value="{{$user_sessional_marks[0]->new_course}}"
                                           @endif
                                           style="border: solid black">
                                </div>
                            </div>
                        @endif
                        <table class="table">
                            <thead class="thead-dark text-center">
                            <tr>
                                <th colspan="8"><h3>Thesis Supervised</h3></th>
                            </tr>
                            </thead>
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Thesis Title</th>
                                <th scope="col">Course Level</th>
                                <th scope="col">Program</th>
                                <th scope="col">Supervisor Type A</th>
                                <th scope="col">Supervisor Type B</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($thesis_supervises as $thesis)
                                <tr>
                                    <td>{{$thesis->thesis_title}}</td>
                                    <td>{{$thesis->course_level}}</td>
                                    <td>{{$thesis->program}}</td>
                                    <td>{{$thesis->superviser_type_a}}</td>
                                    <td>{{$thesis->superviser_type_b}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if($role == 'hr')
                            <div class="form-group row" style="font-size: large; margin-top: 10px; margin-bottom: 30px">
                                <label for="inputEmail3" class="offset-6 col-sm-2 col-form-label">Total Marks:
                                    10</label>
                                <label for="inputEmail3" class="col-sm-2 col-form-label" style="margin: 0">Obtained
                                    Marks:</label>
                                <div class="col-sm-2">
                                    <input type="number" min="0" max="10" class="form-control" id="thesis_supervise"
                                           name="thesis_supervise" placeholder="marks"
                                           @if(isset($user_sessional_marks[0]->thesis_supervise))
                                           value="{{$user_sessional_marks[0]->thesis_supervise}}"
                                           @endif
                                           style="border: solid black">
                                </div>
                            </div>
                        @endif
                        <table class="table">
                            <thead class="thead-dark text-center">
                            <tr>
                                <th colspan="8"><h3>Project Supervised</h3></th>
                            </tr>
                            </thead>
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Project Title</th>
                                <th scope="col">Course Level</th>
                                <th scope="col">Program</th>
                                <th scope="col">No Of Students</th>
                                <th scope="col">Org Name</th>
                                <th scope="col">Project Type</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($project_supervises as $project)
                                <tr>
                                    <td>{{$project->project_title}}</td>
                                    <td>{{$project->course_level}}</td>
                                    <td>{{$project->program}}</td>
                                    <td>{{$project->no_of_students}}</td>
                                    <td>{{$project->organization_name}}</td>
                                    <td>{{$project->project_type}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if($role == 'hr')
                            <div class="form-group row" style="font-size: large; margin-top: 10px; margin-bottom: 30px">
                                <label for="inputEmail3" class="offset-6 col-sm-2 col-form-label">Total Marks:
                                    10</label>
                                <label for="inputEmail3" class="col-sm-2 col-form-label" style="margin: 0">Obtained
                                    Marks:</label>
                                <div class="col-sm-2">
                                    <input type="number" min="0" max="10" class="form-control" id="project_supervise"
                                           name="project_supervise" placeholder="marks"
                                           @if(isset($user_sessional_marks[0]->project_supervise))
                                           value="{{$user_sessional_marks[0]->project_supervise}}"
                                           @endif
                                           style="border: solid black">
                                </div>
                            </div>
                        @endif
                        <table class="table">
                            <thead class="thead-dark text-center">
                            <tr>
                                <th colspan="8"><h3>Workshop Terminal</h3></th>
                            </tr>
                            </thead>
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Type</th>
                                <th scope="col">Month</th>
                                <th scope="col">Organization</th>
                                <th scope="col">Sponsoring Body</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($workshop_terminals as $workshop)
                                <tr>
                                    <td>{{$workshop->title}}</td>
                                    <td>{{$workshop->type}}</td>
                                    <td>{{$workshop->month}}</td>
                                    <td>{{$workshop->organization}}</td>
                                    <td>{{$workshop->sponsoring_body}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if($role == 'hr')
                            <div class="form-group row" style="font-size: large; margin-top: 10px; margin-bottom: 30px">
                                <label for="inputEmail3" class="offset-6 col-sm-2 col-form-label">Total Marks:
                                    10</label>
                                <label for="inputEmail3" class="col-sm-2 col-form-label" style="margin: 0">Obtained
                                    Marks:</label>
                                <div class="col-sm-2">
                                    <input type="number" min="0" max="10" class="form-control" id="workshop_terminal"
                                           name="workshop_terminal" placeholder="marks"
                                           @if(isset($user_sessional_marks[0]->workshop_terminal))
                                           value="{{$user_sessional_marks[0]->workshop_terminal}}"
                                           @endif
                                           style="border: solid black">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="card-header">
                            <div class="row">
                                <h1> Advising And Counseling </h1>
                            </div>
                        </div>
                        <table class="table">
                            <thead class="thead-dark text-center">
                            <tr>
                                <th colspan="8"><h3>Batch Advising</h3></th>
                            </tr>
                            </thead>
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Program</th>
                                <th scope="col">Batch</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">No Of Students</th>
                                <th scope="col">Meeting Held On</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($batch_advises as $batch)
                                <tr>
                                    <td>{{$batch->program}}</td>
                                    <td>{{$batch->batch}}</td>
                                    <td>{{$batch->start_date}}</td>
                                    <td>{{$batch->end_date}}</td>
                                    <td>{{$batch->no_of_students}}</td>
                                    <td>{{$batch->meeting_held_on}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if($role == 'hr')
                            <div class="form-group row" style="font-size: large; margin-top: 10px; margin-bottom: 30px">
                                <label for="inputEmail3" class="offset-6 col-sm-2 col-form-label">Total Marks:
                                    10</label>
                                <label for="inputEmail3" class="col-sm-2 col-form-label" style="margin: 0">Obtained
                                    Marks:</label>
                                <div class="col-sm-2">
                                    <input type="number" min="0" max="10" class="form-control" id="batch_advise"
                                           name="batch_advise" placeholder="marks"
                                           @if(isset($user_sessional_marks[0]->batch_advise))
                                           value="{{$user_sessional_marks[0]->batch_advise}}"
                                           @endif
                                           style="border: solid black">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="card-header">
                            <div class="row">
                                <h1> Research And Publications </h1>
                            </div>
                        </div>
                        <table class="table">
                            <thead class="thead-dark text-center">
                            <tr>
                                <th colspan="8"><h3>Travel And Research</h3></th>
                            </tr>
                            </thead>
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Research</th>
                                <th scope="col">Funding Agency</th>
                                <th scope="col">Venue</th>
                                <th scope="col">Total Grants</th>
                                <th scope="col">Approval</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($travel_and_researches as $travel)
                                <tr>
                                    <td>{{$travel->research_type}}</td>
                                    <td>{{$travel->funding_agency}}</td>
                                    <td>{{$travel->venue}}</td>
                                    <td>{{$travel->total_grants}}</td>
                                    <td>{{$travel->approval}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if($role == 'hr')
                            <div class="form-group row" style="font-size: large; margin-top: 10px; margin-bottom: 30px">
                                <label for="inputEmail3" class="offset-6 col-sm-2 col-form-label">Total Marks:
                                    10</label>
                                <label for="inputEmail3" class="col-sm-2 col-form-label" style="margin: 0">Obtained
                                    Marks:</label>
                                <div class="col-sm-2">
                                    <input type="number" min="0" max="10" class="form-control" id="travel_and_research"
                                           name="travel_and_research"
                                           @if(isset($user_sessional_marks[0]->travel_and_research))
                                           value="{{$user_sessional_marks[0]->travel_and_research}}"
                                           @endif
                                           placeholder="marks" style="border: solid black">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="card-header">
                            <div class="row">
                                <h1> Institutional Engagements </h1>
                            </div>
                        </div>
                        <table class="table">
                            <thead class="thead-dark text-center">
                            <tr>
                                <th colspan="9"><h3>Committee Work</h3></th>
                            </tr>
                            </thead>
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Member Since</th>
                                <th scope="col">Formed By</th>
                                <th scope="col">Position</th>
                                <th scope="col">Type</th>
                                <th scope="col">Chairperson</th>
                                <th scope="col">No Of Meetings</th>
                                <th scope="col">Attended</th>
                                <th scope="col">Contribution</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($committees as $committee)
                                <tr>
                                    <td>{{$committee->name}}</td>
                                    <td>{{$committee->member_since}}</td>
                                    <td>{{$committee->formed_by}}</td>
                                    <td>{{$committee->position}}</td>
                                    <td>{{$committee->type}}</td>
                                    <td>{{$committee->chairperson}}</td>
                                    <td>{{$committee->no_of_meetings}}</td>
                                    <td>{{$committee->attends}}</td>
                                    <td>{{$committee->contribution}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if($role == 'hr')
                            <div class="form-group row" style="font-size: large; margin-top: 10px; margin-bottom: 30px">
                                <label for="inputEmail3" class="offset-6 col-sm-2 col-form-label">Total Marks:
                                    10</label>
                                <label for="inputEmail3" class="col-sm-2 col-form-label" style="margin: 0">Obtained
                                    Marks:</label>
                                <div class="col-sm-2">
                                    <input type="number" min="0" max="10" class="form-control" id="committee"
                                           name="committee"
                                           placeholder="marks"
                                           @if(isset($user_sessional_marks[0]->committee))
                                           value="{{$user_sessional_marks[0]->committee}}"
                                           @endif
                                           style="border: solid black">
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- /.card-body -->
                    @if($role == 'teacher')
                        {{--<form action="{{route('submit.report.hr')}}" method="post">--}}
                        {{--@csrf--}}
                        <div class="card-footer">
                            <button class="btn btn-primary float-right" onclick="submitReportToHr({{$user->id}})">
                                Submit Report to Hr
                            </button>
                        </div>
                        {{--</form>--}}
                    @elseif($role == 'hr')
                        <div class="card-footer">
                            {{--<form action="{{route('hr.save_report.marks',$user->id)}}" method="post">--}}
                            {{--@csrf--}}
                            @if(isset($user_sessional_marks[0]))
                                <button class="btn btn-warning float-right" style="margin-left: 10px"
                                        onclick="hreditmarks({{$user->id}})"> Edit Marks
                                </button>
                            @else
                                <button class="btn btn-warning float-right" style="margin-left: 10px"
                                        onclick="hrsavemarks({{$user->id}})"> Save Marks
                                </button>
                            @endif

                            {{--</form>--}}
                            {{--<form action="{{route('submit.report.dean',$user->id)}}" method="post">--}}
                            {{--@csrf--}}
                            <button class="btn btn-primary float-right" onclick="submitReportToDean({{$user->id}})">
                                Submit Report to Dean
                            </button>
                            {{--</form>--}}
                        </div>
                    @else
                        <form action="{{route('submit.commented.report.hr')}}" method="post">
                            @csrf
                            <div class="card-footer">
                                <button class="btn btn-primary float-right"> Submit Report to Hr</button>
                            </div>
                        </form>
                    @endif
                </div>
            </section>
        </form>
    </div>
@endsection

@section('js')
    <script>
        function submitReportToHr(id) {
            $('#report').submit(function (e) {
                e.preventDefault();
                formdata = new FormData(this);
                $.ajax({
                    url: '{{route('submit.report.hr')}}',
                    method: 'POST',
                    data: formdata,
                    contentType: false,
                    cache: false,
                    processData: false,
                    datatype: 'json',
                    success: function (data) {
                        // alert(data);
                        document.getElementById("report").reset();
                        window.location.href = "{{ route('teacher.dashboard')}}";
                    },
                    error: function (jqxhr, status, exception) {
                        alert('Exception:', jqxhr);
                    }
                });
            })
        }

        function hrsavemarks(u_id) {

            $('#report').submit(function (e) {
                e.preventDefault();
                formdata = new FormData(this);
                formdata.set('user_id', u_id);
                // for (var pair of formdata.entries()) {
                //     console.log(pair[0] + ', ' + pair[1]);
                // }
                $.ajax({
                    url: '{{route('hr.save_report.marks')}}',
                    method: 'POST',
                    data: formdata,
                    contentType: false,
                    cache: false,
                    processData: false,
                    datatype: 'json',
                    success: function (data) {
                        html = '<div class="alert alert-success alert-dismissible fade show" role="alert"> ' +
                            '<strong>' + data.message + '</strong>' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span>' +
                            '</button>' +
                            '</div>';
                        $('#message').html(html);
                        {{--document.getElementById("report").reset();--}}
                        {{--window.location.href = "{{ route('teacher.dashboard')}}";--}}
                    },
                    error: function (jqxhr, status, exception) {
                        alert('Exception:', jqxhr);
                    }
                });
            })
        }

        function hreditmarks(id) {
            $('#report').submit(function (e) {
                e.preventDefault();

                // alert('edit marks');

                formdata = new FormData(this);
                // formdata.set('user_id', u_id);

                // for (var pair of formdata.entries()) {
                //     console.log(pair[0] + ', ' + pair[1]);
                // }

                var u_id = id;
                var url = '{{route('hr.update_report.marks',":u_id")}}';
                url = url.replace(':u_id', u_id);

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formdata,
                    contentType: false,
                    cache: false,
                    processData: false,
                    datatype: 'json',
                    success: function (data) {

                        html = '<div class="alert alert-success alert-dismissible fade show" role="alert"> ' +
                            '<strong>' + data.message + '</strong>' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span>' +
                            '</button>' +
                            '</div>';
                        $('#message').html(html);
                    },
                    error: function (jqxhr, status, exception) {
                        alert('Exception:', jqxhr);
                    }
                });
            })
        }
        function submitReportToDean(id) {
            $('#report').submit(function (e) {
                e.preventDefault();
                formdata = new FormData(this);
                formdata.delete('course_detail');
                formdata.delete('course_assessment');
                formdata.delete('new_course');
                formdata.delete('thesis_supervise');
                formdata.delete('project_supervise');
                formdata.delete('workshop_terminal');
                formdata.delete('batch_advise');
                formdata.delete('travel_and_research');
                formdata.delete('committee');
                // for (var pair of formdata.entries()) {
                //     console.log(pair[0] + ', ' + pair[1]);
                // }
                // console.log(formdata.get('_token'));

                var u_id = id;
                var url = '{{route('submit.report.dean',":u_id")}}';
                url = url.replace(':u_id', u_id);
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formdata,
                    contentType: false,
                    cache: false,
                    processData: false,
                    datatype: 'json',
                    success: function (data) {
                        alert(data.request);
                        // alert(data);
                        // document.getElementById("report").reset();
                        {{--window.location.href = "{{ route('hr.teachers.report')}}";--}}
                    },
                    error: function (jqxhr, status, exception) {
                        alert('Exception:', jqxhr);
                    }
                });
            })
        }
    </script>
@endsection
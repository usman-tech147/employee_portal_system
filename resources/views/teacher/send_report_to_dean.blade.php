@extends('layouts.master')
@section('message')
    <span id="message"></span>
@endsection
@section('heading')
    Employee Final Report
@endsection
@section('content')
    <div class="content">
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
                </div>
                <!-- /.card-body -->
                <form action="{{route('submit.report')}}" method="post">
                    @csrf
                    <div class="card-footer">
                        <button class="btn btn-primary float-right"> Submit Report</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
    </script>
@endsection
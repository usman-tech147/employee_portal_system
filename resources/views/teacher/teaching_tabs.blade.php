@extends('layouts.master')

@section('content')

@section('heading')
    Teaching Tabs
@endsection
<div class="content">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <a href="{{route('course_detail.index')}}" class="nav-link text-secondary">
                        <div class="info-box">
                            @if(count(App\User::find(Auth::user()->id)->course_details) > 0)
                                <span class="info-box-icon bg-warning elevation-1">
                                    <i class="fas fa-check"></i></span>
                            @else
                                <span class="info-box-icon bg-danger elevation-1"><i
                                            class="fas fa-pen"></i></span>
                            @endif
                            <div class="info-box-content">
                                <h5 class="info-box-text"><strong>2.1</strong> COURSE DETAIL</h5>
                                <span class="info-box-number">
                                    @if(count(App\User::find(Auth::user()->id)->course_details) > 0)
                                        <span> <i class="fas fa-edit"></i> View / Update </span>
                                    @else
                                        <span> <i class="far fa-plus-square"></i> create </span>
                                    @endif

                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <a href="#" class="nav-link text-secondary">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-pen"></i></span>
                            <div class="info-box-content">
                                <h5 class="info-box-text"><strong>2.2</strong> TEACHING DETAIL</h5>
                                <span class="info-box-number">
                  <span> <i class="far fa-plus-square"></i> Create </span>
                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <a href="{{route('course_assessments.index')}}" class="nav-link text-secondary">
                        <div class="info-box">
                            @if(count(App\User::find(Auth::user()->id)->course_assessments) > 0)
                                <span class="info-box-icon bg-warning elevation-1">
                                    <i class="fas fa-check"></i></span>
                            @else
                                <span class="info-box-icon bg-danger elevation-1"><i
                                            class="fas fa-pen"></i></span>
                            @endif
                            <div class="info-box-content">
                                <h5 class="info-box-text"><strong>2.1</strong> COURSE ASSESSMENT</h5>
                                <span class="info-box-number">
                                    @if(count(App\User::find(Auth::user()->id)->course_assessments) > 0)
                                        <span> <i class="fas fa-edit"></i> View / Update </span>
                                    @else
                                        <span> <i class="far fa-plus-square"></i> create </span>
                                    @endif

                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>

                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <a href="{{route('new_course.index')}}" class="nav-link text-secondary">
                        <div class="info-box">
                            @if(count(App\User::find(Auth::user()->id)->new_courses) > 0)
                                <span class="info-box-icon bg-warning elevation-1">
                                    <i class="fas fa-check"></i></span>
                            @else
                                <span class="info-box-icon bg-danger elevation-1"><i
                                            class="fas fa-pen"></i></span>
                            @endif
                            <div class="info-box-content">
                                <h5 class="info-box-text"><strong>2.1</strong> NEW COURSE </h5>
                                <span class="info-box-number">
                                    @if(count(App\User::find(Auth::user()->id)->new_courses) > 0)
                                        <span> <i class="fas fa-edit"></i> View / Update </span>
                                    @else
                                        <span> <i class="far fa-plus-square"></i> create </span>
                                    @endif

                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <a href="{{route('thesis_supervised.index')}}" class="nav-link text-secondary">
                        <div class="info-box">
                            @if(count(App\User::find(Auth::user()->id)->thesis_supervises) > 0)
                                <span class="info-box-icon bg-warning elevation-1">
                                    <i class="fas fa-check"></i></span>
                            @else
                                <span class="info-box-icon bg-danger elevation-1"><i
                                            class="fas fa-pen"></i></span>
                            @endif
                            <div class="info-box-content">
                                <h5 class="info-box-text"><strong>2.1</strong> THESIS SUPERVISED </h5>
                                <span class="info-box-number">
                                    @if(count(App\User::find(Auth::user()->id)->thesis_supervises) > 0)
                                        <span> <i class="fas fa-edit"></i> View / Update </span>
                                    @else
                                        <span> <i class="far fa-plus-square"></i> create </span>
                                    @endif

                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                </div>
                {{--<div class="clearfix hidden-md-up"></div>--}}
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <a href="{{route('project_supervision.index')}}" class="nav-link text-secondary">
                        <div class="info-box">
                            @if(count(App\User::find(Auth::user()->id)->project_supervises) > 0)
                                <span class="info-box-icon bg-warning elevation-1">
                                    <i class="fas fa-check"></i></span>
                            @else
                                <span class="info-box-icon bg-danger elevation-1"><i
                                            class="fas fa-pen"></i></span>
                            @endif
                            <div class="info-box-content">
                                <h5 class="info-box-text"><strong>2.1</strong> PROJECT SUPERVISED </h5>
                                <span class="info-box-number">
                                    @if(count(App\User::find(Auth::user()->id)->project_supervises) > 0)
                                        <span> <i class="fas fa-edit"></i> View / Update </span>
                                    @else
                                        <span> <i class="far fa-plus-square"></i> create </span>
                                    @endif

                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <a href="{{route('workshop_terminal.index')}}" class="nav-link text-secondary">
                        <div class="info-box">
                            @if(count(App\User::find(Auth::user()->id)->workshop_terminals) > 0)
                                <span class="info-box-icon bg-warning elevation-1">
                                    <i class="fas fa-check"></i></span>
                            @else
                                <span class="info-box-icon bg-danger elevation-1"><i
                                            class="fas fa-pen"></i></span>
                            @endif
                            <div class="info-box-content">
                                <h5 class="info-box-text"><strong>2.1</strong> WORKSHOP TERMINAL </h5>
                                <span class="info-box-number">
                                    @if(count(App\User::find(Auth::user()->id)->workshop_terminals) > 0)
                                        <span> <i class="fas fa-edit"></i> View / Update </span>
                                    @else
                                        <span> <i class="far fa-plus-square"></i> create </span>
                                    @endif
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <a href="#" class="nav-link text-secondary">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-pen"></i></span>
                            <div class="info-box-content">
                                <h5 class="info-box-text"><strong>2.8</strong> INDUSTRY VISITS</h5>
                                <span class="info-box-number">
                  <span> <i class="far fa-plus-square"></i> Create </span>
                </span>
                            </div>
                        </div>
                    </a>

                </div>

                {{--<div class="clearfix hidden-md-up"></div>--}}
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <a href="#" class="nav-link text-secondary">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-pen"></i></span>
                            <div class="info-box-content">
                                <h5 class="info-box-text"><strong>2.9</strong> GUEST SPEAKERS</h5>
                                <span class="info-box-number">
                  <span> <i class="far fa-plus-square"></i> Create </span>
                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>

                </div>

                <div class="col-lg-4 col-sm-6 col-md-6">
                    <a href="#" class="nav-link text-secondary">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-pen"></i></span>
                            <div class="info-box-content">
                                <h5 class="info-box-text"><strong>2.10</strong> MEMBERSHIP DETAILS</h5>
                                <span class="info-box-number">
                  <span> <i class="far fa-plus-square"></i> Create </span>
                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>

                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <a href="#" class="nav-link text-secondary">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-pen"></i></span>
                            <div class="info-box-content">
                                <h5 class="info-box-text"><strong>2.11</strong> TEACHING ACTIVITIES </h5>
                                <span class="info-box-number">
                  <span> <i class="far fa-plus-square"></i> Create </span>
                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>

                </div>
            </div>
            <!-- /.row -->
        {{--<div class="row">--}}
        {{--<div class="col-lg-4 col-sm-6 col-md-6">--}}
        {{--<a href="#" class="nav-link text-secondary">--}}
        {{--<div class="info-box">--}}
        {{--<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-pen"></i></span>--}}
        {{--<div class="info-box-content">--}}
        {{--<h5 class="info-box-text"><strong>2.4</strong> NEW COURSE</h5>--}}
        {{--<span class="info-box-number">--}}
        {{--<span> <i class="far fa-plus-square"></i> Create </span>--}}
        {{--</span>--}}
        {{--</div>--}}
        {{--<!-- /.info-box-content -->--}}
        {{--</div>--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--<div class="col-lg-4 col-sm-6 col-md-6">--}}
        {{--<a href="#" class="nav-link text-secondary">--}}
        {{--<div class="info-box">--}}
        {{--<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-pen"></i></span>--}}
        {{--<div class="info-box-content">--}}
        {{--<h5 class="info-box-text"><strong>2.5</strong> THESIS SUPERVISED</h5>--}}
        {{--<span class="info-box-number">--}}
        {{--<span> <i class="far fa-plus-square"></i> Create </span>--}}
        {{--</span>--}}
        {{--</div>--}}
        {{--<!-- /.info-box-content -->--}}
        {{--</div>--}}
        {{--</a>--}}

        {{--</div>--}}
        {{--<div class="clearfix hidden-md-up"></div>--}}
        {{--<div class="col-lg-4 col-sm-6 col-md-6">--}}
        {{--<a href="#" class="nav-link text-secondary">--}}
        {{--<div class="info-box">--}}
        {{--<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-pen"></i></span>--}}
        {{--<div class="info-box-content">--}}
        {{--<h5 class="info-box-text"><strong>2.6</strong> PROJECT SUPERVISED</h5>--}}
        {{--<span class="info-box-number">--}}
        {{--<span> <i class="far fa-plus-square"></i> Create </span>--}}
        {{--</span>--}}
        {{--</div>--}}
        {{--<!-- /.info-box-content -->--}}
        {{--</div>--}}
        {{--</a>--}}

        {{--</div>--}}
        {{--</div>--}}
        <!-- /.row -->
        {{--<div class="row">--}}
        {{--<div class="col-lg-4 col-sm-6 col-md-6">--}}
        {{--<a href="#" class="nav-link text-secondary">--}}
        {{--<div class="info-box">--}}
        {{--<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-pen"></i></span>--}}
        {{--<div class="info-box-content">--}}
        {{--<h5 class="info-box-text"><strong>2.7</strong> WORKSHOP TERMINAL </h5>--}}
        {{--<span class="info-box-number">--}}
        {{--<span> <i class="far fa-plus-square"></i> Create </span>--}}
        {{--</span>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</a>--}}

        {{--</div>--}}
        {{--<div class="col-lg-4 col-sm-6 col-md-6">--}}
        {{--<a href="#" class="nav-link text-secondary">--}}
        {{--<div class="info-box">--}}
        {{--<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-pen"></i></span>--}}
        {{--<div class="info-box-content">--}}
        {{--<h5 class="info-box-text"><strong>2.8</strong> INDUSTRY VISITS</h5>--}}
        {{--<span class="info-box-number">--}}
        {{--<span> <i class="far fa-plus-square"></i> Create </span>--}}
        {{--</span>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</a>--}}

        {{--</div>--}}

        {{--<div class="clearfix hidden-md-up"></div>--}}
        {{--<div class="col-lg-4 col-sm-6 col-md-6">--}}
        {{--<a href="#" class="nav-link text-secondary">--}}
        {{--<div class="info-box">--}}
        {{--<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-pen"></i></span>--}}
        {{--<div class="info-box-content">--}}
        {{--<h5 class="info-box-text"><strong>2.9</strong> GUEST SPEAKERS</h5>--}}
        {{--<span class="info-box-number">--}}
        {{--<span> <i class="far fa-plus-square"></i> Create </span>--}}
        {{--</span>--}}
        {{--</div>--}}
        {{--<!-- /.info-box-content -->--}}
        {{--</div>--}}
        {{--</a>--}}

        {{--</div>--}}
        {{--</div>--}}
        <!-- /.row -->
        {{--<div class="row">--}}
        {{--<div class="col-lg-4 col-sm-6 col-md-6">--}}
        {{--<a href="#" class="nav-link text-secondary">--}}
        {{--<div class="info-box">--}}
        {{--<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-pen"></i></span>--}}
        {{--<div class="info-box-content">--}}
        {{--<h5 class="info-box-text"><strong>2.10</strong> MEMBERSHIP DETAILS</h5>--}}
        {{--<span class="info-box-number">--}}
        {{--<span> <i class="far fa-plus-square"></i> Create </span>--}}
        {{--</span>--}}
        {{--</div>--}}
        {{--<!-- /.info-box-content -->--}}
        {{--</div>--}}
        {{--</a>--}}

        {{--</div>--}}
        {{--<div class="col-lg-4 col-sm-6 col-md-6">--}}
        {{--<a href="#" class="nav-link text-secondary">--}}
        {{--<div class="info-box">--}}
        {{--<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-pen"></i></span>--}}
        {{--<div class="info-box-content">--}}
        {{--<h5 class="info-box-text"><strong>2.11</strong> TEACHING ACTIVITIES </h5>--}}
        {{--<span class="info-box-number">--}}
        {{--<span> <i class="far fa-plus-square"></i> Create </span>--}}
        {{--</span>--}}
        {{--</div>--}}
        {{--<!-- /.info-box-content -->--}}
        {{--</div>--}}
        {{--</a>--}}

        {{--</div>--}}
        {{--</div>--}}
        <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>

</div>


@endsection

@section('js')

@endsection

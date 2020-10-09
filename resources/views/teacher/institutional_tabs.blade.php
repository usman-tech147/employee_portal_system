@extends('layouts.master')

@section('content')

@section('heading')
    Institutional Engagements Tabs
@endsection
<div class="content">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6">
                    <a href="{{route('committee.index')}}" class="nav-link text-secondary">
                        <div class="info-box">
                            @if(count(App\User::find(Auth::user()->id)->committees) > 0)
                                <span class="info-box-icon bg-warning elevation-1">
                                    <i class="fas fa-check"></i></span>
                            @else
                                <span class="info-box-icon bg-danger elevation-1"><i
                                            class="fas fa-pen"></i></span>
                            @endif
                            <div class="info-box-content">
                                <h5 class="info-box-text"><strong>5.1</strong> Committee Work</h5>
                                <span class="info-box-number">
                                    @if(count(App\User::find(Auth::user()->id)->committees) > 0)
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
                <div class="col-lg-6 col-sm-6 col-md-6">
                    <a href="#" class="nav-link text-secondary">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-pen"></i></span>
                            <div class="info-box-content">
                                <h5 class="info-box-text"><strong>5.2</strong> ACADEMIC / PROFESSIONAL</h5>
                                <span class="info-box-number">
                  <span> <i class="far fa-plus-square"></i> Create </span>
                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>

                </div>

                <div class="col-lg-6 col-sm-6 col-md-6">
                    <a href="#" class="nav-link text-secondary">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-pen"></i></span>
                            <div class="info-box-content">
                                <h5 class="info-box-text"><strong>5.3</strong> TRAINING TECHNICAL</h5>
                                <span class="info-box-number">
                  <span> <i class="far fa-plus-square"></i> Create </span>
                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>

                </div>
                <div class="col-lg-6 col-sm-6 col-md-6">
                    <a href="#" class="nav-link text-secondary">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-pen"></i></span>
                            <div class="info-box-content">
                                <h5 class="info-box-text"><strong>5.4</strong> IMPROVEMENT / EFFORTS </h5>
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
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>

</div>


@endsection

@section('js')

@endsection

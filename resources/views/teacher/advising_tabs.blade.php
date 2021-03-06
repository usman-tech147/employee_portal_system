@extends('layouts.master')

@section('content')

@section('heading')
    Advising & Counseling Tabs
@endsection
<div class="content">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6">
                    <a href="#" class="nav-link text-secondary">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-pen"></i></span>
                            <div class="info-box-content">
                                <h5 class="info-box-text"><strong>3.1</strong> STUDENT COUNSELING</h5>
                                <span class="info-box-number">
                  <span> <i class="far fa-plus-square"></i> Create </span>
                </span>
                            </div>
                        </div>
                    </a>
                </div>

                {{--<div class="clearfix hidden-md-up"></div>--}}
                <div class="col-lg-6 col-sm-6 col-md-6">
                    <a href="{{route('batch_advising.index')}}" class="nav-link text-secondary">
                        <div class="info-box">
                            @if(count(App\User::find(Auth::user()->id)->batch_advises) > 0)
                                <span class="info-box-icon bg-warning elevation-1">
                                    <i class="fas fa-check"></i></span>
                            @else
                                <span class="info-box-icon bg-danger elevation-1"><i
                                            class="fas fa-pen"></i></span>
                            @endif
                            <div class="info-box-content">
                                <h5 class="info-box-text"><strong>3.2</strong> Batch Advising</h5>
                                <span class="info-box-number">
                                    @if(count(App\User::find(Auth::user()->id)->batch_advises) > 0)
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

                <div class="col-lg-6 col-sm-6 col-md-6">
                    <a href="#" class="nav-link text-secondary">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-pen"></i></span>
                            <div class="info-box-content">
                                <h5 class="info-box-text"><strong>3.3</strong> BATCH MEETING</h5>
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
                                <h5 class="info-box-text"><strong>3.4</strong> COURSE REGISTRATION </h5>
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

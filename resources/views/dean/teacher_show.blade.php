@extends('layouts.master')

@section('content')
    <div class="wrapper">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-11">
                                <h3 class="card-title">
                                    Teachers Detail
                                </h3>
                            </div>
                            <div class="col-1">
                                {{--<a href="{{route('users.create')}}" class="btn btn-primary"> <i class="fas fa-plus"></i>--}}
                                {{--</a>--}}
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{$employee->id}}</td>
                                    <td>{{$employee->first_name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>
                                        @foreach($employee->getRoleNames() as $role)
                                            {{$role}}
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-warning"> View Report </a>
                                        <a href="{{route('dean.return.teacher',$employee->id)}}" class="btn btn-danger"> Send Back </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th> Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>


    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $("#example1").DataTable();
        });
    </script>
@endsection



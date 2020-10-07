@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <form method="post" action="{{route('users.store')}}" role="form">
                    <!-- Default box -->
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User</h3>
                        </div>
                        <div class="card-body">
                            <div class="col-lg-12 col-md-12 col-sm-12 mx-auto">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="course_level">First Name</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name"
                                                   placeholder="First Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="course_level">Last Name</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                   placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="course_level">Email</label>
                                            <input type="text" class="form-control" id="email" name="email"
                                                   placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="gender">Gender</label>
                                            <select id="gender" name="gender" class="form-control">
                                                <option value="default">Choose...</option>
                                                <option value="male"> male</option>
                                                <option value="female"> female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="designation">Designation</label>
                                            <input type="text" class="form-control" id="designation" name="designation"
                                                   placeholder="Designation">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="role">Select Role</label>
                                            <select id="role" name="role" class="form-control">
                                                <option value="default">Choose...</option>
                                                <option value="hr"> hr</option>
                                                <option value="teacher"> teacher</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 ">
                                            <label for="school">School</label>
                                            <select id="school_id" name="school_id" onchange="getDepartments()"
                                                    class="form-control">
                                                <option value="default">Choose...</option>
                                                @foreach($schools as $school)
                                                    <option value="{{$school->id}}"> {{$school->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="department">Department</label>
                                            <div id="departments">
                                                <select id="department_id" name="department_id" class="form-control">
                                                    <option value="default">Choose...</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="cpassword"> Confirm Password </label>
                                            <input type="password" class="form-control" id="cpassword"
                                                   name="password_confirmation"
                                                   placeholder="Confirm Password">
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <div class="col-lg-12 col-md-12 col-sm-12 mx-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('users.index')}}" class="btn btn-warning"> Back </a>
                            </div>
                        </div>

                    </div>
                    <!-- /.card -->
                </form>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                @if(count($errors) > 0)
                    <div class="card">
                        <div class="card-header bg-danger">
                            <strong> Errors! </strong>
                        </div>
                        <div class="card-body text-danger">
                            @foreach($errors->all() as $error)
                                <p> {{$error}} </p>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
@section('js')
    <script>
        function getDepartments() {
            var id = $('#school_id').val();
            var url = '{{route('user.departments',":id")}}';
            url = url.replace(':id', id);
            $.ajax({
                method: 'get',
                url: url,
                datatype: 'json',
                success: function (data) {
                    $('#departments').html('<select name="department_id" id="department_id"               class="form-control">\n' +
                        '                                <option value="default"> Choose...</option>\n' +
                        '                                ' + data.data + ' \n' +
                        '                            </select>');
                }
            });
        }

        // $(document).ready(function () {
        //
        // });
    </script>
@endsection
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true" id="user_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="userForm" data-toggle="validator">
                    @csrf {{ method_field('POST')}}
                    <div class="form-row child">
                        <div class="form-group col-md-6 g_child">
                            <label for="first name">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                   placeholder="First Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last name">Last Name</label>
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
                        <div class="form-group col-md-6" id="ass">
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
                        <div class="form-group col-md-6" id="ass">
                            <label for="role">Select Role</label>
                            <select id="role" name="role" class="form-control">
                                <option value="default">Choose...</option>
                                <option value="hr"> hr</option>
                                <option value="teacher"> teacher</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="school">School</label>
                            <select id="school_id" name="school_id" class="form-control" onchange="getSchoolDepratments()">
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="school">Department</label>
                            <select id="department_id" name="department_id" class="form-control">
                                <option value="default">Choose</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Password">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cpassword"> Confirm Password </label>
                            <input type="password" class="form-control" id="cpassword"
                                   name="password_confirmation"
                                   placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="hidden_id" id="hidden_id"/>
                        <button type="submit" id="action_btn" class="action btn btn-primary"></button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
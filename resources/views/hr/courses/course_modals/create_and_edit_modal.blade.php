<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true" id="course_assessment_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Course Assessment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="course_assessment_form" data-toggle="validator">
                    @csrf {{ method_field('POST')}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="course_level">Course Level</label>
                            <select id="course_level" name="course_level" class="form-control">
                                <option value="default">Choose...</option>
                                <option value="level 1"> level 1</option>
                                <option value="level 2"> level 2</option>
                                <option value="level 3"> level 3</option>
                                <option value="level 4"> level 4</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="program">Program</label>
                            <select id="program" name="program" class="form-control">
                                <option value="default">Choose...</option>
                                <option value="program 1"> program 1</option>
                                <option value="program 2"> program 2</option>
                                <option value="program 3"> program 3</option>
                                <option value="program 4"> program 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="course_title">Course Title</label>
                            <select id="course_title" name="course_title" class="form-control">
                                <option value="default">Choose...</option>
                                <option value="title 1"> title 1</option>
                                <option value="title 2"> title 2</option>
                                <option value="title 3"> title 3</option>
                                <option value="title 4"> title 4</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="course_code">Course Code</label>
                            <select id="course_code" name="course_code" class="form-control">
                                <option value="default">Choose...</option>
                                <option value="code 1"> code 1</option>
                                <option value="code 2"> code 2</option>
                                <option value="code 3"> code 3</option>
                                <option value="code 4"> code 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="semester">Semester</label>
                            <select id="semester" name="semester" class="form-control">
                                <option value="default">Choose...</option>
                                <option value="semester 1"> semester 1</option>
                                <option value="semester 2"> semester 2</option>
                                <option value="semester 3"> semester 3</option>
                                <option value="semester 4"> semester 4</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="result">Final Result Submission</label>
                            <select id="final_result_submission" name="final_result_submission" class="form-control">
                                <option value="default">Choose...</option>
                                <option value="On Time"> On Time</option>
                                <option value="Late"> Late</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="moodle usage">Moodle Usage Status</label>
                            <input type="text" class="form-control" id="moodle_usage_status" name="moodle_usage_status"
                                   placeholder="Moodle Usage Status">
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
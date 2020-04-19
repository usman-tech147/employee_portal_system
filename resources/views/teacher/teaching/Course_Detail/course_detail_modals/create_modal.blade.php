<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true" id="course_detail_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Course Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="course_detail_form" data-toggle="validator">
                    @csrf {{ method_field('POST')}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="course_level">Course Level</label>
                            <select id="course_level" name="course_level" class="form-control" onchange="getPrograms()">
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="program">Program</label>
                            <select id="program" name="program" class="form-control" onchange="getCourses()">
                                <option value="default">Choose...</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="course_title">Course Title</label>
                            <select id="course_title" name="course_title" class="form-control"
                                    onchange="getCourseCode()">
                                <option value="default">Choose...</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6" id="ass">
                            <label for="course_code">Course Code</label>
                            <input type="text" class="form-control" id="course_code" name="course_code"
                                   placeholder="Course Code" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="semester">Semester</label>
                            <select id="semester" name="semester" class="form-control">
                                <option value="default">Choose...</option>
                                <option value="spring"> Spring </option>
                                <option value="fall"> Fall </option>
                            </select>
                        </div>
                        <div class="form-group col-md-6" id="ass">
                            <label for="assessments">No Of Assessments</label>
                            <input type="number" class="form-control" id="assessments" name="assessments"
                                   placeholder="no of assessments">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="makeup_classes">% of Makeup Classes</label>
                            <input type="number" class="form-control" id="makeup_classes" name="makeup_classes"
                                   placeholder="Makeup Classes">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="student_feedback">Student Feedback</label>
                            <input type="number" class="form-control" id="student_feedback" name="student_feedback"
                                   placeholder="Student Feedback">
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
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true" id="new_course_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">New Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="new_course_form" data-toggle="validator">
                    @csrf {{ method_field('POST')}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="course_title">Course Title</label>
                            <input type="text" class="form-control" id="course_title" name="course_title"
                                   placeholder="Course Title">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="course_code">Course Code</label>
                            <input type="text" class="form-control" id="course_code" name="course_code"
                                   placeholder="Course Code">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="program">Program</label>
                            <input type="text" class="form-control" id="program" name="program"
                                   placeholder="Program">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control">
                                <option value="default">Choose...</option>
                                <option value="Completed"> Completed </option>
                                <option value="In Progress"> In Progress </option>
                            </select>
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
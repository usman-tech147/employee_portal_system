<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true" id="course_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="course_form" data-toggle="validator">
                    @csrf {{ method_field('POST')}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="course_level">Course Name</label>
                            <input type="text" class="form-control" id="course_name" name="course_name"
                                   placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="program">Course Code</label>
                            <input type="text" class="form-control" id="course_code" name="course_code"
                                   placeholder="Code">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="program">Program</label>
                            <select id="program" name="program" class="form-control">
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
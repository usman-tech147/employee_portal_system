<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true" id="project_supervised_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Project Supervised</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="project_supervised_form" data-toggle="validator">
                    @csrf {{ method_field('POST')}}
                    <div class="form-row">
                        <div class="form-group col-md-6" id="ass">
                            <label for="thesis_title">Project Title</label>
                            <input type="text" class="form-control" id="project_title" name="project_title"
                                   placeholder="Project Title">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="course_level">Course Level</label>
                            <select id="course_level" name="course_level" class="form-control" onchange="getPrograms()">
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="program">Program</label>
                            <select id="program" name="program" class="form-control">
                                <option value="default">Choose...</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="no_of_students">No Of Students</label>
                            <input type="number" class="form-control" id="no_of_students" name="no_of_students"
                                   placeholder="No Of Students">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="orgnization_name">Orgnization Name</label>
                            <input type="text" class="form-control" id="organization_name" name="organization_name"
                                   placeholder="Orgnization Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="project_type">Project Type</label>
                            <input type="text" class="form-control" id="project_type" name="project_type"
                                   placeholder="Project Type">
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
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true" id="batch_advising_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Batch Advising</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="batch_advising_form" data-toggle="validator">
                    @csrf {{ method_field('POST')}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="program">Program</label>
                            <select id="program" name="program" class="form-control">
                                <option value="default">Choose...</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="batch">Batch</label>
                            <select id="batch" name="batch" class="form-control">
                                <option value="default">Choose...</option>
                                <option value="batch 1">batch 1</option>
                                <option value="batch 2">batch 2</option>
                                <option value="batch 3">batch 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="start_date">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date"
                                   placeholder="mm/dd/yyyy">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="end_date">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date"
                                   placeholder="mm/dd/yyyy">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="students">No Of Students</label>
                            <input type="text" class="form-control" id="no_of_students" name="no_of_students"
                                   placeholder="No Of Students">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="meeting_held_on">Meeting Held On</label>
                            <select id="meeting_held_on" name="meeting_held_on" class="form-control">
                                <option value="default">Choose...</option>
                                <option value="Orientation">Orientation</option>
                                <option value="Mid Semester">Mid Semester</option>
                                <option value="Semester End">Semester End</option>
                                <option value="Results">Results</option>
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
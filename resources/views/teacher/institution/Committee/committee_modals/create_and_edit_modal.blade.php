<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true" id="committee_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="committee_form" data-toggle="validator">
                    @csrf {{ method_field('POST')}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="committee name">Committee Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Committee Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="member_since">Member Since</label>
                            <input type="text" class="form-control" id="member_since" name="member_since" placeholder="Member Since">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="formed_by">Formed By</label>
                            <input type="text" class="form-control" id="formed_by" name="formed_by" placeholder="Formed By">
                        </div>
                        <div class="form-group col-md-6" id="ass">
                            <label for="position">Position</label>
                            <input type="text" class="form-control" id="position" name="position" placeholder="Position">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="type">Committee Type</label>
                            <input type="text" class="form-control" id="type" name="type" placeholder="Committee Type">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="chairperson">Chairperson</label>
                            <input type="text" class="form-control" id="chairperson" name="chairperson" placeholder="Chairperson">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="no_of_meetings">No of Meetings</label>
                            <input type="number" class="form-control" id="no_of_meetings" name="no_of_meetings" placeholder="No of Meetings">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="attends">Attended</label>
                            <input type="number" class="form-control" id="attends" name="attends" placeholder="Attended">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="contribution">Contribution</label>
                            <input type="number" class="form-control" id="contribution" name="contribution" placeholder="Contribution">
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
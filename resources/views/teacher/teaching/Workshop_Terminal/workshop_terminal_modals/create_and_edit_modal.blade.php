<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true" id="workshop_terminal_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Workshop Terminal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="workshop_terminal_form" data-toggle="validator">
                    @csrf {{ method_field('POST')}}
                    <div class="form-row">
                        <div class="form-group col-md-6" id="ass">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                   placeholder="Title">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="type">Type</label>
                            <select id="type" name="type" class="form-control">
                                <option value="default">Choose...</option>
                                <option value="type a"> type a </option>
                                <option value="type b"> type b </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="month">Month</label>
                            <input type="text" class="form-control" id="month" name="month"
                                   placeholder="Month">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="organization">Organization Or Place</label>
                            <input type="text" class="form-control" id="organization" name="organization"
                                   placeholder="Organization">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sponsoring_body">Sponsoring Body</label>
                            <input type="text" class="form-control" id="sponsoring_body" name="sponsoring_body"
                                   placeholder="Sponsoring Body">
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
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true" id="travel_and_research_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Travel / Research</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="travel_and_research_form" data-toggle="validator">
                    @csrf {{ method_field('POST')}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="research_type">Research Type</label>
                            <select id="research_type" name="research_type" class="form-control">
                                <option value="default">Choose...</option>
                                <option value="type 1">type 1</option>
                                <option value="type 2">type 2</option>
                                <option value="type 3">type 3</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="funding_agency">Funding Agency</label>
                            <input type="text" class="form-control" id="funding_agency" name="funding_agency"
                                   placeholder="Funding Agency">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="venue">Venue</label>
                            <input type="text" class="form-control" id="venue" name="venue"
                                   placeholder="Venue">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="total_grants">Total Grants</label>
                            <input type="number" class="form-control" id="total_grants" name="total_grants"
                                   placeholder="Total Grants">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="approval">Approval</label>
                            <input type="date" class="form-control" id="approval" name="approval"
                                   placeholder="mm/dd/yyyy">
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
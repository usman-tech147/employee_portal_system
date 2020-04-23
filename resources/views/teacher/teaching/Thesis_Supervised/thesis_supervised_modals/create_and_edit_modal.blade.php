<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true" id="thesis_supervised_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Thesis Supervised</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="thesis_supervised_form" data-toggle="validator">
                    @csrf {{ method_field('POST')}}
                    <div class="form-row">
                        <div class="form-group col-md-6" id="ass">
                            <label for="thesis_title">Thesis Title</label>
                            <input type="text" class="form-control" id="thesis_title" name="thesis_title"
                                   placeholder="Thesis Title">
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

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="superviser a">Supervisor Type A</label>
                            <select id="superviser_type_a" name="superviser_type_a" class="form-control">
                                <option value="default">Choose...</option>
                                <option value="type a"> type a </option>
                                <option value="type b"> type b </option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="superviser b">Supervisor Type B</label>
                            <select id="superviser_type_b" name="superviser_type_b" class="form-control">
                                <option value="default">Choose...</option>
                                <option value="type a"> type a </option>
                                <option value="type b"> type b </option>
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
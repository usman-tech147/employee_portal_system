<div class="modal fade" id="confirmModel" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Delete Batch Advising Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure. you want to remove this data...</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="ok_button" onclick="deleteData()" class="btn btn-danger">Ok</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <input type="hidden" id="del" value="">
            </div>
        </div>
    </div>
</div>
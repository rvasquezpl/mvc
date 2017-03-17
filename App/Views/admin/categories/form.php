<div class="modal fade" id="add-category-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New User</h4>
            </div>
            <div class="modal-body">
                <form action="<?= $action; ?>" class="form-modal">
                    <div class="form-group col-sm-6">
                        <label for="category-name">Category name</label>
                        <input type="text" class="form-control" name="name" id="category-name" placeholder="Sport, Tech...">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="enabled">Enabled </option>
                            <option value="disabled">Disabled</option>
                        </select>
                    </div>


                    <button type="button" class="btn btn-info submit-btn">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
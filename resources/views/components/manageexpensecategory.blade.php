<form id="manage-expensecategory-form" class="form-horizontal" role="form">
    <div class="modal fade" id="manageexpensecategory" tabindex="-1" role="manageexpensecategory" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 id="manage-expensecategory-title" class="modal-title">Expense Category</h4>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="manage_expensecategory_id" id="manage-expensecategory-id">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Display Name</label>
                            <div class="col-md-9">
                                <input type="text" id="manage-expensecategory-name" name="manage_expensecategory_name" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Description</label>
                            <div class="col-md-9">
                                <input type="text" id="manage-expensecategory-desc" name="manage_expensecategory_desc" class="form-control" placeholder="" required>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" onclick="remove();" class="btn red btn-outline pull-left" id="manage-expensecategory-delete">Delete</button>
                    <button type="button" onclick="clear();" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn green">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
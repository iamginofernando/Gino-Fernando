<form id="manage-role-form" class="form-horizontal" role="form">
    <div class="modal fade" id="managerole" tabindex="-1" role="manageusmanageroleer" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 id="manage-role-title" class="modal-title">Role</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="manage_role_id" id="manage-role-id">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Display Name</label>
                            <div class="col-md-9">
                                <input type="text" id="manage-role-name" name="manage_role_name" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Description</label>
                            <div class="col-md-9">
                                <input type="text" id="manage-role-desc" name="manage_role_desc" class="form-control" placeholder="" required>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" onclick="remove();" class="btn red btn-outline pull-left" id="manage-role-delete">Delete</button>
                    <button type="button" onclick="clear();" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
                    <button type="submit"  class="btn green">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
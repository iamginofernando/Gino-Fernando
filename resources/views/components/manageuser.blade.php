<form id="manage-user-form" class="form-horizontal" role="form">
    <div class="modal fade" id="manageuser" tabindex="-1" role="manageuser" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 id="manage-user-title" class="modal-title">Edit User</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="manage_user_id" id="manage-user-id">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Name</label>
                            <div class="col-md-9">
                                <input type="text" id="manage-user-name" name="manage_user_name" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Email</label>
                            <div class="col-md-9">
                                <input type="email" id="manage-user-email" name="manage_user_email" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Role</label>
                            <div class="col-md-9">
                                <select class="form-control" id="manage-user-role" name="manage_user_role" required>
                                    <option value="1">Administrator</option>
                                    <option value="2">User</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="remove();" class="btn red btn-outline pull-left" id="manage-user-delete">Delete</button>
                    <button type="button" onclick="clear();" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn green">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
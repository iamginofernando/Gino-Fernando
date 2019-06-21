<form id="manage-expense-form" class="form-horizontal" role="form">
    <div class="modal fade" id="manageexpense" tabindex="-1" role="manageexpense" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 id="manage-expense-title" class="modal-title">Edit Expense</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="manage_expense_id" id="manage-expense-id">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Expense Category</label>
                            <div class="col-md-9">
                                <select class="form-control" id="manage-expense-category" name="manage_expense_category" required>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Amount</label>
                            <div class="col-md-9">
                                <input type="number" id="manage-expense-amount" name="manage_expense_amount" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Description</label>
                            <div class="col-md-9">
                                <input type="text" id="manage-expense-description" name="manage_expense_description" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Entry Date</label>
                            <div class="col-md-9">
                                <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                    <input id="manage-expense-entry" name="manage_expense_entry" type="text" class="form-control" readonly required>
                                    <span class="input-group-btn">
                                        <button class="btn default" type="button">
                                            <i class="fa fa-calendar"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="remove();" class="btn red btn-outline pull-left" id="manage-expense-delete">Delete</button>
                    <button type="button" onclick="clear();" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn green">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
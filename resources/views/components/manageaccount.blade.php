<div class="modal fade" id="manageaccount" tabindex="-1" role="manageaccount" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 id="manage-account-title" class="modal-title">Edit Account Info</h4>
            </div>
            <div class="modal-body">
                <form id="manage-account-form" action="{{route('updateaccount')}}" class="form-horizontal" role="form" method="post">
                    @csrf
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Full Name</label>
                            <div class="col-md-8">
                                <input type="text" id="manage-account-name" name="manage_account_name" class="form-control" placeholder="" value="{{Auth::user()->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Email</label>
                            <div class="col-md-8">
                                <input type="text" id="manage-account-email" name="manage_account_email" class="form-control" placeholder="" value="{{Auth::user()->email}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-8" style="text-align:right">
                                <button type="button" class="btn btn-primary" onclick="changepass();" id="change-pass-button">Change Password</button>
                            </div>
                        </div>
                        <div id="change-password" style="display:none">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Password</label>
                                <div class="col-md-8">
                                    <input type="password" id="manage-account-password" name="manage_account_password" class="form-control" placeholder="" minlength="8">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Confirm Password</label>
                                <div class="col-md-8">
                                    <input type="password" id="manage-account-cpassword" name="manage_account_cpassword" class="form-control" placeholder="" minlength="8">
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
                <button type="button" onclick="saveAccount();" class="btn green">Save</button>
            </div>
        </div>
    </div>
</div>
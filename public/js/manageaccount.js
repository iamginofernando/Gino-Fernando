function showSuccess(message) {
	toastr.success(message);
}

function showInfo(message) {
	toastr.info(message);
}

function showWarning(message) {
	toastr.warning(message);
}

function showError(message) {
	toastr.error(message);
}

function changepass() {
	$('#change-password').show();
	$('#change-pass-button').hide();
}

function saveAccount() {
	var password = $('#manage-account-password').val();
	var cpassword = $('#manage-account-cpassword').val();

	if (password != cpassword) {
		showError('Password do not match.');
		return false;
	}

	$('#manage-account-form').submit();


}

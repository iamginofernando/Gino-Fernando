// Clear
function clear() {
	$('#manage-user-id').val(BLANK);
	$('#manage-user-name').val(BLANK);
	$('#manage-user-email').val(BLANK);
	$('#manage-user-role').val(1);
	$('#manage-user-delete').hide();
}

// Show user
function show() {

	// Retrieve user list
	$.ajax({
		url: SITE_BASE + '/api/user',
		method: 'get'
	}).done(function (res) {
		var users = res.users;
		var roles = res.roles;
		var result = '';
		$.each(users, function (index, user) {
			result += `<tr ondblclick="edit(${user.user_id});">
													<td>${user.name}</td>
													<td>${user.email}</td>
													<td>${user.get_user_role.display_name}</td>
													<td>${user.created_at}</td>
											</tr>`
		});
		$('#user_list').empty();
		$('#user_list').append(result);
		var result = '';
		$.each(roles, function (index, role) {
			result += `<option value=${role.role_id}>${role.display_name}</td>`
		});
		$('#manage-user-role').empty();
		$('#manage-user-role').append(result);
	});
};

function add() {
	clear();
	$('#manage-user-title').text('Add User');
	$('#manageuser').modal('toggle');
}

//Save and Update user
$('#manage-user-form').on('submit', function (e) {
	e.preventDefault();
	var url = '/api/user';
	var method = 'post';

	if ($("#manage-user-id").val()) {
		var user_id = $("input#manage-user-id").val();
		url = '/api/user/' + user_id;
		method = 'put';
	}

	if($('#manage-user-name').val() == '' || $('#manage-user-email').val() == '' || $('#manage-user-role').val() == '') {
		showWarning('Please input necessary details.');
		return false;
	}

	var form_data = $(this).serialize();

	$.ajax({
		url: SITE_BASE + url,
		method: method,
		data: form_data
	}).done(function (res) {
		if (!res.status) {
			showError(res.message);
			return false;
		}
		show();
		showSuccess('Changes successfully saved!');
		$('#manageuser').modal('toggle');
	});
});


// Edit user
function edit(id) {
	// Populate user details
	$.ajax({
		url: SITE_BASE + '/api/user/' + id + '/edit',
		method: 'get'
	}).done(function (res) {
		user = res.user
		if (user) {
			// Pass value to input fields
			$('#manage-user-id').val(user.user_id);
			$('#manage-user-name').val(user.name);
			$('#manage-user-email').val(user.email);
			$('#manage-user-role').val(user.role_id);
			$('#manage-user-title').text('Edit User');

			$('#manageuser').modal('toggle');
			$('#manage-user-delete').show();
		}
	});
};

// Delete user
function remove() {
	var user_id = $("input#manage-user-id").val();
	// Delete user
	$.ajax({
		url: SITE_BASE + '/api/user/' + user_id,
		method: 'delete'
	}).done(function (res) {
		show();
		if (!res.status) {
			showError(res.message);
			return false;
		}
		showSuccess('Successfully deleted record!');
		$('#manageuser').modal('toggle');
	});
};


$(document).ready(function () {
	show();
})
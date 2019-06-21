// Clear
function clear() {
	$('#manage-role-id').val(BLANK);
	$('#manage-role-name').val(BLANK);
	$('#manage-role-desc').val(BLANK);
	$('#manage-role-delete').hide();
}

// Show role
function show() {
	// Retrieve role list
	$.ajax({
		url: SITE_BASE + '/api/role',
		method: 'get'
	}).done(function (res) {

		var roles = res.roles;
		var result = '';
		$.each(roles, function (index, role) {
			result += `<tr ondblclick="edit(${role.role_id});">
													<td>${role.display_name}</td>
													<td>${role.description}</td>
													<td>${role.created_at}</td>
											</tr>`
		});
		$('#role_list').empty();
		$('#role_list').append(result);
	});
};

function add() {
	clear();
	$('#manage-role-title').text('Add Role');
	$('#managerole').modal('toggle');
}

//Save and Update role
$('#manage-role-form').on('submit', function (e) {
	e.preventDefault();
	var url = '/api/role';
	var method = 'post';

	if ($("#manage-role-id").val()) {
		var role_id = $("input#manage-role-id").val();
		url = '/api/role/' + role_id;
		method = 'put';
	}
	
	if($('#manage-role-name').val() == '' || $('#manage-role-name').val() == '') {
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
		$('#managerole').modal('toggle');
	});
});


// Edit role
function edit(id) {
	// Populate role details
	$.ajax({
		url: SITE_BASE + '/api/role/' + id + '/edit',
		method: 'get'
	}).done(function (res) {
		role = res.role
		if (role) {
			// Pass value to input fields
			$('#manage-role-id').val(role.role_id);
			$('#manage-role-name').val(role.display_name);
			$('#manage-role-desc').val(role.description);
			$('#manage-role-title').text('Edit Role');

			$('#managerole').modal('toggle');
			$('#manage-role-delete').show();
		}
	});
};

// Delete role
function remove() {
	var role_id = $("input#manage-role-id").val();
	// Delete role
	$.ajax({
		url: SITE_BASE + '/api/role/' + role_id,
		method: 'delete'
	}).done(function (res) {
		console.log(res);
		if (!res.status) {
			showError(res.message);
			return false;
		}
		show();
		showSuccess('Successfully deleted record!');
		$('#managerole').modal('toggle');
	});
};


$(document).ready(function () {
	show();
})
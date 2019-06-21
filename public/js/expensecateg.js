// Clear
function clear() {
	$('#manage-expensecategory-id').val(BLANK);
	$('#manage-expensecategory-name').val(BLANK);
    $('#manage-expensecategory-desc').val(BLANK);
    $('#manage-expensecategory-delete').hide();
}

// Show expensecategory
function show() {
	// Retrieve expensecategory list
	$.ajax({
		url: SITE_BASE + '/api/expensecategory',
		method: 'get'
	}).done(function (res) {

		var expensecategories = res.expensecategories;
		var result = '';
		if(expensecategories.length > 0) {
			$.each(expensecategories, function (index, expensecategory) {
				result += `<tr ondblclick="edit(${expensecategory.expense_categ_id});">
								<td>${expensecategory.display_name}</td>
								<td>${expensecategory.description}</td>
								<td>${expensecategory.created_at}</td>
							</tr>`;
			});
		
		} else {
			result += 	`<tr>
							<td colspan="3" style="text-align:center"><p>No records found. <a onclick="add();"> Add new record </a></p></td>
						</tr>`;
		}

		$('#expensecategory_list').empty();
		$('#expensecategory_list').append(result);
		
	});
};

function add() {
	clear();
	$('#manage-expensecategory-title').text('Add Category');
	$('#manageexpensecategory').modal('toggle');
}

//Save and Update expensecategory
$('#manage-expensecategory-form').on('submit', function (e) {
	e.preventDefault();
	var url = '/api/expensecategory';
	var method = 'post';

	if ($("#manage-expensecategory-id").val()) {
		var expensecategory_id = $("input#manage-expensecategory-id").val();
		url = '/api/expensecategory/' + expensecategory_id;
		method = 'put';
    }
    
    if($('#manage-expensecategory-name').val() == '' || $('#manage-expensecategory-desc').val() == '') {
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
		$('#manageexpensecategory').modal('toggle');
	});
});


// Edit expensecategory
function edit(id) {
	// Populate expensecategory details
	$.ajax({
		url: SITE_BASE + '/api/expensecategory/' + id + '/edit',
		method: 'get'
	}).done(function (res) {
		expensecategory = res.expensecategory
		if (expensecategory) {
			// Pass value to input fields
			$('#manage-expensecategory-id').val(expensecategory.expense_categ_id);
			$('#manage-expensecategory-name').val(expensecategory.display_name);
			$('#manage-expensecategory-desc').val(expensecategory.description);
			$('#manage-expensecategory-title').text('Edit Category');

            $('#manageexpensecategory').modal('toggle');
            $('#manage-expensecategory-delete').show();
		}
	});
};

// Delete expensecategory
function remove() {
	var expensecategory_id = $("input#manage-expensecategory-id").val();
	// Delete expensecategory
	$.ajax({
		url: SITE_BASE + '/api/expensecategory/' + expensecategory_id,
		method: 'delete'
	}).done(function (res) {
		if (!res.status) {
			showError(res.message);
            return false;
		}
        show();
        showSuccess('Successfully deleted record!');
		$('#manageexpensecategory').modal('toggle');
	});
};


$(document).ready(function () {
	show();
})
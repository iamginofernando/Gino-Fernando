// Clear
function clear() {
	$('#manage-expense-id').val(BLANK);
    $('#manage-expense-category').val(1);
    $('#manage-expense-description').val(BLANK);
	$('#manage-expense-amount').val(BLANK);
    $('#manage-expense-entry').val(BLANK);
    $('#manage-expense-delete').hide();
}

// Show expense
function show() {

	// Retrieve expense expense
	$.ajax({
		url: SITE_BASE + '/api/expense',
		method: 'get'
	}).done(function (res) {
		var expenses = res.expenses;
		var expensecategories = res.expensecategories;
        var result = '';
        if(expenses.length > 0) {
            $.each(expenses, function (index, expense) {
                result +=   `<tr ondblclick="edit(${expense.expense_id});">
                                <td>${expense.get_category.display_name}</td>
                                <td>${expense.description}</td>
                                <td>$${expense.amount}</td>
                                <td>${expense.entry_date}</td>
                                <td>${expense.created_at}</td>
                            </tr>`
            });
        } else {
			result += 	`<tr>
							<td colspan="5" style="text-align:center"><p>No records found. <a onclick="add();"> Add new record </a></p></td>
						</tr>`;
        }

        $('#expense_list').empty();
        $('#expense_list').append(result);

        result = '';
        $.each(expensecategories, function (index, expensecategory) {
            result += `<option value=${expensecategory.expense_categ_id}>${expensecategory.display_name}</td>`
        });
        $('#manage-expense-category').empty();
        $('#manage-expense-category').append(result);
		
	});
};

function add() {
	clear();
	$('#manage-expense-title').text('Add Expense');
	$('#manageexpense').modal('toggle');
}


//Save and Update user
$('#manage-expense-form').on('submit', function (e) {
	e.preventDefault();
	var url = '/api/expense';
	var method = 'post';

	if ($("#manage-expense-id").val()) {
		var expense_id = $("input#manage-expense-id").val();
		url = '/api/expense/' + expense_id;
		method = 'put';
    }
    
    if($('#manage-expense-category').val() == '' || $('#manage-expense-description').val() == '' || $('#manage-expense-amount').val() == '' || $('#manage-expense-entry').val() == '') {
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
		$('#manageexpense').modal('toggle');
	});
});


// Edit expense
function edit(id) {
	// Populate expense details
	$.ajax({
		url: SITE_BASE + '/api/expense/' + id + '/edit',
		method: 'get'
	}).done(function (res) {
		expense = res.expense
		if (expense) {
			// Pass value to input fields
			$('#manage-expense-id').val(expense.expense_id);
            $('#manage-expense-category').val(expense.expense_categ_id);
            $('#manage-expense-description').val(expense.description);
			$('#manage-expense-amount').val(expense.amount);
			$('#manage-expense-entry').val(expense.entry_date);
			$('#manage-expense-title').text('Edit Expense');

            $('#manageexpense').modal('toggle');
            $('#manage-expense-delete').show();
		}
	});
};

// Delete expense
function remove() {
	var expense_id = $("input#manage-expense-id").val();
	// Delete user
	$.ajax({
		url: SITE_BASE + '/api/expense/' + expense_id,
		method: 'delete'
	}).done(function (res) {
        show();
        showSuccess('Successfully deleted record!');
		$('#manageexpense').modal('toggle');
	});
};


$(document).ready(function () {
	show();
})
var data = [];

// Show expense
function show() {


	// Retrieve expense list
	$.ajax({
		url: SITE_BASE + '/api/dashboard',
		method: 'get'
	}).done(function (res) {

		var expenses = res.expenses;
		var result = '';
		$.each(expenses, function (index, expense) {
			console.log(expense.display_name);
			result += `<tr>
							<td>${expense.display_name}</td>
							<td>$${expense.amount}</td>
						</tr>`

		data.push({
			'expense': expense.display_name,
			'amount': expense.amount
			});
		});
		ChartsAmcharts.init(data); 
		$('#dashboard-expense-list').empty();
		$('#dashboard-expense-list').append(result);
	});
};


var ChartsAmcharts = function() {

    var initChartSample6 = function(data) {
        var chart = AmCharts.makeChart("chart_6", {
            "type": "pie",
            "theme": "light",

            "fontFamily": 'Open Sans',
            
            "color":    '#888',

            "dataProvider": data,
            "valueField": "amount",
            "titleField": "expense",
            "exportConfig": {
                menuItems: [{
                    icon: App.getGlobalPluginsPath() + "amcharts/amcharts/images/export.png",
                    format: 'png'
                }]
            }
        });

        $('#chart_6').closest('.portlet').find('.fullscreen').click(function() {
            chart.invalidateSize();
        });
    }

    return {
        //main function to initiate the module

        init: function(data) {
            initChartSample6(data);
        }

    };

}();

$(document).ready(function () {
	show();
})
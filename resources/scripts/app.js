$(document).ready(function(){
	$.ajax({
		url: "http://ico2investmerge.test/include/chart.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var dates = [];
			var profit = [];

			for(var i in data) {
				dates.push(data[i].dates);
				profit.push(data[i].profit);
			}

			var chartdata = {
				labels: dates,
				datasets : [
					{
						label: 'ICO PRICE $',
						backgroundColor: '#2496d8d4',
						borderColor: '#2698d3',
						hoverBackgroundColor: 'yellow',
						hoverBorderColor: 'yellow',
						data: profit
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});
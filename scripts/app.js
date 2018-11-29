$(document).ready(function(){
	$.ajax({
		url: "http://ico2invest.test/templates/chart.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var dates = [];
			var wallet = [];

			for(var i in data) {
				dates.push(data[i].dates);
				wallet.push(data[i].wallet);
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
						data: wallet
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
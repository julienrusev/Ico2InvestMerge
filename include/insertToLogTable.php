<?php
	include 'config.php';
	$date=date("d-m-Y");

	$sql = "SELECT PROFIT FROM ico_data WHERE ID=1";
	$result = $conn->query($sql);
	$profit = array();

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$profit[] = $row;
		}
	} 

	$myProfit = $profit[0]['PROFIT'];

	$sql = "INSERT INTO ico_historical_data(dates, profit) VALUES('$date', '$myProfit')";

	if(!mysqli_query($conn,$sql))
	{
	    die('Error : ' . mysqli_error($conn));
	}
	else{}
	
?>
<?php 
	/*include 'config.php';*/
	include 'getApiData.php';

	$description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
	$short_description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";

	foreach($response["data"] as $row){
		$sql = "INSERT INTO ico_data(API_ID, NAME, ICO_SLUG,ICO_QTY, START_DATE, END_DATE, ICO_PRICE, CURRENT_PRICE, DESCRIPTION, SHORT_DESCRIPTION, ICO_STATUS) VALUES('".$row['id']."', '".$row['name']."', '".$row['slug']."', 4, '".$row['date_added']."', '".$row['last_updated']."', 10, '".$row["quote"]["USD"]["price"]."', '$description', '$short_description', '0')";

		if(!mysqli_query($conn,$sql))
	    {
	        die('Error : ' . mysqli_error($conn));
	    }
	    else{}
	}
?>
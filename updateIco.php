<?php
	include 'config.php';
	/*include 'getApiData.php';*/
	
	foreach($response["data"] as $row){
		$sql = "UPDATE ico_data SET START_DATE='".$row['date_added']."', END_DATE='".$row['last_updated']."' WHERE API_ID='".$row['id']."'";

		if(!mysqli_query($conn,$sql))
	    {
	        die('Error : ' . mysqli_error($conn));
	    }
	    else{}
	}
?>
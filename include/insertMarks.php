<?php
	include 'config.php';
	include './getApiData.php';

	$positives = "Some positives for this Ico";
	$negatives = "Some negatives for this Ico";
	foreach($response["data"] as $row){
		$sql = "INSERT INTO ico_marks(MARK_ID, STATUS, INFO) VALUES('".$row['id']."', '0', '$negatives')";

		mysqli_query($conn, $sql);
	}
	if(!mysqli_query($conn,$sql))
    {
        die('Error : ' . mysqli_error($conn));
    }
    else{
		echo "Marks added to database";
    }
?>
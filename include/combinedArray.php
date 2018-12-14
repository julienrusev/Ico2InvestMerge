<?php
//GET DATA FROM DATABASE TO CREATE $combinedArray
	$sql = "SELECT SLUG, URL FROM ico_images";
	$result = $conn->query($sql);
	$combinedArray = array();
	if ($result->num_rows > 0) {
		// output data of each row
			while($row = $result->fetch_assoc()) {
	  		$combinedArray[$row["SLUG"]] = $row['URL'];
		}
	}
?>
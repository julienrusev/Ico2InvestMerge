<?php
	require_once __DIR__.'/vendor/autoload.php';
	include 'include/config.php';

	$loader = new Twig_Loader_Filesystem(__DIR__.'/templates');
	$twig = new Twig_Environment($loader);
	//get ico ID
	$icoID = $_POST["ico_id"];
	$sql = "SELECT NAME, ICO_SLUG, START_DATE, END_DATE, DESCRIPTION, POTENTIAL_ROI, TITLE, INFO, STATUS FROM ico_data, ico_marks WHERE ico_data.API_ID = ico_marks.MARK_ID AND ico_data.ID='$icoID'";
	//$sql = "SELECT * FROM ico_marks WHERE MARK_ID='1'";
	$result = $conn->query($sql);
	$dataArray = array();
	
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$dataArray[] = $row;
		}
	} 

	include 'include/combinedArray.php';
	  
	$conn->close();

	//$row = mysqli_fetch_assoc($result);
	echo $twig->render('singleIco.html', ['dataArray' => $dataArray, 'combinedArray' => $combinedArray]);
?>
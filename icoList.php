<?php
	require_once __DIR__.'/vendor/autoload.php';
	include 'include/config.php';
	include 'include/selectData.php';

	$loader = new Twig_Loader_Filesystem(__DIR__.'/templates');
	$twig = new Twig_Environment($loader);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$dataArray[] = $row;
		}
	} else {
		echo "0 results";
	}

	include 'include/calcICO.php';
	
	foreach($dataArray as $row){
    $sql = "UPDATE ico_data SET POTENTIAL_ROI='".$row['POTENTIAL_ROI']."', INVEST='".$row['INVEST']."', WALLET='".$row['WALLET']."', PROFIT='".$row['PROFIT']."', PER_FROM_WALLET='".$row['PER_FROM_WALLET']."', ICO_PROFIT_PER='".$row['ICO_PROFIT_PER']."', ICO_PROFIT_PER='".$row['ICO_PROFIT_PER']."' WHERE ID='".$row['ID']."'";

	    mysqli_query($conn, $sql);
	  }

	include 'include/combinedArray.php';

	echo $twig->render('icoList.html', ['dataArray' => $dataArray, 'combinedArray'  => $combinedArray]);

	include 'include/footer.php';
?>
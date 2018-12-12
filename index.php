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

	include 'include/combinedArray.php';

	$conn->close();
	echo $twig->render('index.html', ['dataArray' => $dataArray, 'combinedArray' => $combinedArray]);
	include 'include/footer.php';
?>
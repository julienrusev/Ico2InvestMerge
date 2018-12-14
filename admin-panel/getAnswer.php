<?php
	include 'config.php';
	$a = isset($_POST['id1']) ? $_POST['id1']: 'fek';
	$sql = "DELETE FROM ico_marks WHERE ID_AUTO=$a";

	if ($conn->query($sql) === TRUE) {
	    echo "Record deleted successfully";
	} else {
	    echo "Error deleting record: " . $conn->error;
	}

	$conn->close();
?>
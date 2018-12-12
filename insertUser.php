<?php 
	include 'config.php';

		$sql = "INSERT INTO login_form(username, password) VALUES('ico2invest@gmail.com', 'Tr2rqFa2OUX4MSNM6DQl')";

		if(!mysqli_query($conn,$sql))
	    {
	        die('Error : ' . mysqli_error($conn));
	    }
	    else{}
?>
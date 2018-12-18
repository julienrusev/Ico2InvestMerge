<?php 
include 'config.php';

if(isset($_POST['submit_form']))
	{
	 $name=$_POST["user_name"];
	 $email=$_POST["email"];
	 
	 $sql ="INSERT INTO newsletter_signups(name, email) VALUES('$name','$email')";
	 if(!mysqli_query($conn,$sql))
	    {
	        die('Error : ' . mysqli_error($conn));
	    }
	    else{echo "Thank You For Joining Our Newsletter";}
	 
	}
?>
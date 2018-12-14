<?php
	include 'config.php';

	if(isset($_POST['update'])){
		$value = $_POST['api_id'];
		$name = $_POST['name'];
		//$positives = $_POST['positives'];
		//$negatives = $_POST['negatives'];
		$positives = isset($_POST['positives'])?$_POST['positives']: NULL;
		$negatives = isset($_POST['negatives'])?$_POST['negatives']: NULL;
		$newPositive = isset($_POST['newPositive'])?$_POST['newPositive']: NULL;
		$newNegative = isset($_POST['newNegative'])?$_POST['newNegative']: NULL;

		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];
		$ico_price = $_POST['ico_price'];
		$ico_qty = $_POST['ico_quantity'];
		$ico_description = $_POST['description'];
		$ico_short_description = $_POST['short_description'];
		$ico_status = $_POST['ico_status'];

		$sql = "UPDATE ico_data SET START_DATE='$start_date', END_DATE='$end_date', ICO_PRICE='$ico_price', ICO_QTY='$ico_qty', DESCRIPTION='$ico_description', SHORT_DESCRIPTION='$ico_short_description', ICO_STATUS='$ico_status' WHERE API_ID='$value'";
		//mysqli_query($conn, $sql);

		if(!mysqli_query($conn,$sql))
    	{
        	die('Error : ' . mysqli_error($conn));
    	}

    	//UPDATE POSITIVES
    	if($positives != NULL){
	    	foreach($positives as $row => $col){
				$sql = "UPDATE ico_marks SET INFO='".$col['TEXT']."', TITLE='".$col['TITLE']."' WHERE ID_AUTO='$row'";

				if(!mysqli_query($conn,$sql)){
	        		die('Error : ' . mysqli_error($conn));
	    		}
			}
		}else{}

    	//UPDATE NEGATIVES
    	if($negatives != NULL){
	    	foreach($negatives as $row => $col){
				$sql = "UPDATE ico_marks SET INFO='".$col['TEXT']."', TITLE='".$col['TITLE']."' WHERE ID_AUTO='$row'";

				if(!mysqli_query($conn,$sql)){
	        		die('Error : ' . mysqli_error($conn));
	    		}
			}
		}else{}
    	//INSERT NEW POSITIVES
    	if($newPositive != NULL){

	    	foreach($newPositive as $row => $col){
				$sql = "INSERT INTO ico_marks(MARK_ID, STATUS, TITLE, INFO) VALUES('$value', '1', '".$col['title']."', '".$col['text']."')";

					if(!mysqli_query($conn, $sql)){
		        		die('Error : ' . mysqli_error($conn));
		    		}else{}
				}
    	
    	}else {
    	}

    	//INSERT NEW NEGATIVE
    	if($newNegative != NULL){

	    	foreach($newNegative as $row => $col){
				$sql = "INSERT INTO ico_marks(MARK_ID, STATUS, TITLE, INFO) VALUES('$value', '0', '".$col['title']."', '".$col['text']."')";

					if(!mysqli_query($conn, $sql)){
		        		die('Error : ' . mysqli_error($conn));
		    		}else{}
				}
    	
    	}else {}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ico2invest admin panel</title>
	<meta charset="utf-8">
	<!--Title-->
	<!--<link rel="icon" href="media/favicon.ico" sizes="16x16">-->
	<link rel="icon" href="../media/TitleLogo.png">
	<!--Meta`s-->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="../styles/select2.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../scripts/select2.min.js"></script>

	<link rel="stylesheet" href="../styles/style.css">
	<link rel="stylesheet" href="../styles/admin-style.css">
</head>
<body>
<div id="container_update_todb">
	<div class="header">
		<div class="header_left">
			<a href=""><img src="../media/logo.png" alt="logo" class="header_logo"></a>
		</div>
		<div class="header_right">
			<p class="show">Open Menu</p>
			<a class="menu-link">
				<span></span>
			</a>
		</div>
	</div>

	<div class="panel_body">
		<div class="dashboard">
			<ul class="menu">
				<a href="index"><li class="home">Home</li></a>
				<a href="update"><li class="update">Update</li></a>
				<a href="delete"><li class="delete">Delete/Restore</li></a>
				<a href="createNewICO"><li class="add">Add new ICO</li></a>
				<a href="../include/logout"><li class="add">Log Out</li></a>
			</ul>
		</div>
		<div class="text_area">
			<h1>You have succesfully updated <?php echo $name . "<br>";
			 ?></h1>
		</div>
	</div>
</div>
	<?php
		include '../include/footer.php';
	?>
	<script>
	$(document).ready(function(){
		$('.menu-link').click(function(){
			$('.dashboard').slideToggle('slow');
		});
		$('.menu-link').click(function(){
			$('.menu-link').toggleClass('menu-link-active');
		});
	});
</script>
</body>
</html>
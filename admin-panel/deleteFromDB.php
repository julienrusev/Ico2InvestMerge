<?php
	include 'config.php';

	if(isset($_POST['change'])){
		$status = $_POST['status'];
		$value = $_POST['api_id'];
		$name = $_POST['name'];

		$sql = "UPDATE ico_data SET  IS_VISIBLE='$status' WHERE API_ID='$value'";

		if(!mysqli_query($conn,$sql))
    	{
        	die('Error : ' . mysqli_error($conn));
    	}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ico2invest admin panel</title>
	<meta charset="utf-8">
	<!--Title-->
	<!--<link rel="icon" href="media/favicon.ico" sizes="16x16">-->
	<link rel="icon" href="../resources/media/TitleLogo.png">
	<!--Meta`s-->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

	<link rel="stylesheet" href="../resources/styles/style.css">
	<link rel="stylesheet" href="../resources/styles/admin-style.css">
</head>
<body>
<div id="container_delete_fromdb">
	<div class="header">
		<div class="header_left">
			<a href=""><img src="../resources/media/logo.png" alt="logo" class="header_logo"></a>
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
			<?php 
				if($status == 1){
					echo "<h1>You have succesfully restored ". $name . " to your page</h1>";
				}else if($status == 0){
					echo "<h1>You have succesfully removed ". $name . " from your page</h1>";
				}
			?>
		</div>
	</div>
</div>
<?php
		include '../include/footer.php';
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
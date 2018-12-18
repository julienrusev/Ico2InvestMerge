<?php
   include('../include/session.php');
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
<div id="container_update">
	<div class="header">
		<div class="header_left">
			<a href=""><img src="../media/logo.png" alt="logo" class="header_logo"></a>
		</div>
		<div class="header_right">
			<p class="show">Open Menu</p>
			<a class="menu_link">
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
			<h1>Here you can choose an ICO to update</h1>
			<?php 
				include 'config.php';
				$sql = "SELECT NAME, API_ID FROM ico_data";
				$result = $conn->query($sql);
				$dataArray = array();
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$dataArray[] = $row;
					}
				}
			?>
			<form action="updateForm.php" method="POST" name="select_form" class="choose_form">
				<select name="ico_names" class="js-example-basic-single">
				<?php foreach($dataArray as $value){
					echo '<option value="'.$value['API_ID'].'">'.$value['NAME'].'</option>';
				}?>
				</select><br><br>
				<input type="submit", name="redirect" value="Check Ico" class="check_ico">
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('.menu_link').click(function(){
			$('.dashboard').slideToggle('slow');
		});
		$('.menu_link').click(function(){
			$('.menu_link').toggleClass('menu_link_active');
		});
	});
</script>
<script type="text/javascript">
    $(document).ready(function() {
		$(".js-example-basic-single").select2();
	});
</script>
<?php
	include '../include/footer.php';
?>
</body>
</html>
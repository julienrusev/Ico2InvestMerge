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

<div id="container_delete_ico">

	<div class="header">
		<div class="header_left">
			<a href=""><img src="../resources/media/logo.png" alt="logo" class="header_logo"></a>
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


			<?php 
				//GET ICO ID FROM update.php
				$value = '';
				if(isset($_POST['ico_names'])) {
    				$value = $_POST['ico_names'];
				}
				include 'config.php';
				$sql = "SELECT API_ID, NAME, START_DATE, END_DATE, ICO_PRICE, ICO_QTY, DESCRIPTION, SHORT_DESCRIPTION, ICO_STATUS, ID_AUTO, TITLE, INFO, STATUS, URL FROM ico_data, ico_marks, ico_images WHERE ico_data.API_ID = ico_marks.MARK_ID AND ico_data.API_ID='$value'"; // AND ico_data.ICO_SLUG = ico_images.SLUG"
				$result = $conn->query($sql);
				$dataArray = array();
				
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$dataArray[] = $row;
					}
				}
			?>


			<h1>Here you can update your data</h1>
			<!--<img src="<?php echo $dataArray[0]['URL']?>" alt="image" class="image_size"><br>-->
			<form action="deleteFromDB.php" method="POST" name="delete_form" class="detele_form">
				<div class="details">
					<input type="hidden" id="hidden_api_id" name="api_id" value="<?php echo $dataArray[0]['API_ID'] ?>">
					<label>Name</label> <input type="text" name="name" value="<?php echo $dataArray[0]['NAME'] ?>" class="readonly_name" readonly><br>
					<label>Start date</label> <input type="text" name="start_date" value="<?php echo substr($dataArray[0]['START_DATE'], 0, 10) ?>" class="readonly_input" readonly><br>
					<label>End date</label> <input type="text" name="end_date" value="<?php echo substr($dataArray[0]['END_DATE'], 0, 10) ?>" class="readonly_input" readonly><br>
					<label>Visible</label> <input type="radio" name="status" value="1" checked class="radio_visible"><br>
					<label>Invisible</label> <input type="radio" name="status" value="0" class="radio_unvisible">
				</div>
				<br>
				<div class="descriptions">
					<div class="descr_holder">
						<span class="delete_descr">Description</span><br>
						<div class="readonly_txtarea">
							<?php echo $dataArray[0]['DESCRIPTION'] ?>
						</div>
					</div>
					<br>
					<div class="short_descr_holder">
						<span class="delete_short_descr">Short Description</span><br> 
						<div class="readonly_txtarea">
							<?php echo $dataArray[0]['SHORT_DESCRIPTION'] ?>
						</div>
					</div>
				</div>
				<input type="submit" name="change" value="Proceed" class="change_btn">
			</form>

		</div>
	</div>
</div>
<?php
		include '../include/footer.php';
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
</body>
</html>
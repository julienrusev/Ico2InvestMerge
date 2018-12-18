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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

	<link rel="stylesheet" href="../resources/styles/style.css">
	<link rel="stylesheet" href="../resources/styles/admin-style.css">
</head>
<body>
<div id="container_update_form">

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
				//GET ICO ID FROM update.php
				$value = '';
				if(isset($_POST['ico_names'])) {
    				$value = $_POST['ico_names'];
				}
				include 'config.php';
				$sql = "SELECT API_ID, NAME, START_DATE, END_DATE, ICO_PRICE, ICO_QTY, DESCRIPTION, SHORT_DESCRIPTION, ICO_STATUS, ID_AUTO, TITLE, INFO, STATUS, URL FROM ico_data, ico_marks, ico_images WHERE ico_data.API_ID = ico_marks.MARK_ID AND ico_data.API_ID='$value' AND ico_data.ICO_SLUG = ico_images.SLUG";
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
			<form action="updateToDB.php" method="POST" name="update_form" class="update_form">
				<div class="details">
					<input type="hidden" id="hidden_api_id" name="api_id" value="<?php echo $dataArray[0]['API_ID'] ?>">
					<label>Name</label> <input type="text" name="name" value="<?php echo $dataArray[0]['NAME'] ?>" class="readonly_name" readonly><br>
					<label>Start date</label> <input type="date" name="start_date" value="<?php echo substr($dataArray[0]['START_DATE'], 0, 10) ?>" class="start_date"><br>
					<label>End date</label> <input type="date" name="end_date" value="<?php echo substr($dataArray[0]['END_DATE'], 0, 10) ?>" class="end_date"><br>
					<label>ICO Price</label> <input type="number" name="ico_price" value="<?php echo $dataArray[0]['ICO_PRICE'] ?>" class="ico_price"><br>
					<label>ICO Quantity</label> <input type="number" name="ico_quantity" value="<?php echo $dataArray[0]['ICO_QTY'] ?>" class="ico_quantity"><br>
					<div class="status_holder">
						<label>ICO Status</label> <div class="range"><button class="zero" type="button">Inactive</button> <input type="range" class="slider" value="<?php echo $dataArray[0]['ICO_STATUS'] ?>" name="ico_status" id="test" min="0" max="1"> <button class="one" type="button">Active</button></div><br>
					</div> 
					<!--<input type="number" name="ico_status" value="<?php echo $dataArray[0]['ICO_STATUS'] ?>" class="ico_status"><br>
					<p class="status_help">(status can take only 0 and 1 values)</p>-->
					<span class="descr">Description</span><br> <textarea name="description" id="" cols="40" rows="5" class="ico_description"><?php echo $dataArray[0]['DESCRIPTION'] ?></textarea><br>
					<span class="descr">Short Description</span><br> <textarea name="short_description" id="" cols="40" rows="5" class="ico_short_description"><?php echo $dataArray[0]['SHORT_DESCRIPTION'] ?></textarea><br>
				</div>
				<div class="pos_holder">
					<label class="pos">Positives</label><br>
					<?php 
						$title='TITLE';
						$text='TEXT';
						foreach($dataArray as $value){
							if($value['STATUS'] == 1){
								echo "<div class='textarea_holder_pos'>"."<input type='text' name='positives[$value[ID_AUTO]][$title]' value='$value[TITLE]' class='pos_title'>"."<textarea name='positives[$value[ID_AUTO]][$text]' id='$value[ID_AUTO]' class='positives' cols='40' rows='5'>" .$value["INFO"]. "</textarea>"."<button type='button' id='$value[ID_AUTO]' class='remove'>Delete</button>"."</div>". "<br>";
							}
						}
					?>
					<!--ADD JQUERY-->
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
					<script>
						//REMOVE FIELD
						$(document).ready(function(){
							var wrapper = $('.textarea_holder_pos');
							$(wrapper).on('click', '.remove', function(e){

        					if (confirm('Are you sure you want to delete this thing from the database?')) {
						    		e.preventDefault();
        							$(this).parent('div').remove(); //Remove field html
        							var id_handler = event.target.id;
						    		$.ajax(
							    		{
							    		url: "getAnswer.php",
							    		type: "POST",
							    		data: { id1: id_handler},
							    		success: function (result) {
							            	alert(result);
							    		}
									});
								} else {
						    		// Do nothing!
								}
    						});
						});
					</script>

					<button type='button' id="add_positive">Add positive</button><br>
					<script>
						$(document).ready(function(){
							//GET API_ID FROM $dataArray
							var api_id = $('#hidden_api_id').val();
							var index = 0;
							//Add new positive
							$('#add_positive').on('click', function(){
								$('#add_positive').before(
								"<div class='textarea_holder_pos'><input type='text' name='newPositive["+index+"][title]' class='pos_title'><textarea name='newPositive["+index+"][text]' class='positives' cols='40' rows='5'></textarea><button type='button' class='remove_text_field'>Delete</button></div><br>"
								);
								index++;
							});
							$('body').on('click', '.remove_text_field', function() {
	        					$(this).closest(".textarea_holder_pos").remove();
	    					});
						});
					</script>
				</div>
				<div class="neg_holder">
					<label class="neg">Negatives</label><br>
					<?php 
						$title='TITLE';
						$text='TEXT';
						foreach($dataArray as $value){
							if($value['STATUS'] == 0){
								echo "<div class='textarea_holder_neg'>"."<input type='text' name='negatives[$value[ID_AUTO]][$title]' value='$value[TITLE]' class='neg_title'>"."<textarea name='negatives[$value[ID_AUTO]][$text]' id='$value[ID_AUTO]' class='negatives' cols='40' rows='5'>" .$value["INFO"]. "</textarea>"."<button type='button' id='$value[ID_AUTO]' class='remove'>Delete</button>"."</div>". "<br>";
							}
						}
					?>
					<script>
						//REMOVE FIELD
						$(document).ready(function(){
							var wrapper = $('.textarea_holder_neg');
							$(wrapper).on('click', '.remove', function(e){

	        				if (confirm('Are you sure you want to delete this thing from the database?')) {
							    e.preventDefault();
	        				$(this).parent('div').remove(); //Remove field html

	        				var id_handler = event.target.id;
							    $.ajax(
								    {
								    url: "getAnswer.php",
								    type: "POST",

								    data: { id1: id_handler},
								    success: function (result) {
								            alert(result);
								    }
								});
							} else {
							    // Do nothing!
							}
	    					});
						});
					</script>
					<button type='button' id="add_negative">Add negative</button><br><br>
					<script>
						$(document).ready(function(){
						//GET API_ID FROM $dataArray
						var api_id = $('#hidden_api_id').val();
						var index = 0;
						//Add new negative
						$('#add_negative').on('click', function(){
							$('#add_negative').before(
							"<div class='textarea_holder_neg'><input type='text' name='newNegative["+index+"][title]' class='neg_title'><textarea name='newNegative["+index+"][text]' class='negatives' cols='40' rows='5'></textarea><button type='button' class='remove_text_field'>Delete</button></div><br>"
							);
							index++;
						});
					});
						//ONLY DELETE FIELD
						$('body').on('click', '.remove_text_field', function() {
	        					$(this).closest(".textarea_holder_neg").remove();
	    					});
					</script>
				</div>
				<input type="submit" name="update" value="Update" class="update_btn">
			</form>
		</div>
	</div>
	<?php
		include '../include/footer.php';
	?>
</div>
<script>
	$(document).ready(function(){
		$('.menu-link').click(function(){
			$('.dashboard').slideToggle('slow');
		});
		$('.menu-link').click(function(){
			$('.menu-link').toggleClass('menu-link-active');
		});
	});

	$(document).ready(function(){
		$(".zero").click(function(event) {
	  		$("#test").val(0);
		});
		$(".one").click(function(event) {
			$("#test").val(1);
		});
	});
</script>
</body>
</html>
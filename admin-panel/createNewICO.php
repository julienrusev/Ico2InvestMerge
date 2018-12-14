<?php 
	include 'config.php';
	include('../include/session.php');
	$sql = "SELECT API_ID FROM ico_data";
				$result = $conn->query($sql);
				$idArray = array();
				
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$idArray[] = $row;
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
	<link rel="icon" href="../media/TitleLogo.png">
	<!--Meta`s-->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="../styles/style.css">
	<link rel="stylesheet" href="../styles/admin-style.css">
</head>
<body>
<div id="container_create_ico">
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
			<h1>Here you can add you own ICO</h1>
			<form action="upload.php" method="post" enctype="multipart/form-data" name="create_form" class="create_form">

				<div class="details">
					<label class="upload_label">Name </label>
					<input type="text" name="name" class="upload_input name" id="name">
					<label class="upload_label">Logo</label>
					<label for="fileToUpload" class="upload_label custom-file-upload">
						<i class="fas fa-cloud-upload-alt"></i> Upload file
					</label>
			    	<input type="file" name="fileToUpload" id="fileToUpload" class="upload_input fileToUpload">
			    	<label class="upload_label">ID </label>
			    	<input type="text" name="api_id" class="upload_input api_id" id="valid_id" readonly>
			    	<label class="upload_label">Slug </label>
			    	<input type="text" name="slug" class="upload_input ico_slug" id="copy_slug" readonly>
			    	<label class="upload_label">Start Date </label>
			    	<input type="date" name="start_date" class="upload_input start_date">
			    	<label class="upload_label">End Date </label>
			    	<input type="date" name="end_date" class="upload_input end_date">
			    	<label class="upload_label">Price </label>
			    	<input type="number" name="ico_price" class="upload_input ico_price">
			    	<label class="upload_label">Current Price</label>
			    	<input type="number" name="current_price" class="upload_input current_price">
			    	<label class="upload_label">Quantity</label>
			    	<input type="number" name="ico_quantity" class="upload_input ico_quantity">
				    <span class="descr">Description</span><br>
			    	<textarea name="descrption" cols="45" rows="5" class="ico_description"></textarea>
				    <span class="descr">Short Description</span><br>
			    	<textarea name="short_description" class="ico_short_description" cols="45" rows="5"></textarea>
				</div>
				<div class="pos_holder">
			    <label class="pos">Positives</label><br>
			    <div class="textarea_holder_pos">
			    	<input type="text" name="positives[0][title]" class='pos_title'>
			    	<textarea name="positives[0][text]" cols="40" rows="5" class="positives"></textarea>
			    </div><br>
			    <button type='button' id="add_positive">Add positive</button><br>
				</div>
				<div class="neg_holder">
			    <label class="neg">Negatives</label><br>
			    <div class="textarea_holder_neg">
			    	<input type="text" name="negatives[0][title]" class="neg_title">
			    	<textarea name="negatives[0][text]" cols="40" rows="5" class="negatives"></textarea>
			    </div><br>
			    <button type='button' id="add_negative">Add negative</button><br><br>
			</div>
			    <input type="submit" name="create_btn" id="" value="Create" class="create_btn">

			    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		//ADD MORE NEGATIVES
		$(document).ready(function(){
			//GET API_ID FROM $dataArray
			var api_id = $('#hidden_api_id').val();
			var index = 1;
			//Add new negative
			$('#add_negative').on('click', function(){
				$('#add_negative').before(
				"<div class='textarea_holder_neg'><input type='text' name='negatives["+index+"][title]' class='neg_title'><textarea name='negatives["+index+"][text]' class='negatives' cols='40' rows='5'></textarea><button type='button' class='remove_text_field'>Delete</button></div><br>"
				);
				index++;
			});
		});
		//ONLY DELETE FIELD
		$('body').on('click', '.remove_text_field', function() {
			$(this).closest(".textarea_holder_neg").remove();
		});
	</script>

	<script>
		//ADD MORE POSITIVES
		$(document).ready(function(){
			//GET API_ID FROM $dataArray
			var api_id = $('#hidden_api_id').val();
			var index = 1;
			//Add new positive
			$('#add_positive').on('click', function(){
				$('#add_positive').before(
				"<div class='textarea_holder_pos'><input type='text' name='positives["+index+"][title]' class='pos_title'><textarea name='positives["+index+"][text]' class='positives' cols='40' rows='5'></textarea><button type='button' class='remove_text_field'>Delete</button></div><br>"
				);
				index++;
			});
		});
		//ONLY DELETE FIELD
		$('body').on('click', '.remove_text_field', function() {
			$(this).closest(".textarea_holder_pos").remove();
		});
	</script>
	<!--<script>
		//console.log(<?php echo $idArray[1]['API_ID']; ?>);

		var jArray = <?php echo json_encode($idArray); ?>;
		$("#valid_id").bind('input' ,function(event) {
  			var stt = $(this).val();
  			for(var i = 0; i < jArray.length; i++){
  				if(stt == jArray[i]['API_ID']){
  					$("#valid_id").css("border-color", "red");
  					break;
  				}else{
  					$("#valid_id").css("border-color", "green");
  				}
  			}
		});
	</script>-->
	<script>
		//GENERATE RANDOM UNIQUE ID
		var jArray = <?php echo json_encode($idArray); ?>;

		function getRand() {
    		var rand;
    		do { // will fail the first time
        		rand = Math.floor(Math.random() * 10000); // re-randomize
    		} while ($.inArray(rand, jArray) > -1);
    			return rand;
		}
		var x = getRand();
		document.getElementById("valid_id").value = x;
	</script>
			</form>
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
<script>
	$(document).ready(function(){
		$("#name").bind('input' ,function(event) {
  		var stt = $(this).val();
      	$("#copy_slug").val(stt.toLowerCase().replace(/[" "]/g, "_"));
	});
	});
</script>
</body>
</html>
<?php
   include("include/login.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ico2invest</title>
		<meta charset="utf-8">
		<!--Title-->
	    <link rel="icon" href="../resources/media/favicon.ico" sizes="16x16">
	    <link rel="icon" href="../resources/media/TitleLogo.png">
	    <!--Meta`s-->
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--Fonts-->
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lato:700" rel="stylesheet">
	    <!--Custom css-->
	    <link rel="stylesheet" href="../resources/styles/style.css">
	    <!--BOOTSTRAP-->
	    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	</head>
	<body>
	<div class="header_include">
		<div class="header_wrapper">
			<a href="../index"><img src="../resources/media/logo.png" alt="logo" class="header-logo"></a>
			<div class="header_menu">
				<p class="loginHeader">LOG IN TO ADMIN PAGE</p>
			</div>
		</div>
	</div>
	<div class="login_form">
	   <form action = "" method = "post">
	      <label><span class="submitPage_required">*</span>UserName:</label><br>
	      <input class="loginPage_input" type = "text" name = "username" class = "box"/ required=""><br><br>
	      <label><span class="submitPage_required">*</span>Password:</label><br>
	      <input class="loginPage_input" type = "password" name = "password" class = "box" / required=""><br><br>
	      <input class="loginPage_button" type = "submit" value = " LOG IN "/><br/><br/>
	   </form>
	</div>


<?php 
   include("include/footer.php");
?>
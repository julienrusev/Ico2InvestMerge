<?php
	include("session.php");
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
	<body id="logout">
	<div class="header_include">
		<div class="header_wrapper">
			<a href="../index.php"><img src="../resources/media/logo.png" alt="logo" class="header_logo"></a>
			<div class="header_menu">
				<p class="loginHeader">ADMIN PAGE</p>
			</div>
		</div>
	</div>
	<div>
		<h1 class="logoutHeader">YOU HAVE BEEN LOGGED OUT!</h1>
	</div>

<?php 
   session_destroy();
   include("footer.php");
?>
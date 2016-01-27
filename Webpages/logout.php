<?php

session_start();

session_unset();

session_destroy();
?>
<html>
	<head>
		<meta charset = "UTF-8">
		<title> Betwixt Booking </title>
			<link rel= "stylesheet" type="text/css" href= "480stylesheet.css">
		
		<link href='http://fonts.googleapis.com/css?family=Vast+Shadow' rel='stylesheet' type='text/css'>
		
		<title>Logged Out</title>
	</head>

	<body>

		<div class="container" id="Logout">
			<h3>Successfully logged out.</h3>
			<p>
				<a href="signup.php"> Sign Up </a> | <a href="login.php"> Login </a>
			</p>
		</div>
 
	</body>
</html>




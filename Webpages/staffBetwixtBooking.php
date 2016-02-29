<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Betwixt Booking</title>
		<meta charset="utf-8">
		<meta name= "viewport" content= "width= device-width, initial-scale=1.0">
		<link href="betwixt.css" rel="stylesheet">
		<link rel="stylesheet" href="C:\Users\lkwal_000\Google Drive\CIT_CSE 480\Production\css\font-awesome-4.5.0\css\font-awesome.min.css">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">
	   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     
	
	</head>
	
	<body>
  
		<div id="wrapper">
			<header>
				<h1> Welcome to Betwixt Booking</h1>
				
			</header>	

			<main role ="main">
				<nav>
					<ul>
					  <li>Welcome <?php echo $_SESSION['username']; ?> </li>
					  <li><a href="http://secs.oakland.edu/~hmbock/staffBetwixtBooking.php">&nbsp;<i class="fa fa-home"></i>&nbsp;Home</a></li>
					  <li><a href="http://secs.oakland.edu/~hmbock/manageAvailability.php">&nbsp;<i class="fa fa-share"></i>&nbsp;Manage Availability</a></li>
					  <li><a href="http://secs.oakland.edu/~hmbock/staffscheduleApp.php">&nbsp;<i class="fa fa-plus-circle"></i>&nbsp;Schedule Appointment</a></li>
					  <li><a href="http://secs.oakland.edu/~hmbock/staffPhonebook.php">&nbsp;<i class="fa fa-phone-square"></i>&nbsp;Contacts</a></li>
				
					  <li><a href="http://secs.oakland.edu/~hmbock/myCalendar.php">&nbsp;<i class="fa fa-calendar"></i> &nbsp;My Calendar</a></li>
					 <li><a href="http://secs.oakland.edu/~hmbock/staffAccountSettings.php">&nbsp;<i class="fa fa-user"></i> &nbsp; Manage Account</a></li>
					  <li><a href="logout.php"><i class="fa fa-sign-out"></i>&nbsp; Logout</a></li>
					<li><a href="#blank"></a></li>
                     <li><a href="blank"></a></li>
                     <li><a href="#blank"></a></li>
                       <li><a href="blank"></a></li>
					
					</ul>
				</nav>		
				
				<div id="content">
					<h2> News Feed </h2>
					<p><b><u> Your Upcoming Appointments:</u></b></p>
					<p> Appointments for the day here?? </p>
						<br>
                        <br>
                        <br>
                        <br>
						<br>
                        <br>
						<br>
						<br>
				
				</div>
			</main>
			<footer role="contentinfo">
					Copyright &copy; 2016 Betwixt Booking<br>
					<a href="mailto:betwixtbooking@gmail.com">
						<address>BetwixtBooking@gmail.com</address>
					</a>
				</footer>
		</div>
		
	</body>
	
</html>

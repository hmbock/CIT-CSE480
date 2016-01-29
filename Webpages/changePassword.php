<?php

session_start();



					//connect to database ***/
					$servername = 'localhost';
					$dbusername = 'hmbock';
					$dbpassword = 'team@480';
					$dbname = 'hmbock';


			try
				{
					mysql_connect("localhost", "hmbock", "team@480") or die(mysql_error()); // Connect to database server(localhost) with username and password.
            mysql_select_db("hmbock") or die(mysql_error()); // Select prdaram database.
            
            
             
                
                if($search = mysql_query("SELECT username FROM login WHERE username='" . $_SESSION["username"] . "'")){
                $match  = mysql_num_rows($search); //records the number of rows that have matched the search
                    if($match > 0){
                   
                    mysql_query("UPDATE login SET password= '". mysql_escape_string(sha1($newPassword)) ."' WHERE username='$username'");  
                                  
                      }   
                    else
                      {
                       $message = 'No such Email exists in our system. Please try another email or register for new account';                   
						          }
                }
                
                else{
                  $message = 'No such Email exists in our system. Please try another email or register for new account';
                  }
                }
            else{
            $message = 'Enter valid username';
                }
            
          }
				
    
			catch(Exception $e)
				{
				//Couldn't connect to database
				$message = 'Unable to connect. Please try again later';
				}
}

 
?>

<html>
 <head>
	<title>Betwixt Booking Login Page</title> 
	<meta charset="utf-8">
		<meta name= "viewport" content= "width= device-width, initial-scale=1.0">
		<link href="betwixt.css" rel="stylesheet">
		<link rel="stylesheet" href="C:\Users\lkwal_000\Google Drive\CIT_CSE 480\Production\css\font-awesome-4.5.0\css\font-awesome.min.css">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">
		<link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
	
 </head>

 <body>
	<header>
		<div class="title">
			<h1> Betwixt Booking </h1>
		<div>
	</header>
	<div id="wrapper">
	
				
					  <nav>
					<ul>
					  <li><a href="http://secs.oakland.edu/~hmbock/betwixtBooking.php"><i class="fa fa-home"></i>&nbsp;Home</a></li>
					  <li><a href="http://secs.oakland.edu/~hmbock/scheduleApp.php"><i class="fa fa-plus-circle"></i>&nbsp;Schedule an Appointment</a></li>
					  <li><a href="http://secs.oakland.edu/~hmbock/upcomingApp.php"><i class="fa fa-arrow-up"></i>&nbsp;Upcoming Appointments</a></li>
					  <li><a href="http://secs.oakland.edu/~hmbock/cancelApp.php"><i class="fa fa-ban"></i> &nbsp; Cancel Appointment</a></li>
					  <li><a href="http://secs.oakland.edu/~hmbock/myCalendar.php"><i class="fa fa-calendar"></i> &nbsp;My Calendar</a></li>
             <li><a href="http://secs.oakland.edu/~hmbock/accountSettings.php"><i class="fa fa-circle"></i> &nbsp; Manage Account</a></li>
					  <li><a href="logout.php"><i class="fa fa-circle"></i>&nbsp; Logout</a></li>
					</ul>
				</nav>	
				
				<div id = "content">
					<h2>Change Password</h2>
						<fieldset>
							<form role="form" action="changePassword.php" method="post" class="form-signin">
								<div class = "form-group"> 
 
									<label for="oldPassword">Old Password</label>
									<input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Old Password" value="" maxlength="20" />
								</div>
								<div class="form-group">
									<label  for="newUserPassword"> New Password:</label>
									<input type="password" class="form-control" id="newUserPassword" placeholder ="New Password" name="newUserPassword" value="" maxlength="20" />
								</div>
                <div class="form-group">
									<label  for="confirmPassword"> Confirm Password:</label>
									<input type="password" class="form-control" id="confirmPassword" placeholder ="confirmPassword" name="confirmPassword" value="" maxlength="20" />
								</div>
 
								<button type="submit" "btn btn-default">Login</button>
								
                <p> 
                  <?php echo $message; ?>
                </p>
						</fieldset>
							</form>
                   
				</div>
 
 
 </body>
 </html>


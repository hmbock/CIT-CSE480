<?php

session_start();

	
		//make sure username and password is input
			if(!isset($_POST['newUserPassword']) && !empty($_POST['newUserPassword']) AND !isset($_POST['confirmPassword']) && !empty($_POST['confirmPassword']))
				{
					$message = 'Please enter a new password';
				}
				else
    {
					// insert into database
					$newUserPassword = ($_POST['newUserPassword']);
          $confirmPassword = ($_POST['confirmPassword']);
          $username= $_SESSION['username'];

					//connect to database ***/
					$servername = 'localhost';
					$dbusername = 'hmbock';
					$dbpassword = 'team@480';
					$dbname = 'hmbock';


			try
				{
					mysql_connect("localhost", "hmbock", "team@480") or die(mysql_error()); // Connect to database server(localhost) with username and password.
            mysql_select_db("hmbock") or die(mysql_error()); // Select prdaram database.
           
            
            if(isset($_POST['newUserPassword']) && !empty($_POST['newUserPassword']) AND isset($_POST['confirmPassword']) && !empty($_POST['confirmPassword']))
            { 
                $newUserPassword = mysql_escape_string($_POST['newUserPassword']); // Set variable for the username
                  if($newUserPassword != $confirmPassword)
                  {
                    $message = 'Passwords do not match';        
                  }
                    else
                    {
                      if($search = mysql_query("SELECT staff_password FROM Staff WHERE staff_username='$username'")) 
                    {
                          $match  = mysql_num_rows($search); //records the number of rows that have matched the search
                              if($match > 0)
                              {
                                $newPassword = md5($newUserPassword);
                                mysql_query("UPDATE Staff SET staff_password= '$newPassword' WHERE staff_username='$username'");
                                $message='Password has sucessfully been reset!';        
                              } 
                    
                              elseif($search = mysql_query("SELECT stu_password FROM Student WHERE stu_username='$username'")) 
                              {
                                $match  = mysql_num_rows($search); //records the number of rows that have matched the search
                                    if($match > 0)
                                    {
                                        $newPassword = md5($newUserPassword); // Generate random number between 1000 and 5000 and assign it to a local variable. 
                                             // Example output: 4568 
                                        $message='Password has sucessfully been reset!';
                                             
                                         mysql_query("UPDATE Student SET stu_password= '$newPassword' WHERE stu_username='$username'"); //update the Student table with randomly generated password where the email matches 
                                  
                                    }
                                    else
                                    {
                                     $message = 'Cannot locate account'; //returns if no match found
                                    }
                              }     
                             else
                             {
                                $message = 'Cannot locate account'; //returns if no match found
                             }
                  }
                  else
                  {
                    $message = 'Cannot locate account'; 
                  } 
                  }
                  }
                 /// else{
               // $message = 'Passwords do not match'; 
                  //} 
                 // }
                  else{
                $message = ''; 
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
            <li>Username:<?php echo $_SESSION['username']; ?> </li>   
					  <li><a href="betwixtBooking.php">Home</a></li>
					</ul>
				</nav>
				<div id = "content">
					<h2>Change Password</h2>
						<fieldset>
							<form role="form" action="changePassword.php" method="post" class="form-signin">
								<div class = "form-group"> 
 
									
								<div class="form-group">
									<label  for="newUserPassword"> New Password:</label>
									<input type="password" class="form-control" id="newUserPassword" placeholder ="New Password" name="newUserPassword" value="" maxlength="20" />
								</div>
                <div class="form-group">
									<label  for="confirmPassword"> Confirm Password:</label>
									<input type="password" class="form-control" id="confirmPassword" placeholder ="Confirm Password" name="confirmPassword" value="" maxlength="20" />
								</div>
 
								<button type="submit" "btn btn-default">Reset Password</button>
								
                <p> 
                  <?php echo $message; ?>
                </p>
						</fieldset>
							</form>
                   
				</div>
 
 
 </body>
 </html>


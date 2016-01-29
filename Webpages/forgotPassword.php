<!DOCTYPE HTML>

<?php


		
		//make sure username and password is input
			if(!isset( $_POST['email']))
				{
					$message = 'Please enter a registered email address';
				}
				else
{
					// insert into database
					$email = ($_POST['email']);
          $newPassword = ($_POST['password']);


					//connect to database ***/
					$servername = 'localhost';
					$dbusername = 'hmbock';
					$dbpassword = 'team@480';
					$dbname = 'hmbock';


			try
				{
					mysql_connect("localhost", "hmbock", "team@480") or die(mysql_error()); // Connect to database server(localhost) with username and password.
            mysql_select_db("hmbock") or die(mysql_error()); // Select prdaram database.
            
            if(isset($_POST['email'])){ //make sure email is input
             
                $email = mysql_escape_string($_POST['email']); // Set variable for the username
                if($search = mysql_query("SELECT staff_email FROM Staff WHERE staff_email='".$email."'")) //search for user entered email address in Staff table
                {
                $match  = mysql_num_rows($search); //records the number of rows that have matched the search
                    if($match > 0){
                    $newPassword = rand(1000,5000); // Generate random number between 1000 and 5000 and assign it to a local variable. 
                                             // Example output: 4568 
                    mysql_query("UPDATE Staff SET staff_password= '". mysql_escape_string(md5($newPassword)) ."' WHERE staff_email='$email'"); //update the Staff table with randomly generated password where the email matches
                    $username = mysql_query("SELECT staff_username FROM Staff WHERE staff_email='".$email."'");
                    
                     $message = 'SUCCESS!!! Temorary password has been sent to email'; //let user know password reset has been successful
                    
                     $to      = $email; // Send email to our user
                     $subject = 'BETWIXT BOOKING FORGOT PASSWORD'; // Give the email a subject
                     $emailMessage = '
                     Please find below a temporary password for your account. Please login with password listed below and change password
                     once logged in. 
            
                      Thank you! 
             
                          ------------------------
                          Username: '.$email.'
                          Password: '.$newPassword.'
                          ------------------------
             
           
             
            '; // Our message above including the link //*** CHANGE THE URL ***
                                 
            $headers = 'From:noreply@secs.oakland.edu' . "\r\n"; // Set from headers //*** CHANGE THE URL ***
            mail($to, $subject, $emailMessage, $headers); // Send our email                     
                                            
                      } 
                      elseif($search = mysql_query("SELECT stu_email FROM Student WHERE stu_email='".$email."'")) //Search for email match in Student table since no match found in staff
                      {
                      $match  = mysql_num_rows($search); //records the number of rows that have matched the search
                      if($match > 0){
                      $newPassword = rand(1000,5000); // Generate random number between 1000 and 5000 and assign it to a local variable. 
                                             // Example output: 4568 
                      mysql_query("UPDATE Student SET stu_password= '". mysql_escape_string(md5($newPassword)) ."' WHERE stu_email='$email'"); //update the Student table with randomly generated password where the email matches 
                      $username = mysql_query("SELECT stu_username FROM Student WHERE stu_email='".$email."'");
                      $message = 'SUCCESS!!! Temorary password has been sent to email'; //let user know password reset has been successful
                      
                      $to      = $email; // Send email to our user
                     $subject = 'BETWIXT BOOKING FORGOT PASSWORD'; // Give the email a subject
                     $emailMessage = 'Please find below a temporary password for your account. Please login with password listed below and change password
            once logged in. 
            
            Thank you! 
             
            ------------------------
            Username: $username
            Password: '.$newPassword.'
            ------------------------
             
           
             
            '; // Our message above including the link //*** CHANGE THE URL ***
                                 
            $headers = 'From:noreply@secs.oakland.edu' . "\r\n"; // Set from headers //*** CHANGE THE URL ***
            mail($to, $subject, $emailMessage, $headers); // Send our email         
            
                      }
                      else{
                      $message = 'No such Email exists in our system. Please try another email or register for new account'; //returns if no match found
                      }
                      }  
                }    
                   else{
                      $message = 'No such Email exists in our system. Please try another email or register for new account'; //returns if no match found
                      }
                }
                else{
                $message = 'Enter valid username'; //returns if field is left blank
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
	<title>Betwixt Booking Forgot Password</title> 
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
	
				<main role ="main">
				<nav>
					<ul>
					  <li><a href="http://secs.oakland.edu/~hmbock/480Index.php"><i class="fa fa-home"></i>&nbsp;Home</a></li>
					  <li><a href="http://secs.oakland.edu/~hmbock/about.php"><i class="fa fa-plus-circle"></i>&nbsp;About</a></li>
					  <li><a href="http://secs.oakland.edu/~hmbock/signUp.php"><i class="fa fa-arrow-up"></i>&nbsp;Sign Up</a></li>
					  <li><a href="http://secs.oakland.edu/~hmbock/login.php"><i class="fa fa-ban"></i> &nbsp; Login</a></li>
					  <li><a href="http://secs.oakland.edu/~hmbock/help.php"><i class="fa fa-calendar"></i> &nbsp;Help</a></li>
            <li><a href="#blank"></a></li>
					  <li><a href="blank"></a></li>
            <li><a href="#blank"></a></li>
					  <li><a href="blank"></a></li>
					</ul>
				</nav>	
				<div id = "content">
					<h2>Forgot Password</h2>
						<fieldset>
							<form role="form" action="forgotPassword.php" method="post" class="form-signin">
								<div class = "form-group"> 
 
									<label for="email">Email:</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="" maxlength="20" />
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
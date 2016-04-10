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
                    $verificationCode= (rand(1000,5000));
                      $newPassword = md5($verificationCode);
                    mysql_query("UPDATE Staff SET forgotPassVerification= '$newPassword' WHERE staff_email='".$email."'"); //update the Staff table with randomly generated password where the email matches
                    $username = mysql_query("SELECT staff_username FROM Staff WHERE staff_email='".$email."'");
                    
                     $message = 'SUCCESS!!! Temorary password has been sent to email'; //let user know password reset has been successful
                    
                     $to      = $email; // Send email to our user
                     $subject = 'BETWIXT BOOKING FORGOT PASSWORD'; // Give the email a subject
                     $emailMessage = '
                     Please find below a verification code for your account. Please login with verification code listed below and change password
            once logged in. Do not share verification code. 
            
                      Thank you! 
             
                          ------------------------
                          Password: '.$verificationCode.'
                          ------------------------
                     
                     Please click this link to get password verification code:
                    http://www.secs.oakland.edu/~hmbock/verify_staffForgotPassword.php?email='.$email.'&hash='.$hash.'      
                    '; // Our message above including the link //*** CHANGE THE URL ***                       
                    $headers = 'From:noreply@secs.oakland.edu' . "\r\n"; // Set from headers //*** CHANGE THE URL ***
                    mail($to, $subject, $emailMessage, $headers); // Send our email
           
             
                      
                                            
                      } 
                      elseif($search = mysql_query("SELECT stu_email FROM Student WHERE stu_email='".$email."'")) //Search for email match in Student table since no match found in staff
                      {
                      $username = mysql_query("SELECT stu_username FROM Student WHERE stu_email='.$email.");
                      $match  = mysql_num_rows($search); //records the number of rows that have matched the search
                      if($match > 0){
                      
                      $verificationCode= (rand(1000,5000));
                      $newPassword = md5($verificationCode); // Generate random number between 1000 and 5000 and assign it to a local variable. 
                                             // Example output: 4568 
                                             
                      mysql_query("UPDATE Student SET forgotPassVerification= '$newPassword' WHERE stu_email='".$email."'"); //update the Student table with randomly generated password where the email matches 
            
                      $message = 'SUCCESS!!! Temporary password has been sent to email'; //let user know password reset has been successful
                      
                      $to      = $email; // Send email to our user
                     $subject = 'BETWIXT BOOKING FORGOT PASSWORD'; // Give the email a subject
                     $emailMessage = 'Please find below a verification code for your account. Please login with verification code listed below and change password
once logged in. Do not share verification code. 
            
            Thank you! 
             
            ------------------------
            Password: '.$verificationCode.'
            ------------------------
             
             Please click this link to get password verification code:
                    http://www.secs.oakland.edu/~hmbock/verify_stuForgotPassword.php?email='.$email.'&hash='.$hash.'      
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
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Betwixt Booking | Welcome Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
		
	
	
 </head>

 <body class="hold-transition register-page">
	
		<div class="register-box">
			<div class="register-logo">
				<a href="#"><b>Betwixt</b>Booking</a>
			</div>

				<div class="register-box-body">
					<p class="login-box-msg"><?php echo $message; ?></p>
					
					
						<fieldset>
							<form role="form" action="forgotPassword.php" method="post" class="form-signin">
								<div class = "form-group"> 
 
								
									<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="" maxlength="40" />
								</div>
							 
								<button type="submit" class="btn btn-block btn-danger btn-lg">Reset Password</button>
								<br><br>
								 <td>
									<a href ="login.php"><button type="button" class="btn btn-block btn-default btn-lg">Back</button></a>
								<td>
								

						
							</form>
						</fieldset>
				</div>
			</div>
 
 
 </body>
 </html>
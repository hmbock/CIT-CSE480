<!DOCTYPE HTML>
<html>
	<head></head>
<body>
	<form action = "forgotPassword.php" method="post">
		Please enter your email: <input type="email" name="email">
		<input type="submit" name="submit" value="Send">
	</form> 
</body>
</html>

<?php
  if($_POST['action']=="password")
    {
      $username = mysqli_real_escape_string($connection,$_POST['username']);
        if(!filter_var($username, FILTER_VALIDATE_EMAIL))
          {
            $message = "Invalid email address. Please type a valid email";
          }
          else
          {
            $query = "select id FROM login WHERE username ='".$username."'";
            $result = mysqli_query($connection,$query);
            $Results = mysqli_fetch_array($result);
            
            if(count[$Results)>=1)
              {
                $encrypt = md5($Results['username']);
                $message= "Your password reset link has been sent to the email provided.";
                $to=$username;
                $subject="Betwixt Booking Password Reset"
                $from="info@betwixtbooking.com";
                $body="Hi, <br/><br/> Your Membership ID '.$Results['username'].'";
                
                mail($to,$subject,$body);
              }
              else
              {
                $message = "Account not found"
              }
          }
  }
                
?>




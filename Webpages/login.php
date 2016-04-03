<!DOCTYPE html>
<html>
 <head>
		<title>Betwixt Booking | Login</title> 
		<meta charset = "UTF-8">
		
		
		
		<!--<link href="betwixt.css" rel="stylesheet">-->
		
		<!--new theme links-->
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

 <body class="hold-transition login-page">
	<div class="login-box">
	  <div class="login-logo">
		<a href="#"><b>Betwixt</b>Booking</a>
	  </div>
		<!-- /.login-logo -->
		<div class="login-box-body">
		<p class="login-box-msg">Please choose and enter in the correct information to login:</p>
 
				
		

			<!-- start PHP code -->
			<?php
			 
				mysql_connect("localhost", "hmbock", "team@480") or die(mysql_error()); // Connect to database server(localhost) with username and password.
				mysql_select_db("hmbock") or die(mysql_error()); // Select prdaram database.

				$selected_radio = $_POST['chooseone'];
	 
				if (isset($_POST['username']) && !empty($_POST['username']) AND isset($_POST['password']) && !empty($_POST['password'])) {
					//if selected radio button is Student
					if ($selected_radio == 'student') {
						$username = mysql_escape_string($_POST['username']); // Set variable for the username
						$password = mysql_escape_string(md5($_POST['password'])); // Set variable for the password and convert it to an MD5 hash.

						$search = mysql_query("SELECT stu_username, stu_password, stu_active FROM Student WHERE stu_username= '".$username."' AND stu_password= '".$password."' AND stu_active='1'") or die(mysql_error()); 
								//selects the fields username, password, and active from the table where username field matches the $username given, password field matches the $password givenm and active field is set to 1 (active = 1 makes sure you can only login if your account has been activated)

						$match  = mysql_num_rows($search); //records the number of rows that have matched the search

						//if the account has been found, start session
						if($match > 0){
							session_start();                                                                                                                           
						  $_SESSION['username'] = $_POST['username'];
						  header("Location:http://www.secs.oakland.edu/~hmbock/index.php"); //bring up Student portal with Student calendar
						  

						}
						//if the account has not been found, show an error message
						else{
							$msg = 'Login Failed! Please make sure that you enter the correct details and that you have activated your account.';
						}
					}
					//if selected radio button is Staff
					else{
						$username = mysql_escape_string($_POST['username']); // Set variable for the username
						$password = mysql_escape_string(md5($_POST['password'])); // Set variable for the password and convert it to an MD5 hash.

						$search = mysql_query("SELECT staff_username, staff_password, staff_active FROM Staff WHERE staff_username='".$username."' AND staff_password='".$password."' AND staff_active='1'") or die(mysql_error()); 
								//selects the fields username, password, and active from the table where username field matches the $username given, password field matches the $password givenm and active field is set to 1 (active = 1 makes sure you can only login if your account has been activated)

						$match  = mysql_num_rows($search); //records the number of rows that have matched the search

						if($match > 0){
						  session_start();
						  
						  while ($row = mysql_fetch_array($search)) {
                					$_SESSION['id'] = $row["stu_id"];
              					  }
						  
						 $_SESSION['username'] = $_POST['username'];
						  header("Location:http://www.secs.oakland.edu/~hmbock/staffBetwixtBooking.php"); //bring up Staff portal with Staff calendar
						  
							// Works if session cookie was accepted
							//echo '<br /><a href="betwixtBooking.php">page 2</a>';

							// Or maybe pass along the session id, if needed
							//echo '<br /><a href="betwixtBooking.php?' . SID . '">page 2</a>';  
						}else{
							$msg = 'Login Failed! Please make sure that you enter the correct details and that you have activated your account.';
						}
					}
				}

				 
			?>
			<!-- stop PHP Code -->

					
						<!-- start sign in form --> 
					
					<form action="" form method="post">
							<input type="radio" name="chooseone" value="student" checked>Student<br>
							<input type="radio" name="chooseone" value="staff"> Staff<br>
						
						  <div class = "form-group has-feedback">
							 
							<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
							<input type="text" class="form-control" name="username" placeholder="Username/Email" />
						
						</div>
						 <div class = "form-group has-feedback">
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							<input type="password" class="form-control" name="password" placeholder="Password" />
						</div>
						
						  <div class="row">
							<div class="col-xs-8">
								<div class="checkbox icheck">
									<label>
									  <input type="checkbox"> Remember Me
									</label>
								</div>
							</div>		
						<!-- /.col -->
							<div class="col-xs-4">
								<button type="submit" class="submit_button" class="btn btn-primary btn-block btn-flat">Sign In</button>	
							</div>
        <!-- /.col -->
						</div>
							 
			</form>				<!-- end sign in form -->
							 
		<a href="http://www.secs.oakland.edu/~hmbock/forgotPassword.php"> Forgot Password </a> <br>
		<a href="signup.php" class="text-center">Create an Account</a>
	 </div>
	 
<!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
						
						
							 <p>
								<?php echo $msg; ?> 
							</p>
									
						 
					 
			
	

 </body>
 </html>

<!-- start PHP code -->
        <?php
         
            mysql_connect("localhost", "hmbock", "team@480") or die(mysql_error()); // Connect to database server(localhost) with username and password.
            mysql_select_db("hmbock") or die(mysql_error()); // Select database_name database.

            if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
                // Verify data
                $email = mysql_escape_string($_GET['email']); // Set email variable
                $hash = mysql_escape_string($_GET['hash']); // Set hash variable

                $search = mysql_query("SELECT stu_email, stu_hash, stu_active FROM Student WHERE stu_email='".$email."' AND stu_hash='".$hash."' AND stu_active='0'") or die(mysql_error()); 
                $match  = mysql_num_rows($search); //records the number of rows that have matched the search

                if($match > 0){
                    // We have a match, activate the account
                    mysql_query("UPDATE Student SET stu_active='1' WHERE stu_email='".$email."' AND stu_hash='".$hash."' AND stu_active='0'") or die(mysql_error()); //change active to 1 where the email, hash and field active = 0 match up

                    $message = "Your account has been activated, you can now login.";
                    
                }else{
                    // No match -> invalid url or account has already been activated.
                    $message = "The url is either invalid or you have already activated your account.";
                }

            }else{
                // Invalid approach
                $message = "Invalid approach, please use the link that has been sent to your email";
            }
             
        ?>
        <!-- stop PHP Code -->
<!DOCTYPE html>
<html lang="en">
    <head>
		  <meta charset="utf-8">
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <title>Betwixt Booking | Student Account Verification</title>
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
				<a href="index.html"><b>Betwixt</b>Booking</a>
			</div>

			<div class="register-box-body">
				<p class="login-box-msg">Welcome</p>

				<p>
				<?php echo $message; ?>
				</p>
			   
				   <td>
						<a href ="index.html"><button type="button" class="btn btn-block btn-primary btn-lg">Home</button></a>
					</td>
		  </div>

		</div>

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

  </body>
</html>




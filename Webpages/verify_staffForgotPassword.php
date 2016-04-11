<html>
 <head>
 <title>Betwixt > Betwixt Booking Forgot Password Verification</title> 
    <meta charset = "UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
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
				<p class="login-box-msg"> <?php echo $msg; ?></p>



        <!-- start PHP code -->
        <?php
         
            mysql_connect("localhost", "hmbock", "team@480") or die(mysql_error()); // Connect to database server(localhost) with username and password.
            mysql_select_db("hmbock") or die(mysql_error()); // Select prdaram database.

         
 
            if (isset($_POST['passCode']) && !empty($_POST['passCode'])) {
		
		$passCode = mysql_escape_string(md5($_POST['passCode'])); // Set variable for the username

                $search = mysql_query("SELECT forgotPassVerification, staff_username FROM Staff WHERE forgotPassVerification='".$passCode."'") or die(mysql_error()); 


                    $match  = mysql_num_rows($search); //records the number of rows that have matched the search
                    $searchUsername = mysql_query("SELECT staff_username FROM Staff WHERE passwordVerification='".$passCode."'");
                    $username=mysql_result("$searchUsername");
                    if($match > 0){
                         session_start();                                                                                                                           
                      $_SESSION['username'] = $username;
                      header("Location:http://www.secs.oakland.edu/~hmbock/betwixtBooking.php");
                    }else{
                        $msg = $searchUsername; //'Login Failed! Please make sure that you enter the correct details and that you have activated your account.';
                    }
                }
                else{
                    $msg = 'Please enter your verification code';
                }
            

             
        ?>
        <!-- stop PHP Code -->


        
         
  
         
                <!-- start sign in form --> 
        
        <form action="" form method="post">
        <fieldset>  
                 
          <div class="form-group">
            <label for="passCode">Verification Code:</label>
            <input type="text" name="passCode" placeholder="Verification Code" value="" />
          </div>
             
             <p>
            <input type="submit" class="submit_button" value="Sign In" />
            </p>
          <p>  
	 <?php echo $msg; ?>
	</p>

        </fieldset>
        
        </form>
        <!-- end sign in form --> 
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


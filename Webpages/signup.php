<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Betwixt Booking | Registration Page</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">

        
        <!-- start php code -->
         
        <?php            
            // Establish database connection
            mysql_connect("localhost", "hmbock", "team@480") or die(mysql_error()); // Connect to database server(localhost) with username and password.
            mysql_select_db("hmbock") or die(mysql_error()); // Select database_name database.
            //Successfully have established a connection with the database.
            $selected_radio = $_POST['chooseone'];                        
           //if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['email']) && !empty($_POST['email'])){
            if(isset($_POST['firstName']) && !empty($_POST['firstName']) AND isset($_POST['lastName']) && !empty($_POST['lastName']) AND isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['username']) && !empty($_POST['username']) AND isset($_POST['password']) && !empty($_POST['password'])) {
            // Check if form is submited and fields are not empty                                              
                
                //if student radio button is selected
                if ($selected_radio == 'student')
                {            
                    $firstName = mysql_escape_string($_POST['firstName']); // Turn our posted name into a local variable
                    $lastName = mysql_escape_string($_POST['lastName']); // Turn our posted name into a local variable
                    $email = mysql_escape_string($_POST['email']); // Turn our posted email into a local variable
                    $username = mysql_escape_string($_POST['username']); // Turn our posted name into a local variable
                    $password = mysql_escape_string($_POST['password']); // Turn our posted name into a local variable                    
                    $search = mysql_query("SELECT stu_email FROM Student WHERE stu_email= '".$email."'") or die(mysql_error()); 
                            //selects the fields username, password, and active from the table where username field matches the $username given, password field matches the $password givenm and active field is set to 1 (active = 1 makes sure you can only login if your account has been activated)
                    $match  = mysql_num_rows($search); //records the number of rows that have matched the search
                    //if the email entered is not found in database, return Success and create an account
                    if($match == 0)
                    {                   
                        // Return Success - Valid Email
                        $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been sent to your email.';
                        $hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.                                                                                // Example output: f4552671f8909587cf485ea990207f3b                      
                        //insert following info into database
                        mysql_query("INSERT INTO Student (F_Name,L_Name,stu_username, stu_password, stu_email, stu_hash) VALUES(
                        '". mysql_escape_string($firstName) ."', 
                        '". mysql_escape_string($lastName) ."', 
                        '". mysql_escape_string($username) ."', 
                        '". mysql_escape_string(md5($password)) ."', 
                        '". mysql_escape_string($email) ."', 
                        '". mysql_escape_string($hash) ."') ") or die(mysql_error());  
                    
                    //Send Verification Email 

                    $to      = $email; // Send email to our user
                    $subject = 'Betwixt Booking Signup | Verification'; // Give the email a subject 
                    $message = '                   
                    Thanks for signing up!
                    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.                    
                    ------------------------
                    Username: '.$username.'
                    ------------------------                    
                    Please click this link to activate your account:
                    http://www.secs.oakland.edu/~hmbock/verify_student.php?email='.$email.'&hash='.$hash.' 
                     
                    '; // Our message above including the link. *** CHANGE THE URL ***
                                         
                    $headers = 'From:noreply@secs.oakland.edu' . "\r\n"; // Set from headers //*** CHANGE THE URL ***
                    mail($to, $subject, $message, $headers); // Send our email
                  }
                  //if the email entered has been found in the database, message will be shown that account cannot be created.
                  else
                    {
                      $msg = 'This email has already been registered. Please login with this email or create new account with different email';
                    }
            }
            
            //if selected radio button is Staff
            else{
                    $firstName = mysql_escape_string($_POST['firstName']); // Turn our posted name into a local variable
                    $lastName = mysql_escape_string($_POST['lastName']); // Turn our posted name into a local variable
                    $email = mysql_escape_string($_POST['email']); // Turn our posted email into a local variable
                    $username = mysql_escape_string($_POST['username']); // Turn our posted name into a local variable
                    $password = mysql_escape_string($_POST['password']); // Turn our posted name into a local variable

                    $search = mysql_query("SELECT staff_email FROM Staff WHERE staff_email= '".$email."'") or die(mysql_error()); 
                            //selects the fields username, password, and active from the table where username field matches the $username given, password field matches the $password givenm and active field is set to 1 (active = 1 makes sure you can only login if your account has been activated)
                    $match  = mysql_num_rows($search); //records the number of rows that have matched the search
                    if($match == 0){                    
                    // Return Success - Valid Email
                        $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
                        $hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
                                                    // Example output: f4552671f8909587cf485ea990207f3b
                         //insert following info into database                     
                        mysql_query("INSERT INTO Staff (F_Name,L_Name,staff_username, staff_password, staff_email, staff_hash) VALUES(
                        '". mysql_escape_string($firstName) ."', 
                        '". mysql_escape_string($lastName) ."', 
                        '". mysql_escape_string($username) ."', 
                        '". mysql_escape_string(md5($password)) ."', 
                        '". mysql_escape_string($email) ."', 
                        '". mysql_escape_string($hash) ."') ") or die(mysql_error());
                    $to      = $email; // Send email to our user
                    $subject = 'Betwixt Booking Signup | Verification'; // Give the email a subject 
                    $message = '                   
                    Thanks for signing up!
                    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.                     
                    ------------------------
                    Username: '.$username.'
                    ------------------------                   
                    Please click this link to activate your account:
                    http://www.secs.oakland.edu/~hmbock/verify_staff.php?email='.$email.'&hash='.$hash.'      
                    '; // Our message above including the link //*** CHANGE THE URL ***                       
                    $headers = 'From:noreply@secs.oakland.edu' . "\r\n"; // Set from headers //*** CHANGE THE URL ***
                    mail($to, $subject, $message, $headers); // Send our email
                    }
                    else{
                    $msg = 'This email has already been registered. Please login with this email or create new account with different email';
                    }
            }
            }else{
              $msg = ' ';
              }
             
        ?>

        <!-- stop php code -->

<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Betwixt</b>Booking</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Sign up for an Account</p>

    <form action="signup.php" method="post">
					<input type="radio" name="chooseone" value="student" checked> Student<br> 
					<input type="radio" name="chooseone" value="staff"> Staff<br> 
					
      <div class="form-group has-feedback">
        <input type="text" id="firstName" name="firstName" class="form-control" placeholder="First Name" value="" maxlength="50">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  <div class="form-group has-feedback">
        <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Last Name" value="" maxlength="50">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" id="email" name="email"  placeholder="Email" value="" maxlength="50" >
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
	  <div class="form-group has-feedback">
        <input type="username" class="form-control" id="username" name="username"  placeholder="Username" value="" maxlength="50" >
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control"  id="password1" name="password1" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="password" name="password" value="" placeholder="Retype password" maxlength="50">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
       
        <!-- /.col -->
        <div class="col-xs-4">
		<td>
          <button type="submit" class="btn btn-primary btn-lg">Register</button>
        </div>
		</td>
		<p>
					<?php echo $msg; ?> 
                </p>
        <!-- /.col -->
      </div>
    </form>

	<br>
		<br>
		
				<td>
                    <a href ="index.html"><button type="button" class="btn btn-block btn-default">Back</button></a>	
                  </td>
  

  
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

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

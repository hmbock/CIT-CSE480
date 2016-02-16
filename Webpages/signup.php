<!DOCTYPE html> 

<html>

    <head>
        <title>Betwixt Booking Create Account</title> 
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
            <h1> Betwixt Booking Create Account </h1>
        </div>
      </header>
      <div id="wrapper">
    
        <main role ="main">
				<nav>
					<ul>
					  <li><a href="http://secs.oakland.edu/~hmbock/480Index.php"><i class="fa fa-home"></i>&nbsp;Home</a></li>
					  <li><a href="http://secs.oakland.edu/~hmbock/about.html"><i class="fa fa-circle"></i>&nbsp;About</a></li>
					  <li><a href="http://secs.oakland.edu/~hmbock/signUp.php"><i class="fa fa-circle"></i>&nbsp;Sign Up</a></li>
					  <li><a href="http://secs.oakland.edu/~hmbock/login.php"><i class="fa fa-circle"></i> &nbsp; Login</a></li>
					  <li><a href="http://secs.oakland.edu/~hmbock/help.php"><i class="fa fa-circle"></i> &nbsp;Help</a></li>
            <li><a href="#blank"></a></li>
					  <li><a href="blank"></a></li>
            <li><a href="#blank"></a></li>
					  <li><a href="blank"></a></li>
					</ul>
				</nav>	
        
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
                    if($match == 0)
                    {                   
                        // Return Success - Valid Email
                        $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
                        $hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.                                                                                // Example output: f4552671f8909587cf485ea990207f3b                      
                        //insert following info into database
                        mysql_query("INSERT INTO Student (F_Name,L_Name,stu_username, stu_password, stu_email, stu_hash) VALUES(
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
                    http://www.secs.oakland.edu/~hmbock/verify_student.php?email='.$email.'&hash='.$hash.' 
                     
                    '; // Our message above including the link //*** CHANGE THE URL ***
                                         
                    $headers = 'From:noreply@secs.oakland.edu' . "\r\n"; // Set from headers //*** CHANGE THE URL ***
                    mail($to, $subject, $message, $headers); // Send our email
                  }
                  else
                    {
                      $msg = 'This email has already been registered. Please login with this email or create new account with different email';
                    }
            }
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
              $msg = 'Please enter information for registration';
              }
             
        ?>

        <!-- stop php code -->

        <div id = "content" >
            <h3>Please choose and enter in the correct information to create your account:</h3>

            

            <!-- start sign up form -->  
            <form action="signUp.php" method="post">
              <fieldset>
                <div class="form-group"> <!--radio buttons-->
					<input type="radio" name="chooseone" value="student" checked> Student<br> 
					<input type="radio" name="chooseone" value="staff"> Staff<br> 
                </div>
                <fieldset>
            <div class="form-group"> <!--registration form -->
				<label for="firstName">First Name:</label>
				<input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="" maxlength="50" />
            
				<label for="lastName">Last Name:</label>
				<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="" maxlength="50" />
					 
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="Email" maxlength="50" />

				<label for="username">Username:</label>
				<input type="text" class="form-control" id="username" name="username" placeholder="username" value="" maxlength="50" />
					  
				<label  for="password">Password:</label>
				<input type="password" class="form-control" id="password" placeholder ="Password" name="password" value="" maxlength="50" />
		
                <p>
                <input type="submit" class="submit_button" value="Sign up" />
                </p>
                </fieldset>
                <p>
					<?php echo $msg; ?> 
                </p>
               </div>
            </form>
            <!-- end sign up form -->
          
    </div>
		</div>
    </body>
</html>



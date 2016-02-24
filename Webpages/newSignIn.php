<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login/Sign-In</title>
    <link rel="stylesheet" href="normalize.css">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
	<link rel="stylesheet" href="style.css">
	
	 <meta name= "viewport" content= "width= device-width, initial-scale=1.0">
          <link href="betwixt.css" rel="stylesheet">
          <link rel="stylesheet" href="C:\Users\lkwal_000\Google Drive\CIT_CSE 480\Production\css\font-awesome-4.5.0\css\font-awesome.min.css">
          <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
          <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">
          <link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    
	
	
  </head>

  <body>
		
		   <div id="wrapper">
		   <header>
			<div class="title">
				<h1> Betwixt Booking Create Account </h1>
			</div>
		  </header>
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
		
		 	<?php
			 
				mysql_connect("localhost", "hmbock", "team@480") or die(mysql_error()); // Connect to database server(localhost) with username and password.
				mysql_select_db("hmbock") or die(mysql_error()); // Select prdaram database.

				$selected_radio = $_POST['chooseone'];
	 
				if (isset($_POST['username']) && !empty($_POST['username']) AND isset($_POST['password']) && !empty($_POST['password'])) {

					if ($selected_radio == 'student') {
						$username = mysql_escape_string($_POST['username']); // Set variable for the username
						$password = mysql_escape_string(md5($_POST['password'])); // Set variable for the password and convert it to an MD5 hash.

						$search = mysql_query("SELECT stu_username, stu_password, stu_active FROM Student WHERE stu_username= '".$username."' AND stu_password= '".$password."' AND stu_active='1'") or die(mysql_error()); 
								//selects the fields username, password, and active from the table where username field matches the $username given, password field matches the $password givenm and active field is set to 1 (active = 1 makes sure you can only login if your account has been activated)

						$match  = mysql_num_rows($search); //records the number of rows that have matched the search

						if($match > 0){
							session_start();                                                                                                                           
						  $_SESSION['username'] = $_POST['username'];
						  header("Location:http://www.secs.oakland.edu/~hmbock/myCalendar.php");
						  

						}else{
							$msg = 'Login Failed! Please make sure that you enter the correct details and that you have activated your account.';
						}
					}
					else{
						$username = mysql_escape_string($_POST['username']); // Set variable for the username
						$password = mysql_escape_string(md5($_POST['password'])); // Set variable for the password and convert it to an MD5 hash.

						$search = mysql_query("SELECT staff_username, staff_password, staff_active FROM Staff WHERE staff_username='".$username."' AND staff_password='".$password."' AND staff_active='1'") or die(mysql_error()); 
								//selects the fields username, password, and active from the table where username field matches the $username given, password field matches the $password givenm and active field is set to 1 (active = 1 makes sure you can only login if your account has been activated)

						$match  = mysql_num_rows($search); //records the number of rows that have matched the search

						if($match > 0){
						  session_start();
						 // $_SESSION['username'] = 'hello';
						  //header("Location:http://www.secs.oakland.edu/~hmbock/betwixtBooking.php");
						  
	// Works if session cookie was accepted
	echo '<br /><a href="betwixtBooking.php">page 2</a>';

	// Or maybe pass along the session id, if needed
	echo '<br /><a href="betwixtBooking.php?' . SID . '">page 2</a>';  
						}else{
							$msg = 'Login Failed! Please make sure that you enter the correct details and that you have activated your account.';
						}
					}
				}

				 
			?>
			<div id="content">
				<div class="logmod__container">
					<ul class="logmod__tabs">
						<li data-tabtar="lgm-2"><a href="#">Login</a></li>
						<li data-tabtar="lgm-1"><a href="#">Sign Up</a></li>
					 </ul>
					<div class="logmod__tab-wrapper">
						<div class="logmod__tab lgm-1"> 
							<div class="logmod__heading">
								<span class="logmod__heading-subtitle">Enter your personal details <strong>to create an acount</strong></span>
							</div>
						
						<div class="logmod__form">
						  <form accept-charset="utf-8" action="#" class="simform">
							<div class="sminputs">
							 <div class="input full">
								<label class="string optional" for="firstName">First Name</label>
								<input class="string optional" maxlength="255" id="firstName" placeholder="First Name" type="text" size="50" />
							  </div>
							  <div class="input full">
								<label class="string optional" for="lastName">Last Name</label>
								<input class="string optional" maxlength="255" id="lastName" placeholder="Last Name" type="text" size="50" />
							  </div>
							  <div class="input full">
								<label class="string optional" for="email">Email*</label>
								<input class="string optional" maxlength="255" id="email" placeholder="Email" type="email" size="50" />
							  </div>
							   <div class="input full">
								<label class="string optional" for="username">Username*</label>
								<input class="string optional" maxlength="255" id="username" placeholder="Username" type="username" size="50" />
							  </div>
							</div>
							<div class="sminputs">
							  <div class="input string optional">
								<label class="string optional" for="user-pw">Password *</label>
								<input class="string optional" maxlength="255" id="user-pw" placeholder="Password" type="text" size="50" />
							  </div>
							  <div class="input string optional">
								<label class="string optional" for="password">Repeat password *</label>
								<input class="string optional" maxlength="255" id="password" placeholder="Repeat password" type="text" size="50" />
							  </div>
							</div>
							<div class="simform__actions">
							  <input class="sumbit_button" name="commit" type="sumbit" value="Sign up" />
							  <span class="simform__actions-sidetext">By creating an account you agree to our <a class="special" href="#" target="_blank" role="link">Terms & Privacy</a></span>
							</div> 
						  </form>
						</div> 
						
					</div>
					
					 <div class="logmod__tab lgm-2">
						<div class="logmod__heading">
						  <span class="logmod__heading-subtitle">Enter your Username and password <strong>to sign in</strong></span>
						</div> 
						
						<div class="logmod__form">
						  <form accept-charset="utf-8" action="#" class="simform">
							<div class="sminputs">
							  <div class="input full">
								<label class="string optional" for="username">Username *</label>
								<input class="string optional" maxlength="255" id="username" placeholder="Username" type="username" size="50" />
							  </div>
							</div>
							<div class="sminputs">
							  <div class="input full">
								<label class="string optional" for="password">Password *</label>
								<input class="string optional" maxlength="255" id="password" placeholder="Password" type="password" size="50" />
														<span class="hide-password">Show</span>
							  </div>
							</div>
							
							<div class="simform__actions">
							  <input class="submit_button" name="commit" type="submit" value="Log In" />
							  <span class="simform__actions-sidetext"><a class="special" role="link" href="#">Forgot your password?<br>Click here</a></span>
							</div> 
							 <p>
								<?php echo $msg; ?> 
							</p>
						  </form>
						</div>  
					  </div>
				</div>
			</div>
		 </div>
		 </main>
		 <footer role="contentinfo">
					Copyright &copy; 2016 Betwixt Booking<br>
					<a href="mailto:betwixtbooking@gmail.com">
						<address>BetwixtBooking@gmail.com</address>
					</a>
				</footer>
	</div>
		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="index.js"></script>

    
    
    
  </body>
</html>

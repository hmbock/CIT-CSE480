<?php
session_start();
?>
<?php

$servername = 'localhost';
					$dbusername = 'hmbock';
					$dbpassword = 'team@480';
					$dbname = 'hmbock';

					mysql_connect("localhost", "hmbock", "team@480") or die(mysql_error()); // Connect to database server(localhost) with username and password.
          mysql_select_db("hmbock") or die(mysql_error()); // Select hmbock database.

$username= $_SESSION['username'];


$data = "SELECT F_Name, L_Name, staff_email FROM Staff WHERE staff_username='$username'";

$query = mysql_query($data);

$data2 = mysql_fetch_array($query);

	
			if(!isset($_POST['firstName']) && !empty($_POST['firstName']) OR !isset($_POST['lastName']) && !empty($_POST['lastName']) OR !isset($_POST['email']) && !empty($_POST['email']))
				{
					$msg = 'Please input updated account information';
				}
				else
    {
					// insert into database
                  $newFirstName = ($_POST['firstName']);
          				$newLastName= ($_POST['lastName']);
				          $newEmail = ($_POST['email']);
          				$newUsername= ($_POST['username']);
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
           
            
            if(isset($_POST['firstName']) && !empty($_POST['firstName']) OR isset($_POST['lastName']) && !empty($_POST['lastName']) OR isset($_POST['email']) && !empty($_POST['email']))
            { 
                $newFirstName = mysql_escape_string($_POST['firstName']); // Set variable for the username
		            $newlastName = mysql_escape_string($_POST['lastName']); // Set variable for the username
                $newEmail = mysql_escape_string($_POST['email']); // Set variable for the username
		            $newUsername = mysql_escape_string($_POST['username']); // Set variable for the username

                
                      if($search = mysql_query("SELECT F_Name, L_Name, staff_email FROM Staff WHERE staff_username='$username'")) 
                    {
                          $match  = mysql_num_rows($search); //records the number of rows that have matched the search
                              if($match > 0)
                              {
                                $msg ='Account has been updated!'; 
                                $updatedFirstName = ($newFirstName);
                                $updatedLastName = ($newLastName);
                                $updatedEmail = ($newEmail);
                               
                                mysql_query("UPDATE Staff SET F_Name = '$updatedFirstName', L_Name = '$updatedLastName', staff_email = '$updatedEmail' WHERE staff_username='$username'");
                                header("location:http://www.secs.oakland.edu/~hmbock/updateInfo.php");    
                              } 
                    
                              elseif($search = mysql_query("SELECT F_Name, L_Name, staff_email FROM Staff WHERE staff_username='$username'")) 
                              {
                                $match  = mysql_num_rows($search); //records the number of rows that have matched the search
                                    if($match > 0)
                                    {
                                        $msg ='Account has been updated!'; 
                                        $updatedFirstName = ($newFirstName);
                                        $updatedLastName = ($newLastName);
                                        $updatedEmail = ($newEmail);
                                                                             
                                             
                                         mysql_query("UPDATE Staff SET F_Name = '$updatedFirstName', L_Name = '$updatedLastName', staff_email = '$updatedEmail' WHERE staff_username='$username'"); 
                                
                                  header("location:http://www.secs.oakland.edu/~hmbock/staffUpdateInfo.php");

                                    }
                                    else
                                    {
                                     $msg = 'Cannot locate account'; //returns if no match found
                                    }
                              }     
                             else
                             {
                                $msg = 'Cannot locate account'; //returns if no match found
                             }
                  }
                  else
                  {
                    $msg = 'Cannot locate account'; 
                  } 
                  }
                  
              
                  else{
                $msg = ''; 
                 } 
				}
     
    
			catch(Exception $e)
				{
				//Couldn't connect to database
				$msg = 'Unable to connect. Please try again later';
				}


	if(isset($_POST['delete'])) {
                                                try {
                                                        mysql_connect("localhost", "hmbock", "team@480") or die(mysql_error()); // Connect to database server(localhost) with username and password.
                                                        mysql_select_db("hmbock") or die(mysql_error()); // Select prdaram database.

                                                        if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {


                                                                 header('location:http://www.secs.oakland.edu/~hmbock/confirmDeleteAccount.php');

                                                        }
                                                } catch(Exception $e) {
                                                        $msg = 'Unable to connect. Please try again later.';
                                                }
                                        }

}
?>
  
                                              
          
<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Betwixt Booking | Manage Account</title>
		<meta charset="utf-8"> 
		<meta name= "viewport" content= "width= device-width, initial-scale=1.0">
		
	
		<link href="staffStylesheet.css" rel="stylesheet">
	</head>
	
	<body>
			
		<div id="wrapper">
			<header>
				<h1> Account Settings</h1>
			</header>
			
			<main role ="main">
				<nav>
					<ul>
					  <li>Username: <?php echo $_SESSION['username']; ?> </li> 
					  <li><a href="http://secs.oakland.edu/~hmbock/staffBetwixtBooking.php">&nbsp;<i class="fa fa-home"></i>&nbsp;Home</a></li>
					  <li><a href="http://secs.oakland.edu/~hmbock/manageAvailability.php">&nbsp;<i class="fa fa-share"></i>&nbsp;Manage Availability</a></li>
					   <li><a href="http://secs.oakland.edu/~hmbock/staffscheduleApp.php">&nbsp;<i class="fa fa-plus-circle"></i>&nbsp;Schedule Appointment</a></li>
					  <li><a href="staffPhonebook.php">&nbsp;<i class="fa fa-phone-square"></i>&nbsp;Contacts</a></li>
					  <!--<li><a href="http://secs.oakland.edu/~hmbock/accountSettings.php"><i class="fa fa-circle"></i> &nbsp; Manage Account</a></li>-->
					  <li><a href="logout.php">&nbsp;<i class="fa fa-sign-out"></i>&nbsp;Logout</a></li>
				
					</ul>
				</nav>	
			
			
				<div id="content">
							<h2> User Profile </h2>
							<h3>Enter new account information and submit to update:</h3>
            <!-- start sign up form -->  
							<form action="accountSettings.php" method="post">
							
							  <fieldset>
					  
									<div class="form-group">
												  <label for="firstName">First Name:</label>
												  <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo $data2[F_Name] ?>" maxlength="20" />
									
											<label for="lastName">Last Name:</label>
											 <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="<?php echo $data2[L_Name] ?>" maxlength="20" />
											 
												  <label for="email">Email:</label>
												  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $data2[staff_email] ?>" maxlength="20" />
											
								
											<label for="username">Username:   <?php echo $_SESSION['username']; ?><strong></strong></label>
												  
											<p><h3><a href="http://secs.oakland.edu/~hmbock/changePassword.php">Change Password</a></h3></p>
						   
								
											<p>
											<input type="submit" class="submit_button" value="Update Account Info" />
											</p>

											<p>
												<input type="submit" class="submit_button" name="delete" value="Delete Account">
											</p>
							   
											   <p>
												<?php echo $msg; ?> 
												</p>
								
									</div>
								 </fieldset>
							</form>
            <!-- end sign up form -->
          
				</div>
			</main>
			
			<footer role="contentinfo">
				Copyright &copy; 2016 Betwixt Booking<br>
				<a href="mailto:betwixtbooking@gmail.com">
					<address>BetwixtBooking@gmail.com</address>
				</a>
			</footer>
		</div>
		
	</body>
	
	
	
</html>


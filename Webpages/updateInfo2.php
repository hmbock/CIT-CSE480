<?php

session_start();

	
		//make sure username and password is input
			if(!isset($_POST['firstName']) && !empty($_POST['firstName']) OR !isset($_POST['lastName']) && !empty($_POST['lastName']) OR !isset($_POST['email']) && !empty($_POST['email']) OR !isset($_POST['username']) && !empty($_POST['username']))
				{
					$message = 'Please input updated account information';
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
            mysql_select_db("hmbock") or die(mysql_error()); // Select hmbock database.
           
            
            if(isset($_POST['firstName']) && !empty($_POST['firstName']) OR isset($_POST['lastName']) && !empty($_POST['lastName']) OR isset($_POST['email']) && !empty($_POST['email']) OR isset($_POST['username']) && !empty($_POST['username']))
            { 
                $newFirstName = mysql_escape_string($_POST['firstName']); // Set variable for the username
		            $newlastName = mysql_escape_string($_POST['lastName']); // Set variable for the username
                $newEmail = mysql_escape_string($_POST['email']); // Set variable for the username
		            $newUsername = mysql_escape_string($_POST['username']); // Set variable for the username

                
                      if($search = mysql_query("SELECT F_Name, L_Name,staff_email, staff_username FROM Staff WHERE staff_username='$username'")) 
                    {
                          $match  = mysql_num_rows($search); //records the number of rows that have matched the search
                              if($match > 0)
                              {
                                $updatedFirstName = ($newFirstName);
                                $updatedLastName = ($newLastName);
                                $updatedEmail = ($newEmail);
                                $updatedUsername = ($newUsername);
                                mysql_query("UPDATE Staff SET F_Name = '$updatedFirstName', L_Name = '$updatedLastName', staff_email = '$updatedEmail', staff_username = '$updatedUsername' WHERE staff_username='$username'");
                                $message='Account has been updated!';        
                              } 
                    
                              elseif($search = mysql_query("SELECT F_Name, L_Name,staff_email, staff_username FROM Staff WHERE staff_username='$username'")) 
                              {
                                $match  = mysql_num_rows($search); //records the number of rows that have matched the search
                                    if($match > 0)
                                    {
                                        $updatedFirstName = ($newFirstName);
                                        $updatedLastName = ($newLastName);
                                        $updatedEmail = ($newEmail);
                                        $updatedUsername = ($newUsername);
                                        
                                        $message='Account has been updated!';
                                             
                                         mysql_query("UPDATE Student SET F_Name = '$updatedFirstName', L_Name = '$updatedLastName', stu_email = '$updatedEmail', stu_username = '$updatedUsername' WHERE stu_username='$username'"); 
                                  
                                    }
                                    else
                                    {
                                     $message = 'Cannot locate account'; //returns if no match found
                                    }
                              }     
                             else
                             {
                                $message = 'Cannot locate account'; //returns if no match found
                             }
                  }
                  else
                  {
                    $message = 'Cannot locate account'; 
                  } 
                  }
                  
              
                  else{
                $message = 'Account has been updated!'; 
                 } 
				}
     
    
			catch(Exception $e)
				{
				//Couldn't connect to database
				$message = 'Unable to connect. Please try again later';
				}
}
?>



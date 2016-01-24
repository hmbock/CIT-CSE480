<html>
 <head>
 <title>Betwixt > LOGIN</title> 
	<meta charset = "UTF-8">
	<link rel= "stylesheet" type="text/css"
	
	<link href='http://fonts.googleapis.com/css?family=Vast+Shadow' rel='stylesheet' type='text/css'>
    <link href="betwixt.css" rel="stylesheet">

	
 </head>

 <body>
 <a href="http://www.secs.oakland.edu/~prdaram/appointment/signup.php"> Sign Up </a>

 <h3>Betwixt > Log In </h3> 

        <!-- start PHP code -->
        <?php
         
            mysql_connect("localhost", "prdaram", "Pranusha123") or die(mysql_error()); // Connect to database server(localhost) with username and password.
            mysql_select_db("prdaram") or die(mysql_error()); // Select prdaram database.
            
            if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['password']) && !empty($_POST['password'])){
                // Both fields are being posted and there not empty

                $username = mysql_escape_string($_POST['name']); // Set variable for the username
                $password = mysql_escape_string(md5($_POST['password'])); // Set variable for the password and convert it to an MD5 hash.

                $search = mysql_query("SELECT username, password, active FROM users WHERE username='".$username."' AND password='".$password."' AND active='1'") or die(mysql_error()); 
                        //selects the fields username, password, and active from the table where username field matches the $username given, password field matches the $password givenm and active field is set to 1 (active = 1 makes sure you can only login if your account has been activated)

                $match  = mysql_num_rows($search); //records the number of rows that have matched the search

                if($match > 0){
                    $msg = 'Login Complete! Thanks';
                    // Set cookie / Start Session / Start Download etc...
                }else{
                    $msg = 'Login Failed! Please make sure that you enter the correct details and that you have activated your account.';
                }
            }
             
        ?>
        <!-- stop PHP Code -->
     
        <!-- title and description -->    
        <p>Please enter your name and password to login</p>
         
        <?php 
            if(isset($msg)){ // Check if $msg is not empty
                echo '<div class="statusmsg">'.$msg.'</div>'; // Display our message and add a div around it with the class statusmsg
            } 
        ?>

        <!-- start sign in form -->   
        <form class="form-inline" method="post">
            <label for="name">Username:</label>
            <input type="text" name="name" value="" />
            <label for="password">Password:</label>
            <input type="password" name="password" value="" />
             
            <input type="submit" class="submit_button" value="Sign In" />
        </form>
        <!-- end sign in form --> 

 </body>
 </html>

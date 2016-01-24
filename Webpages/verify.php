<!-- start PHP code -->
        <?php
         
            mysql_connect("localhost", "prdaram", "Pranusha123") or die(mysql_error()); // Connect to database server(localhost) with username and password.
            mysql_select_db("prdaram") or die(mysql_error()); // Select database_name database.

            if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
                // Verify data
                $email = mysql_escape_string($_GET['email']); // Set email variable
                $hash = mysql_escape_string($_GET['hash']); // Set hash variable

                $search = mysql_query("SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); 
                $match  = mysql_num_rows($search); //records the number of rows that have matched the search

                if($match > 0){
                    // We have a match, activate the account
                    mysql_query("UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); //change active to 1 where the email, hash and field active = 0 match up

                    echo '<div class="statusmsg">Your account has been activated, you can now login.</div>';
                    
                }else{
                    // No match -> invalid url or account has already been activated.
                    echo '<div class="statusmsg">The url is either invalid or you have already activated your account.</div>';
                }

            }else{
                // Invalid approach
                echo '<div class="statusmsg">Invalid approach, please use the link that has been sent to your email.</div>';
            }
             
        ?>
        <!-- stop PHP Code -->

<html>
    <head>
        <title>Betwixt > Account Verification</title>
    </head>

    <body>
    <a href="http://www.secs.oakland.edu/~prdaram/appointment/login.php"> Log In </a>
    </body>
</html>



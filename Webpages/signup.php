<!DOCTYPE html> 

<html>

    <head>
        <title>Betwixt > Sign Up</title> 
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
            <h1> Betwixt > SIGN UP </h1>
        </div>
    </header>
    <div id="wrapper">
    
        <nav>
            <ul>
                <li><a href="480Index.php">Home</a></li>
            </ul>
        </nav>

        
        <!-- start php code -->
         
        <?php
            
            // Establish database connection
            mysql_connect("localhost", "hmbock", "team@480") or die(mysql_error()); // Connect to database server(localhost) with username and password.
            mysql_select_db("hmbock") or die(mysql_error()); // Select database_name database.

            //Successfully have established a connection with the database.

            $selected_radio = $_POST['chooseone'];

            if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['email']) && !empty($_POST['email'])) {
            // Check if form is submited and fields are not empty
               
                if ($selected_radio == 'student'){
                   $name = mysql_escape_string($_POST['name']); // Turn our posted name into a local variable
                    $email = mysql_escape_string($_POST['email']); // Turn our posted email into a local variable

                    //Checks if email is in the form xxx@xxx.xxx, code snippet taken from php.net
                    if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
                        // Return Error - Invalid Email
                        $msg = 'The email you have entered is invalid, please try again.';
                    }else{
                        // Return Success - Valid Email
                        $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
                        $hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
                                                    // Example output: f4552671f8909587cf485ea990207f3b
                        $password = rand(1000,5000); // Generate random number between 1000 and 5000 and assign it to a local variable.
                                                    // Example output: 4568

                        //insert following info into database
                        mysql_query("INSERT INTO Student (stu_username, stu_password, stu_email, stu_hash) VALUES(
                        '". mysql_escape_string($name) ."', 
                        '". mysql_escape_string(md5($password)) ."', 
                        '". mysql_escape_string($email) ."', 
                        '". mysql_escape_string($hash) ."') ") or die(mysql_error());
                    }


                    $to      = $email; // Send email to our user
                    $subject = 'Signup | Verification'; // Give the email a subject 
                    $message = '
                     
                    Thanks for signing up!
                    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
                     
                    ------------------------
                    Username: '.$name.'
                    Password: '.$password.'
                    ------------------------
                     
                    Please click this link to activate your account:
                    http://www.secs.oakland.edu/~prdaram/verify_student.php?email='.$email.'&hash='.$hash.' 
                     
                    '; // Our message above including the link //*** CHANGE THE URL ***
                                         
                    $headers = 'From:noreply@secs.oakland.edu' . "\r\n"; // Set from headers //*** CHANGE THE URL ***
                    mail($to, $subject, $message, $headers); // Send our email
                }

                else{
                    $name = mysql_escape_string($_POST['name']); // Turn our posted name into a local variable
                    $email = mysql_escape_string($_POST['email']); // Turn our posted email into a local variable

                    //Checks if email is in the form xxx@xxx.xxx, code snippet taken from php.net
                    if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
                        // Return Error - Invalid Email
                        $msg = 'The email you have entered is invalid, please try again.';
                    }else{
                        // Return Success - Valid Email
                        $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
                        $hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
                                                    // Example output: f4552671f8909587cf485ea990207f3b
                        $password = rand(1000,5000); // Generate random number between 1000 and 5000 and assign it to a local variable.
                                                    // Example output: 4568

                         //insert following info into database
                        mysql_query("INSERT INTO Staff (staff_username, staff_password, staff_email, staff_hash) VALUES(
                        '". mysql_escape_string($name) ."', 
                        '". mysql_escape_string(md5($password)) ."', 
                        '". mysql_escape_string($email) ."', 
                        '". mysql_escape_string($hash) ."') ") or die(mysql_error());
                    }


                    $to      = $email; // Send email to our user
                    $subject = 'Signup | Verification'; // Give the email a subject 
                    $message = '
                     
                    Thanks for signing up!
                    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
                     
                    ------------------------
                    Username: '.$name.'
                    Password: '.$password.'
                    ------------------------
                     
                    Please click this link to activate your account:
                    http://www.secs.oakland.edu/~prdaram/verify_staff.php?email='.$email.'&hash='.$hash.' 
                     
                    '; // Our message above including the link //*** CHANGE THE URL ***
                                         
                    $headers = 'From:noreply@secs.oakland.edu' . "\r\n"; // Set from headers //*** CHANGE THE URL ***
                    mail($to, $subject, $message, $headers); // Send our email
                }
            }
             
        ?>

        <!-- stop php code -->

        <div id = "content" >
            <p>Please choose and enter in the correct information to create your account:</p>

            <?php 
            if(isset($msg)){  // Check if $msg is not empty
                echo '<div class="statusmsg">'.$msg.'</div>'; // Display our message and wrap it with a div with the class "statusmsg".
            } 
            ?>

            <!-- start sign up form -->  
            <form action="" method="post">
                <input type="radio" name="chooseone" value="student" checked> Student<br> 
                <input type="radio" name="chooseone" value="staff"> Staff<br> 
                <br>
                <label for="name">Name:</label>
                <input type="text" name="name" value="" />
                <label for="email">Email:</label>
                <input type="text" name="email" value="" />
                 
                <input type="submit" class="submit_button" value="Sign up" />
            </form>
            <!-- end sign up form -->
        </div>

    </div>
    </body>
</html>



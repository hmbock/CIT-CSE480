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

<html>
    <head>
        <title>Betwixt Booking Account Verification</title>
         <meta charset = "UTF-8">
    <meta charset="utf-8">
		<meta name= "viewport" content= "width= device-width, initial-scale=1.0">
		<link href="betwixt.css" rel="stylesheet">
		<link rel="stylesheet" href="C:\Users\lkwal_000\Google Drive\CIT_CSE 480\Production\css\font-awesome-4.5.0\css\font-awesome.min.css">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">
		<link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
 </head>
    <header>
    <h1> Betwixt Booking Account Verification </h1>
    </header>

    <body>
    
    <div id="wrapper">
	
			
			
			<main role ="main">
				<nav>
					<ul>
					  <li><a href="#home"><a href="http://secs.oakland.edu/~hmbock/480Index.php"><i class="fa fa-home"></i>&nbsp;Home</a></a></li>
					  <li><a href="#news"><a href ="http://secs.oakland.edu/~hmbock/about.php"><i class="fa fa-circle"></i>&nbsp;About</a></li>
					  <li><a href="#contact"><a href= "http://secs.oakland.edu/~hmbock/signUp.php"><i class="fa fa-plus-circle"></i>&nbsp;Sign Up</a></li>
					  <li><a href="#contact"><a href= "http://secs.oakland.edu/~hmbock/login.php"><i class="fa fa-arrow-up"></i> &nbsp; Login</a></li>
					</ul>
				</nav>
    
<div id ="content">
    <p>
    <?php echo $message; ?>
    </p>
    <br>
    <br>
    <br>
    <p>
    <a href="http://www.secs.oakland.edu/~hmbock/login.php"> Log In </a>
    <p>
</div>
</div>
    </body>
</html>




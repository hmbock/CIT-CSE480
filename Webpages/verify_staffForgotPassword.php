<html>
 <head>
 <title>Betwixt > Betwixt Booking Forgot Password Verification</title> 
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

 <body>
 
 
<header>
    <div class ="title">
       <h1>Betwixt Booking Forgot Password Verification </h1> 
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

        <div id ="content">
        
         
        <h3>Please choose and enter in the correct information to login:</h3>
         
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
        </div>
        </form>
        <!-- end sign in form --> 
</div>
</div>

 </body>
 </html>


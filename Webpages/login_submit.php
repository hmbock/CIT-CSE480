<html>
 <head>
	<title>Betwixt Booking Login Page</title> 
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
			<h1> Betwixt Booking </h1>
		<div>
	</header>
	<div id="wrapper">
	
				<nav>
					<ul>
					  <li><a href="480Index.php">Home</a></li>
					</ul>
				</nav>
				<div id = "content">
					<h2>Login Here</h2>
						<fieldset>
							<form role="form" action="login_submit.php" method="post" class="form-signin">
								<div class = "form-group"> 
 
									<label for="username">Email:</label>
									<input type="email" class="form-control" id="username" name="username" placeholder="Email" value="" maxlength="20" />
								</div>
								<div class="form-group">
									<label  for="password">Password:</label>
									<input type="password" class="form-control" id="password" placeholder ="Password" name="password" value="" maxlength="20" />
								</div>
 
								<button type="submit" "btn btn-default">Login</button>
								
								<p>
									<a href="adduser.php"> Register </a> | <a href="login_submit.php"> Forgot Password </a>
								</p>
						</fieldset>
							</form>
				</div>
 
 
 </body>
 </html>

<?php

	session_start();

		//check to see if user is already logged in 
			if(isset( $_SESSION['username'] ))
				{
					$message = 'Users is already logged in';
				}
		//make sure username and password is input
			if(!isset( $_POST['username'], $_POST['password']))
				{
					$message = 'Please enter username and password';
				}
				else
{
					// iinsert into database
					$username = ($_POST['username']);
					$password = ($_POST['password']);

					// encrypt password so it cannot be seen in the SQL table
					$password = sha1( $password );
    
					//connect to database ***/
					$servername = 'localhost';
					$dbusername = 'hmbock';
					$dbpassword = 'team@480';
					$dbname = 'hmbock';


			try
				{
					$dbh = new PDO("mysql:host=$servername;dbname=$dbusername", $dbname, $dbpassword); 
 
					$stmt = $dbh->prepare("SELECT username, password FROM login 
                    WHERE username = :username AND password = :password");


					$stmt->bindParam(':username', $username);
					$stmt->bindParam(':password', $password);

					$stmt->execute();


					$username = $stmt->fetchColumn();


					if($username == false)
						{
							$message = 'Login Failed. Incorrect username and or password';
						}

					else
						{
						//start session
							$_SESSION['username'] = $username;
							header("Location:480Index.php");

            
						}


				}
			catch(Exception $e)
				{
				//Couldn't connect to database
				$message = 'Unable to connect. Please try again later"';
				}
}
?>

<html>
	<head>
		<title>Login Page</title>
	</head>
	<body>
		<p><?php echo $message; ?>
	</body>
</html>


 


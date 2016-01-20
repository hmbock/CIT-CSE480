<html>
 <head>
 <title>Login Page</title> 
	<meta charset = "UTF-8">
	<title> Betwixt Booking Login Page </title>
	<link rel= "stylesheet" type="text/css"
	
	<link href='http://fonts.googleapis.com/css?family=Vast+Shadow' rel='stylesheet' type='text/css'>
	
 </head>

 <body>
 <a href="adduser.php"> Register </a> | <a href="login_submit.php"> Login </a>
 <header>

 <h2>Login Here</h2>
<p>

 <form class="form-inline" action="login_submit.php" method="post">

  <div class="form-group">
    <label class="sr-only" for="username">Email address</label>
    <input type="email" class="form-control" id="username" name="username"  placeholder="Email">
  </div>
  <div class="form-group">
    <label class="sr-only" for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-default">Sign in</button>
</form>

 </body>
 </html>

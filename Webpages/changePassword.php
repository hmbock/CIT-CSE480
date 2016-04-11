<?php

session_start();

	
		//make sure username and password is input
			if(!isset($_POST['newUserPassword']) && !empty($_POST['newUserPassword']) AND !isset($_POST['confirmPassword']) && !empty($_POST['confirmPassword']))
				{
					$message = 'Please enter a new password';
				}
				else
    {
					// insert into database
					$newUserPassword = ($_POST['newUserPassword']);
          $confirmPassword = ($_POST['confirmPassword']);
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
           
            
            if(isset($_POST['newUserPassword']) && !empty($_POST['newUserPassword']) AND isset($_POST['confirmPassword']) && !empty($_POST['confirmPassword']))
            { 
                $newUserPassword = mysql_escape_string($_POST['newUserPassword']); // Set variable for the username
                  if($newUserPassword != $confirmPassword)
                  {
                    $message = 'Passwords do not match';        
                  }
                    else
                    {
                      if($search = mysql_query("SELECT staff_password FROM Staff WHERE staff_username='$username'")) 
                    {
                          $match  = mysql_num_rows($search); //records the number of rows that have matched the search
                              if($match > 0)
                              {
                                $newPassword = md5($newUserPassword);
                                mysql_query("UPDATE Staff SET staff_password= '$newPassword' WHERE staff_username='$username'");
                                $message='Password has sucessfully been reset!';        
                              } 
                    
                              elseif($search = mysql_query("SELECT stu_password FROM Student WHERE stu_username='$username'")) 
                              {
                                $match  = mysql_num_rows($search); //records the number of rows that have matched the search
                                    if($match > 0)
                                    {
                                        $newPassword = md5($newUserPassword); // Generate random number between 1000 and 5000 and assign it to a local variable. 
                                             // Example output: 4568 
                                        $message='Password has sucessfully been reset!';
                                             
                                         mysql_query("UPDATE Student SET stu_password= '$newPassword' WHERE stu_username='$username'"); //update the Student table with randomly generated password where the email matches 
                                  
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
                  }
                 /// else{
               // $message = 'Passwords do not match'; 
                  //} 
                 // }
                  else{
                $message = ''; 
                 } 
				}
     
    
			catch(Exception $e)
				{
				//Couldn't connect to database
				$message = 'Unable to connect. Please try again later';
				}
}
?>

<html>
 <head>
 <link rel="stylesheet" href="inputStyle.css">
	<title>Betwixt Booking | Change Password</title> 
		<meta charset="utf-8">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
 </head>

 <body class="hold-transition skin-blue side-bar mini">
	<div class="wrapper">
	
	  <header class="main-header">
		<!-- Logo -->
		<a href="stuIndex.php" class="logo">
		  <!-- mini logo for sidebar mini 50x50 pixels -->
		  <span class="logo-mini"><b>B</b>B</span>
		  <!-- logo for regular state and mobile devices -->
		  <span class="logo-lg"><b>Betwixt</b>Booking</span>
		</a>
    <!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
		  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		  </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
      
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/boxed-bg.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['username'];?> </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/boxed-bg.jpg" class="img-circle" alt="User Image">

                <p>
				  <?php echo $_SESSION['username'];?> 
                  <small>Student</small>
                </p>
              </li>
          
            
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="accountSettings.php" class="btn btn-default btn-flat">Manage Account</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
         
		 
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left nav bar contains the logo  -->
  <aside class="main-sidebar"> 
    <!-- Top of sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/boxed-bg.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username'];?> </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
	  
    <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
	  
      <!-- /.search form -->
	  
	  
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
      
        <li> <!--Calendar Link-->
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
           
          </a>
        </li>
        
       
        <li> <!--Schedule Appointment -->
          <a href="scheduleApp.php"><i class="fa fa-share"></i> <span>Schedule Appointment</span></a>
        
        </li>
        <li><a href="phonebook.php"><i class="fa fa-book"></i> <span>Contacts</span></a></li>
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
   
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Account
        <small> Change Password </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="accountSettings.php"><i class="fa fa-dashboard"></i> Manage Account</a></li>
        <li class="active">Change Password</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main Content -->
      <div class="row">
		
				
					<h2>Change Password</h2>
						<fieldset><div id="inputsize">
							<form role="form" action="changePassword.php" method="post" class="form-signin">
								<div class = "form-group"> 
 
							
								<div class="form-group">
									<label  for="newUserPassword"> New Password:</label>
									<input type="password" class="form-control" id="newUserPassword" placeholder ="New Password" name="newUserPassword" value="" maxlength="20" />
								</div>
								<div class="form-group">
									<label  for="confirmPassword"> Confirm Password:</label>
									<input type="password" class="form-control" id="confirmPassword" placeholder ="Confirm Password" name="confirmPassword" value="" maxlength="20" />
								</div>
 </div>
								<button type="submit" class="btn btn-primary">Reset Password</button>
								
								<p> 
								  <?php echo $message; ?>
								</p>
								</div>
							</form>
                   	</fieldset>
				
 
  </div>
	</section>
     
  </div>
  <!-- /.content-wrapper -->
  
  
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.2
    </div>
    <strong>Copyright &copy; 2014-2015 <a href="#">Betwixt Booking</a>.</strong> All rights
    reserved.
  </footer>

 

        

 
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>



 


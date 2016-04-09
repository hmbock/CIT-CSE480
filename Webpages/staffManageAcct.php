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

$username = $_SESSION['username'];


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

			if(isset($_POST['update'])) {
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

                
                      if($search = mysql_query("SELECT F_Name, L_Name,staff_email FROM Staff WHERE staff_username='$username'")) 
                    {
                          $match  = mysql_num_rows($search); //records the number of rows that have matched the search
                              if($match > 0)
                              {
                                $msg ='Account has been updated!'; 
                                $updatedFirstName = ($newFirstName);
                                $updatedLastName = ($newLastName);
                                $updatedEmail = ($newEmail);
                               
                                mysql_query("UPDATE Staff SET F_Name = '$updatedFirstName', L_Name = '$updatedLastName', staff_email = '$updatedEmail' WHERE staff_username='$username'");
                                //header("location:http://www.secs.oakland.edu/~hmbock/updateInfo.php");
                                header("location:http://www.secs.oakland.edu/~hmbock/staffManageAcct.php");     
                              } 
                    
                              elseif($search = mysql_query("SELECT F_Name, L_Name,stu_email FROM Student WHERE stu_username='$username'")) 
                              {
                                $match  = mysql_num_rows($search); //records the number of rows that have matched the search
                                    if($match > 0)
                                    {
                                        $msg ='Account has been updated!'; 
                                        $updatedFirstName = ($newFirstName);
                                        $updatedLastName = ($newLastName);
                                        $updatedEmail = ($newEmail);
                                                                             
                                             
                                         mysql_query("UPDATE Student SET F_Name = '$updatedFirstName', L_Name = '$updatedLastName', stu_email = '$updatedEmail' WHERE stu_username='$username'"); 
                                
                                  //header("location:http://www.secs.oakland.edu/~hmbock/updateInfo.php");
                                  header("location:http://www.secs.oakland.edu/~hmbock/staffManageAcct.php"); 

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


	}


}

if(isset($_POST['delete'])) {
                                                try {
                                                        mysql_connect("localhost", "hmbock", "team@480") or die(mysql_error()); // Connect to database server(localhost) with username and password.
                                                        mysql_select_db("hmbock") or die(mysql_error()); // Select  database.

                                                        if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {


								 header('location:http://www.secs.oakland.edu/~hmbock/confirmDeleteAccount.php');

                                                        }
                                                } catch(Exception $e) {
                                                        $msg = 'Unable to connect. Please try again later.';
                                                }
                                        }

?>
  
                                              
          
<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Betwixt Booking | Manage Account</title>
		<meta charset="utf-8">
	
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
   
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		
		
		<!--links from new theme-->
				 <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  
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
                

	</head>
	
	<body class="hold-transition skin-green side-bar mini">
	<div class="wrapper">
			
			
			<header class="main-header">
    <!-- Logo -->
    <a href="staffBewtixtBooking.php" class="logo">
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
          
          <!-- Notifications: style can be found in dropdown.less 
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">1</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 1 notification</li>
              <li>
                <!-- inner menu: contains the actual data 
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> You have 1 Appointment this week!
                    </a>
                  </li>
                 
                 
                </ul>
              </li>
             
            </ul>
          </li>
        
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
                  <a href="staffManageAcct.php" class="btn btn-default btn-flat">Manage Account</a>
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
          <p><?php echo $_SESSION['username'];?></p>
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
      
       <!-- <li> <!--Calendar Link/Main homepage
          <a href="index.php">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
           
          </a>
        </li>-->
        
       
        <li> <!--Manage Availability -->
          <a href="manageAvailability.php"><i class="fa fa-share"></i> <span>Manage Availability</span></a>
        
        </li>
        <li><a href="staffContacts.php"><i class="fa fa-book"></i> <span>Contacts</span></a></li>
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Account</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Account</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main Content -->
      <div class="row">
  
  
							<h2> User Profile </h2>
							<h3>Enter new account information and submit to update:</h3>
            <!-- start sign up form -->  
							<form action="staffManageAcct.php" method="post" id="settingsForm">
							
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
											<input type="submit" class="submit_button" name="update" value="Update Account Info" />
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

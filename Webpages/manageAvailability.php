<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	
	<head>
			
						 <meta charset="utf-8">
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <title>Betwixt Booking | Manage Availability</title>
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
		  <!-- bootstrap wysihtml5 - text editor -->
		  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
				
	
	
   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

  <script src="//code.jquery.com/jquery-1.10.2.js"></script>

  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  <link rel="stylesheet" href="/resources/demos/style.css">


	</head>
	
	<body class="hold-transition skin-green sidebar-mini">
  
		<div class="wrapper">
			 <header class="main-header">
				<!-- Logo -->
				<a href="staffIndex.php" class="logo">
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
					  
					  <!-- Notifications: style can be found in dropdown.less -->
					 <!-- <li class="dropdown notifications-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						  <i class="fa fa-bell-o"></i>
						  <span class="label label-warning">1</span>
						</a>
					 <!--   <ul class="dropdown-menu">
						  <li class="header">You have 1 notification</li>
					 <!--     <li>
							<!-- inner menu: contains the actual data -->
							<!--<ul class="menu">
							  <li>
								<a href="#">
								  <i class="fa fa-users text-aqua"></i> You have 1 Appointment this week!
								</a>
							  </li>
							 
							 
							</ul>
						  </li>
						 
						</ul>
					  </li>-->
					
					  <!-- User Account: style can be found in dropdown.less -->
					  <li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
						  <span class="hidden-xs"><?php echo $_SESSION['username'];?> </span>
						</a>
						<ul class="dropdown-menu">
						  <!-- User image -->
						  <li class="user-header">
							<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

							<p>
							  <?php echo $_SESSION['username'];?> 
							  <small>Staff</small>
							</
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
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username'];?> </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
	  
	  
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
      
        <li> <!--Calendar Link-->
          <a href="staffIndex.php">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
           
          </a>
        </li>
        
       
        <li> <!--Manage Availability -->
          <a href="manageAvailability.php"><i class="fa fa-share"></i> <span>Manage Availability</span></a>
        
        </li>
		
		<!-- Phonebook -->
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
        Manage Availability
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="staffIndex.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Availability</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main Content -->
      <div class="row"> 
					
					<p><b><u> </u></b></p>
					<p> Please enter date and time to make unavailable: </p>
              
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script language="javascript">
        $(document).ready(function () {
            $("#txtDate").datepicker({
                onSelect: function (selectedDate) {
                var date = $('#txtDate').val();
                var staffID = <?php echo $_SESSION['id'];?>;
                $( "#radio" ).empty();    

      $.ajax({
      type: "GET",
      url: "getAvailability.php", 
      data: { selectedDate : date, staffID: staffID  },
      dataType: "json",                     
      contentType: "application/json",
      success: function(json) {
      var avTime = json;
       
        $.each(avTime, function () {
        $("#radio").append($("<label>").text(this.time).prepend(
          $("<input>").attr('type', 'radio').val(this.time)
           .prop('checked', this.checked)
        ));
        });
        $("#radio").on('change', '[type=radio]', function () {
         console.log($(this).val());
        });
      }
    });
                }
            });
        });
    </script>
                        <br>
                        Date: <input id="txtDate" name="txtDate" type="text" />
                        <br>
                        <br>
                        
              
 
              
                        <div id="radio"></div>
                        <br>
                        <br>
                        <input type="submit" id="submit" />
                    <div id="success" name="success"></div> 
                    
                     <script>
                    $(document).ready(function($) {
                        $('#submit').click(function(e) {
                        e.preventDefault();
                        var staffID = <?php echo $_SESSION['id'];?> ;
                        var date = $('#txtDate').val();
                        var timeSlot = $('input[type="radio"]:checked').val();
                        $.ajax({
                            url: 'updateAvailability.php',
                            data: { staffID : staffID, selectedDate:date, timeSlot : timeSlot},
                            method: "GET",
			                      dataType: "json",
                            contentType: "application/json; charset=utf-8",
                            success: function (data) {
                                //$('#success').append(data);
                                alert("Your availability has been updated");
                                
                                window.location.reload();
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                alert(xhr.status + " " + thrownError);
                            }
                        });
                    });
               });
            </script>
			
                        
 
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

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	
	<head>
	
	
	
		<!--<link href="betwixt.css" rel="stylesheet">
		<link rel="stylesheet" href="C:\Users\lkwal_000\Google Drive\CIT_CSE 480\Production\css\font-awesome-4.5.0\css\font-awesome.min.css">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">-->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
		<script src="../scheduler/dhtmlxscheduler.js" type="text/javascript"></script>
		<link rel="stylesheet" href="../scheduler/dhtmlxscheduler.css" type="text/css">
   <!--<link href='http://fullcalendar.io/js/fullcalendar-2.6.0/fullcalendar.css' rel='stylesheet' />
<link href='http://fullcalendar.io/js/fullcalendar-2.6.0/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js'></script>
<script src='//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://fullcalendar.io/js/fullcalendar-2.6.0/fullcalendar.js'></script>
-->
		<link rel="stylesheet" href="fullcalendar/fullcalendar.css" />
		<script src='lib/jquery.min.js'></script>
		<script src='lib/moment.min.js'></script>
		<script src="fullcalendar/fullcalendar.js"></script>
		
		<script type="text/javascript" src="/path/to/jquery-latest.js"></script> 
		<script type="text/javascript" src="/path/to/jquery.tablesorter.js"></script>
		
		
		 <!-- links from new theme-->
		 
		<meta charset="utf-8">
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <title>Betwixt Booking | Contacts</title>
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

		   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

		  <script src="//code.jquery.com/jquery-1.10.2.js"></script>

		  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

		  <link rel="stylesheet" href="/resources/demos/style.css">
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
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
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['username'];?> </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

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
      
        <li> <!--Calendar Link-->
          <a href="stuIndex.php">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <!--<small class="label pull-right bg-red">3</small>-->
          </a>
        </li>
        
       
        <li> <!--Schedule Appointment Link -->
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
        Dashboard
        <small>Contact Directory</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Contacts</li>
      </ol>
    </section>

			
		<!--Main Content-->
			<section class="content">
					<div class = "row">
			
				
					
						<h2> Contact Info Directory </h2>

					<input type="text" class="search" name="searchid" id="searchid" placeholder="Search for people by last name" />&nbsp; &nbsp; Ex: <b><i>Tutor, Guy, or Doctor</i></b><br /> 
						<!--<button>Click Me!</button>-->
						<div id="result"></div>
						<div id="responsecontainer" align="center"></div>
					
					
				<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	$("input").keydown(function(e){
		//alert("keyup called");
		var value = $('#searchid').val();
		var trimVal;
	if(e.which==8){
		trimVal=value.substring(0, value.length);
			//alert(trimVal);
	}
	else{
		value=value+String.fromCharCode(e.which);
		trimVal=value;
		//alert(trimVal);
		
	}
	if(value!='')
		 $.ajax({
			type: "GET",
			url: "phonebookscript.php",
			data: {dataString: trimVal},
			cache: false,
			dataType: "html",
			success: function(response){
				console.log(response);
			
		    $("#responsecontainer").html(response);
	
			}, //end success
		error: function(XMLHttpRequest, textStatus, errorThrown) {
		alert(errorThrown);
		}
	
    });
	});

	
}); 
	
</script>					

<?php
	



/* ORIGINAL PHONEBOOK.PHP CODE
$servername = "localhost";
$dbusername = "hmbock";
$dbpassword = "team@480";
$dbname = "hmbock";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
	die("connection failed: " . $conn->connect_error);
}


$sql = "SELECT F_Name, L_Name FROM Staff";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "<table id='phonebook' border='1' class='tablesorter'>
    <thead>	
    <tr>
        <th> Last Name </th>
        <th> First Name </th>
        <th> Department</th>
        <th> Phone Number </th>
	<th> Email </th>
    </tr>
    </thead>";
    
$sql = "SELECT Staff.L_Name, Staff.F_Name,Staff.Department_ID,Staff.Phone,Staff.staff_email,Department.Department FROM Staff,Department WHERE Staff.Department_ID=Department.Department_ID ORDER BY L_Name";

$result = $conn->query($sql);
    
    While ($row= mysqli_fetch_array($result)) {
    echo "<tbody>";
    echo "<tr>";
    echo "<td>" . $row["L_Name"] ."</td>";
    echo "<td>" . $row["F_Name"] ."</td>";
    echo "<td>" . $row["Department"] ."</td>";
    echo "<td>" . $row["Phone"] ."</td>";
    echo "<td>" . $row["staff_email"] ."</td>";
    echo "</tr>";
    echo "</tbody>";	
   
	}
 echo "</table>". "\n";
 }
 
} else {
	echo "0 results";
}
ORIGINAL PHONEBOOK.PHP CODE*/


?>


<script type="text/javascript">
//function sortBy(btn){
//var a = btn.split(".");
//var b = "";
//(a[1] == "ASC") ? b = "DESC" : b ="ASC";
//var c = a[0]+"."+b;

//document.getElementById(btn).id= c;
//document.getElementById("uList").innerHTML = 'One moment please...';

//var hr = new XMLHttpRequest();
//var url = "getPhonebook.php";
//hr.open("POST", url, true);
//hr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
//hr.onreadystatechange=function(){
//	if(hr.readyState == 4 && hr.status == 200) {
//		var return_data = hr.responseText;
////		document.getElementById("uList").innerHTML= return_data;
//}
//}
//hr.send("sorter="+btn);
//}
//</script>

<script>
//$(document).ready(function() 
  //  { 
    //    $("#phonebook").tablesorter(); 
    //} 
//); 

//$(document).ready(function() 
  //  { 
    //    $("#phonebook").tablesorter( {sortList: [[0,0], [1,0]]} ); 
    //} 
//); 

//window.onload = function(){
//var jump = "L_Name.ASC";
//sortBy(jump);
//};
//</script>
					</div>
					
					</section>
				</div>
  <!-- /.content-wrapper -->	
				

			
			<footer class="main-footer">
				<div class="pull-right hidden-xs">
				<b>Version</b> 2.3.2
				</div>
				<strong>Copyright &copy; 2016 <a href="#">Betwixt Booking</a>.</strong> All rights
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





<?php
session_start();

$eventID = $_GET['id'];
$stuID = $_GET['stu_id'];
$staffID = $_GET['Staff_ID'];
$date = $_GET['Date'];
$time = $_GET['Time'];
$fname = $_GET['F_Name'];
$lname = $_GET['L_Name'];
$reason = $_GET['Reason'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Betwixt Booking | Confirm Appointment </title>
    <meta charset="utf-8">
   
		<meta charset = "UTF-8">
		
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		
		<!--<link href="betwixt.css" rel="stylesheet">-->
		
		<!--new theme links-->
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
		  <!-- iCheck -->
		  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
</head>

<body class="hold-transition login-page">

<div class="login-box">
	  <div class="login-logo">
		<a href="index.html"><b>Betwixt</b>Booking</a>
	  </div>
		<!-- /.login-logo -->
		<div class="login-box-body">
		<h3 class="login-box-msg">Confirm Appointment </h3>
    
        <form action="" method="GET">
            <div id="content">
                <h2> </h2>
                
                <p> A student has scheduled an appointment with you. Please review the details: </p>
                
                <br />
                <br />
                
                <p>Student: <b><?php echo $fname . " " . $lname; ?></b></p>
                <br />
                <p>Date: <b><?php echo $date; ?></b> </p>
                <br />
                <p>Time: <b><?php echo $time; ?></b> </p>
                <br />
                <?php
                
                if($reason != "")
                {
                  echo '<p>Reason: <b>' . $reason . '</b> </p>';
                }
                
                ?>
                <button type="submit" class="btn btn-block btn-success btn-lg" id="confirm"  value="confirm">Confirm</button>
                <button type="submit" class="btn btn-block btn-danger btn-lg" id="decline" value="decline"/>Decline</button>
                
            </div>
        </form>
        
        <script type="text/javascript">
     
           $(document).ready(function($) {
           
              $('#confirm').click(function(e) {
              
                e.preventDefault();
              
                var eventID = <?php echo $eventID; ?> ;
                var stuID = <?php echo $stuID; ?> ;
                var staffID = <?php echo $staffID; ?> ;
              
                $.ajax({
                                   url: 'sendConfirmation.php',
                                   data: { eventID : eventID },
                                   method: "GET",
                                   dataType: "json",
                                   contentType: "application/json; charset=utf-8",
                                   success: function () {
                                      
                                      alert("Appointment confirmed. Click OK to login.");
                                      
                                      window.location.replace("http://www.secs.oakland.edu/~hmbock/login.php");
                                      
                                   },
                                   error: function (xhr, ajaxOptions, thrownError) {
                                       alert(xhr.status + " " + thrownError);
                                   }
                               });
              
              });
           
           });
           
     
     </script>
	 
<!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</div>

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
						
						
							 <p>
								<?php echo $msg; ?> 
							</p>
									
						 
					 
			
	

 </body>
 </html>


<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Betwixt Booking | Delete Account</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
	</head>

<body>




<?php
/**
 * Created by PhpStorm.
 * User: Phill
 * Date: 3/8/2016
 * Time: 9:24 PM
 */

$username = $_SESSION['username'];
$id = $_SESSION['id'];

if(isset($_POST['submit']))
{   
	
	 
    try {
    
        if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {

		//echo "<p>" .  $_SESSION['id'] . "</p>";		
	
    
            $conn = new mysqli("localhost", "hmbock", "team@480", "hmbock");
    
    
            $result = $conn->query("DELETE FROM Student WHERE stu_id = '$id' AND stu_username = '$username'");
            
            $affRows = $result->affected_rows;
    
            if ($affRows > 0) {

                            $resultAppts = $conn->query("DELETE FROM events WHERE stu_id = '" . $_SESSION['id'] . "'");
                            
                            if($resultAppts) {

                                header('location:http://www.secs.oakland.edu/~hmbock/index.html');
                                exit();
                            }
            }
            else
            {
                          //$resultAppts = $conn->query("DELETE FROM events WHERE staff_id = '" . $_SESSION['id'] . "'");
                          
                          $resultClass = $conn->query("UPDATE Class SET staff_id = 0 WHERE staff_id = '$id'");
                          
                          $result = $conn->query("DELETE FROM Staff WHERE staff_id = '$id' AND staff_username = '$username'");

                                header('location:http://www.secs.oakland.edu/~hmbock/index.html');
                                exit();
            }
        }
    } catch(Exception $e) {
        echo '<p>Unable to connect. Please try again later.</p>';
    }
} 
?>

<body class="hold-transition register-page">
		
    	<div class="register-box">
			<div class="register-logo">
				<a href="#"><b>Betwixt</b>Booking</a>
			</div>

			<div class="register-box-body">
				<p class="login-box-msg">Are you sure you want to delete your account?</p>
		
 
        <form method="post">


         			   <input type="submit" class="btn btn-block btn-danger btn-lg id="submit" name="submit" size="10"  value="Yes, I'm sure I want to delete my account." >
				
			</form>           
		   </div>
       
   
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
	</body>
</html>
<?php

session_start();

session_unset();

session_destroy();
?>
<html>
	<head>
	<title>Betwixt Booking | Sign Out Confirmation</title> 
		<meta charset = "UTF-8">
		
		
		
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
		<a href="#"><b>Betwixt</b>Booking</a>
	  </div>
		<!-- /.login-logo -->
		<div class="login-box-body">
		<p class="login-box-msg">You Have Successfully Signed Out </p>
		
						<td>
							<a href ="index.html"><button type="button" class="btn btn-block btn-primary btn-lg">Home</button></a>
						<td>
		
				
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
					
 
	</body>
</html>




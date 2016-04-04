<!DOCTYPE html>
<html>
	<head>
	
	
	 <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  
  
		<link href="calCss.css" rel="stylesheet" type="text/css" media="all" />
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script language="JavaScript" type="text/javascript">
			function initialCalendar() {
				var hr = new XMLHttpRequest();
				var url = "calendar_start.php";
				var currentTime = new Date();
				var month = currentTime.getMonth() + 1;
				var year = currentTime.getFullYear();
				showmonth = month;
				showyear = year;
				var vars = "showmonth="+showmonth+"&showyear="+showyear+"&stu_id=";
				hr.open("POST", url, true);
				hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				hr.onreadystatechange = function() {
					if(hr.readyState == 4 && hr.status == 200) {
						var return_data = hr.responseText;
						document.getElementById("showCalendar").innerHTML = return_data;
					}
				}
				hr.send(vars);
				document.getElementById("showCalendar").innerHTML = "processing...";
			} 
		</script>
		<script language="JavaScript" type="text/javascript">
			function next_month(){
				var nextmonth = showmonth + 1;
				if(nextmonth > 12) {
					nextmonth = 1;
					showyear = showyear + 1;
				}
				showmonth = nextmonth;
				var hr = new XMLHttpRequest();
				var url = "calendar_start.php";
				var vars = "showmonth="+showmonth+"&showyear="+showyear;
				hr.open("POST", url, true);
				hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				hr.onreadystatechange = function () {
					if(hr.readyState == 4 && hr.status == 200) {
						var return_data = hr.responseText;
						document.getElementById("showCalendar").innerHTML = return_data;
					}
				}
				hr.send(vars);
				document.getElementById("showCalendar").innerHTML = "processing...";

			}
		</script>
		<script language="JavaScript" type="text/javascript">
			function last_month(){

				var lastmonth = showmonth - 1;
				if(lastmonth < 1) {
					lastmonth = 12;
					showyear = showyear - 1;
				}
				showmonth = lastmonth;

				var hr = new XMLHttpRequest();
				var url = "calendar_start.php";
				var vars = "showmonth="+showmonth+"&showyear="+showyear;
				hr.open("POST", url, true);
				hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				hr.onreadystatechange = function() {
					if(hr.readyState == 4 && hr.status == 200) {
						var return_data = hr.responseText;
						document.getElementById("showCalendar").innerHTML = return_data;
					}
				}
				hr.send(vars);
				document.getElementById("showCalendar").innerHTML = "processing...";
			}
		</script>
		<script type="text/javascript">
			function overlay() {
				e1 = document.getElementById("overlay");
				e1.style.display = (e1.style.display == "block") ? "none" : "block";
 				e1 = document.getElementById("events");
				e1.style.display = (e1.style.display == "block") ? "none" : "block";
 				e1 = document.getElementById("eventsBody");
				e1.style.display = (e1.style.display == "block") ? "none" : "block";
			}
		</script>
   <script type="text/javascript">
     
     function cancel(id) {
       
        var id = id;
        var hr = new XMLHttpRequest();
        var url = "cancelApp.php";
 				var vars = "ID="+id;
            
        if(confirm("Are you sure you want to cancel this appointment?"))
        {
 				hr.open("POST", url, true);
 				hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 				hr.onreadystatechange = function() {
 					if(hr.readyState == 4 && hr.status == 200) {
 						var return_data = hr.responseText;
            
              
            
              alert("Appointment deleted.");
              
              //document.getElementById('cal_frame').contentWindow.location.reload();
              parent.location.reload();
                              
 					}
 				}
 				hr.send(vars);
       }
       else
       {
         window.location.reload();
       }
     }
     
   </script>
   
		<script language="JavaScript" type="text/javascript">
			function show_details(theId) {
				var deets = theId.id;
				e1 = document.getElementById("overlay");
				e1.style.display = (e1.style.display == "block") ? "none" : "block";
 				e1 = document.getElementById("events");
				e1.style.display = (e1.style.display == "block") ? "none" : "block";
 				var hr = new XMLHttpRequest();
 				var url = "events.php";
 				var vars = "deets="+deets;
 				hr.open("POST", url, true);
 				hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 				hr.onreadystatechange = function() {
 					if(hr.readyState == 4 && hr.status == 200) {
 						var return_data = hr.responseText;
 						document.getElementById("events").innerHTML = return_data;
 					}
 				}
 				hr.send(vars);
 				document.getElementById("events").innerHTML = "processing...";
			}
		</script> 
	</head>
	<body onLoad="initialCalendar();">
		<div id="showCalendar"></div>
		<div id="overlay">
			<div id="events"></div>
		</div>
	</body>
</html>


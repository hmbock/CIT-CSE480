<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Betwixt Booking</title>
		<meta charset="utf-8">
		<meta name= "viewport" content= "width= device-width, initial-scale=1.0">
		<link href="betwixt.css" rel="stylesheet">
		<link rel="stylesheet" href="C:\Users\lkwal_000\Google Drive\CIT_CSE 480\Production\css\font-awesome-4.5.0\css\font-awesome.min.css">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">
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
		<link href="betwixt.css" rel="stylesheet">
		<script type="text/javascript" src="/path/to/jquery-latest.js"></script> 
		<script type="text/javascript" src="/path/to/jquery.tablesorter.js"></script>
	</head>
	<body>
		<div id="wrapper">
			<header>
				<h1> Phone Book</h1>
			</header>
			
		 <main role="main">
				<nav>
						<ul>
						  <li>Username:<?php echo $_SESSION['username'];?> </li>   
						  <li><a href="http://secs.oakland.edu/~hmbock/newCal.php">&nbsp;<i class="fa fa-calendar"></i>&nbsp;Home</a></li>
						  <li><a href="http://secs.oakland.edu/~hmbock/scheduleApp.php">&nbsp;<i class="fa fa-plus-circle"></i>&nbsp;Schedule Appointment</a></li>
						  <li><a href="http://secs.oakland.edu/~hmbock/accountSettings.php">&nbsp;<i class="fa fa-user"></i> &nbsp;Manage Account</a></li>
						  <li><a href="logout.php">&nbsp;<i class="fa fa-sign-out"></i>&nbsp;Logout</a></li>
						</ul>
					</nav>	
					<div id="content">
						<h2> Contact Info Directory </h2>
						

<?php



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
			</main>
			<footer role="contentinfo">
                    Copyright &copy; 2016 Betwixt Booking<br>
                    <a href="mailto:betwixtbooking@gmail.com">
                        <address>BetwixtBooking@gmail.com</address>
                    </a>
				 </footer>
</div>
</body>
</html>


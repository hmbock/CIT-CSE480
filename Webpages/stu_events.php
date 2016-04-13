<?php
session_start();

$deets = $_POST['deets'];
$deets = preg_replace('#[^0-9/]#i', '', $deets);
$id = $_SESSION['id']; //grabbing this from login.php
$username = $_SESSION['username'];

include ("connect.php");

$events = '';
$query = mysql_query('SELECT F_Name, L_Name, id, app_title, app_time, description, stu_id, office FROM events INNER JOIN Staff ON events.staff_id = Staff.staff_id WHERE Confirmed = 1 AND evdate = "'.$deets.'" AND stu_id = "'.$id.'"');
$num_rows = mysql_num_rows($query);
if($num_rows > 0) {
	$events .= '<div id="eventsControl"><button onMouseDown="overlay()">Close</button><br /><br /><b> ' . $deets . '</b><br /><br /> </div>'; 

	while($row = mysql_fetch_array($query)){
		$title = $row['app_title'];
		$time = $row['app_time'];
		$desc = $row['description'];
    $appId = $row['id'];
    $fname = $row['F_Name'];
    $lname = $row['L_Name'];
    $office = $row['office'];
	$events .= '<div id="eventsBody"><b>With: </b> ' . $fname . " " . $lname. "<br /><br /><b>Title: </b>" . $title . ' <br/><br/><b>Time: </b> ' . $time . ' <br/><br/><b>Where: </b> ' . $office . '<br /><br /><b>Description: </b>' . $desc .'<br /><br /><button id="' . $appId . '" onMouseDown="cancel(' . $appId . ')">Cancel Appointment</button><hr><br /></div>'; 
	}
}
echo $events;
?>



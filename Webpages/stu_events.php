<?php
session_start();

$deets = $_POST['deets'];
$deets = preg_replace('#[^0-9/]#i', '', $deets);
$id = $_SESSION['id']; //grabbing this from login.php
$username = $_SESSION['username'];

include ("connect.php");

$events = '';
$query = mysql_query('SELECT app_title, app_time, description, stu_id FROM events WHERE evdate = "'.$deets.'" AND stu_id = "'.$id.'"');
$num_rows = mysql_num_rows($query);
if($num_rows > 0) {
	$events .= '<div id="eventsControl"><button onMouseDown="overlay()">Close</button><br /><br /><b> ' . $deets . '</b><br /><br /><b> ' . $username . '</b><br /><br /></div>'; 

	while($row = mysql_fetch_array($query)){
		$title = $row['app_title'];
		$time = $row['app_time'];
		$desc = $row['description'];
		$events .= '<div id="eventsBody"><b>Title: </b> ' . $title . ' <br/><br/><b>Time: </b> ' . $time . ' <br/><br/><b>Description: </b>' . $desc .'<br /><hr><br /></div>'; 
	}
}
echo $events;
?>
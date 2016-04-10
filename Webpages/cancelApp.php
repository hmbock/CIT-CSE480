<?php
//include('dbconnect.php');
//header("Content-Type: text/javascript; charset=utf-8");

/**
* @author
* @copyright 2016
*/
include ("connect.php");

$aId = $_POST['ID'];

$emailSql = "SELECT events.stu_id stu_id, events.staff_id staff_id, evdate, app_time, Student.F_Name StuF_Name, Student.L_Name StuL_Name, stu_email, Staff.F_Name StaffF_Name, Staff.L_Name StaffL_Name, staff_email FROM events
              INNER JOIN Student ON events.stu_id = Student.stu_id
              INNER JOIN Staff ON events.staff_id = Staff.staff_id
              WHERE id = '$aId'"; 
$emailResult = mysql_query($emailSql);

while ($row = mysql_fetch_array($emailResult)) {
  $stuID = $row["stu_id"];
  $staffID = $row["staff_id"];
  $date = $row["evdate"];
  $time = $row["app_time"];
  $stuFName = $row["StuF_Name"];
  $stuLName = $row["StuL_Name"];
  $stuEmail = $row["stu_email"];
  $staffFName = $row["StaffF_Name"];
  $staffLName = $row["StaffL_Name"];
  $staffEmail = $row["staff_email"];
}

$sql = "DELETE FROM events WHERE id=" . $aId;
$delSql = 'DELETE FROM events WHERE id=' . $aId;
$delResult = mysql_query($sql);

                    $subject = 'Betwixt Booking | Appointment Cancelled'; // Give the email a subject 
                    $message = "                   
                    
                    Your appointment with $staffFName $staffLName at $time on $date has been cancelled. If you would like to reschedule this appointment, please click the link below to login:
                    
                    http://www.secs.oakland.edu/~hmbock/login.php
                    
                    "; // Our message above including the link. *** CHANGE THE URL ***
                                         
                    $headers = 'From:noreply@secs.oakland.edu' . "\r\n"; // Set from headers //*** CHANGE THE URL ***
                    mail($stuEmail, $subject, $message, $headers);
                    
                    
                    
                    
                    $subject = 'Betwixt Booking | Appointment Cancelled'; // Give the email a subject 
                    $message = "                   
                    
                    Your appointment with $stuFName $stuLName at $time on $date has been cancelled. If you would like to login and view your appointments, please click the link below to login:
                    
                    http://www.secs.oakland.edu/~hmbock/login.php
                    
                    "; // Our message above including the link. *** CHANGE THE URL ***
                                         
                    $headers = 'From:noreply@secs.oakland.edu' . "\r\n"; // Set from headers //*** CHANGE THE URL ***
                    mail($staffEmail, $subject, $message, $headers);

$data;

if($delResult) {
    $data = "success";
} else {
    $data = "nope";
}

echo $data;

?>




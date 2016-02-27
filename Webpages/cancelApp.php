<?php
//include('dbconnect.php');
//header("Content-Type: text/javascript; charset=utf-8");

/**
* @author
* @copyright 2016
*/
$conn = new mysqli("localhost", "root", "M1ch@3l90", "hmbock");

$aId = 0;

//if (isset($_POST['depID'])) {
$aId = $_POST['ID'];
//}

$sql = "DELETE FROM Appointments WHERE Appointment_ID =" . $deptid;
$classResult = $conn->query($sql) ;

if($classResult) {
    echo "Appointment succesfully cancelled";
} else {
    echo "Something went wrong :(";
}

?>



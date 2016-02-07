<?php
/**
 * Created by PhpStorm.
 * User: Phill
 * Date: 2/6/2016
 * Time: 4:19 PM
 */

$conn = new mysqli("localhost", "hmbock", "team@480", "hmbock");

$staffID = $_GET['staffID'];
$stuID = $_GET['stuID'];
$title = $_GET['title'];

$sql = "INSERT INTO Appointments (Staff_ID, stu_id, Appointment_Title, Confirmed) VALUES ('". $staffID . "', '" . $stuID . "', '" . $title . "', 0)";

$conn->query($sql);

$conn->close();


?>

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

$sql = "INSERT INTO Appointments (Staff_ID, stu_id, Appointment_Title, Confirmed) VALUES (". $staffID . ", " . $stuID . ", '" . $title . "', 0);";

$emailSql = "SELECT staff_email from Staff WHERE staff_id = " . $staffID;

$stuSql = "SELECT F_Name, L_Name FROM Student WHERE stu_id = " . $stuID;

$conn->query($sql);

    $return = "<p>Appointment scheduled successfully!</p>";

$stuResult = $conn->query($stuSql);

    $stu = mysqli_fetch_object($stuResult);

    $fname = $stu->F_Name;
    $lname = $stu->L_Name;

$emailResult = $conn->query($emailSql);

    $email = mysqli_fetch_object($emailResult);

    $to = $email->staff_email;

    $subject = 'BETWIXT BOOKING APPOINTMENT AWAITING CONFIRMATION'; // Give the email a subject
    $emailMessage = '
                     A student has scheduled an appointment with you via Betwixt Booking. Please follow the link below to confirm of decline this appointment.

                    http://www.secs.oakland.edu/~hmbock/confirmApp.php?stu_id='.$stuID.'&Staff_ID='.$staffID.'&F_Name='.$fname.'&L_Name='.$lname.'
                    ';
    $headers = 'From:noreply@secs.oakland.edu' . "\r\n";

    mail($to, $subject, $emailMessage, $headers);


$conn->close();


echo json_encode($return);


?>

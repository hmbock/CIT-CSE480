<?php
/**
 * Created by PhpStorm.
 * User: Phill
 * Date: 3/12/2016
 * Time: 2:11 PM
 */

$datetime = new DateTime('tomorrow');
$tomorrow = $datetime->format("Y-m-d");

$conn = new mysqli("localhost", "hmbock", "team@480", "hmbock");

$result = $conn->query("SELECT Start_Time, staff_email, stu_email, Student.F_Name, Student.L_Name, Staff.F_Name, Staff.L_name, Appointments.Type FROM Appointments  INNER JOIN Staff ON Appointments.staff_id = Staff.staff_id INNER JOIN Student ON Appointments.stu_id = Student.stu_id;");

while ($row = $data = mysqli_fetch_array($result)) {
    $data[] = $row;
}
foreach ($data as $row) {
    $date = $data['Start_Time'];
    if($date != $tomorrow) { continue; };
    $staff_email = $data['staff_email'];
    $stu_email = $data['stu_email'];
    $staff_fname = $data['Staff.F_Name'];
    $staff_lname = $data['Staff.L_Name'];
    $stu_fname = $data['Student.F_Name'];
    $stu_lname = $data['Student.L_Name'];
    $type = $data['Appointments.Type'];

    $toStudent      = $stu_email; // Send email to our user
    $subjectStudent = 'Betwixt Booking | Appointment Reminder'; // Give the email a subject
    $messageStudent = "REMINDER! You have an appointment tomorrow with: " . $staff_fname . " " . $staff_lname ." for " . $type . ". \n\n\nThanks!\n\n\nBetwixt Booking\n http://secs.oakland.edu/~hmbock/login.php";
    $headersStudent = 'From:noreply@secs.oakland.edu' . "\r\n";
    mail($toStudent, $subjectStudent, $messageStudent, $headersStudent);

    $toStaff      = $staff_email; // Send email to our user
    $subjectStaff = 'Betwixt Booking | Appointment Reminder'; // Give the email a subject
    $messageStaff = "REMINDER! You have an appointment tomorrow with: ". $stu_fname . " " . $stu_lname ." for " . $type . ". \n\n\nThanks! Click the link below to login.\n\n\nBetwixt Booking\n http://secs.oakland.edu/~hmbock/login.php";
    $headersStaff = 'From:noreply@secs.oakland.edu' . "\r\n";
    mail($toStaff, $subjectStaff, $messageStaff, $headersStaff);
}

$conn->close();

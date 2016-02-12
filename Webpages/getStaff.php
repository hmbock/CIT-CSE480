<?php
//include('dbconnect.php');
//header("Content-Type: text/javascript; charset=utf-8");

/**
 * @author
 * @copyright 2016
 */
$conn = new mysqli("localhost", "hmbock", "team@480", "hmbock");

$id = 0;
$data = array();
$sql = "SELECT F_Name, L_Name, staff_id FROM Staff";

//if (isset($_POST['classID'])) {
$id = $_GET['ID'];
$type = $_GET['type'];
// }

if ($type == 'classpf') {
    $sql .= " WHERE Type='Professor' AND staff_id=" . $id;
    $result = $conn->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = array(
            'id' => $row['staff_id'],
            'fname' => $row['F_Name'],
            'lname' => $row['L_Name']
        );
    }

} else if ($type == 'dept') {

    $sql .= " WHERE Type='Advisor' AND Department_ID=" . $id;
    $result = $conn->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = array(
            'id' => $row['staff_id'],
            'fname' => $row['F_Name'],
            'lname' => $row['L_Name']
        );
    }
} else if ($type == "tutor") {

    $sql .= " WHERE Type='Tutor' AND Class_ID=" . $id;
    $result = $conn->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = array(
            'id' => $row['staff_id'],
            'fname' => $row['F_Name'],
            'lname' => $row['L_Name']
        );
    }
} else if ($type == "hc") {

    $sql .= " WHERE Type='Health'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = array(
            'id' => $row['staff_id'],
            'fname' => $row['F_Name'],
            'lname' => $row['L_Name']
        );
    }
} else if ($type == "prof") {

    $sql .= " WHERE Type='Professor'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = array(
            'id' => $row['staff_id'],
            'fname' => $row['F_Name'],
            'lname' => $row['L_Name']
        );
    }
} else if ($type == "adv") {
    $sql .= " WHERE Type='Advisor'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = array(
            'id' => $row['staff_id'],
            'fname' => $row['F_Name'],
            'lname' => $row['L_Name']
        );
    }
} else if ($type = 'tutorpn') {
    $sql .= " WHERE Type='Tutor'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = array(
            'id' => $row['staff_id'],
            'fname' => $row['F_Name'],
            'lname' => $row['L_Name']
        );
    }
} else if ($type = 'tutordept') {
    $sql .= " WHERE Type='Tutor' AND Department_ID=" . $id;
    $result = $conn->query($sql);

    while ($row = $result->fetch_array()) {
        $data[] = array(
            'id' => $row['staff_id'],
            'fname' => $row['F_Name'],
            'lname' => $row['L_Name']
        );
    }
}
echo json_encode($data);
?>

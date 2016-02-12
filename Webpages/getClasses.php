<?php
    //include('dbconnect.php');
 //header("Content-Type: text/javascript; charset=utf-8");

    /**
    * @author
    * @copyright 2016
    */
    $conn = new mysqli("localhost", "hmbock", "team@480", "hmbock");

    $classArray = array();

    $deptid = 0;

    //if (isset($_POST['depID'])) {
        $deptid = $_GET['ID'];
    //}

    $sql = "SELECT Title, CRN, Class_ID, staff_id FROM Class WHERE Department_ID=" . $deptid;
    $classResult = $conn->query($sql) ;

    $data = array();
    while ($row = $classResult->fetch_array()) {
        $data[] = array(
            'id' => $row['Class_ID'],
            'crn' => $row['CRN'],
            'title' => $row['Title'],
            'staff_id' => $row['staff_id']
        );
    }
    echo json_encode($data);
?>


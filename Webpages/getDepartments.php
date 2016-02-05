<?php
/**
 * Created by PhpStorm.
 * User: Phill
 * Date: 2/5/2016
 * Time: 9:44 AM
 */

//require_once("dbconnect.php");

    $conn = new mysqli("localhost", "hmbock", "team@480", "hmbock");
    $data = array();

    $depSql = "SELECT Department, Department_ID FROM Department";
    $depResult = $conn->query($depSql);
    while ($row = $depResult->fetch_array()) {
        $data[] = array(
            'id' => $row['Department_ID'],
            'department' => $row['Department']
        );
    }

    $conn->close();

    echo json_encode($data);

?>
<?php

/**
 * @author phill szymanski
 * @copyright 2016
 */

    $servername = "localhost";
    $dbusername = "hmbock";
    $dbpassword = "team@480";
    $dbname = "hmbock";
    
    $userConn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    
    if($userConn->connect_error) {
        die("Connection failed: " . $userConn->connect_error);
    }

?>
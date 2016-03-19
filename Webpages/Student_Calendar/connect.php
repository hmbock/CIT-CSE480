<?php
$db_host = "localhost";
$db_username = "hmbock";
$db_pass = "team@480";
$db_name = "hmbock";
$conn = mysql_connect("$db_host","$db_username","$db_pass") or die ("could not connect to mysql");
mysql_select_db("$db_name") or die ("no database");
?>
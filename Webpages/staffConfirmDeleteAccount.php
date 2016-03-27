<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Betwixt Booking</title>
    <meta charset="utf-8">
    <meta name= "viewport" content= "width= device-width, initial-scale=1.0">
    <link href="betwixt.css" rel="stylesheet">
    <link rel="stylesheet" href="C:\Users\lkwal_000\Google Drive\CIT_CSE 480\Production\css\font-awesome-4.5.0\css\font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">
</head>

<body>
<div id="wrapper">



<?php
/**
 * Created by PhpStorm.
 * User: Phill
 * Date: 3/8/2016
 * Time: 9:24 PM
 */

$username = $_SESSION['username'];

if(isset($_POST['submit']))
{   
	
	 
    try {
        //mysql_connect("localhost", "hmbock", "team@480") or die(mysql_error()); // Connect to database server(localhost) with username and password.
        //mysql_select_db("hmbock") or die(mysql_error()); // Select prdaram database.
    
        if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {

		echo "<p>" .  $_SESSION['id'] . "</p>";		
	
    
            $conn = new mysqli("localhost", "hmbock", "team@480", "hmbock");
    
    
            $result = $conn->query("DELETE FROM Student WHERE stu_id = '" . $_SESSION['id'] . "'");
    
            if ($result) {

                            $resultAppts = $conn->query("DELETE FROM events WHERE stu_id = '" . $_SESSION['id'] . "'");
                            
                            if($resultAppts) {

                                header('location:http://www.secs.oakland.edu/~hmbock/480Index.php');
                                exit();
                            }
                        }
        }
    } catch(Exception $e) {
        echo '<p>Unable to connect. Please try again later.</p>';
    }
} 
?>


    <header>
        <h1> Welcome to Betwixt Booking</h1>
    </header>


    <main role ="main">
        <nav>
            <ul>
                <li>Welcome <?php echo $_SESSION['username']; ?> </li>
                <li><a href="http://secs.oakland.edu/~hmbock/myCalendar.php"><i class="fa fa-calendar"></i> &nbsp;Home</a></li>
                <li><a href="http://secs.oakland.edu/~hmbock/upcomingApp.php"><i class="fa fa-arrow-up"></i>&nbsp;Appointments</a></li>
                <li><a href="http://secs.oakland.edu/~hmbock/scheduleApp.php"><i class="fa fa-plus-circle"></i>&nbsp;Schedule an Appointment</a></li>
                <li><a href="http://secs.oakland.edu/~hmbock/accountSettings.php"><i class="fa fa-circle"></i> &nbsp; Manage Account</a></li>
                <li><a href="logout.php"><i class="fa fa-circle"></i>&nbsp; Logout</a></li>
            </ul>
        </nav>
        <form method="post">


            <div id="content">
                <h2>Are you sure you want to delete your account?</h2>
                <input type="submit" id="submit" name="submit" size="10"  value="Yes, I'm sure I want to delete my account." >
            </div>
        </form>
    </main>

    <footer role="contentinfo">
        Copyright &copy; 2016 Betwixt Booking<br>
        <a href="mailto:betwixtbooking@gmail.com">
            <address>BetwixtBooking@gmail.com</address>
        </a>
    </footer>
</div>

</body>

</html>


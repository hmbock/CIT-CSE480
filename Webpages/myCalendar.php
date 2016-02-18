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
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
   <script src="../scheduler/dhtmlxscheduler.js" type="text/javascript"></script>
   <link rel="stylesheet" href="../scheduler/dhtmlxscheduler.css" type="text/css">
   <!--<link href='http://fullcalendar.io/js/fullcalendar-2.6.0/fullcalendar.css' rel='stylesheet' />
<link href='http://fullcalendar.io/js/fullcalendar-2.6.0/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js'></script>
<script src='//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://fullcalendar.io/js/fullcalendar-2.6.0/fullcalendar.js'></script>
-->
<link rel="stylesheet" href="fullcalendar/fullcalendar.css" />
<script src='lib/jquery.min.js'></script>
<script src='lib/moment.min.js'></script>
<script src="fullcalendar/fullcalendar.js"></script>

	</head>
	
	<body>
		<div id="wrapper">
			<header>
				<h1> My Calendar</h1>
			</header>
			
			
			<main role ="main">
				<nav>
					<ul>
                    	
            		  <li>Username:<?php echo $_SESSION['username']; ?> </li>   
                      <li><a href="http://secs.oakland.edu/~hmbock/myCalendar.php"><i class="fa fa-calendar"></i> &nbsp; Home</a></li>
					  <li><a href="http://secs.oakland.edu/~hmbock/cancelApp.php"><i class="fa fa-ban"></i> &nbsp; Appointments</a></li>
             		  <li><a href="http://secs.oakland.edu/~hmbock/accountSettings.php"><i class="fa fa-circle"></i> &nbsp; Manage Account</a></li>
					  <li><a href="logout.php"><i class="fa fa-circle"></i>&nbsp; Logout</a></li>
					</ul>
				</nav>	
			
				<div id="content">
					<div id='calendar'><script>
$(function() { // document ready
  
  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay'
    },
    
    defaultDate: new Date().toJSON().slice(0,10),//'2015-01-31',
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    events: [
      {
        title: 'All Day Event',
        start: '2016-02-01'
      },
      {
        title: 'Long Event',
        start: '2016-02-07',
        end: '2016-02-10'
      },
      {
        id: 999,
        title: 'Repeating Event',
        start: '2016-02-09T16:00:00' 
      },
	  {
		title: "Weekly Meeting",
		start: '13:00',
		end: '07:00',
		dow: [1, 3]
	  },
	  //{
	  // 	id:1000, start: "10:00", end: "12:00", dow:[1,4],
	 //	ranges[{start: "2016/02/01", end: "2016/04/01"}]
		
	 // },
      {
        id: 999,
        title: 'Repeating Event',
        start: '2014-11-16T16:00:00'
      },
      {
        title: 'Conference',
        start: '2014-11-11',
        end: '2014-11-13'
      },
      {
        title: 'Meeting',
        start: '2014-11-12T10:30:00',
        end: '2014-11-12T12:30:00'
      },
      {
        title: 'Lunch',
        start: '2014-11-12T12:00:00'
      },
      {
        title: 'Meeting',
        start: '2014-11-12T14:30:00'
      },
      {
        title: 'Happy Hour',
        start: '2014-11-12T17:30:00'
      },
      {
        title: 'Dinner',
        start: '2014-11-12T20:00:00'
      },
      {
        title: 'Birthday Party',
        start: '2014-11-13T07:00:00'
      },
      {
        title: 'Click for Google',
        url: 'http://google.com/',
        start: '2014-11-28'
      }
    ]
  });
  
});
</script></div> 
</div>
				
			</main>

			<footer role="contentinfo">
				Copyright &copy; 2016 Betwixt Booking<br>
				<a href="mailto:betwixtbooking@gmail.com">
					<address>BetwixtBooking@gmail.com</address>
				</a>
			</footer>
        </div>	
	</body>


</script>

</html>
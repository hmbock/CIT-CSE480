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
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

	</head>
	
	<body>

        <?php
    function submitApptReq() {

        $title = $_POST['title'];
        //$start = $_POST['start'];
        //$end = $_POST['end'];
        $staff = $_POST['person'];

        $conn = new mysqli("localhost", "hmbock", "team@480", "hmbock");

        $sql = "INSERT INTO Appointments (Appointment_Title, stu_id, Staff_ID, Confirmed) values ({$title}, 41, {$staff}, 0)";
        $apptResult = $conn->query($sql);

        $conn->close();


    }

        if(isset($_POST['submit']))
        {
            submitApptReq();
        }
        ?>


			<header>
				<h1> Schedule an Appointment</h1>
			</header>
		<div id="wrapper">
	
			<main role ="main">
				<nav>
					<ul>
					  <li><a href="http://secs.oakland.edu/~hmbock/betwixtBooking.php"><i class="fa fa-home"></i>&nbsp;Home</a></li>
					  <li><a href="http://secs.oakland.edu/~hmbock/scheduleApp.php"><i class="fa fa-plus-circle"></i>&nbsp;Schedule an Appointment</a></li>
					  <li><a href="http://secs.oakland.edu/~hmbock/upcomingApp.php"><i class="fa fa-arrow-up"></i>&nbsp;Upcoming Appointments</a></li>
					  <li><a href="http://secs.oakland.edu/~hmbock/cancelApp.php"><i class="fa fa-ban"></i> &nbsp; Cancel Appointment</a></li>
					  <li><a href="http://secs.oakland.edu/~hmbock/myCalendar.php"><i class="fa fa-calendar"></i> &nbsp;My Calendar</a></li>
             <li><a href="http://secs.oakland.edu/~hmbock/accountSettings.php"><i class="fa fa-circle"></i> &nbsp; Manage Account</a></li>
					  <li><a href="logout.php"><i class="fa fa-circle"></i>&nbsp; Logout</a></li>
					</ul>
				</nav>	
                <form action="" method="POST" >
				<div id="content">
					<h2> Schedule an Appointment </h2>
					<p><b><u>To make a New appointment, fill the form below:</u></b></p>
					
						<div class="dropdown" id="app">
                        <h2>Where would you like to make an appointment?</h2>
						  <select name="sel_type"class="dropbtn">
                            <option value="0">Please Choose</option>
                            <option value="aa">Academic Advising</option>
							<option value="pf">Professors</option>
							<option value="tc">Tutor Center</option>
							<option value="hc">Health Center</option>
                          </select>
						</div>

                    <div class="dropdown" id="pcd" style="display: block">
                        <h2>Would you like to sort by person, class or date?</h2>
                        <select id="pcddd" name="sel_pcd" class="dropbtn">
                            <option value="">Please Select</option>
                            <option value="pn">Person</option>
                            <option value="cl">Class/Department</option>
                            <option value="dt">Date</option>
                        </select>
                        </div>
                        
                        <!-- if class is chosen: --->
                    <div class="dropdown" id="department" style="display: none">
                        <h2>Select a department</h2>
                        <select title="sel_dep" id="departmentdd" name="sel_dep" class="dropbtn">
                            <option value="">Please Select</option>
                        </select>
                    </div>

                    <script>


                        $(document).ready(function($) {

                            function emptyDD(dd) {

                                $('#'+dd).empty();
                                $('#'+dd).append('<option value=\"0\">Please select</option>');
                            }$('#pcd').change(function(e) {
                                var pcd = $('#pcd option:selected').attr('value');

                                switch (pcd) {
                                    case "pn":
                                        document.getElementById('department').style.display = 'none';
                                        document.getElementById('class').style.display = 'none';
                                        document.getElementById('person').style.display = 'block';
                                        break;
                                    case "cl":
                                        document.getElementById('department').style.display = 'block';
                                        document.getElementById('class').style.display = 'block';
                                        document.getElementById('person').style.display = 'block';
                                        break;
                                    case "date":
                                        document.getElementById('department').style.display = 'none';
                                        document.getElementById('class').style.display = 'none';
                                        document.getElementById('person').style.display = 'none';
                                }

                                document.getElementById('date').style.display = 'block';
                            });

                            var list_target_id = 'classdd'; //first select list ID
                            var list_select_id = 'departmentdd'; //second select list ID
                            var loading = '<option value="">Loading...</option>'; //Initial prompt for target select

                            $('#pcd').change(function(e) {
                                //Get chosen value from appointment type select list
                               var sel =  $('#app option:selected').attr('value');
                                //alert(sel);
                                var pcd = $('#pcd option:selected').attr('value');

                                emptyDD('departmentdd');
                                emptyDD('classdd');
                                emptyDD('persondd');

                                document.getElementById('pcd').style.display = 'block';

                               switch (sel) {
                                   case "aa":
                                       if (pcd == 'cl') {

                                           document.getElementById('class').style.display = 'none';
                                           document.getElementById('date').style.display = 'block';

                                           $.ajax({
                                               url: 'getDepartments.php',
                                               method: "GET",
                                               dataType: "json",
                                               contentType: "application/json; charset=utf-8",
                                               success: function (data) {
                                                   //alert(data);
                                                   $('#departmentdd').empty();
                                                   $('#departmentdd').append('<option value=\"0\">Please select</option>');
                                                   $.each(data, function (i, item) {
                                                       $('#departmentdd').append('<option value="' + data[i].id + '">' + data[i].department + '</option>');
                                                   });
                                               },
                                               error: function (xhr, ajaxOptions, thrownError) {
                                                   alert(xhr.status + " " + thrownError);
                                               }
                                           });
                                       } else if (pcd == 'pn') {
                                           document.getElementById('department').style.display = 'none';
                                           document.getElementById('class').style.display = 'none';

                                           $.ajax({url: 'getStaff.php',
                                               data: { ID : sel, type : "adv" },
                                               method: "GET",
                                               dataType: "json",
                                               contentType: "application/json; charset=utf-8",
                                               success: function(data) {
                                                   //alert(data);
                                                   $('#persondd').empty();
                                                   $('#persondd').append('<option value=\"0\">Please select</option>');
                                                   $.each(data, function(i, item) {
                                                       $('#persondd').append('<option value="' + data[i].id + '">' + data[i].fname + ' ' + data[i].lname + '</option>');
                                                   });
                                               },
                                               error: function (xhr, ajaxOptions, thrownError) {
                                                   alert(xhr.status + " " + thrownError);
                                               }});
                                       }
                                       //emptyDD("classdd");
                                       //emptyDD("persondd");
                                       //document.getElementById('department').style.display = 'block';
                                       //document.getElementById('class').style.display = 'none';
                                       //document.getElementById('date').style.display = 'none';
                                       document.getElementById('person').style.display = 'block';
                                       break;
                                   case "pf":
                                       if(pcd == 'cl') {
                                           $.ajax({
                                               url: 'getDepartments.php',
                                               method: "GET",
                                               dataType: "json",
                                               contentType: "application/json; charset=utf-8",
                                               success: function (data) {
                                                   //alert(data);
                                                   $('#departmentdd').empty();
                                                   $('#departmentdd').append('<option value=\"0\">Please select</option>');
                                                   $.each(data, function (i, item) {
                                                       $('#departmentdd').append('<option value="' + data[i].id + '">' + data[i].department + '</option>');
                                                   });
                                               },
                                               error: function (xhr, ajaxOptions, thrownError) {
                                                   alert(xhr.status + " " + thrownError);
                                               }
                                           });
                                       } else if (pcd == 'pn') {
                                           document.getElementById('department').style.display = 'none';
                                           document.getElementById('class').style.display = 'none';

                                           $.ajax({url: 'getStaff.php',
                                               data: { ID : sel, type : "prof" },
                                               method: "GET",
                                               dataType: "json",
                                               contentType: "application/json; charset=utf-8",
                                               success: function(data) {
                                                   //alert(data);
                                                   $('#persondd').empty();
                                                   $('#persondd').append('<option value=\"0\">Please select</option>');
                                                   $.each(data, function(i, item) {
                                                       $('#persondd').append('<option value="' + data[i].id + '">' + data[i].fname + ' ' + data[i].lname + '</option>');
                                                   });
                                               },
                                               error: function (xhr, ajaxOptions, thrownError) {
                                                   alert(xhr.status + " " + thrownError);
                                               }});
                                       }
                                       emptyDD("classdd");
                                       emptyDD("persondd");
                                       //document.getElementById('department').style.display = 'block';
                                       //document.getElementById('class').style.display = 'block';
                                       document.getElementById('person').style.display = 'block';
                                       //document.getElementById('date').style.display = 'none';
                                       break;
                                   case "tc":
                                       if (pcd == 'cl') {

                                           document.getElementById('department').style.display = 'block';
                                           document.getElementById('class').style.display = 'block';
                                           document.getElementById('person').style.display = 'block';

                                           $.ajax({
                                               url: 'getDepartments.php',
                                               method: "GET",
                                               dataType: "json",
                                               contentType: "application/json; charset=utf-8",
                                               success: function (data) {
                                                   //alert(data);
                                                   $('#departmentdd').empty();
                                                   $('#departmentdd').append('<option value=\"0\">Please select</option>');
                                                   $.each(data, function (i, item) {
                                                       $('#departmentdd').append('<option value="' + data[i].id + '">' + data[i].department + '</option>');
                                                   });
                                               },
                                               error: function (xhr, ajaxOptions, thrownError) {
                                                   alert(xhr.status + " " + thrownError);
                                               }
                                           });
                                       } else if (pcd == 'pn') {

                                           document.getElementById('department').style.display = 'none';
                                           document.getElementById('class').style.display = 'none';
                                           document.getElementById('person').style.display = 'block';

                                           $.ajax({url: 'getStaff.php',
                                               data: { ID : sel, type : "tutorpn" },
                                               method: "GET",
                                               dataType: "json",
                                               contentType: "application/json; charset=utf-8",
                                               success: function(data) {
                                                   //alert(data);
                                                   $('#persondd').empty();
                                                   $('#persondd').append('<option value=\"0\">Please select</option>');
                                                   $.each(data, function(i, item) {
                                                       $('#persondd').append('<option value="' + data[i].id + '">' + data[i].fname + ' ' + data[i].lname + '</option>');
                                                   });
                                               },
                                               error: function (xhr, ajaxOptions, thrownError) {
                                                   alert(xhr.status + " " + thrownError);
                                               }});
                                       }
                                       emptyDD("classdd");
                                       emptyDD("persondd");
//                                       document.getElementById('department').style.display = 'block';
//                                       document.getElementById('class').style.display = 'block';
//                                       document.getElementById('person').style.display = 'block';
                                       //document.getElementById('date').style.display = 'none';
                                       break;
                                   case "hc":
                                       $('#classdd').empty();
                                       $('#persondd').empty();
                                       $.ajax({url: 'getStaff.php',
                                           data: { ID : sel, type : "hc" },
                                           method: "GET",
                                           dataType: "json",
                                           contentType: "application/json; charset=utf-8",
                                           success: function(data) {
                                               //alert(data);
                                               $('#persondd').empty();
                                               $('#persondd').append('<option value=\"0\">Please select</option>');
                                               $.each(data, function(i, item) {
                                                   $('#persondd').append('<option value="' + data[i].id + '">' + data[i].fname + ' ' + data[i].lname + '</option>');
                                               });
                                           },
                                           error: function (xhr, ajaxOptions, thrownError) {
                                               alert(xhr.status + " " + thrownError);
                                           }});
                                       document.getElementById('person').style.display = 'block';
                                       document.getElementById('department').style.display = 'none';
                                       document.getElementById('class').style.display = 'none';
                                       //document.getElementById('date').style.display = 'none';
                                       break;
                                   default:

                               }

                            });

                            $('#department').change(function(e) {

                                emptyDD("persondd");
                                emptyDD("classdd");

                                var type = $('#app option:selected').attr('value');

                                var pcd = $('#pcd option:selected').attr('value');

                                switch (type) {

                                    case "aa":
                                        var sel = $('#department option:selected').attr('value');

                                        if (sel == "") {
                                            emptyDD("persondd");
                                            emptyDD("classdd");
                                        } else {
                                            $.ajax({url: 'getStaff.php',
                                                data: { ID : sel, type : "department" },
                                                method: "GET",
                                                dataType: "json",
                                                contentType: "application/json; charset=utf-8",
                                                success: function(data) {
                                                    //alert(data);
                                                    $('#persondd').empty();
                                                    $('#persondd').append('<option value=\"0\">Please select</option>');
                                                    $.each(data, function(i, item) {
                                                        $('#persondd').append('<option value="' + data[i].id + '">' + data[i].fname + ' ' + data[i].lname + '</option>');
                                                    });
                                                },
                                                error: function (xhr, ajaxOptions, thrownError) {
                                                    alert(xhr.status + " " + thrownError);
                                                }});
                                        }
                                        break;

                                    case "pf":
                                        //Get the chosen value on first select list change
                                        var sel = $('#department option:selected').attr('value');

                                        if (sel == "") {
                                            emptyDD("persondd");
                                            emptyDD("classdd");
                                        } else {
                                            //Make AJAX request, using the selected value as the GET
                                            $.ajax({url: 'getClasses.php',
                                                data: { ID : sel },
                                                method: "GET",
                                                dataType: "json",
                                                contentType: "application/json; charset=utf-8",
                                                success: function(data) {
                                                    //alert(data);
                                                    $('#classdd').empty();
                                                    $('#classdd').append('<option value=\"0\">Please select</option>');
                                                    $.each(data, function(i, item) {
                                                        $('#classdd').append('<option value="' + data[i].id + '">' + data[i].crn + ': ' + data[i].title + '</option>');
                                                    });
                                                },
                                                error: function (xhr, ajaxOptions, thrownError) {
                                                    alert(xhr.status + " " + thrownError);
                                                }});
                                            }
                                        break;

                                    case "tc":

                                        var sel = $('#department option:selected').attr('value');

                                        if (sel == "") {
                                            emptyDD("persondd");
                                            emptyDD("classdd");
                                        } else {
                                            $.ajax({url: 'getClasses.php',
                                                data: { ID : sel },
                                                method: "GET",
                                                dataType: "json",
                                                contentType: "application/json; charset=utf-8",
                                                success: function(data) {
                                                    //alert(data);
                                                    $('#classdd').empty();
                                                    $('#classdd').append('<option value=\"0\">Please select</option>');
                                                    $.each(data, function(i, item) {
                                                        $('#classdd').append('<option value="' + data[i].id + '">' + data[i].crn + ': ' + data[i].title + '</option>');
                                                    });
                                                },
                                                error: function (xhr, ajaxOptions, thrownError) {
                                                    alert(xhr.status + " " + thrownError);
                                                }});
                                        }
                                        break;

                                    default:
                                }
                            });

                            $('#classdd').change(function(e) {
                               var sel = $('#class option:selected').attr('value');
                                var type = $('#app option:selected').attr('value');

                                switch (type) {
                                    case "pf":
                                        //Ajax request
                                        $.ajax({
                                            url: 'getStaff.php',
                                            data: {ID: sel, type: "class"},
                                            method: "GET",
                                            dataType: "json",
                                            contentType: "application/json; charset=utf-8",
                                            success: function (data) {
                                                $('#persondd').empty();
                                                $('#persondd').append('<option value=\"0\">Please select</option>');
                                                $.each(data, function (i, item) {
                                                    $('#persondd').append('<option value="' + data[i].id + '">' + data[i].fname + ' ' + data[i].lname + '</option>');
                                                });
                                            },
                                            error: function (xhr, ajaxOptions, thrownError) {
                                                alert(xhr.status + " " + thrownError);
                                            }
                                        });
                                        break;
                                    case "tc":
                                        $.ajax({
                                            url: 'getStaff.php',
                                            data: {ID: sel, type: "tutor"},
                                            method: "GET",
                                            dataType: "json",
                                            contentType: "application/json; charset=utf-8",
                                            success: function (data) {
                                                $('#persondd').empty();
                                                $('#persondd').append('<option value=\"0\">Please select</option>');
                                                $.each(data, function (i, item) {
                                                    $('#persondd').append('<option value="' + data[i].id + '">' + data[i].fname + ' ' + data[i].lname + '</option>');
                                                });
                                            },
                                            error: function (xhr, ajaxOptions, thrownError) {
                                                alert(xhr.status + " " + thrownError);
                                            }
                                        });
                                        break;
                                    default:
                                }
                            });
                        });

                    </script>

                    <div class="dropdown" id="class" style="display: none">
                        <h2>Select a class</h2>
                        <select title="class" id="classdd" class="dropbtn">
                            <option value="">Please Select</option>
                        </select>
                    </div>
                    <!-- if class is chosen: --->
                    
                    <!-- if PERSON is chosen: --->
                    <div class="dropdown" id="person" style="display: none">
                        <h2>Select a person</h2>
                        <select name="person" title="persondd" id="persondd" class="dropbtn">
                            <option value="">Please Select</option>
                        </select>
                    </div>
                    
                    
                    <!-- if PERSON is chosen: --->

                    <div class="dropdown" id="date" style="display: none;" >
                        <h2>Select a date</h2>
                        <!---                <select class="dropbtn">
                                           <option value="">Please Select</option>
                                           <option value="jan">January</option>
                                           <option value="feb">February</option>
                                           <option value="mar">March</option>
                                           <option value="apr">April</option>
                                           <option value="may">May</option>
                                           <option value="jun">June</option>
                                           <option value="jul">July</option>
                                           <option value="aug">August</option>
                                           <option value="sep">September</option>
                                           <option value="oct">October</option>
                                           <option value="nov">November</option>
                                           <option value="dec">December</option>
                                       </select>

                                      <input type="number" style="display: block"/>.
                                       Start Time: <input id="start" name="start" type="datetime-local" />
                                       End Time: <input id="end" name="end" type="datetime-local" /> --->
                        Give you appointment a Title: <input name="title" id="title" type="text" />

                    </div>
					</br>
					
					<p> Summer, Fall, Winter Registration starts March 1st!</p> 
					 <p>	Walk-in's ONLY First Week of March. </p>

                    <input type="submit" id="submit" />
				</div>
				
                </form>
				
			</main>
			
			
			
			<iframe id='cv_if1' src='http://cdn.instantcal.com/cvir.html?id=cv_nav1&theme=RE&ntype=cv_datepickerm&file=http%3A%2F%2Fwww.instantcal.com%2Ftest.ics&border_radius=5' allowTransparency='true' scrolling='no' frameborder=0 height=250 width=250></iframe>
		</div>
		<footer role = "contentinfo"></footer>
	</body>
	
</html>

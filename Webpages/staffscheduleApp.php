<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		
		<title>Betwixt Booking</title>
		<meta charset="utf-8">
		<meta name= "viewport" content= "width= device-width, initial-scale=1.0">
		
		
		<link rel="stylesheet" href="font-awesome-4.5.0\css\font-awesome.min.css">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">
		
		<link href="staffStylesheet.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

	</head>
	
	<body>	
		<div id="wrapper">
       		 <header>
				<h1> Schedule an Appointment</h1>
			 </header>

			<main role ="main">
				<nav>
					<ul>
            		   <li>Welcome <?php echo $_SESSION['username'];?> </li>  
					  <li><a href="http://secs.oakland.edu/~hmbock/staffBetwixtBooking.php"><i class="fa fa-home"></i>&nbsp;Home</a></li>
					  <li><a href="http://secs.oakland.edu/~hmbock/manageAvailability.php">&nbsp;<i class="fa fa-share"></i>&nbsp;Manage Availability</a></li>
					  <!--<li><a href="http://secs.oakland.edu/~hmbock/cancelApp.php"><i class="fa fa-ban"></i> &nbsp; Appointments</a></li>
					  <li><a href="http://secs.oakland.edu/~hmbock/scheduleApp.php"><i class="fa fa-plus-circle"></i>&nbsp;Schedule Appointment</a></li>-->
					  <li><a href="staffPhonebook.php">&nbsp;<i class="fa fa-phone-square"></i>&nbsp;Contacts</a></li>
            		  <li><a href="http://secs.oakland.edu/~hmbock/staffAccountSettings.php">&nbsp;<i class="fa fa-user"></i>&nbsp;Manage Account</a></li>
					  <li><a href="logout.php">&nbsp;<i class="fa fa-sign-out"></i>&nbsp;Logout</a></li>
					</ul>
				</nav>	
                
                <div id="content">
					<form action="" method="POST" >
                        <h2> Schedule an Appointment </h2>
						
                        <p><b><u>To make a New appointment, fill the form below:</u></b></p>
                        
                            <div class="dropdown" id="app">
                                <p>Where would you like to make an appointment?</p>
                                  <select name="sel_type"class="dropbtn">
                                    <option value="0">Please select</option>
                                    <option value="aa">Academic Advising</option>
                                    <option value="pf">Professors</option>
                                    <option value="tc">Tutor Center</option>
                                  </select>
                            </div>
    
							<div class="dropdown" id="pcd" style="display: block">
									<p>Would you like to sort by person, class or date?</p>
									<select id="pcddd" name="sel_pcd" class="dropbtn">
										<option value="ps">Please select</option>
										<option value="pn">Person</option>
										<option value="cl">Class/Department</option>
										<option value="dt">Date</option>
									</select>
							</div>
                            
                            <!-- if class is chosen: --->
							<div class="dropdown" id="department" style="display: none">
								<p>Select a department</p>
								<select title="sel_dep" id="departmentdd" name="sel_dep" class="dropbtn">
									<option value="">Please Select</option>
								</select>
							</div>


                  <script>


                        $(document).ready(function($) {

                            //Empties a select list and sets initial option
                            function resetDD(dd) {

                                $('#'+dd).empty();
                                $('#'+dd).append('<option value=\"0\">Please select</option>');
                            }

                            //Fills a select list with the appropriate values
                            function fillDD(url, list, sID, type) {

                                switch (type) {

                                    case "department":
                                        $.ajax({
                                            url: url,
                                            method: "GET",
                                            dataType: "json",
                                            contentType: "application/json; charset=utf-8",
                                            success: function (data) {
                                                $('#'+list).empty();
                                                $('#'+list).append('<option value=\"0\">Please select</option>');
                                                $.each(data, function (i, item) {
                                                    $('#'+list).append('<option value="' + data[i].id + '">' + data[i].department + '</option>');
                                                });
                                            },
                                            error: function (xhr, ajaxOptions, thrownError) {
                                                alert(xhr.status + " " + thrownError);
                                            }
                                        });
                                        break;

                                    case "class":
                                        $.ajax({
                                            url: url,
                                            data: { ID: sID },
                                            method: "GET",
                                            dataType: "json",
                                            contentType: "application/json; charset=utf-8",
                                            success: function (data) {
                                                //alert(data);
                                                $('#'+list).empty();
                                                $('#'+list).append('<option value=\"0\">Please select</option>');
                                                $.each(data, function (i, item) {
                                                    $('#'+list).append('<option value="' + data[i].staff_id + '">' + data[i].crn + ': ' + data[i].title + '</option>');
                                                });
                                            },
                                            error: function (xhr, ajaxOptions, thrownError) {
                                                alert(xhr.status + " " + thrownError);
                                            }
                                        });
                                        break;

                                    default:
                                        $.ajax({
                                            url: url,
                                            data: {ID: sID, type: type},
                                            method: "GET",
                                            dataType: "json",
                                            contentType: "application/json; charset=utf-8",
                                            success: function (data) {
                                                //alert(data);
                                                $('#'+list).empty();
                                                $('#'+list).append('<option value=\"0\">Please select</option>');
                                                $.each(data, function (i, item) {
                                                    $('#'+list).append('<option value="' + data[i].id + '">' + data[i].fname + ' ' + data[i].lname + '</option>');
                                                });
                                            },
                                            error: function (xhr, ajaxOptions, thrownError) {
                                                alert(xhr.status + " " + thrownError);
                                            }
                                        });
                                        break;
                                }
                            }

                            //On change event for appointment type select list
                            $('#app').change(function(e) {

                                //Change person/class/date select list back to "Please select" and reset all others
                                $('#pcddd').val('ps');
                                resetDD("persondd");
                                resetDD("departmentdd");
                                resetDD("classdd");

                                //If "Please Select" is selected, hide all other select lists
                                if ($('#app option:selected').attr('value') == 'ps') {
                                    document.getElementById('person').style.display = 'none';
                                    document.getElementById('class').style.display = 'none';
                                    document.getElementById('department').style.display = 'none';
                                    //If health center appointment, display only "Person" select list
                                } else if ($('#app option:selected').attr('value') == 'hc') {
                                    document.getElementById('class').style.display = 'none';
                                    document.getElementById('department').style.display = 'none';
                                    document.getElementById('person').style.display = 'block';
                                }
                            });

                            //On change event for person/class/date select list
                            $('#pcd').change(function(e) {

                                //Reset all select lists
                                resetDD('departmentdd');
                                resetDD('classdd');
                                resetDD('persondd');

                                //Get chosen value from appointment type and P/C/D select lists
                                var sel =  $('#app option:selected').attr('value');
                                var pcd = $('#pcd option:selected').attr('value');

                                //Logic for deciding which select lists to display
                                switch (pcd) {
                                    //If "Person" if selected, display only "Person" select list
                                    case "pn":
                                        document.getElementById('department').style.display = 'none';
                                        document.getElementById('class').style.display = 'none';
                                        document.getElementById('person').style.display = 'block';
                                        break;
                                    //If "Class" if selected, display all select lists
                                    case "cl":
                                        document.getElementById('department').style.display = 'block';
                                        document.getElementById('class').style.display = 'block';
                                        document.getElementById('person').style.display = 'block';
                                        break;
                                    //If date is selected,
                                    case "date":
                                        /*

                                                SHOW CALENDAR

                                         */
                                        document.getElementById('department').style.display = 'none';
                                        document.getElementById('class').style.display = 'none';
                                        document.getElementById('person').style.display = 'none';
                                        break;
                                    //Otherwise, hide all select lists
                                    default:
                                        document.getElementById('department').style.display = 'none';
                                        document.getElementById('class').style.display = 'none';
                                        document.getElementById('person').style.display = 'none';
                                }

                                document.getElementById('date').style.display = 'block';

                                //Logic for deciding which data should be retrieved based on which appointment type is selected
                               switch (sel) {

                                   //If "Academic Advising" is selected...
                                   case "aa":
                                       //...and "Class/Department" is selected,  fill the "Departments" select list
                                       if ( pcd == 'cl' ) {

                                            fillDD('getDepartments.php', 'departmentdd', 0, 'department');
                                           document.getElementById('class').style.display = 'none';

                                           //...and "Person" is selected, fill the person select list with advisors
                                       } else if (pcd == 'pn') fillDD('getStaff.php', 'persondd', sel, 'adv');

                                       document.getElementById('person').style.display = 'block';
                                       document.getElementById('class').style.display = 'none';

                                       break;

                                   //If "Professors" is selected...
                                   case "pf":
                                       //...and "Class/Department" is selected, fill the "Department" select list
                                       if(pcd == 'cl') {

                                           fillDD('getDepartments.php', 'departmentdd', 0, 'department');

                                           //...and person is selected, fill "Person" select list with all professors
                                       } else if (pcd == 'pn') {

                                           fillDD('getStaff.php', 'persondd', sel, 'prof');
                                       }

                                       //Reset "Person" and "Class" select lists
                                       //resetDD("classdd");
                                       //resetDD("persondd");
                                       break;

                                   //If "Tutoring Center" is selected...
                                   case "tc":

                                       //...and "Class/Department" is selected, fill "Department" select list
                                       if (pcd == 'cl') {

                                           fillDD('getDepartments.php', 'departmentdd', 0, 'department');

                                       } else if (pcd == 'pn') {

                                           document.getElementById('department').style.display = 'none';
                                           document.getElementById('class').style.display = 'none';
                                           document.getElementById('person').style.display = 'block';

                                           fillDD('getStaff.php', 'persondd', sel, 'tutorpn');

                                       }
                                       resetDD("classdd");
                                       resetDD("persondd");
                                       break;
                                   case "hc":
                                       $('#classdd').empty();
                                       $('#persondd').empty();

                                       fillDD('getStaff.php', 'persondd', sel, 'hc');

                                       document.getElementById('person').style.display = 'block';
                                       document.getElementById('department').style.display = 'none';
                                       document.getElementById('class').style.display = 'none';
                                       break;
                                   default:

                               }

                            });

                            $('#department').change(function(e) {

                                resetDD("persondd");
                                resetDD("classdd");

                                var type = $('#app option:selected').attr('value');

                                var pcd = $('#pcd option:selected').attr('value');

                                var selID = $('#department option:selected').attr('value');

                                switch (type) {

                                    case "aa":

                                        fillDD('getStaff.php', 'persondd', selID, 'dept');

                                        break;

                                    case "pf":

                                        fillDD('getClasses.php', 'classdd', selID, 'class');

                                         break;

                                    case "tc":

                                        fillDD('getStaff.php', 'persondd', selID, 'tutordept');

                                            $.ajax({url: 'getClasses.php',
                                                data: { ID : selID },
                                                method: "GET",
                                                dataType: "json",
                                                contentType: "application/json; charset=utf-8",
                                                success: function(data) {
                                                    //alert(data);
                                                    $('#classdd').empty();
                                                    $('#classdd').append('<option value=\"0\">Please select</option>');

                                                    if (data.length == 0) {

                                                        resetDD('persondd');

                                                    } else {
                                                        $.each(data, function (i, item) {
                                                            $('#classdd').append('<option value="' + data[i].id + '">' + data[i].crn + ': ' + data[i].title + '</option>');
                                                        });
                                                    }
                                                },
                                                error: function (xhr, ajaxOptions, thrownError) {
                                                    alert(xhr.status + " " + thrownError);
                                                }});
                                        break;

                                    default:
                                }
                            });

                            $('#classdd').change(function(e) {
                               var sel = $('#class option:selected').attr('value');
                                var dep = $('#department option:selected').attr('value');

                                var type =  $('#app option:selected').attr('value');

                                switch (type) {
                                    case "pf":

                                        fillDD('getStaff.php', 'persondd', sel, 'classpf');
//                                        //Ajax request
//                                        $.ajax({
//                                            url: 'getStaff.php',
//                                            data: {ID: sel, type: "classpf"},
//                                            method: "GET",
//                                            dataType: "json",
//                                            contentType: "application/json; charset=utf-8",
//                                            success: function (data) {
//                                                $('#persondd').empty();
//                                                $('#persondd').append('<option value=\"0\">Please select</option>');
//                                                $.each(data, function (i, item) {
//                                                    $('#persondd').append('<option value="' + data[i].id + '">' + data[i].fname + ' ' + data[i].lname + '</option>');
//                                                });
//                                            },
//                                            error: function (xhr, ajaxOptions, thrownError) {
//                                                alert(xhr.status + " " + thrownError);
//                                            }
//                                        });
                                        break;
                                    case "tc":

                                        fillDD('getStaff.php', 'persondd', sel, 'tutor');

//                                        $.ajax({
//                                            url: 'getStaff.php',
//                                            data: {ID: sel, type: "tutor"},
//                                            method: "GET",
//                                            dataType: "json",
//                                            contentType: "application/json; charset=utf-8",
//                                            success: function (data) {
//                                                $('#persondd').empty();
//                                                $('#persondd').append('<option value=\"0\">Please select</option>');
//                                                $.each(data, function (i, item) {
//                                                    $('#persondd').append('<option value="' + data[i].id + '">' + data[i].fname + ' ' + data[i].lname + '</option>');
//                                                });
//                                            },
//                                            error: function (xhr, ajaxOptions, thrownError) {
//                                                alert(xhr.status + " " + thrownError);
//                                            }
//                                        });
                                        break;
                                    default:
                                }
                            });

                            $('#submit').click(function(e) {

                                var staffID = $('#persondd option:selected').attr('value');
                                var stuID = 41; //change to real val
                                var title = $('#title').val();

                                $.ajax({
                                    url: 'submitApp.php',
                                    data: { staffID : staffID, stuID : stuID, title: title },
                                    method: "GET",
                                    dataType: "json",
                                    contentType: "application/json; charset=utf-8",
                                    success: function () {
                                        $('#success').append("<p>Appointment scheduled successfully!</p>");
                                    },
                                    error: function (xhr, ajaxOptions, thrownError) {
                                        alert(xhr.status + " " + thrownError);
                                    }
                                });
                            });
                        });

				</script>

                    <div class="dropdown" id="class" style="display: none">
                        <p>Select a class</p>
                        <select title="class" id="classdd" class="dropbtn">
                            <option value="">Please Select</option>
                        </select>
                    </div>
                    <!-- if class is chosen: --->
                    
                    <!-- if PERSON is chosen: --->
                    <div class="dropdown" id="person" style="display: none">
                        <p>Select a person</p>
                        <select name="person" title="persondd" id="persondd" class="dropbtn">
                            <option value="">Please Select</option>
                        </select>
                    </div>
                    
                    
                    <!-- if PERSON is chosen: --->

                    <div class="dropdown" id="date" style="display: none;" >
                        <p>Select a date:</p> 
                        Title: <input name="title" id="title" type="text" />

                    </div>
					<br>
					
					<p> Summer, Fall, Winter Registration starts March 1st!</p> 
					 <p>	Walk-in's ONLY First Week of March. </p>

                    <input type="submit" id="submit" />

                    <div id="success" name="success"></div>
				</div>
				
                </form>
	


            <script>


                $(document).ready(function($) {

                    //Empties a select list and sets initial option
                    function resetDD(dd) {

                        $('#'+dd).empty();
                        $('#'+dd).append('<option value=\"0\">Please select</option>');
                    }

                    //Fills a select list with the appropriate values
                    function fillDD(url, list, sID, type) {

                        switch (type) {

                            case "department":
                                $.ajax({
                                    url: url,
                                    method: "GET",
                                    dataType: "json",
                                    contentType: "application/json; charset=utf-8",
                                    success: function (data) {
                                        $('#'+list).empty();
                                        $('#'+list).append('<option value=\"0\">Please select</option>');
                                        $.each(data, function (i, item) {
                                            $('#'+list).append('<option value="' + data[i].id + '">' + data[i].department + '</option>');
                                        });
                                    },
                                    error: function (xhr, ajaxOptions, thrownError) {
                                        alert(xhr.status + " " + thrownError);
                                    }
                                });
                                break;

                            case "class":
                                $.ajax({
                                    url: url,
                                    data: { ID: sID },
                                    method: "GET",
                                    dataType: "json",
                                    contentType: "application/json; charset=utf-8",
                                    success: function (data) {
                                        //alert(data);
                                        $('#'+list).empty();
                                        $('#'+list).append('<option value=\"0\">Please select</option>');
                                        $.each(data, function (i, item) {
                                            $('#'+list).append('<option value="' + data[i].staff_id + '">' + data[i].crn + ': ' + data[i].title + '</option>');
                                        });
                                    },
                                    error: function (xhr, ajaxOptions, thrownError) {
                                        alert(xhr.status + " " + thrownError);
                                    }
                                });
                                break;

                            default:
                                $.ajax({
                                    url: url,
                                    data: {ID: sID, type: type},
                                    method: "GET",
                                    dataType: "json",
                                    contentType: "application/json; charset=utf-8",
                                    success: function (data) {
                                        //alert(data);
                                        $('#'+list).empty();
                                        $('#'+list).append('<option value=\"0\">Please select</option>');
                                        $.each(data, function (i, item) {
                                            $('#'+list).append('<option value="' + data[i].id + '">' + data[i].fname + ' ' + data[i].lname + '</option>');
                                        });
                                    },
                                    error: function (xhr, ajaxOptions, thrownError) {
                                        alert(xhr.status + " " + thrownError);
                                    }
                                });
                                break;
                        }
                    }

                    //On change event for appointment type select list
                    $('#app').change(function(e) {

                        //Change person/class/date select list back to "Please select" and reset all others
                        $('#pcddd').val('ps');
                        resetDD("persondd");
                        resetDD("departmentdd");
                        resetDD("classdd");

                        //If "Please Select" is selected, hide all other select lists
                        if ($('#app option:selected').attr('value') == 'ps') {
                            document.getElementById('person').style.display = 'none';
                            document.getElementById('class').style.display = 'none';
                            document.getElementById('department').style.display = 'none';
                            //If health center appointment, display only "Person" select list
                        } else if ($('#app option:selected').attr('value') == 'hc') {
                            document.getElementById('class').style.display = 'none';
                            document.getElementById('department').style.display = 'none';
                            document.getElementById('person').style.display = 'block';
                        }
                    });

                    //On change event for person/class/date select list
                    $('#pcd').change(function(e) {

                        //Reset all select lists
                        resetDD('departmentdd');
                        resetDD('classdd');
                        resetDD('persondd');

                        //Get chosen value from appointment type and P/C/D select lists
                        var sel =  $('#app option:selected').attr('value');
                        var pcd = $('#pcd option:selected').attr('value');

                        //Logic for deciding which select lists to display
                        switch (pcd) {
                            //If "Person" if selected, display only "Person" select list
                            case "pn":
                                document.getElementById('department').style.display = 'none';
                                document.getElementById('class').style.display = 'none';
                                document.getElementById('person').style.display = 'block';
                                break;
                            //If "Class" if selected, display all select lists
                            case "cl":
                                document.getElementById('department').style.display = 'block';
                                document.getElementById('class').style.display = 'block';
                                document.getElementById('person').style.display = 'block';
                                break;
                            //If date is selected,
                            case "date":
                                /*

                                 SHOW CALENDAR

                                 */
                                document.getElementById('department').style.display = 'none';
                                document.getElementById('class').style.display = 'none';
                                document.getElementById('person').style.display = 'none';
                                break;
                            //Otherwise, hide all select lists
                            default:
                                document.getElementById('department').style.display = 'none';
                                document.getElementById('class').style.display = 'none';
                                document.getElementById('person').style.display = 'none';
                        }

                        document.getElementById('date').style.display = 'block';

                        //Logic for deciding which data should be retrieved based on which appointment type is selected
                        switch (sel) {

                            //If "Academic Advising" is selected...
                            case "aa":
                                //...and "Class/Department" is selected,  fill the "Departments" select list
                                if ( pcd == 'cl' ) {

                                    fillDD('getDepartments.php', 'departmentdd', 0, 'department');
                                    document.getElementById('class').style.display = 'none';

                                    //...and "Person" is selected, fill the person select list with advisors
                                } else if (pcd == 'pn') fillDD('getStaff.php', 'persondd', sel, 'adv');

                                document.getElementById('person').style.display = 'block';
                                document.getElementById('class').style.display = 'none';

                                break;

                            //If "Professors" is selected...
                            case "pf":
                                //...and "Class/Department" is selected, fill the "Department" select list
                                if(pcd == 'cl') {

                                    fillDD('getDepartments.php', 'departmentdd', 0, 'department');

                                    //...and person is selected, fill "Person" select list with all professors
                                } else if (pcd == 'pn') {

                                    fillDD('getStaff.php', 'persondd', sel, 'prof');
                                }

                                //Reset "Person" and "Class" select lists
                                //resetDD("classdd");
                                //resetDD("persondd");
                                break;

                            //If "Tutoring Center" is selected...
                            case "tc":

                                //...and "Class/Department" is selected, fill "Department" select list
                                if (pcd == 'cl') {

                                    fillDD('getDepartments.php', 'departmentdd', 0, 'department');

                                } else if (pcd == 'pn') {

                                    document.getElementById('department').style.display = 'none';
                                    document.getElementById('class').style.display = 'none';
                                    document.getElementById('person').style.display = 'block';

                                    fillDD('getStaff.php', 'persondd', sel, 'tutorpn');

                                }
                                resetDD("classdd");
                                resetDD("persondd");
                                break;
                            case "hc":
                                $('#classdd').empty();
                                $('#persondd').empty();

                                fillDD('getStaff.php', 'persondd', sel, 'hc');

                                document.getElementById('person').style.display = 'block';
                                document.getElementById('department').style.display = 'none';
                                document.getElementById('class').style.display = 'none';
                                break;
                            default:

                        }

                    });

                    $('#department').change(function(e) {

                        resetDD("persondd");
                        resetDD("classdd");

                        var type = $('#app option:selected').attr('value');

                        var pcd = $('#pcd option:selected').attr('value');

                        var selID = $('#department option:selected').attr('value');

                        switch (type) {

                            case "aa":

                                fillDD('getStaff.php', 'persondd', selID, 'dept');

                                break;

                            case "pf":

                                fillDD('getClasses.php', 'classdd', selID, 'class');

                                break;

                            case "tc":

                                fillDD('getStaff.php', 'persondd', selID, 'tutordept');

                                $.ajax({url: 'getClasses.php',
                                    data: { ID : selID },
                                    method: "GET",
                                    dataType: "json",
                                    contentType: "application/json; charset=utf-8",
                                    success: function(data) {
                                        //alert(data);
                                        $('#classdd').empty();
                                        $('#classdd').append('<option value=\"0\">Please select</option>');

                                        if (data.length == 0) {

                                            resetDD('persondd');

                                        } else {
                                            $.each(data, function (i, item) {
                                                $('#classdd').append('<option value="' + data[i].staff_id + '">' + data[i].crn + ': ' + data[i].title + '</option>');
                                            });
                                        }
                                    },
                                    error: function (xhr, ajaxOptions, thrownError) {
                                        alert(xhr.status + " " + thrownError);
                                    }});
                                break;

                            default:
                        }
                    });

                    $('#classdd').change(function(e) {
                        var sel = $('#class option:selected').attr('value');
                        var dep = $('#department option:selected').attr('value');

                        var type =  $('#app option:selected').attr('value');

                        switch (type) {
                            case "pf":

                                fillDD('getStaff.php', 'persondd', sel, 'classpf');
//                                        //Ajax request
//                                        $.ajax({
//                                            url: 'getStaff.php',
//                                            data: {ID: sel, type: "classpf"},
//                                            method: "GET",
//                                            dataType: "json",
//                                            contentType: "application/json; charset=utf-8",
//                                            success: function (data) {
//                                                $('#persondd').empty();
//                                                $('#persondd').append('<option value=\"0\">Please select</option>');
//                                                $.each(data, function (i, item) {
//                                                    $('#persondd').append('<option value="' + data[i].id + '">' + data[i].fname + ' ' + data[i].lname + '</option>');
//                                                });
//                                            },
//                                            error: function (xhr, ajaxOptions, thrownError) {
//                                                alert(xhr.status + " " + thrownError);
//                                            }
//                                        });
                                break;
                            case "tc":

                                fillDD('getStaff.php', 'persondd', sel, 'tutor');

//                                        $.ajax({
//                                            url: 'getStaff.php',
//                                            data: {ID: sel, type: "tutor"},
//                                            method: "GET",
//                                            dataType: "json",
//                                            contentType: "application/json; charset=utf-8",
//                                            success: function (data) {
//                                                $('#persondd').empty();
//                                                $('#persondd').append('<option value=\"0\">Please select</option>');
//                                                $.each(data, function (i, item) {
//                                                    $('#persondd').append('<option value="' + data[i].id + '">' + data[i].fname + ' ' + data[i].lname + '</option>');
//                                                });
//                                            },
//                                            error: function (xhr, ajaxOptions, thrownError) {
//                                                alert(xhr.status + " " + thrownError);
//                                            }
//                                        });
                                break;
                            default:
                        }
                    });

                    $('#submit').click(function(e) {

                        e.preventDefault();

                        var staffID = $('#persondd option:selected').attr('value');
                        var stuID = 42; //change to real val
                        var title = $('#title').val();

                        $.ajax({
                            url: 'submitApp.php',
                            data: { staffID : staffID, stuID : stuID, title: title },
                            method: "GET",
			    dataType: "json",
                            contentType: "application/json; charset=utf-8",
                            success: function (data) {
                                $('#success').append(data);
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                alert(xhr.status + " " + thrownError);
                            }
                        });
                    });
                });

            </script>
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

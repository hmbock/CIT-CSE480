<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	
		<meta charset="utf-8">
		
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
       
		 
		 
		 <!-- links from new theme-->
		 
		
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <title>Betwixt Booking | Schedule Appointment</title>
		  <!-- Tell the browser to be responsive to screen width -->
		  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		  <!-- Bootstrap 3.3.5 -->
		  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		  <!-- Font Awesome -->
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		  <!-- Ionicons -->
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		  <!-- Theme style -->
		  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
		  <!-- AdminLTE Skins. Choose a skin from the css/skins
			   folder instead of downloading all of them to reduce the load. -->
		  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
		  <!-- iCheck -->
		  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
		  <!-- Morris chart -->
		  <link rel="stylesheet" href="plugins/morris/morris.css">
		  <!-- jvectormap -->
		  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		  <!-- Date Picker -->
		  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
		  <!-- Daterange picker -->
		  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
		  <!-- bootstrap wysihtml5 - text editor -->
		  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

		   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

		  <script src="//code.jquery.com/jquery-1.10.2.js"></script>

		  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

		  <link rel="stylesheet" href="/resources/demos/style.css">
        
        <style>
        
          h2 {
            text-align: center;
            color: black;
            width: 30%;
            background-size: 30%;
          }
          
          table {
            width: 95%;
            border-collapse: collapse;
          }
  
          th, td {
            text-align: left;
            padding: 8px;
          }
  
          tbody:nth-child(even){background-color: #f2f2f2}
        
        </style>

 	</head>
	
	<body class="hold-transition skin-blue sidebar-mini">	
		<div id="wrapper">
       		
    <header class="main-header">
    <!-- Logo -->
    <a href="stuIndex.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>B</b>B</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Betwixt</b>Booking</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- Notifications: style can be found in dropdown.less 
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">1</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 1 notification</li>
              <li>
                <!-- inner menu: contains the actual data 
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> You have 1 Appointment this week!
                    </a>
                  </li>
                 
                 
                </ul>
              </li>
             
            </ul>
          </li>
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/boxed-bg.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['username'];?> </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/boxed-bg.jpg" class="img-circle" alt="User Image">

                <p>
				  <?php echo $_SESSION['username'];?> 
                  <small>Student</small>
                </p>
              </li>
          
            
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="accountSettings.php" class="btn btn-default btn-flat">Manage Account</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
         
		 
        </ul>
      </div>
    </nav>
  </header>
   
  
  <!-- Left nav bar contains the logo  -->
  <aside class="main-sidebar"> 
    <!-- Top of sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/boxed-bg.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
	  
	  
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
      
        <li> <!--Calendar Link-->
          <a href="stuIndex.php">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
           <!-- <small class="label pull-right bg-red">3</small>-->
          </a>
        </li>
        
       
        <li> <!--Schedule Appointment Link -->
          <a href="scheduleApp.php"><i class="fa fa-share"></i> <span>Schedule Appointment</span></a>
        
        </li>
        <li><a href="phonebook.php"><i class="fa fa-book"></i> <span>Contacts</span></a></li>
      
      </ul>
    </section>

    <!-- /.sidebar -->
  </aside>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        New Appointment
        <small>Where do you want to make an appointment?</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Schedule Appointment</li>
      </ol>
    </section>

			
		<!--Main Content-->
				
                <section class="content">
					<div class = "row">
						<div class="col-md-6">					
							<div class="box box-primary">
								<div class="box-header with-border">
									<h3 class="box-title"> Schedule an Appointment:</h3>
								</div>
								<div class="box-body">
						
					<form action="" method="POST" >
                   
                        
                            <div class="dropdown" id="app">
                                <p><b>Where would you like to make an appointment?</b></p>
                                  <select name="sel_type"class="form-control select2">
                                    <option value="0">Please select</option>
                                    <option value="aa">Academic Advising</option>
                                    <option value="pf">Professors</option>
                                    <option value="tc">Tutor Center</option>
                                  </select>
                            </div>
    
							<div class="dropdown" id="pcd" style="display: block">
									<p><b>Would you like to sort by person, class or date?</b></p>
									<select id="pcddd" name="sel_pcd" class="form-control select2">
										<option value="ps">Please select</option>
										<option value="pn">Person</option>
										<option value="cl">Class/Department</option>
									</select>
							</div>
                            
                            <!-- if class is chosen: --->
							<div class="dropdown" id="department" style="display: none">
								<p><b>Select a department</b></p>
								<select title="sel_dep" id="departmentdd" name="sel_dep" class="form-control select2">
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
//                            $('#department').change(function(e) {
//                               resetDD("persondd");
//                                resetDD("classdd");
//                                var type = $('#app option:selected').attr('value');
//                                var pcd = $('#pcd option:selected').attr('value');
//                                var selID = $('#department option:selected').attr('value');
//                                switch (type) {
//                                    case "aa":
//                                        fillDD('getStaff.php', 'persondd', selID, 'dept');
//                                        break;
//                                    case "pf":
//                                        fillDD('getClasses.php', 'classdd', selID, 'class');
//                                         break;
//                                   case "tc":
//                                        fillDD('getStaff.php', 'persondd', selID, 'tutordept');
//                                            $.ajax({url: 'getClasses.php',
//                                                data: { ID : selID },
//                                                method: "GET",
//                                                dataType: "json",
//                                                contentType: "application/json; charset=utf-8",
//                                                success: function(data) {
                                                    //alert(data);
//                                                    $('#classdd').empty();
//                                                   $('#classdd').append('<option value=\"0\">Please select</option>');
//                                                    if (data.length == 0) {
//                                                        resetDD('persondd');
//                                                    } else {
//                                                        $.each(data, function (i, item) {
//                                                            $('#classdd').append('<option value="' + data[i].id + '">' + data[i].crn + ': ' + data[i].title + '</option>');
//                                                        });
//                                                    }
//                                                },
//                                                error: function (xhr, ajaxOptions, thrownError) {
//                                                    alert(xhr.status + " " + thrownError);
//                                                }});
//                                        break;
//                                    default:
//                                }
//                            });
//                            $('#classdd').change(function(e) {
//                               var sel = $('#class option:selected').attr('value');
//                                var dep = $('#department option:selected').attr('value');
//                                var type =  $('#app option:selected').attr('value');
//                                switch (type) {
//                                    case "pf":
//                                        fillDD('getStaff.php', 'persondd', sel, 'classpf');
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
//                                        break;
//                                    case "tc":
//                                        fillDD('getStaff.php', 'persondd', sel, 'tutor');
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
//                                        break;
//                                    default:
//                                }
//                            });
//                            $('#submit').click(function(e) {
//                                var staffID = $('#persondd option:selected').attr('value');
//                                var stuID = '42'; 
//                                var title = $('#title').val();
//                                var description = $('#description').val();
//                                                               
//                               $.ajax({
//                                    url: 'submitApp.php',
//                                    data: { staffID : staffID, stuID : stuID, title: title, description:description },
//                                    method: "GET",
//                                    dataType: "json",
//                                    contentType: "application/json; charset=utf-8",
//                                    success: function () {
//                                        $('#success');
//                                    },
//                                    error: function (xhr, ajaxOptions, thrownError) {
//                                        alert(xhr.status + " " + thrownError);
//                                    }
//                                });
//                            });
                        });
				</script>
                    <div class="dropdown" id="class" style="display: none">
                        <p>Select a class</p>
                        <select title="class" id="classdd" class="form-control select2">
                            <option value="">Please Select</option>
                        </select>
                    </div>
                    <!-- if class is chosen: --->
                    
                    <!-- if PERSON is chosen: --->
                    <div class="dropdown" id="person" style="display: none">
                        <p>Select a person</p>
                        <select name="person" title="persondd" id="persondd" class="form-control select2">
                            <option value="">Please Select</option>
                        </select>
                    </div>
                    
                    
                    <!-- if PERSON is chosen: --->
                    <div class="dropdown" id="date" style="display: none;" >
                        </head>
<body>
<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script language="javascript">
        $(document).ready(function () {
            $("#txtDate").datepicker({
                onSelect: function (selectedDate) {
                var date = $('#txtDate').val();
                var staffID = $('#persondd option:selected').attr('value');
                $( "#radio" ).empty();    

      $.ajax({
      type: "GET",
      url: "getAvailability.php", 
      data: { selectedDate : date, staffID: staffID  },
      dataType: "json",                     
      contentType: "application/json",
      success: function(json) {
      var avTime = json;
       
        $.each(avTime, function () {
        $("#radio").append($("<label>").text(this.time).prepend(
          $("<input>").attr('type', 'radio').val(this.time)
           .prop('checked', this.checked)
        ));
        });
        $("#radio").on('change', '[type=radio]', function () {
         console.log($(this).val());
        });
      }
    });
                }
            });
        });
    </script>
                     

					  <div class="form-group">
							<label><b>Date:</b></label>
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
									</div>
									<input id="txtDate" class="form-control pull-right" name="txtDate" type="text" />
							</div>
							</div>
                        
              
 
              
 <div id="radio"></div>
  


<br>
<br>
Title: <input name="title" id="title" type="text" />
<br>
<br>
                        Description: <input name = "description" id="description" type="text" />
                        
                    </div>
                    
					<br>
					
					<p> Summer, Fall, Winter Registration starts March 1st!</p> 
					 <p>	Walk-ins ONLY First Week of March. </p>
                    <input type="submit" id="submit" class="btn btn-primary btn-lg" />
                    <div id="success" name="success"></div>
			
				
                </form>
				
			</div> <!--end box body-->
			</div> <!-- end box box-success-->
			</div> <!--end col-->
			
	
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
                                //fillDD('getStaff.php', 'persondd', selID, 'tutordept');
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
                                                $('#classdd').append('<option value="' + data[i].staff_id + '" id ="' + data[i].id + '">' + data[i].crn + ': ' + data[i].title + '</option>');
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
                        var class_id = $('#class option:selected').attr('id');
                        switch (type) {
                            case "pf":
                                fillDD('getStaff.php', 'persondd', sel, 'classpf');
                                break;
                            case "tc":
                                fillDD('getStaff.php', 'persondd', class_id, 'tutor');
                                break;
                            default:
                        }
                    });
                    $('#submit').click(function(e) {
                        e.preventDefault();
                        var staffID = $('#persondd option:selected').attr('value');
                        var stuID = <?php echo $_SESSION['id'];?> ; //change to real val
                        var title = $('#title').val();
                        var date = $('#txtDate').val();
                        var description = $('#description').val();
                        var timeSlot = $('input[type="radio"]:checked').val();
                        
                        $.ajax({
                            url: 'submitApp.php',
                            data: { staffID : staffID, stuID : stuID, title: title, date:date, description:description, timeSlot : timeSlot},
                            method: "GET",
			                      dataType: "json",
                            contentType: "application/json; charset=utf-8",
                            success: function (data) {
                                //$('#success').append(data);
                                alert("Your appointment has been scheduled.");
                                
                                window.location.reload();
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                alert(xhr.status + " " + thrownError);
                            }
                        });
                    });
                });
            </script>
			
	</div>
</section>
</div>	  <!-- /.content-wrapper -->
		
			 <footer class="main-footer">
				<div class="pull-right hidden-xs">
				<b>Version</b> 2.3.2
				</div>
				<strong>Copyright &copy; 2016 <a href="#">Betwixt Booking</a>.</strong> All rights
				reserved.
			</footer>
			<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


	
    
	</body>
	
</html>



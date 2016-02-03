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
        
        <?php
                    //require_once("dbconnect.php");

                    $depID = 0;
                    $dep;
                    
                    function getDepartments() {
                        
                                $conn = new mysqli("localhost", "root", "M1ch@3l90", "hmbock");
                                $depArray = array();
                        
                                $depSql = "SELECT Department, Department_ID FROM Department";
                                $depResult = $conn->query($depSql, MYSQL_ASSOC);
                                while ($row = $depResult->fetch_array()) {
                                   $depArray[$row['Department_ID']] = $row['Department'];
                                }
                                
                                $conn->close();
                                
                                return $depArray;
                    }
                    
                    if(isset($_POST['sel_dep']))
                    {
                        $depID = value($_POST['sel_dep']);
                        $dep = $_POST['sel_dep'];
                    }
                    

                      function getClasses() {
                          
                                  $conn = new mysqli("localhost", "root", "M1ch@3l90", "hmbock");
                                  
                                  $classArray = array();
                          
                                  $classSql = "SELECT Class, Class_ID FROM Class WHERE Department_ID=" . $id;
                                  $classResult = $conn->query($classSql);
                                  while ($row = $classResult->fetch_array()) {
                                     $classArray[$row['Class_ID']] = $row['Title'];
                                  }
                                  
                                  $conn->close();
                                  
                                  return $classArray;
                      }
 
        ?>
	</head>
	
	<body>
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
                <form action="" method="POST">
				<div id="content">
					<h2> Schedule an Appointment </h2>
					<p><b><u>To make a New appointment, fill the form below:</u></b></p>
					
						<div class="dropdown" id="app" onchange="this.form.submit();">
                        <h2>Where would you like to make an appointment?</h2>
						  <select name="sel_type"class="dropbtn">
                            <option value="0">Please Choose</option>
                            <option value="aa">Academic Advising</option>
							<option value="pf">Professors</option>
							<option value="tc">Tutor Center</option>
							<option value="hc">Health Center</option>
                          </select>
						</div>
                        
                        
                        <script type="text/javascript">
                           function show_pcd() {
                                
                                //initialize variables
                                var app = document.getElementById("app");
                                var pcdd = document.getElementById("pcdd");
                                
                                if(app.val() === "hc")
                                {
                                    pcdd.data("");
                                }
                           }
                        </script>
					
                    <div class="dropdown" id="pcd">
                        <h2>Would you like to sort by person, class or date?</h2>
                        <select name="sel_pcd" class="dropbtn">
                            <option value="">Please Select</option>
                            <option value="dp">Person</option>
                            <option value="cl">Class</option>
                            <option value="dt">Date</option>
                        </select>
                        </div>
                        
                        <!-- if class is chosen: --->
                    <div class="dropdown" id="department">
                        <h2>Select a department</h2>
                        <select id="sel_dep" name="sel_dep" class="dropbtn" onchange="">
                            <option value="">Please Select</option>
	                       <?php
                                //$depSql = "SELECT Department, Department_ID FROM Department";
                                //$depResult = $conn->query($depSql, MYSQL_ASSOC);
                                //while ($row = $depResult->fetch_array()) {
                                //   echo "<option value='".$row['Department_ID']."'>".$row['Department']."</option>";
                                //}
                                
                                $deps = getDepartments();
                                
                                foreach($deps as $item => $value)
                                {
                                    //echo "<option value='". $item ."'>". $deps[$item] ."</option>";
                                    /*//<option <?php if ($_GET['name'] == 'a') { ?>selected="true" <?php }; ?>value="a">a</option> */
                                    
                                    if ((isset($_POST['sel_dep']) && $_POST['sel_dep'] == $deps[$item])) {
                                        echo '<option type="submit" value="' . $item . '" selected="true">' . $deps[$item] . "</option>";
                                    } else {
                                        echo '<option type="submit" value="'. $item .'">'. $deps[$item] .'</option>';
                                    }
                                }
 
                           ?>
                           
                           <script>
                           
                            
                                $(document).ready(function($) {
                                    var list_target_id = 'department'; //first select list ID
                                    var list_select_id = 'department'; //second select list ID
                                    var loading = '<option value="">Loading...</option>'; //Initial prompt for target select
 
                                    //$('#'+list_target_id).html(initial_target_html); //Give the target select the prompt option
                                 
                                  $('#'+list_select_id).change(function(e) {
                                    //Grab the chosen value on first select list change
                                    var selectvalue = $("select#department option:selected").attr('value');
                                 
                                    //Display 'loading' status in the target select list
                                    $('#'+list_target_id).html('<option value="">Loading...</option>');
                                 
                                    if (selectvalue == "") {
                                        //Display initial prompt in target select if blank value selected
                                       $('#'+list_target_id).html(loading);
                                    } else {
                                      //Make AJAX request, using the selected value as the GET
                                      $.ajax({url: 'getClasses.php'+selectvalue,
                                             success: function(output) {
                                                //alert(output);
                                                $('#'+list_target_id).html(output);
                                            },
                                          error: function (xhr, ajaxOptions, thrownError) {
                                            alert(xhr.status + " "+ thrownError);
                                          }});
                                        }
                                    });
                                });
                            
                           </script>
                        </select>
                    </div>
                        
                    <div class="dropdown" id="class">
                        <h2>Select a class</h2>
                        <select class="dropbtn">
                            <option value="">Please Select</option>
//	                       <?php
//                                /*$selected_ID = $_POST['sel_dep'];
//                                $classSql = "SELECT Title FROM CRN, Class, Class_ID WHERE Class.Department_ID = " . $selected_ID;
//                                $classResult = $conn->query($classSql, MYSQL_ASSOC);
//                                while ($row = $depResult->fetch_array()){
//                                    echo "<option value=\"" . $row['Class_ID'] . "\">" . $row['Class'] . "</option>";
//                                }*/
//                                
//                                $classes = getClasses();
//                                
//                                foreach($classes as $item => $value)
//                                {
//                                    echo "<option value='". $item ."'>". $classes[$item] ."</option>";
//                                }
//                           ?>
                        </select>
                    </div>
                    <!-- if class is chosen: --->
                    
                    <!-- if PERSON is chosen: --->
                    <div class="dropdown" id="person">
                        <h2>Select a person</h2>
                        <select class="dropbtn">
                            <option value="">Please Select</option>
	                       <?php
                                $pSql = "SELECT L_Name, F_Name, staff_id FROM Staff";
                                while ($row = mysql_fetch_array($pSql)){
                                    echo "<option value=\"" . $row['staff_ID'] . "\">" . $row['F_Name'] . " " . $row['L_Name'] . "</option>";
                                }
                           ?>
                        </select>
                    </div>
                    
                    
                    <!-- if PERSON is chosen: --->
                    
                    <!--- if DATE is chosen --->
                    <div class="dropdown" id="month">
                        <h2>Select a date</h2>
                        <select class="dropbtn">
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
                        
                        <input type="number"/>.
                    </div>
                    <!--- if DATE is chosen --->
					</br>
					
					<p> Summer, Fall, Winter Registration starts March 1st!</p> 
					 <p>	Walk-in's ONLY First Week of March. </p>
				</div>
				
                </form>
				
			</main>
			
			
			
			<iframe id='cv_if1' src='http://cdn.instantcal.com/cvir.html?id=cv_nav1&theme=RE&ntype=cv_datepickerm&file=http%3A%2F%2Fwww.instantcal.com%2Ftest.ics&border_radius=5' allowTransparency='true' scrolling='no' frameborder=0 height=250 width=250></iframe>
		</div>
		<footer role = "contentinfo"></footer>
	</body>
	
</html>

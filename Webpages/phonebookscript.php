<?php

$servername = "localhost";
$dbusername = "hmbock";
$dbpassword = "team@480";
$dbname = "hmbock";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
	die("connection failed: " . $conn->connect_error);
}
$dataString = $_GET['dataString'];

$sql = "SELECT F_Name, L_Name FROM Staff WHERE L_Name LIKE '%$dataString%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "<table id='phonebook' >
    <thead>	
    <tr>
        <th> Last Name </th>
        <th> First Name </th>
        <th> Department</th>
        <th> Phone Number </th>
	<th> Email </th>
    </tr>
    </thead>";

//$q = mysqli_real_escape_string($conn,$_POST['dataString']);    
$searchfor = "Adv";	
$sql = "SELECT Distinct Staff.L_Name, Staff.F_Name,Staff.Department_ID,Staff.Phone,Staff.staff_email, Department.Department FROM Staff INNER JOIN Department ON Staff.Department_ID = Department.Department_ID WHERE Staff.L_Name LIKE '%$dataString%' ORDER BY L_Name";

$result = $conn->query($sql);
    
    While ($row= mysqli_fetch_array($result)) {
    echo "<tbody>";
    echo "<tr>";
    echo "<td>" . $row["L_Name"] ."</td>";
    echo "<td>" . $row["F_Name"] ."</td>";
    echo "<td>" . $row["Department"] ."</td>";
    echo "<td>" . $row["Phone"] ."</td>";
    echo "<td>" . $row["staff_email"] ."</td>";
    echo "</tr>";
    echo "</tbody>";	
   
	}
 echo "</table>". "\n";
 }
 
} else {
	echo "0 results";
}



?>






				
</body>
</html>




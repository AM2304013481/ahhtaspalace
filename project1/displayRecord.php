<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "restauranta";
 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
 }

 //escape special characters in a string
 $advisor = mysqli_real_escape_string($conn, $_POST['advisor_name']);
 //create and execute query
 $sql = "SELECT * FROM booking WHERE custName= '$advisor'";
 $result = $conn->query($sql);
 //check if records were returned
 if ($result->num_rows > 0) {
 //create a table to display the record
 echo 'Selected record as the following: <br><br>';
 echo '<p><table cellpadding=10 cellspacing=0 border=1 align="center">';
 echo '<tr><td align="center"><b>Customer Name</b></td>
 <td align="center"><b>Customer Email</b></td>
 <td align="center"><b>Phone Number</b></td>
 <td align="center"><b>Date of Reservation</b></td>
 <td align="center"><b>Time of Reservation</b></td>
 <td align="center"><b>Number of People</b></td></tr>';

 // output data of each row
 while($row = $result->fetch_assoc()) {
 echo '<tr>';
 echo '<td align="center">'.$row["custName"].'</td>';
 echo '<td align="center">'.$row["custEmail"].'</td>';
 echo '<td align="center">'.$row["custNumber"].'</td>';
 echo '<td align="center">'.$row["r_date"].'</td>';
 echo '<td align="center">'.$row["r_time"].'</td>';
 echo '<td align="center">'.$row["num_people"].'</td>';
 echo '</tr>';
 }
 echo '</table></p>';
 }
 else {
 echo '<font color=red>No record found';
 }
 //close connection
 $conn->close();
 echo '<p><a href="adminMenu.php">Back to Main Menu</a></p>';
?>
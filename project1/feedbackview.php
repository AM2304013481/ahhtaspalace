<html>
<head>
 <title>THE AhHTAS PALACE</title>
</head>
<body>
 <h3 align="center">THE AhHTAS PALACE</h3>
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
 //create and execute query
 $sql = "SELECT * FROM feedback";
 $result = $conn->query($sql);
 //check if records were returned
 if ($result->num_rows > 0) {
 //create a table to display the record
 echo '<table cellpadding=10 cellspacing=0 border=1 align="center">';
 echo '<tr><td align="center"><b>Customer Name</b></td>
 <td align="center"><b>Customer Email</b></td>
 <td align="center"><b>Message</b></td></tr>';

 // output data of each row
 while($row = $result->fetch_assoc()) {
 echo '<tr>';
 echo '<td align="center">'.$row["Name"].'</td>';
 echo '<td align="center">'.$row["Email"].'</td>';
 echo '<td align="center">'.$row["Message"].'</td>';
 echo '</tr>';
 }
 }
 else {
 echo "0 results"; //if no record found in the database
 }
 //close connection
 $conn->close();
 echo '<p><a href="adminMenu.php">Back to Main Menu</a></p>';
?>
</body>
</html>
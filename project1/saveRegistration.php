<html>
<head>
<title>Creative Multimedia Competition 2020</title>
</head>
<body>
 <?php

 $date = date("d-m-Y");
 //get input values from form
 extract($_POST);
 ?>
 <p>Date: <b><?php print($date) ?></b></p>
 <h3>THE AhHTAS PALACE REGISTRATION</h3>
 <table>

 <tr><td>Customer Name</td>
    <td>:</td>
    <td><b><?php print($adcustName) ?></b></td>
 </tr>

 <tr><td>Customer Email</td>
    <td>:</td>
    <td><b><?php print($adcustEmail) ?></b></td>
 </tr>

 <tr><td>Phone Number</td>
    <td>:</td>
    <td><b><?php print($adcustNumber) ?></b></td>
 </tr>

 <tr><td>Date of Reservation</td>
    <td>:</td>
    <td><b><?php print($adr_date) ?></b></td>
 </tr>

 <tr><td>Time of Reservation</td>
 <td>:</td>
 <td><b><?php print($r_time) ?></b></td>
 </tr>

 <tr><td>Number of People</td>
 <td>:</td>
 <td><b><?php print($num_people) ?></b></td>
 </tr>

 </table>
 <?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "restauranta";

 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);

 // Check connection
 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error); }
 //create query
 $sql = "INSERT INTO booking (custName, custEmail, custNumber, r_date, r_time, num_people) 
            VALUES ('$custName', '$custEmail', '$custNumber', '$r_date', '$r_time', '$num_people')";

 //execute query
 if($conn->query($sql) === TRUE) {
 echo "New record created successfully";
 }
 else {
 echo "Error: " . $sql . "<br>" . $conn->error;
 }
 //close connection
 $conn->close();
 ?>
 <br>
 <form>
 <input type="button" name="printButton" onClick="window.print()" value="Print">
 </form>
</body>
</html>
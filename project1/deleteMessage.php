<html>
<head>
 <title>Creative Multimedia Competition 2020</title>
</head>
<body>
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
 //get input value
 $adName=$_POST['advisor_name'];
 // sql to delete a record
 $sql = "DELETE FROM feedback WHERE Name='$adName'";
 if ($conn->query($sql) === TRUE) {
 echo "Record deleted successfully";
 }
 else {
 echo "Error deleting record: " . $conn->error;
 }
 //close connection
 $conn->close();

 echo '<p><a href="adminMenu.php">Back to Main Menu</a></p>';
?>

</body>
</html>
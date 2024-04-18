<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Make a Reservation - Your Restaurant Name</title>
  <style>
    /* Add your CSS styles here */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #800000;
      color: #fff;
      padding: 20px;
      text-align: center;
    }
    nav {
      background-color: #EADDCA;
      color: #fff;
      text-align: center;
      padding: 10px 0;
    }
    nav a {
      color: #fff;
      text-decoration: none;
      margin: 0 10px;
    }
    nav a:hover {
      text-decoration: underline;
    }
    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 0 20px;
    }
    form {
      margin-top: 20px;
    }
    input[type="text"], input[type="email"], input[type="tel"], textarea, select {
      width: 100%;
      padding: 10px;
      margin: 5px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #444;
    }
    footer {
      background-color: #800000;
      color: #fff;
      padding: 4px;
      text-align: center;
      position: fixed;
      bottom: 0;
      width: 100%;
    }
  </style>
</head>
<body>

<header>
  <h1><strong><em>THE AhHTAS PALACE</em></strong></h1>
</header>

<nav>
  <a href="home.html" class="active" style="color:#800000;">Home</a> 
  <a href="aboutus.html" class="active" style="color:#800000;">About</a>
  <a href="menu.html" class="active" style="color:#800000;">Menu</a>
  <a href="feedback.php" class="active" style="color:#800000;">Contact</a>
  <a href="login.html" class="active" style="color:#800000;">Restaurant Admin</a>
  <a href="location.html" class="active" style="color:#800000;">Find Us</a>
</nav>

<div class="container">
  <h2>Make a Reservation</h2>
  <form id="reservations" action="reservation.php" method="POST">
    <label for="custName">Name:</label>
    <input type="text" id="custName" name="custName" maxlength="40" required><br>

    <label for="custEmail">Email:</label>
    <input type="text" id="custEmail" name="custEmail" maxlength="30" required><br>

    <label for="custNumber">Phone Number:</label>
    <input type="tel" id="custNumber" name="custNumber" pattern="0[0-9]{9,10}" required>

    <label for="r_date">Date:</label>
    <input type="date" id="r_date" name="r_date" maxlength="30" required><br>

    <label for="r_time">Time:</label>
    <input type="time" id="r_time" name="r_time" required><br>

    <label for="num_people">Number of People:</label>
    <input type="number" id="num_people" name="num_people" required><br>

    <input type="submit" value="Submit Reservation">
  </form>
</div>

<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restauranta";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed " . $conn->connect_error);
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $custName = $_POST['custName'];
    $custEmail = $_POST['custEmail'];
    $custNumber = $_POST['custNumber'];
    $r_date = $_POST['r_date'];
    $r_time = $_POST['r_time'];
    $num_people = $_POST['num_people'];

    // Insert data into database
    $sql = "INSERT INTO booking (custName, custEmail, custNumber, r_date, r_time, num_people) 
            VALUES ('$custName', '$custEmail', '$custNumber', '$r_date' , '$r_time', '$num_people')";

    if ($conn->query($sql) === TRUE) {
        // Display success message in a popup
        echo '<script>alert("Your form has been submitted successfully.");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<footer>
  <p>&copy; 2024 The Ahhtas Palace.</p>
</footer>

</body>
</html>
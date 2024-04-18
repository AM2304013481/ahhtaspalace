<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restauranta";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $Name = mysqli_real_escape_string($conn, $_POST['Name']);
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $Message = mysqli_real_escape_string($conn, $_POST['Message']);

    // Insert data into database
    $sql = "INSERT INTO feedback (Name, Email, Message) 
            VALUES ('$Name', '$Email', '$Message')";

    if ($conn->query($sql) === TRUE) {
        // Display success message
        $success_message = "Your Message has been submitted successfully.";
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - The Ahhtas Palace</title>
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
    footer {
      background-color: #800000;
      color: #fff;
      padding: 4px;
      text-align: center;
      position: fixed;
      bottom: 0;
      width: 100%;
    }
    /* Additional styles for contact section */
    .contact-section {
      margin-top: 20px;
    }
    .contact-info {
      text-align: center;
    }
    .contact-info h3 {
      margin-bottom: 10px;
    }
    .contact-info p {
      margin-bottom: 5px;
    }
    .contact-form {
      margin-top: 20px;
    }
    .contact-form label {
      display: block;
      margin-bottom: 5px;
    }
    .contact-form input[type="text"],
    .contact-form textarea {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    .contact-form input[type="submit"] {
      background-color: #800000;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 4px;
    }
    .contact-form input[type="submit"]:hover {
      background-color: #600000;
    }
    .success-message {
      background-color: #d4edda;
      border: 1px solid #c3e6cb;
      color: #155724;
      margin-top: 10px;
      padding: 15px;
      border-radius: 4px;
    }
    .error-message {
      background-color: #f8d7da;
      border: 1px solid #f5c6cb;
      color: #721c24;
      margin-top: 10px;
      padding: 15px;
      border-radius: 4px;
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
  <a href="reservation.php" class="active" style="color:#800000;">Reservation</a>
  <a href="menu.html" class="active" style="color:#800000;">Menu</a>
  <a href="login.html" class="active" style="color:#800000;">Restaurant Admin</a>
  <a href="location.html" class="active" style="color:#800000;">Find Us</a>
</nav>

<div class="container">
  <h2></h2>
  
  <!-- Contact Information Section -->
  <section class="contact-section">
    <div class="contact-info">
      <h3>REACH US OUT</h3>
      <p>THE AhHTAS PALACE</p>
      <p>Kuala Lumpur, Malaysia</p>
      <p>Email: info@ahhtaspalace.com</p>
      <p>Phone: +60 11 3697 1557</p>
    </div>
  </section>
  
   <!-- Contact Form Section -->
<section class="contact-form">
  <h3>Send us a Message</h3>
  <form class="form" action="feedback.php" method="post">
    <label for="Name">Name:</label>
    <input type="text" id="Name" name="Name" required maxlength="50">
    <label for="Email">Email:</label>
    <input type="email" id="Email" name="Email" required maxlength="50">
    <label for="Message">Message:</label>
    <textarea id="Message" name="Message" rows="4" required maxlength="500"></textarea>
    <input type="submit" value="Send">
  </form>
</section>

<?php
if (!empty($success_message)) {
    echo '<div class="success-message">' . $success_message . '</div>';
    // Add JavaScript to hide the success message after 5 seconds
    echo '<script>
            setTimeout(function() {
                document.querySelector(".success-message").style.display = "none";
            }, 3000); // 3000 milliseconds = 3 seconds
          </script>';
      }

// Display error message if set
if (isset($error_message)) {
    echo '<div class="error-message">' . $error_message . '</div>';
}
?>

</div>


<footer>
  <p>&copy; 2024 The Ahhtas Palace.</p>
</footer>

</body>
</html>
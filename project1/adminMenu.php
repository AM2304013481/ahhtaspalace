<html>
<head>
 <title>Main Menu for Admin</title>
</head>
<body>
 <p>Main Menu for Admin</p>
 <form action="reservationList.php" method="post">

 <p><input type="submit" value="View Record" name="cmdView"></p>
 </form>

 <form action="searchRecord.php" method="post">
 <p><input type="submit" value="Search Record" name="cmdSearch"></p>
 </form>
 
 <form action="deleteList.php" method="post">
 <p><input type="submit" value="Delete Record" name="cmdDelete"></p>
 </form>

 <form action="feedbackview.php" method="post">
 <p><input type="submit" value="Customer Message" name="cmdView"></p>
 </form>

 <form action="deleteMessageList.php" method="post">
 <p><input type="submit" value="Delete Message" name="cmdDelete"></p>
 </form>

 <form action="logout.php" method="post">
 <p><input type="submit" value="Log Out" name="cmdlogout"></p>
 </form>
</body>
</html>
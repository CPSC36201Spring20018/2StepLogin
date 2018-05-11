<?php
/* Displays all error messages */
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html><?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome <?= $first_name.' '.$last_name ?></title>
  <?php include 'css/css.html'; ?>
</head>

<body>
  <div class="form">

          <h1>You have opted out of the 2Step Authentication service!</h1>
          
          <h2><?php echo $first_name.' '.$last_name; ?></h2>
          <p><?= $email ?></p>

		  
		   <?php
          
		  
		
			// Set the user status to 2Step (2Step = 1)
			$mysqli->query("UPDATE users SET 2Step='0' WHERE email='$email'") or die($mysqli->error);
			$_SESSION['2Step'] = 0;
  
		  
          
          ?>
          <a href="profile.php"><button class="button button-block"/>Home</button></a>
          <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>
		  

    </div>
     
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>

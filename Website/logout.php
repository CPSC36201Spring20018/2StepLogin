<?php
require 'db.php';
/* Log out process, unsets and destroys session variables */
session_start();
if($_SESSION['2Step'] == 1){
  $email = $_SESSION['email'];
	$mysqli->query("UPDATE users SET active='0' WHERE email='$email'") or die($mysqli->error);
}
if($_SESSION['2Step'] == 0){
	$email = $_SESSION['email'];
	$mysqli->query("UPDATE users SET active='1' WHERE email='$email'") or die($mysqli->error);
}
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Error</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    <div class="form">
          <h1>Thanks for stopping by</h1>
              
          <p><?= 'You have been logged out!'; ?></p>
          
          <a href="index.php"><button class="button button-block"/>Home</button></a>

    </div>
</body>
</html>

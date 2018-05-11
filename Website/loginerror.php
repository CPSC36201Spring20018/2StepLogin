<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Please Confirm Email</title>
  <?php include 'css/css.html'; ?>
</head>
<body>
<div class="form">
    <h1>Please Confirm Email Before Logging In</h1>
    <p>
    <?php 
    echo
    '<div class="info">
    Unable to Login.
    Account is unverified, please confirm your email by clicking
    on the email link! 
    </div>'; 
    ?>
    </p>     
    <a href="index.php"><button class="button button-block"/>Home</button></a>
    <a href="resend.php"><button class="button button-block"/>Resend Email</button></a>
</div>
</body>
</html>

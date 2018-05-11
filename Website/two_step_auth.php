<?php

/* Displays all error messages */
require 'db.php';
session_start();
$email = $_SESSION['email'];
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$hash = $_SESSION['hash']
?>
<!DOCTYPE html>
<html>
<head>
  <title>Authentification Required</title>
  <?php include 'css/css.html'; ?>
</head>
<body>
<div class="form">
    <h1>Please Authorize Login</h1>
    <p>
    <?php 
    echo
    '<div class="info">
    Before you can log in,
    please confirm your identity by clicking
    on the link sent to your email!
    </div>'; 
	    // Send authentication confirmation link
        $to      = $email;
        $subject = 'Account Verification ( website@ggvarela.com )';
        $message_body = '
        Hello '.$first_name.',

        Please click this link to authorize your login:

        http://lab.ggvarela.com:3625/verify.1.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );
    ?>
    </p>     
    <a href="index.php"><button class="button button-block"/>Home</button></a>
    <a href="resend.php"><button class="button button-block"/>Resend Email</button></a>
</div>
</body>
</html>

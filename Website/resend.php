<?php
require 'db.php';
session_start();
      
        $email = $_SESSION['email'];
		$first_name = $_SESSION['first_name'];
		$last_name = $_SESSION['last_name'];
		$hash = $_SESSION['hash'];

        $_SESSION['message'] = "<p>Please check your email <span>$email</span>"
        . " for a confirmation link to complete your account activation!</p>";

        // Send registration confirmation link (reset.php)
        $to      = $email;
        $subject = 'Account Verification ( website@ggvarela.com )';
        $message_body = '
        Hello '.$first_name.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://lab.ggvarela.com:3625/verify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );

        header("location: success.php"); 
  

?>


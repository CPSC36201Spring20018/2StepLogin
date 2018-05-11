<?php
/* Password reset process, updates database with new user password */
require 'db.php';
session_start();

// Make sure the form is being submitted with method="post"
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    // Make sure the two passwords match
    if ( $_POST['newemail'] == $_POST['confirmemail'] ) { 

        $newemail = $mysqli->escape_string($_POST['newemail']);
        
        // We get $_POST['email'] and $_POST['hash'] from the hidden input field of reset.php form
        $email = $mysqli->escape_string($_POST['email']);
        //$hash = $mysqli->escape_string($_POST['hash']);
        
        $sql = "UPDATE users SET email='$newemail' WHERE email='$email'";

        if ( $mysqli->query($sql) ) {

        $_SESSION['message'] = "Your email has been changed successfully!";
        header("location: success.php");    

        }

    }
    else {
        $_SESSION['message'] = "Your emails do not match, try again!";
        header("location: error.php");    
    }

}
?>
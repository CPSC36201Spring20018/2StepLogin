<?php
/* Email change process, updates database with new user email */
require 'db.php';
session_start();

// Make sure the form is being submitted with method="post"
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    // Make sure the two emails match
    if ( $_POST['newemail'] == $_POST['confirmemail'] ) { 

        $new_email = ($_POST['newemail']);
		$password = ($_POST['password']);
        
        // We get $_POST['email'] and $_POST['hash'] from the hidden input field of change_email.php form
        $email = $mysqli->escape_string($_POST['email']);
        $hash = $mysqli->escape_string($_POST['hash']);
        
        $sql = "UPDATE users SET email='$new_email' WHERE password='$password'";
      
		if ( $mysqli->query($sql) ) {

        $_SESSION['message'] = "Your email has been changed successfully!";
        header("location: success.php");    

        }

    }
    else {
        $_SESSION['message'] = "Two email addresses you have entered don't match, try again!";
        header("location: error.php");    
    }

}
?>
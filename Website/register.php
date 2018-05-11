<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */
// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];

// Escape all $_POST variables to protect against SQL injections
$first_name = $mysqli->escape_string($_POST['firstname']);
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$password1 = $mysqli->escape_string($_POST['password']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );

if($_POST['password'] === $_POST['confirmpassword']){

// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    
}
// This checks to see if the user entered password is between 4-15 ASCII characters long. Edited by MC
if (!preg_match("/^[ -~]{4,15}$/",$password1)) { 
    $_SESSION['message'] = 'Password does not meet requirement. Please enter a password between 4-15 ASCII characters';
    header("location: error.php");
}
if ( $_POST['password'] != $_POST['confirmpassword'] ) { 
	$_SESSION['message'] = "Passwords do not match, try again!";
    header("location: error.php");
}
      
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO users (first_name, last_name, email, password, hash) " 
            . "VALUES ('$first_name','$last_name','$email','$password', '$hash')";

    // Add user to the database
    if ( $mysqli->query($sql) ){ 

        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification ( website@ggvarela.com )';
        $message_body = '
        Hello '.$first_name.',                                                      

        Thank you for signing up!

        Please click this link to activate your account:

        http://lab.ggvarela.com:3625/verify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );

        header("location: success2.php"); 

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }

}
}
else{
    $_SESSION['message'] = 'Passwords do not match!';
    header("location: error.php");
}

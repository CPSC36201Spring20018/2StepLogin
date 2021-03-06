<?php
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

          <h1>Welcome</h1>
          
          <h2><?php echo $first_name.' '.$last_name; ?></h2>
          <p><?= $email ?></p>
          
      <a href="change_email.php"><button class="button button-block" name="change email"/>Change Email</button></a>
		  <a href="change_password.php"><button class="button button-block" name="change password"/>Change Password</button></a>
		  <a href="Opt_In.php"><button class="button button-block" name="home"/>Opt In of 2-step Verification</button></a>
      <a href="Opt_Out.php"><button class="button button-block" name="home"/>Opt Out of 2-step Verification</button></a>
		  <a href="delete.php"><button class="button button-block" name="delete account"/> Delete Accout</button></a>
      <a href="profile.php"><button class="button button-block" name="home"/>Home Page</button></a>
		  <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

    </div>
    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>

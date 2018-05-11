<?php
/* The password reset form, the link to this page is included
   from the forgot.php email message
*/
require 'db.php';
session_start();

$email = $_SESSION['email'];

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Change Your Email</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    <div class="form">

          <h1>Choose Your New Email Address</h1>
          
          <form action="change_email_update.php" method="post">
              
          <div class="field-wrap">
            <label>
              New Email<span class="req">*</span>
            </label>
            <input type="email"required name="newemail" autocomplete="off"/>
          </div>
              
          <div class="field-wrap">
            <label>
              Confirm New Email<span class="req">*</span>
            </label>
            <input type="email"required name="confirmemail" autocomplete="off"/>
          </div>
		  
		  <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required name="password" autocomplete="off"/>
          </div>
          
          <!-- This input field is needed, to get the email of the user -->
          <input type="hidden" name="email" value="<?= $email ?>">    
          <!--input type="hidden" name="hash" value="<?= $hash ?>"-->    
              
          <button class="button button-block"/>Apply</button>
          
          </form>

    </div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>

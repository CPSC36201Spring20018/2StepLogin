<?php
session_start();

require 'db.php';
if ($_SESSION['logged_in']!=1){
    $_SESSION['message'] = "You must log in before deleting your account!";
    header("location: error.php");
}
else{
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $mysqli->query("DELETE FROM users WHERE email='$email'");
    header("location: deletepage.php");
}
?>


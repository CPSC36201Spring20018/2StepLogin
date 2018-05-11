<?php
/* Database connection settings */

$host = 'localhost';
$user = 'root';
$pass = 'CPSC362password';
$db = 'accounts';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

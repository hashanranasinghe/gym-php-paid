<?php

session_start();




$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die(mysqli_error('Failed to connect!'));

$db_select = mysqli_select_db($conn, $dbname) or die(mysqli_error('Failed to select connect!'));





?>
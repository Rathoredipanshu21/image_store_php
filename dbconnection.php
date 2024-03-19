<?php
$hostname = "localhost";  
$username = "root";       
$password = "";          
$database = "crud";       
$con = mysqli_connect($hostname, $username, $password, $database);

if (!$con) {
    die("Connection error: " . mysqli_connect_error());
}

?>

<?php
$hostname = 'localhost';
$username = 'root';
$password = ''; 
$databasename = 'std_information_system';

$mysqli = mysqli_connect($hostname, $username, $password, $databasename);

if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
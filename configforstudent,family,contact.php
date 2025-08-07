
<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$databasename = 'student_info';

$mysqli = mysqli_connect($hostname, $username, $password, $databasename);

if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
    echo "connected successfully";
}
?>

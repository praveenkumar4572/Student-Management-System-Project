<?php
include("config.php");
$username1 = $_POST['urname'];
$password1 = $_POST['urpassword'];
if(isset($_POST['login'])) {
    $result = mysqli_query($mysqli, "INSERT INTO login VALUES('','$username1','$password1')");
    if(!$result) {
        echo "Registration failed";
    } 
}
?>
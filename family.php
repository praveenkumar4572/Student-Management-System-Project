<?php
session_start();
include("config.php");

if(isset($_POST['submit'])) {
    $_SESSION['family'] = [
        'fathername' => ($_POST['fathername']),
        'fatheroccupation' => ($_POST['fatheroccupation']),
        'mothername' => ($_POST['mothername']),
        'motheroccupation' => ($_POST['motheroccupation']),
        'familyincome' => ($_POST['familyincome']),
        'parentno' => ($_POST['parentno'])
    ];
    
    header("Location: cont.php");
    exit();
}
?>


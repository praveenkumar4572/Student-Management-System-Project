<?php
include 'config.php';
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM login WHERE id='$id'"; 
    $result = mysqli_query($mysqli, $sql);
    if($result){
        header('location:facultyreport.php');
    } else {
        echo "Error deleting record: " . mysqli_error($mysqli);
    }
}
?>
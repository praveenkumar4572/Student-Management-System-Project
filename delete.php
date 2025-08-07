<?php
include 'config.php';
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM overall_table WHERE student_reg_no='$id'"; 
    $result = mysqli_query($mysqli, $sql);
    if($result){
        header('location:staff.php');
    } else {
        echo "Error deleting record: " . mysqli_error($mysqli);
    }
}
?>
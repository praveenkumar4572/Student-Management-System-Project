<?php
include('config.php');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reg_no = $_POST['student_reg_no'];
    $name = $_POST['name'];
    $salutation = $_POST['salutation'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $community = $_POST['community'];
    $nationality = $_POST['nationality'];
    $blood_group = $_POST['blood_group'];
    $religion = $_POST['religion'];
    $caste = $_POST['caste'];
    $mobile_no = $_POST['mobile_no'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $father_name = $_POST['father_name'];
    $father_occupation = $_POST['father_occupation'];
    $mother_name = $_POST['mother_name'];
    $mother_occupation = $_POST['mother_occupation'];
    $parent_number = $_POST['parent_number'];
    $family_income = $_POST['family_income'];
    $roll_no = $_POST['roll_no'];
    $college_name = $_POST['college_name'];
    $year_of_study = $_POST['year_of_study'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "UPDATE overall_table SET 
              Name='$name', 
              Salutaion='$salutation', 
              gender='$gender', 
              dob='$dob', 
              community='$community', 
              nationality='$nationality', 
              blood_group='$blood_group', 
              religion='$religion', 
              caste='$caste', 
              mobile_no='$mobile_no', 
              email='$email', 
              address='$address', 
              pincode='$pincode', 
              father_name='$father_name', 
              father_occupation='$father_occupation', 
              mother_name='$mother_name', 
              mother_occupation='$mother_occupation', 
              parent_number='$parent_number', 
              family_income='$family_income', 
              roll_no='$roll_no', 
              college_name='$college_name', 
              year_of_study='$year_of_study', 
              username='$username', 
              password='$password'
              WHERE student_reg_no='$reg_no'";
    
    if(mysqli_query($mysqli, $query)) {
        header("Location: staff.php?success=1&regno=".$reg_no);
        exit();
    } else {
        die("Update failed: " . mysqli_error($mysqli));
    }
} else {
    die("Invalid request method");
}
?>
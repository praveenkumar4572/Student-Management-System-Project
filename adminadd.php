<?php
include("config.php");
$uploadDir = "C:/xampp/htdocs/php/facultyimg/";
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}
$imagePath = ""; 
if(isset($_FILES['facimg']) && $_FILES['facimg']['error'] == 0) {
    $fileExtension = pathinfo($_FILES["facimg"]["name"], PATHINFO_EXTENSION);  
    $newFilename = uniqid() . '.' . strtolower($fileExtension);
    $targetFile = $uploadDir . $newFilename;
    $check = getimagesize($_FILES["facimg"]["tmp_name"]);
    if($check !== false) {
        if ($_FILES["facimg"]["size"] <= 800 * 1024) {
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            if (in_array(strtolower($fileExtension), $allowedExtensions)) {
                if (move_uploaded_file($_FILES["facimg"]["tmp_name"], $targetFile)) {
                    $imagePath = "php/facultyimg/" . $newFilename; 
                } else {
                    die("Sorry, there was an error uploading your file.");
                }
            } else {
                die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            }
        } else {
            die("Sorry, your file is too large. Maximum size is 800KB.");
        }
    } else {
        die("File is not an image.");
    }
} else {
    die("Please select a valid image file.");
}
if(isset($_POST['submit'])) {
   
    $user = mysqli_real_escape_string($mysqli, substr($_POST['user'], 0, 8));
    $pass = mysqli_real_escape_string($mysqli, substr($_POST['pass'], 0, 8));
    $name = mysqli_real_escape_string($mysqli, substr($_POST['name'], 0, 30));
    $salutation = mysqli_real_escape_string($mysqli, substr($_POST['salutation'], 0, 4));
    $profession = mysqli_real_escape_string($mysqli, substr($_POST['profession'], 0, 20));
    $mobile = mysqli_real_escape_string($mysqli, $_POST['mobile']);
    $dept = mysqli_real_escape_string($mysqli, $_POST['Dept']);
    $result = mysqli_query($mysqli, "INSERT INTO login (user, pass, name, profession, salutation, mobile, facimg,dept) 
                                   VALUES('$user', '$pass', '$name', '$profession', '$salutation', '$mobile', '$imagePath','$dept')");  
    if($result) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($mysqli);
    } 
}
?>
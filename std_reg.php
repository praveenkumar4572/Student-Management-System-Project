<?php
session_start();
include("config.php");
if(isset($_POST['submit'])) {
    $uploadDir = "C:/xampp/htdocs/php/studentimg/";
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $imagePath = "";
    if(isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $fileExtension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
        $newFilename = uniqid() . '.' . $fileExtension;
        $targetFile = $uploadDir . $newFilename;
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if($check !== false) {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {
                $imagePath = "php/studentimg/" . $newFilename;
            } else {
                die("Sorry, there was an error uploading your file.");
            }
        } else {
            die("File is not an image.");
        }
    }
    $_SESSION['personal'] = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'name' => $_POST['name'],
        'salutation' => $_POST['salutation'],
        'gender' => $_POST['gender'],
        'dob' => $_POST['dob'],
        'community' => $_POST['community'],
        'nationality' => $_POST['nationality'],
        'bg' => $_POST['bgg'],
        'religion' => $_POST['religion'],
        'caste' => $_POST['cast'],
        'img_path' => $imagePath
    ];
    
    header("Location: fam.php");
    exit();
}
?>
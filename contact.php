<?php
session_start();
include("config.php");

if(isset($_POST['submit'])) {
    // Sanitize and validate email
    $email = trim($_POST['email']);
    $check_query = "SELECT email FROM overall_table WHERE email = ?";
    $stmt = $mysqli->prepare($check_query);
    
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $_SESSION['error'] = "This email address is already registered. Please use a different email.";
            echo "<script>alert('Email already exists'); window.location.href='cont.php';</script>";
            exit();
        } else {
            // Email is unique, proceed with storing data
            $_SESSION['contact'] = [
                'mobileno' => $_POST['mobileno'],
                'email' => $email,
                'pincode' => $_POST['pincode'],
                'address' => $_POST['address']
            ];
            
            header("Location: acedamic.php");
            exit();
        }
        
        $stmt->close();
    } else {
        // Database error
        $_SESSION['error'] = "Database error. Please try again later.";
        echo "<script>alert('Database error occurred'); window.location.href='cont.php';</script>";
        exit();
    }
}
?>
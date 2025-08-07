<?php
session_start();
$user = '';
include("config.php");

// Include PHPMailer files
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $_SESSION['academic'] = [
        'studentregno' => $_POST['studentregno'],
        'rollno' => $_POST['rollno'],
        'year' => $_POST['year'],
        'clgname' => $_POST['clgname']
    ];
}

if (isset($_POST['submit'])) {
    // Check for duplicate register number
    $regno_check = $mysqli->prepare("SELECT student_reg_no FROM overall_table WHERE student_reg_no = ?");
    $regno_check->bind_param("s", $_SESSION['academic']['studentregno']);
    $regno_check->execute();
    $regno_check->store_result();
    
    // Check for duplicate roll number
    $rollno_check = $mysqli->prepare("SELECT roll_no FROM overall_table WHERE roll_no = ?");
    $rollno_check->bind_param("s", $_SESSION['academic']['rollno']);
    $rollno_check->execute();
    $rollno_check->store_result();
    
    if ($regno_check->num_rows > 0) {
        echo "<script>
            alert('This Register Number already exists!');
            window.location.href = 'acedamic.php';
        </script>";
        exit();
    } elseif ($rollno_check->num_rows > 0) {
        echo "<script>
            alert('This Roll Number already exists!');
            window.location.href = 'acedamic.php';
        </script>";
        exit();
    } else {
        $imagePath = isset($_SESSION['personal']['img_path']) ? $_SESSION['personal']['img_path'] : '';
        $query = "INSERT INTO overall_table VALUES (
            NULL,
            '".$_SESSION['personal']['name']."',
            '".$_SESSION['personal']['salutation']."',
            '".$_SESSION['personal']['gender']."',
            '".$_SESSION['personal']['dob']."',
            '".$_SESSION['personal']['community']."',
            '".$_SESSION['personal']['nationality']."',
            '".$_SESSION['personal']['bg']."',
            '".$_SESSION['personal']['religion']."',
            '".$_SESSION['personal']['caste']."',
            '".$imagePath."',
            '".$_SESSION['family']['fathername']."',
            '".$_SESSION['family']['fatheroccupation']."',
            '".$_SESSION['family']['mothername']."',
            '".$_SESSION['family']['motheroccupation']."',
            '".$_SESSION['family']['familyincome']."',
            '".$_SESSION['family']['parentno']."',
            '".$_SESSION['contact']['mobileno']."',
            '".$_SESSION['contact']['pincode']."',
            '".$_SESSION['contact']['email']."',
            '".$_SESSION['academic']['studentregno']."',
            '".$_SESSION['academic']['rollno']."',
            '".$_SESSION['academic']['clgname']."',
            '".$_SESSION['academic']['year']."',
            '".$_SESSION['personal']['username']."',
            '".$_SESSION['personal']['password']."',
            '".$_SESSION['contact']['address']."'
        )";
        
        if ($mysqli->query($query)) {
            // Send email with credentials
            $mail = new PHPMailer(true);
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'praveenkumarr9566@gmail.com';
                $mail->Password   = 'xrha ecni zphg vjcl';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;
                
                // Recipients
                $mail->setFrom('your_email@gmail.com', 'GCE,Thanjavur');
                $mail->addAddress($_SESSION['contact']['email']);
                
                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Your Registration Details';
                $mail->Body    = "
                    <h2>Registration Successful!</h2>
                    <p>Dear ".$_SESSION['personal']['name'].",</p>
                    <p>Your registration has been successfully completed. Here are your login credentials:</p>
                    <p><strong>Username:</strong> ".$_SESSION['personal']['username']."</p>
                    <p><strong>Password:</strong> ".$_SESSION['personal']['password']."</p>
                    <p>Please keep this information secure and do not share it with others.</p>
                    <p>Thank you for registering with us!</p>
                ";
                $mail->AltBody = "Registration Successful!\n\nDear ".$_SESSION['personal']['name'].",\n\nYour registration has been successfully completed.\n\nUsername: ".$_SESSION['personal']['username']."\nPassword: ".$_SESSION['personal']['password']."\n\nPlease keep this information secure.";
                
                $mail->send();
                
                echo "<script>
                    alert('Registration successful! Login details have been sent to your email.');
                    window.location.href = 'generate_pdf.php';
                </script>";
                exit();
                
            } catch (Exception $e) {
                echo "<script>
                    alert('Registration successful but email could not be sent. Error: {$mail->ErrorInfo}');
                    window.location.href = 'generate_pdf.php';
                </script>";
                exit();
            }
        } else {
            echo "Error: " . $mysqli->error;
        }
    }
    
    $regno_check->close();
    $rollno_check->close();
}
?>
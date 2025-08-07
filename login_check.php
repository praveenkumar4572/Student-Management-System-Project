<?php
session_start();
include('config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['per'] = ['username' => $username];
    $login_query = mysqli_query($mysqli, "SELECT * FROM login WHERE user='$username' AND pass='$password'");
    $admin_query = mysqli_query($mysqli, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    $student_query = mysqli_query($mysqli, "SELECT * FROM overall_table WHERE username='$username' AND password='$password'");
    if ($login_query && mysqli_num_rows($login_query) > 0) {
        echo "<script>
            alert('Faculty login successful!');
            window.location.href = 'staff.php';
        </script>";
        exit();
    }
    elseif ($student_query && mysqli_num_rows($student_query) > 0) {
        echo "<script>
            alert('Student login successful!');
            window.location.href = 'report.html';
        </script>";
        exit();
    }
    elseif ($admin_query && mysqli_num_rows($admin_query) > 0) {
        echo "<script>
            alert('Admin login successful!');
            window.location.href = 'admin.php';
        </script>";
        exit();
    }
    else {
        echo "<script>
            alert('Unauthorized access! Invalid username or password.');
            window.location.href = 'login.php';
        </script>";
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>
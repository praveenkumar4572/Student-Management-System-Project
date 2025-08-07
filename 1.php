<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "std_information_system");
if (!isset($_SESSION['per']) || !isset($_SESSION['per']['username'])) {
    header("Location: login.php");
    exit();
}
$use = $_SESSION['per']['username'];
$query = mysqli_query($db,"SELECT * FROM overall_table WHERE username='$use'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .one {
            text-align: center;
            font-size: 50px;
            height: 125px;
            padding-top: 60px;
            background-color: bisque;
            width: 100%;
            margin-bottom: 30px;
        }
        .logout {
            float: right;
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
            background-color: #f44336;
            width: 100px;
            margin-right: 20px;
            margin-top: 20px;
        }
        .back-btn {
            display: block;
            width: 100px;
            margin: 20px auto;
            padding: 10px;
            background-color: bisque;
            color: black;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.2s;
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-top: 30px;
        }
        .tab {
            border-collapse: collapse;
            width: 90%;
            margin: 30px auto;
            box-shadow: 0px 0px 5px 5px #666362;
            border-radius: 10px;
            overflow: hidden;
        }
        .tab th, .tab td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            background-color: white;
        }
        .tab th {
            background-color: bisque;
            font-weight: bold;
        }
        .image-cell img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .tab tr:hover td {
            background-color: #f5f5f5;
        }
        .gen{
            background-color:bisque;
            border-radius:10px;
            width:100%;
            height:60px;
            padding:1%;
        }
    </style>
</head>
<body>
    <h1 class="gen">General Information</h1>
    
    <a href="report.html" class="back-btn">Back</a>
    
    <table class="tab">
        <tr>
            <th>Reg No</th>
            <th>Salutation</th>
            <th>Name</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Community</th>
            <th>Nationality</th>
            <th>Blood Group</th>
            <th>Religion</th>
            <th>Caste</th>
            <th>Image</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($query)): ?>
        <tr>
            <td><?= ($row['student_reg_no']) ?></td>
            <td><?= ($row['Salutaion']) ?></td>
            <td><?= ($row['Name']) ?></td>
            <td><?= ($row['gender']) ?></td>
            <td><?= ($row['dob']) ?></td>
            <td><?= ($row['community']) ?></td>
            <td><?= ($row['nationality']) ?></td>
            <td><?= ($row['blood_group']) ?></td>
            <td><?= ($row['religion']) ?></td>
            <td><?= ($row['caste']) ?></td>
            <td class="image-cell">
                <?php 
                // Check if img_path contains data (file path)
                if(!empty($row['img_path'])): 
                    // Construct the correct image path
                    $imagePath = '/php/studentimg/' . basename($row['img_path']);
                ?>
                    <img src="<?= ($imagePath) ?>" alt="Student Image" 
                         onerror="this.src='default-profile.png'">
                <?php else: ?>
                    <img src="default-profile.png" alt="No Image">
                <?php endif; ?>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
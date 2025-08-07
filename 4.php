<?php
session_start();
if (!isset($_SESSION['per']) || !isset($_SESSION['per']['username'])) {
    header("Location: login.php");
    exit();
}
$use = $_SESSION['per']['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Information</title>
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
        .back-btn:hover {
            transform: scale(1.05);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-top: 30px;
        }
        .gen {
            background-color: bisque;
            border-radius: 10px;
            width: 100%;
            height: 60px;
            padding: 1%;
            margin-bottom: 20px;
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
    <h1 class="gen">Academic Information</h1>
    <a href="report.html" class="back-btn">Back</a>
    
    <table class="tab">
        <tr>
            <th>Student Register No</th>
            <th>Roll No</th>
            <th>Year Of Studying</th>
            <th>College Name</th>
        </tr>
        <tbody>
            <?php 
                $db = mysqli_connect("localhost", "root", "", "std_information_system");
                $query = mysqli_query($db, "SELECT * FROM overall_table WHERE username='$use'");
                while($row = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>".$row['student_reg_no']."</td>";
                    echo "<td>".$row['roll_no']."</td>";
                    echo "<td>".$row['year_of_study']."</td>";
                    echo "<td>".$row['college_name']."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
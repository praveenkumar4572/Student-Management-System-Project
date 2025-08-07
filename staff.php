    <!DOCTYPE html>
<head>
    <title>Student Report</title>
    <style>
        body {
            background-color: #f5f7fa;
            margin: 0;
            padding: 20px;
        }
        .total {
            display: flex;
            flex-direction: column;
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            border-radius: 8px;
            
            padding: 20px;
        }
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .page-title {
            text-align: center;
            font-size: 28px;
            color: #2c3e50;
            margin: 0;
        }
        .logout {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            border:solid;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
            background-color:orange;
            width: 100px;
        }
        .back-btn {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            border:solid;
            color: white;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            background-color: orange;
            width: 100px;
            margin-right: 10px;
        }
        .search-container {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }
        .search-box {
            display: flex;
            padding: 4px;
            border-radius: 30px;
            width: 70%;
        }
        .search-input {
            padding: 12px 20px;
            font-size: 16px;
            border: solid;
            border-radius: 10px;
            outline: none;
        }
        .search-button {
            padding: 12px 25px;
            border-radius: 10px;
            background-color:orange;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }
        .add-btn {
            padding: 12px 25px;
            background-color: orange;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            border:solid;
            font-size: 16px;
            font-weight: bold;
            border: solid;
        }
        .table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
            background-color: white;
        }
        .table th, .table td {
            border: 1px solid #e0e0e0;
            padding: 12px;
            text-align: center;
            border:solid;
        }
        .table th {
            background-color: #f8f9fa;
            color: #2c3e50;
            font-weight: 600;
        }
        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .student-img {
            width: 80px;
            height: 80px;
            border-radius: 5px;
            object-fit: cover;
            border: 2px solid;
        }
        .action-btn {
            display: flex;
    justify-content: center;
    gap: 8px; 
    flex-wrap: wrap; 
    padding: 8px 12px;
    margin: 2px;
    border: solid;
    border-radius: 4px;
    color: white;
    cursor: pointer;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    white-space: nowrap; 
}
        .edit-btn {
            background-color: orange;
            border:solid;
        }
        .delete-btn {
            background-color: orange;
            border:solid;
        }
    </style>
</head>
<body>
    <div class="total">
        <div class="header-container">
            <h1 class="page-title">Student Report</h1>
            <div>
               
                <button onclick="window.location.href='admin.php'" class="back-btn">Back</button>
                <button onclick="window.location.href='login.php'" class="logout">Logout</button>
            </div>
        </div>
        
        
        <div class="search-container">
            <form method="GET" action="staff.php" class="search-box">
                <input type="number" name="search" class="search-input" 
                       value="<?php if(isset($_GET['search'])) { echo $_GET['search']; } ?>" 
                       placeholder="Enter register number">
                <button type="submit" class="search-button">Search</button>
                <a href="Registation_form.php" class="add-btn">Add New Student</a>
            </form>
        </div>
        <table class="table">
            <tr>
                <th>IMAGE</th>
                <th>REGISTER NO</th>
                <th>ROLL NO</th>
                <th>NAME</th>
                <th>GENDER</th>
                <th>YEAR</th>
                <th>BLOOD GROUP</th>
                <th>USERNAME</th>
                <th>PASSWORD</th>
                <th>OPERATIONS</th>
            </tr>
            <tbody>
                <?php 
                    $db = mysqli_connect("localhost","root","","std_information_system");
                    if(isset($_GET['search']) ){
                        $filtervalues = $_GET['search'];
                        $query = "SELECT * FROM overall_table WHERE student_reg_no LIKE '%$filtervalues%'";
                        $query_run = mysqli_query($db, $query);
                        if(mysqli_num_rows($query_run) > 0){
                            while($row = mysqli_fetch_assoc($query_run)){
                                echo "<tr>";
                                if(!empty($row['img_path'])) {
                                    $imagePath = '/php/studentimg/' . basename($row['img_path']);
                                    echo '<td><img src="'.$imagePath.'" class="student-img" alt="Student Image" onerror="this.src=\'default-profile.png\'"></td>';
                                } else {
                                    echo '<td><img src="default-profile.png" class="student-img" alt="No Image"></td>';
                                }
                                echo "<td>".$row['student_reg_no']."</td>";
                                echo "<td>".$row['roll_no']."</td>";
                                echo "<td>".$row['Name']."</td>";
                                echo "<td>".$row['gender']."</td>";
                                echo "<td>".$row['year_of_study']."</td>";
                                echo "<td>".$row['blood_group']."</td>";
                                echo "<td>".$row['username']."</td>";
                                echo "<td>".$row['password']."</td>";
                                echo '<td>
                                    <a href="edit.php?editid='.$row['student_reg_no'].'" class="action-btn edit-btn">Edit</a>
                                    <a href="delete.php?deleteid='.$row['student_reg_no'].'" class="action-btn delete-btn">Delete</a>
                                </td>';
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='10' style='text-align:center;'>No Record Found</td></tr>";
                        }
                    } else {
                       $query = mysqli_query($db, "SELECT * FROM overall_table ORDER BY student_reg_no");

                        while($row = mysqli_fetch_assoc($query)){
                            echo "<tr>";
                            if(!empty($row['img_path'])) {
                                $imagePath = '/php/studentimg/' . basename($row['img_path']);
                                echo '<td><img src="'.$imagePath.'" class="student-img" alt="Student Image" onerror="this.src=\'default-profile.png\'"></td>';
                            } else {
                                echo '<td><img src="default-profile.png" class="student-img" alt="No Image"></td>';
                            }
                            echo "<td>".$row['student_reg_no']."</td>";
                            echo "<td>".$row['roll_no']."</td>";
                            echo "<td>".$row['Name']."</td>";
                            echo "<td>".$row['gender']."</td>";
                            echo "<td>".$row['year_of_study']."</td>";
                            echo "<td>".$row['blood_group']."</td>";
                            echo "<td>".$row['username']."</td>";
                            echo "<td>".$row['password']."</td>";
                            echo '<td>
                                <a href="edit.php?editid='.$row['student_reg_no'].'" class="action-btn edit-btn">Edit</a>
                                <a href="delete.php?deleteid='.$row['student_reg_no'].'" class="action-btn delete-btn">Delete</a>
                            </td>';
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
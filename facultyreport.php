<?php
include("config.php");


if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $delete_query = "DELETE FROM login WHERE user='$id'";
    if(mysqli_query($mysqli, $delete_query)) {
        echo "<script>window.location.href='facultyreport.php';</script>";
    } else {
        echo "<script>alert('Error deleting faculty');</script>";
    }
}


$search_term = isset($_GET['search']) ? trim($_GET['search']) : '';

if(!empty($search_term)) {
    $query = mysqli_query($mysqli, "SELECT * FROM login WHERE 
                                  id LIKE '%$search_term%' OR
                                  name LIKE '%$search_term%' 
                                  ");
} else {
    $query = mysqli_query($mysqli, "SELECT * FROM login");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color:bisque;
        }
        .total {
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
            margin-left: 500px;
        }
        .logout {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
            background-color: #2196F3;
            width: 100px;
        }
        .back-btn {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
            background-color: #2196F3;
            width: 100px;
            margin-right: 10px;
        }
        .search-container {
    display: flex;
    justify-content: center;
    margin-bottom: 30px;
    width: 100%;
}

.search-box {
    display: flex;
    padding: 4px;
    border-radius: 30px;
    width: 100%;
    max-width: 600px;
}
.search-input {
    padding: 12px 20px;
    font-size: 16px;
    border: none;
    border:solid;
    border-radius: 10px;
    flex-grow: 1;
    outline: none;
    width: 70%;
}
.search-button {
    padding: 12px 25px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    font-weight: bold;
    transition: all 0.3s;
    border-radius: 10px;
}
        .add-btn {
            padding: 12px 25px;
            background-color: #2196F3;
            color: white;
            text-decoration: none;
            border-radius: 0 30px 30px 0;
            font-size: 16px;
            font-weight: bold;
            border: none;
            transition: all 0.3s;
        }
        .faculty-table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
            background-color: white;
        }
        .faculty-table th, .faculty-table td {
            border: 1px solid #e0e0e0;
            padding: 12px;
            text-align: center;
        }
        .faculty-table th {
            background-color: #f8f9fa;
            color: #2c3e50;
            font-weight: 600;
        }
        .faculty-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .faculty-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
            border: 2px solid #e0e0e0;
        }
        .action-btn {
            padding: 8px 15px;
            margin: 0 5px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
        }
        .edit-btn {
            background-color: #2196F3;
        }
        .delete-btn {
            background-color: #2196F3;
        }
        .no-results {
            text-align: center;
            padding: 20px;
            color: #666;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="total">
        <div class="header-container">
            <h1 class="page-title">Faculty Report</h1>
            <div>
                <button onclick="window.location.href='admin.php'" class="back-btn">Back</button>
                <button onclick="window.location.href='login.php'" class="logout">Logout</button>
            </div>
        </div>
        
        <div class="search-container">
    <form method="GET" action="facultyreport.php" class="search-box">
        <input type="text" name="search" class="search-input" 
               value="<?php echo $search_term; ?>" 
               placeholder="Search by ID, Name">
        <button type="submit" class="search-button">Search</button>
    </form>
</div>
        <table class="faculty-table">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Salutation</th>
                <th>Position</th>
                <th>Mobile</th>
                <th>Username</th>
                <th>Password</th>
                <th>Operations</th>
            </tr>
            <?php 
            if(mysqli_num_rows($query) > 0) {
                while($row = mysqli_fetch_assoc($query)): 
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td>
                    <?php if(!empty($row['facimg'])): ?>
                        <img src="/<?php echo $row['facimg']; ?>" alt="Faculty Image" class="faculty-image" 
                             onerror="this.src='default-profile.png'">
                    <?php else: ?>
                        <img src="default-profile.png" alt="No Image" class="faculty-image">
                    <?php endif; ?>
                </td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['salutation']; ?></td>
                <td><?php echo $row['profession']; ?></td>
                <td><?php echo $row['mobile']; ?></td>
                <td><?php echo $row['user']; ?></td>
                <td><?php echo $row['pass']; ?></td>
                <td>
                    <a href="faculty_edit.php?editid=<?php echo $row['user']; ?>" class="action-btn edit-btn">Edit</a>
                    <a href="facultyreport.php?deleteid=<?php echo $row['user']; ?>" 
                       class="action-btn delete-btn">Delete</a>
                </td>
            </tr>
            <?php 
                endwhile;
            } else {
                echo '<tr><td colspan="10" class="no-results">No faculty members found</td></tr>';
            }
            ?>
        </table>
    </div>
</body>
</html>
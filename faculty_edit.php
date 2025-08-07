<?php
include("config.php");

$id = $facimg = $user = $pass = $name = $profession = $salutation = $mobile = $dept = '';
$error = '';

if(isset($_GET['editid'])) {
    $editid = $_GET['editid'];
    
    $query = "SELECT * FROM login WHERE user='$editid'";
    $result = mysqli_query($mysqli, $query);
    
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        $facimg = $row['facimg'];
        $user = $row['user'];
        $pass = $row['pass'];
        $name = $row['name'];
        $profession = $row['profession'];
        $salutation = $row['salutation'];
        $mobile = $row['mobile'];
        $dept = $row['dept'];
    } else {
        $error = "Faculty member not found.";
    }
}


if($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $id = $_POST['id'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $name = $_POST['name'];
    $profession = $_POST['profession'];
    $salutation = $_POST['salutation'];
    $mobile = $_POST['mobile'];
    $dept = $_POST['dept'];
    
   
    $update_query = "UPDATE login SET 
                    user='$user', 
                    pass='$pass', 
                    name='$name', 
                    profession='$profession', 
                    salutation='$salutation', 
                    mobile='$mobile', 
                    dept='$dept' 
                    WHERE id='$id'";
    
    if(mysqli_query($mysqli, $update_query)) {
        echo "<script>alert('Faculty updated successfully'); window.location.href='facultyreport.php';</script>";
        exit();
    } else {
        $error = "Error updating record: " . mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Faculty</title>
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2980b9;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --success-color: #2ecc71;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            margin: 0;
            padding: 0;
            color: var(--dark-color);
        }
        
        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        h1 {
            text-align: center;
            color: var(--primary-color);
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--light-color);
        }
        
        .form-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark-color);
        }
        
        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        input:focus, select:focus, textarea:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
            outline: none;
        }
        
        .btn-group {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
            grid-column: span 2;
        }
        
        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-save {
            background-color: var(--success-color);
            color: white;
        }
        
        .btn-save:hover {
            background-color: #27ae60;
        }
        
        .btn-cancel {
            background-color: var(--light-color);
            color: var(--dark-color);
        }
        
        .btn-cancel:hover {
            background-color: #bdc3c7;
        }
        
        .error {
            color: var(--accent-color);
            margin-bottom: 20px;
            text-align: center;
        }
        
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .btn-group {
                grid-column: span 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Faculty Member</h1>
        
        <?php if(!empty($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="user">Username</label>
                    <input type="text" id="user" name="user" value="<?php echo $user; ?>" required maxlength="8">
                </div>
                
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="text" id="pass" name="pass" value="<?php echo $pass; ?>" required maxlength="8">
                </div>
                
                <div class="form-group">
                    <label for="salutation">Salutation</label>
                    <select id="salutation" name="salutation" required>
                        <option value="">--select--</option>
                        <option value="Mr" <?php echo ($salutation == 'Mr') ? 'selected' : ''; ?>>Mr</option>
                        <option value="Mrs" <?php echo ($salutation == 'Mrs') ? 'selected' : ''; ?>>Mrs</option>
                        <option value="Ms" <?php echo ($salutation == 'Ms') ? 'selected' : ''; ?>>Ms</option>
                        <option value="Dr" <?php echo ($salutation == 'Dr') ? 'selected' : ''; ?>>Dr</option>
                        
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="<?php echo $name; ?>" required maxlength="30">
                </div>
                
                <div class="form-group">
                    <label for="profession">Position</label>
                    <select name="profession" id="profession" required>
                        <option value="">-- Select --</option>
                        <option value="Assistant Professor" <?php echo ($profession == 'Assistant Professor') ? 'selected' : ''; ?>>Assistant Professor</option>
                        <option value="Associate professor" <?php echo ($profession == 'Associate professor') ? 'selected' : ''; ?>>Associate Professor</option>
                        <option value="Professor" <?php echo ($profession == 'Professor') ? 'selected' : ''; ?>>Professor</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="mobile">Mobile Number</label>
                    <input type="tel" id="mobile" name="mobile" value="<?php echo $mobile; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="dept">Department</label>
                    <select id="dept" name="dept" required>
                    <option value="">--select--</option>
                        <option value="CSE" <?php echo ($dept == 'CSE') ? 'selected' : ''; ?>>CSE</option>
                        <option value="EEE" <?php echo ($dept == 'EEE') ? 'selected' : ''; ?>>EEE</option>
                        <option value="ECE" <?php echo ($dept == 'ECE') ? 'selected' : ''; ?>>ECE</option>
                        <option value="MECH" <?php echo ($dept == 'MECH') ? 'selected' : ''; ?>>MECH</option>
                        <option value="CIVIL" <?php echo ($dept == 'CIVIL') ? 'selected' : ''; ?>>CIVIL</option>
                    </select>
                </div>
                
                <div class="btn-group">
                    <button type="button" class="btn btn-cancel" onclick="window.location.href='facultyreport.php'">Cancel</button>
                    <button type="submit" class="btn btn-save">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<?php
include('config.php');
if(isset($_GET['editid'])) {
    $reg_no = $_GET['editid'];
    $query = "SELECT * FROM overall_table WHERE student_reg_no='$reg_no'";
    $result = mysqli_query($mysqli, $query);
    if(mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result);
    } else {
        die("Student not found");
    }
} else {
    die("Invalid request");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student Record</title>
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
            max-width: 1200px;
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
        
        .reg-no {
            font-size: 1.2em;
            font-weight: bold;
            color: var(--secondary-color);
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
        .radio-group {
            display: flex;
            gap: 15px;
        }
        .radio-option {
            display: flex;
            align-items: center;
            gap: 5px;
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
        .section-title {
            grid-column: span 2;
            font-size: 1.2em;
            color: var(--primary-color);
            margin: 20px 0 10px;
            padding-bottom: 5px;
            border-bottom: 1px solid var(--light-color);
        }
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }.btn-group, .section-title {
                grid-column: span 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Student Record</h1>
        
        <form action="update.php" method="POST">
            <div class="form-header">
                <div class="reg-no">Register Number: <?php echo ($student['student_reg_no']); ?></div>
                <input type="hidden" name="student_reg_no" value="<?php echo $student['student_reg_no']; ?>">
            </div>
            
            <div class="form-grid">
                <h3 class="section-title">Personal Information</h3>
                <div class="form-group">
                    <label for="salutation">Salutation</label>
                    <select id="salutation" name="salutation" required>
                        <option value="">-- Select --</option>
                        <option value="Mr" <?php echo ($student['Salutaion'] == 'Mr') ? 'selected' : ''; ?>>Mr</option>
                        <option value="Ms" <?php echo ($student['Salutaion'] == 'Ms') ? 'selected' : ''; ?>>Ms</option>
                        <option value="Mrs" <?php echo ($student['Salutaion'] == 'Mrs') ? 'selected' : ''; ?>>Mrs</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="<?php echo ($student['Name']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Gender</label>
                    <div class="radio-group">
                        <div class="radio-option">
                            <input type="radio" id="male" name="gender" value="Male" <?php echo ($student['gender'] == 'Male') ? 'checked' : ''; ?> required>
                            <label for="male">Male</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="female" name="gender" value="Female" <?php echo ($student['gender'] == 'Female') ? 'checked' : ''; ?> required>
                            <label for="female">Female</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="other" name="gender" value="Other" <?php echo ($student['gender'] == 'Other') ? 'checked' : ''; ?> required>
                            <label for="other">Other</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" name="dob" value="<?php echo ($student['dob']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="community">Community</label>
                    <select id="community" name="community" required>
                        <option value="">-- Select --</option>
                        <option value="SC" <?php echo ($student['community'] == 'SC') ? 'selected' : ''; ?>>SC</option>
                        <option value="ST" <?php echo ($student['community'] == 'ST') ? 'selected' : ''; ?>>ST</option>
                        <option value="BC" <?php echo ($student['community'] == 'BC') ? 'selected' : ''; ?>>BC</option>
                        <option value="MBC" <?php echo ($student['community'] == 'MBC') ? 'selected' : ''; ?>>MBC</option>
                        <option value="OC" <?php echo ($student['community'] == 'OC') ? 'selected' : ''; ?>>OC</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nationality">Nationality</label>
                    <select id="nationality" name="nationality" required>
                        <option value="">-- Select --</option>
                        <option value="INDIAN" <?php echo ($student['nationality'] == 'INDIAN') ? 'selected' : ''; ?>>Indian</option>
                        <option value="NRI" <?php echo ($student['nationality'] == 'NRI') ? 'selected' : ''; ?>>NRI</option>
                        <option value="OTHERS" <?php echo ($student['nationality'] == 'OTHERS') ? 'selected' : ''; ?>>Others</option>
                    </select>
    </div>                
                <div class="form-group">
    <label for="blood_group">Blood Group</label>
    <select id="blood_group" name="blood_group" required>
        <option value="">--Select--</option>
        <option value="A+" <?php echo ($student['blood_group'] == 'A+') ? 'selected' : ''; ?>>A+</option>
        <option value="A-" <?php echo ($student['blood_group'] == 'A-') ? 'selected' : ''; ?>>A-</option>
        <option value="A1+" <?php echo ($student['blood_group'] == 'A1+') ? 'selected' : ''; ?>>A1+</option>
        <option value="A1-" <?php echo ($student['blood_group'] == 'A1-') ? 'selected' : ''; ?>>A1-</option>
        <option value="A1B+" <?php echo ($student['blood_group'] == 'A1B+') ? 'selected' : ''; ?>>A1B+</option>
        <option value="A1B-" <?php echo ($student['blood_group'] == 'A1B-') ? 'selected' : ''; ?>>A1B-</option>
        <option value="A2+" <?php echo ($student['blood_group'] == 'A2+') ? 'selected' : ''; ?>>A2+</option>
        <option value="A2-" <?php echo ($student['blood_group'] == 'A2-') ? 'selected' : ''; ?>>A2-</option>
        <option value="A2B+" <?php echo ($student['blood_group'] == 'A2B+') ? 'selected' : ''; ?>>A2B+</option>
        <option value="A2B-" <?php echo ($student['blood_group'] == 'A2B-') ? 'selected' : ''; ?>>A2B-</option>
        <option value="AB+" <?php echo ($student['blood_group'] == 'AB+') ? 'selected' : ''; ?>>AB+</option>
        <option value="AB-" <?php echo ($student['blood_group'] == 'AB-') ? 'selected' : ''; ?>>AB-</option>
        <option value="B+" <?php echo ($student['blood_group'] == 'B+') ? 'selected' : ''; ?>>B+</option>
        <option value="B-" <?php echo ($student['blood_group'] == 'B-') ? 'selected' : ''; ?>>B-</option>
        <option value="B1+" <?php echo ($student['blood_group'] == 'B1+') ? 'selected' : ''; ?>>B1+</option>
        <option value="O+" <?php echo ($student['blood_group'] == 'O+') ? 'selected' : ''; ?>>O+</option>
        <option value="O-" <?php echo ($student['blood_group'] == 'O-') ? 'selected' : ''; ?>>O-</option>
    </select>
</div>   
                <div class="form-group">
                    <label for="religion">Religion</label>
                    <select id="religion" name="religion" required>
                        <option value="">-- Select --</option>
                        <option value="Hindu" <?php echo ($student['religion'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                        <option value="Christian" <?php echo ($student['religion'] == 'Christian') ? 'selected' : ''; ?>>Christian</option>
                        <option value="Muslim" <?php echo ($student['religion'] == 'Muslim') ? 'selected' : ''; ?>>Muslim</option>
                        <option value="Others" <?php echo ($student['religion'] == 'Others') ? 'selected' : ''; ?>>Others</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="caste">Caste</label>
                    <input type="text" id="caste" name="caste" value="<?php echo ($student['caste']); ?>" required>
                </div> 
                <h3 class="section-title">Contact Information</h3>
                <div class="form-group">
                    <label for="mobile_no">Mobile Number</label>
                    <input type="tel" id="mobile_no" name="mobile_no" value="<?php echo ($student['mobile_no']); ?>" required>
                </div>                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo ($student['email']); ?>" required>
                </div>                
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" rows="3" required><?php echo ($student['address']); ?></textarea>
                </div>                
                <div class="form-group">
                    <label for="pincode">Pincode</label>
                    <input type="text" id="pincode" name="pincode" value="<?php echo ($student['pincode']); ?>" required>
                </div>                
                <h3 class="section-title">Parent Information</h3>                
                <div class="form-group">
                    <label for="father_name">Father's Name</label>
                    <input type="text" id="father_name" name="father_name" value="<?php echo ($student['father_name']); ?>" required>
                </div>                
                <div class="form-group">
    <label for="father_occupation">Father's Occupation</label>
    <select id="father_occupation" name="father_occupation" required>
        <option value="">--select--</option>
        <option value="Doctor" <?php echo ($student['father_occupation'] == 'Doctor') ? 'selected' : ''; ?>>Doctor</option>
        <option value="Engineer" <?php echo ($student['father_occupation'] == 'Engineer') ? 'selected' : ''; ?>>Engineer</option>
        <option value="Private" <?php echo ($student['father_occupation'] == 'Private') ? 'selected' : ''; ?>>Private</option>
        <option value="Business" <?php echo ($student['father_occupation'] == 'Business') ? 'selected' : ''; ?>>Business</option>
        <option value="Government" <?php echo ($student['father_occupation'] == 'Government') ? 'selected' : ''; ?>>Government</option>
        <option value="Farmer" <?php echo ($student['father_occupation'] == 'Farmer') ? 'selected' : ''; ?>>Farmer</option>
        <option value="Unemployment" <?php echo ($student['father_occupation'] == 'Unemployment') ? 'selected' : ''; ?>>Unemployment</option>
    </select>
</div>                
<div class="form-group">
    <label for="mother_occupation">Mother's Occupation</label>
    <select id="mother_occupation" name="mother_occupation" required>
        <option value="">--select--</option>
        <option value="Doctor" <?php echo ($student['mother_occupation'] == 'Doctor') ? 'selected' : ''; ?>>Doctor</option>
        <option value="Engineer" <?php echo ($student['mother_occupation'] == 'Engineer') ? 'selected' : ''; ?>>Engineer</option>
        <option value="Private" <?php echo ($student['mother_occupation'] == 'Private') ? 'selected' : ''; ?>>Private</option>
        <option value="Business" <?php echo ($student['mother_occupation'] == 'Business') ? 'selected' : ''; ?>>Business</option>
        <option value="Government" <?php echo ($student['mother_occupation'] == 'Government') ? 'selected' : ''; ?>>Government</option>
        <option value="House wife" <?php echo ($student['mother_occupation'] == 'House wife') ? 'selected' : ''; ?>>House wife</option>
    </select>
</div>                
                <div class="form-group">
                    <label for="parent_number">Parent's Contact Number</label>
                    <input type="tel" id="parent_number" name="parent_number" value="<?php echo ($student['parent_number']); ?>" required>
                </div>                
                <div class="form-group">
                    <label for="family_income">Family Income</label>
                    <input type="number" id="family_income" name="family_income" value="<?php echo ($student['family_income']); ?>" required>
                </div>                
                <h3 class="section-title">Academic Information</h3>                
                <div class="form-group">
                    <label for="roll_no">Roll Number</label>
                    <input type="text" id="roll_no" name="roll_no" value="<?php echo ($student['roll_no']); ?>" required>
                </div>                
                <div class="form-group">
                    <label for="college_name">College Name</label>
                    <select id="college_name" name="college_name" required>
                        <option value="">-- Select --</option>
                        <option value="Government College of Engineering, Thanjavur" 
                            <?php echo ($student['college_name'] == 'Government College of Engineering, Thanjavur') ? 'selected' : ''; ?>>
                            Government College of Engineering, Thanjavur
                        </option>
                    </select>
                </div>                
                <div class="form-group">
                    <label for="year_of_study">Year of Study</label>
                    <select id="year_of_study" name="year_of_study" required>
                        <option value="">-- Select --</option>
                        <option value="I" <?php echo ($student['year_of_study'] == 'I') ? 'selected' : ''; ?>>I</option>
                        <option value="II" <?php echo ($student['year_of_study'] == 'II') ? 'selected' : ''; ?>>II</option>
                        <option value="III" <?php echo ($student['year_of_study'] == 'III') ? 'selected' : ''; ?>>III</option>
                        <option value="IV" <?php echo ($student['year_of_study'] == 'IV') ? 'selected' : ''; ?>>IV</option>
                    </select>
                </div>                
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="<?php echo ($student['username']); ?>" required>
                </div>  
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" id="password" name="password" value="<?php echo ($student['password']); ?>" required>
                </div>                
                <div class="btn-group">
                    <button type="button" class="btn btn-cancel" onclick="window.location.href='staff.php'">Cancel</button>
                    <button type="submit" class="btn btn-save">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
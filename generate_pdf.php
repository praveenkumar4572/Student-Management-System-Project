<?php
session_start();

if (!isset($_SESSION['personal'], $_SESSION['family'], $_SESSION['contact'], $_SESSION['academic'])) {
    die('<h2 style="color: red">Error: Session data not found. Please complete the registration process first.</h2>');
}

// Logout functionality
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

$personal = $_SESSION['personal'];
$family = $_SESSION['family'];
$contact = $_SESSION['contact'];
$academic = $_SESSION['academic'];

if (isset($_POST['download_pdf'])) {
    require_once 'vendor/autoload.php';

    $html = '
    <!DOCTYPE html>
    <html>
    <head>
        <title>Student Details - PDF</title>
        <style>
            body { font-family: Arial, sans-serif; }
            h1 { color: #2c3e50; text-align: center; }
            h2 { color: #34495e; border-bottom: 2px solid #3498db; }
            .section { margin-bottom: 25px; }
            .details-table { width: 100%; border-collapse: collapse; }
            .details-table td { padding: 8px; border: 1px solid #ddd; }
            .header-cell { background-color: #f8f9fa; font-weight: bold; width: 30%; }
            .photo { text-align: center; margin-bottom: 20px; }
        </style>
    </head>
    <body>
        <h1>Student Details Report</h1>';

    // Personal Information
    $html .= '
        <div class="section">
            <h2>Personal Information</h2>
            <table class="details-table">
                <tr><td class="header-cell">Full Name</td><td>' . htmlspecialchars($personal['name']) . '</td></tr>
                <tr><td class="header-cell">Salutation</td><td>' . htmlspecialchars($personal['salutation']) . '</td></tr>
                <tr><td class="header-cell">Gender</td><td>' . htmlspecialchars($personal['gender']) . '</td></tr>
                <tr><td class="header-cell">Date of Birth</td><td>' . htmlspecialchars($personal['dob']) . '</td></tr>
                <tr><td class="header-cell">Community</td><td>' . htmlspecialchars($personal['community']) . '</td></tr>
                <tr><td class="header-cell">Nationality</td><td>' . htmlspecialchars($personal['nationality']) . '</td></tr>
                <tr><td class="header-cell">Blood Group</td><td>' . htmlspecialchars($personal['bg']) . '</td></tr>
                <tr><td class="header-cell">Religion</td><td>' . htmlspecialchars($personal['religion']) . '</td></tr>
                <tr><td class="header-cell">Caste</td><td>' . htmlspecialchars($personal['caste']) . '</td></tr>
                <tr><td class="header-cell">Username</td><td>' . htmlspecialchars($personal['username']) . '</td></tr>
                <tr><td class="header-cell">Password</td><td>' . htmlspecialchars($personal['password']) . '</td></tr>
            </table>
        </div>';

    // Family Information
    $html .= '
        <div class="section">
            <h2>Family Information</h2>
            <table class="details-table">
                <tr><td class="header-cell">Father\'s Name</td><td>' . htmlspecialchars($family['fathername']) . '</td></tr>
                <tr><td class="header-cell">Father\'s Occupation</td><td>' . htmlspecialchars($family['fatheroccupation']) . '</td></tr>
                <tr><td class="header-cell">Mother\'s Name</td><td>' . htmlspecialchars($family['mothername']) . '</td></tr>
                <tr><td class="header-cell">Mother\'s Occupation</td><td>' . htmlspecialchars($family['motheroccupation']) . '</td></tr>
                <tr><td class="header-cell">Family Income</td><td>' . htmlspecialchars($family['familyincome']) . '</td></tr>
                <tr><td class="header-cell">Parent Contact Number</td><td>' . htmlspecialchars($family['parentno']) . '</td></tr>
            </table>
        </div>';

    // Contact Information
    $html .= '
        <div class="section">
            <h2>Contact Information</h2>
            <table class="details-table">
                <tr><td class="header-cell">Mobile Number</td><td>' . htmlspecialchars($contact['mobileno']) . '</td></tr>
                <tr><td class="header-cell">Email Address</td><td>' . htmlspecialchars($contact['email']) . '</td></tr>
                <tr><td class="header-cell">Address</td><td>' . htmlspecialchars($contact['address']) . '</td></tr>
                <tr><td class="header-cell">Pincode</td><td>' . htmlspecialchars($contact['pincode']) . '</td></tr>
            </table>
        </div>';

    // Academic Information
    $html .= '
        <div class="section">
            <h2>Academic Information</h2>
            <table class="details-table">
                <tr><td class="header-cell">Registration Number</td><td>' . htmlspecialchars($academic['studentregno']) . '</td></tr>
                <tr><td class="header-cell">Roll Number</td><td>' . htmlspecialchars($academic['rollno']) . '</td></tr>
                <tr><td class="header-cell">College Name</td><td>' . htmlspecialchars($academic['clgname']) . '</td></tr>
                <tr><td class="header-cell">Academic Year</td><td>' . htmlspecialchars($academic['year']) . '</td></tr>
            </table>
        </div>
    </body>
    </html>';

    $options = new \Dompdf\Options();
    $options->set('isRemoteEnabled', true);
    $options->set('isHtml5ParserEnabled', true);
    $dompdf = new \Dompdf\Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    $filename = "student_details_" . date('Ymd_His') . ".pdf";
    $dompdf->stream($filename, ["Attachment" => true]);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            position: relative;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }
        h2 {
            color: #34495e;
            border-bottom: 2px solid #3498db;
            padding-bottom: 5px;
            margin-top: 30px;
        }
        .section {
            margin-bottom: 30px;
        }
        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .details-table th, .details-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .details-table th {
            background-color: #f8f9fa;
            font-weight: bold;
            width: 30%;
        }
        .button-container {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
        }
        .download-btn {
            padding: 8px 15px;
            background-color: #3498db;
            color: white;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .download-btn:hover {
            background-color: #2980b9;
        }
        .logout-btn {
            padding: 8px 15px;
            background-color: #e74c3c;
            color: white;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-left: 10px;
        }
        .logout-btn:hover {
            background-color: #c0392b;
        }
        .photo-container {
            text-align: center;
            margin: 20px 0;
        }
        .photo-placeholder {
            width: 150px;
            height: 150px;
            background-color: #f0f0f0;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px dashed #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Button container with both Download PDF and Logout buttons -->
        <div class="button-container">
            <form method="post">
                <button type="submit" name="download_pdf" class="download-btn">Download PDF</button>
            </form>
            <a href="?logout=1" class="logout-btn">Logout</a>
        </div>
        
        <h1>Student Details</h1>
        
        <!-- Personal Information -->
        <div class="section">
            <h2>Personal Information</h2>
            <table class="details-table">
                <tr>
                    <th>Full Name</th>
                    <td><?php echo htmlspecialchars($personal['name']); ?></td>
                </tr>
                <tr>
                    <th>Salutation</th>
                    <td><?php echo htmlspecialchars($personal['salutation']); ?></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><?php echo htmlspecialchars($personal['gender']); ?></td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td><?php echo htmlspecialchars($personal['dob']); ?></td>
                </tr>
                <tr>
                    <th>Community</th>
                    <td><?php echo htmlspecialchars($personal['community']); ?></td>
                </tr>
                <tr>
                    <th>Nationality</th>
                    <td><?php echo htmlspecialchars($personal['nationality']); ?></td>
                </tr>
                <tr>
                    <th>Blood Group</th>
                    <td><?php echo htmlspecialchars($personal['bg']); ?></td>
                </tr>
                <tr>
                    <th>Religion</th>
                    <td><?php echo htmlspecialchars($personal['religion']); ?></td>
                </tr>
                <tr>
                    <th>Caste</th>
                    <td><?php echo htmlspecialchars($personal['caste']); ?></td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td><?php echo htmlspecialchars($personal['username']); ?></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><?php echo htmlspecialchars($personal['password']); ?></td>
                </tr>
            </table>
        </div>
        
        <!-- Family Information -->
        <div class="section">
            <h2>Family Information</h2>
            <table class="details-table">
                <tr>
                    <th>Father's Name</th>
                    <td><?php echo htmlspecialchars($family['fathername']); ?></td>
                </tr>
                <tr>
                    <th>Father's Occupation</th>
                    <td><?php echo htmlspecialchars($family['fatheroccupation']); ?></td>
                </tr>
                <tr>
                    <th>Mother's Name</th>
                    <td><?php echo htmlspecialchars($family['mothername']); ?></td>
                </tr>
                <tr>
                    <th>Mother's Occupation</th>
                    <td><?php echo htmlspecialchars($family['motheroccupation']); ?></td>
                </tr>
                <tr>
                    <th>Family Income</th>
                    <td><?php echo htmlspecialchars($family['familyincome']); ?></td>
                </tr>
                <tr>
                    <th>Parent Contact Number</th>
                    <td><?php echo htmlspecialchars($family['parentno']); ?></td>
                </tr>
            </table>
        </div>
        
        <!-- Contact Information -->
        <div class="section">
            <h2>Contact Information</h2>
            <table class="details-table">
                <tr>
                    <th>Mobile Number</th>
                    <td><?php echo htmlspecialchars($contact['mobileno']); ?></td>
                </tr>
                <tr>
                    <th>Email Address</th>
                    <td><?php echo htmlspecialchars($contact['email']); ?></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><?php echo htmlspecialchars($contact['address']); ?></td>
                </tr>
                <tr>
                    <th>Pincode</th>
                    <td><?php echo htmlspecialchars($contact['pincode']); ?></td>
                </tr>
            </table>
        </div>
        
        <!-- Academic Information -->
        <div class="section">
            <h2>Academic Information</h2>
            <table class="details-table">
                <tr>
                    <th>Registration Number</th>
                    <td><?php echo htmlspecialchars($academic['studentregno']); ?></td>
                </tr>
                <tr>
                    <th>Roll Number</th>
                    <td><?php echo htmlspecialchars($academic['rollno']); ?></td>
                </tr>
                <tr>
                    <th>College Name</th>
                    <td><?php echo htmlspecialchars($academic['clgname']); ?></td>
                </tr>
                <tr>
                    <th>Academic Year</th>
                    <td><?php echo htmlspecialchars($academic['year']); ?></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
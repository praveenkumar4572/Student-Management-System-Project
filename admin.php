<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style> 
        body {
            margin: 0;
            padding: 20px;
        }
        .admin-container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }
        .admin {
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 15px;
            border:solid;
            margin-bottom: 30px;
            width: 100%;
        }
        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
            flex-wrap: wrap;
        }
        .admin-button {
            padding: 15px 25px;
            border: none;
            border-radius: 10px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
            min-width: 180px;
            text-align: center;
        }
        .faculty-button {
            background-color: pink;
        }
        .student-button {
            background-color: pink;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <h1 class="admin">Admin Page</h1>
        
        <div class="button-container">
            <button class="admin-button faculty-button" onclick="window.location.href='Adminad.php'">
                Add Faculty
            </button>
            <button class="admin-button faculty-button" onclick="window.location.href='facultyreport.php'">
                Faculty Report
            </button>
            <button class="admin-button student-button" onclick="window.location.href='staff.php'">
                Student Management
            </button>
        </div>
    </div>
</body>
</html>
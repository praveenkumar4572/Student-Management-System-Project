<?php
$db = mysqli_connect("localhost", "root", "", "std_information_system");
$query = mysqli_query($db, "SELECT ID, Name, img_path FROM overall_table WHERE img_path != '' AND img_path IS NOT NULL");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Images</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .student-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .student-card:hover {
            transform: translateY(-5px);
        }
        .student-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        .student-info {
            padding: 15px;
            text-align: center;
        }
        .student-name {
            margin: 0;
            color: #333;
            font-size: 18px;
        }
        .student-id {
            margin: 5px 0 0;
            color: #666;
            font-size: 14px;
        }
        .back-btn {
            display: block;
            width: 100px;
            margin: 20px auto;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Student Images</h1>
    <a href="report.html" class="back-btn">Back</a>
    
    <div class="gallery">
        <?php while($row = mysqli_fetch_assoc($query)): ?>
            <div class="student-card">
                <?php if(!empty($row['img_path'])): ?>
                    <?php
                    $imagePath = 'http://localhost/' . ltrim($row['img_path'], '/');
                    ?>
                    <img src="<?= htmlspecialchars($imagePath) ?>" alt="Student Image" class="student-image" onerror="this.src='default-profile.png'">
                <?php else: ?>
                    <img src="default-profile.png" alt="No Image" class="student-image">
                <?php endif; ?>
                <div class="student-info">
                    <h3 class="student-name"><?= htmlspecialchars($row['Name']) ?></h3>
                    <p class="student-id">ID: <?= htmlspecialchars($row['ID']) ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
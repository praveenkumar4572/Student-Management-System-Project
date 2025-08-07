<?php
include 'connect.php';
if (isset($_GET['id'])) {
    $item_id = intval($_GET['id']);
    $sql = "SELECT img FROM overall_table WHERE ID = $item_id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (!empty($row['img'])) {
            header("Content-Type: image/png");
            echo $row['img'];
            exit;
        }
    }   
}
header("Content-Type: image/png");
readfile('path/to/default-image.png'); 
exit;
?>
<?php
include("configforstudent,family,contact.php");
$query = "SELECT * FROM student";
$result = mysqli_query($mysqli, $query);
if (!$result) {
    die("Query failed: " . mysqli_error($mysqli));
}
$students = [];
while ($row = mysqli_fetch_assoc($result)) {
    $students[] = $row;
}
mysqli_close($mysqli);
?>
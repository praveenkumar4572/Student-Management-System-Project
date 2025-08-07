<?php
require_once __DIR__ . '/vendor/autoload.php';
include('config.php');

if (!isset($_GET['id'])) {
    die('No student ID provided.');
}

$student_id = $_GET['id'];
$stmt = mysqli_prepare($conn, "SELECT * FROM overall_table WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $student_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$student = mysqli_fetch_assoc($result);

if (!$student) {
    die('Student not found.');
}

$html = '
<h2>Student Information</h2>
<table border="1" cellpadding="10">
    <tr><th>Name</th><td>' . htmlspecialchars($row['name']) . '</td></tr>
  
    <tr><th>Email</th><td>' . htmlspecialchars($row['email']) . '</td></tr>

</table>
';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('student_details.pdf', 'D'); // Forces download
?>

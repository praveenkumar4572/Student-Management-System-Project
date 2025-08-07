<h2>Student List</h2>
<table border="1">
    <tr>
        <th>Salutation</th>
        <th>Name</th>
        <th>Gender</th>
        <th>DOB</th>
        <th>Community</th>
        <th>Nationality</th>
        <th>Blood Group</th>
        <th>Religion</th>
        <th>Caste</th>
    </tr>
    <?php
    include("fetch_data.php");
    foreach ($students as $student) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($student['salutation']) . "</td>";
        echo "<td>" . htmlspecialchars($student['name']) . "</td>";
        echo "<td>" . htmlspecialchars($student['gender']) . "</td>";
        echo "<td>" . htmlspecialchars($student['dob']) . "</td>";
        echo "<td>" . htmlspecialchars($student['community']) . "</td>";
        echo "<td>" . htmlspecialchars($student['nationality']) . "</td>";
        echo "<td>" . htmlspecialchars($student['bgg']) . "</td>";
        echo "<td>" . htmlspecialchars($student['religion']) . "</td>";
        echo "<td>" . htmlspecialchars($student['cast']) . "</td>";
        echo "</tr>";
    }
    ?>
</table>
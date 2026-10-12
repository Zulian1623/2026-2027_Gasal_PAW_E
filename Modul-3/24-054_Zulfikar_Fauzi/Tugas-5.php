<?php
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665"),
    array("David", "220404", "0812345671"),
    array("Emma", "220405", "0812345672"),
    array("Frank", "220406", "0812345673"),
    array("Grace", "220407", "0812345674"),
    array("Henry", "220408", "0812345675")
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>

<h3>Data Mahasiswa</h3>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Name</th>
        <th>NIM</th>
        <th>Mobile</th>
    </tr>

    <?php
    foreach ($students as $student) {
        echo "<tr>";
        echo "<td>" . $student[0] . "</td>";
        echo "<td>" . $student[1] . "</td>";
        echo "<td>" . $student[2] . "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
<?php
include "db_connect.php";

$sql = "SELECT * FROM students";
$stmt = $conn->query($sql);

$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>

<h2>Danh sách sinh viên</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Họ tên</th>
        <th>Mã SV</th>
        <th>Email</th>
        <th>Hành động</th>
    </tr>

    <?php foreach ($students as $sv): ?>
    <tr>
        <td><?= $sv['id'] ?></td>
        <td><?= htmlspecialchars($sv['fullname']) ?></td>
        <td><?= htmlspecialchars($sv['student_code']) ?></td>
        <td><?= htmlspecialchars($sv['email']) ?></td>
        <td>
            <a href="#">Sửa</a> | 
            <a href="#">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>

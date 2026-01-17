<?php
include "db_connect.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
</head>
<body>
    <h2>Đăng ký tài khoản</h2>

    <form method="POST">
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Mật khẩu" required><br><br>
        <button type="submit">Đăng ký</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $conn->prepare($sql);

        try {
            $stmt->execute([
                ':email' => $email,
                ':password' => $password
            ]);
            echo "<p style='color:green;'>Đăng ký thành công!</p>";
        } catch (PDOException $e) {
            echo "<p style='color:red;'>Email đã tồn tại!</p>";
        }
    }
    ?>
</body>
</html>

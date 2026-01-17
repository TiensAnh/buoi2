<?php
session_start();

$products = [
    1 => "Bàn phím",
    2 => "Chuột",
    3 => "Tai nghe"
];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['add'])) {
    $id = $_GET['add'];
    $_SESSION['cart'][] = $id;
    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng</title>
</head>
<body>
    <h2>Sản phẩm</h2>

    <?php foreach ($products as $id => $name): ?>
        <p>
            <?= $name ?>
            <a href="?add=<?= $id ?>">[Thêm vào giỏ]</a>
        </p>
    <?php endforeach; ?>

    <hr>

    <h3>Giỏ hàng của bạn</h3>
    <?php
    if (empty($_SESSION['cart'])) {
        echo "Giỏ hàng trống";
    } else {
        foreach ($_SESSION['cart'] as $item_id) {
            echo "- " . $products[$item_id] . "<br>";
        }
    }
    ?>
</body>
</html>

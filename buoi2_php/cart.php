<?php
session_start();

$products = [
    1 => 'Áo thun',
    2 => 'Quần jean',
    3 => 'Giày sneaker'
];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['add'])) {
    $product_id = $_GET['add'];
    $_SESSION['cart'][] = $product_id;

    // Redirect để tránh F5 thêm lại
    header("Location: cart.php");
    exit;
}
?>

<h2>Danh sách sản phẩm</h2>
<ul>
<?php foreach ($products as $id => $name): ?>
    <li>
        <?php echo $name; ?>
        <a href="?add=<?php echo $id; ?>">Thêm vào giỏ</a>
    </li>
<?php endforeach; ?>
</ul>

<h2>Giỏ hàng</h2>
<?php
if (empty($_SESSION['cart'])) {
    echo "Giỏ hàng trống";
} else {
    echo "<ul>";
    foreach ($_SESSION['cart'] as $item) {
        echo "<li>Sản phẩm ID: $item</li>";
    }
    echo "</ul>";
}
?>

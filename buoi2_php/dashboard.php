<?php
session_start();

// Nếu chưa đăng nhập → quay về login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<h2>Xin chào, <?php echo $_SESSION['user']; ?></h2>

<form action="logout.php" method="post">
    <button type="submit">Đăng xuất</button>
</form>

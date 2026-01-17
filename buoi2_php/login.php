<?php
session_start();
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password_input = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':email' => $email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password_input, $user['password'])) {
        $_SESSION['user'] = $user['email'];
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Sai email hoặc mật khẩu";
    }
}
?>

<form method="post">
    <h2>Đăng nhập</h2>
    Email:
    <input type="email" name="email" required><br><br>

    Mật khẩu:
    <input type="password" name="password" required><br><br>

    <button type="submit">Đăng nhập</button>
</form>

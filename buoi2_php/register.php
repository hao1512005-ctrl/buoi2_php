<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đăng ký tài khoản</title>
</head>
<body>

<h2>Đăng ký</h2>

<form method="POST" action="">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Mật khẩu:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit" name="btnRegister">Đăng ký</button>
</form>

</body>
</html>
<?php
if (isset($_POST['btnRegister'])) {

    include "db_connect.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->execute([$email, $hashedPassword]);

    echo "<p style='color:green;'>Đăng ký tài khoản thành công!</p>";
}
?>

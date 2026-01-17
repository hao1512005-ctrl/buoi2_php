<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form POST</title>
</head>
<body>

<h2>Form đăng ký (POST)</h2>

<form method="POST" action="">
    <input type="text" name="username" placeholder="Tên"><br><br>
    <input type="password" name="password" placeholder="Mật khẩu"><br><br>
    <button type="submit">Đăng ký</button>
</form>

<?php
if (isset($_POST['username'])) {
    $name = $_POST['username'];
    echo "Đã nhận thông tin của " . $name;
}
?>

</body>
</html>

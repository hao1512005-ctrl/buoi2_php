<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên</title>
</head>
<body>

<h2>Thêm sinh viên</h2>

<form method="POST" action="">
    <label>Họ tên:</label><br>
    <input type="text" name="fullname" required><br><br>

    <label>Mã sinh viên:</label><br>
    <input type="text" name="student_code" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <button type="submit" name="btnAdd">Thêm mới</button>
</form>

</body>
</html>
<?php
if (isset($_POST['btnAdd'])) {

    // 1. Nhúng file kết nối DB
    include "db_connect.php";

    // 2. Lấy dữ liệu từ form
    $fullname = $_POST['fullname'];
    $student_code = $_POST['student_code'];
    $email = $_POST['email'];

    // 3. Viết câu lệnh INSERT (Prepared Statement)
    $sql = "INSERT INTO students (fullname, student_code, email)
            VALUES (?, ?, ?)";

    // 4. Chuẩn bị câu lệnh
    $stmt = $conn->prepare($sql);

    // 5. Thực thi
    $stmt->execute([$fullname, $student_code, $email]);

    // 6. Thông báo
    echo "<p style='color:green;'>Thêm sinh viên thành công!</p>";
}
?>

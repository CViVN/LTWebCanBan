<?php
// Kết nối tới database
$conn = mysqli_connect('localhost', 'root', '', 'database');
    
// Lấy thông tin password từ phía client
$password = $_POST['password'];
$phone = $_POST['phone'];

// Truy vấn để cập nhật mật khẩu mới vào database
$sql = "UPDATE clients SET password='$password' WHERE Phone='$phone'";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo 'success'; // Trả về 'success' nếu cập nhật thành công
} else {
    echo 'error'; // Trả về 'error' nếu có lỗi xảy ra
}

// Đóng kết nối tới database
mysqli_close($conn);
?>
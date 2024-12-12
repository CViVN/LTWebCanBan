<?php
// Kết nối tới database
$conn = mysqli_connect('localhost', 'root', '', 'database');

// Lấy thông tin username và currentPassword từ phía client
$phone = $_POST['phone'];
$currentPassword = $_POST['currentPassword'];

// Truy vấn để lấy mật khẩu hiện tại của user
$sql = "SELECT password FROM clients WHERE Phone ='$phone'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // Nếu tìm thấy user, so sánh mật khẩu hiện tại với mật khẩu trong database
    $row = mysqli_fetch_assoc($result);
    if ($row['password'] != $currentPassword) {
        echo 'false'; // Trả về 'false' nếu mật khẩu không đúng
    } else {
        echo 'true'; // Trả về 'true' nếu mật khẩu đúng
    }
} else {
    echo 'user_not_found'; // Trả về 'user_not_found' nếu không tìm thấy user trong database
}

// Đóng kết nối tới database
mysqli_close($conn);
?>
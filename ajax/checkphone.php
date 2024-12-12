<?php
// Kết nối tới database
$conn = mysqli_connect('localhost', 'root', '', 'database');
    $phone = $_POST['phone'];
    $sql = "SELECT * FROM clients WHERE Phone = '$phone' and status = 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        echo 'success'; // Trả về 'success' nếu cập nhật thành công
    } else {
        echo 'false'; // Trả về 'error' nếu có lỗi xảy ra
    }
    
    // Đóng kết nối tới database
    mysqli_close($conn);

// Lấy thông tin password từ phía client

?>
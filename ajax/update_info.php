
<?php
// Kết nối tới database
$conn = mysqli_connect('localhost', 'root', '', 'database');
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $sql = "UPDATE clients SET name='$name', email='$email', address = '$address' WHERE phone='$phone'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo 'success'; // Trả về 'success' nếu cập nhật thành công
    } else {
        echo 'error'; // Trả về 'error' nếu có lỗi xảy ra
    }
    
    // Đóng kết nối tới database
    mysqli_close($conn);

// Lấy thông tin password từ phía client

?>

<?php
session_start();
// Kết nối tới database
$conn = new mysqli('localhost', 'root', '', 'database');
if ($conn->connect_errno){
    die ("Lỗi kết nối: " . $conn->connect_error);
}
//Lấy dữ liệu 
$sdt = $_POST["sdt"];
$sql = "SELECT * FROM clients WHERE phone = '$sdt'";
$client = mysqli_query($conn, $sql);
if(mysqli_num_rows($client) == 0 || isset($_SESSION['phone'])){
    echo 1;
}else{
    echo 0;
}
//Đóng kết nối tới database
mysqli_close($conn);
?>
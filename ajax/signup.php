<?php
// Kết nối tới database
$conn = mysqli_connect('localhost', 'root', '', 'database');
// Lấy thông tin password từ phía client
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$password = $_POST['password'];
$sql = "SELECT * FROM clients where Phone = '$phone'";
$res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res) != 0){
    $sql1 = "UPDATE clients set name = '$name', address = '$address', email = '$email', password = '$password', status = 1 where Phone = '$phone'";
    $res1 = mysqli_query($conn,$sql1);
    if($res1){
        echo 'success';
    }else{
        echo 'error';
    }
}else{
    $sql2 = "INSERT INTO clients(name, Phone,address,email, password,status) VALUES('$name', '$phone', '$address', '$email', '$password',1)";
    $res2 = mysqli_query($conn,$sql2);
    if($res2){
        echo 'success';
    }else{
        echo 'error';
    }
}
// Đóng kết nối tới database    
mysqli_close($conn);
?>
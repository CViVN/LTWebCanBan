
<?php
session_start();
// Kết nối tới database
$conn = new mysqli('localhost', 'root', '', 'database');
if ($conn->connect_errno){
    die ("Lỗi kết nối: " . $conn->connect_error);
}
//Lấy dữ liệu 
$hoten = $_POST["hoten"];
$sdt = $_POST["sdt"];
$email = $_POST["email"];
$diachi = $_POST["diachi"];
$loinhan = $_POST["loinhan"];
$total = $_POST["tonggia"];
$sql_tk = "SELECT * FROM clients WHERE phone = '$sdt'";
$client = mysqli_query($conn, $sql_tk);
if(mysqli_num_rows($client) == 0){
    $sql0 = "INSERT INTO clients VALUES('$hoten','$sdt','$diachi','$email','',0)";
    $temp = mysqli_query($conn, $sql0);
}
//tạo mã tự động
//$sql1 = "SELECT max(maHD) as dem from hoadon where sdt = '$sdt'";
$sql_max = "SELECT max(ID_HD) as dem from invoice where Phone = '$sdt'";
$maxid = mysqli_query($conn, $sql_max);
$row = mysqli_fetch_array($maxid);
$tt = substr($row['dem'],-3);
$id = (int)$tt + 1;
$mahd = "";
if($id > 0 && $id < 10){
    $mahd = "HD-".substr($sdt,-3)."-00".$id;
}   
else if($id >=10 && $id <100){
    $mahd = "HD-".substr($sdt,-3)."-0".$id;
}
else if($id >=100 && $id <=999){
    $mahd = "HD-".substr($sdt,-3)."-".$id;
}
$ngaylap = date('Y/m/d',time());
//câu lệnh truy vấn
$sql = "INSERT INTO invoice VALUES('$total','$hoten','$sdt','$mahd','$email','$diachi','$loinhan','$ngaylap')";
$res = mysqli_query($conn, $sql);
//tạo biến để lưu mảng các phòng muốn đặt
$phong = array();
$dichvu = array();
if(isset($_SESSION['cartroom'])){   
    $phong = $_SESSION['cartroom'];
    foreach($phong as $value){
        $id = $value["id"];
        $ngayden = $value["ngayden"];
        $ngaydi = $value["ngaydi"];
        $thanhtien = $value["prices"];
        $sql1 = "INSERT INTO listroom VALUES('$ngayden','$ngaydi','$id','$mahd',$thanhtien)";
        $res1 = mysqli_query($conn, $sql1);
    }
}
//tạo biến để lưu mảng các dịch vụ muốn đặt
if(isset($_SESSION['service'])){   
    $dichvu = $_SESSION['service'];
    foreach($dichvu as $value){
        $id = $value["id"];
        $name = $value["name"];
        $price = $value["price"];
        $sql2 = "INSERT INTO invoice_service VALUES('$mahd','$id','$name',$price)";
        $res2 = mysqli_query($conn, $sql2);
    }
}
//duyệt mảng lưu phòng

//duyệt mảng lưu dịch vụ

//kiếm tra lưu hóa đơn
if ($res){
    if(isset($_SESSION['cartroom'])){   
        unset($_SESSION['cartroom']);
    }
    if(isset($_SESSION['service'])){   
        unset($_SESSION['service']);
    }
    if(isset($_SESSION['dichvu'])){   
        unset($_SESSION['dichvu']);
    }
    echo $mahd; // Trả về mahd nếu cập nhật thành công
} else {
    echo 'error'; // Trả về 'error' nếu có lỗi xảy ra
}
// Đóng kết nối tới database
mysqli_close($conn);
?>

<?php
session_start();
// Kết nối tới database
$conn = new mysqli('localhost', 'root', '', 'database');
if ($conn->connect_errno){
    die ("Lỗi kết nối: " . $conn->connect_error);
}
//Lấy dữ liệu 
$mahd = $_POST["mahd"];
$hoten = "";
$email = "";
$sdt = "";
$diachi = "";
$loinhan = "";
$tonggia = 0;
$ngaylap;
$sql1 = "SELECT * FROM invoice WHERE ID_HD = '$mahd'";
$sql2 = "SELECT * FROM listroom WHERE ID_HD = '$mahd'";
$sql3 = "SELECT * FROM invoice_service WHERE ID_HD = '$mahd'";
$res1 = mysqli_query($conn, $sql1);
$res2 = mysqli_query($conn, $sql2);
$res3 = mysqli_query($conn, $sql3);
if(mysqli_num_rows($res1) > 0){
    foreach($res1 as $row){
        $hoten = $row['name'];
        $sdt = $row['phone'];
        $email = $row['email'];
        $diachi = $row['address'];
        $loinhan = $row['loinhan'];
        $tonggia = $row['total_price'];
        $ngaylap = $row['ngaylap'];
    }
    echo "<p><b style = 'font-size: 20px'><u>Thông tin hóa đơn:</u></b></p>
          <p>Họ tên: $hoten</p>
          <p>Email: $email</p>
          <p>Số điện thoại: $sdt</p>
          <p>Địa chỉ: $diachi</p>
          <p>Lời nhắn: $loinhan</p>
          <p>Tổng giá: $tonggia</p>
          <p>Ngày lập hóa đơn: $ngaylap</p>
    ";
    if(mysqli_num_rows($res2) > 0){
        echo "<p><b style = 'font-size: 20px'><u>Phòng:</u></b></p>";
        echo "
        <table class = 'table'>
                <thead>
                    <tr>
                        <th>Tên phòng</th>
                        <th>Ngày đến</th>
                        <th>Ngày đi</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
        ";
        foreach($res2 as $row){
            $id = $row['ID_room'];
            $ngayden = $row['ngayden'];
            $ngaydi = $row['ngaydi'];
            $prices = $row['prices'];
        echo"
            <tr>
                <td>$id</td>
                <td>$ngayden</td>
                <td>$ngaydi</td>
                <td>$prices</td>
            </tr>
        ";
        }
        echo "</tbody>
        </table>";
    } 
    if(mysqli_num_rows($res3) > 0){
        echo "<p><b style = 'font-size: 20px'><u>Dịch vụ:</u></b></p>";
        echo "
        <table class = 'table'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên dịch vụ</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
        ";
        foreach($res3 as $row){
            $id = $row['id'];
            $name = $row['name'];
            $price = $row['price'];
        echo"
            <tr>
                <td>$id</td>
                <td>$name</td>
                <td>$price</td>
            </tr>
        ";
        }
        echo "</tbody>
        </table>";
} 
}else {
    echo 0; // Trả về 'error' nếu có lỗi xảy ra
}
mysqli_close($conn);
?>

<?php
// Kết nối tới database
$conn = new mysqli('localhost', 'root', '', 'database');
if ($conn->connect_errno){
    die ("Lỗi kết nối: " . $conn->connect_error);
}
//Lấy dữ liệu 
$nam = $_POST["nam"];
$sql = "SELECT * FROM invoice WHERE YEAR(ngaylap) = '$nam'";
$res = mysqli_query($conn, $sql);
$total = 0;
foreach($res as $row){
    $total += $row['total_price'];
}
if ($res){
    echo "Doanh thu trong năm ".$nam." của khách sạn là ".$total;
    if(mysqli_num_rows($res) != 0){
    echo "<br>Chi tiết:<br>";
    echo "<table class ='table'>
            <thead>
            <tr>
                <th>Mã hóa đơn</th>
                <th>Tổng tiền</th>
                <th>Tên người đặt</th>
                <th>Số điện thoại</th>
                <th>Ngày lập</th>
            </tr>
            </thead>
            <tbody>
    ";
    foreach($res as $row){
        $id = $row['ID_HD'];
        $name = $row['name'];
        $sdt = $row['phone'];
        $ngaylap = $row['ngaylap'];
        $tongtien = $row['total_price'];
        echo "
            <tr>
                <td>$id</td>
                <td>$tongtien</td>
                <td>$name</td>
                <td>$sdt</td>
                <td>$ngaylap</td>
            </tr>
            ";
    }
    echo "</tbody>
        </table>";
    }
}else{
    echo 'error';
}
mysqli_close($conn);
?>
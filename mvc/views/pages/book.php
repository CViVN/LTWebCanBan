<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<?php   
    $db = new mysqli('localhost', 'root', '', 'hotel');
    if ($db->connect_errno){
        die ("Lỗi kết nối: " . $db->connect_error);
    }
?>
<div class = "row">
  <div class = "col-lg-7">
  <div class="card">
  <div class="card-header" style = "color:white;background-color:black;border: 1px solid black" >
    Đăng kí dịch vụ
  </div>
  <form method = "post" action = "check.php">
  <?php
    $res = $db->query("select * from dichvu");
    while ($row = mysqli_fetch_array($res)){ 
      $id = $row['id'];
      $ten = $row['ten'];
      $gia = $row['gia'];
    echo "<div class='card-body' style = 'border: 1px solid black'>
    <div class = 'row'>
      <div class = 'col-lg-4'>
            <img src = 'http://cdn.tgdd.vn/Files/2020/12/16/1314124/thuc-an-nhanh-la-gi-an-thuc-an-nhanh-co-tot-hay-khong-202201201405201587.jpg' style = 'width: 100%;height: 100%'>
      </div>
      <div class = 'col-lg-6'>
            <p>$ten</p>
            <p>$gia VND</p>
      </div>
      <div class = 'col-lg-2'>
            Lựa chọn<input type = 'checkbox' name = 'dichvu[]' value = $gia>
      </div>
    </div>
  </div>";
  }
  ?>
  </div>
  </div>
  <div class = "col-lg-5">
    <div class="card" style = "width: 70%">
    <div class = "card-header" style = "color: white; background-color:blue">Hóa đơn</div>
    <div class="card-body">
    <h5 class = "card-title">Phòng đơn</h5>
    <hr>
      <p class ="card-text">Check in: $ngaynhan</p>
      <p class ="card-text">Check out: $ngaytra</p>
      <p class ="card-text">Số đêm: $sodem</p>
    </div>
    <div class = "card-footer">
      Tổng tiền: 50000VND
    </div>
</div>
<br>
<input type = "submit" name = "btn" value = "Tiếp tục">
  </form>
  </div>
</div>
</body>
</html>
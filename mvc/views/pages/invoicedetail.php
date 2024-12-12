<!DOCTYPE html>
<html>

<head>
  <title>Trang Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../view/css/landing.css" type="text/css">
</head>
<style>
  * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: "Shantell Sans", cursive;
  }

  .login {
    padding-right: 10px;
  }

  .login a {
    text-decoration: none;
    color: aliceblue;
    font-size: 14px;

  }

  .login a:hover {
    text-decoration: underline;
  }

  .navbar {
    display: flex;
    justify-content: space-between;
    flex-wrap: nowrap;
    height: 50px;
    background: linear-gradient(145deg, rgb(184, 6, 6), rgb(229, 14, 154));
    align-items: center;
    position: sticky;
    z-index: 1000;
  }

  .navbar * {
    line-height: 50px;
    ;
  }

  .hamburger {
    display: block;
    width: 35px;
    height: 35px;
    cursor: pointer;

    appearance: none;
    background: none;
    outline: none;
    border: none;
  }

  .logo {
    display: flex;

  }

  .logo a {
    text-decoration: none;
    text-decoration-color: black;
    color: aliceblue;



  }

  .sidebar {
    width: 15%;
    height: 100%;
    background-color: rgb(150, 6, 6);
    position: fixed;
    left: 0;
    top: 0;
    overflow-x: hidden;
    padding-top: 30px;
  }

  .sidebar ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .sidebar ul li {
    padding: 10px;
    border-bottom: 1px solid #ccc;
  }

  .sidebar ul li a {
    color: #333;
    text-decoration: none;
  }

  #footer {
    position: fixed;
    bottom: 0;
  }

  .sidebar {
    z-index: 2;
    position: absolute;
    top: 0;
    left: -250px;
    width: 250px;
    height: 100%;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    transition: all 0.3s ease-in-out;
  }

  .sidebar.open {
    left: 0;
  }

  .sidebar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    border-bottom: 1px solid #eee;
  }

  .sidebar-header h3 {
    margin: 0;
  }

  .close-sidebar {
    font-size: 30px;
    color: #333;
    background-color: transparent;
    border: none;
    cursor: pointer;
  }

  .sidebar-menu {
    margin: 0;
    padding: 0;
    list-style: none;
  }

  .sidebar-menu li {
    padding: 10px 20px;
    border-bottom: 1px solid #eee;
  }

  .sidebar-menu li a {
    text-decoration: none;
    color: #333;
  }

  .toggle-button {
    display: inline-block;
    background-color: transparent;
    color: #333;
    font-size: 24px;
    border: none;
    cursor: pointer;
    padding: 10px;
    transition: color 0.3s ease-in-out;
  }

  .toggle-button:hover {
    color: #666;
  }

  .toggle-button:focus {
    outline: none;
  }

  .toggle-button.active {
    color: #fff;
    background-color: #333;
  }










  .container {
    max-width: 800px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ccc;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  }

  .headerad {
    text-align: center;
    margin-bottom: 20px;
  }

  .navad {
    margin-bottom: 20px;
  }

  .navad ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #f0f0f0;
    border-radius: 5px;
  }

  .navad li {
    float: left;
  }

  .navad li a {
    display: block;
    color: #333;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }

  .navad li a:hover {
    background-color: #ddd;
  }

  main {
    margin-bottom: 20px;
  }

  h2 {
    margin-bottom: 10px;
  }

  form {
    display: flex;
    flex-direction: column;
  }

  label {
    margin-bottom: 10px;
  }





  nav .nav-linkad.active {
    font-weight: bold;
    background-color: #ccc;

  }



  /* 
landing.css
*/

  table {
    border-collapse: collapse;
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
    font-family: Arial, sans-serif;
  }

  thead {
    background-color: #f2f2f2;
    font-weight: bold;
  }

  th,
  td {
    text-align: left;
    padding: 8px;
  }

  th {
    border-bottom: 1px solid #ddd;
  }

  td {
    border-bottom: 1px solid #ddd;
  }

  tr:hover {
    background-color: #f5f5f5;
  }
</style>
<script>
  let dk = -1
  $(document).ready(function () {

  })
  $(document).on("click", "#btnadd", function () {
    // $(this).attr("data-toggle", "modal");
    // $(this).attr("data-target", "#myform"); 

    let tr = $(this).closest('tr');
    let td = tr.find('td');
    id = tr.attr("tag")


  })
</script>

<body>
<?php
  require_once("./mvc/views/pages/header.php");
?>
  <div class="container">
    <?php
     if(mysqli_num_rows($data['invoice']) != 0){
    ?>
    <header class="headerad">
      <h3>Chi tiết hóa đơn</h3>
      <hr>
    </header>
<?php
   
    foreach($data['invoice'] as $row){
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
    }else{
        echo "<p>Mã hóa đơn không đúng hoặc không tồn tại.";
    }
    if(mysqli_num_rows($data['room']) > 0){
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
        foreach($data['room'] as $row){
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
    if(mysqli_num_rows($data['service']) > 0){
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
        foreach($data['service'] as $row){
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
?>
























  </div>    
    </body>
<script>
  const toggleButton = document.querySelector(".toggle-button");
  const sidebar = document.querySelector(".sidebar");
  const closeSidebar = document.querySelector(".close-sidebar");

  toggleButton.addEventListener("click", () => {
    sidebar.classList.toggle("open");
  });
  closeSidebar.addEventListener("click", () => {
    sidebar.classList.remove("open");
  });
</script>
<script>
     $(document).ready(function() {
        $('#btn1').click(function(){
            let ngay = $('#tk1').val();
            $.ajax({
                    url: 'http://localhost/live/ajax/tkngay.php',
                    type: 'post',
                    data: {
                        ngay,
                    },
                    success: function(data) {
                        if(data != 'error'){
                            $('#kq').html(data)
                        }
                    }
                });
        })
        $('#btn2').click(function(){
            let thang = $('#tk2').val();
            let nam = $('#tk3').val();
            $.ajax({
                    url: 'http://localhost/live/ajax/tkthang.php',
                    type: 'post',
                    data: {
                        thang,
                        nam,
                    },
                    success: function(data) {
                        if(data != 'error'){
                            $('#kq').html(data)
                        }
                    }
                });
        })
        $('#btn3').click(function(){
            let nam = $('#tk4').val();
            $.ajax({
                    url: 'http://localhost/live/ajax/tknam.php',
                    type: 'post',
                    data: {
                        nam,
                    },
                    success: function(data) {
                        if(data != 'error'){
                            $('#kq').html(data)
                        }
                    }
                });
        })
     })
</script>
</html>
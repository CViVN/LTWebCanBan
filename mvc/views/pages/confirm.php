<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/trangchu.css">
  <link rel="stylesheet" href="css/form-search.css">

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
   .navbar *{
    line-height: 50px;;
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
    .logo{
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


    #form-search {
      display: flex;

      justify-content: center;
      align-items: center;
      margin: 20px 0px;
    }

    #form-search form {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      border-radius: 10px;
      border: 2px solid red;
      padding: 10px;
    }

    #form-search .form-group {
      flex-basis: calc(25% - 10px);
      margin: 5px;
    }

    #form-search label {
      display: block;
      margin-bottom: 5px;
    }

    #form-search select,
    #form-search input[type="date"] {
      width: 100%;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }






    .form-title{
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
            text-transform: capitalize;
            color: #444444;
            text-shadow: 1px 1px #ffffff;
            }
        .booking-form {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            }

        /* input fields */
        .booking-form input[type="text"],
        .booking-form textarea {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* submit button */
        .booking-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .booking-form input[type="submit"]:hover {
            background-color: #45a049;
        }

        .booking-form label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .booking-form input[type="tel"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border: none;
            padding: 0;
            margin: 0;
            font-size: 16px;
            height: 40px;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
            box-sizing: border-box;
        }
        .booking-form textarea {
            height: 100px;
        }




  </style>
</head>
<body>
<?php
  require_once("./mvc/views/pages/header.php");

  ?>

  <div class="sidebar">
    <div class="sidebar-header">
      <h3>Menu</h3>
      <button class="close-sidebar">&times;</button>
    </div>
    <ul class="sidebar-menu">
      <?php
      echo "<li> <a class='nav-link' href='http://localhost/live/Home/BookingRoom'>Đặt phòng</a></li>";
      echo "<li> <a class='nav-link' href='#'>Dịch vụ</a></li>";
      echo "<li> <a class='nav-link' href='#' tabindex='-1' aria-disabled='true'>Admin</a></li>";
      echo "<li><a href='http://localhost/live/Booking/searchbooking'>Tìm hóa đơn</a></li>";
      if (isset($_SESSION['phone'])) {

        echo "<li><a href='http://localhost/live/Home/ChangeInfo'>Thông tin cá nhân</a></li>";
        echo "<li><a href='http://localhost/live/Home/ChangePassword'>Đổi mật khẩu</a></li>";
        
        echo "";
      } 

      
      ?>
    </ul>
  </div>
    <div class = "container">
        <div class ="row">
            <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class = "form-title">Thông tin khách hàng</div>
                <div class = "booking-form">
                    <label>Họ tên: </label>
                    <input type = "text" name = "name" id = "hoten" value = "<?php echo $data["name"]?>">
                    <label>Số điện thoại:<label>
                    <input type ="tel" name ="sdt" id = "sdt" value = <?php echo $data["sdt"]?>>
                    <label>Email: </label>
                    <input type = "text" name = "email" id = "email" placeholder = "Ví dụ: vidu@gmail.com" value = "<?php echo $data["email"]?>">
                    <label>Địa chỉ: </label>
                    <input type = "text" name = "diachi" id = "diachi" placeholder = "Ví dụ: Bến Tre" value = "<?php echo $data["address"]?>">
                    <input type = "hidden" name = "total" id = "total" value = "<?php echo $data["total"]?>">
                    <label>Note:</label>
                    <textarea name = "loinhan" id = "loinhan"></textarea>
                    <input type = "submit" class = "btn btn-primary" id = "btnsubmit" name ="confirm" value = "Xác nhận">
                </div>
            </div>
        </div>
    </div> 
</body>
<script>
    $(document).ready(function() {
        $('#btnsubmit').click(function() {
            let hoten = $('#hoten').val();
            let sdt = $('#sdt').val();
            let email = $('#email').val();
            let diachi = $('#diachi').val();
            let loinhan = $('#loinhan').val();
            let tonggia = $('#total').val();
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
            var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            if(hoten == null || hoten == "") {
                alert("Hãy nhập họ tên của bạn!");
            }else if(sdt == null || sdt == ""){
                alert("Hãy nhập số điện thoại của bạn!");
            }else if(!vnf_regex.test(sdt)){
                alert("Số điện thoại bạn không hợp lệ!");
            }else if(email == null || email == ""){
                alert("Hãy nhập email của bạn!");
            }else if(!filter.test(email)){
                alert("Email của bạn không hợp lệ!");
            }else if(diachi == null || diachi == ""){
                alert("Hãy nhập địa chỉ của bạn!");
            }else{
              $.ajax({
                    url: 'http://localhost/live/ajax/ckphone_bkroom.php',
                    type: 'post',
                    data: {
                        sdt,
                    },
                    success: function(data) {
                        if(data == 0){
                            alert("Số điện thoại đã có tài khoản! Vui lòng đăng nhập để đặt phòng!");
                        }else{
                          $.ajax({
                            url: 'http://localhost/live/ajax/bookroom.php',
                            type: 'post',
                            data: {
                                hoten,
                                sdt,
                                email,
                                diachi,
                                loinhan,
                                loinhan,
                                tonggia,
                            },
                            success: function(data) {
                                if(data == 0){
                                    alert("Đặt phòng không thành công! Đã có lỗi xảy ra.");
                                }else{
                                    alert("Đặt phòng thành công! Mã hóa đơn của bạn là" + data);
                                    window.location.href = "http://localhost/live/"; 
                                }
                            }
                        });
                      }
                    }
                });   
            }
        });
    });
</script>
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
</html>
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

    /* table */
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

    img {
      height: 100px;
    }
  </style>
</head>

<body>
<?php
  require_once("./mvc/views/pages/header.php");
?>



  <?php
  // require_once("pages/slide.php");
  // require_once("pages/form-search.php");
  // require_once("pages/introduce.php"); 
  ?>

  <?php
  $cart = array();
  if(isset($_SESSION['cartroom'])){
    $cart = $_SESSION['cartroom'];
  }
  //  if (!isset($cart)){
//       echo "Chưa có sản phẩm được thêm vào";
  $total = 0;
  //  }
//  else{
  ?>
  <div class = "container">
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Price</th>
        <th>Type</th>
        <th>Img</th>
        <th>Check in</th>
        <th>Check out</th>
        <th>Nights</th>
        <th>Total Price</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $total = 0;
      foreach ($cart as $key => $r) {
        $total += $r["days"]*$r["gia"];
        ?>

        <tr>
          <td>
            <?php echo $r["id"] ?>
          </td>
          <td>
            <?php $formattedMoney = number_format($r["gia"]); echo $formattedMoney . "VND"?>
          </td>
          <td>
            <?php echo $r["type"] ?>
          </td>
          <td>
            <img src="<?php echo $r["img"] ?>" alt="">

          </td>
          <td>
            <?php echo $r["ngayden"] ?>
          </td>
          <td>
            <?php echo $r["ngaydi"] ?>
          </td>
          <td>
            <?php echo $r["days"]?></td>
          <td>
            <?php  $formattedMoney = number_format($r["prices"]); echo $formattedMoney ."VND"?>
          </td>
          <td>
            <a href="#" class="deleteroom">Xóa</a>
          </td>
        </tr>

        <?php 
      }
      ?>

    </tbody>

  </table>  

    <div id="total-price">Tổng giá:
    <?php $formattedMoney = number_format($total); echo $formattedMoney . "VND"?>
    </div>
    <button type="button" class="btn btn-secondary"
      onclick="window.location.href= 'http://localhost/live/Home/BookingRoom';">Tiếp tục đặt phòng</button>
    <button type="button" class="btn btn-secondary"
      onclick="window.location.href= 'http://localhost/live/Service/'">Xác nhận</button>
  </div>
  <?php

  ?>
</body>

<script>
  $(document).on("click", ".deleteroom", function () {
    let tr = $(this).closest('tr')
    let td = tr.find('td');
    let id = td[0].innerText;
    let i = {
      'id': id
    }
    fetch('http://localhost/live/Cart/deleteRoomById', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(i) })
      .then(res => res.json())
      .then(json =>{
        if (json.success) {
          let t = $("tbody");
          let total = 0;
          t.find("tr").remove();
          console.log(json.data)
          json.data.forEach(function(r) {
            total += r["prices"];
            t.append(`
            <tr>
              <td>${r["id"]}</td>
              <td>${r["gia"]}</td>
              <td>${r["type"]}</td>
              <td><img src="${r["img"]}" alt=""></td>
              <td>${r["ngayden"]}</td>
              <td>${r["ngaydi"]}</td>
              <td>${r["days"]}</td>
              <td>${r["prices"]}</td>
              <td><a href="#" class="deleteroom">Xóa</a></td>
            </tr>
          `);
          });

          $("#total-price").text("Tổng giá: " + total)
        }
      })
      .catch(err => console.log(err));
  })
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
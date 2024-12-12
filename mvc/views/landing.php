<?php $page = $_SESSION["page"];
?>
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
      font-family: courier, arial, helvetica;
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


    .page {
      align-items: center;
      text-align: center;
    }

    .pagination {

      display: inline-block;

    }

    .pagination a {

      font-weight: bold;

      font-size: 10px;

      color: black;

      float: left;

      padding: 8px 16px;

      text-decoration: none;

      border: 1px solid black;

    }

    .pagination a.active {

      background-color: gray;

    }

    .pagination a:hover:not(.active) {

      background-color: skyblue;

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
  require_once "./mvc/views/pages/" . $data["Page"] . ".php";
  ?>





</body>
<script>

  $(document).ready(function () {


    function search() {
      let giamin
      let giamax
      if ($('#price').val() == 1) {
        giamin = 0
        giamax = 500000

      }
      else if ($('#price').val() == 2) {
        giamin = 500000
        giamax = 1000000

      }
      else if ($('#price').val() == 3) {
        giamin = 1000000
        giamax = 2000000

      } else {
        giamin = 2000000
        giamax = 10000000
      }
      let data = {
        giamin: giamin,
        giamax: giamax,
        ngayden: $('#ngayden').val(),
        ngaydi: $('#ngaydi').val(),
        type: $('#typeroom').val(),
        page: <?php echo $page ?>
      }
      fetch('http://localhost/live/Home/search', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(data) })
        .then(res => res.json())
        .then(json => {
          if (json.success) {

            let tr = $('#show-search').find('.col').remove();
            let di = $(".pagination").find('a').remove();
            json.data.forEach(ele => {
              let tien=Number(ele['gia'])
              var formattedMoney = tien.toLocaleString('en-US');   
              $('#show-search').append(`
              <div class='col'>
                <div class='card' style='width: 18rem;'>
                <img src='${ele['img']}' class='card-img-top' alt='Phong Khach San'>
                <div class='card-body'>
                  <h5 class='card-title'>${ele['id']}</h5>
                  <p class ='card-text'> Giá tiền ${formattedMoney} VND</p>
                  <p class='card-text'>Phòng ${ele['type']} giường.</p>
                  <a href='http://localhost/live/Cart/addCartRoom/${ele['id']}' class='btn btn-primary' name="btnbooking" >Đặt phòng</a>
                </div>
              </div>
              </div>
              `)
            })
            let page = <?php echo $page ?>;
            let total_pages = json.total / 6;
            let pagLink = ""
            const urlPrefix = "http://localhost/live/Home/showResultSearch?page=";
            const pagination = document.querySelector(".pagination");
            if (page >= 2) {
              pagLink += `<a href="${urlPrefix}${page - 1}">Prev</a>`;
            }

            for (let i = 1; i < total_pages; i++) {
              if (i === page) {
                pagLink += `<a class="active" href="${urlPrefix}${i}">${i}</a>`;
              } else {
                pagLink += `<a href="${urlPrefix}${i}">${i}</a>`;
              }
            }

            if (page < total_pages) {
              pagLink += `<a href="${urlPrefix}${page + 1}">Next</a>`;
            }

            pagination.innerHTML = pagLink;



          }
        })
        .catch(err => console.log(err));


    }
    search();

    $(document).on("click", "#btn-search", function () {

      let ngayden = $("#ngayden").val();
      let ngaydi = $("#ngaydi").val();
      if (ngayden == "" || ngaydi == "") {
        alert("Hãy chọn ngày đến và ngày đi");
        return;
      }
      let type = $("#typeroom").val();
      let gia = $("#price").val();

      let i = {
        ngayden: ngayden,
        ngaydi: ngaydi,
        type: type,
        gia: gia,

      }
      fetch('http://localhost/live/Home/saveInforSearch', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(i) })
        .then(res => res.json())
        .then(json => {
          if (json.success) {

          }
        })
        .catch(err => console.log(err));
      window.location.href = "http://localhost/live/Home/showResultSearch";


    })
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
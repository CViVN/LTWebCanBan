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

    .logo {}

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
      height: 65px;
      background: linear-gradient(145deg, rgb(184, 6, 6), rgb(229, 14, 154));
      align-items: center;
      position: sticky;
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
  </style>
</head>

<body>
  <nav class="navbar">
    <div class="bar">
      <button class="hamburger">
        <div class="bar">

          <a class="navbar-brand" href="#">Đặt phòng</a>
         
        </div>
      </button>
    </div>
    <div class="logo">Hotel logo</div>
    <div class="login">
      <a href="http://localhost/hotel/Login/Show/signin">Đăng nhập</a>
      <a href="http://localhost/hotel/Login/Show/signup">Đăng ký</a>
    </div>
  </nav>

  <!-- 
  slide
 -->
  <?php
  require_once("slide.php");
  require_once("form-search.php");

  ?>




</body>
<script>

  $(document).ready(function () {
    function loadAllRoom() {

      fetch('http://localhost/live/Home/loadAllRoom', { method: 'POST', headers: { 'Content-Type': 'application/json' } })
        .then(res => res.json())
        .then(json => {
          // console.log(json)
          if (json.success) {
            let tr = $('#show-search').find('.col').remove();

            json.data.forEach(ele => {

              // let td=$('#show-search').remove('div')
              $('#show-search').append(`

    <div class='col'>
    <div class='card' style='width: 18rem;'>
    <img src='${ele['img']}' class='card-img-top' alt='Phong Khach San'>
    <div class='card-body'>
      <h5 class='card-title'>${ele['id']}</h5>
      <p class='card-text'>Phòng ${ele['type']} giường.</p>
      <a href='#' class='btn btn-primary'>Đặt phòng</a>
    </div>
  </div>
  </div>

                    `)

            })
          }
        })
        .catch(err => console.log(err));
    }
    loadAllRoom()


    $(document).on("click", "#btn", function () {

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
      }
      fetch('http://localhost/live/Home/search', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(data) })
        .then(res => res.json())
        .then(json => {
          if (json.success) {

            
            $("#number").text("Số lượng phòng: "+ json.number)

            let tr = $('#show-search').find('.col').remove();

            json.data.forEach(ele => {

              // let td=$('#show-search').remove('div')
              $('#show-search').append(`

    <div class='col'>
    <div class='card' style='width: 18rem;'>
    <img src='${ele['img']}' class='card-img-top' alt='Phong Khach San'>
    <div class='card-body'>
      <h5 class='card-title'>${ele['id']}</h5>
      <p class='card-text'>Phòng ${ele['type']} giường.</p>
      <a href='#' class='btn btn-primary'>Đặt phòng</a>
    </div>
  </div>
  </div>

                    `)

            })
          }
        })
        .catch(err => console.log(err));
    })
  })
</script>

</html>
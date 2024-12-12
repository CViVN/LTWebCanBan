<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <title>Login</title>
</head>

<body>
  <div action="http://localhost/hotel/Login/signIn" method="POST">
    <div class="container">
      <h1>Login</h1>
      <div class="form-control">
        <input id="phone" name="phone" type="text" placeholder="Phone" />
        <span></span>
        <small></small>
      </div>
      <div class="form-control">
        <input id="password" name="password" type="password" placeholder="Password" />
        <span></span>
        <small></small>
      </div>
      <input onclick="check()" name="btnSignUp" class="btn-submit" value="Sign in" />
      <div class="signup-link">
        Not a member?
        <a href="http://localhost/live/Login/Show/signup">Sign up</a>
      </div>
    </div>
  </form>
</body>
<style>
  @import url("https://fonts.googleapis.com/css2?family=Shantell+Sans:ital,wght@1,300&display=swap");
</style>
<script>
  function check() {
  var phone = $('#phone').val();
  var password = $('#password').val();
  if(phone == "" || phone == null){
    alert("Hãy nhập tên đăng nhập của bạn");
  }else if(password == "" || password == null){
    alert("Hãy nhập mật khẩu của bạn");
  }else{
    if(phone=="ADMIN" && password=="123456"){
    $.ajax({
    url: 'http://localhost/live/ajax/admin.php',
    type: 'POST',
    data: {},
    success: function(response) {
      if (response == 'success') {
        window.location.href = 'http://localhost/live/Home/Show'; 
      } else {
        alert('Sai tên đăng nhập hoặc mật khẩu');
      }
    }
  });
  }else{
    $.ajax({
      url: 'http://localhost/live/ajax/signin.php',
      type: 'POST',
      data: {phone: phone, password: password},
      success: function(response) {
        if (response == 'success') {
          window.location.href = 'http://localhost/live/Home/Show'; 
        } else {
          alert('Sai tên đăng nhập hoặc mật khẩu');
        }
      }
  });
}
}
}
</script>
<style>
  * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: "Shantell Sans", cursive;
  }

  body {
    height: 100vh;
    background: linear-gradient(145deg, rgb(184, 6, 6), rgb(229, 14, 154));
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .container {
    width: 400px;
    border: none;
    border-radius: 10px;
    background: white;
    padding: 40px;
  }

  .container h1 {
    text-align: center;
  }

  .form-control {
    width: 100%;
    position: relative;
  }

  .form-control input {
    width: 100%;
    height: 40px;
    font-size: 16px;
    border: none;
    outline: none;
    border-bottom: 2.5px solid #adadad;
  }

  .form-control span {
    position: absolute;
    border-bottom: 3px solid rgb(60, 60, 139);
    left: 0;
    top: 38px;
    width: 0;
    transition: 0.3s;
  }

  .form-control input:focus~span {
    width: 100%;
  }

  .form-control.error small {
    color: red;
  }

  .form-control.error input {
    border-bottom: 2px solid red;
  }

  .btn-submit {
    width: 100%;
    height: 50px;
    border-radius: 10px;
    border: none;
    outline: none;
    margin: 25px 0;
    color: aliceblue;
    text-align: center;
    font-weight: bold;
    background: linear-gradient(145deg, rgb(184, 6, 6), rgb(229, 14, 154));
  }
  .btn-submit:hover {
    background: linear-gradient(145deg, rgb(96, 12, 12), rgb(146, 33, 106));
    cursor: pointer;
  }

  .signup-link {
    text-decoration: none;
    text-align: center;
  }
</style>
</html>
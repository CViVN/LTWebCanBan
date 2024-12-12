<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" />
  <title>Sign up</title>
</head>

<body>
  <div class="container">
    <div class="form">
      <h1>Create Account</h1>
      <div class="form-control">
        <input id="name" type="text" name="name" placeholder="Name" />
        <span></span>
        <small></small>
      </div>
      <div class="form-control">
        <input id="phone" type="text" name="phone" placeholder="Phone" />
        <div id = "checkphone"></div>
        <span></span>
        <small></small>
      </div>
      <div class="form-control">
        <input id="email" type="email" name="email" placeholder="Email" />
        <span></span>
        <small></small>
      </div>
      <div class="form-control">
        <input id="address" type="address" name="address" placeholder="Address"/>
        <span></span>
        <small></small>
      </div>
      <div class="form-control">
        <input id="password" type="password" name="password" placeholder="Password" />
        <span></span>
        <small></small>
      </div>
      <div class="form-control">
        <input id="confirm-password" type="password" placeholder="Confirm Password" />
        <span></span>
        <small></small>
      </div>
      <button type="submit" id = "btnSignUp" class="btn-submit" name="btnSignUp">Sign up</button>
      <div class="signup-link">
        Already have an account? <a href="http://localhost/live/Login/Show/signin">Sign in</a>
      </div>
</div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
  $(document).ready(function(){
        $("#phone").keyup(function(){
                  let phone = $(this).val();
                  $('#checkphone').html(phone);
                  $.ajax({
                        url: 'http://localhost/live/ajax/checkphone.php',
                        type: 'post',
                        data: {
                            phone,
                        },
                        success: function(response) {
                            if (response == 'false') {
                                $('#checkphone').html('<p style = "color:red">Số điện thoại đã được sử dụng!</p>');
                            }else{
                                $('#checkphone').html('<p style = "color:blue">Số điện thoại chưa được sử dụng!</p>');
                            }
                        }
                        });
        });
        $('#btnSignUp').click(function(){
            let name = $('#name').val();
            let phone = $('#phone').val();
            let email = $('#email').val();
            let address = $('#address').val();
            let password = $('#password').val();
            let confirmPassword = $('#confirm-password').val();
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
            var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            // Kiểm tra password và confirmPassword có giống nhau không
            if(name == null || name == ""){
                alert('Hãy nhập tên hiện tại!');
            }else if(phone == null || phone == ""){
                alert('Hãy nhập số điện thoại của bạn!');
            }else if(!vnf_regex.test(phone)){
                alert("Số điện thoại bạn không hợp lệ!");
            }else if(email == null || email == ""){
                alert('Hãy nhập email của bạn!');
            }else if(!filter.test(email)){
                alert("Email của bạn không hợp lệ!");
            }else if(address == null || address == ""){
                alert('Hãy nhập địa chỉ của bạn!');
            }else if(password == null || password == ""){
                alert('Hãy nhập mật khẩu của bạn!');
            }
            else if(confirmPassword == null || confirmPassword == ""){
                alert('Hãy nhập lại mật khẩu!');
            }
            else if(confirmPassword != password){
                alert('Mật khẩu nhập lại không giống với mật khẩu!');
            }else{
            // Gọi ajax để kiểm tra mật khẩu hiện tại từ database
                $.ajax({
                    url: 'http://localhost/live/ajax/checkphone.php',
                    type: 'post',
                    data: {
                        phone,
                    },
                    success: function(response) {
                        if (response == 'false') {
                            alert('Số điện thoại đã được sử dụng');
                        } else {
                            $.ajax({
                            url: 'http://localhost/live/ajax/signup.php',
                            type: 'post',
                            data: {
                                name,
                                phone,
                                email,
                                address,
                                password,
                            },
                            success: function(response) {
                              if(response=='success'){
                                alert('Đăng kí thành công!');
                                window.location.href = "http://localhost/live/Login/Show/signin";
                              }else{
                                alert('Đăng kí thất bại!');
                              }
                            }
                        });
                        }
                    }
                  });  
            } 
          })
        });
</script>
</body>
<style>
  @import url("https://fonts.googleapis.com/css2?family=Shantell+Sans:ital,wght@1,300&display=swap");
</style>
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
    font-weight: bold;
    background: linear-gradient(145deg, rgb(184, 6, 6), rgb(229, 14, 154));
  }

  .btn-submit:hover {
    background: linear-gradient(145deg, rgb(96, 12, 12), rgb(146, 33, 106));
  }

  .signup-link {
    text-decoration: none;
    text-align: center;
  }
</style>

</html>
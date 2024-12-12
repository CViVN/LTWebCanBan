<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Change Password</title>
</head>

<body>
<div class="mainDiv">
        <div class="cardStyle">
            <form action="" method="post">

                <h2 class="formTitle">
                    Thay đổi mật khẩu
                </h2>

                <div class="inputDiv">
                    <label class="inputLabel" for="currentPassword">Mật khẩu hiện tại</label>
                    <input type="password" id="currentPassword" name="currentPassword">
                </div>

                <div class="inputDiv">
                    <label class="inputLabel" for="password">Mật khẩu mới</label>
                    <input type="password" id="password" name="password">
                </div>

                <div class="inputDiv">
                    <label class="inputLabel" for="confirmPassword">Nhập lại mật khẩu mới</label>
                    <input type="password" id="confirmPassword" name="confirmPassword">
                </div>

                <div class="buttonWrapper">
                    <button type="submit" id="submitButton" class="submitButton pure-button pure-button-primary">
                        <span>Đổi mật khẩu</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

<style>
    .mainDiv {
        display: flex;
        min-height: 100%;
        align-items: center;
        justify-content: center;
        background-color: #f9f9f9;
        font-family: 'Open Sans', sans-serif;
    }

    .cardStyle {
        width: 500px;
        border-color: white;
        background: #fff;
        padding: 36px 0;
        border-radius: 4px;
        margin: 30px 0;
        box-shadow: 0px 0 2px 0 rgba(0, 0, 0, 0.25);
    }

    #signupLogo {
        max-height: 100px;
        margin: auto;
        display: flex;
        flex-direction: column;
    }

    .formTitle {
        font-weight: 600;
        margin-top: 20px;
        color: #2F2D3B;
        text-align: center;
    }

    .inputLabel {
        font-size: 12px;
        color: #555;
        margin-bottom: 6px;
        margin-top: 24px;
    }

    .inputDiv {
        width: 70%;
        display: flex;
        flex-direction: column;
        margin: auto;
    }

    input {
        height: 40px;
        font-size: 16px;
        border-radius: 4px;
        border: none;
        border: solid 1px #ccc;
        padding: 0 11px;
    }

    input:disabled {
        cursor: not-allowed;
        border: solid 1px #eee;
    }

    .buttonWrapper {
        margin-top: 40px;
    }

    .submitButton {
        width: 70%;
        height: 40px;
        margin: auto;
        display: block;
        color: #fff;
        background-color: #065492;
        border-color: #065492;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.12);
        box-shadow: 0 2px 0 rgba(0, 0, 0, 0.035);
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
    }

    .submitButton:disabled,
    button[disabled] {
        border: 1px solid #cccccc;
        background-color: #cccccc;
        color: #666666;
    }
</style>

<script>
    $(document).ready(function() {
        $('#submitButton').click(function(){
            let currentPassword = $('#currentPassword').val();
            let password = $('#password').val();
            let confirmPassword = $('#confirmPassword').val();
            // Kiểm tra password và confirmPassword có giống nhau không
            if(currentPassword == null || currentPassword == ""){
                alert('Hãy nhập mật khẩu hiện tại!');
            }
            else if(password == null || password == ""){
                alert('Hãy nhập mật khẩu mới!');
            }
            else if(confirmPassword == null || confirmPassword == ""){
                alert('Hãy nhập lại mật khẩu mới!');
            }else if(password != confirmPassword) {
                alert('Mật khẩu mới và xác nhận mật khẩu không khớp.');
            }else{
                let phone = "<?php echo $_SESSION['phone']?>";
            // Gọi ajax để kiểm tra mật khẩu hiện tại từ database
                $.ajax({
                    url: 'http://localhost/live/ajax/check_password.php',
                    type: 'post',
                    data: {
                        currentPassword,
                        phone,
                    },
                    success: function(response) {
                        if (response == 'false') {
                            alert('Mật khẩu hiện tại không đúng.');
                        } else {
                            $.ajax({
                            url: 'http://localhost/live/ajax/update_password.php',
                            type: 'post',
                            data: {
                                password,
                                phone,
                            },
                            success: function(response) {
                                alert('Thay đổi mật khẩu thành công.');
                                window.location.href = "http://localhost/live/Home/Show";
                            }
                        });
                        }
                    }
                });
            }
        });
    });
</script>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Thông tin khách hàng</title>
</head>

<?php
// Thiết lập kết nối đến database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy thông tin người dùng từ bảng users
$phone = $_SESSION['phone'];
$sql = "SELECT * FROM clients WHERE phone='$phone'";
$result = $conn->query($sql);

// Điền thông tin người dùng vào các ô input trong form
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row["name"];
    $phone = $row["Phone"];
    $email = $row["email"];
    $address = $row["address"];
}
?>

<body>
    <div class="mainDiv">
        <div class="cardStyle">
            <form action="" method="post">

                <h2 class="formTitle">
                    Thông tin khách hàng
                </h2>

                <div class="inputDiv">
                    <label class="inputLabel" for="name">Họ và tên</label>
                    <input type="text" id="name" name="name" value="<?php echo $name ?>" required>
                </div>

                <div class="inputDiv">
                    <label class="inputLabel" for="phone">Số điện thoại</label>
                    <input type="text" id="phone" name="phone" value="<?php echo $phone ?>" disabled required>
                </div>

                <div class="inputDiv" style="display: flex">
                <label class="inputLabel" for="email">Email</label>
                    <input type="text" id="email" name="email" value="<?php echo $email ?>" required>
                </div>

                <div class="inputDiv">
                    <label class="inputLabel" for="email">Địa chỉ</label>
                    <input type="email" id="address" name="address" value="<?php echo $address ?>" required>
                </div>
                <div class="buttonWrapper">
                    <button type="submit" name="submitButton" id="submitButton" class="submitButton pure-button pure-button-primary">
                        <span>Cập nhật thông tin</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

<script>
    $(document).ready(function () {
        $('#submitButton').click(function() {
            let phone= "<?php echo $_SESSION['phone']; ?>";
            let name = $('#name').val();
            let email = $('#email').val();
            let address =  $('#address').val();
            
            $.ajax({
                url: 'http://localhost/live/ajax/update_info.php',
                type: 'POST',
                data: {
                    phone,
                    name,
                    email,
                    address,
                },
                success: function (response) {
                    alert('Cập nhật thông tin thành công.');
                    location.reload();
                }
            });
        });
    });
</script>
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
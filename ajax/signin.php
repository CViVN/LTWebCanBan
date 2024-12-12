<?php
session_start();
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "database";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM clients WHERE phone='$phone' AND password='$password' and status = 1";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['phone'] = $phone;
        echo 'success';
        exit();
    } else {
        echo 'error';
        exit();
    }
?>
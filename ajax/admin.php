<?php
session_start();
$_SESSION['admin'] = "1";
echo 'success';
exit();
?>
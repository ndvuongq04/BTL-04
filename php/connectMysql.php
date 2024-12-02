<?php
$server = 'localhost';
$user = 'root';
$pass = '123456';
$database = 'BTL_04';
$con = new mysqLi($server, $user, $pass, $database);

if ($con) {
    mysqli_query($con, "SET NAMES 'utf8' ");
    // echo 'đã kết nối thành công';
} else {
    echo 'kết nối không thành công';
}
echo 'hello from connectMysql.php <br>';

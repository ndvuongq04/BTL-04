<?php
function checkSession()
{
    session_start();
    // ktra dang nhap hay chua
    if (!isset($_SESSION["tenDangNhap"])) {
        // neu chua -> cho vè trang login
        header('location:dangNhap.php');
    }
}

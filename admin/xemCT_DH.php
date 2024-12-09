<?php
// ktra người dùng đăng nhập hay chưa
require('../php/checkSession.php');
checkSession();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <link rel="stylesheet" href="css/view.css">
</head>

<body>
    <!-- header -->
    <?php
    require('layout/header.php');
    ?>
    <!-- code -->
    <div class="view">
        <div class="title">
            <h2 style="font-size:23px">Quản lý đơn hàng</h2>
        </div>
        <div class="main">
            <form action="">
                <table>
                    <tr>
                        <th colspan="2" style="text-align: center;">Chi tiết đơn hàng</th>
                    </tr>
                    <tr>
                        <th>ID đơn hàng</th>
                        <td>1</td>
                    </tr>
                    <tr>
                        <th>ID tài khoản</th>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>Địa chỉ</th>
                        <td> 347 Cổ Nhuế</td>
                    </tr>
                    <tr>
                        <th>Thành tiền</th>
                        <td>100.000</td>
                    </tr>
                    <tr>
                        <th>Trạng thái đơn hàng</th>
                        <td>Đang vận chuyển</td>
                    </tr>
                    <tr>
                        <th>Phương thức thanh toán</th>
                        <td>Thanh toán khi nhận hàng</td>
                    </tr>
                </table>
                <div class="submit">
                    <a href="quanLyDH.php" style="background-color: #1C8552; color : white;">Trở lại</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
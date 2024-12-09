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
    <title>Cập nhật đơn hàng</title>
    <link rel="stylesheet" href="css/update.css">
</head>

<body>
    <!-- header -->
    <?php
    require('layout/header.php');
    ?>
    <!-- code -->
    <div class="update">
        <div class="title">
            <h2>Cập nhật đơn hàng</h2>
        </div>
        <div class="main">
            <form action="">
                <div class="gr">
                    <div class="infor">
                        <label for="address">Địa chỉ</label>
                        <input type="text" id="address" placeholder="" style="opacity: 0.6;" required>
                    </div>
                    <div class="infor">
                        <label for="price">Tổng tiền</label>
                        <input type="number" id="price" placeholder="" style="opacity: 0.6;" required>
                    </div>
                </div>
                <div class="gr">
                    <div class="infor">
                        <label for="mode"> Trạng thái</label>
                        <select id="mode" name="mode" style="opacity: 0.6;" required>
                            <option value="Đang chờ duyệt" selected>Đang chờ duyệt</option>
                            <option value="Đang vận chuyển">Đang vận chuyển</option>
                            <option value="Đã nhận hàng">Đã nhận hàng</option>
                        </select>
                    </div>
                    <div class="infor">
                        <label for="payment"> Phương thức thanh toán</label>
                        <select id="payment" name="payment" style="opacity: 0.6;" required>
                            <option value="cod" selected>Thanh toán khi nhận hàng</option>
                            <option value="banking">Thanh toán qua Internet Banking</option>
                            <option value="card">Thanh toán bằng thẻ</option>
                        </select>
                    </div>
                </div>
                <div class="submit">
                    <a href="quanLyDH.php" style="background-color: #1C8552; color : white;">Trở lại</a>
                    <a href="" style="background-color: #FBBE00; color : black;">Cập nhật</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
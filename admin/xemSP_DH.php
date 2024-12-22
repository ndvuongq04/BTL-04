<!-- hiển thị tên và ảnh sp 
    hiển thị số lượng sp mà người dùng mua /1 sp
 -->


<?php
// ktra người dùng đăng nhập hay chưa
require('../php/checkSession.php');
checkSession(2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng</title>
    <link rel="stylesheet" href="css/quanLy.css">
</head>

<body>
    <!-- header -->
    <?php
    // require('layout/header.php');
    require('../php/admin/orderDetail.php');
    require('../php/admin/getObjectById.php');

    $idDonHang = $_GET['id'];
    $ctDonHang = getOrderDetailByOrder($con, $idDonHang);


    ?>
    <!-- end header -->
    <!-- <h1>Hello from file quanLyDH.php</h1> -->

    <!-- Nội dung code ở đây -->
    <div class="quanLyDH">
        <div class="title">
            <h2>Bảng đơn hàng</h2>

        </div>


        <table>
            <tr>
                <th>Id đơn hàng </th>
                <th>Id sản phẩm </th>
                <th>Tên sản phẩm </th>
                <th>Số lượng </th>
                <th>Giá sản phẩm </th>
                <th>Ảnh sản phẩm </th>

            </tr>
            <?php
            foreach ($ctDonHang as $cTDH) {
                $sp = getObjectById($con, 'san_pham', $cTDH['id_san_pham']);
            ?>
                <tr>
                    <td><?php echo $cTDH['id_don_hang'] ?></td>
                    <td><?php echo $cTDH['id_san_pham'] ?></td>
                    <td><?php echo $sp['ten'] ?></td>
                    <td><?php echo $cTDH['so_luong'] ?></td>
                    <td><?php echo $cTDH['gia'] ?> đ</td>
                    <td>
                        <img src="img/<?php echo $sp['anh'] ?>" alt="" width="200px" height="200px">
                    </td>
                </tr>
            <?php

            } ?>


        </table>
        <div class="submit">
            <a href="quanLyDH.php" style="background-color: #1C8552; color : white;">Trở lại</a>
        </div>
    </div>
    <!-- footer -->


    <!-- end footer -->
</body>

</html>
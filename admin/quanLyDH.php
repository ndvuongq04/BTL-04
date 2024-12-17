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
    <title>Quản lý đơn hàng</title>
    <link rel="stylesheet" href="css/quanLy.css">
</head>

<body>
    <!-- header -->
    <?php
    require('layout/header.php');
    require('../php/admin/getAllObject.php');

    $donHang = getAll_object($con, 'don_hang');

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
                <th>Id</th>
                <th>Id người dùng</th>
                <th>Tổng tiền</th>
                <th>Phương thức thanh toán </th>
                <th>Trạng thái</th>
                <th>Hoạt động</th>
            </tr>
            <?php
            foreach ($donHang as $dH) {
            ?>
                <tr>
                    <td><?php echo $dH['id'] ?></td>
                    <td><?php echo $dH['id_nguoi_dung'] ?></td>
                    <td><?php echo $dH['tong_tien'] ?></td>
                    <td>Khi nhận hàng</td>
                    <td><?php echo $dH['trang_thai'] ?></td>
                    <td>
                        <a href="xemCT_DH.php?id=<?php echo $dH['id'] ?>" style=" background-color: #1C8552; color : white;">Xem chi tiết</a>
                        <a href="capNhat_DH.php?id=<?php echo $dH['id'] ?>" style=" background-color: #FBBE00; color : black;">Cập nhật</a>
                        <a href="xemSP_DH.php?id=<?php echo $dH['id'] ?>" style=" background-color: #1C8CD1; color : white;">Xem sản phẩm</a>

                    </td>
                </tr>
            <?php
            } ?>

        </table>
    </div>
    <!-- footer -->


    <!-- end footer -->
</body>

</html>
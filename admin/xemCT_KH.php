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
    <title>Chi tiết khách hàng</title>
    <link rel="stylesheet" href="css/view.css">
</head>

<body>
    <!-- header -->
    <?php
    require('layout/header.php');
    require('../php/admin/getObjectById.php');
    require('../php/admin/getRoleById.php');

    $idCurrent = $_GET['id']; // lấy id từ link url 

    // gọi hàm của getObjectById.php
    $User = getObjectById($con, 'nguoi_dung', $idCurrent);
    // gọi hàm của getRoleById.php
    $Role = getRoleById($con, $User['id_vai_tro']);
    ?>
    <!-- code -->
    <div class="view">
        <div class="title">
            <h2 style="font-size:23px">Quản lý tài khoản</h2>
        </div>
        <div class="main">
            <form action="">
                <table>
                    <tr>
                        <th colspan="2" style="text-align: center;">Chi tiết khách hàng id = <?php echo $_GET['id'] ?></th>
                    </tr>
                    <tr>
                        <th>ID khách hàng</th>
                        <td><?php echo $User['id'] ?></td>
                    </tr>
                    <tr>
                        <th>Họ và tên</th>
                        <td><?php echo $User['ho_ten'] ?></td>
                    </tr>
                    <tr>
                        <th>Giới tính</th>
                        <td><?php echo $User['gioi_tinh'] ?></td>
                    </tr>
                    <tr>
                        <th>Số điện thoại</th>
                        <td><?php echo $User['so_dien_thoai'] ?></td>
                    </tr>
                    <tr>
                        <th>Địa chỉ</th>
                        <td><?php echo $User['dia_chi'] ?></td>
                    </tr>
                    <tr>
                        <th>Tên đăng nhập</th>
                        <td><?php echo $User['ten_dang_nhap'] ?></td>
                    </tr>
                    <tr>
                        <th>Vai trò</th>
                        <td><?php echo $Role['ten'] ?></td>
                    </tr>
                </table>
                <div class="submit">
                    <a href="quanLyKH.php" style="background-color: #1C8552; color : white;">Trở lại</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
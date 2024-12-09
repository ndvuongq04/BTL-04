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
    <title>Quản lý người dùng</title>
    <link rel="stylesheet" href="css/quanLy.css">
</head>

<body>
    <!-- header -->
    <?php
    require('layout/header.php');
    require('../php/admin/getAllObject.php');
    // hàm của admin/getAll_object.php
    $users = getAll_object($con, 'nguoi_dung');
    ?>
    <!-- end header -->
    <!-- <h1>Hello from file quanLyKH.php</h1> -->
    <!-- Nội dung code ở đây -->
    <div class="quanLyDH">
        <div class="title">
            <h2>Bảng người dùng</h2>
            <a href="dangKy.php" class="create">Tạo mới KH</a>
        </div>


        <table>
            <tr>
                <th>Id</th>
                <th>Họ và tên</th>
                <th>Tên đăng nhập</th>
                <th>Số điện thoại</th>
                <th>Hoạt động</th>
            </tr>
            <?php
            foreach ($users as $user) {

            ?>
                <tr>
                    <td><?php echo $user['id'] ?></td>
                    <td><?php echo $user['ho_ten'] ?></td>
                    <td><?php echo $user['ten_dang_nhap'] ?></td>
                    <td><?php echo $user['so_dien_thoai'] ?></td>
                    <td>
                        <a href="xemCT_KH.php?id=<?php echo $user['id'] ?>"" style=" background-color: #1C8552; color : white;">Xem chi tiết</a>
                        <a href="capNhat_KH.php?id=<?php echo $user['id'] ?>"" style=" background-color: #FBBE00; color : black;">Cập nhật</a>
                        <a href="xoa_KH.php?id=<?php echo $user['id'] ?>" style=" background-color: #DC3640; color : white;">Xóa</a>
                    </td>
                </tr>
            <?php
            }
            ?>


        </table>
    </div>
    <!-- footer -->

    <!-- end footer -->
</body>

</html>
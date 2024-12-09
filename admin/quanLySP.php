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
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="css/quanLy.css">
</head>

<body>
    <!-- header -->
    <?php
    require('layout/header.php');
    require('../php/admin/getAllObject.php');
    // hàm của admin/getAll_object.php
    $products = getAll_object($con, 'san_pham');
    ?>
    <!-- end header -->
    <!-- <h1>Hello from file quanLySP.php</h1> -->
    <!-- Nội dung code ở đây -->
    <div class="quanLyDH">
        <div class="title">
            <h2>Bảng sản phẩm</h2>
            <a href="taoMoi_SP.php" class="create">Tạo mới SP</a>
        </div>


        <table>
            <tr>
                <th>Id</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Loại</th>
                <th>Hoạt động</th>
            </tr>
            <?php
            foreach ($products as $product) {

            ?>
                <tr>
                    <td><?php echo $product['id'] ?></td>
                    <td><?php echo $product['ten'] ?></td>
                    <td><?php echo $product['so_luong'] ?></td>
                    <td><?php echo $product['loai'] ?></td>
                    <td>
                        <a href="xemCT_SP.php?id=<?php echo $product['id'] ?>" style=" background-color: #1C8552; color : white;">Xem chi tiết</a>
                        <a href="capNhat_SP.php?id=<?php echo $product['id'] ?>" style=" background-color: #FBBE00; color : black;">Cập nhật</a>
                        <a href="xoa_SP.php?id=<?php echo $product['id'] ?>" style=" background-color: #DC3640; color : white;">Xóa</a>
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
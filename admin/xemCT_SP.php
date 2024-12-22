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
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="css/view.css">
</head>

<body>
    <!-- header -->
    <?php
    require('layout/header.php');
    require('../php/admin/getObjectById.php');
    $idProduct = $_GET['id'];
    $product = getObjectById($con, 'san_pham', $idProduct);
    ?>
    <!-- code -->
    <div class="view">
        <div class="title">
            <h2 style="font-size:23px">Quản lý sản phẩm</h2>
        </div>
        <div class="main">
            <form action="">
                <table>
                    <tr>
                        <th colspan="2" style="text-align: center;">Chi tiết sản phẩm</th>
                    </tr>
                    <tr>
                        <th>ID sản phẩm</th>
                        <td><?php echo $product['id'] ?></td>
                    </tr>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <td><?php echo $product['ten'] ?></td>
                    </tr>
                    <tr>
                        <th>Giá</th>
                        <td><?php echo $product['gia'] ?></td>
                    </tr>
                    <tr>
                        <th>Số lượng</th>
                        <td><?php echo $product['so_luong'] ?></td>
                    </tr>
                    <tr>
                        <th>Phân loại</th>
                        <td><?php echo $product['loai'] ?></td>
                    </tr>
                    <tr>
                        <th>Mô tả sản phẩm</th>
                        <td><?php echo $product['mo_ta'] ?></td>
                    </tr>
                    <tr>
                        <th>Ảnh sản phẩm</th>
                        <td><img src="img/<?php echo $product['anh'] ?>" width="300px" height="300px"></td>
                    </tr>

                </table>
                <div class="submit">
                    <a href="quanLySP.php" style="background-color: #1C8552; color : white;">Trở lại</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
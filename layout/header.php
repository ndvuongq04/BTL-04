<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Trang chủ</title>
</head>

<body>
    <div class="main">
        <!-- header -->
        <div class="header">
            <!-- Begin nav -->
            <ul class="nav">
                <li>
                    <h1 class="hidden">
                        <a class="logo-name" href="index.php" title="The Coffee House">The Coffee House</a>
                    </h1>
                </li>
                <li><a href="caPhe.php">Cà Phê</a></li>
                <li><a href="tra.php">Trà</a></li>
                <li><a href="nuocEpTraiCay.php">Nước ép trái cây</a></li>
                <!-- file nuocCoGa.php -->
                <li><a href="nuocCoGa.php">Đồ uống có ga</a></li>
                <li><a href="khac.php">Khác</a></li>

                <!-- ktra nguoi dungf dang nhap hay chua -->
                <?php
                /*
                    - ton tai bien ten dang nhap hay chua
                        -> roi -> da dang nhap >< chua dang nhap
                */
                session_start();
                if (!isset($_SESSION['tenDangNhap'])) {

                ?>
                    <li class="left"><a href="dangNhap.php">Đăng nhập</a></li>
                    <li class="left"><a href="dangKy.php">Đăng ký</a></li>
                <?php
                } else { ?>
                    <li class="left"><a href="gioHang.php">Giỏ hàng</a></li>
                    <li class="left"><a href="donHang.php">Đơn hàng </a></li>
                    <li class="left"><a href="php/client/logoutUser.php">Đăng xuất</a></li>
                <?php
                }
                ?>

            </ul>
            <!-- End nav -->
        </div>
        <!-- end header -->
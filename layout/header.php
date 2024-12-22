<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?v=1.1">
    <title>Trang chủ</title>
</head>

<body>
    <div class="main">
        <!-- header -->
        <div class="trang_chu">
            <div class="tieu_de">
                <!-- Begin nav -->
                <ul class="nav">
                    <li>
                        <h1>
                            <a class="logo" href="index.php" title="The Coffee House">TCH</a>
                        </h1>
                    </li>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li>
                        <a href="./caPhe.php">Cà Phê</a>
                    </li>
                    <li>
                        <a href="./tra.php">Trà</a>
                    </li>
                    <li>
                        <a href="./nuocEpTraiCay.php">Nước ép trái cây</a>
                    </li>
                    <li>
                        <a href="./nuocCoGa.php">Nước uống có ga</a>
                    </li>
                    <li>
                        <a href="./khac.php">Khác</a>
                    </li>

                    <li>
                        <a href="./gioiThieu.php">Giới thiệu</a>
                    </li>

                    <li>
                        <a href="./dieuKhoan.php">Điều khoản</a>
                    </li>
                </ul>
            </div>

            <div class="xac_thuc">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="45px" height="45px" viewBox="0 0 16 16">
                        <path fill="black" d="M11 7c0 1.66-1.34 3-3 3S5 8.66 5 7s1.34-3 3-3s3 1.34 3 3" />
                        <path fill="black" fill-rule="evenodd"
                            d="M16 8c0 4.42-3.58 8-8 8s-8-3.58-8-8s3.58-8 8-8s8 3.58 8 8M4 13.75C4.16 13.484 5.71 11 7.99 11c2.27 0 3.83 2.49 3.99 2.75A6.98 6.98 0 0 0 14.99 8c0-3.87-3.13-7-7-7s-7 3.13-7 7c0 2.38 1.19 4.49 3.01 5.75"
                            clip-rule="evenodd" />
                    </svg>

                    <ul class="sub_icon">
                        <?php
                        /*
                            - ton tai bien ten dang nhap hay chua
                            -> roi -> đã đăng nhập >< chưa đăng nhập
                        */
                        // ktra nguoi dùng đăng nhập hay chưa
                        if (session_status() == PHP_SESSION_NONE) {
                            session_start(); // Chỉ gọi session_start nếu chưa có session nào được khởi động
                        }
                        if (!isset($_SESSION['tenDangNhap'])) {
                        ?>
                            <li class="left"><a href="dangNhap.php">Đăng nhập</a></li>
                            <li class="left"><a href="dangKy.php">Đăng ký</a></li>
                        <?php
                        } else { ?>
                            <li class="left"><a href="doiMatKhau.php">Đổi mật khẩu </a></li>
                            <li class="left"><a href="gioHang.php">Giỏ hàng</a></li>
                            <li class="left"><a href="donHang.php">Đơn hàng</a></li>
                            <li class="left"><a href="php/client/logoutUser.php">Đăng xuất</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End nav -->
    </div>
    <!-- end header -->
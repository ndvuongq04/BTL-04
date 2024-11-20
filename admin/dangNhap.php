<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập - admin</title>
    <link rel="stylesheet" href="css/dangNhap.css">
</head>

<body>
    <!-- header -->
    <?php
    require('layout/header.php')
    ?>
    <!-- end header -->
    <div class="box">
        <form action="#">
            <h2>Đăng Nhập</h2>
            <div class="dau_vao">
                <p>Tên đăng nhập</p>
                <input type="text" placeholder="Nhập tên đăng nhập của bạn" required>
            </div>

            <div class="dau_vao">
                <p>Mật khẩu</p>
                <input type="password" placeholder="Nhập mật khẩu của bạn" required>
            </div>

            <button type="submit">Đăng Nhập</button>
            <div class="register">
                <p>
                    Bạn chưa có tài khoản
                    <a href="dangKy.php">Đăng Kí</a>
                </p>
            </div>
        </form>
    </div>
    <!-- footer -->

    <!-- end footer -->
</body>

</html>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>

    <link rel="stylesheet" href="css/dangKy.css">
    <link rel="stylesheet" href="/Web-site-ban-hang/assels/style.css">
</head>

<body>

    <!-- header -->
    <?php
    require('layout/header.php')
    ?>
    <!-- end header -->
    <div class="box">
        <h2>Đăng ký</h2>
        <form action="#">
            <div class="dau_vao">
                <label for="hoVaTen">Họ và tên</label>
                <input type="text" id="hoVaTen" placeholder="Nhập số điện thoại" style="opacity: 0.6;" required>
            </div>
            <div class="dau_vao">
                <label for="soDienThoai">Số điện thoại</label>
                <input type="text" id="soDienThoai" placeholder="Nhập số điện thoại">
            </div>
            <div class="dau_vao">
                <label for="tenDangNhap">Địa chỉ</label>
                <input type="text" id="diaChi" placeholder="Nhập địa chỉ" required>
            </div>
            <div class="gioi_tinh">
                <p>Giới tính</p>
                <input type="radio" name="sex" value="nam">Nam
                <input type="radio" name="sex" value="nu">Nữ
                <input type="radio" name="sex" value="khac">Khác
            </div>
            <div class="dau_vao">
                <label for="tenDangNhap">Tên đăng nhập</label>
                <input type="text" id="tenDangNhap" placeholder="Nhập tên đăng nhập" required>
            </div>

            <div class="dau_vao">
                <label for="matKhau">Mật Khẩu</label>
                <input type="password" id="matKhau" placeholder="Nhập mật khẩu" required>
            </div>

            <div class="dau_vao">
                <label for="nhapLaiMatKhau">Nhập lại Mật Khẩu</label>
                <input type="password" id="nhapLaiMatKhau" placeholder="Nhập lại mật khẩu" required>
            </div>

            <div class="btn-dangKy">
                <button type="submit">Đăng ký</button>
            </div>
        </form>
    </div>
    <!-- footer -->

    <?php
    require('layout/footer.php')
    ?>
    <!-- end footer -->
</body>

</html>
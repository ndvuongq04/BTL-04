<?php
// ktra người dùng đăng nhập hay chưa
require('../php/checkSession.php');
checkSession(2);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký - admin</title>

    <link rel="stylesheet" href="css/dangKy.css">
</head>

<body>

    <!-- header -->
    <?php
    require('layout/header.php');
    require('../php/admin/saveObject.php');
    // Kiểm tra nếu người dùng nhấn nút "Xóa"
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $hoVaTen = $_POST['ho_ten'];  // thực hiện hứng dữ liệu bằng cách gán chúng vào 1 biến khác
        $soDienThoai = $_POST['so_dien_thoai'];
        $diaChi = $_POST['dia_chi'];
        $gioiTinh = $_POST['gioi_tinh'];
        $tenDangNhap = $_POST['ten_dang_nhap'];
        $matKhau = $_POST['mat_khau'];
        $vaiTro = $_POST['vai_tro'];
        $nhapLaiMatKhau = $_POST['nhap_lai_mat_khau'];

        //  gọi hàm của file saveObject.php
        // hàm saveUserAtAdmin() thực hiện chức năng lưu 1 user xuống database
        $ketQua = saveUserAtAdmin($con, $vaiTro, $hoVaTen, $gioiTinh, $soDienThoai, $diaChi, $tenDangNhap, $matKhau);
        // Sau khi xóa xong, chuyển hướng trở lại trang quản lý khách hàng
        header('Location: quanLyKH.php');
        exit; // không thực hiện các câu lệnh phía sau 
    }
    ?>
    <!-- end header -->
    <div class="box">
        <h2>Đăng ký</h2>
        <form action="dangKy.php" method="post">
            <div class="dau_vao">
                <label for="hoVaTen">Họ và tên</label>
                <input type="text" name="ho_ten" placeholder="Nhập số điện thoại" style="opacity: 0.6;" required>
            </div>
            <div class="dau_vao">
                <label for="soDienThoai">Số điện thoại</label>
                <input type="text" name="so_dien_thoai" placeholder="Nhập số điện thoại">
            </div>
            <div class="dau_vao">
                <label for="tenDangNhap">Địa chỉ</label>
                <input type="text" name="dia_chi" placeholder="Nhập địa chỉ" required>
            </div>
            <div class="gioi_tinh">
                <p>Giới tính</p>
                <input type="radio" name="gioi_tinh" value="NAM">Nam
                <input type="radio" name="gioi_tinh" value="NU">Nữ
                <input type="radio" name="gioi_tinh" value="KHAC">Khác
            </div>
            <div class="dau_vao">
                <label for="tenDangNhap">Tên đăng nhập</label>
                <input type="text" name="ten_dang_nhap" placeholder="Nhập tên đăng nhập" required>
            </div>
            <div class="dau_vao">
                <label for="vai-tro"> Vai trò</label><br>
                <select id="vai-tro" name="vai_tro" style="opacity: 0.6;" required>
                    <option value="1">USER</option>
                    <option value="2">ADMIN</option>
                </select>
            </div>

            <div class="dau_vao">
                <label for="matKhau">Mật Khẩu</label>
                <input type="password" name="mat_khau" placeholder="Nhập mật khẩu" required>
            </div>

            <div class="dau_vao">
                <label for="nhapLaiMatKhau">Nhập lại Mật Khẩu</label>
                <input type="password" name="nhap_lai_mat_khau" placeholder="Nhập lại mật khẩu" required>
            </div>

            <div class="btn-dangKy">
                <button type="submit">Đăng ký</button>
            </div>
        </form>
    </div>
    <!-- footer -->

    <!-- end footer -->
</body>

</html>
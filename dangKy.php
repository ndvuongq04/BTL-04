<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>

    <link rel="stylesheet" href="css/dangKy.css">
    <style>
        .error {
            color: red;
            display: none;
        }
    </style>
</head>

<body>

    <!-- header -->
    <?php
    require('layout/header.php');
    require('php/client/saveObject.php');
    // Kiểm tra nếu người dùng nhấn nút "Xóa"
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $hoVaTen = $_POST['hoVaTen'];  // thực hiện hứng dữ liệu bằng cách gán chúng vào 1 biến khác
        $soDienThoai = $_POST['soDienThoai'];
        $diaChi = $_POST['diaChi'];
        $gioiTinh = $_POST['gioiTinh'];
        $tenDangNhap = $_POST['tenDangNhap'];
        $matKhau = $_POST['matKhau'];
        $idVaiTro = '1'; // 1 : User 
        $nhapLaiMatKhau = $_POST['nhapLaiMatKhau'];

        //  gọi hàm của file saveObject.php
        // hàm saveUser() thực hiện chức năng lưu 1 user xuống database
        $ketQua = saveUser($con, $idVaiTro,  $hoVaTen, $gioiTinh, $soDienThoai, $diaChi, $tenDangNhap, $matKhau);
        // Sau khi xóa xong, chuyển hướng trở lại trang quản lý khách hàng
        header('Location: dangNhap.php');
        exit; // không thực hiện các câu lệnh phía sau
    }
    ?>
    <!-- end header -->
    <div class="box">
        <h2>Đăng ký</h2>
        <form id="formDangKy" action="dangKy.php" method="post">
            <div class="dau_vao">
                <label for="hoVaTen">Họ và tên</label>
                <input type="text" id="hoVaTen" name="hoVaTen" placeholder="Nhập số điện thoại" style="opacity: 0.6;">
            </div>
            <span class="error " id="hoVaTenError"> Họ và tên không được để trống</span>
            <div class="dau_vao">
                <label for="soDienThoai">Số điện thoại</label>
                <input type="text" id="soDienThoai" name="soDienThoai" placeholder="Nhập số điện thoại">
            </div>
            <span class="error"> Số điện thoại không được để trống</span>
            <div class="dau_vao">
                <label for="diaChi">Địa chỉ</label>
                <input type="text" name="diaChi" placeholder="Nhập địa chỉ">
            </div>
            <div class="gioi_tinh">
                <p>Giới tính</p>
                <input type="radio" name="gioiTinh" value="nam">Nam
                <input type="radio" name="gioiTinh" value="nu">Nữ
                <input type="radio" name="gioiTinh" value="khac">Khác
            </div>
            <div class="dau_vao">
                <label for="tenDangNhap">Tên đăng nhập</label>
                <input type="text" id="tenDangNhap" name="tenDangNhap" placeholder="Nhập tên đăng nhập">
            </div>
            <span class="error"> Tên đăng nhập không được để trống</span>
            <div class="dau_vao">
                <label for="matKhau">Mật Khẩu</label>
                <input type="password" id="matKhau" name="matKhau" placeholder="Nhập mật khẩu">
            </div>
            <span class="error"> Mật Khẩu không được để trống</span>
            <div class="dau_vao">
                <label for="nhapLaiMatKhau">Nhập lại Mật Khẩu</label>
                <input type="password" id="nhapLaiMatKhau" name="nhapLaiMatKhau" placeholder="Nhập lại mật khẩu">
            </div>
            <span class="error">Nhập lại mật Khẩu sai </span>



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

    <!-- js -->
    <script src="js/validDangKy.js"></script>
</body>

</html>
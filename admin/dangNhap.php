<?php
session_start();
// Nếu đã đăng nhập và là admin, chuyển về trang admin
if (isset($_SESSION['tenDangNhap']) && $_SESSION["vaiTro"] == 2) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập - admin</title>
    <link rel="stylesheet" href="css/dangNhap.css">
</head>

<body>
    <?php
    require('../php/checkLogin.php');

    // ktra biến có giá trị hay không
    if (
        $_SERVER['REQUEST_METHOD'] == 'POST'
        && !empty($_POST['tenDangNhap'])
        && !empty($_POST['matKhau'])
    ) {
        $tenDangNhap = $_POST['tenDangNhap'];
        $matKhau = $_POST['matKhau'];

        // gọi hàm checkLoginAdmin của checkLogin.php
        if (checkLoginAdmin($con, $tenDangNhap, $matKhau)) {
            // người dùng đăng nhập thành công -> bắt đầu 1 phiên làm việc


            /*
                    Logic đăng nhập
                - lúc người dùng đăng nhâp thành công -> đưa tenDangNhap và id lên session
                - đưa id lên để thuận tiện lấy id của người dùng khi thao tác với giỏ hàng
            */
            session_start();
            $_SESSION["tenDangNhap"] = "$tenDangNhap";
            $_SESSION["vaiTro"] = 2;
            header('Location: index.php');
            exit; // không thực hiện các câu lệnh phía sau
        } else {
            header('Location: dangNhap.php?loi');
            exit;
        }
    }

    ?>
    <!-- end header -->
    <div class="box">
        <form action="dangNhap.php" method="post">
            <h2>Đăng Nhập</h2>
            <p style="color : red"><?php echo isset($_GET['loi']) ? "Đăng nhập thất bại" : " " ?></p>
            <p style="color : #34A853"><?php echo isset($_GET['dang-xuat']) ? "Đăng xuất thành công" : " " ?></p>
            <div class="dau_vao">
                <p>Tên đăng nhập</p>
                <input type="text" name="tenDangNhap" placeholder="Nhập tên đăng nhập của bạn">
            </div>

            <div class="dau_vao">
                <p>Mật khẩu</p>
                <input type="password" name="matKhau" placeholder="Nhập mật khẩu của bạn">
            </div>

            <button type="submit">Đăng Nhập</button>

        </form>
    </div>
    <!-- footer -->

    <!-- end footer -->
</body>

</html>
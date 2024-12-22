<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="css/dangNhap.css">
</head>

<body>
    <!-- header -->
    <?php
    require('layout/header.php');
    require('php/checkLogin.php');
    require('php/client/getObjectByCondition.php');

    // ktra thong tin nguoi dung submit len
    if (
        $_SERVER['REQUEST_METHOD'] == 'POST' &&
        !empty($_POST['tenDangNhap']) &&
        !empty($_POST['matKhau'])
    ) {


        $tenDangNhap = $_POST['tenDangNhap'];
        $matKhau = $_POST['matKhau'];

        // ktra
        if (checkLogin($con, $tenDangNhap, $matKhau)) {

            /*
                    Logic đăng nhập
                - lúc người dùng đăng nhâp thành công -> đưa tenDangNhap và id lên session
                - đưa id lên để thuận tiện lấy id của người dùng khi thao tác với giỏ hàng
                    -> lấy id thông qua tenDangNhap của người dùng
            */


            // id người dùng 
            $nguoiDung = getUserByUserName($con, $tenDangNhap);
            if ($nguoiDung != null) {
                $idNguoiDung = $nguoiDung['id'];
            }
            // người dùng đăng nhập thành công -> bắt đầu 1 phiên làm việc
            session_start();

            $_SESSION["tenDangNhap"] = "$tenDangNhap";
            $_SESSION["idNguoiDung"] = "$idNguoiDung";


            header('Location: index.php');
            exit; // không thực hiện các câu lệnh phía sau
        } else {
            header('Location: dangNhap.php?loi');
        }
    }
    ?>
    <!-- end header -->
    <div class="box">
        <form action="dangNhap.php" method="post">
            <h2>Đăng Nhập</h2>
            <p style="color : red"><?php echo isset($_GET['loi']) ? "Đăng nhập thất bại" : " " ?></p>
            <p style="color : green"><?php echo isset($_GET['doi-mat-khau-ok']) ? "Đổi mật khẩu thành công" : " " ?></p>

            <div class="dau_vao">
                <p>Tên đăng nhập</p>
                <input type="text" placeholder="Nhập tên đăng nhập của bạn" name="tenDangNhap" required>
            </div>

            <div class="dau_vao">
                <p>Mật khẩu</p>
                <input type="password" placeholder="Nhập mật khẩu của bạn" name="matKhau" required>
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

    <?php
    require('layout/footer.php')
    ?>
    <!-- end footer -->
</body>

</html>
<?php
session_start();
// ktra session có biến tên là tenDangNhap đã tồn tại hay chưa 
if (isset($_SESSION['tenDangNhap'])) {
    // đã tồn tại
    // xóa nó khỏi session
    unset($_SESSION['tenDangNhap']);
}
header("Location: ../admin/dangNhap.php?dang-xuat");

// khi đăng nhập -> đã gán $_SESSION['tenDangNhap'] = $tenDangNhap -> đăng nhập thành công -> bắt đầu 1 phiên mới
//->  echo $_SESSION['tenDangNhap'] sẽ in ra tenDangNhap của bạn

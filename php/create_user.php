<?php
//  kết nối tới databse
require('service/connectMysql.php');

//  gọi trang save_object.php ( để sử dụng hàm save)
require('service/save_object.php');

// echo "hello from create_user.php <br>";

//  lấy dữ liệu từ form về file này
$hoVaTen = $_POST['hoVaTen'];  // thực hiện hứng dữ liệu bằng cách gán chúng vào 1 biến khác
$soDienThoai = $_POST['soDienThoai'];
$diaChi = $_POST['diaChi'];
$gioiTinh = $_POST['gioiTinh'];
$tenDangNhap = $_POST['tenDangNhap'];
$matKhau = $_POST['matKhau'];
$nhapLaiMatKhau = $_POST['nhapLaiMatKhau'];



//  gọi hàm của file service/save_object.php
// hàm save_user() thực hiện chức năng lưu 1 user xuống database
$ketQua = save_user($con, $hoVaTen, $gioiTinh, $soDienThoai, $diaChi, $tenDangNhap, $matKhau);
echo $ketQua;

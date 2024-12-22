<?php
// echo "hello from save_object.php <br>";
require($_SERVER['DOCUMENT_ROOT'] . '/BTL-04/php/connectMysql.php');

// $con thuộc file connectMysql.php
// hàm
function hello()
{
    return "hello from save_object.php";
}
function saveUser($con, $idVaiTro,  $hoVaTen, $gioiTinh, $soDienThoai, $diaChi, $tenDangNhap, $matKhau)
{
    // câu lệnh thêm 1 bản ghi trong sql
    $sql = "INSERT INTO nguoi_dung (id_vai_tro, ho_ten, gioi_tinh, so_dien_thoai, dia_chi, ten_dang_nhap, mat_khau ) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // chuẩn bị câu lệnh
    $stmt = $con->prepare($sql);

    // ktra câu lệnh đã săn sàng chưa
    if ($stmt) {

        // đã sẵn sàng
        // gán các tham số vào câu lệnh
        $stmt->bind_param("issssss", $idVaiTro, $hoVaTen, $gioiTinh, $soDienThoai, $diaChi, $tenDangNhap, $matKhau);

        // thực thi câu lệnh 
        if ($stmt->execute()) {
            return "đã lưu user vào database";
        } else {
            return "Lỗi không lưu được user vào database";
        }
    } else {
        return "Lỗi câu lệnh sql ";
    }
}

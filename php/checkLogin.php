<?php
// echo "hello form checkLogin.php";
require($_SERVER['DOCUMENT_ROOT'] . '/BTL-04/php/connectMysql.php');

// ktra login của trang admin  -> chỉ có admin mới vào dcdc
function checkLoginAdmin($con, $username, $password)
{
    // Câu lệnh SQL
    // admin có id = 2 ; user có id = 1
    $sql = "SELECT * FROM nguoi_dung WHERE ten_dang_nhap = ? and mat_khau = ? and id_vai_tro = 2 ";

    // Chuẩn bị câu lệnh
    $stmt = $con->prepare($sql);

    // Kiểm tra câu lệnh đã sẵn sàng chưa
    if ($stmt) {

        // gán các tham số vào câu lệnh
        $stmt->bind_param("ss", $username, $password);

        // Thực thi câu lệnh SQL
        $stmt->execute();

        // Lấy kết quả
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // có tài khoản trùng với thông tin trên 
            return true;
        } else {
            return false;
        }
    }

    // Trả về false nếu có lỗi
    return false;
}


// admin và user đều có thể vào
function checkLogin($con, $username, $password)
{
    // Câu lệnh SQL
    // admin có id = 2 ; user có id = 1
    $sql = "SELECT * FROM nguoi_dung WHERE ten_dang_nhap = ? and mat_khau = ?";

    // Chuẩn bị câu lệnh
    $stmt = $con->prepare($sql);

    // Kiểm tra câu lệnh đã sẵn sàng chưa
    if ($stmt) {

        // gán các tham số vào câu lệnh
        $stmt->bind_param("ss", $username, $password);

        // Thực thi câu lệnh SQL
        $stmt->execute();

        // Lấy kết quả
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // có tài khoản trùng với thông tin trên 
            return true;
        } else {
            return false;
        }
    }

    // Trả về false nếu có lỗi
    return false;
}

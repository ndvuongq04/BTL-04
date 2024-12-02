<?php
echo "hello from updateObjectById.php <br>";
require($_SERVER['DOCUMENT_ROOT'] . '/BTL-04/php/connectMysql.php');

function hello()
{
    return "hello from updateObjectById.php";
}

function updateUserById($con, $id, $hoVaTen, $idVaiTro, $soDienThoai, $gioiTinh, $diaChi)
{
    $sql = "UPDATE nguoi_dung SET ho_ten = ? , id_vai_tro = ? , so_dien_thoai = ? , dia_chi = ? , gioi_tinh = ? Where id = ?";
    // chuẩn bị câu lệnh
    $stmt = $con->prepare($sql);

    // ktra câu lệnh đã săn sàng chưa
    if ($stmt) {

        // đã sẵn sàng
        // gán các tham số vào câu lệnh
        $stmt->bind_param("sisssi", $hoVaTen, $idVaiTro, $soDienThoai, $diaChi, $gioiTinh,  $id);

        // thực thi câu lệnh 
        if ($stmt->execute()) {
            return "đã cập nhật user vào database";
        } else {
            return "Lỗi không cập nhật được user vào database";
        }
    } else {
        return "Lỗi câu lệnh sql ";
    }
}

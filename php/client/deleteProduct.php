<?php
require('../connectMysql.php');
$idProduct = $_GET['idsp'];
$idCart = $_GET['idgh'];


// Câu lệnh SQL
$sql = "DELETE FROM ct_gio_hang WHERE id_gio_hang = ? AND id_san_pham = ? ; ";

// Chuẩn bị câu lệnh
$stmt = $con->prepare($sql);

// Kiểm tra câu lệnh đã sẵn sàng chưa
if ($stmt) {

    // gán các tham số vào câu lệnh
    $stmt->bind_param("ii", $idCart, $idProduct);

    // Thực thi câu lệnh SQL
    $stmt->execute();

    header('Location: ../../gioHang.php');
    exit;
}

echo ">>>>>>>>>>>>> Lỗi xóa sp";

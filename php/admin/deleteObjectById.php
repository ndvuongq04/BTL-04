<?php
echo "hello from deleteObjectById.php <br>";

require($_SERVER['DOCUMENT_ROOT'] . '/BTL-04/php/connectMysql.php');

// $con thuộc file connectMysql.php
// hàm

function deleteObjectById($con, $tableName, $id)
{
    // Câu lệnh SQL
    $sql = "DELETE FROM $tableName WHERE id = ? ";

    // Chuẩn bị câu lệnh
    $stmt = $con->prepare($sql);

    // Kiểm tra câu lệnh đã sẵn sàng chưa
    if ($stmt) {

        // gán các tham số vào câu lệnh
        $stmt->bind_param("i", $id);

        // Thực thi câu lệnh SQL
        $stmt->execute();

        return true;
    }

    // Trả về mảng rỗng nếu có lỗi
    return false;
}

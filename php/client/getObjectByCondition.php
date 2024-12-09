<?php
// echo "hello from getAllObjectByCondition.php <br>";

require($_SERVER['DOCUMENT_ROOT'] . '/BTL-04/php/connectMysql.php');
// require('../connectMysql.php');



// $con thuộc file connectMysql.php
// hàm
function hello()
{
    return "hello from getAllObjectByCondition.php";
}

function getObjectByCondition($con, $tableName, $loai)
{
    // Câu lệnh SQL
    $sql = "SELECT * FROM $tableName WHERE loai = ?";

    // Mảng lưu kết quả
    $prds = [];

    // Chuẩn bị câu lệnh
    $stmt = $con->prepare($sql);

    // Kiểm tra câu lệnh đã sẵn sàng chưa
    if ($stmt) {

        // gán các tham số vào câu lệnh
        $stmt->bind_param("s", $loai);

        // Thực thi câu lệnh SQL
        $stmt->execute();

        // Lấy kết quả
        $result = $stmt->get_result();

        // Hứng dữ liệu từ câu truy vấn SQL
        while ($prd = $result->fetch_assoc()) {
            // Thêm mỗi người dùng vào mảng
            $prds[] = $prd;
        }

        // Trả về mảng chứa tất cả người dùng
        return $prds;
    }

    // Trả về mảng rỗng nếu có lỗi
    return [];
}

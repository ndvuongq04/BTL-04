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
    $sql = "SELECT * FROM $tableName WHERE loai = ? AND trang_thai = 1 ";

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

function getUserByUserName($con, $username)
{
    // sql
    $sql = "SELECT * FROM nguoi_dung WHERE ten_dang_nhap = ? ";

    // chuẩn bị câu lệnhlệnh
    $stmt = $con->prepare($sql);
    // Kiểm tra câu lệnh đã sẵn sàng chưa
    if ($stmt) {

        // gán các tham số vào câu lệnh
        $stmt->bind_param("s", $username);

        // Thực thi câu lệnh SQL
        $stmt->execute();

        // Lấy kết quả
        $result = $stmt->get_result();

        // lấy 1 dòng đầu tiên trong mảng kq ( có thể null )
        return $result->fetch_assoc();
    }

    // Trả về null nếu có lỗi
    return null;
}

function getOrderDetailByOrder($con, $idDonHang)
{
    $sql = "SELECT * FROM ct_don_hang WHERE id_don_hang = ?";
    // Mảng lưu kết quả
    $orderDetails = [];

    // Chuẩn bị câu lệnh
    $stmt = $con->prepare($sql);

    // Kiểm tra câu lệnh đã sẵn sàng chưa
    if ($stmt) {

        // gán các tham số
        $stmt->bind_param("i", $idDonHang);
        // Thực thi câu lệnh SQL
        $stmt->execute();

        // Lấy kết quả
        $result = $stmt->get_result();

        // Hứng dữ liệu từ câu truy vấn SQL
        while ($orderDetail = $result->fetch_assoc()) {

            $orderDetails[] = $orderDetail;
        }


        return $orderDetails;
    }

    // Trả về mảng rỗng nếu có lỗi
    return [];
}

function getOrderByUser($con, $idNguoiDung)
{
    $sql = "SELECT * FROM don_hang WHERE id_nguoi_dung = ?";
    // Mảng lưu kết quả
    $orders = [];

    // Chuẩn bị câu lệnh
    $stmt = $con->prepare($sql);

    // Kiểm tra câu lệnh đã sẵn sàng chưa
    if ($stmt) {

        // gán các tham số
        $stmt->bind_param("i", $idNguoiDung);
        // Thực thi câu lệnh SQL
        $stmt->execute();

        // Lấy kết quả
        $result = $stmt->get_result();

        // Hứng dữ liệu từ câu truy vấn SQL
        while ($order = $result->fetch_assoc()) {

            $orders[] = $order;
        }


        return $orders;
    }

    // Trả về mảng rỗng nếu có lỗi
    return [];
}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng</title>
    <link rel="stylesheet" href="css/quanLy.css">
</head>

<body>
    <!-- header -->
    <?php
    require('layout/header.php')
    ?>
    <!-- end header -->
    <!-- <h1>Hello from file quanLyDH.php</h1> -->

    <!-- Nội dung code ở đây -->
    <div class="quanLyDH">
        <div class="title">
            <h2>Bảng đơn hàng</h2>
            <a href="#" class="create">Tạo mới ĐH</a>
        </div>


        <table>
            <tr>
                <th>Id</th>
                <th>Id người dùng</th>
                <th>Tổng tiền</th>
                <th>Phương thức thanh toán </th>
                <th>Trạng thái</th>
                <th>Hoạt động</th>
            </tr>
            <tr>
                <td>1</td>
                <td>3</td>
                <td>100000</td>
                <td>Khi nhận hàng</td>
                <td>Đang vận chuyển</td>
                <td>
                    <a href="#" style=" background-color: #1C8552; color : white;">Xem chi tiết</a>
                    <a href="#" style=" background-color: #FBBE00; color : black;">Cập nhật</a>
                    <a href="#" style=" background-color: #DC3640; color : white;">Xóa</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>4</td>
                <td>20000</td>
                <td>Khi nhận hàng</td>
                <td>Đang chờ duyệt</td>
                <td>
                    <a href="#" style=" background-color: #1C8552; color : white;">Xem chi tiết</a>
                    <a href="#" style=" background-color: #FBBE00; color : black;">Cập nhật</a>
                    <a href="#" style=" background-color: #DC3640; color : white;">Xóa</a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>4</td>
                <td>20000</td>
                <td>Khi nhận hàng</td>
                <td>Đã nhận hàng</td>
                <td>
                    <a href="#" style=" background-color: #1C8552; color : white;">Xem chi tiết</a>
                    <a href="#" style=" background-color: #FBBE00; color : black;">Cập nhật</a>
                    <a href="#" style=" background-color: #DC3640; color : white;">Xóa</a>
                </td>
            </tr>

        </table>
    </div>
    <!-- footer -->


    <!-- end footer -->
</body>

</html>
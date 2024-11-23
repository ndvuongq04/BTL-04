<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="css/quanLy.css">
</head>

<body>
    <!-- header -->
    <?php
    require('layout/header.php')
    ?>
    <!-- end header -->
    <!-- <h1>Hello from file quanLySP.php</h1> -->
    <!-- Nội dung code ở đây -->
    <div class="quanLyDH">
        <div class="title">
            <h2>Bảng sản phẩm</h2>
            <a href="#" class="create">Tạo mới SP</a>
        </div>


        <table>
            <tr>
                <th>Id</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Loại</th>
                <th>Hoạt động</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Cà phê đá</td>
                <td>1000</td>
                <td>Cà phê</td>
                <td>
                    <a href="#" style=" background-color: #1C8552; color : white;">Xem chi tiết</a>
                    <a href="#" style=" background-color: #FBBE00; color : black;">Cập nhật</a>
                    <a href="#" style=" background-color: #DC3640; color : white;">Xóa</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>CoCa Cola</td>
                <td>100</td>
                <td>Đồ uống có ga</td>
                <td>
                    <a href="#" style=" background-color: #1C8552; color : white;">Xem chi tiết</a>
                    <a href="#" style=" background-color: #FBBE00; color : black;">Cập nhật</a>
                    <a href="#" style=" background-color: #DC3640; color : white;">Xóa</a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Trà chanh</td>
                <td>200</td>
                <td>Trà</td>
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
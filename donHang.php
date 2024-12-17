<?php
// ktra người dùng đăng nhập hay chưa
// require('php/checkSession.php');
// checkSession();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng </title>
    <style>
        .quanLyDH {
            margin: 130px 30px;
            height: 100vh;

        }

        .quanLyDH table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 13px;
        }




        td a {
            text-decoration: none;
            padding: 8px 10px;
            border: 1px solid white;
            border-radius: 5px;
            width: 6px;
            color: blue;
        }

        .title-cart h2 {
            display: flex;
            justify-content: space-between;
            /* Đẩy các phần tử ra 2 bên */
            align-items: center;
            /* Căn giữa các phần tử theo chiều dọc */
            padding: 10px;
            /* Thêm khoảng cách bên trong */
        }

        td .pay {
            padding: 10px;
            background-color: green;
            color: #fff;
        }

        td .pay:hover {
            cursor: pointer;
            opacity: 0.6;
        }

        /* chọn các phần tử thứ tự chẵn (2, 4, 6, ...) trong số các hàng <tr> */
        tr:nth-child(even) {
            /* Áp dụng màu nền (một tông màu xám nhạt) cho các hàng chẵn được chọn */
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <?php
    require('layout/header.php');
    require('php/client/getObjectByCondition.php');



    $idNguoiDung = $_SESSION['idNguoiDung'];
    $donHang = getOrderByUser($con, $idNguoiDung);


    if ($donHang == null) {
        echo "<h1>Bạn chưa có đơn hàng nào </h1>";
        exit;
    } else {
        // mảng lưu tất cả donHang của người dùng
        // $cTDonHang = getOrderDetailByOrder($con, $donHang['id']);

    ?>
        <div class="quanLyDH">
            <div class="title-cart">
                <h2>Đơn hàng</h2>
            </div>


            <table>
                <tr>
                    <th>Tên người nhận </th>
                    <th>Số điện thoại </th>
                    <th>Địa chỉ </th>
                    <th>Trạng thái </th>
                    <th>Tổng tiền </th>
                    <th>Hành động </th>
                </tr>
                <?php
                foreach ($donHang as $dH) {

                ?>
                    <tr>
                        <td><?php echo $dH['ten'] ?></td>
                        <td><?php echo $dH['sdt'] ?></td>
                        <td><?php echo $dH['dia_chi'] ?></td>
                        <td><?php echo $dH['trang_thai'] ?></td>
                        <td><?php echo $dH['tong_tien'] ?> đ </td>
                        <td>
                            <a href="xemChiTietDH.php?id=<?php echo $dH['id'] ?>"
                                style=" background-color: #1C8552; color : white;">Xem chi tiết </a>
                            <?php
                            if ($dH['trang_thai'] == 'choDuyet') {

                            ?>
                                <a href="huyDonHang.php?id=<?php echo $dH['id'] ?>"
                                    style=" background-color:  #DC3640; color : white;">Hủy </a>
                            <?php
                            } ?>
                        </td>
                    </tr>

                <?php
                } ?>



            </table>
        </div>

    <?php
    } ?>
    <!-- footer -->
    <?php
    require('layout/footer.php');
    ?>
    <!-- end footer -->
</body>

</html>
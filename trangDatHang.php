<?php
// ktra người dùng đăng nhập hay chưa
require('php/checkSession.php');
checkSessionClient();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <!-- <link rel="stylesheet" href="css/datHang.css"> -->
    <style>
        .trangDatHang {
            margin: 120px 200px;
        }

        .trangDatHang h1 {
            text-align: center;
            padding: 10px;
        }

        .trangDatHang .trai {
            width: 50%;
            float: left;
        }

        .trangDatHang .phai {
            width: 50%;
            float: right;
        }

        .trangDatHang a {
            text-decoration: none;
            color: #FA8C16;
        }

        .trangDatHang .trai select {
            height: 40px;
            margin: 10px 0px;
            width: 420px;
        }

        .trangDatHang .trai .dau_vao input {
            height: 40px;
            padding: 10px;
            margin: 10px 0px;
            width: 400px;
        }

        .trangDatHang .trai .thanh_toan input {
            height: 20px;
            width: 20px;
        }

        .trangDatHang .trai .thanh_toan span {
            font-size: 18px;
            padding: 5px;
            margin: 5px;
            line-height: 1.5;
        }

        .trangDatHang .trai .dieu_khoan input {
            height: 20px;
            width: 20px;
            background-color: #FA8C16;
        }

        .trangDatHang .trai .dieu_khoan span {
            font-size: 18px;
            padding: 5px;
            margin: 5px;
            line-height: 1.2;
        }

        .trangDatHang .phai {
            background-color: transparent;
            height: 500px;
        }

        .trangDatHang .phai form {
            box-shadow: rgba(0, 0, 0, 0.5);
            border-radius: 15px 15px 0px 0px;
            border: 1px solid #ddd;
        }

        .trangDatHang .phai .trang_chinh {
            border: 1px solid #ccc;
            border-radius: 14px 14px 0px 0px;
            padding: 5px 10px;
        }

        .trangDatHang .phai .ten_mon {
            justify-content: space-between;
            display: flex;
            height: 70px;
        }

        .trangDatHang .phai .ten_mon a {
            margin-top: 12px;
            font-size: 13px;
            border-radius: 20px;
            border: 1px solid #262626;
            height: 40px;
            padding: 10px;
            color: #000;
            background: #fff;
        }

        .trangDatHang .phai .san_pham {
            justify-content: space-between;
            display: flex;
            margin: 10px;
        }

        .trangDatHang .phai .sua_xoa {
            margin: 0px 10px;
            padding: 15px;
        }

        .trangDatHang .phai .sua_xoa a {
            margin-top: 12px;
            font-size: 13px;
            border-radius: 20px;
            border: 1px solid #262626;
            height: 40px;
            padding: 10px;
            color: #000;
            background: #fff;
        }

        .trangDatHang .phai .tinh_tien {
            margin: 10px;
            padding: 5px;
            justify-content: space-between;
            display: flex;
        }

        .trangDatHang .phai .dat_hang {
            padding-top: 15px;
            padding-left: 15px;
            background-color: #FA8C16;
            justify-content: space-between;
            display: flex;
            border-radius: 0px 0px 15px 15px;
        }


        .trangDatHang .phai .dat_hang p {
            padding: 5px;
        }

        .trangDatHang .phai .dat_hang button {
            font-size: 14px;
            border: none;
            padding: 15px 25px;
            margin: 10px;
            border-radius: 40px;
            color: #FA8C16;
            background-color: #fff;
        }
    </style>
</head>

<body>


    <?php
    require('layout/header.php');
    require('php/client/cart.php');
    require('php/client/getObjectById.php');

    $idNguoiDung = $_SESSION['idNguoiDung'];
    $gioHang = checkCart($con, $idNguoiDung);
    if ($gioHang == null) {
        echo ">>>>>>>>>>>> không lấy được giỏ hàng";
    } else {
        // mảng lưu tất cả sp của người dùng 
        $cTGioHang = getCartDetailByCart($con, $gioHang['id']);
    ?>
        <div class="trangDatHang">
            <h1>Xác nhận đơn hàng</h1>
            <form action="thanhToan.php" method="post">
                <div class="trai">
                    <div>
                        <h3>Giao hàng</h3>
                    </div>
                    <div class="dau_vao">
                        <input type="text" placeholder="Tên người nhận" name="tenNguoiNhan"><br>
                        <input type="text" placeholder="Số điện thoại" name="soDienThoai"><br>
                        <input type="text" placeholder="Địa chỉ nhận hàng" name="diaChi"><br>
                    </div>

                    <div class="thanh_toan">
                        <h3>Phương thức thanh toán</h3>

                        <input type="radio" checked>
                        <span>Thanh toán bằng tiền mặt</span>
                    </div>

                    <div class="dieu_khoan">
                        <input type="checkbox" name="" id="" checked>
                        <span>
                            Đồng ý với các
                            <b>điều khoản và điều kiện</b>
                            mua hàng của The Coffee House
                        </span>
                    </div>

                </div>

                <div class="phai">
                    <div class="trang_chinh">
                        <div class="ten_mon">
                            <h3>Các món đã chọn</h3>
                            <a href="gioHang.php">Thêm món</a>
                        </div>
                        <?php
                        $tongTien = 0;
                        foreach ($cTGioHang as $cTGH) {
                            $tongTien += ($cTGH['so_luong'] * $cTGH['gia']);

                            // lấy sp thông qua id sản phẩm
                            $sp = getObjectById($con, 'san_pham', $cTGH['id_san_pham']);
                        ?>
                            <div class="san_pham">
                                <p><?php echo $sp['ten'] ?></p>
                                <P>Số lượng :<?php echo $cTGH['so_luong'] ?></P>
                                <P><?php echo number_format($cTGH['so_luong'] * $cTGH['gia']) ?> VNĐ</P>

                            </div>
                            <div class="sua_xoa">
                                <a href="gioHang.php">Sửa</a>
                                <a href="gioHang.php">Xóa</a>
                            </div>
                        <?php
                        } ?>

                        <h3>Tổng cộng</h3>
                        <div class="tinh_tien">
                            <p>Thành tiền</p>
                            <p><?php echo $tongTien ?> VNĐ</p>
                        </div>
                    </div>
                    <div class="dat_hang">
                        <span>
                            <p>Thành tiền</p>
                            <p><?php echo $tongTien ?> VNĐ</p>
                        </span>
                        <input type="hidden" name="tongTien" value="<?php echo $tongTien ?>">
                        <button type="submit">Đặt hàng</button>
                    </div>

                </div>
            </form>
        </div>

    <?php } ?>




</body>

</html>
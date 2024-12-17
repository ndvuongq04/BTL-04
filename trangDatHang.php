<?php
// ktra người dùng đăng nhập hay chưa
require('php/checkSession.php');
checkSession();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="css/datHang.css">
</head>

<body>
    <?php
    // require('layout/header.php');
    require('php/client/cart.php');
    require('php/client/getObjectById.php');

    /* 
            Logic trang giỏ hàng
        - hiển thi sản phẩm của người dung hiện tại
            -> lấy cart -> lấy cartDetails
        - xóa sản
    */
    // session_start();

    $idNguoiDung = $_SESSION['idNguoiDung'];
    $gioHang = checkCart($con, $idNguoiDung);
    if ($gioHang == null) {
        echo ">>>>>>>>>>>> không lấy được giỏ hàng";
    } else {
        // mảng lưu tất cả sp của người dùng 
        $cTGioHang = getCartDetailByCart($con, $gioHang['id']);
    ?>
        <h1>Xác nhận đơn hàng</h1>

        <div class="trang_chu">
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
                            <a href="">điều khoản và điều kiện</a>
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
                                <P><?php echo $cTGH['so_luong'] ?></P>
                                <P><?php echo ($cTGH['so_luong'] * $cTGH['gia']) ?> đ</P>

                            </div>
                            <div class="sua_xoa">
                                <a href="gioHang.php">Sửa</a>
                                <a href="gioHang.php">Xóa</a>
                            </div>
                        <?php } ?>



                        <h3>Tổng cộng</h3>

                        <div class="tinh_tien">
                            <p>Thành tiền</p>
                            <p><?php echo $tongTien ?> đ</p>
                        </div>
                    </div>



                    <div class="dat_hang">
                        <span>
                            Thành tiền
                            <p><?php echo $tongTien ?> đ</p>
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
<?php
/*
        Ktra
    -> người dùng đăng nhập -> cho phép thực hiện chức năng thêm sp
    -> >< chuyển về trang đăng nhậpnhập
*/

session_start();
if (!isset($_SESSION['idNguoiDung'])) {
    header('Location: dangNhap.php');
} else {


    require('php/client/cart.php');



    /*
        Logic thêm sản phẩm vào giỏ hàng

    ( có giỏ hàng <-> có ct giỏ hànghàng)

    1 . ktra người dùng đã có giỏ hang hay chua

    -> chưa -> thực hiện  tạo mới giỏ hàng và tạo mới ct giỏ hàng
    -> có rồi :
        -> Ktra người dùng đã thêm sp này vào hay chưa
                -> thêm rồi : <-> có bản ghi trùng ( id cart và id product này ) trong  data table ct_gio_hang 
                    -> thực hiện tăng so_luong của id ct_gio_hang này lên 1
                -> chưa thêm : 
                    -> thực hiện thêm <-> tạo mới 1 bản ghi ct_gio_hang có ( id cart và id product này ) và sp_luong = 1
*/
    session_start();

    $idNguoiDung = $_SESSION['idNguoiDung'];
    $idSanPham =  $_POST['idSanPham'];
    $giaSanPham = $_POST['giaSanPham'];


    $gioHang = checkCart($con, $idNguoiDung);


    // Người dùng đã có giỏ hàng
    if (is_array($gioHang) && !empty($gioHang)) {
        echo ">>>>>>>>>>>> nguoi dung nay da co gio hang ";
        // ktra gio hang dã có sp đó chau -> có tăng so_luong lên 1

        $idGioHang = $gioHang['id'];

        // soLuong sp của người dùng hiện tại trong cart là ; nếu thêm cùng sp đấy vào giỏ hàng -> không tăng so_luong_sp >< tăng so_luong_sp
        $soLuongInCart = $gioHang['so_luong_sp'];

        $cTGioHang = checkCartAndProduct($con, $idGioHang, $idSanPham);

        // Người dùng đã thêm sp này vào ít nhất 1 lần rồi
        if (is_array($cTGioHang) && !empty($cTGioHang)) {
            echo "<br>" . ">>>>>>>>>>>> Người dùng đã thêm sp này vào ít nhất 1 lần rồi";
            $soLuong = $cTGioHang['so_luong'];
            $idCTGioHang = $cTGioHang['id'];

            // cập nhật số lượng sp này trong ct gio hàng lên 1 
            $soLuong += 1;
            $kq = updateCartDetail($con, $idCTGioHang, $soLuong);
        }
        // Người dùng chưa thêm sp này vào giỏ hàng
        else { // nếu không có thì
            echo "<br>" . ">>>>>>>>>>>> Người dùng chưa thêm sp này vào giỏ hàng";

            // tao moi ct gio hang
            $soLuong = 1;
            $gia = $giaSanPham;
            insertCartDetail($con, $idGioHang, $idSanPham, $soLuong, $gia);

            // tăng so_luong_sp trong cart
            $soLuongInCart += 1;
        }
        // update gio hang cu thoi
        $kqud = updateCart($con, $idGioHang, $soLuongInCart);
    }
    // Người dùng này chưa có giỏ hàng 
    else {
        echo ">>>>>>>>>>>> nguoi dung nay chưa co gio hang ";
        // tạo mới giỏ hàng và hưng id của giỏ hàng
        $idGioHang = insertCart($con, $idNguoiDung, 1);
        // neu $idGioHang la so -> da tao moi dc 1 gio hang
        if (is_numeric($idGioHang)) {
            // tao moi ct gio hang : mac dinh sp duoc them chi co sl = 1
            $gia = $giaSanPham;
            insertCartDetail($con, $idGioHang, $idSanPham, 1, $gia);
        } else {
            echo "Loi khong tao moi dc gio hang";
        }
    }


    // sau khi thêm sp vào giỏ hàng thành công -> chuyển về giỏ hàng
    header('Location: gioHang.php');
}

<?php
// ktra người dùng đăng nhập hay chưa
require('../php/checkSession.php');
checkSession(2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật đơn hàng</title>
    <link rel="stylesheet" href="css/update.css">
</head>

<body>
    <!-- header -->
    <?php
    // require('layout/header.php');
    require('../php/admin/getObjectById.php');
    require('../php/admin/updateObjectById.php');
    $idDonHang = $_GET['id'];

    // gọi hàm của getObjectById.php
    $donHang = getObjectById($con, 'don_hang', $idDonHang);

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idCheck'])) {

        // lấy thông tin từ form
        $idDonHang = $_POST['idCheck'];
        $diaChi = $_POST['diaChi'];
        $trangThai = $_POST['trangThai'];

        // gọi hàm của updateObjectById.php
        updateOrderById($con, $idDonHang, $diaChi, $trangThai);

        // Sau khi xóa xong, chuyển hướng trở lại trang quản lý khách hàng
        header('Location: quanLyDH.php');
        exit; // không thực hiện các câu lệnh phía sau
    }
    ?>
    <!-- code -->
    <div class="update">
        <div class="title">
            <h2>Cập nhật đơn hàng</h2>
        </div>
        <div class="main">
            <form action="capNhat_DH.php" method="post">
                <div class="gr">
                    <div class="infor">
                        <label for="address">Địa chỉ</label>
                        <input type="text" id="address" name="diaChi" style="opacity: 0.6;" value=" <?php echo $donHang['dia_chi'] ?>">
                    </div>
                    <div class="infor">
                        <label for="mode"> Trạng thái</label>
                        <select id="mode" name="trangThai" style="opacity: 0.6;" required>
                            <option value=""> </option>
                            <option value="daHuy" <?php echo $donHang['trang_thai'] == 'daHuy' ? 'selected' : ' ' ?>>Đã hủy </option>
                            <option value="choDuyet" <?php echo $donHang['trang_thai'] == 'choDuyet' ? 'selected' : ' ' ?>>Đang chờ duyệt</option>
                            <option value="dangVanChuyen" <?php echo $donHang['trang_thai'] == 'dangVanChuyen' ? 'selected' : ' ' ?>>Đang vận chuyển</option>
                            <option value="daNhanHang" <?php echo $donHang['trang_thai'] == 'daNhanHang' ? 'selected' : ' ' ?>>Đã nhận hàng</option>
                        </select>
                    </div>
                </div>
                <div class="gr">
                    <div class="infor">
                        <input type="hidden" name="idCheck" value="<?php echo $idDonHang ?>">
                    </div>
                </div>

                <div class="submit">
                    <a href="quanLyDH.php" style="background-color: #1C8552; color : white;">Trở lại</a>
                    <button style="background-color: #FBBE00; color : black;">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
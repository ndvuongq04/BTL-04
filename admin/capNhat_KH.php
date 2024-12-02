<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật khách hàng</title>
    <link rel="stylesheet" href="css/update.css">
</head>

<body>
    <!-- header -->
    <?php
    require('layout/header.php');
    require('../php/admin/getObjectById.php');
    require('../php/admin/updateObjectById.php');

    $idCurrent = $_GET['id']; // lấy id từ link url 

    // gọi hàm của getObjectById.php
    $User = getObjectById($con, 'nguoi_dung', $idCurrent);

    // Kiểm tra nếu người dùng nhấn nút "Cập nhật"
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idCheck'])) {
        // lấy thông tin từ form
        $id = $_POST['idCheck'];
        $hoVaTen = $_POST['ho_ten'];
        $soDienThoai = $_POST['so_dien_thoai'];
        $gioiTinh = $_POST['gioi_tinh'];
        $diaChi = $_POST['dia_chi'];
        $idVaiTro = $_POST['vai_tro'];


        // gọi hàm của updateObjectById.php
        updateUserById($con, $id, $hoVaTen, $idVaiTro, $soDienThoai, $gioiTinh, $diaChi);

        // Sau khi xóa xong, chuyển hướng trở lại trang quản lý khách hàng
        header('Location: quanLyKH.php');
        exit; // không thực hiện các câu lệnh phía sau 
    }

    ?>
    <!-- code -->
    <div class="update">
        <div class="title">
            <h2>Cập nhật khách hàng id = <?php echo $_GET['id'] ?></h2>
        </div>
        <div class="main">
            <form action="capNhat_KH.php" method="post">
                <div class="gr">
                    <div class="">
                        <input type="hidden" name="idCheck" value="<?php echo $idCurrent ?>" placeholder="" style="opacity: 0.6;" required>
                    </div>
                    <div class="infor">
                        <label for="name">Họ và tên</label>
                        <input type="text" name="ho_ten" value="<?php echo $User['ho_ten'] ?>" placeholder="" style="opacity: 0.6;" required>
                    </div>
                    <div class="infor">
                        <label for="tel">Số điện thoại</label>
                        <input type="text" name="so_dien_thoai" value="<?php echo $User['so_dien_thoai'] ?>" placeholder="" style="opacity: 0.6;" required>
                    </div>
                </div>
                <div class="gr">
                    <div class="infor">
                        <label for="address">Địa chỉ</label>
                        <input type="text" name="dia_chi" value="<?php echo $User['dia_chi'] ?>" placeholder="" style="opacity: 0.6;" required>
                    </div>
                </div>
                <div class="infor">
                    <label for="sex"> Giới tính</label>
                    <select id="sex" name="gioi_tinh" style="opacity: 0.6;" required>
                        <option value="NAM" <?php echo $User['gioi_tinh'] == "NAM" ? "selected" : " " ?>>Nam</option>
                        <option value="NU" <?php echo $User['gioi_tinh'] == "NU" ? "selected" : " " ?>>Nữ</option>
                        <option value="KHAC" <?php echo $User['gioi_tinh'] == "KHAC" ? "selected" : " " ?>>Khác</option>
                    </select>
                </div>
                <div class="infor">
                    <label for="sex"> Vai trò</label>
                    <select id="sex" name="vai_tro" style="opacity: 0.6;" required>
                        <option value="1" <?php echo $User['id_vai_tro'] == "1" ? "selected" : " " ?>>USER</option>
                        <option value="2" <?php echo $User['id_vai_tro'] == "2" ? "selected" : " " ?>>ADMIN</option>
                    </select>
                </div>
                <div class="submit">
                    <a href="quanLyKH.php" style="background-color: #1C8552; color : white;">Trở lại</a>
                    <button type="submit" style="background-color: #FBBE00; color : black;">
                        Cập nhật
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
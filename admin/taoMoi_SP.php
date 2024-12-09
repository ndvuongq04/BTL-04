<?php
// ktra người dùng đăng nhập hay chưa
require('../php/checkSession.php');
checkSession();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo sản phẩm</title>
    <link rel="stylesheet" href="css/create.css">
</head>

<body>
    <!-- header -->
    <?php
    require('layout/header.php');
    require('../php/admin/saveObject.php');
    // Kiểm tra nếu người dùng nhấn nút "Tạo mới không"
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $ten = $_POST['tenSanPham'];  // thực hiện hứng dữ liệu bằng cách gán chúng vào 1 biến khác
        $loai = $_POST['loai'];
        $soLuong = $_POST['soLuong'];
        $gia = $_POST['gia'];
        $moTa = $_POST['moTaSanPham'];
        if (isset($_FILES['anhSanPham'])) {
            if ($_FILES['anhSanPham']['size'] == 0) {
                echo "bạn chưa chọn ảnh";
            } else {
                $tenAnh = time() . '_' . $_FILES['anhSanPham']['name']; //thêm thời gian thêm vào tên sp ( tránh trùng tên ảnh)
                $anh = $_FILES['anhSanPham']['tmp_name'];
                // thực hiện lưu ảnh vào folder img
                move_uploaded_file($anh, './img/' . $tenAnh);
            }
        }



        //  gọi hàm của file saveObject.php
        $ketQua = saveProduct($con, $ten, $loai, $soLuong, $gia, $moTa, $tenAnh);
        // Sau khi xóa xong, chuyển hướng trở lại trang quản lý khách hàng
        header('Location: quanLySP.php');
        exit; // không thực hiện các câu lệnh phía sau 
    }
    ?>
    <!-- code -->
    <div class="create">
        <div class="title">
            <h2>Tạo sản phẩm</h2>
        </div>
        <div class="main">
            <form action="taoMoi_SP.php" method="post" enctype="multipart/form-data">
                <div class="gr">
                    <div class="infor">
                        <label for="name">Tên sản phẩm</label>
                        <input type="text" id="name" name="tenSanPham" placeholder="" style="opacity: 0.6;" required>
                    </div>
                    <div class="infor">
                        <label for="loai">Phân loại</label><br>
                        <select name="loai" id="loai">
                            <option value="Tra">Trà</option>
                            <option value="NuocEp">Nước ép trái cây</option>
                            <option value="DoUongCoGa">Đồ uống có ga</option>
                            <option value="CaPhe">Cà phê</option>
                            <option value="Khac">Khác</option>
                        </select>
                    </div>
                </div>
                <div class="gr">
                    <div class="infor">
                        <label for="quantify">Số lượng</label>
                        <input type="number" id="quantify" name="soLuong" placeholder="" style="opacity: 0.6;" required>
                    </div>
                    <div class="infor">
                        <label for="price">Giá</label>
                        <input type="number" id="price" name="gia" placeholder="" style="opacity: 0.6;" required>
                    </div>
                </div>
                <div class="mota">
                    Mô tả sản phẩm <br><textarea name="moTaSanPham"></textarea><br>
                </div>
                <div class="infor">
                    <label for="anhSanPham">Ảnh SP</label>
                    <input id="anhSanPham" type="file" name="anhSanPham" style="opacity: 0.6;" required>
                </div><br>
                <div class="submit">
                    <a href="quanLySP.php" style="background-color: #1C8552; color : white;">Trở lại</a>
                    <button style="background-color: #24ACF2; color: white">Tạo sản phẩm</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
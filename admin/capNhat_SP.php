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
    <title>Cập nhật sản phẩm</title>
    <link rel="stylesheet" href="css/update.css">
</head>

<body>
    <!-- header -->
    <?php
    // require('layout/header.php');
    include('../php/admin/getObjectById.php');
    include('../php/admin/updateObjectById.php');

    $id = $_GET['id'];

    // id sp đó
    // hiên thị thông tin của sp

    // lấy thông tin sản phẩm ra
    // gọi hàm của getObjectById.php
    $sanPham = getObjectById($con, 'san_pham', $id);

    // check dataform

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idCheck'])) {

        // lấy data cua form về đây
        $idProduct = $_POST['idCheck'];
        $ten = $_POST['tenSanPham'];  // thực hiện hứng dữ liệu bằng cách gán chúng vào 1 biến khác
        $loai = $_POST['loai'];
        $soLuong = $_POST['soLuong'];
        $gia = $_POST['gia'];
        $moTa = $_POST['moTaSanPham'];


        $anhCu = $_POST['anhCu'];
        $tenAnh = "";
        // KT người dùng có cập nhật ảnh mới hay không
        if (isset($_FILES['anhSanPham']) && $_FILES['anhSanPham']['size'] > 0) {
            // Có ảnh mới
            $tenAnh = time() . '_' . $_FILES['anhSanPham']['name']; //thêm thời gian thêm vào tên sp ( tránh trùng tên ảnh)
            $anh = $_FILES['anhSanPham']['tmp_name'];
            // thực hiện lưu ảnh vào folder img
            move_uploaded_file($anh, './img/' . $tenAnh);
        } else {
            // Không có ảnh mới
            $tenAnh = $anhCu; // cập nhật ảnh cũ vào datasbase
        }

        // gọi hàm cập nhật sp
        updateProductById($con, $idProduct, $ten, $loai, $soLuong, $gia, $moTa, $tenAnh);
        header('Location: quanLySP.php');
    }

    ?>
    <!-- code -->
    <div class="update">
        <div class="title">
            <h2>Cập nhật sản phẩm</h2>
        </div>
        <div class="main">
            <form action="capNhat_SP.php" method="post" enctype="multipart/form-data">
                <div class="gr">
                    <div class="infor">
                        <div class="">
                            <input type="hidden" name="idCheck" value="<?php echo $sanPham['id'] ?>" placeholder="" style="opacity: 0.6;" required>
                        </div>
                        <label for="name">Tên sản phẩm</label>
                        <input type="text" id="name" name="tenSanPham" value="<?php echo $sanPham['ten'] ?>" style="opacity: 0.6;" required>
                    </div>
                    <div class="infor">
                        <label for="loai">Phân loại</label><br>
                        <select name="loai" id="loai">
                            <option value="Tra" <?php echo $sanPham['loai'] == 'Tra' ? 'selected' : '  ' ?>>Trà</option>
                            <option value="NuocEp" <?php echo $sanPham['loai'] == 'NuocEp' ? 'selected' : ' ' ?>>Nước ép trái cây</option>
                            <option value="DoUongCoGa" <?php echo $sanPham['loai'] == 'DoUongCoGa' ? 'selected' : ' ' ?>>Đồ uống có ga</option>
                            <option value="CaPhe" <?php echo $sanPham['loai'] == 'CaPhe' ? 'selected' : ' ' ?>>Cà phê</option>
                            <option value="Khac" <?php echo $sanPham['loai'] == 'Khac' ? 'selected' : ' ' ?>>Khác</option>
                        </select>
                    </div>
                </div>
                <div class="gr">
                    <div class="infor">
                        <label for="quantify">Số lượng</label>
                        <input type="number" id="quantify" name="soLuong" value="<?php echo $sanPham['so_luong'] ?>" style="opacity: 0.6;" required>
                    </div>
                    <div class="infor">
                        <label for="price">Giá</label>
                        <input type="number" id="price" name="gia" value="<?php echo $sanPham['gia'] ?>" style="opacity: 0.6;" required>
                    </div>
                </div>
                <div class="mota">
                    Mô tả sản phẩm <br><textarea name="moTaSanPham"> <?php echo $sanPham['mo_ta'] ?> </textarea><br>
                </div>
                <div class="infor">
                    <label for="anhSanPham">Ảnh SP</label>
                    <input id="anhSanPham" type="file" name="anhSanPham" style="opacity: 0.6;">
                    <!-- nhiệm vụ lưu ảnh cũ của sp -->
                    <input type="hidden" value="<?php echo $sanPham['anh'] ?>" name="anhCu">

                </div><br>
                <div class="infor">
                    <img src="img/<?php echo $sanPham['anh'] ?>" width="100px" height="100px" alt="">
                </div>

                <div class="submit">
                    <a href="quanLySP.php" style="background-color: #1C8552; color : white;">Trở lại</a>
                    <button style="background-color: #24ACF2; color: white">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
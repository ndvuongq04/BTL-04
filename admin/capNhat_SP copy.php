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
    require('layout/header.php');
    require('../php/admin/getObjectById.php');
    require('../php/admin/updateObjectById.php');

    // lần đầu tiên vào trang này
    $idProduct = $_GET['id'];
    // lấy ra sản phẩm thông qua idSp ; để hiển thị các thông tin đã có của SP
    $product = getObjectById($con, 'san_pham', $idProduct);


    //lần thứ 2 vào trang này
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idCheck'])) {

        // lấy data cua form về đây
        $idProduct = $_POST['idCheck'];
        $ten = $_POST['tenSanPham'];  // thực hiện hứng dữ liệu bằng cách gán chúng vào 1 biến khác
        $loai = $_POST['loai'];
        $soLuong = $_POST['soLuong'];
        $gia = $_POST['gia'];
        $moTa = $_POST['moTaSanPham'];


        // xử lý ảnh
        $anhCu = $_POST['anhSanPhamCu'];
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


        // Đến dòng lệnh này -> tenAnh luôn có giá trị
        // echo $tenAnh;

        // // goi hàm cập nhật sản phẩm
        updateProductById($con, $idProduct, $ten, $loai, $soLuong, $gia, $moTa, $tenAnh);

        // // chuyển trang 
        header('Location: quanLySP.php');
        exit;
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
                            <input type="hidden" name="idCheck" value="<?php echo $product['id'] ?>" placeholder="" style="opacity: 0.6;" required>
                        </div>
                        <label for="name">Tên sản phẩm</label>
                        <input type="text" id="name" name="tenSanPham" value="<?php echo $product['ten'] ?>" style="opacity: 0.6;" required>
                    </div>
                    <div class="infor">
                        <label for="loai">Phân loại</label><br>
                        <select name="loai" id="loai">
                            <option value="Tra" <?php echo $product['loai'] == 'Tra' ? 'selected' : ' ' ?>>Trà</option>
                            <option value="NuocEp" <?php echo $product['loai'] == 'NuocEp' ? 'selected' : ' ' ?>>Nước ép trái cây</option>
                            <option value="DoUongCoGa" <?php echo $product['loai'] == 'DoUongCoGa' ? 'selected' : ' ' ?>>Đồ uống có ga</option>
                            <option value="CaPhe" <?php echo $product['loai'] == 'CaPhe' ? 'selected' : ' ' ?>>Cà phê</option>
                            <option value="Khac" <?php echo $product['loai'] == 'Khac' ? 'selected' : ' ' ?>>Khác</option>
                        </select>
                    </div>
                </div>
                <div class="gr">
                    <div class="infor">
                        <label for="quantify">Số lượng</label>
                        <input type="number" id="quantify" name="soLuong" value="<?php echo $product['so_luong'] ?>" style="opacity: 0.6;" required>
                    </div>
                    <div class="infor">
                        <label for="price">Giá</label>
                        <input type="number" id="price" name="gia" value="<?php echo $product['gia'] ?>" style="opacity: 0.6;" required>
                    </div>
                </div>
                <div class="mota">
                    Mô tả sản phẩm <br><textarea name="moTaSanPham"><?php echo $product['mo_ta'] ?></textarea><br>
                </div>
                <div class="infor">
                    <label for="anhSanPham">Ảnh SP</label>
                    <input id="anhSanPham" type="file" name="anhSanPham" style="opacity: 0.6;">
                    <!-- lưu ảnh hiện của sp -->
                    <input type="hidden" name="anhSanPhamCu" value="<?php echo $product['anh'] ?>">
                </div><br>
                <!-- hiển thị ảnh sp hiện tại -->
                <div class="infor">
                    <label for="">Ảnh SP hiện tại</label><br>
                    <img src="img/<?php echo $product['anh'] ?>" width="90px" height="90px" alt="">
                </div><br>
                <div class="submit">
                    <a href="quanLySP.php" style="background-color: #1C8552; color : white;">Trở lại</a>
                    <button style="background-color: #24ACF2; color: white">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
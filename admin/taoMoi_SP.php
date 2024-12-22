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
    <title>Tạo sản phẩm</title>
    <link rel="stylesheet" href="css/create.css">
    <style>
        .error {
            color: red;
            display: none;

        }

        .red {
            color: red;

        }
    </style>
</head>

<body>
    <!-- header -->
    <?php
    require('layout/header.php');
    require('../php/admin/saveObject.php');
    // Kiểm tra nếu người dùng nhấn nút "Tạo mới"
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Lấy tên sản phẩm từ form
        $tenSanPham = $_POST['tenSanPham'];

        // Kiểm tra tên sản phẩm đã tồn tại trong cơ sở dữ liệu chưa
        $sql = "SELECT * FROM san_pham WHERE ten = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $tenSanPham);
        $stmt->execute();
        $result = $stmt->get_result();

        // if ($result->num_rows > 0) {
        //     // Tên sản phẩm đã tồn tại
        //     $error = "Tên sản phẩm đã tồn tại. Vui lòng chọn tên khác.";
        // } else {

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
        // }
    }
    ?>
    <!-- code -->
    <div class="create">
        <div class="title">
            <h2>Tạo sản phẩm</h2>
        </div>
        <div class="main">
            <form id="formTaoMoiSP" action="taoMoi_SP.php" method="post" enctype="multipart/form-data">
                <div class="gr">
                    <div class="infor">
                        <label for="tenSanPham">Tên sản phẩm</label>
                        <input type="text" id="tenSanPham" name="tenSanPham" placeholder="Nhập tên sản phẩm" style="opacity: 0.6;">
                    </div>
                    <!-- <span class="error" style="margin-top: 31px;" id="tenSanPhamError"> Tên sản phẩm không được để trống</span> -->
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
                <span class="error" id="tenSanPhamError"> Tên sản phẩm không được để trống</span><br>
                <div class="gr">
                    <div class="infor">
                        <label for="soLuong">Số lượng</label>
                        <input type="number" id="soLuong" name="soLuong" placeholder="Nhập số lượng" style="opacity: 0.6;">
                    </div>
                    <span class="error" style="margin-top: 31px;" id="soLuongError"> Số lượng không được để trống</span>
                    <span class="error" style="margin-top: 31px;" id="soLuongAmError"> Số lượng phải lớn hơn 0</span>
                    <div class="infor">
                        <label for="gia">Giá sản phẩm</label>
                        <input type="number" id="gia" name="gia" placeholder="Nhập giá sản phẩm" style="opacity: 0.6;">
                    </div>
                    <span class="error" style="margin-top: 31px;" id="giaError"> Giá sản phẩm không được để trống</span>
                    <span class="error" style="margin-top: 31px;" id="giaAmError"> Giá sản phẩm phải lớn hơn 0</span>
                </div>

                <div class="mota">
                    Mô tả sản phẩm <br><textarea id="moTaSanPham" name="moTaSanPham"></textarea>
                </div>
                <span class="error " id="moTaSanPhamError"> Mô tả sản phẩm không được để trống</span><br>
                <div class="infor">
                    <label for="anhSanPham">Ảnh SP</label>
                    <input id="anhSanPham" type="file" name="anhSanPham" style="opacity: 0.6;">
                </div>
                <span class="error " id="anhSanPhamError"> Ảnh sản phẩm không được để trống</span><br>
                <span class="error " id="anhKhongHopLeError"> File phải là ảnh (.jpg, .jpeg, .png)</span><br>
                <div class="submit">
                    <a href="quanLySP.php" style="background-color: #1C8552; color : white;">Trở lại</a>
                    <button style="background-color: #24ACF2; color: white">Tạo sản phẩm</button>
                </div>
            </form>
        </div>
    </div>

    <!-- js -->
    <script src="js/validTaoMoiSP.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem chi tiết</title>
    <link rel="stylesheet" href="css/chitietSP.css?v=1.1">
</head>

<body>

    <!-- header -->
    <?php
    require('layout/header.php');
    require('php/client/getObjectById.php');
    $idSP = $_GET['id'];
    $sanPham = getObjectById($con, 'san_pham', $idSP);

    ?>
    <!-- end header -->
    <div class="san_pham">
        <div class="img">
            <img src="admin/img/<?php echo $sanPham['anh'] ?>" alt="Loi <?php echo $sanPham['anh'] ?>">
            <div class="img_khac">
                <img src="admin/img/<?php echo $sanPham['anh'] ?>" alt="Loi <?php echo $sanPham['anh'] ?>">
            </div>
        </div>
        <div class="chi_tiet_img">
            <h1><?php echo $sanPham['ten'] ?></h1>
            <h2><?php echo $sanPham['gia'] ?></h2>
            <!-- <p>Chọn size(bắt buộc)</p>

            <div class="chon_size">
                <button>Nhỏ +4.000</button>
                <button>Vừa + 4.000đ</button>
                <button>Lớn + 14.000đ</button>
            </div> -->

            <form action="themSanPham.php" method="post">
                <input type="hidden" name="idSanPham" value="<?php echo $sanPham['id'] ?>">
                <input type="hidden" name="giaSanPham" value="<?php echo $sanPham['gia'] ?>">
                <div class="so_luong">
                    <p>Số Lượng</p>
                    <input type="number" name="soLuong" value="1" width="10px" disabled>
                </div>

                <div class="dat_hang">
                    <a href="">
                        <button>Thêm giỏ hàng</button>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="mo_ta">
        <hr>
        <h3>Mô tả sản phẩm</h3>
        <p>
            <?php echo $sanPham['mo_ta'] ?>
        </p>
    </div>

    <!-- <script>
        function thay_doi(so) {
            const dau_vao = document.getElementById("so");
            let so_hien_tai = parseInt(dau_vao.value);
            dau_vao.value = so_hien_tai + so;
        }
    </script> -->

    <!-- footer -->

    <!-- Phúc , Tường  -->

    <?php
    require('layout/footer.php')
    ?>
    <!-- end footer -->
</body>

</html>
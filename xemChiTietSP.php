<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem chi tiết</title>
    <link rel="stylesheet" href="css/chitietSP.css">
    <style>
        .so_luong input {
            width: 40px;
            height: 40px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #e9e9e9;
            color: #666;
            font-size: 14px;
        }
    </style>
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

            <h2 style="margin:15px 0px"><?php echo number_format($sanPham['gia'],0,',','.').' '.'VNĐ'; ?></h2>
            

            <form action="themSanPham.php" method="post">
                <input type="hidden" name="idSanPham" value="<?php echo $sanPham['id'] ?>">
                <input type="hidden" name="giaSanPham" value="<?php echo $sanPham['gia'] ?>">
                <div class="so_luong">
                    <p>Số Lượng</p>
                    <input type="number" name="soLuong" value="1" disabled>
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

    <?php
    require('layout/footer.php')
    ?>
    <!-- end footer -->
</body>

</html>
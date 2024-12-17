<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khác</title>
    <link rel="stylesheet" href="css/khac.css">
</head>

<body>
    <!-- header -->
    <?php
    require('layout/header.php');
    require('php/client/getObjectByCondition.php');
    $sanPham = getObjectByCondition($con, 'san_pham', 'Khac');
    ?>
    <div class="mid">
        <div class="typeCF">
            <div class="tieude">
                <b>Sản phẩm sáng tạo</b>
            </div>
            <div class="product">
                <?php
                foreach ($sanPham as $sp) {
                ?>
                    <div class="info">
                        <a href="xemChiTietSP.php?id=<?php echo $sp['id'] ?>"><img src="admin/img/<?php echo $sp['anh'] ?>" alt=" Lỗi <?php echo $sp['anh'] ?>"></a>
                        <p>
                            <a href="xemChiTietSP.php?id=<?php echo $sp['id'] ?>"><?php echo $sp['ten'] ?></a>
                        </p>
                        <div class="price">
                            <?php echo $sp['gia'] ?> đ
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
    <?php
    require('layout/footer.php')
    ?>
    <!-- end footer -->
</body>

</html>
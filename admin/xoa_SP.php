<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa sản phẩm</title>
    <link rel="stylesheet" href="css/delete.css">
</head>
<body>
    <!-- header -->
    <?php
    require('layout/header.php');
    ?>
    <!-- code -->
    <div class="delete">
        <div class="title">
            <h2>Xóa sản phẩm</h2>
        </div>
        <div class="main">
            <div class="warning">
                <p>Bạn chắc chắn muốn xóa sản phẩm này chứ ?</p>
            </div>
            <div class="del">
                <a href="quanLySP.php" style="background-color: #1C8552; color : white;">Trở lại</a>
                <a href="" style="background-color: #c5303a; color : white;">Xóa</a>
            </div>
        </div>
    </div>
</body>
</html>
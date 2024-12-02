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
    ?>
    <!-- code -->
    <div class="update">
        <div class="title">
            <h2>Cập nhật sản phẩm</h2>
        </div>
        <div class="main">
            <form action="">
                <div class="gr">
                    <div class="infor">
                        <label for="id">Mã sản phẩm (ID)</label>
                        <input type="text" id="id" placeholder="" style="opacity: 0.6;" required>
                    </div>
                    <div class="infor">
                        <label for="name">Tên sản phẩm</label>
                        <input type="text" id="name" placeholder="" style="opacity: 0.6;" required>
                    </div>
                </div>
                <div class="gr">
                    <div class="infor">
                        <label for="quantify">Số lượng</label>
                        <input type="number" id="quantify" placeholder="" style="opacity: 0.6;" required>
                    </div>
                    <div class="infor">
                        <label for="loai">Phân loại</label>
                        <input type="text" id="loai" placeholder="" style="opacity: 0.6;" required>
                    </div>
                </div>
                <div class="mota">
                    Mô tả sản phẩm <br><textarea></textarea><br>
                </div>
                <div class="infor">
                    <label for="img">Ảnh SP</label>
                    <input id="img" type="file" style="opacity: 0.6;" required>
                </div><br>
                <div class="submit">
                    <a href="quanLySP.php" style="background-color: #1C8552; color : white;">Trở lại</a>
                    <a href="" style="background-color: #FBBE00; color : black;">Cập nhật</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
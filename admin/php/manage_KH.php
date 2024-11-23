<?php
echo "hello from manage_KH.php <br>";
require('service/getAll_object.php');

// hàm của service/getAll_object.php
$users = getAll_user(($con));
foreach ($users as $user) {
    echo "Id : " . $user['id'] . " - họ và tên : " . $user['ho_ten'] . " - số điện thoại : " . $user['so_dien_thoai'] . "<br>";
}

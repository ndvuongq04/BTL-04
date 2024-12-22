// Lấy phần tử biểu mẫu và các trường đầu vào
var formDangNhap = document.getElementById('formDangNhap');
var tenDangNhap = document.getElementById('tenDangNhap');
var matKhau = document.getElementById('matKhau');

// Lấy phần tử hiển thị lỗi
var tenDangNhapError = document.getElementById('tenDangNhapError');
var matKhauError = document.getElementById('matKhauError');

// Thêm sự kiện submit vào biểu mẫu
formDangNhap.addEventListener('submit', function (event) {
    var isValid = true;

    // Kiểm tra tên đăng nhập
    if (tenDangNhap.value.trim() === '') {
        tenDangNhapError.style.display = 'block';
        tenDangNhap.classList.add('input-error');
        isValid = false;
    } else {
        tenDangNhapError.style.display = 'none';
        tenDangNhap.classList.remove('input-error');
    }

    // Kiểm tra mật khẩu
    if (matKhau.value.trim() === '') {
        matKhauError.style.display = 'block';
        matKhau.classList.add('input-error');
        isValid = false;
    } else {
        matKhauError.style.display = 'none';
        matKhau.classList.remove('input-error');
    }

    // Nếu không hợp lệ, ngăn biểu mẫu gửi đi
    if (!isValid) {
        event.preventDefault();
    }
});
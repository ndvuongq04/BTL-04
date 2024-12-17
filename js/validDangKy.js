// console.log("ok");

// lấy data từ from về
var hoVaTen = document.getElementById('hoVaTen');
var soDienThoai = document.getElementById('soDienThoai');
var tenDangNhap = document.getElementById('tenDangNhap');
var matKhau = document.getElementById('matKhau');
var nhapLaiMatKhau = document.getElementById('nhapLaiMatKhau');

var formDangKy = document.getElementById('formDangKy');

// lấy thẻ hiển thị lỗi
var hoVaTenError = document.getElementById('hoVaTenError');


// lắng nghe sự kiện form
formDangKy.addEventListener("submit", function (e) { // onsubmit -> trang sẽ load như bthg 
    // Biến kiểm tra xem có lỗi hay không
    var check = true;

    // Validate dữ liệu đầu vào
    // hoVaTen.value.trim() : loại bỏ khoảng trắng đầu cuối
    if (hoVaTen.value.trim() === "") { // chưa có dữ liệu
        // hiển thị lỗi
        check = false; // đánh dấu là có lỗi
        hoVaTenError.style.display = "block";

    }

    if (!check) {
        //ngăn chặn sự kiện submit trang khi có lỗi
        e.preventDefault();
    }
    // nếu không có lỗi -> check = true -> form vẫn sẽ được submit 




})

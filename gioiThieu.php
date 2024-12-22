<?php
require('layout/header.php');
?>

<style>
    .main{
        margin-top: 120px;
    }
    .gioi_thieu {
        background: linear-gradient(135deg, #f5f7fa, #c3cfe2);

        padding: 30px;
        margin: 20px auto;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(229, 152, 152, 0.1);
        width: 80%;
        max-width: 1000px;
        font-family: 'Arial', sans-serif;
    }

    .gioi_thieu h2 {
        font-size: 24px;
        color: #333;
        text-align: center;
        margin-bottom: 15px;
        font-weight: bold;
    }

    .gioi_thieu .content {
        line-height: 1.8;
        font-size: 16px;
        color: #555;
        text-align: justify;
    }

    .gioi_thieu .content span {
        display: block;
        margin-top: 10px;
    }

    .gioi_thieu p{
        margin: 5px;
    }
</style>

<html>
<div class="main">
    <div class="gioi_thieu">
        <h2>Giới thiệu</h2>
        <div class="content">
            <span>
            <h3>Giới Thiệu Về Quán</h3>

            <p>
            Chào mừng bạn đến với TCH, nơi bạn không chỉ thưởng thức những ly cà phê và nước uống thơm 
            ngon mà còn tận hưởng không gian thư giãn, ấm cúng và đầy cảm hứng.
            </p>

            <p>
            TCH được thành lập với sứ mệnh mang đến cho khách hàng những trải nghiệm tuyệt 
            vời nhất khi thưởng thức cà phê và đồ uống. Chúng tôi tự hào sử dụng nguyên liệu chất lượng cao, 
            được tuyển chọn kỹ lưỡng từ những vùng cà phê nổi tiếng của Việt Nam và thế giới.
            </p>

            <p>
            Quán tọa lạc tại địa chỉ ..... với không gian được 
            thiết kế hiện đại, gần gũi, phù hợp cho cả làm việc, học tập và thư giãn. Đội ngũ nhân viên thân 
            thiện, chuyên nghiệp luôn sẵn sàng phục vụ và mang đến cho bạn cảm giác thoải mái như ở nhà.
            </p>

            <p>
            Chúng tôi không chỉ có cà phê mà còn cung cấp nhiều loại thức uống đa dạng như trà sữa, nước ép 
            trái cây, và bánh ngọt. Mỗi món đều được chế biến với sự tận tâm để đáp ứng mọi sở thích và nhu 
            cầu của bạn.
            </p>

            <p>
            Hãy ghé thăm TCH để cùng tận hưởng những khoảnh khắc đáng nhớ và kết nối với 
            những giá trị tuyệt vời từ cà phê!
            </p>
            </span>
        </div>
    </div>
</div>

</html>
<?php
require('layout/footer.php')
?>
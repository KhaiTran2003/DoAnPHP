<?php 
include("Layout/header.php");
?>

<section class="contact-img-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="con-text">
                    <h2 class="page-title">Về chúng tôi</h2>
                    <p><a href="#">Home</a> | Thông tin chúng tôi</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-section">
    <div class="container">
        <div class="row align-items-center"> <!-- Align items vertically centered -->
            <div class="col-md-6">
                <img src="/Main/images/store.jpg" alt="About Us Image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2>TIỆM GIÀY TORYCO 1993</h2>
                <p class="about-text">
                    Chào mừng bạn đến với Toryco 1993 Store - điểm đến hoàn hảo cho những tín đồ giày dép và phong cách. Chúng tôi tự hào là điểm đến hàng đầu cho những người yêu thời trang, nơi bạn có thể khám phá những mẫu giày đẳng cấp và đa dạng từ các thương hiệu hàng đầu trên thị trường.
                </p>
                <p class="about-text">
                    Tại Toryco 1993 Store, chúng tôi cam kết mang lại cho bạn trải nghiệm mua sắm tuyệt vời nhất với dịch vụ chăm sóc khách hàng tận tình và chu đáo. Với một bộ sưu tập đa dạng, từ giày thể thao đến giày công sở, từ những kiểu dáng cổ điển đến những xu hướng mới nhất, chúng tôi tự tin rằng bạn sẽ tìm thấy điều gì đó phù hợp với phong cách và nhu cầu của mình tại cửa hàng của chúng tôi.
                </p>
                <p class="about-text">
                    Ngoài ra, chúng tôi luôn lắng nghe ý kiến và phản hồi từ khách hàng để cải thiện dịch vụ của mình. Hãy đến và trải nghiệm sự đa dạng và chất lượng tại Toryco 1993 Store - nơi mà phong cách bắt đầu.
                </p>
            </div>
        </div>
    </div>
</section>

<style>
    /* Add your existing CSS styles and then add these */

.about-section {
    padding: 80px 0;
}

.about-section h2 {
    font-size: 30px; /* Increased font size */
    margin-bottom: 20px;
}

.about-text {
    font-size: 18px; /* Increased font size */
    line-height: 1.8;
    margin-bottom: 30px;
}

.about-section img {
    max-width: 100%; /* Ensure image doesn't exceed container width */
    display: block; /* Prevents extra space below image */
    margin-bottom: 20px; /* Add space below image */
}

@media (max-width: 768px) {
    .about-section img {
        margin-top: 20px; /* Adjust as needed */
        margin-bottom: 0; /* Reset margin */
    }
}

</style>

<?php require_once('Layout/footer.php'); ?>

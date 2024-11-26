
<?php
include('config.php');
?>
<!--------------------FOOTER--------------------------- -->
<footer class="section-p1"><!--mục footer -->
    <div class="col">
        <h4>HỆ THỐNG CỬA HÀNG</h4><!--Hệ thông cửa hàng -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3898.71038381421!2d109.19357058885497!3d12.267867800000008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317067d3b1e969bd%3A0x976f69a6c7fe3885!2sTi%E1%BB%87m%20gi%C3%A0y%20TORYCO%201993%20-%20Sneaker%20Nha%20Trang!5e0!3m2!1svi!2s!4v1712899546023!5m2!1svi!2s" width="300" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div> 
    <div class="col">
        <h4>THÔNG TIN LIÊN HỆ</h4><!--Thông tin liên hệ -->
        <p>Facebook:<a href ="https://www.facebook.com/toryco1993/"> Toryco 1993  </a> </p>
        <p>Website:<a href ="#">Toryco1993.com</a></p>
    </div>
    <div class="col">
        <h4>THÔNG TIN CỬA HÀNG</h4><!--Follow us on social media-->
        <li><i class="fa fa-dot-circle-o">  Thứ 2 - 7 : 8:00 AM - 10:00 PM </i></li>
        <li><i class="fa fa-dot-circle-o">  SDT: (+84) 34 577 5579 </i></li>
</footer>
<style>
/*----------------FOOTER--------------------*/

footer {
    background: rgb(0, 0, 0);
    display: flex;
    justify-content: space-around;
    padding: 20px 0; /* Chỉnh khoảng cách phía dưới và phía trên */
}

footer.col {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-top: 100px; /* Đổi "100p" thành "100px" */
}

footer h4 {
    color: rgb(255, 255, 255);
    font-size: 16px;
    padding-bottom: 10px; /* Giảm khoảng cách dưới của tiêu đề */
    margin-top: 20px; /* Giảm khoảng cách trên của tiêu đề */
    font-weight: bold;
}

footer p {
    color: rgb(255, 255, 255);
    font-size: 20px;
    text-decoration: none;
    margin-bottom: 10px; /* Giảm khoảng cách dưới của đoạn văn */
}

footer li {
    color: #fff;
    margin-top: 3px;
    font-weight: bold;
}

footer li .fa{
    font-size: 20px;
}

iframe {
    width: 100%; /* Tự động điều chỉnh chiều rộng của bản đồ */
    height: 150px; /* Thiết lập chiều cao cố định cho bản đồ */
}


/* Responsive */
@media (max-width: 768px) {
    footer {
        flex-direction: column; /* Chuyển sang kiểu dạng cột khi màn hình nhỏ hơn hoặc bằng 768px */
        text-align: center; /* Căn giữa các phần tử khi chuyển sang kiểu dạng cột */
    }

    footer.col {
        align-items: center; /* Căn giữa các phần tử con khi chuyển sang kiểu dạng cột */
        margin-top: 50px; /* Giảm khoảng cách trên của các cột khi chuyển sang kiểu dạng cột */
    }

    iframe {
        height: 200px; /* Tăng chiều cao của bản đồ khi chuyển sang kiểu dạng cột */
    }
}


</style>

<style>
<?php
require_once('database/config.php');
require_once('database/dbhelper.php');
require_once('utils/utility.php');
require_once('api/checkout-form.php');
$cart = [];
if (isset($_COOKIE['cart'])) {
    $json = $_COOKIE['cart'];
    $cart = json_decode($json, true);
}
$idList = [];
foreach ($cart as $item) {
    $idList[] = $item['id'];
}
if (count($idList) > 0) {
    $idList = implode(',', $idList); // chuyeern
    //[2, 5, 6] => 2,5,6

    $sql = "select * from product where id in ($idList)";
    $cartList = executeResult($sql);
} else {
    $cartList = [];
}
?>
<?php 
 include("Layout/header.php");
?>
<!-- pages-title-start -->
<section class="contact-img-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="con-text">
                                
                                <h2 class="page-title">THÔNG TIN ĐẶT HÀNG</h2>
                                <p><a href="#">Home</a> | shop</p>
                            </div>
                        </div>
                    </div>
                </div>
</section>
<form action="" method="POST">
<div class="checkout-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12">
                        <div class="text">
                            <!-- Nav tabs -->
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="row">
                                        <form action="#">
                                            <div class="checkbox-form">
                                                <div class="col-md-12">
                                                    <h3 class="checkbox9">THÔNG TIN LIÊN HỆ</h3>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="di-na bs">
                                                        <label class="l-contact">
                                                        Họ và tên
                                                        <em>*</em>
                                                        </label>
                                                        <input class="form-control" type="text" required="" id="usr" name="fullname">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="di-na bs">
                                                        <label class="l-contact">
                                                        Email Address 
                                                        <em>*</em>
                                                        </label>
                                                        <input class="form-control" type="email" required="" id="email" name="email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="di-na bs">
                                                        <label class="l-contact">
                                                        Phone 
                                                        <em>*</em>
                                                        </label>
                                                        <input class="form-control" type="tel" required="" id="phone_number" name="phone_number">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="l-contact">
                                                        Address  
                                                        <em>*</em>
                                                    </label>
                                                    <div class="di-na bs">
                                                        <input class="form-control" type="text" required="" id="address" name="address"  placeholder="Địa chỉ của bạn">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <p class="checkout-coupon">
                                                <a href="dashboard.php"><input type="submit" value="CONTINUE"></a>
                                            </p>
                                        </div>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="ro-checkout-summary">
                                            <div class="ro-title">
                                                <h3 class="checkbox9">ORDER SUMMARY</h3>
                                            </div>
                                <?php
                                         
                                         $count = 0;
                                         $total = 0;
                                         foreach ($cartList as $item) {
                                             $num = 0;
                                             $size = '';
                                             foreach ($cart as $value) {
                                                 if ($value['id'] == $item['id']) {
                                                     $num = $value['num'];
                                                     $size = $value['size']; // Lấy thông tin về size từ giỏ hàng
                                                     break;
                                                 }
                                             }
                                             $total += $num * $item['price'];
                                             echo '
                                            
                                            <div class="ro-body">
                                                <div class="ro-item">
                                                    <div class="ro-image">
                                                        <a href="#">
                                                            <img src="../Admin/product/' . $item['thumbnail'] . '" alt="">
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <div class="tb-beg">
                                                            <a href="#">' . $item['title'] . '</a>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="ro-price">
                                                            <span class="amount">' . $item['price'] . '</span>
                                                        </div>
                                                        <div class="ro-quantity">
                                                            <strong class="product-quantity"> x ' . $num . '</strong>
                                                        </div>
                                                        <div class="product-total">
                                                            <span class="amount">' . number_format($num * $item['price'], 0, ',', '.') . '<span> VNĐ</span></span>
                                                        </div>
                                                        <div class="product-size">Size: ' . $size . '</div> <!-- Hiển thị thông tin về size -->
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        
                                     ';
                                         }
                                ?>
                                            <div class="ro-footer">
                                                <div>
                                                    <p>
                                                        Subtotal
                                                        <span>
                                                            <span class="amount"><?= number_format($total, 0, ',', '.') ?>
                                                        </span>
                                                    </p>
                                                    <div class="ro-divide"></div>
                                                </div>
                                                <div class="shipping">
                                                    <p> Shipping </p>
                                                    <div class="ro-shipping-method">
                                                        <p>
                                                            Giao hàng miễn phí (Free)
                                                        </p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="ro-divide"></div>
                                                </div>
                                                <div class="order-total">
                                                    <p>
                                                        Total
                                                        <span>
                                                            <strong>
                                                                <span class="amount"><?= number_format($total, 0, ',', '.') ?> </span>
                                                            </strong>
                                                        </span>
                                                    </p>
                                                </div>
                                                <div>
                                                    <p>
                                                        Tổng Đơn Hàng
                                                        <span>
                                                            <strong>
                                                                <span class="amount"><?= number_format($total, 0, ',', '.') ?><span> VNĐ</span></span>
                                                            </strong>
                                                        </span>
                                                    </p>
                                                </div>
                                                <div >
                                                    <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                                                        action="/Main/xulythanhtoanmomo.php">
                                                        <input type="hidden" name="total_amount" value="<?= $total ?>">
                                                    </form>
                                                </div>
                                            </div>
                                
                        </div>
                    </div>
                </div>
            </div>
</div>
</form>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function() {
    // Khi trang web được tải, kiểm tra nếu checkbox được chọn, thì kích hoạt ô nhập Order Notes
    if ($('.input-checkbox').prop('checked')) {
        enableOrderComments();
    } else {
        disableOrderComments();
    }

    // Bắt sự kiện khi checkbox thay đổi trạng thái
    $('.input-checkbox').change(function() {
        if ($(this).prop('checked')) {
            enableOrderComments();
        } else {
            disableOrderComments();
        }
    });

    // Hàm kích hoạt ô nhập Order Notes
    function enableOrderComments() {
        $('.input-text').prop('disabled', false);
    }

    // Hàm vô hiệu hóa ô nhập Order Notes
    function disableOrderComments() {
        $('.input-text').prop('disabled', true);
    }
});
</script>

<hr class="opacity-20">
<?php require_once('Layout/footer.php'); ?>

<style>
    .button-container {
    display: flex;
    justify-content: center; /* Căn giữa nút */
}

.payment-form {
    display: flex;
}

.btn {
    min-width: 150px; /* Độ rộng tối thiểu */
    padding: 10px 20px; /* Khoảng cách giữa nút và văn bản */
    font-size: 16px; /* Kích thước font chữ */
    white-space: nowrap; /* Ngăn chặn việc xuống dòng */
    overflow: hidden; /* Ẩn phần nội dung vượt ra khỏi nút */
    text-overflow: ellipsis; /* Hiển thị dấu chấm cuối cùng khi nội dung vượt quá */
    word-wrap: break-word; /* Phân chia từ khi nội dung vượt quá */
}


</style>
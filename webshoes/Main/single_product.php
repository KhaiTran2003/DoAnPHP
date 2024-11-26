
<?php
require_once('database/config.php');
require_once('database/dbhelper.php');
// Lấy id từ trang index.php truyền sang rồi hiển thị nó
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM product WHERE product.id = " . $id;
    $product = executeSingleResult($sql);
    // Xây dựng câu truy vấn SQL=
    $sql_size = "
        SELECT 
            p.*, 
            c.name AS category_name, 
            GROUP_CONCAT(CONCAT(ps.size, ': ', ps.quantity) SEPARATOR ', ') AS size_details
        FROM product p
        LEFT JOIN category c ON p.id_category = c.id
        LEFT JOIN product_size ps ON p.id = ps.product_id
    ";
    $product_size = executeSingleResult($sql_size);
    // Kiểm tra nếu ko có id sp đó thì trả về index.php
    if ($product == null) {
        header('Location: index.php');
        die();
    }
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
                                <h2 class="page-title">Shop</h2>
                                <p><a href="#">Home</a> | shop</p>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
<main>
    <div class="container">
        <!-- END LAYOUT  -->
        <section class="main">
            <section class="oder-product" >
                <div class="title">
                    <section class="main-order row">
                        <h1><?= $product['title'] ?></h1>
                        <div class="box">
                          <div class="left" >
                            <li >
                              <div class="main_image" >
                                <img src="<?='../Admin/product/'.$product['thumbnail'] ?>" alt="">
                              </div>
                              <div class="main_image">
                                <img src="<?='../Admin/product/'.$product['thumbnail_1'] ?>" alt="">
                              </div>
                              <div class="main_image">
                                <img src="<?='../Admin/product/'.$product['thumbnail_2'] ?>" alt="">
                              </div>
                            </li>

                            <li>
                              <div class="main_image">
                                <img src="<?='../Admin/product/'.$product['thumbnail_3'] ?>" alt="">
                              </div>
                              <div class="main_image">
                                <img src="<?='../Admin/product/'.$product['thumbnail_4'] ?>" alt="">
                              </div>
                              <div class="main_image">
                                <img src="<?='../Admin/product/'.$product['thumbnail_5'] ?>" alt="">
                              </div>
                            </li>

                        </div>
                        <div class="about ">
                            <p style="padding-top:105px;margin-left:10px; width:300px"><?= $product['content'] ?></p>
                            <?php
                            // Truy vấn danh sách kích thước và số lượng của sản phẩm
                            $id = $_GET['id']; // Lấy id sản phẩm từ URL
                            $sql_sizes = "SELECT size FROM product_size WHERE product_id = ?";
                            $stmt = $mysqli->prepare($sql_sizes);
                            $stmt->bind_param("i", $id);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            $sizes = [];
                            while ($row = $result->fetch_assoc()) {
                                $sizes[] = $row['size'];
                            }
                            ?>

                            <div id="myDIV" style="padding-top:10px; margin-left:10px;">
                                <?php foreach ($sizes as $size): ?>
                                    <button class="btn" onclick="setSize('<?php echo $size; ?>')"><?php echo $size; ?></button>
                                <?php endforeach; ?>
                            </div>

                            <script>
    let selectedSize = null; // Biến lưu kích thước được chọn

    function setSize(size) {
        selectedSize = size; // Cập nhật kích thước đã chọn
        updateActiveButton(); // Cập nhật trạng thái các nút

        // Lưu kích thước vào Cookie
        document.cookie = "selectedSize=" + encodeURIComponent(selectedSize) + "; path=/";

        console.log('Size selected:', selectedSize); // In ra kích thước đã chọn
    }

    function updateActiveButton() {
        var buttons = document.querySelectorAll('#myDIV .btn'); // Lấy tất cả các nút trong phần tử có id là "myDIV"
        buttons.forEach(function(button) {
            if (button.textContent === selectedSize) {
                button.classList.add('active'); // Thêm lớp 'active' cho nút đã chọn
            } else {
                button.classList.remove('active'); // Loại bỏ lớp 'active' cho các nút khác
            }
        });
    }

    // Đặt trạng thái nút theo giá trị từ Cookie (nếu có)
    document.addEventListener('DOMContentLoaded', function () {
        let cookies = document.cookie.split('; ').reduce((acc, cookie) => {
            let [key, value] = cookie.split('=');
            acc[key] = decodeURIComponent(value);
            return acc;
        }, {});

        if (cookies.selectedSize) {
            selectedSize = cookies.selectedSize;
            updateActiveButton();
        }
    });

    function updatePrice() {
        var num = document.getElementById('num').value; // Lấy số lượng
        var pricePerItem = parseFloat(document.querySelector('.gia.none').innerText); // Giá cơ bản của sản phẩm (ẩn trong span có class gia none)
        
        var totalPrice = pricePerItem * num; // Tính tổng giá
        document.getElementById('price').innerText = numberWithCommas(totalPrice.toFixed(0)); // Cập nhật giá hiển thị
    }

    // Hàm định dạng số tiền với dấu phẩy
    function numberWithCommas(x) {
        return x.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Gọi hàm cập nhật giá khi trang được tải lần đầu
    document.addEventListener('DOMContentLoaded', function() {
        updatePrice();
    });
</script>


                            
                            <div class="number"style="padding-top:10px;margin-left:10px;">
                                <span class="number-buy">Số lượng</span>
                                <input id="num" type="number" value="1" min="1" onchange="updatePrice()">
                            </div>
                            
                            <p class="price"style="padding-top:70px;margin-left:10px;">Giá: <span id="price"><?= number_format($product['price'], 0, ',', '.') ?></span><span> VNĐ</span><span class="gia none"><?= $product['price'] ?></span></p>
                            <?php 
                                if(isset($_COOKIE['tendangnhap'])){
                                    echo '<button class="add-cart" style="margin-left:10px;" onclick="addToCart(' . $id . ')"><i class="fas fa-cart-plus"></i><a href="/cart.php"></a> Thêm vào giỏ hàng</button>
                                    <p></p>
                                    
                                    <button class="buy-now" style="margin-left:10px;" onclick="buyNow(' . $id . ')"><i class="fas fa-money-check"></i> Mua ngay</button>';
                                } else {
                                    echo '<div class="wc-proceed-to-checkout" style="text-align: center;">
                                    <p class="return-to-shop">
                                        <a class="button wc-backward" href="login.php">Đăng nhập để thêm giỏ hàng</a>
                                    </p>
                                    </div>';
                                }
                            ?>
                        

                        <script type="text/javascript">
                            // Hàm thêm sản phẩm vào giỏ hàng
                            function addToCart(id) {
                                var num = document.querySelector('#num').value; // Số lượng sản phẩm
                                // Lấy kích thước từ Cookie
                                var selectedSize = getCookie("selectedSize");
                                
                                // Gửi thông tin sản phẩm đến API để thêm vào giỏ hàng
                                $.post('api/cookie.php', {
                                    'action': 'add',
                                    'id': id,
                                    'num': num,
                                    'size': selectedSize // Thêm thông tin về kích thước vào đây
                                }, function(data) {
                                    location.reload(); // Tải lại trang sau khi thêm vào giỏ hàng
                                });
                            }

                            // Hàm mua ngay
                            function buyNow(id) {
                                var num = parseInt(document.getElementById('num').value); // Lấy số lượng sản phẩm từ trường nhập liệu
                                var selectedSize = getCookie("selectedSize"); // Lấy kích thước từ Cookie
                                
                                // Gửi thông tin sản phẩm đến API để tiến hành thanh toán
                                $.post('api/cookie.php', {
                                    'action': 'add',
                                    'id': id,
                                    'num': num, // Truyền số lượng sản phẩm
                                    'size': selectedSize
                                }, function(data) {
                                    location.assign("checkout_product.php"); // Chuyển đến trang thanh toán
                                });
                            }

                            // Hàm để lấy giá trị của Cookie
                            function getCookie(name) {
                                var nameEQ = name + "=";
                                var ca = document.cookie.split(';');
                                for(var i = 0; i < ca.length; i++) {
                                    var c = ca[i];
                                    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                                }
                                return null; // Trả về null nếu không tìm thấy cookie
                            }
                        </script>

                        </div>
                        <div class="fb-comments" data-href="http://localhost/PROJECT/details.php" data-width="750" data-numposts="5"></div>

                    </section>
                </div>
            </section>
            <section class="restaurants">
                <div class="title">
                    <h1>Các sản phẩm khác tại <span class="green" style="color: #0099FF;">TORYCO 1993 STORE</span></h1>
                </div>
                <div class="product-restaurants">
    <?php
    // Kiểm tra xem ID sản phẩm đã được truyền qua tham số truy vấn trong URL chưa
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        // Lấy ID sản phẩm từ tham số truy vấn trong URL
        $product_id = $_GET['id'];

        // Tạo câu truy vấn SQL để lấy ID loại sản phẩm của sản phẩm đó
        $sql_category = "SELECT id_category FROM product WHERE id = $product_id";
        $result_category = executeSingleResult($sql_category);

        // Kiểm tra xem có kết quả trả về từ câu truy vấn SQL không
        if ($result_category && isset($result_category['id_category'])) {
            $id_category = $result_category['id_category'];

            // Tạo câu truy vấn SQL để lấy các sản phẩm cùng loại
            $sql_products = "SELECT * FROM product WHERE id_category = $id_category";
            $productList = executeResult($sql_products);

            // Kiểm tra xem có sản phẩm cùng loại hay không
            if ($productList) {
                // Hiển thị danh sách sản phẩm cùng loại
                foreach (array_reverse($productList) as $item) {
                    echo '
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <a href="single_product.php?id=' . $item['id'] . '">
                                <img class="thumbnail" src="../Admin/product/' . $item['thumbnail'] . '" alt="">
                                <div class="title">
                                    <p>' . $item['title'] . '</p>
                                </div>
                                <div class="price">
                                    <span>' . number_format($item['price'], 0, ',', '.') . ' VNĐ</span>
                                </div>
                                <div class="more">
                                    <div class="star">
                                        <img src="images/icon/icon-star.svg" alt="">
                                        <span>4.9</span>
                                    </div>
                                    <div class="time">
                                        <img src="images/icon/icon-clock.svg" alt="">
                                        <span>99 comment</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    ';
                }
            } else {
                // Hiển thị thông báo nếu không có sản phẩm cùng loại
                echo '<p>Không có sản phẩm cùng loại.</p>';
            }
        } else {
            // Hiển thị thông báo nếu không tìm thấy thông tin về loại sản phẩm của sản phẩm đó
            echo '<p>Không tìm thấy thông tin về loại sản phẩm của sản phẩm này.</p>';
        }
    } else {
        // Hiển thị thông báo nếu không có ID sản phẩm trong tham số truy vấn hoặc ID không hợp lệ
        echo '<p>Không có ID sản phẩm hoặc ID sản phẩm không hợp lệ.</p>';
    }
    ?>
</div>

            </section>
        </section>
    </div>
</main>
<?php require_once('Layout/footer.php'); ?>
<?php
session_start();
require_once('config.php');
require_once('database/dbhelper.php');

if (isset($_POST['submit'])) {
    $tendangnhap = trim($_POST['tendangnhap']);
    $matkhau = trim($_POST['matkhau']);

    // Sử dụng Prepared Statement để tránh SQL Injection
    $sql = "SELECT u.*, r.role_name 
            FROM user u
            LEFT JOIN role r ON u.role = r.id_role 
            WHERE u.tendangnhap = ? AND u.matkhau = ? LIMIT 1";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $tendangnhap, $matkhau); // Bind cả tên đăng nhập và mật khẩu
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Lưu thông tin vào session
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['fullname'] = $user['fullname'];
        $_SESSION['role'] = $user['role'];

        // Chuyển role_name về chữ thường
        $roleName = strtolower($user['role_name']);

        // Kiểm tra role_name và chuyển hướng
        if ($roleName === 'admin') {
            $redirectPath = "index.php";
        } elseif (in_array($roleName, ['manager', 'manager_2', 'manager_3', 'manager_4', 'manager_5'])) {
            $redirectPath = "../Admin/staff/manager/index_manager.php";
        } elseif (in_array($roleName, ['staff', 'staff_1', 'staff_2', 'staff_3', 'staff_4', 'staff_5'])) {
            $redirectPath = "../Admin/staff/index_staff.php";
        } else {
            $redirectPath = "index.php"; // Mặc định
        }

        // Lưu thông tin đăng nhập vào cookie nếu cần thiết
        setcookie("tendangnhap", $tendangnhap, time() + 30 * 24 * 60 * 60, '/');
        setcookie("matkhau", $matkhau, time() + 30 * 24 * 60 * 60, '/');

        // Chuyển hướng đến trang mới
        header("Location: $redirectPath");
        exit; // Dừng script để tránh tiếp tục thực thi mã sau khi chuyển hướng

    } else {
        echo '<script>alert("Tên đăng nhập hoặc mật khẩu không đúng, vui lòng thử lại.");</script>';
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
<!-- login content section start -->
<div class="login-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="tb-login-form ">
                            <h5 class="tb-title">Đăng nhập</h5>
                            <p>Đăng nhập tài khoản để trải nghiệm mua sắm tại Toryco 1993 Store</p>
                            <form action="#" method="POST">
                                <p class="checkout-coupon top log a-an">
                                    <label class="l-contact">
                                        Tên đăng nhập
                                        <em>*</em>
                                    </label>
                                    <input type="text" name="tendangnhap" required>
                                </p>
                                <p class="checkout-coupon top-down log a-an">
                                    <label class="l-contact">
                                        Mật khẩu
                                        <em>*</em>
                                    </label>
                                    <input type="password" name="matkhau" required>
                                </p>
                                
                                <div class="forgot-password1">
                                    <label class="inline2">
                                        <input type="checkbox" name="rememberme7">
                                        Remember me! <em>*</em>
                                    </label>
                                    <a class="forgot-password" href="#">Forgot Your password?</a>
                                </div>
                                <p class="login-submit5">
                                    <input class="button-primary" type="submit" name="submit" value="Đăng nhập">
                                </p>
                            </form>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
        <!-- login  content section end -->
        <hr class="opacity-20">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<?php require_once('Layout/footer.php'); ?>
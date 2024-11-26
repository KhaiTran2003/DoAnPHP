<?php
header("content-type:text/html; charset=UTF-8");
?>
<?php
require_once('../../../database/dbhelper.php');
$id_user = $fullname = $tendangnhap = $email = $diachi = $matkhau = $dienthoai = '';
if (!empty($_POST['fullname'])) {
    $fullname = '';
    if (isset($_POST['fullname'])) {
        $fullname = $_POST['fullname'];
        $fullname = str_replace('"', '\\"', $fullname);
    }
    if (isset($_POST['id_user'])) {
        $id_user = $_POST['id_user'];
    }
    if (isset($_POST['tendangnhap'])) {
        $tendangnhap = $_POST['tendangnhap'];
        $tendangnhap = str_replace('"', '\\"', $tendangnhap);
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $email = str_replace('"', '\\"', $email);
    }
    if (isset($_POST['diachi'])) {
        $diachi = $_POST['diachi'];
        $diachi = str_replace('"', '\\"', $diachi);
    }
    if (isset($_POST['matkhau'])) {
        $matkhau = $_POST['matkhau'];
        $matkhau = str_replace('"', '\\"', $matkhau);
    }
    if (isset($_POST['dienthoai'])) {
        $dienthoai = $_POST['dienthoai'];
        $dienthoai = str_replace('"', '\\"', $dienthoai);
    }
    if (!empty($fullname)) {
        // Lưu vào DB
        if ($id_user == '') {
            // Thêm khách hàng
            $sql = 'insert into user(fullname, tendangnhap, email, diachi, matkhau, dienthoai) 
            values ("' . $fullname . '","' . $tendangnhap . '","' . $email . '","' . $diachi . '","' . $matkhau . '","' . $dienthoai . '")';
        } 
        else {
            // Sửa khách hàng
            $sql = 'update user set fullname="' . $fullname . '",tendangnhap="' . $tendangnhap . '",email="' . $email . '",diachi="' . $diachi . '",matkhau="' . $matkhau . '",dienthoai="' . $dienthoai . '" where id_user=' . $id_user;
        }
        execute($sql);
        header('Location: ../user/manager_user.php');
        die();
    }
}



if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];
    $sql = 'select * from user where id_user=' . $id_user;
    $user = executeSingleResult($sql);
    if ($user != null) {
        $fullname = $user['fullname'];
        $tendangnhap = $user['tendangnhap'];
        $email = $user['email'];
        $diachi = $user['diachi'];
        $matkhau = $user['matkhau'];
        $dienthoai = $user['dienthoai'];
        
    }
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm Khách Hàng</title>
  <link rel="stylesheet" href="../../../css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScrseipt -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="../../../script.js"></script>
    <!-- Đính kèm file hover.css -->
  <link rel="stylesheet" href="../../../public/css/hover.css">
  <!-- Đính kèm file hover.js -->
  <script src="../../../public/js/hover.js"></script>
</head>

<body>
<!-- Dashboard -->
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
                <h3 class="text-success"><span class="text-info">TORYCO 1993</span>STORE</h3> 
            </a>
            
            <!-- Divider -->
            <hr class="navbar-divider my-18 opacity-20">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="../product/manager_product.php">
                            <i class="bi bi-bag-heart"></i>Quản Lý Sản Phẩm
                        </a>
                    </li>
                    <!-- Divider -->
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="../user/manager_user.php">
                            <i class="bi bi-person-check"></i>Quản Lý Khách Hàng
                        </a>
                    </li>
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="../order/manager_order.php">
                            <i class="bi bi-cash-stack"></i>Quản Lý Đơn Hàng
                        </a>
                    </li>
                    
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="../staff/manager_staff.php">
                            <i class="bi bi-person-badge"></i>Quản Lý Nhân Viên
                        </a>
                    </li>
                    
                </ul>
                <!-- Divider -->
                <hr class="navbar-divider my-18 opacity-20">
        
                <!-- Push content down -->
                <div class="mt-auto"></div>
                <!-- User (md) -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php">
                            <i class="bi bi-house-heart-fill"></i></i> Trang chủ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../logout.php" onclick="return confirm('Are you sure you want to logout?')">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Header -->
        <header class="bg-surface-primary border-bottom pt-6">
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                            <!-- Title -->
                            <h1 class="h2 mb-0 ls-tight">
                                Toryco 1993 Store</h1>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </header>
        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
               <div class="row g-6 mb-6">
                    <div class="col-xl-3 col-sm-6 col-12">
                    <a href="../product/manager_product.php" class="card shadow border-0 clickable-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Sản Phẩm</span>
                                    <span class="h3 font-bold mb-0">
                                        <?php
                                            $sql = "SELECT * FROM `product`";
                                            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                                            $result = mysqli_query($conn, $sql);
                                            echo '<span>' . mysqli_num_rows($result) . '</span>';
                                        ?>
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                        <i class="bi bi-credit-card"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-sm-6 col-12">
                    <a href="../user/manager_user.php" class="card shadow border-0 clickable-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Khách Hàng</span>
                                    <span class="h3 font-bold mb-0">
                                        <?php
                                            $sql = "SELECT * FROM `user` WHERE role IS NULL OR role = 0";
                                            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                                            $result = mysqli_query($conn, $sql);
                                            echo '<span>' . mysqli_num_rows($result) . '</span>';
                                        ?>
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                        <i class="bi bi-people"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-sm-6 col-12">
                <a href="../order/manager_order.php" class="card shadow border-0 clickable-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Đơn Hàng</span>
                                <span class="h3 font-bold mb-0">
                                    <?php
                                        $sql = "SELECT * FROM `order_details`";
                                        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                                        $result = mysqli_query($conn, $sql);
                                        echo '<span>' . mysqli_num_rows($result) . '</span>';
                                    ?>
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                    <i class="bi bi-clock-history"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            
            <div class="col-xl-3 col-sm-6 col-12">
                <a href="../staff/manager_staff.php" class="card shadow border-0 clickable-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Nhân viên</span>
                                <span class="h3 font-bold mb-0">
                                    <?php
                                        $sql = "SELECT * FROM `role`";
                                        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                                        $result = mysqli_query($conn, $sql);
                                        echo '<span>' . mysqli_num_rows($result) . '</span>';
                                    ?>
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape text-white text-lg rounded-circle" style="background-color: #6f4f28;">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            
                <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">Thông Tin Khách Hàng</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <div class="panel-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name">Tên Khách Hàng:</label>
                                        <input type="text" id="id_user" name="id_user" value="<?= $id_user ?>" hidden="true">
                                        <input required="true" type="text" class="form-control" id="fullname" name="fullname" value="<?= $fullname ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Tên Đăng Nhập:</label>
                                        <input required="true" type="text" class="form-control" id="tendangnhap" name="tendangnhap" value="<?= $tendangnhap ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Email:</label>
                                        <input required="true" type="text" class="form-control" id="email" name="email" value="<?= $email ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Địa Chỉ:</label>
                                        <input required="true" type="text" class="form-control" id="diachi" name="diachi" value="<?= $diachi ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Mật Khẩu:</label>
                                        <input required="true" type="password" class="form-control" id="matkhau" name="matkhau" value="<?= $matkhau ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Số Điện Thoại:</label>
                                        <input required="true" type="text" class="form-control" id="dienthoai" name="dienthoai" value="<?= $dienthoai ?>">
                                    </div>
                                    <hr class="navbar-divider my-3 opacity-20">
                                    <button class="btn btn-success" onclick="addUser()">Lưu</button>
                                    <?php
                                    $previous = "javascript:history.go(-1)";
                                    if (isset($_SERVER['HTTP_REFERER'])) {
                                        $previous = $_SERVER['HTTP_REFERER'];
                                    }
                                    ?>
                                    <a href="<?= $previous ?>" class="btn btn-warning">Back</a>
                                </form>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
    <script type="text/javascript">
        function addUser()
        {
            var option = confirm('Thêm User thành công')
            if (!option) {
                return;
            }
        }
    </script>
  
</body>
</html>

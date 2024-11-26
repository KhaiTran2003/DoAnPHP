
<?php require_once('../database/dbhelper.php'); ?>
<?php
header("content-type:text/html; charset=UTF-8");
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản Lý Khách Hàng</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/page.css">
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScrseipt -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="../script.js"></script>
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
                <h3 class="text-success"><span class="text-info">TORYCO 1993 </span>STORE</h3> 
            </a>
            <!-- User menu (mobile) -->
            <div class="navbar-user d-lg-none">
                <!-- Dropdown -->
                <div class="dropdown">
                    <!-- Toggle -->
                    <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-parent-child">
                            <img alt="Image Placeholder" src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar- rounded-circle">
                            <span class="avatar-child avatar-badge bg-success"></span>
                        </div>
                    </a>
                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                        <a href="#" class="dropdown-item">Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Billing</a>
                        <hr class="dropdown-divider">
                        <a href="/Main/logout.php" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <hr class="navbar-divider my-18 opacity-20">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="../product/index.php">
                            <i class="bi bi-bag-heart"></i>Quản Lý Sản Phẩm
                        </a>
                    </li>
                    <!-- Divider -->
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="../user/index.php">
                            <i class="bi bi-person-check"></i>Quản Lý Khách Hàng
                        </a>
                    </li>
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="../orders/index.php">
                            <i class="bi bi-cash-stack"></i>Quản Lý Đơn Hàng
                        </a>
                    </li>
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="../category/index.php">
                            <i class="bi bi-bag-heart"></i>Quản Lý Danh Mục
                        </a>
                    </li>
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="../staff/index.php">
                            <i class="bi bi-person-badge"></i>Quản Lý Nhân Viên
                        </a>
                    </li>
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="../supplier/index.php">
                            <i class="bi bi-truck"></i>Quản Lý Nhà Cung Cấp
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
                        <a class="nav-link" href="/Main/index.php">
                            <i class="bi bi-house-heart-fill"></i></i> Trang chủ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Main/logout.php" onclick="return confirm('Are you sure you want to logout?')">
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
                            <h1 class="h2 mb-0 ls-tight"> Toryco 1993 Store</h1>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </header>
        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <!-- Card stats -->
                <div class="row g-6 mb-6">
                    <div class="row g-6 mb-6">
                    <div class="col-xl-3 col-sm-6 col-12">
                    <a href="../product/index.php" class="card shadow border-0 clickable-card">
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
                    <a href="../user/index.php" class="card shadow border-0 clickable-card">
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
                <a href="../orders/index.php" class="card shadow border-0 clickable-card">
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
                <a href="../category/index.php" class="card shadow border-0 clickable-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Danh Mục</span>
                                <span class="h3 font-bold mb-0">
                                    <?php
                                        $sql = "SELECT * FROM `category`";
                                        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                                        $result = mysqli_query($conn, $sql);
                                        echo '<span>' . mysqli_num_rows($result) . '</span>';
                                    ?>
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                    <i class="bi bi-minecart-loaded"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-sm-6 col-12">
                <a href="../staff/index.php" class="card shadow border-0 clickable-card">
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

            <div class="col-xl-3 col-sm-6 col-12">
                <a href="../supplier/index.php" class="card shadow border-0 clickable-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Nhà Cung Cấp</span>
                                <span class="h3 font-bold mb-0">
                                    <?php
                                        $sql = "SELECT * FROM `supllier`";
                                        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                                        $result = mysqli_query($conn, $sql);
                                        echo '<span>' . mysqli_num_rows($result) . '</span>';
                                    ?>
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-dark text-white text-lg rounded-circle">
                                    <i class="bi bi-truck"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
                <div class="card shadow border-0 mb-7">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Quản Lý Khách Hàng</h5>
                        <form action="" method="GET">
                        <input type="text" name="search" placeholder="Tìm kiếm theo tên">
                        <button type="submit">Tìm kiếm</button>
                    </form>
                        <a href="add.php" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-plus"></i>
                                    </span>
                                    <span>Thêm User Mới</span>
                        </a>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Số Thứ Tự</th>
                                    <th scope="col">Tên Khách Hàng</th>
                                    <th scope="col">Tên Đăng Nhập</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Địa Chỉ</th>
                                    <th scope="col">Mật Khẩu</th>
                                    <th scope="col">Số Điện Thoại</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <tr>
                                <?php
                                    // Lấy danh sách Sản Phẩm với tính năng tìm kiếm
                                    if (!isset($_GET['page'])) {
                                        $pg = 1;
                                        echo 'Bạn đang ở trang: 1';
                                    } else {
                                        $pg = $_GET['page'];
                                        echo 'Bạn đang ở trang: ' . $pg;
                                    }

                                    try {
                                        // Lấy thông tin tìm kiếm từ form
                                        $search = isset($_GET['search']) ? trim($_GET['search']) : '';

                                        if (isset($_GET['page'])) {
                                            $page = $_GET['page'];
                                        } else {
                                            $page = 1;
                                        }
                                        $limit = 8;
                                        $start = ($page - 1) * $limit;

                                        // Cấu trúc truy vấn SQL
                                        $sql = "SELECT * FROM `user` WHERE (role IS NULL OR role = 0)";
                                        if ($search !== '') {
                                            $sql .= " AND (fullname LIKE '%$search%' OR tendangnhap LIKE '%$search%' OR email LIKE '%$search%')";
                                        }
                                        $sql .= " LIMIT $start, $limit";

                                        // Thực thi truy vấn
                                        executeResult($sql);
                                        $categoryList = executeResult($sql);

                                        $index = 1;
                                        foreach ($categoryList as $item) {
                                            echo '  <tr>
                                                        <td>' . ($index++) . '</td>
                                                        <td class="text-heading font-semibold">' . $item['fullname'] . '</td>
                                                        <td class="text-heading font-semibold">' . $item['tendangnhap'] . '</td> 
                                                        <td class="text-heading font-semibold">' . $item['email'] . '</td> 
                                                        <td class="text-heading font-semibold">' . $item['diachi'] . '</td> 
                                                        <td class="text-heading font-semibold">' . $item['matkhau'] . '</td> 
                                                        <td class="text-heading font-semibold">' . $item['dienthoai'] . '</td>                                                    
                                                        <td>
                                                            <a href="add.php?id_user=' . $item['id_user'] . '">
                                                                <button class=" btn btn-warning">Sửa</button> 
                                                            </a> 
                                                        </td>
                                                        <td>            
                                                            <button class="btn btn-danger" onclick="deleteUser(' . $item['id_user'] . ')">Xoá</button>
                                                        </td>
                                                    </tr>';
                                        }
                                    } catch (Exception $e) {
                                        die("Lỗi thực thi sql: " . $e->getMessage());
                                    }
                                ?>

                                    
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 py-5">
                        
                        <nav aria-label="Page navigation example">
                          <ul class="pagination">
                          <?php
                            $sql = "SELECT * FROM `user`";  // Sửa lại để tính toán số trang từ bảng 'user'
                            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                            $result = mysqli_query($conn, $sql);
                            $numrow = mysqli_num_rows($result);  // Đếm số lượng người dùng
                            $current_page = ceil($numrow / 8);  // 8 là số lượng người dùng trên mỗi trang
                            
                            // Hiển thị các liên kết phân trang
                            for ($i = 1; $i <= $current_page; $i++) {
                                if ($i == $page) {
                                    echo '<li class="page-item active"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                                } else {
                                    echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                                }
                            }
                        ?>
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
    <script type="text/javascript">
		function deleteUser(id_user) {
			var option = confirm('Bạn có chắc chắn muốn xoá User này không?')
			if(!option) {
				return;
			}
			// Kiểm tra role trước khi xoá
            $.get('ajax.php', {
            'id_user': id_user,
            'action': 'checkRole'
            }, function(data) {
                if (data === 'admin') {
                    alert('Không thể xoá tài khoản admin.');
                } else {
                    // Gửi yêu cầu xoá nếu không phải là tài khoản admin
                    $.post('ajax.php', {
                        'id_user': id_user,
                        'action': 'delete'
                    }, function(data) {
                        location.reload();
                    });
                }
            });
		}
	</script>
  
</body>

</html>


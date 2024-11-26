<?php
header("content-type:text/html; charset=UTF-8");
?>
<?php require_once('../../../database/dbhelper.php'); ?>

<?php

// Lấy dữ liệu từ form
$role_name = $salary = $permissions = $id_role = '';

// Kiểm tra nếu có dữ liệu từ form
if (!empty($_POST['role_name'])) {
    // Lấy và xử lý dữ liệu từ form
    $role_name = $_POST['role_name'];
    $role_name = str_replace('"', '\\"', $role_name); // Xử lý ký tự " trong tên vai trò

    if (isset($_POST['salary'])) {
        $salary = $_POST['salary'];
    }

    if (isset($_POST['permissions'])) {
        $permissions = implode(",", $_POST['permissions']);  // Chuyển mảng thành chuỗi
    }

    // Lấy id_user từ form
    if (isset($_POST['id_user'])) {
        $id_user = $_POST['id_user'];  // Lấy id_user từ form
        
        // Đặt id_user làm id_role trong bảng role
        $id_role = $id_user;  // Lấy id_user và sử dụng nó làm id_role
    }

    // Kiểm tra nếu có giá trị đầy đủ
    if (!empty($role_name) && !empty($id_role)) {
        // Lệnh SQL thêm vai trò mới vào bảng role
        $sql = 'INSERT INTO role (id_role, role_name, salary, permissions, created_at) 
                VALUES ("' . $id_role . '", "' . $role_name . '", "' . $salary . '", "' . $permissions . '", NOW())';
        
        // Thực thi câu lệnh SQL
        execute($sql);

        // Cập nhật cột role trong bảng user sau khi thêm vào bảng role
        $update_sql = 'UPDATE user SET role = "' . $id_role . '" WHERE id_user = "' . $id_user . '"';
        execute($update_sql);

        // Chuyển hướng về trang index sau khi lưu
        header('Location: manager_staff.php');  
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản Lý Khách Hàng</title>
  <link rel="stylesheet" href="../../../css/style.css">
  <link rel="stylesheet" type="text/css" href="../../../css/page.css">
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
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <!-- Card stats -->
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
                                        $sql = "SELECT * FROM `role` WHERE `id_role` NOT IN (1, 2)";
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
            <body>
            <div class="container">
                <h2 class="text-center mt-4">Thêm Nhân Viên</h2>
                <!-- Form Thêm Vai Trò -->
                    <form action="" method="POST" id="addRoleForm">
                        <div class="mb-3">
                            <label for="id_user" class="form-label">Chọn Nhân Viên</label>
                            <select class="form-select" id="id_user" name="id_user" required>
                                <option value="" disabled selected>Chọn nhân viên</option>
                                <?php 
                                // Lấy danh sách người dùng có role = 0 hoặc NULL (tức là chưa có vai trò)
                                $sql = "SELECT id_user, tendangnhap 
                                        FROM user 
                                        WHERE role IS NULL OR role = 0 "; 
                                $users = executeResult($sql);
                                foreach ($users as $user) {
                                    echo '<option value="' . $user['id_user'] . '">' . $user['tendangnhap'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="role_name" class="form-label">Vai trò</label>
                            <input type="text" class="form-control" id="role_name" name="role_name" placeholder="Nhập vai trò" required>
                        </div>

                        <div class="mb-3">
                            <label for="salary" class="form-label">Mức Lương (VNĐ)</label>
                            <input type="number" class="form-control" id="salary" name="salary" placeholder="Nhập mức lương" required>
                        </div>

                        <div class="mb-3">
                            <label for="permissions" class="form-label">Quyền Hạn</label><br>
                            <?php 
                            // Lấy danh sách quyền hạn từ bảng permissions
                            $sql = "SELECT id_permission, permission_name, des_permissions FROM permissions"; 
                            $permissions = executeResult($sql);
                            foreach ($permissions as $permission) {
                                echo '<div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="' . $permission['id_permission'] . '">
                                        <label class="form-check-label">' . $permission['des_permissions'] . '</label>
                                         
                                      </div>';
                            }
                            ?>
                        </div>

                        <div class="mb-3">
                            <label for="created_at" class="form-label">Ngày Khởi Tạo</label>
                            <input type="text" class="form-control" id="created_at" name="created_at" value="<?= date('Y-m-d H:i:s'); ?>" readonly>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" onclick="addStaff()">Thêm Nhân Viên</button>
                        </div>
                    </form>
            </div>
<script type="text/javascript">
    function addStaff() {
        var option = confirm('Thêm nhân viên thành công');
        if (!option) {
            return;
        }
    }
</script>
</body>
</html>

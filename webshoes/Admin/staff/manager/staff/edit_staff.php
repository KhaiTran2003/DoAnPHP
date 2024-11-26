<?php
header("content-type:text/html; charset=UTF-8");
?>
<?php require_once('../../../database/dbhelper.php'); ?>
<?php
header("content-type:text/html; charset=UTF-8");
?>
<?php require_once('../../../database/dbhelper.php'); ?>
<?php

    $id_role = $role_name = $salary = $permissions = $created_at = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['id_role'])) {
            $id_role = $_POST['id_role']; // ID vai trò hiện tại
        }
        if (isset($_POST['role_id'])) {
            $selected_role_id = $_POST['role_id']; // ID vai trò mới được chọn
        }

        if (isset($_POST['new_salary'])) {
            $new_salary = $_POST['new_salary']; // Mức lương mới
        }

        // Kiểm tra xem có quyền hạn nào được chọn không
        if (isset($_POST['permissions']) && !empty($_POST['permissions'])) {
            $permissions = implode(',', $_POST['permissions']); // Chuyển mảng quyền hạn thành chuỗi
        }

        // Kiểm tra xem có đủ dữ liệu không
        if (!empty($id_role) && !empty($selected_role_id) && !empty($new_salary)) {
            // Lấy thông tin vai trò từ ID được chọn
            $sql = 'SELECT role_name, salary, permissions FROM role WHERE id_role = ' . $selected_role_id;
            $new_role = executeSingleResult($sql);

            if ($new_role != null) {
                $new_role_name = $new_role['role_name'];
                $new_salary = $new_salary; // Mức lương mới từ form
                $new_permissions = $permissions; // Quyền hạn mới từ checkbox

                // Cập nhật thông tin mới cho vai trò hiện tại
                $update_sql = 'UPDATE role 
                               SET role_name = "' . $new_role_name . '", 
                                   salary = "' . $new_salary . '", 
                                   permissions = "' . $new_permissions . '" 
                               WHERE id_role = ' . $id_role;
                execute($update_sql);

                // Chuyển hướng sau khi cập nhật thành công
                header('Location: manager_staff.php');
                die();
            }
        }
    }

    // Lấy thông tin của vai trò hiện tại
    if (isset($_GET['id_role'])) {
        $id_role = $_GET['id_role'];
        $sql = 'SELECT * FROM role WHERE id_role = ' . $id_role;
        $role = executeSingleResult($sql);
        if ($role != null) {
            $role_name = $role['role_name'];
            $salary = $role['salary'];
            $permissions = $role['permissions'];
            $created_at = $role['created_at'];
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
            <div class="card shadow border-0 mb-7">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Sửa Thông Tin Nhân Viên</h5>
            </div>
            <div class="card-body">
                <!-- Hiển thị thông báo lỗi hoặc thành công -->
                <?php if (isset($success_message)): ?>
                    <div class="alert alert-success"><?= $success_message ?></div>
                <?php endif; ?>
                <?php if (isset($error_message)): ?>
                    <div class="alert alert-danger"><?= $error_message ?></div>
                <?php endif; ?>

                <!-- Form Sửa Nhân Viên -->
                <form action="" method="POST">
                    <!-- Truyền ID vai trò hiện tại -->
                    <input type="hidden" name="id_role" value="<?= $id_role ?>">

                    <div class="md-3">
                        <label for="role_id" class="form-label">Vai trò</label>
                        <select class="form-select" id="role_id" name="role_id" required>
                            <option value="" disabled selected>Chọn vai trò mới</option>
                            <?php 
                            // Lấy danh sách vai trò từ cơ sở dữ liệu
                            $sql = "SELECT id_role, role_name FROM role WHERE id_role NOT IN (1)";
                            $roles = executeResult($sql);
                            foreach ($roles as $role) {
                                echo '<option value="' . $role['id_role'] . '">' . $role['role_name'] . '</option>'; 
                            } 
                            ?> 
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="new_salary" class="form-label">Mức Lương (VNĐ)</label>
                        <input type="number" class="form-control" id="new_salary" name="new_salary" placeholder="Nhập mức lương" required>
                    </div>

                    <div class="mb-3">
                        <label for="permissions" class="form-label">Quyền Hạn</label><br>
                        <?php 
                        // Lấy danh sách quyền hạn từ bảng permissions
                        $sql = "SELECT id_permission, permission_name, des_permissions FROM permissions"; 
                        $permissions = executeResult($sql);
                        foreach ($permissions as $permission) {
                            echo '<div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="permissions[]" name="permissions[]" value="' . $permission['id_permission'] . '">
                                    <label class="form-check-label" for="permissions[]">' . $permission['des_permissions'] . '</label>
                                  </div>';
                        }
                        ?>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" onclick="addStaff()">Cập Nhật</button>
                    </div>
                </form>

            </div>
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

<?php require_once('../database/dbhelper.php'); ?>
<?php
header("content-type:text/html; charset=UTF-8");
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản Lý Sản Phẩm</title>
  <link rel="stylesheet" href="../css/style.css">
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
           
            <!-- Divider -->
            <hr class="navbar-divider my-18 opacity-20">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="staff_view_product.php">
                            <i class="bi bi-bag-heart"></i>Xem Thông Tin Sản Phẩm
                        </a>
                    </li>
                    <!-- Divider -->
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="staff_view_order.php">
                            <i class="bi bi-person-check"></i>Xem Thông Tin Đơn Hàng
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
                    <a href="staff_view_product.php" class="card shadow border-0 clickable-card">
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
                <a href="staff_view_order.php" class="card shadow border-0 clickable-card">
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
                <div class="card shadow border-0 mb-7">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Danh Sách Sản Phẩm</h5>
                <form action="" method="GET">
                    <input type="text" name="search" placeholder="Tìm kiếm theo tên">
                    <button type="submit">Tìm kiếm</button>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Số Thứ Tự</th>
                            <th scope="col">Ảnh Sản Phẩm</th>
                            <th scope="col">Tên Sản Phẩm</th>
                            <th scope="col">Danh Mục</th>
                            <th scope="col">Size : Số Lượng</th>
                            <th scope="col">Giá Sản Phẩm</th>
                            <th scope="col">Mô tả Sản Phẩm</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $imagePath = '\Admin\product/'; // Thư mục chứa ảnh
                        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

                        if (isset($_GET['search'])) {
                            $search = $_GET['search'];
                            $sql = "SELECT product.*, category.name AS category_name 
                                    FROM product
                                    JOIN category ON product.id_category = category.id
                                    WHERE product.title LIKE '%$search%'";
                        } else {
                            $sql = "SELECT product.*, category.name AS category_name 
                                    FROM product
                                    JOIN category ON product.id_category = category.id";
                        }

                        try {
                            $result = mysqli_query($conn, $sql);
                            $index = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $product_id = $row['id']; 
                                $sql_size = "SELECT size, quantity FROM product_size WHERE product_id = $product_id";
                                $result_size = mysqli_query($conn, $sql_size);

                                $size_details = [];
                                while ($size_row = mysqli_fetch_assoc($result_size)) {
                                    $size_details[] = $size_row['size'] . ' : ' . $size_row['quantity'];
                                }
                                $size_display = implode('; ', $size_details);

                                // Thêm kiểm tra đường dẫn ảnh
                                $imageFullPath = $imagePath . $row['thumbnail'];
                                echo '<tr>
                                        <td>' . ($index++) . '</td>
                                        <td style="text-align:center">
                                            <img src="' . $imageFullPath . '" alt="Product Image" class="avatar avatar-sm rounded-circle me-2">
                                        </td>
                                        <td class="text-heading font-semibold">' . $row['title'] . '</td>
                                        <td class="text-heading font-semibold">' . $row['category_name'] . '</td>
                                        <td>' . $size_display . '</td>
                                        <td>' . number_format($row['price'], 0, ',', '.') . ' VNĐ</td>
                                        <td style="max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">' . $row['content'] . '</td>
                                    </tr>';
                            }
                        } catch (Exception $e) {
                            die("Lỗi thực thi sql: " . $e->getMessage());
                        }
                        ?>


                    </tbody>
                </table>
            </div>
                    <div class="card-footer border-0 py-5">
                        
                        <nav aria-label="Page navigation example">
                          <ul class="pagination">
                          <?php
                            $sql = "SELECT * FROM `product`";
                            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result)) {
                                $numrow = mysqli_num_rows($result);
                                $current_page = ceil($numrow / 60);
                                // echo $current_page;
                            }
                            for ($i = 1; $i <= $current_page; $i++) {
                                // Nếu là trang hiện tại thì hiển thị thẻ span
                                // ngược lại hiển thị thẻ a
                                if ($i == $current_page) {
                                    echo '
                            <li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                                } else {
                                    echo '
                            <li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>
                                    ';
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
        function deleteProduct(id) {
            var option = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')
            if (!option) {
                return;
            }

            console.log(id)
            //ajax - lenh post
            $.post('delete_product.php', {
                'id': id,
                'action': 'delete'
            }, function(data) {
                location.reload()
            })
        }
    </script>
  
</body>
</html>

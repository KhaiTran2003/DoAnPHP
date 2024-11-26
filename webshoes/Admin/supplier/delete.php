<?php
header("content-type:text/html; charset=UTF-8");
require_once('../database/dbhelper.php');

if (!empty($_POST)) {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        switch ($action) {
            case 'delete':
                if (isset($_POST['id_ncc'])) {
                    $id_ncc = $_POST['id_ncc'];

                    // Kiểm tra xem id_ncc có phải là chuỗi không, nếu là chuỗi, cần bao bọc trong dấu nháy đơn
                    $sql = "DELETE FROM supllier WHERE id_ncc = '$id_ncc'"; // Đảm bảo là chuỗi

                    // In câu lệnh SQL để kiểm tra
                    echo "SQL: $sql";

                    // Thực thi câu lệnh SQL và kiểm tra kết quả
                    if (execute($sql)) {
                        echo 'success';  // Trả về success nếu xóa thành công
                    } else {
                        echo 'error';  // Trả về error nếu không thành công
                    }
                }
                break;
        }
    }
}
?>

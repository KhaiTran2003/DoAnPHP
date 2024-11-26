<?php
header("content-type:text/html; charset=UTF-8");
?>
<?php
require_once('../../../database/dbhelper.php');

if (!empty($_POST)) {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        switch ($action) {
            case 'delete':
                if (isset($_POST['id_role'])) {
                    $id_role = $_POST['id_role'];

                    $sql = 'delete from role where id_role = '.$id_role;
                    execute($sql);
                }
                break;
        }
    }
}?>
<?php
require_once('../utils/utility.php');

if(!empty($_POST)) {
	$action = getPost('action');
	$id = getPost('id');
	$num = getPost('num');
	$size = getPost('size'); // Thêm kích thước vào đây

	$cart = [];
	if(isset($_COOKIE['cart'])) {
		$json = $_COOKIE['cart']; 
		$cart = json_decode($json, true);
	}

	switch ($action) {
		case 'add':
			$isFind = false;
			for ($i=0; $i < count($cart); $i++) { 
                    if($cart[$i]['id'] == $id && $cart[$i]['size'] == $size ) {	// Kiểm tra cả id và kích thước
                        $cart[$i]['num'] += $num;
                        $isFind = true; 
                        break;
                    }		
			}

			if(!$isFind) { 
				$cart[] = [
					'id'=>$id,
					'num'=>$num,
					'size' => $size // Thêm thông tin về kích thước vào mỗi mục trong giỏ hàng
				];
			}
			setcookie('cart', json_encode($cart), time() + 30*24*60*60, '/'); 
			break;
		case 'update':
			for ($i = 0; $i < count($cart); $i++) {
				if ($cart[$i]['id'] == $id && $cart[$i]['size'] == $size) {
					$cart[$i]['num'] = $num; // Cập nhật số lượng mới
					break;
				}
			}
			setcookie('cart', json_encode($cart), time() + 30 * 24 * 60 * 60, '/');
			break;
		case 'delete':
			for ($i=0; $i < count($cart); $i++) { 
				if($cart[$i]['id'] == $id) {
					array_splice($cart, $i, 1);
					break;
				}
			}
			setcookie('cart', json_encode($cart), time() + 30*24*60*60, '/');
		break;
	}
}
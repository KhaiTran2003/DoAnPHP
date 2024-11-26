-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2024 at 09:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_shoes`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Vans New', '2024-02-07 11:50:15', '2024-11-25 11:29:42'),
(2, 'Converse', '2024-02-07 11:50:15', '2024-03-06 15:03:28'),
(3, 'Reebok', '2024-02-07 11:50:15', '2024-03-06 15:57:28'),
(4, 'New Balance', '2024-02-13 10:57:52', '2024-03-06 15:14:29'),
(5, 'Nike', '2024-02-07 11:50:15', '2024-03-06 15:57:28'),
(6, 'Adidas', '2024-02-13 10:57:52', '2024-03-06 15:14:29'),
(53, 'trankhai24k', '2024-11-22 09:19:05', '2024-11-22 09:19:05'),
(55, 'TranKhai', '2024-11-22 15:11:40', '2024-11-22 15:11:40'),
(56, 'Nike New', '2024-11-25 11:02:44', '2024-11-25 11:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message_contact` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `phone_number`, `email`, `address`, `note`, `order_date`) VALUES
(163, 'Nguyễn Văn A', '0987654321', 'nguyenvana@gmail.com', '123 Đường ABC, Quận XYZ, Thành phố Hồ Chí Minh', 'Xin giao hàng trước 5 giờ chiều', '2024-03-12 10:00:00'),
(164, 'Trần Thị B', '0123456789', 'tranthib@gmail.com', '456 Đường DEF, Quận UVW, Thành phố Hà Nội', NULL, '2024-03-12 10:30:00'),
(165, 'Lê Văn C', '0909090909', 'levanc@gmail.com', '789 Đường GHI, Quận JKL, Thành phố Đà Nẵng', 'Gọi trước khi giao hàng', '2024-03-12 11:00:00'),
(166, 'Phạm Thị D', '0363636363', 'phamthid@gmail.com', '321 Đường MNO, Quận PQR, Thành phố Cần Thơ', NULL, '2024-03-12 11:30:00'),
(172, 'Hoàng Văn E', '0123123123', 'hoangvane@gmail.com', '654 Đường STU, Quận VWX, Thành phố Hải Phòng', NULL, '2024-03-12 12:00:00'),
(173, 'Vũ Thị F', '0987098709', 'vuthif@gmail.com', '987 Đường YZT, Quận OPQ, Thành phố Nha Trang', 'Giao hàng cần gấp', '2024-03-12 12:30:00'),
(174, 'Ngô Văn G', '0908800880', 'ngovang@gmail.com', '852 Đường MNO, Quận DEF, Thành phố Vũng Tàu', NULL, '2024-03-12 13:00:00'),
(175, 'Trịnh Thị H', '0366036603', 'trinhthih@gmail.com', '741 Đường XYZ, Quận JKL, Thành phố Huế', 'Cần gói quà', '2024-03-12 13:30:00'),
(176, 'Lý Văn I', '0990099009', 'lyvani@gmail.com', '963 Đường HIJ, Quận STU, Thành phố Hạ Long', NULL, '2024-03-12 14:00:00'),
(177, 'Bùi Thị K', '0909090909', 'buithik@gmail.com', '159 Đường NOP, Quận UVW, Thành phố Cà Mau', NULL, '2024-03-12 14:30:00'),
(179, 'test 21', '032342323', 'test@gmail.com', 'vfsfd', '', '2024-11-25 07:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `size` int(2) DEFAULT NULL,
  `num` int(11) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `id_user`, `size`, `num`, `price`, `status`) VALUES
(5, 172, 5, 18, 40, 2, 150000, 'đang chuẩn bị hàng'),
(6, 173, 10, 19, 42, 1, 200000, 'đang chuẩn bị hàng'),
(7, 173, 7, 20, 41, 3, 450000, 'đang chuẩn bị hàng'),
(8, 174, 12, 20, 39, 1, 250000, 'đang chuẩn bị hàng'),
(9, 175, 8, 27, 38, 4, 600000, 'đang chuẩn bị hàng'),
(10, 172, 12, 27, 43, 2, 400000, 'đang chuẩn bị hàng'),
(172, 163, 1, 1, 40, 1, 2400000, 'Đang chuẩn bị'),
(173, 164, 2, 1, 39, 1, 2500000, 'Đang chuẩn bị'),
(176, 165, 5, 1, 37, 1, 3200000, 'Đang chuẩn bị'),
(177, 166, 4, 1, 38, 1, 1500000, 'Đã nhận hàng'),
(191, 179, 2, 1, NULL, 6, 2500000, 'Đang giao');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id_permission` int(11) NOT NULL,
  `permission_name` varchar(100) NOT NULL,
  `des_permissions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id_permission`, `permission_name`, `des_permissions`) VALUES
(1, 'all', 'Toàn quyền quản lý hệ thống'),
(2, 'view_user', 'Xem danh sách người dùng\r\n'),
(3, 'add_users', 'Thêm người dùng\r\n'),
(4, 'delete_users	', 'Xóa người dùng'),
(5, 'edit_users	', 'Chỉnh sửa thông tin người dùng\r\n'),
(6, 'view_product', 'Xem sản phẩm'),
(7, 'add_product', 'Thêm sản phẩm'),
(8, 'edit_product', 'Sửa sản phẩm'),
(9, 'delete_product', 'Xóa sản phẩm'),
(10, 'view_order', 'Xem đơn hàng'),
(11, 'add_order', 'Thêm đơn hàng'),
(12, 'edit_order', 'Sửa đơn hàng'),
(13, 'delete_order', 'Xóa đơn hàng'),
(14, 'view_category', 'Xem danh mục'),
(15, 'add_category', 'Thêm danh mục'),
(16, 'edit_category', 'Sửa danh mục'),
(17, 'delete_category', 'Xóa danh mục'),
(18, 'view_staff', 'Xem nhân viên'),
(19, 'add_staff', 'Thêm nhân viên'),
(20, 'edit_staff', 'Sửa thông tin nhân viên'),
(21, 'delete_staff', 'Xóa nhân viên'),
(22, 'view_supplier', 'Xem nhà cung cấp'),
(23, 'add_supplier', 'Thêm nhà cung cấp'),
(24, 'edit_supplier', 'Sửa thông tin nhà cung cấp'),
(25, 'delete_supplier', 'Xóa nhà cung cấp'),
(26, 'view_size', 'Xem size'),
(27, 'add_size', 'Thêm size'),
(28, 'edit_size', 'Chỉnh sửa size'),
(29, 'delete_size', 'Xóa size');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `size` int(2) DEFAULT NULL,
  `price` float NOT NULL,
  `thumbnail` varchar(500) NOT NULL,
  `thumbnail_1` varchar(500) NOT NULL,
  `thumbnail_2` varchar(500) NOT NULL,
  `thumbnail_3` varchar(500) NOT NULL,
  `thumbnail_4` varchar(500) NOT NULL,
  `thumbnail_5` varchar(500) NOT NULL,
  `content` longtext NOT NULL,
  `id_category` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `size`, `price`, `thumbnail`, `thumbnail_1`, `thumbnail_2`, `thumbnail_3`, `thumbnail_4`, `thumbnail_5`, `content`, `id_category`, `created_at`, `updated_at`) VALUES
(1, 'Vans Knu Skool', NULL, 2400000, 'v/vks/1.jpg', 'v/vks/2.jpg', 'v/vks/3.jpg', 'v/vks/4.jpg', 'v/vks/5.jpg', 'v/vks/6.jpg', 'Giày Vans Old Skool - một biểu tượng về phong cách và sự thoải mái trong thế giới giày sneaker. Với thiết kế kinh điển từ dải nửa phía trên đế đến dải bảo vệ ngón chân, Giày Vans Old Skool trở thành biểu tượng của phong cách đường phố. Với chất liệu da hoặc vải canvas, các màu sắc đa dạng và logo huyền thoại trên bên hông, mẫu giày này không chỉ thể hiện cá tính mạnh mẽ mà còn mang lại sự thoải mái suốt cả ngày.', 1, '2024-01-30 10:37:18', '2024-11-24 06:22:51'),
(2, 'Vans Sk8-Hi Rearrange', NULL, 2500000, 'v/vshr/1.jpg', 'v/vshr/2.jpg', 'v/vshr/3.jpg', 'v/vshr/4.jpg', 'v/vshr/5.jpg', 'v/vshr/6.jpg', 'Giày Vans Sk8-Hi Rearrange - sự kết hợp độc đáo giữa phong cách cổ điển và sự đột phá hiện đại. Với thiết kế cao cổ mang tính biểu tượng của dòng giày Sk8-Hi, mẫu Rearrange mang đến một cảm giác mới lạ với việc sắp xếp lại các thành phần truyền thống. Tính linh hoạt của mẫu này cho phép bạn tự do biến đổi và tái tạo với các phụ kiện và chi tiết tùy chỉnh, tạo ra một phong cách cá nhân và độc đáo.', 1, '2024-01-30 15:11:49', '2024-01-30 15:11:49'),
(3, 'Converse Chuck 70 Seasonal Color Canvas', NULL, 1300000, 'c/cc7scc/1.jpg', 'c/cc7scc/2.jpg', 'c/cc7scc/3.jpg', 'c/cc7scc/4.jpg', 'c/cc7scc/5.jpg', 'c/cc7scc/6.jpg', 'Giày Converse Chuck 70 Seasonal Color Canvas - một sự kết hợp hoàn hảo giữa phong cách cổ điển và sự sáng tạo hiện đại. Với chất liệu vải canvas cao cấp và đế giày chắc chắn, mẫu này mang lại cảm giác thoải mái và bền bỉ. Điểm nhấn là gam màu mang tính mùa vụ, tạo điểm nhấn sắc màu tươi mới cho bộ sưu tập giày của bạn. Với kiểu dáng Chuck 70 kinh điển, đây là lựa chọn hoàn hảo cho những ai yêu thích sự phá cách và cá tính.', 2, '2023-10-30 17:31:22', '2024-01-27 12:09:25'),
(4, 'Converse Run Star Hike Festival – Juicy Green Graphic', NULL, 1500000, 'c/crshf/1.jpg', 'c/crshf/2.jpg', 'c/crshf/3.jpg', 'c/crshf/4.jpg', 'c/crshf/5.jpg', 'c/crshf/6.jpg', 'Giày Converse Run Star Hike Festival – Juicy Green Graphic là sự kết hợp độc đáo giữa phong cách retro và sự sáng tạo hiện đại. Với màu sắc tươi mới Juicy Green và các đường graphic tinh tế, đây là một điểm nhấn cho bất kỳ outfit nào. Thiết kế đế nền cao Run Star Hike tạo ra vẻ ngoài đặc biệt và thoải mái cho người mang. Đây là một lựa chọn hoàn hảo cho những ai muốn thể hiện phong cách cá nhân và sự tự tin.', 2, '2023-10-30 21:59:06', '2023-10-30 21:59:06'),
(5, 'Reebok Answer DMX - White', NULL, 3200000, 'rb/rad/1.jpg', 'rb/rad/2.jpg', 'rb/rad/3.jpg', 'rb/rad/4.jpg', 'rb/rad/5.jpg', 'rb/rad/6.jpg', 'Reebok Answer DMX - White là biểu tượng của sự đẳng cấp và phong cách trong thế giới giày sneaker. Với màu trắng tinh khôi, đôi giày này mang đến vẻ đẹp tinh tế và dễ kết hợp với mọi trang phục. Thiết kế dạng cao cổ kết hợp với công nghệ DMX của Reebok giúp cung cấp sự thoải mái và hỗ trợ cho đôi chân, phù hợp cho cả những hoạt động hàng ngày và các buổi tập thể thao. Đây là sự lựa chọn lý tưởng cho những ai đang tìm kiếm sự kết hợp hoàn hảo giữa phong cách và hiệu suất.', 3, '2023-10-30 22:10:40', '2023-10-30 22:10:40'),
(6, 'Reebok Club C 85 - White : Glen Green : Solar Acid Yellow', NULL, 1800000, 'rb/rbsay/1.jpg', 'rb/rbsay/2.jpg', 'rb/rbsay/3.jpg', 'rb/rbsay/4.jpg', 'rb/rbsay/5.jpg', 'rb/rbsay/6.jpg', 'Reebok Club C 85 - White : Glen Green : Solar Acid Yellow là một sự kết hợp táo bạo và phong cách trong thế giới giày sneaker. Với màu trắng tinh khôi làm nền, điểm nhấn là các chi tiết màu Glen Green và Solar Acid Yellow, tạo nên một phong cách cá nhân và độc đáo. Thiết kế dựa trên dòng Club C 85 mang đến sự thoải mái và phong cách cổ điển. Đôi giày này không chỉ là sự lựa chọn tuyệt vời cho các buổi đi chơi hàng ngày mà còn là điểm nhấn hoàn hảo cho bất kỳ bộ trang phục nào.', 3, '2023-10-31 12:37:46', '2023-12-27 08:41:12'),
(7, 'New Balance 1906F - Phantom', NULL, 3100000, 'nb/nb1p/1.jpg', 'nb/nb1p/2.jpg', 'nb/nb1p/3.jpg', 'nb/nb1p/4.jpg', 'nb/nb1p/5.jpg', 'nb/nb1p/6.jpg', 'New Balance 1906F - Phantom: Sự Kết Hợp Tinh Tế Của Phong Cách Và Hiệu Suất', 4, '2023-10-31 12:40:58', '2023-10-31 12:40:58'),
(8, 'New Balance 1906R - Castlerock / Natural Indigo', NULL, 3200000, 'nb/nb1c/1.jpg', 'nb/nb1c/2.jpg', 'nb/nb1c/3.jpg', 'nb/nb1c/4.jpg', 'nb/nb1c/5.jpg', 'nb/nb1c/6.jpg', 'New Balance 1906R - Castlerock / Natural Indigo kết hợp màu sắc Castlerock và Natural Indigo để tạo ra phong cách độc đáo. Thiết kế thoải mái và đa năng này là sự lựa chọn hoàn hảo cho mọi hoạt động hàng ngày.', 4, '2023-10-31 12:43:18', '2023-10-31 12:43:18'),
(9, 'Nike Air Max 90 - Red Stardust', NULL, 2200000, 'n/aj1lw/1.jpg', 'n/aj1lw/2.jpg', 'n/aj1lw/3.jpg', 'n/aj1lw/4.jpg', 'n/aj1lw/5.jpg', 'n/aj1lw/6.jpg', 'Nike Air Max 90 - Red Stardust: Sự Kết Hợp Đầy Cá Tính Của Màu Đỏ Stardust. Thiết Kế Đậm Chất Thể Thao Cùng Công Nghệ Air Max Đỉnh Cao, Đôi Giày Này Sẽ Làm Nổi Bật Bước Chân Của Bạn Trong Mọi Hoàn Cảnh.', 5, '2023-10-31 12:55:56', '2023-10-31 12:55:56'),
(10, 'Air Jordan 1 Low WMNS - Sky J Orange', NULL, 3400000, 'n/aj1lw/1.jpg', 'n/aj1lw/2.jpg', 'n/aj1lw/3.jpg', 'n/aj1lw/4.jpg', 'n/aj1lw/5.jpg', 'n/aj1lw/6.jpg', 'Air Jordan 1 Low WMNS - Sky J Orange: Sự Kết Hợp Độc Đáo Của Màu Sky J Orange. Với Thiết Kế Thấp Cổ, Đôi Giày Này Mang Lại Sự Tự Tin và Phong Cách Cá Nhân. Sẵn Sàng Đồng Hành Cùng Bạn Trên Mọi Nẻo Đường và Hoạt Động Thể Thao.', 5, '2023-10-31 12:59:42', '2023-10-31 12:59:42'),
(11, 'Rivalry Low', NULL, 2200000, 'a/rl/1.jpg', 'a/rl/2.jpg', 'a/rl/3.jpg', 'a/rl/4.jpg', 'a/rl/5.jpg', 'a/rl/6.jpg', 'GIÀY RIVALRY LOW: Sự Kết Hợp Hoàn Hảo Giữa Phong Cách Đường Phố và Sự Thể Thao. Thiết Kế Thấp Cổ Mang Lại Sự Linh Hoạt và Độ Bền. Được Chế Tác Với Chất Liệu Chất Lượng Cùng Logo Đặc Trưng, Đôi Giày Này Sẽ Là Điểm Nhấn Hoàn Hảo Cho Bất Kỳ Bộ Trang Phục Nào.', 6, '2023-10-31 13:06:27', '2023-10-31 13:06:27'),
(12, 'Superstar XLG', NULL, 3000000, 'a/xs/1.jpg', 'a/xs/2.jpg', 'a/xs/3.jpg', 'a/xs/4.jpg', 'a/xs/5.jpg', 'a/xs/6.jpg', 'GIÀY SUPERSTAR XLG: Sự Kết Hợp Độc Đáo Của Phong Cách Retro và Thiết Kế Hiện Đại. Với Đế Đệm Cao Su Và Phần Mũi Giày Shell Toe Kinh Điển, Đôi Giày Này Mang Lại Sự Thoải Mái và Sự Bền Bỉ Cho Mọi Hoạt Động. Sự Xuất Hiện Của Logo Thương Hiệu Trên Thân Giày Tạo Điểm Nhấn Tinh Tế, Phản Ánh Phong Cách Cá Nhân.', 6, '2023-11-05 21:03:16', '2023-11-05 21:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `size`, `quantity`) VALUES
(1, 1, 38, 10),
(2, 1, 39, 7),
(3, 1, 40, 5),
(4, 2, 38, 8),
(5, 2, 39, 6),
(6, 2, 40, 4),
(7, 3, 38, 9),
(8, 3, 39, 8),
(9, 3, 40, 7),
(10, 4, 38, 12),
(11, 4, 39, 9),
(12, 4, 40, 6),
(13, 5, 38, 11),
(14, 5, 39, 7),
(15, 5, 40, 5),
(16, 6, 38, 8),
(17, 6, 39, 10),
(18, 6, 40, 7),
(19, 7, 38, 9),
(20, 7, 39, 8),
(21, 7, 40, 6),
(22, 8, 38, 10),
(23, 8, 39, 7),
(24, 8, 40, 5),
(25, 9, 38, 8),
(26, 9, 39, 6),
(27, 9, 40, 4),
(28, 10, 38, 9),
(29, 10, 39, 8),
(30, 10, 40, 7),
(31, 11, 38, 12),
(32, 11, 39, 9),
(33, 11, 40, 6),
(34, 12, 38, 11),
(35, 12, 39, 7),
(36, 12, 40, 5);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `salary` float NOT NULL,
  `permissions` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role_name`, `salary`, `permissions`, `created_at`) VALUES
(1, 'Admin', 100000000, '1\r\n', '2024-11-22 14:03:41'),
(2, 'Manager', 15000000, '5,7', '2024-11-22 14:05:25'),
(3, 'Manager', 111110, '7', '2024-11-22 14:05:25'),
(4, 'Staff_3', 5000000, '20,22', '2024-11-22 14:06:41'),
(5, 'Staff_3', 5000000, '21,23', '2024-11-22 14:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id_role` int(11) NOT NULL,
  `id_permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id_role`, `id_permission`) VALUES
(1, 1),
(2, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `supllier`
--

CREATE TABLE `supllier` (
  `id_ncc` varchar(10) NOT NULL,
  `TenNCC` varchar(100) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `SDT` int(11) NOT NULL,
  `MoTa` varchar(255) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supllier`
--

INSERT INTO `supllier` (`id_ncc`, `TenNCC`, `DiaChi`, `SDT`, `MoTa`, `id_category`) VALUES
('3', 'Nhà Cung Cấp A', '123 Đường ABC, TP.HCM', 901234567, 'Chuyên cung cấp sản phẩm A', 1),
('4', 'Nhà Cung Cấp B', '456 Đường DEF, Hà Nội', 912345678, 'Nhà phân phối lớn khu vực miền Bắc', 2),
('5', 'Nhà Cung Cấp C', '789 Đường GHI, Đà Nẵng', 923456789, 'Chuyên các mặt hàng cao cấp', 1),
('6', 'Nhà Cung Cấp D', '101 Đường JKL, Hải Phòng', 934567890, 'Cung cấp nguyên liệu sản xuất', 3),
('7', 'Nhà Cung Cấp E', '111 Đường MNO, Cần Thơ', 945678901, 'Phân phối độc quyền sản phẩm XYZ', 2),
('8', 'Nhà Cung Cấp F', '222 Đường PQR, Huế', 956789012, 'Nhà cung cấp thiết bị công nghiệp', 3),
('9', 'Nhà Cung Cấp G', '333 Đường STU, Vũng Tàu', 967890123, 'Cung cấp dịch vụ vận chuyển', 1),
('SUP-002', 'NCC003', 'Nha Trang', 2147483647, 'sa', 53),
('SUP-003', 'New NCC', 'Lào Cai', 872878111, 'Da thật', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `tendangnhap` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `dienthoai` int(20) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `fullname`, `tendangnhap`, `email`, `diachi`, `matkhau`, `dienthoai`, `role`) VALUES
(1, 'Admin', 'AdminShopShoes', 'admin@gmail.com', 'Nha Trang', '9999', 99999999, 1),
(2, 'manager', 'ManagerShopShoes', 'manager@gmail.com', 'Nha Trang', '12345', 123456789, 2),
(3, 'Trần Khải', 'khai2003', 'khai@gmail.com', 'Nha Trang', '12345', 99999999, 3),
(4, 'Quang Tường', 'quangtuong2002', 'tuong@gmail.com', 'Nha Trang', '12345', 99999999, 4),
(5, 'Staff', 'staff2003', 'staff@gmail.com', 'Nha Trang', '12345', 99999999, 5),
(17, 'Trần Khải', 'okok', 'trankhai6323@gmail.com', 'Nha Trang', '12345', 855542974, 6),
(18, 'Bòn Bon', 'bonbon2003', 'trankhai6323@gmail.com', 'Nha Trang', '12345', 855542974, 0),
(19, 'Bòn Bon 2', 'kaka', 'trankhai6323@gmail.com', 'Nha Trang', '12345', 855542974, 0),
(20, 'Ken', 'ken2003', 'trankhai6323@gmail.com', 'Nha Trang', '12345', 855542974, 0),
(21, 'Ben', 'ben2003', 'trankhai6323@gmail.com', 'Nha Trang', '12345', 855542974, 0),
(24, 'Kiên Long', 'kien2003', 'kien@gmail.com', 'Nha Trang', '12345', 855542974, 0),
(25, 'Ngo', 'ngoc2003', 'ngoc@gmail.com', 'Nha Trang', '12345', 99913928, 0),
(27, 'NgocY', 'ngocy2003', 'ngocy@gmail.com', 'Nha Trang', '12345', 855542974, 0),
(28, 'Tường', 'quangtuong2k2', 'tuong@gmail.com', 'Nha Trang', '12345', 70707077, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contact_order` (`order_id`),
  ADD KEY `fk_contact_user` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id_permission`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_size_product` (`product_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id_role`,`id_permission`),
  ADD KEY `fk_id_per_and_id_per_table` (`id_permission`);

--
-- Indexes for table `supllier`
--
ALTER TABLE `supllier`
  ADD PRIMARY KEY (`id_ncc`),
  ADD KEY `fk_supplier_category` (`id_category`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_role_and_id_role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id_permission` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `fk_contact_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_contact_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);

--
-- Constraints for table `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `fk_size_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `fk_id_role_and_user_role` FOREIGN KEY (`id_role`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `fk_id_per_and_id_per_table` FOREIGN KEY (`id_permission`) REFERENCES `permissions` (`id_permission`),
  ADD CONSTRAINT `fk_id_role_and_role_table` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Constraints for table `supllier`
--
ALTER TABLE `supllier`
  ADD CONSTRAINT `fk_supplier_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Vans', '2024-02-07 11:50:15', '2024-03-06 15:07:28'),
(2, 'Converse', '2024-02-07 11:50:15', '2024-03-06 15:03:28'),
(3, 'Reebok', '2024-02-07 11:50:15', '2024-03-06 15:57:28'),
(4, 'New Balance', '2024-02-13 10:57:52', '2024-03-06 15:14:29'),
(5, 'Nike', '2024-02-07 11:50:15', '2024-03-06 15:57:28'),
(6, 'Adidas', '2024-02-13 10:57:52', '2024-03-06 15:14:29');


CREATE TABLE `collection` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `collection` (`id`, `name`) VALUES
(1, 'One Piece'),
(2, 'The Spring'),
(3, 'Liliwyun');

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `orders` (`id`, `fullname`, `phone_number`, `email`, `address`, `note`, `order_date`) VALUES
(163, 'ninnin_1', '12345678', 'admin@gmail.com', 'Tphcm', 'Vans Knu Skool', '2024-01-06 22:39:49'),
(164, 'ninnin_2', '12345678', 'admin@gmail.com', 'HaNoi', 'Vans Sk8-Hi Rearrange', '2024-01-06 22:40:51'),
(165, 'ninnin_4', '12345678', 'admin@gmail.com', 'CanTho', 'Reebok Answer DMX - White', '2024-01-06 22:44:20'),
(166, 'ninnin_3', '12345678', 'admin@gmail.com', 'NhaTrang', 'Converse Run Star Hike Festival – Juicy Green Graphic', '2024-01-06 22:47:24');


CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `size` int(2) NULL,
  `num` int(11) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `id_user`,`size`, `num`, `price`, `status`) VALUES
(172, 163, 1, 1,40, 1, 2400000, 'Đang chuẩn bị'),
(173, 164, 2, 1,39, 1, 2500000, 'Đang chuẩn bị'),
(176, 165, 5, 1,37, 1, 3200000, 'Đang chuẩn bị'),
(177, 166, 4, 1,38, 1, 1500000, 'Đã nhận hàng');


CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `size` int(2) NULL,
  `price` float NOT NULL,
  `number` float NOT NULL,
  `thumbnail` varchar(500) NOT NULL,
  `thumbnail_1` varchar(500) NOT NULL,
  `thumbnail_2` varchar(500) NOT NULL,
  `thumbnail_3` varchar(500) NOT NULL,
  `thumbnail_4` varchar(500) NOT NULL,
  `thumbnail_5` varchar(500) NOT NULL,
  `content` longtext NOT NULL,
  `id_category` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `id_sanpham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `product` (`id`, `title`, `size`, `price`, `number`, `thumbnail`, `thumbnail_1`, `thumbnail_2`, `thumbnail_3`, `thumbnail_4`, `thumbnail_5`, `content`, `id_category`, `id_sanpham`, `created_at`, `updated_at`) VALUES
(1, 'Vans Knu Skool', NULL, 2400000, 10, 'v/vks/1.jpg', 'v/vks/2.jpg', 'v/vks/3.jpg', 'v/vks/4.jpg', 'v/vks/5.jpg', 'v/vks/6.jpg', 'Giày Vans Old Skool - một biểu tượng về phong cách và sự thoải mái trong thế giới giày sneaker. Với thiết kế kinh điển từ dải nửa phía trên đế đến dải bảo vệ ngón chân, Giày Vans Old Skool trở thành biểu tượng của phong cách đường phố. Với chất liệu da hoặc vải canvas, các màu sắc đa dạng và logo huyền thoại trên bên hông, mẫu giày này không chỉ thể hiện cá tính mạnh mẽ mà còn mang lại sự thoải mái suốt cả ngày.', 1,1,'2024-01-30 10:37:18', '2024-02-27 15:24:13'),
(2, 'Vans Sk8-Hi Rearrange', NULL, 2500000, 20, 'v/vshr/1.jpg', 'v/vshr/2.jpg', 'v/vshr/3.jpg', 'v/vshr/4.jpg', 'v/vshr/5.jpg', 'v/vshr/6.jpg', 'Giày Vans Sk8-Hi Rearrange - sự kết hợp độc đáo giữa phong cách cổ điển và sự đột phá hiện đại. Với thiết kế cao cổ mang tính biểu tượng của dòng giày Sk8-Hi, mẫu Rearrange mang đến một cảm giác mới lạ với việc sắp xếp lại các thành phần truyền thống. Tính linh hoạt của mẫu này cho phép bạn tự do biến đổi và tái tạo với các phụ kiện và chi tiết tùy chỉnh, tạo ra một phong cách cá nhân và độc đáo.', 1,1,'2024-01-30 15:11:49', '2024-01-30 15:11:49'),
(3, 'Vans Authentic COLOR THEORY',NULL, 1400000,20,'v/vact/1.jpg', 'v/vact/2.jpg', 'v/vact/3.jpg', 'v/vact/4.jpg', 'v/vact/5.jpg', 'v/vact/6.jpg','Vans Authentic Color Theory là sự kết hợp táo bạo giữa phong cách cổ điển và sự sáng tạo hiện đại. Với bảng màu đa dạng và độc đáo, mỗi đôi giày là một tuyên bố cá nhân về phong cách của bạn. Chất liệu vải canvas cao cấp cùng với đế ngoài chắc chắn, đảm bảo sự thoải mái và bền bỉ trong mọi hoạt động. Vans Authentic Color Theory không chỉ là một cách để diễn đạt cá nhân mà còn là biểu tượng của sự sáng tạo và phong cách tự do.',1,2, '2024-04-04 15:14:23', '2024-04-04 15:14:25' ),
(4, 'Vans Authentic Rearrange',NULL,140000,15,'v/var/1.jpg','v/var/2.jpg','v/var/3.jpg','v/var/4.jpg','v/var/3.jpg','v/var/4.jpg','Vans Authentic Rearrange mang đến một cách tiếp cận mới mẻ và sáng tạo đối với phong cách cổ điển. Với thiết kế hiện đại, các yếu tố của giày được sắp xếp lại một cách độc đáo, tạo nên một diện mạo hoàn toàn mới. Đặc biệt, dây buộc và phần thân giày có thể tháo rời và sắp xếp lại theo sở thích cá nhân, cho phép bạn tạo ra hàng ngàn tổ hợp phong cách khác nhau. Với sự linh hoạt này, Vans Authentic Rearrange không chỉ là một đôi giày, mà còn là một tác phẩm nghệ thuật di động, đánh bại mọi giới hạn trong việc thể hiện cá nhân.',1,2,'2024-04-04 15:14:26','2024-04-04 15:15:25'),
(5, 'Vans Classic Slip-On',NULL,1400000,25,'v/vcso/1.jpg','v/vcso/2.jpg','v/vcso/3.jpg','v/vcso/4.jpg','v/vcso/5.jpg','v/vcso/5.jpg','Vans Classic Slip-On là biểu tượng của phong cách đơn giản và thoải mái. Với thiết kế slip-on tiện lợi, bạn có thể dễ dàng mang và cởi giày mà không cần phải cài đặt dây buộc. Chất liệu vải canvas chắc chắn và đế cao su độ bền cao, mang lại sự thoải mái và an toàn cho bàn chân. Với phần trên đơn giản nhưng đầy phong cách, Vans Classic Slip-On không chỉ là một đôi giày, mà còn là biểu tượng của phong cách thời trang không bao giờ lỗi mốt.',1,2,'2024-04-04 15:15:25','2024-04-04 15:17:25'),
(6, 'Vans Mn Skate Half Cab',NULL,2800000,30,'v/vmshc/1.jpg','v/vmshc/2.jpg','v/vmshc/3.jpg','v/vmshc/4.jpg','v/vmshc/5.jpg','v/vmshc/6.jpg','Vans Mn Skate Half Cab là sự kết hợp hoàn hảo giữa phong cách thể thao và sự độc đáo. Thiết kế Half Cab nổi tiếng với cổ giày cao, mang lại sự hỗ trợ và bảo vệ tốt cho mắc cá. Chất liệu cao cấp kết hợp với đế đúc chắc chắn, giúp tăng cường độ bền và thoải mái trong mỗi bước đi. Với logo "Off the Wall" đặc trưng của Vans, Mn Skate Half Cab không chỉ là một sản phẩm thể thao, mà còn là biểu tượng của phong cách và cá tính.',1,3,'2024-04-04 15:19:25','2024-04-04 15:20:25'),
(7, 'Vans Mn Skate Old Skool',NULL,2200000,20,'v/vmsos/1.jpg','v/vmsos/2.jpg','v/vmsos/3.jpg','v/vmsos/4.jpg','v/vmsos/5.jpg','v/vmsos/6.jpg','Vans Mn Skate Old Skool là biểu tượng của sự kết hợp giữa phong cách skate và vẻ đẹp cổ điển. Với thiết kế đặc trưng bao gồm các đường mảnh mai, phần đế đặc trưng của Vans và logo dọc trên mảng bên ngoài, Old Skool mang lại sự phong cách và cá tính. Chất liệu vải canvas và da cao cấp kết hợp với đế đúc chắc chắn, giúp tăng cường độ bền và thoải mái trong mọi hoạt động. Vans Mn Skate Old Skool không chỉ là đôi giày, mà còn là biểu tượng về sự tự tin và phong cách.',1,3,'2024-04-04 15:20:26','2024-04-04 15:21:25'),
(8, 'Vans Ua Sk8-Hi Asia Art Collection',NULL,2000000,15,'v/vushaac/1.jpg','v/vushaac/2.jpg','v/vushaac/3.jpg','v/vushaac/4.jpg','v/vushaac/3.jpg','v/vushaac/4.jpg','Bộ sưu tập Vans UA Sk8-Hi Asia Art Collection là một sự kết hợp độc đáo giữa văn hóa truyền thống và phong cách hiện đại. Thiết kế Sk8-Hi với phần cổ cao cổ điển, kết hợp với các yếu tố nghệ thuật châu Á độc đáo, tạo nên một diện mạo đặc biệt và thu hút. Mỗi đôi giày trong bộ sưu tập này là một tuyệt tác nghệ thuật, thể hiện sự sáng tạo và đa dạng văn hóa của khu vực châu Á. Vans UA Sk8-Hi Asia Art Collection không chỉ là sản phẩm thời trang, mà còn là một phần của câu chuyện văn hóa đầy ý nghĩa.',1,2,'2024-04-04 15:22:25','2024-04-04 15:23:25'),
(9, 'Vans Sk8-Hi',NULL,2000000,35,'v/vsh/1.jpg','v/vsh/2.jpg','v/vsh/3.jpg','v/vsh/4.jpg','v/vsh/3.jpg','v/vsh/4.jpg','Vans Sk8-Hi là biểu tượng của phong cách và sự độc đáo trong làng giày sneaker. Thiết kế cao cổ với phần cổ đệm chắc chắn mang lại sự bảo vệ và thoải mái cho mắc cá. Với chất liệu da và vải canvas chất lượng cao, Sk8-Hi không chỉ bền bỉ mà còn đa dạng trong các mẫu mã và màu sắc. Đế đúc cứng cáp và đệm EVA giúp cải thiện trải nghiệm đi lại. Từ sân trường đến đường phố, Vans Sk8-Hi luôn là lựa chọn lý tưởng cho những người yêu thích phong cách và sự thoải mái.',1,1,'2024-04-04 15:24:25','2024-04-04 15:25:25'),
(10, 'Vans Ua Comfycush Old Skool',NULL,2200000,40,'v/vucos/1.jpg','v/vucos/2.jpg','v/vucos/3.jpg','v/vucos/4.jpg','v/vucos/3.jpg','v/vucos/4.jpg','Vans UA Comfycush Old Skool là sự kết hợp hoàn hảo giữa phong cách cổ điển và thoải mái hiện đại. Với công nghệ Comfycush tiên tiến, đôi giày này mang lại cảm giác êm ái và thoải mái cho bàn chân suốt cả ngày dài. Thiết kế Old Skool kinh điển với phần upper đơn giản và dây buộc có độ bền cao. Đế giữa cải tiến cung cấp sự đàn hồi và giảm chấn tốt hơn. Vans UA Comfycush Old Skool không chỉ là biểu tượng của phong cách, mà còn là sự lựa chọn hoàn hảo cho những người đánh giá cao sự thoải mái hàng ngày.',1,2,'2024-04-04 15:26:25','2024-04-04 15:27:25'),


(11, 'Converse Chuck 70 Seasonal Color Canvas', NULL, 1300000, 20, 'c/cc7scc/1.jpg', 'c/cc7scc/2.jpg', 'c/cc7scc/3.jpg', 'c/cc7scc/4.jpg', 'c/cc7scc/5.jpg', 'c/cc7scc/6.jpg', 'Giày Converse Chuck 70 Seasonal Color Canvas - một sự kết hợp hoàn hảo giữa phong cách cổ điển và sự sáng tạo hiện đại. Với chất liệu vải canvas cao cấp và đế giày chắc chắn, mẫu này mang lại cảm giác thoải mái và bền bỉ. Điểm nhấn là gam màu mang tính mùa vụ, tạo điểm nhấn sắc màu tươi mới cho bộ sưu tập giày của bạn. Với kiểu dáng Chuck 70 kinh điển, đây là lựa chọn hoàn hảo cho những ai yêu thích sự phá cách và cá tính.', 2,2, '2023-10-30 17:31:22', '2024-01-27 12:09:25'),
(12, 'Converse Run Star Hike Festival – Juicy Green Graphic', NULL, 1500000, 20, 'c/crshf/1.jpg', 'c/crshf/2.jpg', 'c/crshf/3.jpg', 'c/crshf/4.jpg', 'c/crshf/5.jpg', 'c/crshf/6.jpg', 'Giày Converse Run Star Hike Festival – Juicy Green Graphic là sự kết hợp độc đáo giữa phong cách retro và sự sáng tạo hiện đại. Với màu sắc tươi mới Juicy Green và các đường graphic tinh tế, đây là một điểm nhấn cho bất kỳ outfit nào. Thiết kế đế nền cao Run Star Hike tạo ra vẻ ngoài đặc biệt và thoải mái cho người mang. Đây là một lựa chọn hoàn hảo cho những ai muốn thể hiện phong cách cá nhân và sự tự tin.', 2,1, '2023-10-30 21:59:06', '2023-10-30 21:59:06'),
(13, 'Converse Chuck 70 At-Cx Dia De Muertos',NULL,2500000,14,'c/ccacddm/1.jpg','c/ccacddm/2.jpg','c/ccacddm/3.jpg','c/ccacddm/4.jpg','c/ccacddm/5.jpg','c/ccacddm/6.jpg','Converse Chuck 70 At-Cx Dia De Muertos là một sự kết hợp tinh tế giữa văn hóa và nghệ thuật. Lấy cảm hứng từ lễ hội Dia De Muertos (Ngày của các linh hồn), đôi giày này mang đậm tính biểu tượng và sắc màu đặc trưng của ngày lễ. Thiết kế Chuck 70 cổ điển với các chi tiết đặc biệt như hình ảnh hoa hồng, hình xương và mẫu in chân thực mang đến một cảm giác văn hóa rất độc đáo. Được làm từ chất liệu cao cấp và đế giày chắc chắn, Converse Chuck 70 At-Cx Dia De Muertos không chỉ là một đôi giày, mà còn là một tác phẩm nghệ thuật di động, thể hiện sự tôn trọng và độc đáo của văn hóa Latin.',2,3,'2024-04-04 15:29:25','2024-04-04 15:30:25'),
(14, 'Converse Chuck 70 Dia De Muertos',NULL,2500000,25,'c/ccddm/1.jpg','c/ccddm/2.jpg','c/ccddm/3.jpg','c/ccddm/4.jpg','c/ccddm/5.jpg','c/ccddm/5.jpg','Converse Chuck 70 Dia De Muertos là một biểu tượng về sự kết hợp giữa văn hóa và nghệ thuật. Được lấy cảm hứng từ lễ hội Dia De Muertos, đôi giày này mang lại sự pha trộn độc đáo của màu sắc và hình ảnh văn hóa. Thiết kế Chuck 70 cổ điển với các chi tiết đặc biệt như hình xương, hoa hồng và các biểu tượng linh thiêng. Với chất liệu cao cấp và sự chăm sóc đến từng chi tiết, Converse Chuck 70 Dia De Muertos không chỉ là một đôi giày, mà còn là một tác phẩm nghệ thuật di động, thể hiện sự tôn trọng và độc đáo của văn hóa Latin.',2,1,'2024-04-04 15:31:25','2024-04-04 15:32:25'),
(15, 'Converse Chuck Taylor All Star Lift Dia De Muertos',NULL,2500000,30,'c/cctaslddm/1.jpg','c/cctaslddm/2.jpg','c/cctaslddm/3.jpg','c/cctaslddm/4.jpg','c/cctaslddm/5.jpg','c/cctaslddm/6.jpg','Converse Chuck Taylor All Star Lift Dia De Muertos là một biểu tượng về sự kết hợp giữa văn hóa và thời trang. Lấy cảm hứng từ lễ hội Dia De Muertos, đôi giày này mang đến một diện mạo độc đáo và sắc màu với các hình ảnh và biểu tượng văn hóa Latin. Thiết kế Chuck Taylor All Star Lift với đế cao su nền tảng, tạo nên sự nổi bật và phong cách. Với chất liệu cao cấp và sự chăm sóc đến từng chi tiết, Converse Chuck Taylor All Star Lift Dia De Muertos không chỉ là một đôi giày, mà còn là một tác phẩm nghệ thuật di động, thể hiện sự tôn trọng và độc đáo của nền văn hóa Latin.',2,3,'2024-04-04 15:33:25','2024-04-04 15:34:25'),
(16, 'Converse Chuck Taylor All Star Lift Pride',NULL,2500000,15,'c/cctaslp/1.jpg','c/cctaslp/2.jpg','c/cctaslp/3.jpg','c/cctaslp/4.jpg','c/cctaslp/5.jpg','c/cctaslp/6.jpg','Converse Chuck Taylor All Star Lift Pride là biểu tượng của sự đa dạng và sự kính trọng đối với cộng đồng LGBTQ+. Được thiết kế để kỷ niệm và ủng hộ cộng đồng Pride, đôi giày này thường có các yếu tố như màu cờ cộng đồng LGBT, các thông điệp về tình yêu và sự chấp nhận, cũng như các hình ảnh và biểu tượng biểu hiện của Pride. Với phần đế nền tảng và chất liệu cao cấp, giày Converse Chuck Taylor All Star Lift Pride không chỉ là một biểu tượng thời trang mà còn là biểu tượng của sự ủng hộ và đồng thuận với cộng đồng LGBTQ+.',2,1,'2024-04-04 15:35:25','2024-04-04 15:36:25'),
(17, 'Converse Chuck Taylor All Star',NULL,1500000,30,'c/cctas/1.jpg','c/cctas/2.jpg','c/cctas/3.png','c/cctas/4.png','c/cctas/5.png','c/cctas/6.png','Converse Chuck Taylor All Star là biểu tượng của thời trang và phản ánh phong cách cá nhân. Thiết kế cổ điển với dây buộc và đế cao su nền tảng, đôi giày này đã trở thành một biểu tượng về sự thoải mái và phong cách không bao giờ lỗi mốt. Từ phiên bản cổ điển màu trắng đến các phiên bản đa dạng về màu sắc và họa tiết, Converse Chuck Taylor All Star thích hợp với mọi phong cách và dịp. Với chất liệu cao cấp và sự chăm sóc đến từng chi tiết, đây không chỉ là một đôi giày, mà còn là biểu tượng về phong cách và sự tự tin.',2,3,'2024-04-04 15:37:25','2024-04-04 15:38:25'),
(18, 'Converse Chuck Taylor Alt Star Spray Paint',NULL,2500000,10,'c/cctassp/1.jpg','c/cctassp/2.jpg','c/cctassp/3.jpg','c/cctassp/4.jpg','c/cctassp/3.jpg','c/cctassp/4.jpg','Converse Chuck Taylor Alt Star Spray Paint là sự kết hợp độc đáo giữa phong cách cổ điển và sự sáng tạo hiện đại. Với thiết kế phủ lớp sơn spray, mỗi đôi giày mang đến một diện mạo độc đáo và không giống ai. Thiết kế Chuck Taylor cổ điển với các chi tiết đặc trưng như dây buộc và đế cao su nền tảng, kết hợp với phần trên sơn màu độc đáo, tạo nên một phong cách cá nhân và nổi bật. Với sự kết hợp giữa chất liệu cao cấp và sự sáng tạo trong thiết kế, Converse Chuck Taylor Alt Star Spray Paint là lựa chọn hoàn hảo cho những ai đang tìm kiếm sự độc đáo và phong cách.',2,2,'2024-04-04 15:39:25','2024-04-04 15:40:25'),
(19, 'Converse Run Star Legacy Cx Dia De Muertos',NULL,2700000,25,'c/crslcddm/1.jpg','c/crslcddm/2.jpg','c/crslcddm/3.jpg','c/crslcddm/4.jpg','c/crslcddm/5.jpg','c/crslcddm/6.jpg','Dòng giày "Converse Run Star Legacy CX Dia De Muertos" là một biến thể đặc biệt trong bộ sưu tập của Converse, được lấy cảm hứng từ lễ hội Dia De Muertos (Ngày của các linh hồn) ở Mexico. Đây là một sự kết hợp độc đáo giữa phong cách thể thao hiện đại và yếu tố văn hóa truyền thống.',2,1,'2024-04-04 15:41:25','2024-04-04 15:42:25'),
(20, 'Converse Run Star Motion Canvas Platform Foundational',NULL,2600000,30,'c/crsmcpf/1.jpg','c/crsmcpf/2.jpg','c/crsmcpf/3.jpg','c/crsmcpf/4.jpg','c/crsmcpf/5.jpg','c/crsmcpf/5.jpg','Dòng giày "Converse Run Star Motion Canvas Platform Foundational" là một sự kết hợp độc đáo giữa phong cách thể thao và thiết kế hiện đại. Với phần thân giày làm từ chất liệu vải canvas, đôi giày này mang lại sự thoải mái và thông thoáng cho đôi chân trong mọi hoạt động. Đặc biệt, nền tảng đế cao su cung cấp sự ổn định và độ bền cao, đồng thời tạo nên một phong cách cá nhân và độc đáo. Converse Run Star Motion Canvas Platform Foundational là sự lựa chọn lý tưởng cho những người đam mê phong cách đồng thời muốn thoải mái và tự tin trong từng bước chân.',2,1,'2024-04-04 15:43:25','2024-04-04 15:44:25'),


(21, 'Reebok Answer DMX - White', NULL, 3200000, 10, 'rb/rad/1.jpg', 'rb/rad/2.jpg', 'rb/rad/3.jpg', 'rb/rad/4.jpg', 'rb/rad/5.jpg', 'rb/rad/6.jpg', 'Reebok Answer DMX - White là biểu tượng của sự đẳng cấp và phong cách trong thế giới giày sneaker. Với màu trắng tinh khôi, đôi giày này mang đến vẻ đẹp tinh tế và dễ kết hợp với mọi trang phục. Thiết kế dạng cao cổ kết hợp với công nghệ DMX của Reebok giúp cung cấp sự thoải mái và hỗ trợ cho đôi chân, phù hợp cho cả những hoạt động hàng ngày và các buổi tập thể thao. Đây là sự lựa chọn lý tưởng cho những ai đang tìm kiếm sự kết hợp hoàn hảo giữa phong cách và hiệu suất.', 3,1, '2023-10-30 22:10:40', '2023-10-30 22:10:40'),
(22, 'Reebok Club C 85 - White : Glen Green : Solar Acid Yellow', NULL, 1800000, 10, 'rb/rbsay/1.jpg', 'rb/rbsay/2.jpg', 'rb/rbsay/3.jpg', 'rb/rbsay/4.jpg', 'rb/rbsay/5.jpg', 'rb/rbsay/6.jpg', 'Reebok Club C 85 - White : Glen Green : Solar Acid Yellow là một sự kết hợp táo bạo và phong cách trong thế giới giày sneaker. Với màu trắng tinh khôi làm nền, điểm nhấn là các chi tiết màu Glen Green và Solar Acid Yellow, tạo nên một phong cách cá nhân và độc đáo. Thiết kế dựa trên dòng Club C 85 mang đến sự thoải mái và phong cách cổ điển. Đôi giày này không chỉ là sự lựa chọn tuyệt vời cho các buổi đi chơi hàng ngày mà còn là điểm nhấn hoàn hảo cho bất kỳ bộ trang phục nào.', 3,2,'2023-10-31 12:37:46', '2023-12-27 08:41:12'),
(23, 'Reebok Club C 85 Form Hi - Cloud White : Vector Blue',NULL,1600000,15,'rb/rbchfcwvb/1.jpg','rb/rbchfcwvb/2.jpg','rb/rbchfcwvb/3.jpg','rb/rbchfcwvb/4.jpg','rb/rbchfcwvb/5.jpg','rb/rbchfcwvb/5.jpg','Reebok Club C 85 Form Hi - Cloud White : Vector Blue là một biến thể hiện đại của dòng giày kinh điển Club C 85 của Reebok. Thiết kế cao cổ hiện đại cung cấp sự hỗ trợ tốt hơn cho mắc cá và tạo ra một diện mạo độc đáo và nổi bật. Màu sắc chủ đạo là màu trắng "Cloud White" kết hợp với điểm nhấn màu xanh "Vector Blue", tạo nên một sự kết hợp hài hòa giữa phong cách truyền thống và sự hiện đại. Với chất liệu chất lượng và thiết kế tinh tế, Reebok Club C 85 Form Hi - Cloud White : Vector Blue không chỉ là một đôi giày thể thao mà còn là một biểu tượng của phong cách và cá tính.',3,2,'2024-04-04 15:46:25','2024-04-04 15:47:25'),
(24, 'Reebok Club C 85 Vegan - Lilac Glow : Classic Teal',NULL,1800000,40,'rb/rbcvlgct/1.jpg','rb/rbcvlgct/2.jpg','rb/rbcvlgct/3.jpg','rb/rbcvlgct/4.jpg','rb/rbcvlgct/5.jpg','rb/rbcvlgct/5.jpg','Reebok Club C 85 Vegan - Lilac Glow : Classic Teal là một biến thể thân thiện với môi trường của dòng giày kinh điển Club C 85 của Reebok. Thiết kế này sử dụng chất liệu không chứa động vật, phản ánh cam kết của Reebok với sự bền vững và sự tôn trọng đối với môi trường. Màu sắc chủ đạo là màu tím nhạt "Lilac Glow" kết hợp với điểm nhấn màu xanh dương "Classic Teal", tạo nên một diện mạo tươi sáng và bắt mắt. Với chất liệu cao cấp và sự chăm sóc đến từng chi tiết, Reebok Club C 85 Vegan - Lilac Glow.',3,3,'2024-04-04 15:47:25','2024-04-04 15:47:25'),
(25, 'Reebok Club C Double - Cloud White',NULL,1300000,18,'rb/rbccdcw/1.jpg','rb/rbccdcw/2.jpg','rb/rbccdcw/3.jpg','rb/rbccdcw/4.jpg','rb/rbccdcw/5.jpg','rb/rbccdcw/6.jpg','Reebok Club C Double - Cloud White là một biến thể hiện đại của dòng giày kinh điển Club C của Reebok. Thiết kế này mang đậm phong cách thể thao, với đặc điểm nổi bật là đế giày kép, tạo nên sự nổi bật và độc đáo. Màu sắc chủ đạo là màu trắng "Cloud White", tạo nên một diện mạo tinh tế và thanh lịch, dễ dàng phối hợp với nhiều trang phục khác nhau. Với chất liệu chất lượng và thiết kế độc đáo, Reebok Club C Double - Cloud White là lựa chọn hoàn hảo cho những người yêu thích phong cách thể thao hiện đại.',3,1,'2024-04-04 15:48:25','2024-04-04 15:49:25'),
(26, 'Reebok Club C Revenge - White : Glen Green',NULL,1800000,24,'rb/rbcrwgg/1.jpg','rb/rbcrwgg/2.jpg','rb/rbcrwgg/3.jpg','rb/rbcrwgg/4.jpg','rb/rbcrwgg/4.jpg','rb/rbcrwgg/4.jpg','Reebok Club C Revenge - White : Glen Green là một phiên bản hiện đại của dòng giày kinh điển Club C của Reebok. Thiết kế này mang đậm phong cách thể thao, với màu sắc chủ đạo là màu trắng "White", tạo nên vẻ thanh lịch và tinh tế. Điểm nhấn màu xanh lá cây "Glen Green" trên logo và phần đế giày tạo nên sự nổi bật và cá nhân hóa cho đôi giày. Với chất liệu chất lượng và thiết kế đẳng cấp, Reebok Club C Revenge - White : Glen Green là một lựa chọn hoàn hảo cho những ai đang tìm kiếm sự kết hợp giữa phong cách và thoải mái.',3,1,'2024-04-04 15:50:25','2024-04-04 15:51:25'),
(27, 'Reebok Court Advance - Midnight Navy : Yellow',NULL,1000000,40,'rb/rbcamn/1.jpg','rb/rbcamn/2.jpg','rb/rbcamn/3.jpg','rb/rbcamn/4.jpg','rb/rbcamn/5.jpg','rb/rbcamn/5.jpg','Reebok Court Advance - Midnight Navy : Yellow là sự kết hợp tinh tế giữa phong cách retro và màu sắc sáng tạo. Thiết kế này mang đậm dấu ấn của thập niên 80 với dây buộc màu sắc và kiểu dáng đặc trưng. Màu xanh đậm "Midnight Navy" tạo nên nền tảng cho sự nổi bật của màu vàng "Yellow", tạo ra một sự tương phản đầy cuốn hút. Với chất liệu chất lượng và thiết kế độc đáo, Reebok Court Advance - Midnight Navy : Yellow là một sự lựa chọn tuyệt vời cho những ai yêu thích phong cách retro và cá tính.',3,2,'2024-04-04 15:53:25','2024-04-04 15:54:25'),
(28, 'Reebok LX2200 - Pure Grey : Steely Blue',NULL,1000000,33,'rb/rblpgsb/1.jpg','rb/rblpgsb/2.jpg','rb/rblpgsb/3.jpg','rb/rblpgsb/4.jpg','rb/rblpgsb/5.jpg','rb/rblpgsb/6.jpg','Reebok LX2200 - Pure Grey : Steely Blue là sự kết hợp tinh tế giữa phong cách hiện đại và màu sắc độc đáo. Thiết kế này mang đậm dấu ấn của phong cách thể thao, với kiểu dáng đặc trưng và chất liệu cao cấp. Màu xám "Pure Grey" tạo nền tảng cho sự nổi bật của màu xanh "Steely Blue", tạo ra một sự tương phản hài hòa và cuốn hút. Với chất liệu chất lượng và thiết kế độc đáo, Reebok LX2200 - Pure Grey : Steely Blue là một lựa chọn tuyệt vời cho những ai đang tìm kiếm sự thoải mái và phong cách.',3,3,'2024-04-04 15:55:25','2024-04-04 15:56:25'),
(29, 'Reebok Nano X2 - Cloud White',NULL,1300000,34,'rb/rbnxcw/1.jpg','rb/rbnxcw/2.jpg','rb/rbnxcw/3.jpg','rb/rbnxcw/4.jpg','rb/rbnxcw/5.jpg','rb/rbnxcw/6.jpg','Reebok Nano X2 - Cloud White là một phiên bản mới của dòng giày thể thao Nano X của Reebok, với màu sắc chủ đạo là màu trắng "Cloud White". Thiết kế này chủ yếu tập trung vào sự thoải mái và hiệu suất, được tối ưu hóa cho các hoạt động thể chất đa dạng như tập gym, đi bộ, hay các bài tập sức mạnh. Với chất liệu cao cấp và công nghệ tiên tiến, Reebok Nano X2 - Cloud White cung cấp sự hỗ trợ và ổn định cho bàn chân trong mọi hoạt động, cũng như tạo nên một diện mạo thời trang và hiện đại.',3,1,'2024-04-04 15:57:25','2024-04-04 15:58:25'),
(30, 'Reebok Royal Complete Clean 2.0 - Black : Black',NULL,1000000,45,'rb/rbrccbb/1.jpg','rb/rbrccbb/2.jpg','rb/rbrccbb/3.jpg','rb/rbrccbb/4.jpg','rb/rbrccbb/5.jpg','rb/rbrccbb/6.jpg','Reebok Royal Complete Clean 2.0 - Black : Black là một phiên bản mới của dòng giày thể thao Reebok Royal Complete Clean, với màu sắc chủ đạo là màu đen "Black". Thiết kế này mang đậm phong cách cổ điển và thanh lịch, với đặc điểm là một gam màu đồng nhất, tạo nên một vẻ ngoài đơn giản và sang trọng. Với chất liệu cao cấp và đế giày êm ái, Reebok Royal Complete Clean 2.0 - Black : Black là một lựa chọn lý tưởng cho những ai ưa thích phong cách tinh tế và đẳng cấp.',3,2,'2024-04-04 16:01:25','2024-04-04 16:03:25'),


(31, 'New Balance 1906F - Phantom', NULL, 3100000, 20, 'nb/nb1p/1.jpg', 'nb/nb1p/2.jpg', 'nb/nb1p/3.jpg', 'nb/nb1p/4.jpg', 'nb/nb1p/5.jpg', 'nb/nb1p/6.jpg', 'Dòng giày New Balance 1906F - Phantom mang đến sự kết hợp tinh tế giữa phong cách và hiệu suất. Với thiết kế độc đáo và chất liệu cao cấp, đây là sự lựa chọn lý tưởng cho những người yêu thích phong cách thể thao và đẳng cấp. Màu sắc "Phantom" tạo nên vẻ đẹp thanh lịch và tinh tế, phù hợp với nhiều dịp khác nhau. Đế giày êm ái và linh hoạt giúp tăng cường trải nghiệm đi lại, trong khi logo New Balance thể hiện sự đẳng cấp và uy tín của thương hiệu. Với New Balance 1906F - Phantom, bạn sẽ tự tin', 4,1, '2023-10-31 12:40:58', '2023-10-31 12:40:58'),
(32, 'New Balance 1906R - Castlerock / Natural Indigo', NULL, 3200000, 20, 'nb/nb1c/1.jpg', 'nb/nb1c/2.jpg', 'nb/nb1c/3.jpg', 'nb/nb1c/4.jpg', 'nb/nb1c/5.jpg', 'nb/nb1c/6.jpg', 'New Balance 1906R - Castlerock / Natural Indigo kết hợp màu sắc Castlerock và Natural Indigo để tạo ra phong cách độc đáo. Thiết kế thoải mái và đa năng này là sự lựa chọn hoàn hảo cho mọi hoạt động hàng ngày.', 4,1, '2023-10-31 12:43:18', '2023-10-31 12:43:18'),
(33, 'New Balance 237 - White : Black',NULL,1400000,45,'nb/nbwb/1.jpeg','nb/nbwb/2.jpeg','nb/nbwb/3.jpeg','nb/nbwb/4.jpeg','nb/nbwb/5.jpeg','nb/nbwb/5.jpeg','Dòng giày New Balance 237 - White : Black là sự kết hợp tinh tế giữa phong cách retro và hiện đại. Với màu sắc chủ đạo là trắng "White", điểm nhấn màu đen "Black" tạo nên sự tương phản và cá tính cho đôi giày. Thiết kế này mang đậm dấu ấn của thập niên 70, với đặc điểm là phần đế giày đậm chất retro và logo New Balance cổ điển. Chất liệu cao cấp và độ bền vững được kỳ công tạo nên từng đôi giày, mang lại sự thoải mái và phong cách cho người mang. New Balance 237 - White : Black không chỉ là một đôi giày, mà còn là một biểu tượng thời trang mang đậm tính cá nhân và phong cách.',4,3,'2024-04-04 16:05:25','2024-04-04 16:06:25'),
(34, 'New Balance 327 - Black : Mineral Red',NULL,1500000,40,'nb/nbbmr/1.jpg','nb/nbbmr/2.jpg','nb/nbbmr/3.jpg','nb/nbbmr/4.jpg','nb/nbbmr/5.jpg','nb/nbbmr/5.jpg','Dòng giày New Balance 327 - Black : Mineral Red kết hợp giữa phong cách retro và hiện đại, tạo ra một diện mạo độc đáo và nổi bật. Với màu sắc chủ đạo là đen "Black", điểm nhấn màu "Mineral Red" tạo ra sự tương phản và cá tính cho đôi giày. Thiết kế này lấy cảm hứng từ thập niên 70 với phần đế giày có kiểu dáng độc đáo và phần upper thiết kế hiện đại. Chất liệu cao cấp và độ bền vững được kỳ công tạo nên từng đôi giày, mang lại sự thoải mái và phong cách cho người mang. New Balance 327 - Black : Mineral Red là lựa chọn tuyệt vời cho những ai muốn tỏa sáng và thể hiện cá tính trong bước đi.',4,1,'2024-04-04 16:07:25','2024-04-04 16:08:25'),
(35, 'New Balance 327 - Blue',NULL,1500000,40,'nb/nb327/1.jpg','nb/nb327/2.jpg','nb/nb327/3.jpg','nb/nb327/4.jpg','nb/nb327/5.jpg','nb/nb327/6.jpg','New Balance 327 - Blue là một biến thể của dòng giày New Balance 327, với màu sắc chủ đạo là màu xanh "Blue". Thiết kế này kết hợp giữa phong cách retro và hiện đại, tạo ra một diện mạo độc đáo và cá tính. Đôi giày có phần upper được làm từ chất liệu chất lượng cao, với các đường may và các chi tiết thiết kế tinh tế. Đặc biệt, phần đế giày có kiểu dáng độc đáo và phản ánh phong cách thập niên 70. New Balance 327 - Blue là lựa chọn tuyệt vời cho những ai yêu thích sự thoải mái và phong cách độc đáo.',4,1,'2024-04-04 16:09:25','2024-04-04 16:10:25'),
(36, 'New Balance 530 - White : Black',NULL,1800000,10,'nb/nb530wb/1.jpg','nb/nb530wb/2.jpg','nb/nb530wb/3.jpg','nb/nb530wb/4.jpg','nb/nb530wb/5.jpg','nb/nb530wb/5.jpg','Dòng giày New Balance 530 - White : Black kết hợp giữa phong cách retro và hiện đại, tạo ra một diện mạo đẳng cấp và thời thượng. Với màu sắc chủ đạo là trắng "White", điểm nhấn màu "Black" tạo ra sự tương phản và cá tính cho đôi giày. Thiết kế này mang lại cảm giác thoải mái và linh hoạt nhờ vào chất liệu cao cấp và đế giày có thiết kế đặc biệt. Với sự kết hợp giữa phong cách và hiệu suất, New Balance 530 - White : Black là một lựa chọn tuyệt vời cho những người muốn tự tin và nổi bật trong mọi hoàn cảnh.',4,3,'2024-04-04 16:11:25','2024-04-04 16:12:25'),
(37, 'New Balance 550 - Beige : Team Royal',NULL,1500000,40,'nb/nb550btr/1.jpg','nb/nb550btr/2.jpg','nb/nb550btr/3.jpg','nb/nb550btr/4.jpg','nb/nb550btr/5.jpg','nb/nb550btr/5.jpg','Dòng giày New Balance 550 - Beige : Team Royal là sự kết hợp độc đáo giữa phong cách retro và hiện đại, tạo nên một diện mạo đẳng cấp và sành điệu. Với màu sắc chủ đạo là màu be "Beige", phối hợp với điểm nhấn màu xanh "Team Royal", đôi giày này tạo ra sự tương phản và cá tính đặc biệt. Thiết kế truyền thống với phần đế giày cao su và phần upper được làm từ chất liệu chất lượng cao, mang lại cảm giác thoải mái và bền bỉ. New Balance 550 - Beige : Team Royal là lựa chọn hoàn hảo cho những người yêu thích phong cách độc đáo và đẳng cấp.',4,1,'2024-04-04 16:13:25','2024-04-04 16:14:25'),
(38, 'New Balance 574T - Black:Purple',NULL,1200000,34,'nb/nb574bp/1.jpg','nb/nb574bp/2.jpg','nb/nb574bp/3.jpg','nb/nb574bp/4.jpg','nb/nb574bp/5.jpg','nb/nb574bp/5.jpg','Dòng giày New Balance 574T - Black:Purple mang lại sự kết hợp độc đáo giữa phong cách thể thao và cá nhân. Với màu sắc chủ đạo là màu đen "Black", điểm nhấn màu tím "Purple" tạo ra một diện mạo độc đáo và nổi bật cho đôi giày này. Thiết kế mang đậm dấu ấn của phong cách retro, với phần upper được làm từ chất liệu chất lượng cao và phần đế giày có độ đàn hồi tốt, mang lại cảm giác thoải mái và linh hoạt cho người mang. New Balance 574T - Black:Purple là lựa chọn hoàn hảo cho những người muốn thể hiện phong cách cá nhân và sành điệu trong mọi hoàn cảnh.',4,2,'2024-04-04 16:15:25','2024-04-04 16:16:25'),
(39, 'New Balance 2002R - Black : White',NULL,2900000,24,'nb/nb2002bl/1.jpg','nb/nb2002bl/2.jpg','nb/nb2002bl/3.jpg','nb/nb2002bl/4.jpg','nb/nb2002bl/5.jpg','nb/nb2002bl/5.jpg','Dòng giày New Balance 2002R - Black : White là sự kết hợp tuyệt vời giữa phong cách retro và hiện đại. Với màu sắc chủ đạo là màu đen "Black", điểm nhấn màu trắng "White" tạo ra một diện mạo đẳng cấp và tinh tế cho đôi giày này. Thiết kế của New Balance 2002R lấy cảm hứng từ thập niên 2000 với các đường nét tỉ mỉ và kiểu dáng hiện đại. Chất liệu chất lượng cao và đế giày êm ái giúp mang lại sự thoải mái và linh hoạt cho người mang. New Balance 2002R - Black : White là lựa chọn hoàn hảo cho những ai đam mê phong cách và hiệu suất.',4,1,'2024-04-04 16:17:25','2024-04-04 16:18:25'),
(40, 'New Balance 2002R Protection Pack - Eclipse',NULL,3600000,45,'nb/nb2002ppe/1.jpg','nb/nb2002ppe/2.jpg','nb/nb2002ppe/3.jpg','nb/nb2002ppe/4.jpg','nb/nb2002ppe/5.jpg','nb/nb2002ppe/5.jpg','Dòng giày New Balance 2002R Protection Pack - Eclipse là một biến thể đặc biệt của dòng 2002R, thiết kế để đối phó với điều kiện thời tiết khắc nghiệt và môi trường đô thị. Với màu sắc chủ đạo là màu "Eclipse", đây là một gam màu sâu và bí ẩn, tạo nên sự linh hoạt trong việc phối hợp trang phục. Thiết kế của giày được cải tiến để tăng cường độ bền và khả năng chịu lực, đồng thời vẫn giữ nguyên vẻ ngoài thời trang và phong cách. Đế giày được thiết kế với công nghệ tiên tiến để cung cấp sự thoải mái và độ bền trong mọi hoàn cảnh, từ đường phố đến các hoạt động thể thao. New Balance 2002R Protection Pack - Eclipse là sự lựa chọn lý tưởng cho những ai đang tìm kiếm sự kết hợp giữa phong cách và chức năng.',4,3,'2024-04-04 16:19:25','2024-04-04 16:20:25'),


(41, 'Nike Air Max 90 - Red Stardust', NULL, 2200000, 15, 'n/nam9r/1.jpg', 'n/nam9r/2.jpg', 'n/nam9r/3.jpg', 'n/nam9r/4.jpg', 'n/nam9r/5.jpg', 'n/nam9r/4.jpg', 'Nike Air Max 90 - Red Stardust: Sự Kết Hợp Đầy Cá Tính Của Màu Đỏ Stardust. Thiết Kế Đậm Chất Thể Thao Cùng Công Nghệ Air Max Đỉnh Cao, Đôi Giày Này Sẽ Làm Nổi Bật Bước Chân Của Bạn Trong Mọi Hoàn Cảnh.', 5,3,'2023-10-31 12:55:56', '2024-04-08 05:54:17'),
(42, 'Air Jordan 1 Low WMNS - Sky J Orange', NULL, 3400000, 20, 'n/aj1lw/1.jpg', 'n/aj1lw/2.jpg', 'n/aj1lw/3.jpg', 'n/aj1lw/4.jpg', 'n/aj1lw/5.jpg', 'n/aj1lw/6.jpg', 'Air Jordan 1 Low WMNS - Sky J Orange: Sự Kết Hợp Độc Đáo Của Màu Sky J Orange. Với Thiết Kế Thấp Cổ, Đôi Giày Này Mang Lại Sự Tự Tin và Phong Cách Cá Nhân. Sẵn Sàng Đồng Hành Cùng Bạn Trên Mọi Nẻo Đường và Hoạt Động Thể Thao.', 5,1,'2023-10-31 12:59:42', '2023-10-31 12:59:42'),
(43, 'Air Jordan 1 Low - Black : Gym Red',NULL,2900000,54,'n/aj1lbgr/1.jpg','n/aj1lbgr/2.jpg','n/aj1lbgr/3.jpg','n/aj1lbgr/4.jpg','n/aj1lbgr/5.jpg','n/aj1lbgr/5.jpg','Dòng giày Air Jordan 1 Low - Black : Gym Red là một biến thể độc đáo của biểu tượng vĩ đại Air Jordan 1, với màu đen "Black" và điểm nhấn màu đỏ "Gym Red". Thiết kế này mang đậm dấu ấn của phong cách streetwear và basketball, tạo ra một diện mạo cá nhân và nổi bật. Phần upper của giày được làm từ chất liệu chất lượng cao, đảm bảo sự thoải mái và độ bền. Đặc biệt, đế giày được thiết kế với công nghệ tiên tiến, cung cấp sự hỗ trợ và độ êm ái trong mọi hoạt động. Air Jordan 1 Low - Black : Gym Red là lựa chọn tuyệt vời cho những ai yêu thích phong cách cá nhân và đam mê văn hóa sneaker.',5,1,'2024-04-04 16:21:25','2024-04-04 16:22:25'),
(44, 'Air Jordan 1 Low GS - White : Black',NULL,2500000,25,'n/aj1lgwb/1.jpg','n/aj1lgwb/2.jpg','n/aj1lgwb/3.jpg','n/aj1lgwb/4.jpg','n/aj1lgwb/5.jpg','n/aj1lgwb/5.jpg','Dòng giày Air Jordan 1 Low GS - White : Black là một biến thể đặc biệt của biểu tượng văn hóa sneaker Air Jordan 1, được thiết kế đặc biệt cho cả giới trẻ. Với màu trắng "White" làm màu chủ đạo và điểm nhấn màu đen "Black", đôi giày này tạo ra sự tương phản tuyệt vời và cá tính. Phần upper của giày được làm từ chất liệu chất lượng cao, đảm bảo sự thoải mái và độ bền. Đế giày được thiết kế với công nghệ tiên tiến, mang lại sự hỗ trợ và độ êm ái trong mọi hoạt động. Air Jordan 1 Low GS - White : Black là lựa chọn hoàn hảo cho các bạn trẻ đam mê thể thao và văn hóa sneaker.',5,2,'2024-04-04 16:24:25','2024-04-04 16:24:25'),
(45, 'Air Jordan 4 - Bred Reimagined',NULL,8000000,44,'n/aj4br/1.jpg','n/aj4br/2.jpg','n/aj4br/3.jpg','n/aj4br/4.jpg','n/aj4br/5.jpg','n/aj4br/5.jpg','Dòng giày Air Jordan 4 - Bred Reimagined là sự tái hiện độc đáo của phiên bản kinh điển Air Jordan 4 "Bred". Với sự sáng tạo và cải biên trong thiết kế, dòng này mang lại sự phá cách và mới mẻ, đồng thời vẫn giữ được vẻ đẳng cấp và sức hút của phiên bản gốc.',5,3,'2024-04-04 16:26:25','2024-04-04 16:27:25'),
(46, 'Air Jordan 4 Craft - Olive',NULL,6100000,43,'n/aj4co/1.jpg','n/aj4co/2.jpg','n/aj4co/3.jpg','n/aj4co/4.jpg','n/aj4co/5.jpg','n/aj4co/5.jpg','Dòng giày Air Jordan 4 Craft - Olive là một phiên bản mới của Air Jordan 4 với sự cải biên và nâng cấp về chất liệu và thiết kế. Với màu xanh olive làm chủ đạo, đây là một sự kết hợp độc đáo giữa phong cách thể thao và tính cách. Thiết kế Craft mang lại sự sang trọng và đẳng cấp, đồng thời vẫn giữ được sự thoải mái và độ bền từ Air Jordan 4 gốc.',5,1,'2024-04-04 16:28:25','2024-04-04 16:29:25'),
(47, 'Nike Air Max 90 Premium - Flax',NULL,3200000,34,'n/nam90pf/1.jpg','n/nam90pf/2.jpg','n/nam90pf/3.jpg','n/nam90pf/4.jpg','n/nam90pf/5.jpg','n/nam90pf/5.jpg','Nike Air Max 90 Premium - Flax là một biến thể đặc biệt của dòng Air Max 90, với màu nâu "Flax" làm chủ đạo, tạo nên một diện mạo ấm áp và sang trọng. Thiết kế này mang đậm dấu ấn của phong cách đường phố và sự thoải mái của Air Max 90, với phần upper được làm từ chất liệu chất lượng cao và phần đế giày với công nghệ Air Max mang lại sự êm ái và linh hoạt trong mọi hoạt động. Nike Air Max 90 Premium - Flax là sự lựa chọn tuyệt vời cho những người yêu thích phong cách cá nhân và đẳng cấp.',5,2,'2024-04-04 16:30:25','2024-04-04 16:31:25'),
(48, 'Nike Dunk Low Retro - Team Gold',NULL,2900000,24,'n/ndlrtg/1.jpg','n/ndlrtg/2.jpg','n/ndlrtg/3.jpg','n/ndlrtg/4.jpg','n/ndlrtg/5.jpg','n/ndlrtg/6.jpg','Nike Dunk Low Retro - Team Gold là một phiên bản tái phát của dòng giày Nike Dunk Low, với màu vàng "Team Gold" làm chủ đạo, tạo nên một diện mạo rực rỡ và đầy cá tính. Thiết kế này mang đậm dấu ấn của phong cách retro và streetwear, với phần upper được làm từ chất liệu chất lượng cao và phần đế giày với công nghệ hiện đại để mang lại sự thoải mái và độ bền. Nike Dunk Low Retro - Team Gold là sự lựa chọn lý tưởng cho những người muốn thể hiện phong cách và sự cá tính trong mọi hoàn cảnh.',5,3,'2024-04-04 16:33:25','2024-04-04 16:34:25'),
(49, 'Nike Full Force Low - White : Polar',NULL,2700000,22,'n/nfflwp/1.jpg','n/nfflwp/2.jpg','n/nfflwp/3.jpg','n/nfflwp/4.jpg','n/nfflwp/5.jpg','n/nfflwp/5.jpg','Nike Full Force Low - White : Polar là một biến thể của dòng giày Nike Full Force, với màu trắng "White" làm chủ đạo và điểm nhấn màu "Polar". Thiết kế này mang đậm phong cách thể thao và streetwear, tạo ra một diện mạo đơn giản nhưng vẫn rất cá tính. Phần upper được làm từ chất liệu cao cấp, đảm bảo sự thoải mái và độ bền. Đế giày được thiết kế để cung cấp sự ổn định và linh hoạt trong mọi hoạt động. Nike Full Force Low - White : Polar là sự lựa chọn hoàn hảo cho những người muốn thể hiện phong cách độc đáo và sành điệu.',5,1,'2024-04-04 16:35:25','2024-04-04 16:36:25'),


(50, 'Rivalry Low', NULL, 2200000, 10, 'a/rl/1.jpg', 'a/rl/2.jpg', 'a/rl/3.jpg', 'a/rl/4.jpg', 'a/rl/5.jpg', 'a/rl/6.jpg', 'GIÀY RIVALRY LOW: Sự Kết Hợp Hoàn Hảo Giữa Phong Cách Đường Phố và Sự Thể Thao. Thiết Kế Thấp Cổ Mang Lại Sự Linh Hoạt và Độ Bền. Được Chế Tác Với Chất Liệu Chất Lượng Cùng Logo Đặc Trưng, Đôi Giày Này Sẽ Là Điểm Nhấn Hoàn Hảo Cho Bất Kỳ Bộ Trang Phục Nào.', 6,1, '2023-10-31 13:06:27', '2023-10-31 13:06:27'),
(51, 'Superstar XLG', NULL, 3000000, 15, 'a/xs/1.jpg', 'a/xs/2.jpg', 'a/xs/3.jpg', 'a/xs/4.jpg', 'a/xs/5.jpg', 'a/xs/6.jpg', 'GIÀY SUPERSTAR XLG: Sự Kết Hợp Độc Đáo Của Phong Cách Retro và Thiết Kế Hiện Đại. Với Đế Đệm Cao Su Và Phần Mũi Giày Shell Toe Kinh Điển, Đôi Giày Này Mang Lại Sự Thoải Mái và Sự Bền Bỉ Cho Mọi Hoạt Động. Sự Xuất Hiện Của Logo Thương Hiệu Trên Thân Giày Tạo Điểm Nhấn Tinh Tế, Phản Ánh Phong Cách Cá Nhân.', 6,3,'2023-11-05 21:03:16', '2023-11-05 21:03:16'),
(52, 'ADIFOM CLIMACOOL',NULL,2600000,22,'a/ac/1.jpg','a/ac/2.jpg','a/ac/3.jpg','a/ac/4.jpg','a/ac/3.jpg','a/ac/4.jpg','',6,1,'2024-04-04 16:37:25','2024-04-04 16:38:25'),
(53, 'CAMPUS 00S',NULL,2600000,54,'a/coos/1.jpg','a/coos/2.jpg','a/coos/3.jpg','a/coos/4.jpg','a/coos/3.jpg','a/coos/4.jpg','dòng giày Adidas Campus, một trong những dòng sản phẩm phổ biến của Adidas, được ra mắt vào những năm 1980 và được tái phát hành nhiều lần sau đó.',6,2,'2024-04-04 16:39:25','2024-04-04 16:40:25'),
(54, 'ß',NULL,2500000,26,'a/gg/1.jpg','a/gg/2.jpg','a/gg/3.jpg','a/gg/4.jpg','a/gg/3.jpg','a/gg/4.jpg','',6,2,'2024-04-04 16:41:25','2024-04-04 16:42:25'),
(55, 'HANDBALL SPEZIAL',NULL,2900000,44,'a/hs/1.jpg','a/hs/2.jpg','a/hs/3.jpg','a/hs/4.jpg','a/hs/5.jpg','a/hs/5.jpg','',6,1,'2024-04-04 16:43:25','2024-04-04 16:44:25'),
(56, 'SUPERSTAR XLG ATMOS',NULL,2800000,32,'a/sxa/1.jpg','a/sxa/2.jpg','a/sxa/3.jpg','a/sxa/4.jpg','a/sxa/3.jpg','a/sxa/4.jpg','',6,2,'2024-04-04 16:45:25','2024-04-04 16:46:25'),
(57, 'SUPERSTAR XLG ESSENCE',NULL,3000000,28,'a/sxe/1.jpg','a/sxe/2.jpg','a/sxe/3.jpg','a/sxe/4.jpg','a/sxe/3.jpg','a/sxe/4.jpg','',6,3,'2024-04-04 16:47:25','2024-04-04 16:48:25'),
(58, 'SUPERSTAR',NULL,2600000,30,'a/s/1.jpg','a/s/2.jpg','a/s/3.jpg','a/s/4.jpg','a/s/3.jpg','a/s/4.jpg','',6,1,'2024-04-04 16:49:25','2024-04-04 16:50:25'),
(59, 'Samba OG',NULL,2700000,42,'a/so/1.jpg','a/so/1.jpg','a/so/1.jpg','a/so/1.jpg','a/so/1.jpg','a/so/1.jpg','',6,3,'2024-04-04 16:51:25','2024-04-04 16:52:25');

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `tenadmin` varchar(100) NOT NULL,
  `tendangnhap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `dienthoai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_admin` (`id_admin`, `tenadmin`, `tendangnhap`, `email`, `diachi`, `matkhau`, `dienthoai`) VALUES
(1, 'quangtuong', 'Admin_Tuong', 'admin_tuong@gmail.com', 'Nha Trang', '9999', '012345678');

CREATE TABLE `tbl_dangky` (
  `id_dangky` int(11) NOT NULL,
  `tenkhachhang` varchar(200) NOT NULL,
  `tendangnhap` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `dienthoai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_dangky` (`id_dangky`, `tenkhachhang`, `tendangnhap`, `email`, `diachi`, `matkhau`, `dienthoai`) VALUES
(104, 'Nguyễn Văn A', 'user1', 'user1@example.com', '123 Đường 2 Tháng 4, Nha Trang', '123456', '0123456789'),
(105, 'Trần Thị B', 'user2', 'user2@example.com', '456 Lê Lợi, Nha Trang', 'abcdef', '0987654321'),
(106, 'Phạm Văn C', 'user3', 'user3@example.com', '789 Nguyễn Thị Minh Khai, Nha Trang', 'qwerty', '0123456789'),
(107, 'Lê Thị D', 'user4', 'user4@example.com', '1011 Lê Hồng Phong, Nha Trang', 'abc123', '0987654321'),
(108, 'Nguyễn Thanh E', 'user5', 'user5@example.com', '1213 Võ Thị Sáu, Nha Trang', 'pass123', '0123456789'),
(109, 'Trần Văn F', 'user6', 'user6@example.com', '1415 Bến Vân Đồn, Nha Trang', 'admin', '0987654321'),
(110, 'Hoàng Văn G', 'user7', 'user7@example.com', '1617 Lý Thái Tổ, Nha Trang', 'password', '0123456789');


CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `hoten` varchar(255) CHARACTER SET utf8 NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(28) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`id_user`, `hoten`, `username`, `password`, `phone`, `email`) VALUES
(7, 'Nguyễn Văn A', 'user1', 'password1', '0987654321', 'user1@example.com'),
(8, 'Trần Thị B', 'user2', 'password2', '0123456789', 'user2@example.com'),
(55, 'Lê Văn C', 'user3', 'password3', '0909090909', 'user3@example.com'),
(57, 'Phạm Thị D', 'user4', 'password4', '0888888888', 'user4@example.com'),
(58, 'Hoàng Văn E', 'user5', 'password5', '0999999999', 'user5@example.com');

-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  ADD PRIMARY KEY (`id_dangky`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `id_dangky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;


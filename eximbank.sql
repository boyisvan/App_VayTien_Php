-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 19, 2024 lúc 01:55 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `eximbank`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cskh`
--

CREATE TABLE `cskh` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `cskhiphone` varchar(255) DEFAULT NULL,
  `cskhandroid` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `createdate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cskh`
--

INSERT INTO `cskh` (`id`, `ten`, `cskhiphone`, `cskhandroid`, `status`, `createdate`) VALUES
(16, 'Vũ', 'https://www.facebook.com/profile.php?id=100088819024265', 'fb://page/108205118805621', 0, '2022/11/25 09:10:58'),
(19, 'Kiên', 'https://www.facebook.com/profile.php?id=100089366881482', 'fb://page/104954192487438', 1, '2022/11/30 10:11:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachcskh`
--

CREATE TABLE `danhsachcskh` (
  `id` int(11) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `nhanviencskh` varchar(255) NOT NULL,
  `createdate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dongtien`
--

CREATE TABLE `dongtien` (
  `id` int(11) NOT NULL,
  `sotientruoc` int(11) DEFAULT NULL,
  `sotienthaydoi` int(11) DEFAULT NULL,
  `sotiensau` int(11) DEFAULT NULL,
  `thoigian` datetime DEFAULT NULL,
  `noidung` text DEFAULT NULL,
  `hanhdong` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `dongtien`
--

INSERT INTO `dongtien` (`id`, `sotientruoc`, `sotienthaydoi`, `sotiensau`, `thoigian`, `noidung`, `hanhdong`, `username`) VALUES
(5, NULL, 10000000, NULL, '2022-11-11 13:24:36', 'SỐ TIỀN ỦY QUYỀN SỬA THÔNG TIN SỐ TÀI KHOẢN', 'Nap', '0982413568'),
(6, NULL, 10000000, NULL, '2022-11-11 13:30:41', '', 'Nap', '0982413568');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lang`
--

CREATE TABLE `lang` (
  `id` int(11) NOT NULL,
  `vn` text DEFAULT NULL,
  `en` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `lang`
--

INSERT INTO `lang` (`id`, `vn`, `en`) VALUES
(1, 'Đăng Nhập', 'Login'),
(2, 'Đăng Ký', 'Register'),
(3, 'Thông Tin', 'Profile'),
(4, 'Đăng Nhập hoặc Đăng Ký', 'Login or Register'),
(5, 'Tên đăng nhập', 'Username'),
(6, 'Mật khẩu', 'Password'),
(7, 'Nhập tên đăng nhập', 'Enter your username'),
(8, 'Nhập mật khẩu', 'Enter password'),
(9, 'Đang xử lý', 'Processing'),
(10, 'Vui lòng nhập tên đăng nhập', 'Please enter your username'),
(11, 'Vui lòng nhập mật khẩu', 'Please enter a password'),
(12, 'Tên đăng nhập không tồn tại', 'Username does not exist'),
(13, 'Mật khẩu đăng nhập không chính xác', 'Login password is incorrect'),
(14, 'Tài khoản đã bị khóa', 'The account is locked'),
(15, 'Vui lòng nhập định dạng tài khoản hợp lệ', 'Please enter a valid account format'),
(16, 'Tài khoản phải từ 5 đến 64 ký tự', 'Account must be between 5 and 64 characters'),
(17, 'Tên đăng nhập đã tồn tại!', 'Username available!'),
(18, 'Vui lòng đặt mật khẩu trên 3 ký tự', 'Please set a password above 3 characters'),
(19, 'Bạn đã đạt giới hạn tạo tài khoản', 'You have reached your account creation limit'),
(20, 'Tạo tài khoản thành công', 'Account successfully created'),
(21, 'Vui lòng kiểm tra cấu hình cơ sở dữ liệu', 'Please check the database configuration'),
(22, 'Vui lòng nhập địa chỉ email', 'Please enter your email address'),
(23, 'Vui lòng nhập địa chỉ email hợp lệ', 'Please enter a valid email address'),
(24, 'Địa chỉ email không tồn tại trong hệ thống', 'Email address does not exist in the system'),
(25, 'XÁC NHẬN KHÔI PHỤC MẬT KHẨU', 'CONFIRMED PASSWORD RECOVERY'),
(26, 'Có ai đó vừa yêu cầu khôi phục lại mật khẩu bằng Email này, nếu là bạn vui lòng nhập mã xác minh phía dưới để xác minh tài khoản', 'Someone has just requested to recover password by this email, if you are, please enter the verification code below to verify the account.'),
(27, 'Chúng tôi đã gửi mã xác minh vào địa chỉ Email của bạn', 'We have sent a verification code to your Email address'),
(28, 'Vui lòng nhập mật khẩu mới', 'Please enter a new password'),
(29, 'Vui lòng xác minh lại mật khẩu', 'Please verify your password'),
(30, 'Tổng nạp', 'Total Balance'),
(31, 'Số dư hiện tại', 'Credit Available'),
(32, 'Số tiền đã sử dụng', 'Amount used'),
(33, 'Nạp tiền ngay', 'Pay Now'),
(34, 'Lịch sử dòng tiền', 'Cash flow history'),
(35, 'THỐNG KÊ CHI TIẾT', 'DETAILED STATISTICS'),
(36, 'Lịch Sử Giao Dịch', 'Transaction history'),
(37, 'Nạp Tiền', 'Recharge'),
(38, 'THÔNG TIN', 'INFORMATION'),
(39, 'Đang hoạt động', 'Online'),
(40, 'Trạng Thái', 'Status'),
(41, 'Giảm', 'Discount'),
(42, 'GIAO DỊCH GẦN ĐÂY', 'RECENT TRANSACTIONS'),
(43, 'Trang Chủ', 'Home'),
(45, 'Số lượng', 'Amount'),
(46, 'Thanh toán', 'Pay'),
(47, 'XEM NGAY', 'VIEW NOW'),
(48, 'TẢI VỀ', 'DOWNLOAD'),
(49, 'CHỌN ĐỊNH DẠNG TẢI VỀ', 'CHOOSE DOWNLOAD FORMAT'),
(50, 'CHI TIẾT ĐƠN HÀNG', 'ORDER DETAILS'),
(51, 'Thời Gian', 'Time'),
(52, 'Loại', 'Type'),
(53, 'Mã Giao Dich', 'Transaction id'),
(54, 'LƯU Ý', 'Note'),
(55, 'Sao chép', 'Copy'),
(56, 'Tải Backup', 'Download Backup'),
(57, 'Dòng tiền', 'Cash flow'),
(58, 'Lịch sử nạp tiền', 'Deposit history'),
(59, 'Chủ tài khoản', 'Recipient\'s name'),
(60, 'Nội dung chuyển tiền', 'Money transfer content'),
(61, 'Số tài khoản', 'Payout account number'),
(62, 'Ngân hàng', 'Bank'),
(63, 'Đăng Xuất', 'Logout'),
(64, 'Thành viên', 'Member'),
(65, 'Đại lý', 'Agency'),
(66, 'Địa chỉ Email', 'Email address'),
(67, 'Số điện thoại', 'Number phone'),
(68, 'Họ và Tên', 'Full name'),
(69, 'Thời gian đăng ký', 'Registration period'),
(70, 'Mật khẩu mới', 'New password'),
(71, 'Nhập lại mật khẩu mới', 'Confirm  new password'),
(72, 'Thông tin được mã hóa khi đưa lên máy chủ của chúng tôi', 'Information is encrypted when posted on our servers'),
(73, 'LƯU THÔNG TIN', 'SAVE INFORMATION'),
(74, 'Đơn giá', 'Unit price'),
(75, 'Số tiền cần thanh toán', 'Amount to be paid'),
(76, 'Đóng', 'Close'),
(77, 'Tên sản phẩm', 'Product\'s name'),
(78, 'Hiện có', 'Available'),
(79, 'Thao tác', 'Control'),
(80, 'Lưu thành công', 'Save successfully'),
(81, 'Đang xử lý giao dịch', 'Processing the transaction'),
(82, 'Loại này đã hết hàng', 'This type is out of stock'),
(83, 'Mua Ngay', 'Buy Now'),
(84, 'Hết hàng', 'Out of stock'),
(85, 'Quốc gia', 'Countries'),
(86, 'Vui lòng đăng nhập để thực hiện giao dịch', 'Please log in to make a transaction'),
(87, 'Dịch vụ không hợp lệ', 'Invalid service'),
(88, 'Dịch vụ này không khả dụng', 'This service is not available'),
(89, 'Số lượng mua không phù hợp', 'Purchase quantity does not match'),
(90, 'Số lượng tối đa 1 lần là', 'The maximum number of times is'),
(91, 'Số lượng trong hệ thống không đủ', 'The quantity in the system is not enough'),
(92, 'Số dư không đủ vui lòng nạp thêm', 'Insufficient balance, please recharge'),
(93, 'Tài khoản của bạn đã bị chấm dứt vì sử dụng BUG', 'Your account has been terminated for using BUG'),
(94, 'Giao dịch thành công!', 'Successful transaction!'),
(95, 'Thất Bại', 'Error'),
(96, 'Thành Công', 'Success'),
(97, 'Cảnh Báo', 'Warning'),
(98, 'DANH SÁCH TÀI KHOẢN', 'LIST OF ACCOUNTS'),
(99, 'Chính sách', 'Policy'),
(100, 'LỊCH SỬ NẠP TIỀN', 'MONEY DEPOSIT HISTORY'),
(101, 'Công Cụ', 'Tool'),
(102, 'NẠP TIỀN', 'RECHARGE'),
(103, 'Số lượng tối thiểu', 'Minimum quantity'),
(104, 'Top Nạp Tiền', 'Deposit Rankings'),
(105, 'BẢNG XẾP HẠNG NẠP TIỀN', 'RANKING OF MONEY'),
(106, 'THÀNH VIÊN', 'MEMBER'),
(107, 'TỔNG TIỀN NẠP', 'TOTAL DEPOSIT'),
(108, 'XẾP HẠNG', 'RANK'),
(109, 'CÔNG CỤ LẤY MÃ 2FA', 'TOOL GET CODE 2FA'),
(110, 'Vui lòng nhập Secret Key', 'Please enter Secret Key'),
(111, 'ĐANG XỬ LÝ', 'PROCESSING'),
(112, 'CHÚNG TÔI CUNG CẤP', 'WE OFFER'),
(113, 'Có những tài khoản Facebook còn khá trẻ nếu bạn cần trong thời gian ngắn, trên trang web của chúng tôi', 'There are Facebook accounts, that are quite young if you need them for a short time, on our website'),
(114, 'TÀI KHOẢN ĐANG BÁN', 'ACCOUNT IS SELLING'),
(115, 'Công ty chúng tôi đã có một thời gian dài trên thị trường tài khoản xã hội số lượng lớn và tài khoản internet công cộng. Chúng tôi đang cung cấp cho khách hàng các tài khoản số lượng lớn an toàn trên tất cả các loại mạng và cổng thông tin công cộng', 'Our company has been for a while on the market of bulk social accounts and public internet recourses. We are offering our customers secure bulk accounts on all kinds of public networks and portals'),
(116, 'Xem thêm', 'Learn more'),
(117, 'Nhà cung cấp tài khoản marketing hàng đầu', 'Top marketing account provider'),
(118, 'Chúng tôi cung cấp những tài khoản mạng xã hội chất lượng nhất', 'We provide top quality social media accounts'),
(119, 'Sản phẩm', 'Product'),
(120, 'Trang chủ', 'Home'),
(121, 'Dịch vụ', 'Services'),
(122, 'Quên mật khẩu', 'Forgot password'),
(123, 'Nhập OTP', 'Enter OTP'),
(124, 'Nhập lại mật khẩu', 'Verify password'),
(125, 'Đổi mật khẩu', 'Change Password'),
(126, 'sản phẩm trong nhóm này', 'products in this group'),
(127, 'Đối tác của chúng tôi', 'Partner'),
(128, 'Điều khoản', 'Rules'),
(129, 'Dịch Vụ', 'Services'),
(130, 'Liên Hệ', 'Contact');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `options`
--

INSERT INTO `options` (`id`, `name`, `value`) VALUES
(1, 'tenweb', ''),
(2, 'mota', ''),
(3, 'tukhoa', ''),
(4, 'logo', 'https://i.imgur.com/lIjCMpE.jpeg'),
(5, 'email', ''),
(6, 'pass_email', ''),
(7, 'luuy_naptien', '<ul>\r\n	<li>Hệ thống xử lý 5s 1 thẻ.</li>\r\n	<li>Vui lòng gửi đúng mệnh giá, sai mệnh giá thực nhận mệnh giá bé nhất.</li>\r\n	<li>Ví dụ mệnh giá thực là 100k, quý khách nạp 100k thực nhận 100k.</li>\r\n	<li>Ví dụ mệnh giá thực là 100k quý khách nạp 50k thực nhận 50k.</li>\r\n	<li>Mệnh giá 10k, 20k, 30k tính thêm 3% phí.</li>\r\n</ul>\r\n'),
(10, 'luuy_napbank', 'test'),
(11, 'noidung_naptien', ''),
(12, 'thongbao', '<b> Thông báo cho khách hàng thay đổi trong Admin</b>'),
(13, 'anhbia', 'https://imgur.com/MLNLxUb.png'),
(14, 'favicon', 'https://imgur.com/3v69j9E.png'),
(15, 'ck_daily', '10'),
(16, 'doanhthu_daily', '11'),
(17, 'baotri', 'ON'),
(18, 'chinhsach', '<p>BẰNG VIỆC SỬ DỤNG CÁC DỊCH VỤ HOẶC MỞ MỘT TÀI KHOẢN, BẠN CHO BIẾT RẰNG BẠN CHẤP NHẬN, KHÔNG RÚT LẠI, CÁC ĐIỀU KHOẢN DỊCH VỤ NÀY. NẾU BẠN KHÔNG ĐỒNG Ý VỚI CÁC ĐIỀU KHOẢN NÀY, VUI LÒNG KHÔNG SỬ DỤNG CÁC DỊCH VỤ CỦA CHÚNG TÔI HAY TRUY CẬP TRANG WEB. NẾU BẠN DƯỚI 18 TUỔI HOẶC \"ĐỘ TUỔI TRƯỞNG THÀNH\"PHÙ HỢP Ở NƠI BẠN SỐNG, BẠN PHẢI XIN PHÉP CHA MẸ HOẶC NGƯỜI GIÁM HỘ HỢP PHÁP ĐỂ MỞ MỘT TÀI KHOẢN VÀ CHA MẸ HOẶC NGƯỜI GIÁM HỘ HỢP PHÁP PHẢI ĐỒNG Ý VỚI CÁC ĐIỀU KHOẢN DỊCH VỤ NÀY. NẾU BẠN KHÔNG BIẾT BẠN CÓ THUỘC \"ĐỘ TUỔI TRƯỞNG THÀNH\" Ở NƠI BẠN SỐNG HAY KHÔNG, HOẶC KHÔNG HIỂU PHẦN NÀY, VUI LÒNG KHÔNG TẠO TÀI KHOẢN CHO ĐẾN KHI BẠN ĐÃ NHỜ CHA MẸ HOẶC NGƯỜI GIÁM HỘ HỢP PHÁP CỦA BẠN GIÚP ĐỠ. NẾU BẠN LÀ CHA MẸ HOẶC NGƯỜI GIÁM HỘ HỢP PHÁP CỦA MỘT TRẺ VỊ THÀNH NIÊN MUỐN TẠO MỘT TÀI KHOẢN, BẠN PHẢI CHẤP NHẬN CÁC ĐIỀU KHOẢN DỊCH VỤ NÀY THAY MẶT CHO TRẺ VỊ THÀNH NIÊN ĐÓ VÀ BẠN SẼ CHỊU TRÁCH NHIỆM ĐỐI VỚI TẤT CẢ HOẠT ĐỘNG SỬ DỤNG TÀI KHOẢN HAY CÁC DỊCH VỤ, BAO GỒM CÁC GIAO DỊCH MUA HÀNG DO TRẺ VỊ THÀNH NIÊN THỰC HIỆN, CHO DÙ TÀI KHOẢN CỦA TRẺ VỊ THÀNH NIÊN ĐÓ ĐƯỢC MỞ VÀO LÚC NÀY HAY ĐƯỢC TẠO SAU NÀY VÀ CHO DÙ TRẺ VỊ THÀNH NIÊN CÓ ĐƯỢC BẠN GIÁM SÁT TRONG GIAO DỊCH MUA HÀNG ĐÓ HAY KHÔNG.</p>\r\n'),
(19, 'api_bank', 'vuilongthayapi'),
(20, 'api_momo', 'vuilongthayapi'),
(21, 'theme', 'JoBest'),
(22, 'api_card', 'vuilongthayapi'),
(23, 'ck_card', '30'),
(24, 'theme_color', '#0f0684'),
(25, 'theme_home', '0'),
(26, 'stt_giao_dich_gan_day', 'ON'),
(27, 'status_demo', 'OFF'),
(28, 'chinhsach_baohanh', '<h2 class=\"page-title\" style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-weight: 700; font-size: 23px; font-family: Roboto, \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;\"=\"\"><br></h2>'),
(29, 'sdt_momo', '0947838111'),
(30, 'name_momo', 'NGUYEN TAN '),
(31, 'tk_tsr', 'xoatkmkneukhongxai'),
(32, 'mk_tsr', 'xoatkmkneukhongxai'),
(33, 'mk2_tsr', ''),
(34, 'luuy_tsr', '<p>Nạp tiền qua thesieure.com cộng tiền ngay.</p><p>Chuyển tiền nhập đúng nội dung chuyển tiền sau đó COPY mã giao dịch tại THESIEURE.COM và nhập vào ô trên.</p>'),
(36, 'fanpage', ''),
(43, 'stt_giaodichao', 'OFF'),
(44, 'files', ''),
(45, 'btnSaveOption', ''),
(46, 'right_panel', 'ON'),
(47, 'emailct', ''),
(48, 'TypePassword', 'md5'),
(49, 'contact', '&lt;p&gt;&lt;br&gt;&lt;/p&gt;'),
(51, 'phone', '0978158212'),
(52, 'youtube', ''),
(53, 'script', ''),
(54, 'motabank', '<p><span style=\"color: rgb(80, 173, 78); font-family: Roboto, sans-serif; font-weight: 700; background-color: rgb(249, 249, 249);\">Khóa học sẽ được kích hoạt sau khi kiểm tra tài khoản và xác nhận việc thanh toán của bạn thành công.</span><span style=\"background-color: rgb(249, 249, 249); color: rgb(80, 173, 78); font-family: Roboto, sans-serif; font-weight: 700; font-size: 1rem;\">(Vui lòng chờ xác nhận trong ngày hoặc liên hệ zalo hỗ trợ: 0978158212)</span></p><p><span style=\"color: rgb(80, 173, 78); font-family: Roboto, sans-serif; font-weight: 700; background-color: rgb(249, 249, 249);\"><br></span></p><p style=\"box-sizing: inherit; margin-bottom: 0px; color: rgb(39, 39, 39); font-family: Roboto, sans-serif;\"><span style=\"box-sizing: inherit; font-weight: 700;\">Chuyển khoản ngân hàng</span></p><p style=\"box-sizing: inherit; margin-bottom: 0px; color: rgb(39, 39, 39); font-family: Roboto, sans-serif;\">Bạn có thể đến bất kỳ ngân hàng nào ở Việt Nam (hoặc sử dụng Internet Banking) để chuyển tiền theo thông tin bên dưới:</p><p><br style=\"box-sizing: inherit; color: rgb(39, 39, 39); font-family: Roboto, sans-serif;\"></p><ul class=\"top\" style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; list-style: none; padding: 0px; display: inline-block; width: 648px; color: rgb(39, 39, 39); font-family: Roboto, sans-serif;\"><li style=\"box-sizing: inherit; list-style: none; padding: 0px; display: inline-block; vertical-align: top; width: 648px; line-height: 25px;\"><span class=\"bold\" style=\"box-sizing: inherit; font-weight: bold !important; width: 140px; display: block; float: left;\">• Số tài khoản:</span>19034624681013</li><li style=\"box-sizing: inherit; list-style: none; padding: 0px; display: inline-block; vertical-align: top; width: 648px; line-height: 25px;\"><span class=\"bold\" style=\"box-sizing: inherit; font-weight: bold !important; width: 140px; display: block; float: left;\">• Chủ tài khoản:</span>Giang Thị Hải Lý<br></li><li style=\"box-sizing: inherit; list-style: none; padding: 0px; display: inline-block; vertical-align: top; width: 648px; line-height: 25px;\"><span class=\"bold\" style=\"box-sizing: inherit; font-weight: bold !important; width: 140px; display: block; float: left;\">• Ngân hàng:</span>Ngân Hàng Thương Mại Cổ Phần Kỹ Thương Việt Nam (Techcombank)</li></ul><p style=\"box-sizing: inherit; margin-bottom: 0px; color: rgb(39, 39, 39); font-family: Roboto, sans-serif;\"><i style=\"box-sizing: inherit;\">Ghi chú khi chuyển khoản:</i></p><ul class=\"center\" style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; list-style: none; padding: 0px; display: inline-block; width: 648px; color: rgb(39, 39, 39); font-family: Roboto, sans-serif;\"><li style=\"box-sizing: inherit; list-style: none; padding: 0px; display: inline-block; vertical-align: top; width: 648px; line-height: 25px;\">• Tại mục \"Ghi chú\" khi chuyển khoản, bạn ghi rõ: Số điện thoại. Họ và tên. Email đăng ký học (thay \"@\" thành \".\"). Mã đơn hàng</li><li style=\"box-sizing: inherit; list-style: none; padding: 0px; display: inline-block; vertical-align: top; width: 648px; line-height: 25px;\">• Ví dụ: SDT 0909090909. Nguyen Thi Huong Lan. nguyenthihuonglan.gmail.com. Don hang 2313123</li></ul><p><span style=\"color: rgb(39, 39, 39); font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(249, 249, 249); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\"></span><span style=\"color: rgb(80, 173, 78); font-family: Roboto, sans-serif; font-weight: 700; background-color: rgb(249, 249, 249);\"><br></span><br></p>'),
(55, 'stkbank_thanhtoan', '0531002590569'),
(56, 'namebank_thanhtoan', 'Công ty TNHH Đào Tạo Nguồn Lực Việt.'),
(57, 'chinhanhbank_thanhtoan', 'Ngân hàng Vietcombank, Chi nhánh Đông Sài Gòn, Tp.HCM.'),
(58, 'hopdong', '<h5 style=\"text-align: center; \"><b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b></h5><p><br></p><h5 style=\"text-align: center; \"><b>ĐỘC LẬP - TỰ DO - HẠNH PHÚC</b></h5><p><br></p><h5 style=\"text-align: center; \"><b>HỢP ĐỒNG VAY TIỀN</b></h5><p><br></p><p><span style=\"background-color: rgb(247, 247, 247);\"><b>Thông tin cơ bản về khoản vay</b></span></p><p>Bên A (Bên cho vay) CÔNNG TY TNHH THƯƠNG MẠI DỊCH VỤ TÀI CHÍNH HOÀNG PHÚC</p><p>Bên B (Bên vay) Ông / Bà : $fullname<span id=\"nameSetting\" style=\"color:red\"><!--?=$getUser[\'fullname\'];?--></span></p><p>Số CMT / CCCD : $cmnd</p><p>Số tiền khoản vay : $money <font color=\"#ff0000\" style=\"background-color: rgb(247, 247, 247);\">VNĐ</font><br></p><p>Thời gian vay : $thang&nbsp;<span id=\"monthSetting\" style=\"color:red\"><!--?php if(empty($row[\'thoigianvay\'])): echo \'6 tháng\'; else: echo $row[\'thoigianvay\']; endif; ?--></span> tháng</p><p>Lãi suất cho vay là <font color=\"#ff0000\">1%</font> mỗi tháng<br></p><p>Hợp đồng nêu rõ các bên đã đặt được thỏa thuận vay sau khi thương lượng và trên cơ sở bình đẳng , tự nguyện và nhất trí . Tất cả các bên cần đọc kỹ tất cả các điều khoản trong thỏa thuận này, sau khi ký vào thỏa thuận này coi như các bên đã hiểu đầy đủ và đồng ý hoàn toàn với tất cả các điều khoản và nội dung trong thỏa thuận này.</p><p>1.Phù hợp với các nguyên tắc bình đẳng , tự nguyện , trung thực và uy tín , hai bên thống nhất ký kết hợp đồng vay sau khi thương lượng và cùng cam kết thực hiện.</p><p>2.Bên B cung cấp tài liệu đính kèm của hợp đồng vay và có hiệu lực pháp lý như hợp đồng vay này.</p><p>3.Bên B sẽ tạo lệnh tính tiền gốc và lãi dựa trên số tiền vay từ ví ứng dụng do bên A cung cấp.</p><p>4.Điều khoản đảm bảo.</p><p>- Bên vay không được sử dụng tiền vay để thực hiện các hoạt động bất hợp pháp .Nếu không , bên A có quyền yêu cầu bên B hoàn trả ngay tiền gốc và lãi , bên B phải chịu các trách nhiệm pháp lý phát sinh từ đó.</p><p>- Bên vay phải trả nợ gốc và lãi trong thời gian quy định hợp đồng. Đối với phần quá hạn , người cho vay có quyền thu hồi nợ trong thời hạn và thu ( lãi quá hạn ) % trên tổng số tiền vay trong ngày.</p><p>- Gốc và lãi của mỗi lần trả nợ sẽ được hệ thống tự động chuyển từ tài khoản ngân hàng do bên B bảo lưu sang tài khoản ngân hàng của bên A . Bên B phải đảm bảo có đủ tiền trong tài khoản ngân hàng trước ngày trả nợ hàng tháng.</p><p>5.Chịu trách nhiệm do vi pham hợp đồng</p><p>- Nếu bên B không trả được khoản vay theo quy định trong hợp đồng. Bên B phải chịu các khoản bồi thường thiệt hại đã thanh lý và phí luật sư, phí kiện tụng, chi phí đi lại và các chi phí khác phát sinh do kiện tụng.</p><p>- Khi bên A cho rẳng bên B đã hoặc có thể xảy ra tình huống ảnh hưởng đến khoản vay thì bên A có quyền yêu cầu bên B phải trả lại kịp thời trược thời hạn.</p><p>- Người vay và người bảo lãnh không được vi phạm điều lệ hợp đồng vì bất kỳ lý do gì</p><p>6.Phương thức giải quyết tranh chấp hợp đồng.Tranh chấp phát sinh trong quá trình thực hiện hợp đồng này sẽ được giải quyết thông qua thương lượng thân thiện giữa các bên hoặc có thể nhờ bên thứ ba làm trung gian hòa giải .Nếu thương lượng hoặc hòa giải không thành , có thể khởi kiện ra tòa án nhân dân nơi bên A có trụ sở.</p><p>7.Khi người vay trong quá trình xét duyệt khoản vay không thành công do nhiều yếu tố khác nhau như chứng minh thư sai, thẻ ngân hàng sai , danh bạ sai. Việc thông tin sai lệch này sẽ khiến hệ thống phát hiện nghi ngờ gian lận hoặc giả mạo khoản vay và bên vay phải chủ động hợp tác với bên A để xử lý.</p><p>8.Nếu không hợp tác. Bên A có quyền khởi kiện ra Tòa án nhân dân và trình báo lên Trung tâm Báo cáo tín dụng của Ngân hàng nhà nước Việt Nam , hồ sơ nợ xấu sẽ được phản ánh trong báo cáo tín dụng , ảnh hưởng đến tín dụng sau này của người vay , vay vốn ngân hàng và hạn chế tiều dùng của người thân , con cái người vay ...&nbsp; &nbsp; &nbsp; &nbsp;</p><p style=\"text-align: center; \">Người vay&nbsp;</p><p><br></p><div style=\"text-align: center;\"><img src=\"data:image/png;base64,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\" style=\"font-size: 1rem; width: 300px;\"></div><div style=\"text-align: center;\"><span style=\"text-align: left;\">$fullname</span><br></div><p></p>'),
(59, 'thongbao_admin', 'Sai thông tin liên kết ví');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `sotien` int(25) DEFAULT NULL,
  `thoigianvay` varchar(255) DEFAULT NULL,
  `chuky` varchar(255) DEFAULT NULL,
  `trangthai` varchar(255) DEFAULT NULL,
  `thoigian` datetime DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `code`, `username`, `phone`, `sotien`, `thoigianvay`, `chuky`, `trangthai`, `thoigian`, `time`, `ip`) VALUES
(17242, 'VtieyInqTM', '0375642484', '0375642484', 30000000, '36 tháng', NULL, NULL, NULL, '1670325703', '123.18.171.122'),
(17243, 'LyWaANrqDj', '0368987531', '0368987531', 50000000, '36 tháng', NULL, NULL, NULL, '1670325725', '27.67.133.212'),
(17244, 'tAZJGaWSkE', '0375642484', '0375642484', 30000000, '36 tháng', '/assets/storage/images/chuky_7T4JFQK8DLCM.png', 'Chấp nhận', NULL, '1670325735', '123.18.171.122'),
(17245, 'NqGojtFKhX', '0368987531', '0368987531', 50000000, '36 tháng', '/assets/storage/images/chuky_YB6HT7EKVFLJ.png', 'Đang chờ duyệt', NULL, '1670326041', '27.67.133.212'),
(17246, 'PqChpZmOUL', '0945445992', '0945445992', 30000000, '36 tháng', NULL, NULL, NULL, '1670326174', '125.235.225.80'),
(17247, 'KzUokLIutT', '0865606369', '0865606369', 30000000, '24 tháng', NULL, NULL, NULL, '1670326274', '42.115.248.128'),
(17248, 'zxFKAtZPMv', '0338259060', '0338259060', 50000000, '36 tháng', NULL, NULL, NULL, '1670326384', '125.235.14.251'),
(17249, 'RFbAociqMs', '0393458300', '0393458300', 30000000, '12 tháng', NULL, NULL, NULL, '1670326402', '123.17.51.43'),
(17250, 'KufFMVyChS', '0393458300', '0393458300', 30000000, '12 tháng', NULL, NULL, NULL, '1670326409', '123.17.51.43'),
(17251, 'AItaFSWUlV', '0393458300', '0393458300', 30000000, '12 tháng', NULL, NULL, NULL, '1670326410', '123.17.51.43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `dichvu` varchar(255) DEFAULT NULL,
  `taikhoan` varchar(255) DEFAULT NULL,
  `lydo` text DEFAULT NULL,
  `thoigian` varchar(255) DEFAULT NULL,
  `trangthai` varchar(255) DEFAULT NULL,
  `ghichu` text DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `shop` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ruttien`
--

CREATE TABLE `ruttien` (
  `id` int(10) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `sotien` int(50) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `trangthai` varchar(255) DEFAULT NULL,
  `thoigian` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ruttien`
--

INSERT INTO `ruttien` (`id`, `code`, `phone`, `sotien`, `username`, `trangthai`, `thoigian`, `ip`) VALUES
(2, 'ImytJHhjVw', '0964347255', 100000, '0964347255', 'Đang chờ duyệt', '1661266364', '127.0.0.1'),
(3, 'odFvCrMVSJ', '0964347255', 5000, '0964347255', 'Đang chờ duyệt', '1661355165', '1.54.155.252'),
(4, 'jOwfdYsJme', '0964347255', 5000, '0964347255', 'Đang chờ duyệt', '1661356750', '1.54.155.252');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `createdate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`id`, `ten`, `content`, `phone`, `createdate`) VALUES
(1, 'Hợp đồng vay đã được duyệt	', 'Khoản vay 40.000.000 VND, 36 tháng đã được thông qua. Hãy yêu cầu rút tiền.', '0932057392', '	2022-08-23 21:15:46'),
(2, 'Hợp đồng vay đã được duyệt	', 'Khoản vay 60.000.000 VND, 24 tháng đã được thông qua. Hãy yêu cầu rút tiền.', '0981281449', '2022-08-23 20:57:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `permi` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `banned` int(11) NOT NULL DEFAULT 0,
  `createdate` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ref` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `total_money` int(11) NOT NULL DEFAULT 0,
  `phone` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `cmnd` varchar(255) DEFAULT NULL,
  `gioitinh` varchar(255) DEFAULT NULL,
  `dob` varchar(25) DEFAULT NULL,
  `nghenghiep` varchar(255) DEFAULT NULL,
  `thunhap` varchar(255) DEFAULT NULL,
  `mucdichvay` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `sdtngthan` varchar(255) DEFAULT NULL,
  `moiquanhengthan` varchar(255) DEFAULT NULL,
  `stkbank` varchar(255) DEFAULT NULL,
  `tenchubank` varchar(255) DEFAULT NULL,
  `tennganhang` varchar(255) DEFAULT NULL,
  `lenhruttien` int(15) DEFAULT 0,
  `lenhthongbao` varchar(255) DEFAULT NULL,
  `cskh` varchar(255) DEFAULT NULL,
  `UserAgent` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `permi`, `token`, `level`, `banned`, `createdate`, `email`, `ref`, `ip`, `time`, `total_money`, `phone`, `image`, `image2`, `image3`, `fullname`, `cmnd`, `gioitinh`, `dob`, `nghenghiep`, `thunhap`, `mucdichvay`, `address`, `sdtngthan`, `moiquanhengthan`, `stkbank`, `tenchubank`, `tennganhang`, `lenhruttien`, `lenhthongbao`, `cskh`, `UserAgent`) VALUES
(1, '0964525255', 'e10adc3949ba59abbe56e057f20f883e', 'dscskh,dsnv,qltk,cauhinhweb,quanlytk,quanlyvaitro,quanlyper,khoanvaygiaingan,naptien,tbnaptien,quanlytk2', 'ZEgeLCYXQVyswWDankcJTbihxumRKofdPMABGzOpqUtHajrNvFIlS', 'admin', 0, '2021-01-20 08:38:05', 'admin@admin.com', '', '127.0.0.1', NULL, 50000, '0964525255', '/assets/storage/images/cmndmt_OF6NIMBPUXKW.png', '/assets/storage/images/cmndms_XIHE9O50F8L1.png', '/assets/storage/images/cmndchandung_MR8GB4XJS9CQ.png', 'van tien len', '201625514512', 'Nữ', '12/09/1992', 'ti', 'Từ 5 - 10 triệu', 'vay', '1023332', '09594350934', 'binh', '004122112143', 'le van tien2', 'ACB-Ngân hàng Á Châu', 5000, 'Từ chối khoản vay !', NULL, 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1'),
(2, '0900000001', 'e10adc3949ba59abbe56e057f20f883e', 'dscskh,dsnv,qltk,cauhinhweb,quanlytk,quanlyvaitro,quanlyper,khoanvaygiaingan,naptien,tbnaptien,quanlytk2', NULL, 'Quản trị viên', 0, '2022-08-24 10:45:10', 'quantrivien@admin.com', NULL, NULL, NULL, 0, NULL, '/assets/storage/images/category_791BUPOVZAWD.png', '/assets/storage/images/category_NS5KT9M0PZE2.png', '/assets/storage/images/category_C1BYVPXOUKZ9.png', 'Đỗ tiên thắng', '2016152111', 'Nữ', '12/05/1990', 'viet', 'Từ 5 - 10 triệu', 'lam an', '125 le lợi', '0965263212', 'che', '00410000', 'le tien', 'MB-Ngân hàng Quân Đội', 0, 'Sai thông tin liên kết ví', NULL, NULL),
(9, '0900000000', 'e10adc3949ba59abbe56e057f20f883e', 'dscskh,dsnv,quanlytk,quanlyvaitro,khoanvaygiaingan,naptien,tbnaptien', NULL, 'Hồ Sơ', 0, '2022-08-24 17:29:41', 'hoso@admin.com', NULL, NULL, NULL, 0, '0900000000', NULL, NULL, NULL, 'hoso', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Sai thông tin liên kết ví', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `mota` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vaitro`
--

INSERT INTO `vaitro` (`id`, `ten`, `mota`) VALUES
(1, 'Quản trị viên', 'Quản trị viên'),
(2, 'TBP Nội dung', ''),
(3, 'TBP Kinh doanh', ''),
(4, 'Biên tập viên Nội dung', ''),
(5, 'Nhân viên Kinh doanh', ''),
(6, 'Chăm Sóc Khách Hàng', ''),
(7, 'Hồ Sơ', 'Xem khoản vay');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cskh`
--
ALTER TABLE `cskh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhsachcskh`
--
ALTER TABLE `danhsachcskh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dongtien`
--
ALTER TABLE `dongtien`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `ruttien`
--
ALTER TABLE `ruttien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cskh`
--
ALTER TABLE `cskh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `danhsachcskh`
--
ALTER TABLE `danhsachcskh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10306;

--
-- AUTO_INCREMENT cho bảng `dongtien`
--
ALTER TABLE `dongtien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT cho bảng `lang`
--
ALTER TABLE `lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT cho bảng `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9344;

--
-- AUTO_INCREMENT cho bảng `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20395;

--
-- AUTO_INCREMENT cho bảng `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ruttien`
--
ALTER TABLE `ruttien`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8278;

--
-- AUTO_INCREMENT cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

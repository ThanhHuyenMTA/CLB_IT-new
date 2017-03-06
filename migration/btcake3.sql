-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2017 at 10:44 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btcake3`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `posted` datetime NOT NULL,
  `views` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL,
  `evaluate` text NOT NULL,
  `censorship` int(11) NOT NULL COMMENT '0(No); 1(Yes)',
  `menu_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `name`, `content`, `posted`, `views`, `likes`, `dislikes`, `evaluate`, `censorship`, `menu_id`, `id_user`) VALUES
(1, 'GIỚI THIỆU LẬP TRÌNH WINDOWS FORM C# VS VB.NET', 'Chào mừng các bạn đến với Câu Lạc Bộ IT MTA 2017\r\n\r\nĐể giúp các bạn sinh viên học tốt hơn về lập trình windows form bằng C# và VB.Net, cũng như cũng cố thêm các kiến thức từ cơ bản đến nâng cao cho bản thân chúng ta. Hy vọng các bạn cùng tham gia để có thể trao dồi thêm kiến thức nhé !\r\n\r\nỞ bài post đầu tiên về lập trình Windows Form  sau của Pages này tôi sẽ giới thiệu thật chi tiết về phần mềm Visual Studio 2010(hoặc 2005, 2012) để các bạn mới học về lập trình windows form có thể nắm bắt được các chức năng cơ bản nhất để có thể sử dụng tốt hơn cho việc viết code, cũng như kiểm tra được lỗi phát sinh trong quá trình viết code sau này.\r\n\r\nTổng quan Ngôn ngữ C#\r\n\r\nC # là một ngôn ngữ lập trình hiện đại được phát triển bởi Microsoft và được phê duyệt bởi European Computer Manufacturers Association (ECMA) và International Standards Organization (ISO).\r\n\r\nC # được phát triển bởi Anders Hejlsberg và nhóm của ông trong việc phát triển .Net Framework.\r\n\r\nC # được thiết kế cho các ngôn ngữ chung cơ sở hạ tầng (Common Language Infrastructure – CLI), trong đó bao gồm các mã (Executable Code) và môi trường thực thi (Runtime Environment) cho phép sử dụng các ngôn ngữ cấp cao khác nhau trên đa nền tảng máy tính và kiến trúc khác nhau.\r\n\r\nNgôn ngữ ra đời cùng với .NET\r\n\r\nKết hợp C++ và Java.\r\nHướng đối tượng.\r\nHướng thành phần.\r\nMạnh mẽ (robust) và bền vững (durable).\r\nMọi thứ trong C# đều Object oriented.\r\nKể cả kiểu dữ liệu cơ bản.\r\nChỉ cho phép đơn kế thừa.\r\nDùng interface để khắc phục.\r\nLớp Object là cha của tất cả các lớp.\r\nMọi lớp đều dẫn xuất từ Object.\r\nCho phép chia chương trình thành các thành phần nhỏ độc lập nhau.\r\nMỗi lớp gói gọn trong một file, không cần file header như C/C++.\r\nBổ sung khái niệm namespace để gom nhóm các lớp.\r\nBổ sung khái niệm “property” cho các lớp.\r\nKhái niệm delegate & event.\r\nC# – mạnh mẽ & bền vững\r\n\r\nGarbage Collector\r\nTự động thu hồi vùng nhớ không dùng.\r\nKiểm soát và xử lý ngoại lệ exception\r\nĐoạn mã bị lỗi sẽ không được thực thi.\r\nType – safe\r\nKhông cho gán các kiểu dữ liệu khác nhau.\r\nVersioning\r\nĐảm bảo sự tương thích giữa lớp con và lớp cha.\r\nVai trò C# trong .NET Framework\r\n\r\n.NET runtime sẽ phổ biến và được cài trong máy client.\r\nViệc cài đặt App C# như là tái phân phối các thành phần .NET\r\nNhiều App thương mại sẽ được cài đặt bằng C#.\r\nC# tạo cơ hội cho tổ chức xây dựng các App Client/Server n-tier.\r\nKết nối ADO.NET cho phép truy cập nhanh chóng & dễ dàng với SQL Server, Oracle…\r\nCách tổ chức .NET cho phép hạn chế những vấn đề phiên bản.\r\nLoại bỏ “DLL Hell”…\r\nASP.NET viết bằng C#.\r\nGUI thông minh.\r\nChạy nhanh hơn (đặc tính của .NET)\r\nMã ASP.NET ko còn là mới hỗn độn.\r\nKhả năng bẫy lỗi tốt, hỗ trợ mạnh trong quá trình xây dựng App Web.\r\nQuá trình dịch CT C#\r\n\r\nMã nguồn C# (tập tin *.cs) được biên dịch qua MSIL.\r\nMSIL: tập tin .exe hoặc .dll\r\nMSIL được CLR thông dịch qua mã máy.\r\nDùng kỹ thuật JIT (just-in-time) để tăng tốc độ.', '2017-02-01 00:00:00', 10, 6, 6, '', 0, 1, 0),
(2, 'TỐI ƯU HÓA CƠ SỞ DỮ LIỆU', 'Ghi rõ tên cột trong câu lệnh SELECT\r\n\r\nSELECT * FROM MyTable;\r\n\r\nBạn đã từng viết câu lệnh như trên bao nhiêu lần?\r\n\r\nViệc sử dụng dấu sao (*) cho cơ sở dữ liệu biết rằng bạn muốn trả về tất cả các cột từ bảng (hoặc các bảng) được khai báo trong mệnh đề FROM. Đây không phải là một thói quen tốt ngay cả khi bạn muốn tất cả các cột được trả về ứng dụng. Tốt hơn bạn nên ghi rõ tên từng cột trong bảng như sau:\r\n\r\nSELECT ID, Description, DateModified FROM MyTable;\r\n\r\nViệc khai báo rõ ràng tên các cột trong câu lệnh SELECT mang lại rất nhiều lợi ích. Thứ nhất, máy chủ SQL sẽ chỉ trả về dữ liệu cần thiết cho ứng dụng chứ không phải là một đống dữ liệu mà trong đó có nhiều thứ ứng dụng của bạn không hề cần đến. Bằng cách chỉ yêu cầu trả về những dữ liệu cần thiết, bạn đã góp phần tối ưu hóa khối lượng công việc máy chủ SQL cần thực hiện để thu thập tất cả các cột của thông tin bạn yêu cầu. Ngoài ra, nhờ không sử dụng dấu sao (*) nên bạn đã giảm thiểu lưu lượng truyền tải qua mạng (số byte) cần thiết để gửi các dữ liệu liên quan đến câu lệnh SELECT tới ứng dụng.', '2017-02-16 00:00:00', 15, 23, 2, '', 0, 4, 0),
(3, 'BÀI HỌC C#1', 'Chúng ta cùng suy ngẫm nào....', '2017-02-15 00:00:00', 10, 4, 2, '', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `violate` int(11) NOT NULL COMMENT '0(không vi phạm); 1(vi phạm)',
  `id_article` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `violate`, `id_article`, `id_user`, `created`) VALUES
(1, 'Bài viết rất tốt :)', 0, 1, 1, '0000-00-00 00:00:00'),
(2, 'Bài viết rất hữu ích .', 0, 1, 2, '0000-00-00 00:00:00'),
(3, 'Bài viết có ý hay. Những cũng cần sàn lọc thêm :)))', 0, 2, 1, '0000-00-00 00:00:00'),
(9, 'Thành công đi mờ :D ', 0, 0, 38, '0000-00-00 00:00:00'),
(10, 'Bài viết quá ngắn chưa đủ thông tin :)))', 0, 3, 38, '0000-00-00 00:00:00'),
(11, 'Đã thành công rồi :D ', 0, 3, 38, '0000-00-00 00:00:00'),
(12, 'Được đi nha .hihi', 0, 3, 38, '0000-00-00 00:00:00'),
(13, 'hohosdjfjkds', 0, 3, 38, '0000-00-00 00:00:00'),
(14, 'oki. hay lắm bạn :) ', 0, 1, 38, '0000-00-00 00:00:00'),
(15, ':)', 0, 2, 38, '0000-00-00 00:00:00'),
(16, 'Rõ ý và đúng mục đích mình', 0, 1, 1, '0000-00-00 00:00:00'),
(17, 'Hiện tại......', 0, 1, 1, '0000-00-00 00:00:00'),
(18, 'Oki...', 0, 3, 1, '0000-00-00 00:00:00'),
(19, 'hihi.... ', 0, 1, 1, '0000-00-00 00:00:00'),
(20, 'ahihi...đồ chó', 0, 1, 1, '2017-03-06 02:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` text NOT NULL,
  `created` datetime NOT NULL,
  `address` varchar(100) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `email`, `created`, `address`, `note`) VALUES
(1, 'LẬP TRÌNH C', 'laptrinh123@gmail.com', '2017-02-01 00:00:00', '', ''),
(2, 'LẬP TRÌNH JAVA', 'java123@gmail.com', '2017-02-02 00:00:00', '', ''),
(3, 'BẢO TRÌ ỨNG DỤNG', 'baotri123@gmail.com', '2017-02-01 00:00:00', '', ''),
(4, 'CƠ SỞ DỮ LIỆU', 'csdl1234@gmail.com', '2017-02-05 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `embarks`
--

CREATE TABLE `embarks` (
  `id_user` int(11) NOT NULL,
  `id_depart` int(11) NOT NULL,
  `participate` datetime NOT NULL COMMENT 'ngay thanh lap'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `embarks`
--

INSERT INTO `embarks` (`id_user`, `id_depart`, `participate`) VALUES
(1, 1, '2017-02-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `letters`
--

CREATE TABLE `letters` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `image` text NOT NULL,
  `id_sender` int(11) NOT NULL COMMENT '(người gửi)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sex` varchar(5) NOT NULL,
  `image` text NOT NULL,
  `birthday` datetime NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `job` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `sex`, `image`, `birthday`, `phone`, `address`, `job`, `email`, `username`, `password`) VALUES
(1, 'Thanh Huyền', 'femal', '', '1995-06-01 00:00:00', 945875432, 'Hà Nội', 'Sinh Viên', 'thanhhuyen010695@gmail.com', 'HuyenMTA', '$2y$10$x6QSDfCWf0aTbD1PuCWyl.6AL97zac644yE1ecOGMQXVtMent8dGG'),
(2, 'Dương Anh', 'femal', '', '1995-02-19 00:00:00', 986346, 'Hải Dương', 'Sinh Viên', 'duonganhhd95@gmail.com', 'AnhMTA', '$2y$10$SWNpLvpPvOYkET6J1DOzfe/ISn4iVEtAhUBs1Y7cR5HQ6eFykSGfm'),
(3, 'Thanh Tùng MTA', 'male', '', '1994-03-14 00:00:00', 98774543, 'Thái Bình', 'Sinh Viên', 'tung94@gmail.com', 'TungMTA', '$2y$10$8SOu2QAlvIK60gP6EjtqmOWnGrkQ4jwDaZeaHmf717k9IEtdSkejy'),
(4, 'Lê Đức Anh', 'male', '', '1995-03-14 00:00:00', 974387534, 'Hà Nội', 'Sinh Viên', 'ducanh1234@gmail.com', 'DucAnhMTA', '$2y$10$fJ1XbKP3v.1riVNCUlr5feibtO6ybKYsoAhlP8po3w1jzBnSizRgO'),
(5, 'Mai Huỳnh Anh', 'male', '', '1995-05-14 00:00:00', 985783234, 'Quảng Nam', 'Sinh Viên', 'anh1234@gmail.com', 'HuynhAnhMTA', '$2y$10$Vh42G4HY2cBdhSYzPBS7EO9iwgdars3MyrBXAYKeThI7wLcgY7zky'),
(6, 'Nguyễn Khánh Linh', 'femal', '', '1995-07-14 00:00:00', 957672438, 'HÀ Nội', 'Sinh Viên', 'khanhlinh12@gmail.com', 'LinhMTA', '$2y$10$BYb7BlXZtj.nj8AVXpSxr.bT8JAN219T3tYNC/DqmGK7SCWDA3CfK'),
(38, 'Nguyễn Huyền Thư', 'femal', '', '1995-03-01 01:03:00', 975263748, 'Hà Nội', 'Sinh Viên', 'huyenthu1234@gmail.com', 'ThuMTA', '$2y$10$dRukVKVDY9Cg0KtqWqwYFeqxv3TwWysQR0kiVlyBS.xJYp7uA8xY2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `embarks`
--
ALTER TABLE `embarks`
  ADD PRIMARY KEY (`id_depart`,`id_user`);

--
-- Indexes for table `letters`
--
ALTER TABLE `letters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `letters`
--
ALTER TABLE `letters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th4 20, 2018 lúc 12:29 PM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_lv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(9) NOT NULL,
  `account` varchar(9) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `account`, `password`, `status`) VALUES
(1, 'B1310417', '123456', 1),
(2, 'gv1', '123456', 2),
(3, 'admin', 'admin', 3),
(4, 'b1', '123456', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dissertation`
--

CREATE TABLE `dissertation` (
  `id` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `summary` text,
  `dissertation_code` varchar(9) NOT NULL,
  `student` varchar(100) NOT NULL,
  `teacher` varchar(100) NOT NULL,
  `media_file` int(3) DEFAULT NULL,
  `type` int(2) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dissertation`
--

INSERT INTO `dissertation` (`id`, `title`, `summary`, `dissertation_code`, `student`, `teacher`, `media_file`, `type`, `status`) VALUES
(19, 'djkfbsdkfbsdkfb', NULL, '0', '[\"16\",\"17\"]', '[\"85\",\"86\"]', 0, 1, 0),
(20, 'Quan lý thu viện', NULL, '0', '[\"17\"]', '[\"85\"]', 0, 1, 0),
(21, 'Quan lý thu viện', NULL, '0', '[\"17\",\"16\",\"20\"]', '[\"85\",\"86\"]', 0, 0, 0),
(22, 'Quan lý thư viện trường tiêu học', NULL, '0', '[\"17\"]', '[\"85\"]', 0, 1, 0),
(24, 'dasdasd', NULL, 'asdasd', '[\"19\"]', '[\"85\"]', 0, 1, 0),
(25, 'dasdasd', NULL, 'asdasd', '[\"19\",\"17\",\"16\"]', '[\"85\"]', 0, 1, 0),
(26, 'Quan ly Noi dung', NULL, 'b199', '[\"20\",\"21\"]', '[\"87\"]', 0, 2, 1),
(27, 'Xu ly anh ', NULL, 'XLA', '[\"19\"]', '[\"85\"]', 0, 0, 1),
(29, 'lsfnlsdnldfngldg', NULL, 'dfbdkfbsk', '[\"21\"]', '[\"85\"]', 0, 1, 0),
(30, 'lsfnlsdnldfngldg', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p>fsdfsdfsdf</p>\n</body>\n</html>', 'dfbdkfbsk', '[\"21\",\"20\"]', '[\"85\"]', 0, 1, 0),
(31, 'ádád', NULL, 'sadádádád', '[\"19\"]', '[\"85\"]', 0, 2, 0),
(32, 'lllll', NULL, 'c01', '[\"19\"]', '[\"85\"]', 0, 1, 0),
(33, 'lllll', NULL, 'c01', '[\"19\"]', '[\"85\"]', 0, 1, 0),
(34, 'lllll', NULL, 'c01', '[\"19\"]', '[\"85\"]', 0, 1, 0),
(35, '', NULL, '', 'null', 'null', 0, 1, 0),
(36, 'TEST 1', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<ul>\n<li>\n<div>T&oacute;m tắt luận văn &ldquo;Vấn đề c&ocirc;ng bằng x&atilde; hội trong xo&aacute; đ&oacute;i giảm ngh&egrave;o ở Việt Nam hiện nay&rdquo; của t&aacute;c giả Phạm Văn Mến, chuy&ecirc;n ng&agrave;nh Triết học, m&atilde; số: 60.22.80, Trung t&acirc;m đ&agrave;o tạo, bồi dưỡng giảng vi&ecirc;n l&yacute; luận ch&iacute;nh trị, Đại học Quốc gia H&agrave; Nội, H&agrave; Nội, 2010.</div>\n<div>\n<ul>\n<li><strong>Đ&oacute;ng g&oacute;p của luận văn</strong></li>\n</ul>\n<p>Luận văn l&agrave;m s&aacute;ng tỏ một số vấn đề về c&ocirc;ng bằng x&atilde; hội trong xo&aacute; đ&oacute;i giảm ngh&egrave;o ở Việt Nam;&nbsp;L&agrave;m t&agrave;i liệu tham khảo cho việc nghi&ecirc;n cứu, giảng dạy, học tập.</p>\n<ul>\n<li><strong>Kết cấu của luận văn</strong></li>\n</ul>\n<p>&nbsp;</p>\n</div>\n</li>\n</ul>\n</body>\n</html>', 'TS1', '[\"19\"]', '[\"85\"]', 0, 1, 0),
(37, 'qqqqqqqqqqqqqq', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p>qqqqqqqqfdfdfdfd</p>\n</body>\n</html>', 'qqq', '[\"19\"]', '[\"85\"]', 0, 1, 0),
(38, 'qqqqqqqqqqqqqq', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p>qqqqqqqqfdfdfdfd</p>\n</body>\n</html>', 'qqq', '[\"19\"]', '[\"85\"]', 0, 1, 0),
(39, 'qqqqqqqqqqqqqq', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p>qqqqqqqqfdfdfdfd</p>\n</body>\n</html>', 'qqq', '[\"19\"]', '[\"85\"]', 0, 1, 0),
(40, 'qqqqqqqqqqqqqq', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p>qqqqqqqqfdfdfdfd</p>\n</body>\n</html>', 'qqq', '[\"19\"]', '[\"85\"]', 0, 1, 0),
(41, 'qqqqqqqqqqqqqq', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p>qqqqqqqqfdfdfdfd</p>\n</body>\n</html>', 'qqq', '[\"19\"]', '[\"85\"]', 0, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dissertation_detail`
--

CREATE TABLE `dissertation_detail` (
  `id` int(11) NOT NULL,
  `dissertation_id` int(11) NOT NULL,
  `dissertation_code` varchar(9) NOT NULL,
  `student_code` varchar(9) NOT NULL,
  `file_url` varchar(300) NOT NULL,
  `datetime` datetime(6) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dissertation_detail`
--

INSERT INTO `dissertation_detail` (`id`, `dissertation_id`, `dissertation_code`, `student_code`, `file_url`, `datetime`, `status`) VALUES
(6, 26, 'b199', 'B1310417', '26', '2018-04-13 10:55:43.000000', 1),
(7, 27, '', 'b1', '27', '2018-04-13 11:01:05.000000', 1),
(8, 0, 'b199', 'B1310417', '0_b199_B1310417_22_13_2018-03-05_Cv.pdf', '2018-04-20 10:39:54.000000', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL,
  `datetime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `content`, `status`, `datetime`) VALUES
(1, 'Tin tức mới', 'Tin tức mới', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Tin tức mới</p>\r\n</body>\r\n</html>', 1, '2018-04-11'),
(2, 'Tin tức mớiTin tức mới', 'Tin tức mớiLong', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Tin tức mớiTin tức mớiTin tức mớilong</p>\r\n</body>\r\n</html>', 1, '2018-04-11'),
(3, 'dxsd', 'fsdfsdfs', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>sdfsdfsdfsdfsdfsdf</p>\r\n</body>\r\n</html>', 1, '2018-04-11'),
(4, 'dfsdfsdf', 'sfdsfsdfdsf', 'sdfsdfsdfsf', 1, '2018-04-19'),
(5, 'dsfdsf', 'sdfsdfsdf', 'sdfsdfsdfsdfs', 1, '2018-04-19'),
(6, 'sdfsdf', 'sdfsdf', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>,jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj</p>\r\n</body>\r\n</html>', 1, '2018-04-14'),
(7, 'HỌC BỔNG KHUYẾN HỌC CSC VIỆT NAM', 'HỌC BỔNG KHUYẾN HỌC CSC VIỆT NAM', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>C&ocirc;ng ty CSC Việt Nam trao học bổng năm 2016 cho sinh vi&ecirc;n CNTT như sau:</p>\r\n<p>&ndash; SInh vi&ecirc;n năm 4 (hoặc ho&agrave;n th&agrave;nh &iacute;t nhất 100 t&iacute;n chỉ trở l&ecirc;n)</p>\r\n<p>&ndash; Mỗi học bổng trị gi&aacute; 5 triệu</p>\r\n<p>&ndash; Học bổng được trao v&agrave;o 09/04/2016 tại&nbsp;<a href=\"http://cit.ctu.edu.vn/index.php/thong-bao/270-ngay-h-i-vi-c-lam-cho-sinh-vien-cong-ngh-thong-tin-nam-2016\">sự kiện ng&agrave;y hội việc l&agrave;m</a></p>\r\n<p>&ndash; Xem th&ocirc;ng tin chi tiết:&nbsp;<a href=\"http://yu.ctu.edu.vn/wp-content/uploads/2016/03/Hoc-Bong-Khuyen-Hoc-2016_Can-Tho-University.pdf\" target=\"_blank\" rel=\"noopener\">Hoc Bong Khuyen Hoc 2016_Can Tho University</a></p>\r\n<p>- Hạn nộp hồ sơ: 11/03/2016</p>\r\n<p>- Nơi nộp hồ sơ: Văn ph&ograve;ng khoa</p>\r\n</body>\r\n</html>', 1, '2018-04-13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_tri_vien`
--

CREATE TABLE `quan_tri_vien` (
  `ma_so` int(11) NOT NULL,
  `ten_dang_nhap` varchar(20) NOT NULL,
  `mat_khau` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `quan_tri_vien`
--

INSERT INTO `quan_tri_vien` (`ma_so`, `ten_dang_nhap`, `mat_khau`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `static_page`
--

CREATE TABLE `static_page` (
  `id` int(9) NOT NULL,
  `title` varchar(200) NOT NULL,
  `name_url` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `datetime` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `static_page`
--

INSERT INTO `static_page` (`id`, `title`, `name_url`, `content`, `datetime`) VALUES
(1, 'fddasfsd', 'trangchu', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<div id=\"main\">\r\n<div id=\"maininner\">\r\n<section id=\"content\">\r\n<div id=\"system\">\r\n<article>\r\n<div>\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td width=\"48%\">&nbsp;</td>\r\n<td width=\"3%\">\r\n<div>&nbsp;</div>\r\n</td>\r\n<td width=\"49%\">\r\n<div align=\"justify\">&nbsp;</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"3\" width=\"100%\">\r\n<div align=\"justify\"><strong>Khoa C&ocirc;ng nghệ Th&ocirc;ng tin v&agrave; Truyền th&ocirc;ng (CNTT&amp;TT)</strong>&nbsp;- Trường Đại học Cần Thơ được th&agrave;nh lập năm 1994 tr&ecirc;n cơ sở Trung t&acirc;m Điện tử v&agrave; Tin học. Nhiệm vụ&nbsp; của khoa l&agrave; đ&agrave;o tạo đại học, sau đại học, nghi&ecirc;n cứu khoa học v&agrave; chuyển giao c&ocirc;ng nghệ trong lĩnh vực CNTT&amp;TT.</div>\r\n<div align=\"justify\">&nbsp;</div>\r\n<div align=\"justify\"><img style=\"max-width: 100%; height: auto; border-width: 0px; border-image-width: initial; min-width: 0px;\" src=\"http://cit.ctu.edu.vn/images/cit/khu2-khoa.jpg\" width=\"602\" height=\"339\" /></div>\r\n<div align=\"justify\">&nbsp;</div>\r\n<div align=\"justify\">&nbsp;</div>\r\n<div align=\"justify\">Tầm nh&igrave;n đến năm 2020, khoa l&agrave; đơn vị đ&agrave;o tạo v&agrave; nghi&ecirc;n cứu khoa học về CNTT&amp;TT mạnh của cả nước, c&oacute; vai tr&ograve; n&ograve;ng cốt trong đ&agrave;o tạo, nghi&ecirc;n cứu v&agrave; chuyển giao c&ocirc;ng nghệ cho v&ugrave;ng Đồng bằng s&ocirc;ng Cửu Long (ĐBSCL) v&agrave; khu vực ph&iacute;a nam, đạt chuẩn chất lượng đ&agrave;o tạo theo c&aacute;c chuẩn mực của c&aacute;c trường đại học ti&ecirc;n tiến v&agrave; c&aacute;c tổ chức kiểm định chất lượng gi&aacute;o dục trong khu vực v&agrave; thế giới.<br />&nbsp;<br />&nbsp;<br />Hiện tại, khoa đ&atilde; thực hiện được một số hợp t&aacute;c đ&agrave;o tạo v&agrave; nghi&ecirc;n cứu khoa học c&oacute; hiệu quả với c&aacute;c đối t&aacute;c kh&aacute;c nhau như:&nbsp;&nbsp;Đại học b&aacute;ch khoa Nantes, Đại học La Rochelle (Ph&aacute;p), Đại học khoa học ứng dụng Kermi-Tornio (Phần Lan), Viện nghi&ecirc;n cứu ph&aacute;t triển Ph&aacute;p (IRD), Viện Tin học Ph&aacute;p ngữ (IFI-H&agrave; Nội),&hellip;<br />&nbsp;&nbsp;<br />&nbsp;\r\n<div>Khoa kh&ocirc;ng ngừng phấn đấu ph&aacute;t triển qui m&ocirc; đ&agrave;o tạo, n&acirc;ng cao năng lực cho c&aacute;n bộ giảng dạy v&agrave; nghi&ecirc;n cứu, n&acirc;ng cấp cơ sở vật chất, mở rộng c&aacute;c mối quan hệ hợp t&aacute;c. Khoa hiện c&oacute; 93 c&aacute;n bộ, trong đ&oacute; c&oacute; 5 ph&oacute; gi&aacute;o sư, 24 tiến sĩ, 51 thạc sĩ.<br />&nbsp;</div>\r\n<div align=\"justify\">&nbsp;</div>\r\n<div align=\"justify\"><strong>Khoa c&oacute; tiềm lực ph&aacute;t triển trong c&aacute;c lĩnh vực:</strong></div>\r\n<div align=\"justify\"><strong>&nbsp;</strong></div>\r\n<div align=\"justify\">\r\n<ul type=\"disc\">\r\n<li>E-learning v&agrave; đ&agrave;o tạo từ xa</li>\r\n<li>Hệ thống th&ocirc;ng tin địa l&yacute; (GIS)</li>\r\n<li>Khai ph&aacute; dữ liệu (data mining) v&agrave; nhận dạng</li>\r\n<li>Dự b&aacute;o v&agrave; m&ocirc; phỏng</li>\r\n<li>T&iacute;nh to&aacute;n lớn v&agrave; điện to&aacute;n đ&aacute;m m&acirc;y</li>\r\n<li>An ninh mạng v&agrave; an to&agrave;n hệ thống</li>\r\n<li>Truyền th&ocirc;ng di động</li>\r\n</ul>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>\r\n<div align=\"justify\">&nbsp;</div>\r\n<div align=\"justify\"><strong>C&aacute;c bộ m&ocirc;n v&agrave; trung t&acirc;m<br />&nbsp;<br /></strong></div>\r\n<div align=\"justify\"><strong>&nbsp;</strong></div>\r\n<div align=\"justify\">●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bộ m&ocirc;n Hệ thống Th&ocirc;ng tin</div>\r\n<div align=\"justify\">●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bộ m&ocirc;n Mạng m&aacute;y t&iacute;nh &amp; Truyền th&ocirc;ng</div>\r\n<div align=\"justify\">●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bộ m&ocirc;n C&ocirc;ng nghệ phần mềm</div>\r\n<div align=\"justify\">●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bộ m&ocirc;n Khoa học m&aacute;y t&iacute;nh<br />●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bộ m&ocirc;n C&ocirc;ng nghệ th&ocirc;ng tin</div>\r\n<div align=\"justify\">●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bộ m&ocirc;n Tin học ứng dụng</div>\r\n<div align=\"justify\">●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tổ Văn ph&ograve;ng</div>\r\n<div align=\"justify\">●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Trung t&acirc;m Điện tử &amp; Tin học</div>\r\n<div align=\"justify\"><strong>&nbsp;<br />Ng&agrave;nh đ&agrave;o tạo đại học v&agrave; sau đại học</strong><br /><br />\r\n<ul type=\"disc\">\r\n<li>Hệ thống th&ocirc;ng tin</li>\r\n<li>Truyền th&ocirc;ng v&agrave; mạng m&aacute;y t&iacute;nh</li>\r\n<li>Kỹ thuật phần mềm</li>\r\n<li>Khoa học m&aacute;y t&iacute;nh</li>\r\n<li>C&ocirc;ng nghệ Th&ocirc;ng tin (CNTT v&agrave; Tin học ứng dụng)</li>\r\n<li>Thạc sĩ Hệ thống th&ocirc;ng tin</li>\r\n<li>Thạc sĩ Khoa học m&aacute;y t&iacute;nh</li>\r\n<li>Tiến sĩ Hệ thống th&ocirc;ng tin (2016)</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>L&atilde;nh đạo Khoa</p>\r\n<p>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TS. Nguyễn Hữu H&ograve;a, Trưởng khoa, phụ tr&aacute;ch chung</p>\r\n<p>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TS. Ng&ocirc; B&aacute; H&ugrave;ng, Ph&oacute; trưởng khoa phụ tr&aacute;ch đ&agrave;o tạo</p>\r\n<p>3.&nbsp;&nbsp;&nbsp; PGS.TS. Huỳnh Xu&acirc;n Hiệp, Ph&oacute; trưởng khoa phụ tr&aacute;ch nghi&ecirc;n cứu khoa học</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"3\" bgcolor=\"#ffff66\" width=\"100%\">&nbsp;<strong><em>Địa chỉ li&ecirc;n hệ:</em></strong>\r\n<div><strong>&nbsp;</strong></div>\r\n<div>Khu 2, Đại học Cần Thơ, đường 3/2, P. Xu&acirc;n Kh&aacute;nh, Quận Ninh Kiều, th&agrave;nh phố Cần Thơ.</div>\r\n<div>Website: http://&nbsp;<a href=\"http://www.cit.ctu.edu.vn/\">www</a><a href=\"http://www.cit.ctu.edu.vn/\">.</a><a href=\"http://www.cit.ctu.edu.vn/\">cit</a><a href=\"http://www.cit.ctu.edu.vn/\">.</a><a href=\"http://www.cit.ctu.edu.vn/\">ctu</a><a href=\"http://www.cit.ctu.edu.vn/\">.</a><a href=\"http://www.cit.ctu.edu.vn/\">edu</a><a href=\"http://www.cit.ctu.edu.vn/\">.</a><a href=\"http://www.cit.ctu.edu.vn/\">vn</a><br />Email:&nbsp;<a href=\"mailto:office@cit.ctu.edu.vn\">office@cit.ctu.edu.vn</a></div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</article>\r\n</div>\r\n</section>\r\n<div>\r\n<p>Lock full review&nbsp;<a href=\"http://8betting.co.uk/\" target=\"_blank\" rel=\"dofollow noopener\">www.8betting.co.uk</a>&nbsp;888 Bookmaker</p>\r\n</div>\r\n</div>\r\n</div>\r\n<section id=\"bottom-c\">\r\n<div>\r\n<div>\r\n<h3>HỆ&nbsp;THỐNG</h3>\r\n<ul style=\"list-style-type: none;\">\r\n<li><a href=\"https://elcit.ctu.edu.vn/\" target=\"_blank\" rel=\"noopener\">E-LEARNING</a></li>\r\n<li><a href=\"http://htql.ctu.edu.vn/\" target=\"_blank\" rel=\"noopener\">HỆ THỐNG QUẢN L&Yacute;</a></li>\r\n<li><a href=\"http://cit.ctu.edu.vn/vpk/login\">X&Aacute;C NHẬN ĐƠN</a></li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div>\r\n<div>&nbsp;</div>\r\n</div>\r\n</section>\r\n', '0000-00-00 00:00:00.000000'),
(2, 'gioithieu', 'gioithieu', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p><strong>Bộ m&ocirc;n Khoa Học M&aacute;y T&iacute;nh (KHMT)</strong>,&nbsp;thuộc Khoa C&ocirc;ng nghệ Th&ocirc;ng tin v&agrave; Truyền th&ocirc;ng, trường Đại Học Cần Thơ được th&agrave;nh lập ng&agrave;y 31 th&aacute;ng 12 năm 2009 theo quyết định số 2082/QĐ-ĐHCT. Kể từ khi dự định th&agrave;nh lập Bộ m&ocirc;n Khoa Học M&aacute;y T&iacute;nh, Ban Chủ Nhiệm Khoa CNTT&amp;TT, Qu&yacute; Thầy C&ocirc; của Khoa đ&atilde; t&iacute;ch cực đẩy mạnh c&ocirc;ng t&aacute;c đ&agrave;o tạo nguồn nh&acirc;n lực v&agrave; hoạt động nghi&ecirc;n cứu khoa học l&agrave;m tiền đề cho việc th&agrave;nh lập Bộ m&ocirc;n Khoa Học M&aacute;y T&iacute;nh. Hiện nay, nh&acirc;n sự của bộ m&ocirc;n được cơ cấu như sau:</p>\r\n<p>1. Trưởng bộ m&ocirc;n: Ph&oacute; Gi&aacute;o sư, Tiến sĩ Phạm Nguy&ecirc;n Khang</p>\r\n<p>2. Ph&oacute; trưởng bộ m&ocirc;n: Tiến sĩ Trần Nguyễn Minh Thư</p>\r\n<p>3. Tiến sĩ, &nbsp;GVC, L&ecirc; Quyết Thắng</p>\r\n<p>4. Thạc sĩ&nbsp;Phạm Xu&acirc;n Hiền</p>\r\n<p>5. Thạc sĩ Phạm Nguy&ecirc;n Ho&agrave;ng</p>\r\n<p>6.&nbsp;Tiến sĩ &nbsp;Nguyễn Th&agrave;nh Qu&iacute;</p>\r\n<p>7. Ks. L&ecirc; Thị Phương Dung</p>\r\n<p>8. Ths. Nguyễn B&aacute; Diệp</p>\r\n<p>9. Ths. V&otilde; Tr&iacute; Thức</p>\r\n<p>10. Ts. Trần Việt Ch&acirc;u</p>\r\n<p>11. Thạc sĩ. Trần Nguyễn Dương Chi</p>\r\n<p><strong>Nhiệm vụ</strong>&nbsp;của bộ m&ocirc;n l&agrave; đ&agrave;o tạo kỹ sư chuy&ecirc;n ng&agrave;nh Khoa học m&aacute;y t&iacute;nh, tham gia giảng dạy bậc cao học một số học phần li&ecirc;n quan cho chuy&ecirc;n ng&agrave;nh Hệ thống th&ocirc;ng tin, nghi&ecirc;n cứu khoa học, x&acirc;y dựng v&agrave; triển khai c&aacute;c giải ph&aacute;p chuy&ecirc;n s&acirc;u trong 3 lĩnh vực: &ldquo;Kh&aacute;m ph&aacute; tri thức v&agrave; khai mỏ dữ liệu&rdquo;, &ldquo;T&igrave;m kiếm ảnh, dữ liệu đa phương tiện&rdquo;, &ldquo;M&ocirc; h&igrave;nh ho&aacute;, m&ocirc; phỏng&rdquo;.</p>\r\n<p><strong>Tầm nh&igrave;n</strong>đến năm 2020, bộ m&ocirc;n Khoa học m&aacute;y t&iacute;nh &ndash; Khoa CNTT&amp;TT l&agrave; đơn vị đạt chuẩn chất lượng đ&agrave;o tạo theo chuẩn mực của c&aacute;c trường đại học ti&ecirc;n tiến trong khu vực v&agrave; tr&ecirc;n thế giới. Phấn đấu trong năm 2013, bộ m&ocirc;n c&oacute; thể triển khai chương tr&igrave;nh đ&agrave;o tạo thạc sĩ chuy&ecirc;n ng&agrave;nh Khoa học m&aacute;y t&iacute;nh.&nbsp;</p>\r\n<p><strong>Về đ&agrave;o tạo</strong>, bộ m&ocirc;n đ&aacute;p ứng cho nhiều tr&igrave;nh độ đ&agrave;o tạo kh&aacute;c nhau (cao đẳng, đại học v&agrave; sau đại học) cho chuy&ecirc;n ng&agrave;nh khoa học m&aacute;y t&iacute;nh. Sinh vi&ecirc;n được trang bị kiến thức, kỹ thuật chuy&ecirc;n ng&agrave;nh ứng dụng để x&acirc;y dựng c&aacute;c hệ chuy&ecirc;n gia trong hỗ trợ quyết định, chẩn đo&aacute;n, dự b&aacute;o, th&iacute;ch nghi; x&acirc;y dựng c&aacute;c hệ ph&aacute;t hiện tri thức; x&acirc;y dựng c&aacute;c hệ thống m&ocirc; phỏng&hellip; C&aacute;c học phần ch&iacute;nh do bộ m&ocirc;n phụ tr&aacute;ch bao gồm: to&aacute;n rời rạc, quy hoạch tuyến t&iacute;nh, phương ph&aacute;p t&iacute;nh, m&ocirc; phỏng, l&yacute; thuyết xếp hang, l&yacute; thuyết th&ocirc;ng tin, kỹ thuật đồ họa, xử l&yacute; ảnh, tr&iacute; tuệ nh&acirc;n tạo, m&aacute;y học, khai kho&aacute;ng dữ liệu, cơ sở tri thức, c&aacute;c hệ thống th&ocirc;ng minh, xử l&yacute; ng&ocirc;n ngữ tự nhi&ecirc;n, thị gi&aacute;c m&aacute;y t&iacute;nh, tr&igrave;nh bi&ecirc;n dịch, phương ph&aacute;p nghi&ecirc;n cứu khoa học v&agrave; tr&igrave;nh b&agrave;y b&aacute;o c&aacute;o khoa học, tr&iacute; tuệ nh&acirc;n tạo n&acirc;ng cao, quy hoạch động ngẫu nhi&ecirc;n.&nbsp;</p>\r\n<p><strong>Về nghi&ecirc;n cứu khoa học</strong>, hoạt động nghi&ecirc;n cứu của Bộ m&ocirc;n đạt được kết quả đ&aacute;ng tr&acirc;n trọng. theo 3 nh&oacute;m chuy&ecirc;n ng&agrave;nh &ldquo;Kh&aacute;m ph&aacute; tri thức v&agrave; khai mỏ dữ liệu&rdquo;, &ldquo;T&igrave;m kiếm ảnh, dữ liệu đa phương tiện&rdquo; v&agrave; &ldquo;M&ocirc; h&igrave;nh h&oacute;a, m&ocirc; phỏng&rdquo;.</p>\r\n<p>*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nh&oacute;m nghi&ecirc;n cứu&nbsp;<strong>kh&aacute;m ph&aacute; tri thức v&agrave; khai mỏ dữ liệu</strong>&nbsp;chủ yếu tập trung v&agrave;o nghi&ecirc;n cứu c&aacute;c giải thuật khai mỏ dữ liệu:</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; C&acirc;y quyết định&nbsp;</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; M&aacute;y học v&eacute;ctơ hỗ trợ</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Phương ph&aacute;p tập hợp m&ocirc; h&igrave;nh: Bagging, Boosting &amp; Random Forests</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Gom cụm dữ liệu với tiếp cận pretopology</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Phương ph&aacute;p hiển thị dữ liệu nhiều chiều</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Phương ph&aacute;p giảm chiều</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Xử l&yacute; dữ liệu lớn: giải thuật học tăng trưởng, song song, ph&acirc;n t&aacute;n</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Xử l&yacute; dữ liệu kh&ocirc;ng c&acirc;n bằng</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Xử l&yacute; dữ liệu ảnh, văn bản</p>\r\n<p>*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nh&oacute;m nghi&ecirc;n cứu&nbsp;<strong>t&igrave;m kiếm th&ocirc;ng tin ảnh v&agrave; dữ liệu đa phương tiện</strong>&nbsp;nghi&ecirc;n cứu nh&oacute;m giải thuật:</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; T&igrave;m kiếm dữ liệu ảnh</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Biểu diễn ảnh với m&ocirc; h&igrave;nh Bag-of-words / Scale-invariant feature transform</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Giảm chiều với Ph&acirc;n t&iacute;ch thừa số tương ứng</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; T&igrave;m kiếm ảnh: excentric labeling, zoom/pan, tương t&aacute;c, ph&acirc;n cấp</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cross-media (textual and visual data) alignment</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dữ liệu đa ng&ocirc;n ngữ</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Gom nh&oacute;m với giải thuật: Expectation Maximization, simulated annealing</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Giải thuật học tăng trưởng, song song</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nghi&ecirc;n cứu của nh&oacute;m m&ocirc; h&igrave;nh h&oacute;a, m&ocirc; phỏng tập trung v&agrave;o:</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nghi&ecirc;n cứu m&ocirc; h&igrave;nh đa t&aacute;c tử</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; M&ocirc;i trường GAMA ( GIS &amp; Agent-based Modelling Architecture)</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dự b&aacute;o dịch bệnh cho l&uacute;a, t&ocirc;m, c&aacute;</p>\r\n<p>Trước hết phải kể đến c&aacute;c c&ocirc;ng tr&igrave;nh đ&atilde; xuất bản ở c&aacute;c tạp ch&iacute; chuy&ecirc;n ng&agrave;nh, kỷ yếu hội thảo trong nước v&agrave; quốc tế, đề t&agrave;i cấp nh&agrave; nước. Kết quả thống k&ecirc; c&aacute;c c&ocirc;ng tr&igrave;nh như h&igrave;nh b&ecirc;n dưới, nội dung chi tiết c&oacute; thể tham khảo tại&nbsp;<a href=\"http://www.google.com/url?q=http%3A%2F%2Fwww.cit.ctu.edu.vn%2Findex.php%3Foption%3Dcom_content%26task%3Dview%26id%3D596%26Itemid%3D372%26lang%3Dvi&amp;sa=D&amp;sntz=1&amp;usg=AFQjCNE8sseA7vEitT19phvlkNt4R3lLPA\"><strong>địa chỉ</strong></a>&nbsp;</p>\r\n<p><strong><img style=\"max-width: 100%; height: auto; border-width: 0px; border-image-width: initial;\" src=\"http://cit.ctu.edu.vn/images/pub.jpg\" alt=\"\" /></strong></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;<strong>C&ocirc;ng tr&igrave;nh nghi&ecirc;n cứu khoa học</strong></p>\r\n<p>Thầy C&ocirc; cũng t&iacute;ch cực tham gia tổ chức hội thảo chuy&ecirc;n ng&agrave;nh, tham gia hội đồng x&eacute;t duyệt b&agrave;i b&aacute;o chuy&ecirc;n ng&agrave;nh: Vis-EGC 2005-2010, DMIN2008-2010, ASMDA 2005-2010, AKDM 2009, RNTI 2005-2010, Pattern Recognition 2008, Journal of Experimental Algorithmics 2009, ICTFIT 2008-2010, ICTACS 2010, CIE39 2009, ACIIDS 2010, QIMIE2009-2011</p>\r\n<p><strong>Hợp t&aacute;c</strong>, của bộ m&ocirc;n trong c&ocirc;ng t&aacute;c đ&agrave;o tạo v&agrave; nghi&ecirc;n cứu khoa học với c&aacute;c viện nghi&ecirc;n cứu, c&aacute;c trường đại học lớn của Ph&aacute;p, Đức, Bỉ, Canada như IRISA/INRIA-Rennes, INRIA-Paris11, Polytech&rsquo;Nantes, L3I-Larochelle, Telecom-Bretagne, ERIC-Lyon2, IRD-Paris 6, UCL Bỉ, IFAG Đức, UQAM Canada, IFI H&agrave; Nội.</p>\r\n<p>Ch&uacute;ng t&ocirc;i rất mong nhận được hợp t&aacute;c từ c&aacute;c cơ quan, tổ chức với phương ch&acirc;m &ldquo;hợp t&aacute;c c&ugrave;ng ph&aacute;t triển&rdquo;.</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<em><strong>Mọi chi tiết xin li&ecirc;n hệ:</strong></em></p>\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td valign=\"top\" width=\"295\">\r\n<p>PGS. TS.&nbsp;<strong>Phạm Nguy&ecirc;n Khang</strong></p>\r\n<p>Email: pnkhang_AT_cit.ctu.edu.vn</p>\r\n</td>\r\n<td valign=\"top\" width=\"295\">\r\n<p>TS.&nbsp;<strong>Trần Nguyễn Minh Thư</strong></p>\r\n<p>Email: tnmthu_AT_cit.ctu.edu.vn</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `code` varchar(9) NOT NULL,
  `course` int(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `dissertation_id` int(9) NOT NULL,
  `dissertation_code` varchar(9) DEFAULT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `student`
--

INSERT INTO `student` (`id`, `code`, `course`, `name`, `password`, `dissertation_id`, `dissertation_code`, `status`) VALUES
(16, 'B1310417', 0, 'long', '123456', 0, 'b199', 1),
(17, 'B1302021', 0, 'Ngọc Trâm Trần', '123456', 0, '', 1),
(18, 'B1301986', 0, 'Trần Yến Nhi', '123456', 0, '', 1),
(19, 'b1', 0, 'Cam Đại An', '', 41, '', 1),
(20, 'b9', 0, 'Nguyễn Văn Tèo', '', 30, '', 1),
(21, 'b8', 40, 'Nguyễn Văn Tý', '', 30, '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `code` varchar(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `teacher`
--

INSERT INTO `teacher` (`id`, `code`, `name`, `status`) VALUES
(84, 'gv0', 'Trần Nguyễn Minh Thư', 1),
(85, 'gv1', 'Trần Minh Thư', 1),
(86, 'gv2', 'Pham Xuan Hien', 1),
(87, 'gv3', 'Đặng Nguyên Khang', 1),
(88, 'gv4', 'Lê Minh THức', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher_manager_student`
--

CREATE TABLE `teacher_manager_student` (
  `id` int(9) NOT NULL,
  `teacher_id` int(9) NOT NULL,
  `student_id` int(9) NOT NULL,
  `dissertation_id` int(9) NOT NULL,
  `date` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `teacher_manager_student`
--

INSERT INTO `teacher_manager_student` (`id`, `teacher_id`, `student_id`, `dissertation_id`, `date`, `status`) VALUES
(72, 85, 21, 29, 0, 0),
(77, 85, 19, 31, 0, 0),
(78, 85, 19, 27, 0, 0),
(79, 85, 17, 21, 0, 0),
(80, 85, 16, 21, 0, 0),
(81, 85, 20, 21, 0, 0),
(82, 86, 17, 21, 0, 0),
(83, 86, 16, 21, 0, 0),
(84, 86, 20, 21, 0, 0),
(89, 87, 20, 26, 0, 0),
(90, 87, 21, 26, 0, 0),
(91, 85, 19, 32, 0, 0),
(92, 85, 19, 33, 0, 0),
(93, 85, 19, 34, 0, 0),
(126, 85, 19, 36, 0, 0),
(127, 85, 21, 30, 0, 0),
(128, 85, 20, 30, 0, 0),
(129, 85, 19, 37, 0, 0),
(130, 85, 19, 38, 0, 0),
(131, 85, 19, 39, 0, 0),
(132, 85, 19, 40, 0, 0),
(133, 85, 19, 41, 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dissertation`
--
ALTER TABLE `dissertation`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dissertation_detail`
--
ALTER TABLE `dissertation_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `static_page`
--
ALTER TABLE `static_page`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `teacher_manager_student`
--
ALTER TABLE `teacher_manager_student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `dissertation`
--
ALTER TABLE `dissertation`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `dissertation_detail`
--
ALTER TABLE `dissertation_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `static_page`
--
ALTER TABLE `static_page`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT cho bảng `teacher_manager_student`
--
ALTER TABLE `teacher_manager_student`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

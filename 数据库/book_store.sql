-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2023-01-03 05:04:00
-- 服务器版本： 8.0.27
-- PHP 版本： 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `book_store`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `admin_password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_password`) VALUES
(1, '陈勇', '1234567');

-- --------------------------------------------------------

--
-- 表的结构 `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `book_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `book_author` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `book_price` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `bookInfo` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `book_state` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '未借',
  `book_borrower` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '无',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_author`, `book_price`, `bookInfo`, `book_state`, `book_borrower`) VALUES
(1, '高等数学', '同济大学', '20', '线性代数是数学的一个分支，它的研究对象是向量，向量空间（或称线性空间），线性变换和有限维的线性方程组。向量空间是现代数学的一个重要课题；因而，线性代数被广泛地应用于抽象代数和泛函分析中；', '未借', '无'),
(2, '线性代数', '同济大学', '40', '高等数学是指相对于初等数学和中等数学而言，数学的对象及方法较为繁杂的一部分，中学的代数、几何以及简单的集合论初步、逻辑初步称为中等数学，将其作为中小学阶段的初等数学与大学阶段的高等数学的过渡。', '未借', '无'),
(3, 'JAVA从入门到精通', '明日科技', '80', '《Python从入门到精通》从初学者角度出发，通过通俗易懂的语言、丰富多彩的实例，详细介绍了使用Python进行程序开发应该掌握的各方面技术。全书共分22章，包括初识Python、Python语言基础、运算符与表达式、流程控制语句、列表与元组、字典与集合、字符串、Python中使用正则表达式、函数、面向对象程序设计、', '未借', '无'),
(4, '反欺骗的艺术', '凯文·米特尼克', '54', '著名黑客凯文·米特尼克于2002年推出的一本关于社会工程学的公益性质的畅销书，英文名为《The Art of Deception》。在本书的第一部分（第一章），我将展示信息安全的薄弱环节，并指出为什么你和你们的企业处于社会工程师攻击的危险之下。本书的第二部分（第二至九章），大家将会看到社会工程师是如何利用人们的信任、乐于助人的愿望和同情心使你上当受骗，从而获得他们想要的信息。本书通过小说故事的形式来叙述典型的攻击案例，给读者演示社会工程师可以戴上许多面具并冒充各种身份。如果你认为自己从来没有遇到过这种事情，你很可能错了。你能从本书的故事中认出自己似曾相识的场景么？你想知道自己是否经历过社会工程学的攻击么？这些都极有可能。但当你看完了第二章到第九章时，便知道下一个社会工程师打来电话时你该如何占取主动了。', '未借', '无'),
(5, 'Web安全攻防:渗透测试实战', '徐焱，李文轩，王东亚', '90', '《Web安全攻防：渗透测试实战指南》由浅入深、全面、系统地介绍了当前流行的高危漏洞的攻击手段和防御方法，并力求语言通俗易懂，举例简单明了，便于读者阅读、领会。结合具体案例进行讲解，可以让读者身临其境，快速地了解和掌握主流的漏洞利用技术与渗透测试技巧。', '未借', '无'),
(6, 'Kali Linux2 网络渗透测试实践指南', '李华峰', '90', '全书共15章，围绕如何使用Kali这款网络安全审计工具集合展开，涉及网络安全渗透测试的相关理论和工具、Kali Linux 2的基础知识、被动扫描、主动扫描、漏洞扫描、远程控制、渗透攻击、社会工程学工具、用Python?3编写漏洞渗透模块、网络数据的**与欺骗、无线安全渗透测试、拒绝服务攻击等知识点，并结合Nmap、Metasploit、Armitage、Wireshark、Burp Suite等工具进行全面的实操演示。', '未借', '无');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `user_gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `user_account` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `user_password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `user_phone` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `user_book` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '无',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `user_name`, `user_gender`, `user_account`, `user_password`, `user_phone`, `user_book`) VALUES
(13, '陈勇', '男', '1234567', '1234567', '1231232132', '无'),
(15, 'cy', '男', '', '', '', '无');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

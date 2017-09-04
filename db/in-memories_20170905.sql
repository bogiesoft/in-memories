-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 04, 2017 at 04:47 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii2basic`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_alert`
--

CREATE TABLE IF NOT EXISTS `db_alert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `content` varchar(512) NOT NULL,
  `theme` varchar(64) NOT NULL,
  `show_date` date NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime DEFAULT NULL,
  `read` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `db_alert`
--

INSERT INTO `db_alert` (`id`, `id_user`, `title`, `content`, `theme`, `show_date`, `create_time`, `update_time`, `read`) VALUES
(1, 3, '555', 'WTF', 'red', '2016-10-05', '2016-10-07 00:00:00', '2016-10-20 15:27:57', 1),
(2, 3, '0', 'gg', 'green', '2016-03-03', '2016-03-03 00:00:00', '2016-10-20 15:35:33', 0),
(3, 3, '2', 'tests', 'black', '2016-10-05', '2016-10-20 11:41:25', '2016-10-20 15:35:40', 1),
(4, 3, '3', 'หาดป่าตองหนึ่งในสถานที่ท่องเที่ยวของจังหวัดภูเก็ตเป็นหาดที่มีชื่อเสียงมากที่สุดของภูเก็ตและยังเป็นสถานที่ผักผ่อนที่มีนักท่องเที่ยวชาวต่างชาติมาผักผ่อนตลอดทั้งปีอีกด้วย', 'magenta', '2016-10-15', '2016-10-20 14:29:47', '2016-10-20 15:35:47', 1),
(5, 3, 'teststes', 'sad', 'magenta', '2017-01-19', '2017-01-19 12:49:19', NULL, 1),
(6, 3, 'ww', 'ww', 'red', '2017-01-19', '2017-01-19 12:58:32', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_board_comment`
--

CREATE TABLE IF NOT EXISTS `db_board_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `content` text NOT NULL,
  `post_time` datetime NOT NULL,
  `edit_time` datetime DEFAULT NULL,
  `post_ip` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `db_board_comment`
--

INSERT INTO `db_board_comment` (`id`, `id_user`, `id_topic`, `id_parent`, `content`, `post_time`, `edit_time`, `post_ip`) VALUES
(1, 3, 1, 0, '<p>tyests</p>\r\n', '2016-09-26 16:36:02', NULL, '127.0.0.1'),
(2, 3, 1, 1, '<p>dsfsfd</p>\r\n', '2016-09-26 16:36:10', NULL, '127.0.0.1'),
(3, 3, 2, 0, '<p>te</p>\r\n', '2016-09-26 16:36:32', NULL, '127.0.0.1'),
(4, 3, 2, 3, '<p>tt</p>\r\n', '2016-09-26 16:36:44', NULL, '127.0.0.1'),
(5, 1, 1, 1, '<p>gg</p>\r\n', '2016-09-26 16:37:37', NULL, '127.0.0.1'),
(6, 1, 2, 3, '<p>dsad</p>\r\n', '2016-09-26 16:38:32', NULL, '127.0.0.1'),
(7, 1, 2, 0, '<p>dsa</p>\r\n', '2016-09-26 16:38:41', NULL, '127.0.0.1'),
(8, 3, 2, 3, '<p>sda</p>\r\n', '2016-09-26 16:41:14', NULL, '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `db_board_noti_comment`
--

CREATE TABLE IF NOT EXISTS `db_board_noti_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_user_post` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL,
  `category` varchar(128) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `post_time` datetime NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `db_board_noti_comment`
--

INSERT INTO `db_board_noti_comment` (`id`, `id_user`, `id_user_post`, `id_topic`, `id_comment`, `category`, `title`, `post_time`, `active`) VALUES
(1, 3, 1, 1, 1, 'topic', NULL, '2016-09-26 16:36:02', 1),
(2, 1, 3, 1, 5, 'comment', NULL, '2016-09-26 16:37:37', 0),
(3, 1, 3, 2, 6, 'comment', NULL, '2016-09-26 16:38:33', 1),
(4, 1, 3, 2, 7, 'topic', NULL, '2016-09-26 16:38:41', 1),
(5, 3, 1, 2, 8, 'comment', NULL, '2016-09-26 16:41:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_board_topic`
--

CREATE TABLE IF NOT EXISTS `db_board_topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_forum` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` varchar(1024) NOT NULL,
  `content` text NOT NULL,
  `tag` varchar(256) NOT NULL,
  `post_time` datetime NOT NULL,
  `edit_time` datetime DEFAULT NULL,
  `post_ip` varchar(64) NOT NULL,
  `read` int(11) NOT NULL,
  `reply` int(11) NOT NULL,
  `sticky` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `db_board_topic`
--

INSERT INTO `db_board_topic` (`id`, `id_forum`, `id_user`, `title`, `content`, `tag`, `post_time`, `edit_time`, `post_ip`, `read`, `reply`, `sticky`) VALUES
(1, 0, 1, 'แหลมพรหมเทพ', '<p>หากใครไปภูเก็ตแล้วไม่ได้มาชมอาทิตย์ตกที่ แหลมพรหมเทพ ถือว่ามาไม่ถึง แหลมพรหมเทพจัดเป็นหนึ่งในจุดชมอาทิตย์ตกก่อนใครที่สวยที่สุดในเมืองไทย เป็นจุดชมวิวที่สวยงามของภูเก็ตอยู่ห่างจากหาดราไวย์ ประมาณ 2 กิโลเมตร เป็นแหลมที่อยู่ตอนใต้สุดของเกาะภูเก็ต ชาวบ้านเรียกว่าแหลมเจ้า มีลักษณะเป็นแหลมโค้งไล่ระดับทอดตัวสู่ท้องทะเล รอบข้างแวดล้อมด้วยต้นตาลที่ขึ้นแทรกอยู่เรียงราย สามารถเดินไปจนถึงปลายแหลมได้ มองเห็นน้ำทะเลสีเขียวมรกต และสามารถเห็นเกาะแก้วอยู่ด้านหน้าแหลม ส่วนด้านซ้ายจะมองเห็นหาดในยะซึ่งเป็นหาดเล็กๆ ทางขวาจะเห็นแนวหาดทรายของหาดในหาน นักท่องเที่ยวไม่ว่าจะเที่ยวหรือพักที่หาดใด พอช่วงใกล้เย็นพากันมาชมพระอาทิตย์ตกที่แหลมพรหมเทพ หากมาเที่ยวในวันที่อากาศดี ท้องฟ้าเปิด มีเมฆน้อย บรรยากาศพระอาทิตย์ตกที่แหลมพรหมเทพจะสวยงามมาก หากมาในฤดูร้อนมีทุ่งหญ้าสีทองขึ้นปกคลุมสวยงามมาก มองเห็นเกาะแก้วน้อย เกาะแก้วใหญ่และเกามัน ส่วน ในฤดูฝนจะเป็น เป็นสีเขียวรอบๆ แหลมพรหมเทพเป็นโขดหินขนาดใหญ่ยามคลื่นลมแรงจะเห็นฟองคลื่นสีขาวกระทบโขดหินซึ่งสวยงามมาก นอกจากนั้นยังมี &ldquo;ประภาคารกาญจนาภิเษก แหลมพรหมเทพ&rdquo; สร้างขึ้นในวโรกาสที่พระบาทสมเด็จพระเจ้าอยู่หัวฉลองสิริราชสมบัติครบ 50 ปี มีขนาดความกว้างที่ฐาน 9 เมตร สูง 50 ฟุต และแสงไฟจากโคมไฟจะมองเห็นไกลถึง 39 กิโลเมตร ภายในประภาคารมีการแสดงนิทรรศการเกี่ยวกับการสร้างประภาคาร การรักษาเวลามาตรฐาน การคำนวณ และแสดงเวลาดวงอาทิตย์ขึ้นและตก จากบนยอดของประภาคารยังเป็นจุดชมวิว WTF</p>\r\n', 'travel', '2016-09-19 00:00:00', '2016-09-20 18:55:42', '127.0.0.1', 12, 11, 0),
(2, 0, 3, 'หาดป่าตอง!!!', '<p><img alt="" src="/uploads/img/editor/1474281326_หาดป่าตอง.jpg" style="height:651px; width:1000px" /></p>\r\n\r\n<p>ถ้าพูดถึง &lsquo;หาดป่าตอง&rsquo; เชื่อว่า...คงไม่มีใครไม่รู้จักชายหาดที่สวยที่สุดของภูเก็ต ที่นี่โด่งดังไปทั่วโลกจนนักท่องเที่ยวทั้งไทยและต่างชาติหลั่งไหลกันมาเยี่ยมชม ความงามจากหาดทรายขาวละเอียด น้ำทะเลสีฟ้าใส และเสน่ห์อันเป็นเอกลักษณ์ที่ไม่เหมือนใคร แถมยังเป็นศูนย์9</p>\r\n', 'none', '2016-09-19 17:36:37', NULL, '127.0.0.1', 6, 17, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `db_comment`
--

CREATE TABLE IF NOT EXISTS `db_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `category` varchar(64) NOT NULL,
  `content` text NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime DEFAULT NULL,
  `create_ip` varchar(64) NOT NULL,
  `banned` tinyint(4) DEFAULT '0',
  `feeling` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `db_comment`
--

INSERT INTO `db_comment` (`id`, `id_user`, `id_parent`, `id_cat`, `category`, `content`, `create_time`, `update_time`, `create_ip`, `banned`, `feeling`) VALUES
(1, 3, 0, 6, 'memory', '<p>55555555599999999999</p>\r\n', '2016-11-10 16:15:01', NULL, '127.0.0.1', 1, 0),
(2, 1, 1, 6, 'memory', '<p>asdada</p>\r\n', '2016-11-10 16:15:53', NULL, '127.0.0.1', 0, 0),
(3, 3, 1, 6, 'memory', '<p>dadsadsasdas</p>\r\n', '2016-11-10 16:16:15', '2016-11-30 16:36:20', '127.0.0.1', 0, 0),
(8, 1, 0, 9, 'gallery', '<p>wow</p>\r\n', '2016-11-10 16:30:59', NULL, '127.0.0.1', 0, 1),
(9, 3, 0, 7, 'memory', '<p><img src="/uploads/img/editor/1479471459_14258283_504482566425396_1294330067470879923_o.jpg" class="img-responsive"></p>\r\n', '2016-11-18 19:17:51', '2016-11-18 19:19:55', '127.0.0.1', 0, 1),
(10, 3, 0, 6, 'memory', '<p>ddddddddd</p>\r\n', '2016-11-22 13:47:34', NULL, '127.0.0.1', 0, 0),
(11, 3, 0, 11, 'gallery', '<p>wwwwwwooooowwwwwww</p>\r\n', '2016-11-22 14:01:57', NULL, '127.0.0.1', 0, 1),
(12, 3, 0, 11, 'gallery', '<p>46564654654654654654</p>\r\n', '2016-11-22 14:02:10', NULL, '127.0.0.1', 0, 0),
(13, 3, 0, 11, 'gallery', '<p>l</p>\r\n', '2016-11-22 15:33:03', NULL, '127.0.0.1', 0, 0),
(14, 3, 0, 11, 'gallery', '<p>lllll</p>\r\n', '2016-11-22 15:33:09', NULL, '127.0.0.1', 0, 0),
(15, 3, 0, 11, 'gallery', '<p>hjukljh</p>\r\n', '2016-11-22 15:33:15', NULL, '127.0.0.1', 0, 0),
(16, 3, 0, 11, 'gallery', '<p>sda</p>\r\n', '2016-11-22 15:33:21', NULL, '127.0.0.1', 0, 0),
(17, 3, 0, 11, 'gallery', '<p>ftdr</p>\r\n', '2016-11-22 15:33:27', NULL, '127.0.0.1', 0, 0),
(18, 3, 0, 11, 'gallery', '<p>bgdfd</p>\r\n', '2016-11-22 15:33:33', NULL, '127.0.0.1', 0, 0),
(19, 3, 0, 11, 'gallery', '<p>dgdfgdf</p>\r\n', '2016-11-22 15:33:40', NULL, '127.0.0.1', 0, 0),
(20, 3, 0, 11, 'gallery', '<p>fsdfsfdsfs</p>\r\n', '2016-11-22 15:34:01', NULL, '127.0.0.1', 0, 0),
(21, 3, 0, 11, 'gallery', '<p>dsfdsfdfa</p>\r\n', '2016-11-22 15:34:09', NULL, '127.0.0.1', 0, 0),
(22, 3, 0, 11, 'gallery', '<p>sfdsfdfsf</p>\r\n', '2016-11-22 15:34:15', NULL, '127.0.0.1', 0, 0),
(23, 3, 0, 11, 'gallery', '<p>dsfdsfdsfdsfs</p>\r\n', '2016-11-22 15:34:22', NULL, '127.0.0.1', 0, 0),
(24, 3, 1, 6, 'memory', '<p>adadsa</p>\r\n', '2016-11-22 19:33:34', NULL, '127.0.0.1', 0, 0),
(25, 3, 0, 6, 'memory', '<p>saddadss</p>\r\n', '2016-11-22 19:34:04', NULL, '127.0.0.1', 0, 0),
(26, 3, 0, 11, 'gallery', '<p>wwwwwww</p>\r\n', '2016-12-02 12:46:12', NULL, '127.0.0.1', 0, 1),
(27, 3, 0, 7, 'memory', '<p>fsdfdsf</p>\r\n', '2016-12-02 12:47:00', NULL, '127.0.0.1', 0, 1),
(28, 16, 0, 6, 'memory', '<p>โคตรเจ๋ง</p>\r\n', '2016-12-06 14:48:11', NULL, '127.0.0.1', 0, 0),
(29, 3, 28, 6, 'memory', '<p>ใช่ๆๆ</p>\r\n', '2016-12-09 13:26:09', NULL, '127.0.0.1', 0, 0),
(30, 16, 0, 7, 'memory', '<p>โคตรเจ๋ง</p>\r\n', '2016-12-12 11:41:47', NULL, '127.0.0.1', 0, 1),
(31, 16, 26, 11, 'gallery', '<p>dasddad</p>\r\n', '2016-12-14 12:01:58', NULL, '127.0.0.1', 0, 0),
(32, 16, 23, 11, 'gallery', '<p>asdada</p>\r\n', '2016-12-14 12:02:49', NULL, '127.0.0.1', 0, 0),
(33, 3, 8, 9, 'gallery', '<p>GG</p>\r\n', '2017-01-19 15:51:16', NULL, '127.0.0.1', 0, 0),
(34, 3, 0, 9, 'memory', '<p>ทดสอบ</p>\r\n', '2017-01-20 13:09:57', NULL, '127.0.0.1', 0, 0),
(35, 3, 0, 9, 'memory', '<p>tew</p>\r\n', '2017-01-20 17:29:09', NULL, '127.0.0.1', 0, 0),
(36, 16, 0, 9, 'gallery', '<p>gg</p>\r\n', '2017-01-25 11:35:29', NULL, '127.0.0.1', 0, 0),
(37, 48, 0, 9, 'memory', '<p>gg</p>\r\n', '2017-01-26 16:50:40', NULL, '127.0.0.1', 0, 0),
(38, 48, 0, 9, 'memory', '<p>xxx</p>\r\n', '2017-01-26 16:51:38', NULL, '127.0.0.1', 0, 0),
(39, 48, 0, 9, 'memory', '<p>xxx</p>\r\n', '2017-01-26 16:52:37', NULL, '127.0.0.1', 0, 0),
(40, 48, 35, 9, 'memory', '<p>HHH+</p>\r\n', '2017-01-26 16:53:47', NULL, '127.0.0.1', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_contact`
--

CREATE TABLE IF NOT EXISTS `db_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `other` varchar(256) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `body` text NOT NULL,
  `create_time` datetime NOT NULL,
  `ip` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `db_contact`
--

INSERT INTO `db_contact` (`id`, `name`, `email`, `other`, `subject`, `body`, `create_time`, `ip`) VALUES
(1, 'test', 'g@gg.com', '99999999', 'ss', 'ss', '2016-11-17 13:38:27', '127.0.0.1'),
(2, 'test', 'wtf@gmail.com', '111', '11', '111', '2016-12-13 11:20:31', '127.0.0.1'),
(3, 'test', 'wtf@gmail.com', '111', '11', '111', '2016-12-13 11:22:33', '127.0.0.1'),
(4, 'asda', 'adas@g.com', 'ads', 'asd', 'asd', '2016-12-13 11:25:09', '127.0.0.1'),
(5, 'asda', 'adas@g.com', 'ads', 'asd', 'asd', '2016-12-13 11:26:29', '127.0.0.1'),
(6, 'asda', 'adas@g.com', 'ads', 'asd', 'asd', '2016-12-13 11:27:17', '127.0.0.1'),
(7, 'asd', 'wtf@gmail.com', 'asd', 'sad', 'ads', '2016-12-13 11:27:47', '127.0.0.1'),
(8, 'asd', 'wtf@gmail.com', 'asd', 'ads', 'asd', '2016-12-13 11:30:40', '127.0.0.1'),
(9, 'asda', 'wtf@gmail.com', 'asd', 'asd', 'asd', '2016-12-13 11:32:33', '127.0.0.1'),
(10, 'stss', 'wtf@gmail.com', 'asda', 'asda', 'ads', '2016-12-13 12:14:10', '127.0.0.1'),
(11, 'test', 'gg@gg.com', 'xxx', 'ss', 'ss', '2017-01-25 13:30:49', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `db_content`
--

CREATE TABLE IF NOT EXISTS `db_content` (
  `id_content` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `content` varchar(500) NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_content`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `db_content`
--

INSERT INTO `db_content` (`id_content`, `type`, `name`, `content`, `active`) VALUES
(1, 'comment-banned', '1', 'ความคิดเห็นนี้ได้ถูกลบออกเนื่องจาก มีการรายงานถึงการใช้ถ้อยคำที่ไม่สุภาพ หรือพาดพิง และทำให้เกิดความเข้าใจผิด ในประเด็นการสนทนา', 1),
(2, 'comment-banned', '2', 'ความคิดเห็นนี้ได้ถูกลบออกไปจากระบบเรียบร้อยแล้ว หากยังมีการนำเนื้อหาต่างๆ ไปเผยแพร่ต่อนั้นทางเราไม่มีส่วนเกี่ยวข้องด้วย หากมีการดำเนินการทางกฎหมายกรุณาติดต่อผู้พัฒนาเว็บไซต์นั้นๆ โดยตรง', 1),
(3, 'title', 'title', 'IN MEMORIES เก็บเรื่องราวและความทรงจำต่างๆ เอาไว้เพื่อกลับมาหวนระลึกถึงอีกครั้งในภายหลัง', 1),
(4, 'keywords', 'keywords', 'memory, gellery, alert, note, photo, image, ความทรงจำ, รูปถ่าย, อัลบั้ม, บันทึก, ข้อความ, เตือนความจำ', 1),
(5, 'description', 'description', 'memory, gellery, alert, note, photo, image, ความทรงจำ, รูปถ่าย, อัลบั้ม, บันทึก, ข้อความ, เตือนความจำ', 1),
(6, 'no-data', 'glyphicon glyphicon-remove-sign', 'ไม่พบข้อมูลที่ท่านต้องการ หรือข้อมูลนี้อาจโดนปิดกั้นการเข้าถึงจากบุคคลอื่น', 1),
(7, 'alert-banned', 'glyphicon glyphicon-info-sign', 'ข้อมูลของท่านได้ถูกปิดกั้นเนื้อหาออกจากสาธารรณะ เนื่องจากมีข้อความหรือเนื้อหาที่ไม่เหมาะสม หากต้องการแก้ไขกรุณาติดต่อ Admin', 1),
(8, 'banned-page', 'glyphicon glyphicon-lock', 'ท่านโดนลงโทษ ห้ามแก้ไข หรือแสดงความเห็นต่างๆ เนื่องจากทางเราได้ตรวจพบเนื้อหาที่ไม่เหมาะสมของท่าน ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_exp`
--

CREATE TABLE IF NOT EXISTS `db_exp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) NOT NULL,
  `exp` int(11) NOT NULL,
  `count_bonus` int(11) DEFAULT NULL,
  `exp_bonus` int(11) DEFAULT NULL,
  `other` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `db_exp`
--

INSERT INTO `db_exp` (`id`, `category`, `exp`, `count_bonus`, `exp_bonus`, `other`) VALUES
(1, 'gallery', 50, NULL, NULL, ''),
(2, 'memory', 50, NULL, NULL, ''),
(3, 'comment', 5, NULL, NULL, ''),
(4, 'like', 15, NULL, NULL, ''),
(5, 'feeling', 20, NULL, NULL, ''),
(6, 'report', 10, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `db_expend`
--

CREATE TABLE IF NOT EXISTS `db_expend` (
  `id_note` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `list` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `amount` double NOT NULL,
  `date` date NOT NULL,
  `tag` varchar(128) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_note`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `db_expend`
--

INSERT INTO `db_expend` (`id_note`, `id_user`, `list`, `price`, `amount`, `date`, `tag`, `status`) VALUES
(1, 0, 'm16', 300000, 2, '2016-01-08', '0', -1),
(3, 0, 'm249', 111111, 2, '2016-01-16', '0', -1),
(4, 0, 'kill wtf', 10, 200, '2016-01-20', '0', 1),
(5, 0, 'steal canabis', 1000, 15, '2016-02-01', '0', 1),
(6, 0, 'God like', 5000, 1, '2016-03-01', '0', 1),
(7, 0, 'buy dota', 2500, 2, '2016-04-07', '5', -1),
(10, 0, 'sale canabis', 2000, 10, '2016-02-05', '0', 1),
(17, 17, 'test', 100, 1, '2016-03-28', '1', 1),
(18, 17, '2', 200, 2, '2016-03-28', '1', 1),
(24, 3, '', 500, 0, '2016-11-16', 'ค่าน้ำมัน', -1),
(25, 3, '', 50, 0, '2016-11-16', 'ชา, กาแฟ', -1),
(26, 3, '', 5000, 0, '2016-11-16', 'มือปืน', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_feeling_comment`
--

CREATE TABLE IF NOT EXISTS `db_feeling_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_user_owner` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL,
  `value` tinyint(4) NOT NULL,
  `detail` varchar(128) DEFAULT NULL,
  `create_time` datetime NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `db_feeling_comment`
--

INSERT INTO `db_feeling_comment` (`id`, `id_user`, `id_user_owner`, `id_comment`, `value`, `detail`, `create_time`, `active`) VALUES
(1, 3, 1, 8, 1, NULL, '2016-12-12 11:27:46', 0),
(2, 16, 3, 9, 1, NULL, '2016-12-12 11:41:30', 0),
(3, 3, 16, 30, 1, NULL, '2016-12-12 11:42:19', 0),
(4, 16, 3, 11, 0, NULL, '2016-12-12 16:47:33', 0),
(5, 16, 3, 26, 1, NULL, '2016-12-14 12:01:19', 0),
(6, 3, 16, 36, 0, NULL, '2017-01-25 11:36:29', 0),
(7, 16, 3, 27, 1, NULL, '2017-01-25 19:23:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_footer`
--

CREATE TABLE IF NOT EXISTS `db_footer` (
  `id_footer` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `detail_1` text NOT NULL,
  `detail_2` varchar(512) DEFAULT NULL,
  `detail_3` varchar(512) DEFAULT NULL,
  `url` varchar(256) DEFAULT NULL,
  `active` tinyint(4) NOT NULL,
  `sorting` int(11) NOT NULL,
  PRIMARY KEY (`id_footer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `db_footer`
--

INSERT INTO `db_footer` (`id_footer`, `type`, `title`, `detail_1`, `detail_2`, `detail_3`, `url`, `active`, `sorting`) VALUES
(1, 'about us', 'About us', 'ทุกวันเราพบเจอเรื่องต่างๆมากมาย จำได้บ้างจำไม่ได้บ้าง "ความทรงจำ" ถือเป็นเรื่องพิเศษ คนเราเลือกที่จะจดจำสิ่งต่างๆ ไม่ได้ บางครั้งเรายังไม่ทันจดมันลงไปในหัวเลย แต่เราก็กลับจำมันได้เสียแล้ว เรื่องที่คนเราจะมีความทรงจำ มักจะเกี่ยวกับอะไรๆที่ "ที่สุด" ไม่ว่าจะเป็นเรื่องที่ทำให้เรามีความสุขที่สุด หรือ เรื่องที่ทำให้เราเจ็บปวดที่สุด ไม่ว่าจะเป็นเรื่องราวแบบไหนก็ล้วนเป็นประสบการณ์ที่คอยบอกให้เรารู้ว่าเราเคยมีสิ่งดีๆผ่านเข้ามาในชีวิต รวมถึงเรื่องที่เคยทำผิดพลาดไว้คอยเตือนเพื่อไม่ให้เกิดสิ่งเหล่านั้นขึ้นอีก In-memorie จะเป็นคลังเก็บเรื่องราวและความทรงจำต่างๆ ไว้เป็บประสบการณ์ชีวิต ที่อยากหวนกลับมาระลึกถึงอีกครั้ง และคอยย้ำเตือนสติในการใช้ชีวิต หรือใครอยากแชร์ให้คนอื่นได้รับรู้เรื่องราวหรือประสบการณ์ต่างๆ ก็สามารถเข้ามาแชร์และพูดคุยกันได้', '', '', '', 1, 1),
(2, 'contact', 'Contact', 'Dressrosa Island', 'เหล่าพันธมิตร', 'สูญ 8 ตาย 6 บาดเจ็บ นับไม่ถ้วน', '', 0, 2),
(3, 'map', 'Map', '99.9', '128.099', '', '', 0, 3),
(4, 'connection', 'Connection', 'Hadyai Cercus', 'ณ บางขวาง', 'หลัง มอ.', '', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `db_gallery`
--

CREATE TABLE IF NOT EXISTS `db_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `ref` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `detail` varchar(512) DEFAULT NULL,
  `create_date` date NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `read` int(11) NOT NULL,
  `show` tinyint(4) DEFAULT '0',
  `banned` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `db_gallery`
--

INSERT INTO `db_gallery` (`id`, `id_user`, `ref`, `name`, `title`, `detail`, `create_date`, `update_date`, `read`, `show`, `banned`) VALUES
(1, 3, 'vOBEh7c-O84rlu8oFH45oT', 'jp', 'xx', 'xx', '2016-12-22', '2017-01-10 13:49:41', 1, 1, 0),
(2, 3, 'WrRbN76flqWcFbk5pXbKOW', 'hh', 'hh', 'hh', '2016-12-22', NULL, 1, 1, 0),
(3, 3, 'EpXIMJ_3A57gpwevP6Q9Nz', 'ada', 'da', 'da', '2016-12-22', NULL, 0, 1, 0),
(4, 3, 'c-lC_0FdeBJlOXl-0G_rk9', 'dgd', 'dgd', 'dfg', '2016-12-22', NULL, 0, 1, 0),
(5, 3, 'dq18bPY7dkykP9T4fFQ2aG', 'newbie', 'xxxs', 'xxxx', '2017-01-11', '2017-01-12 12:52:56', 0, 0, 0),
(6, 3, '8UJV1R7_VPngae5NPca444', 'fuck', 'xx', 'xxx', '2017-01-11', '2017-01-11 17:18:45', 0, 0, 0),
(7, 3, 't2LFoZfiTEO0zNKrbBKUq4', 'ena', 'e', 'e', '2017-01-11', NULL, 0, 0, 0),
(8, 3, 'OCGBt2jwr_YkGVGsrzPpv7', 'gg', 'e', 'eee', '2017-01-11', '2017-01-11 18:08:07', 0, 0, 0),
(9, 16, 'vmj3cQeCkJNnYelxpqhfzE', 'ronaldo', 'do', 'do', '2017-01-13', NULL, 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_gallery_images`
--

CREATE TABLE IF NOT EXISTS `db_gallery_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_gallery` int(11) NOT NULL,
  `ref` varchar(128) NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `detail` varchar(512) DEFAULT NULL,
  `file_name` varchar(512) NOT NULL,
  `real_name` varchar(512) NOT NULL,
  `path` varchar(256) NOT NULL,
  `sorting` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `db_gallery_images`
--

INSERT INTO `db_gallery_images` (`id`, `id_gallery`, `ref`, `title`, `detail`, `file_name`, `real_name`, `path`, `sorting`) VALUES
(1, 1, 'vOBEh7c-O84rlu8oFH45oT', '', '', '27.jpg', '53307dbd93b5a8b7132313dce67436b4.jpg', '/uploads/img/gallery/3/vOBEh7c-O84rlu8oFH45oT/', 1),
(2, 1, 'vOBEh7c-O84rlu8oFH45oT', '', '', '28.jpg', 'c0232b98b69bb15658daddf6749fe6e3.jpg', '/uploads/img/gallery/3/vOBEh7c-O84rlu8oFH45oT/', 2),
(3, 1, 'vOBEh7c-O84rlu8oFH45oT', '', '', '29.jpg', '55ffbca6de25045910b402193377843f.jpg', '/uploads/img/gallery/3/vOBEh7c-O84rlu8oFH45oT/', 3),
(4, 1, 'vOBEh7c-O84rlu8oFH45oT', '', '', '25.jpg', '4bf309855d1cc476ec04788a65a51238.jpg', '/uploads/img/gallery/3/vOBEh7c-O84rlu8oFH45oT/', 4),
(5, 1, 'vOBEh7c-O84rlu8oFH45oT', '', '', '30.jpg', '9d5052eae7972c8c86dc6ce196499e87.jpg', '/uploads/img/gallery/3/vOBEh7c-O84rlu8oFH45oT/', 5),
(6, 1, 'vOBEh7c-O84rlu8oFH45oT', '', '', '26.jpg', 'f3e839e4fc79a6e5688ae7a5987cdf83.jpg', '/uploads/img/gallery/3/vOBEh7c-O84rlu8oFH45oT/', 6),
(7, 2, 'WrRbN76flqWcFbk5pXbKOW', '', '', '5.jpg', '0b7dd8e4909bb45462f3f684c9ec0cc3.jpg', '/uploads/img/gallery/3/WrRbN76flqWcFbk5pXbKOW/', 1),
(8, 2, 'WrRbN76flqWcFbk5pXbKOW', '', '', '22.jpg', '74b4e93be6e34ff4b03fbb28705bbc19.jpg', '/uploads/img/gallery/3/WrRbN76flqWcFbk5pXbKOW/', 2),
(9, 2, 'WrRbN76flqWcFbk5pXbKOW', '', '', '13.jpg', '4f39ed511ff8a4ed750adaa45dedf575.jpg', '/uploads/img/gallery/3/WrRbN76flqWcFbk5pXbKOW/', 3),
(10, 2, 'WrRbN76flqWcFbk5pXbKOW', '', '', '21.jpg', 'e8732af77b904f4570f082e18a755965.jpg', '/uploads/img/gallery/3/WrRbN76flqWcFbk5pXbKOW/', 4),
(11, 3, 'EpXIMJ_3A57gpwevP6Q9Nz', '', '', '7.jpg', 'd7f72bb157e00b502a1f093b23163d1d.jpg', '/uploads/img/gallery/3/EpXIMJ_3A57gpwevP6Q9Nz/', 1),
(12, 3, 'EpXIMJ_3A57gpwevP6Q9Nz', '', '', '19.jpg', '20585be6ce731228916d09538df92097.jpg', '/uploads/img/gallery/3/EpXIMJ_3A57gpwevP6Q9Nz/', 2),
(13, 3, 'EpXIMJ_3A57gpwevP6Q9Nz', '', '', '15.jpg', '5d2f3527a3bbd3725a23980f06568e1a.jpg', '/uploads/img/gallery/3/EpXIMJ_3A57gpwevP6Q9Nz/', 3),
(14, 4, 'c-lC_0FdeBJlOXl-0G_rk9', '', '', '20.jpg', '8a0ae8dc30ff42acb5e4ba16b9c98f1d.jpg', '/uploads/img/gallery/3/c-lC_0FdeBJlOXl-0G_rk9/', 1),
(15, 4, 'c-lC_0FdeBJlOXl-0G_rk9', '', '', '11.jpg', 'ed149fa7a26295961c1b73a594433104.jpg', '/uploads/img/gallery/3/c-lC_0FdeBJlOXl-0G_rk9/', 2),
(16, 1, 'vOBEh7c-O84rlu8oFH45oT', '', '', '02.jpg', '6b25c7d27fa7bbf1eeb827656e5eda4e.jpg', '/uploads/img/gallery/3/vOBEh7c-O84rlu8oFH45oT/', 7),
(17, 6, '8UJV1R7_VPngae5NPca444', '1', '1', '26.jpg', 'cc22bcd7749b4615a99ce8a07f5a5c64.jpg', '/uploads/img/gallery/3/8UJV1R7_VPngae5NPca444/', 1),
(18, 6, '8UJV1R7_VPngae5NPca444', 'test', '82354354433535435443433543434343434', '25.jpg', 'ca211ea56b7be54817ea2b99ea5dd461.jpg', '/uploads/img/gallery/3/8UJV1R7_VPngae5NPca444/', 2),
(19, 6, '8UJV1R7_VPngae5NPca444', 'asddadadfdsfsfsfdsfsfdsfsf', 'adadcxzcxcvcvxcvxvxasdada', '05.jpg', 'ec8aff6e3326053e58792df617f846c7.jpg', '/uploads/img/gallery/3/8UJV1R7_VPngae5NPca444/', 3),
(20, 6, '8UJV1R7_VPngae5NPca444', '', '', '21.jpg', '0f8912f6a84d78a5342dc2b8ae01c1a9.jpg', '/uploads/img/gallery/3/8UJV1R7_VPngae5NPca444/', 4),
(21, 6, '8UJV1R7_VPngae5NPca444', '', '', '12.jpg', '46ca82bec5cc12c4f59ba9dab911be83.jpg', '/uploads/img/gallery/3/8UJV1R7_VPngae5NPca444/', 5),
(22, 6, '8UJV1R7_VPngae5NPca444', '', '', '27.jpg', '1aa040d54d786106c0bf99bc52189b7c.jpg', '/uploads/img/gallery/3/8UJV1R7_VPngae5NPca444/', 6),
(23, 6, '8UJV1R7_VPngae5NPca444', '', '', '07.jpg', '34c0ee2d3bc854907f02cc66d0e0bb80.jpg', '/uploads/img/gallery/3/8UJV1R7_VPngae5NPca444/', 7),
(24, 6, '8UJV1R7_VPngae5NPca444', '', '', '14.jpg', '7566f53efae1c5cccbc2ff2712c6ebc1.jpg', '/uploads/img/gallery/3/8UJV1R7_VPngae5NPca444/', 8),
(25, 6, '8UJV1R7_VPngae5NPca444', '', '', '17.jpg', '2767531a47afdd2a1bb9c82ecd42a2c0.jpg', '/uploads/img/gallery/3/8UJV1R7_VPngae5NPca444/', 9),
(26, 6, '8UJV1R7_VPngae5NPca444', '', '', '04.jpg', '86af5cc68ea9e3a0645726927d3e40d7.jpg', '/uploads/img/gallery/3/8UJV1R7_VPngae5NPca444/', 10),
(27, 6, '8UJV1R7_VPngae5NPca444', '', '', '03.jpg', 'e90bbc47a0c38287ce9c31b2e1eaf193.jpg', '/uploads/img/gallery/3/8UJV1R7_VPngae5NPca444/', 11),
(28, 6, '8UJV1R7_VPngae5NPca444', '', '', '01.jpg', '6653de996bd5d596c34d235070fbffdf.jpg', '/uploads/img/gallery/3/8UJV1R7_VPngae5NPca444/', 12),
(29, 6, '8UJV1R7_VPngae5NPca444', '', '', '08.jpg', '84abf1af365f6cb02377ab6659dbedfb.jpg', '/uploads/img/gallery/3/8UJV1R7_VPngae5NPca444/', 13),
(30, 6, '8UJV1R7_VPngae5NPca444', '', '', '07.jpg', '47716f0217a08347a7c1582f99911960.jpg', '/uploads/img/gallery/3/8UJV1R7_VPngae5NPca444/', 14),
(31, 6, '8UJV1R7_VPngae5NPca444', '', '', '14.jpg', '4f12e69a9c164f336b856081923eb417.jpg', '/uploads/img/gallery/3/8UJV1R7_VPngae5NPca444/', 15),
(32, 6, '8UJV1R7_VPngae5NPca444', '', '', '06.jpg', '539cd308d0d4ca6dbe117fdaeb63342b.jpg', '/uploads/img/gallery/3/8UJV1R7_VPngae5NPca444/', 16),
(33, 6, '8UJV1R7_VPngae5NPca444', '', '', '13.jpg', '6fc4544dd6265fc88517f43867dfa301.jpg', '/uploads/img/gallery/3/8UJV1R7_VPngae5NPca444/', 17),
(34, 6, '8UJV1R7_VPngae5NPca444', '', '', '10.jpg', '1a6acd91090d6bd5af7d29347fe6586e.jpg', '/uploads/img/gallery/3/8UJV1R7_VPngae5NPca444/', 18),
(35, 6, '8UJV1R7_VPngae5NPca444', '', '', '09.jpg', 'cc08dc122cf63c7705ea608e25f4f4c8.jpg', '/uploads/img/gallery/3/8UJV1R7_VPngae5NPca444/', 19),
(36, 6, '8UJV1R7_VPngae5NPca444', '', '', '26.jpg', '090679d8cb3bab1eda9ddf2b3df03adf.jpg', '/uploads/img/gallery/3/8UJV1R7_VPngae5NPca444/', 20),
(37, 8, 'OCGBt2jwr_YkGVGsrzPpv7', 't', 't', '30.jpg', '37bc3dfd5cf64e1cbfdeb0ac662f448c.jpg', '/uploads/img/gallery/3/OCGBt2jwr_YkGVGsrzPpv7/', 1),
(40, 0, 'QFI3tq8WrV-mESXV2_F8Vj', '', '', '21.jpg', '6bd6e2daacf88c1533106d80c06cc229.jpg', '/uploads/img/gallery/3/QFI3tq8WrV-mESXV2_F8Vj/', 1),
(41, 5, 'dq18bPY7dkykP9T4fFQ2aG', '', '', '21.jpg', '387559bacfbc70be9a463f2043d6d5f9.jpg', '/uploads/img/gallery/3/dq18bPY7dkykP9T4fFQ2aG/', 2),
(43, 5, 'dq18bPY7dkykP9T4fFQ2aG', '', '', '23.jpg', '5bb7cd0057e4f3eddaa7ae67b459997d.jpg', '/uploads/img/gallery/3/dq18bPY7dkykP9T4fFQ2aG/', 1),
(44, 5, 'dq18bPY7dkykP9T4fFQ2aG', '', '', '17.jpg', 'd9ec3c1b0b904a592cbf6cf6a4e6c111.jpg', '/uploads/img/gallery/3/dq18bPY7dkykP9T4fFQ2aG/', 3),
(45, 9, 'vmj3cQeCkJNnYelxpqhfzE', 'GG', 'WW', '23.jpg', 'bc31b143dd47838b9168cf5699ff5678.jpg', '/uploads/img/gallery/16/vmj3cQeCkJNnYelxpqhfzE/', 1),
(46, 9, 'vmj3cQeCkJNnYelxpqhfzE', 'QQ', 'EE', '17.jpg', 'f620f2df061ff9dc876f91f9d719ad08.jpg', '/uploads/img/gallery/16/vmj3cQeCkJNnYelxpqhfzE/', 2),
(47, 9, 'vmj3cQeCkJNnYelxpqhfzE', 'dd', 'hh', '07.jpg', '9aae3887e26fb4715d89f6f143a5edda.jpg', '/uploads/img/gallery/16/vmj3cQeCkJNnYelxpqhfzE/', 3),
(48, 9, 'vmj3cQeCkJNnYelxpqhfzE', 'ZZ', 'xx', '06.jpg', 'fdbbb0d20c52694d6894755f0320f7e9.jpg', '/uploads/img/gallery/16/vmj3cQeCkJNnYelxpqhfzE/', 4);

-- --------------------------------------------------------

--
-- Table structure for table `db_game_system`
--

CREATE TABLE IF NOT EXISTS `db_game_system` (
  `id_gs` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(128) NOT NULL,
  `detail` varchar(256) NOT NULL,
  `value` varchar(64) NOT NULL,
  PRIMARY KEY (`id_gs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `db_league`
--

CREATE TABLE IF NOT EXISTS `db_league` (
  `id_league` int(11) NOT NULL AUTO_INCREMENT,
  `league_name_en` varchar(255) COLLATE utf8_bin NOT NULL,
  `league_name_th` varchar(255) COLLATE utf8_bin NOT NULL,
  `api_get_match` smallint(5) NOT NULL,
  `api_get_scores` smallint(5) NOT NULL DEFAULT '0',
  `link_get_odds` text COLLATE utf8_bin NOT NULL,
  `link_get_scores` text COLLATE utf8_bin NOT NULL,
  `link_get_topscore` text COLLATE utf8_bin NOT NULL,
  `link_get_fixt` text COLLATE utf8_bin NOT NULL,
  `link_get_result` text COLLATE utf8_bin NOT NULL,
  `link_get_result_sub` text COLLATE utf8_bin NOT NULL,
  `league_img` varchar(255) COLLATE utf8_bin NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_league`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

--
-- Dumping data for table `db_league`
--

INSERT INTO `db_league` (`id_league`, `league_name_en`, `league_name_th`, `api_get_match`, `api_get_scores`, `link_get_odds`, `link_get_scores`, `link_get_topscore`, `link_get_fixt`, `link_get_result`, `link_get_result_sub`, `league_img`, `active`) VALUES
(1, 'English Premier League', 'พรีเมียร์ลีก', 9, 4, 'https://www.asianbookie.com/index.cfm?league=55', 'http://www.espnfc.com/barclays-premier-league/23/table', 'http://www.espnfc.com/barclays-premier-league/23/statistics/scorers', 'http://www.bbc.co.uk/sport/football/fixtures/partial/competition-118996114?structureid=5', '1', 'http://www.espnfc.us/barclays-premier-league/23/scores', 'premier.png', 1),
(2, 'La Liga Spain', 'ลาลีก้า', 1, 4, 'http://www.odds88.com/index.php?league=31', 'http://www.espnfc.com/spanish-primera-division/15/table', 'http://www.espnfc.com/spanish-primera-divisi%C3%B3n/15/statistics/scorers', 'http://www.bbc.co.uk/sport/football/fixtures/partial/competition-119001074?structureid=6', '1', 'http://www.espnfc.us/spanish-primera-division/15/scores', 'laliga.png', 1),
(3, 'Bundesliga', 'บุนเดสลีกา', 1, 4, 'http://www.odds88.com/index.php?league=6', 'http://www.espnfc.com/german-bundesliga/10/table', 'http://www.espnfc.com/german-bundesliga/10/statistics/scorers', 'http://www.bbc.co.uk/sport/football/fixtures/partial/competition-119000986?structureid=6', '1', 'http://www.espnfc.us/german-bundesliga/10/scores', 'bundesliga.png', 1),
(4, 'Calcio Serie A', 'กัลโช่ เซเรีย เอ', 1, 4, 'http://www.odds88.com/index.php?league=65', 'http://www.espnfc.com/italian-serie-a/12/table', 'http://www.espnfc.com/italian-serie-a/12/statistics/scorers', 'http://www.bbc.co.uk/sport/football/fixtures/partial/competition-119001017?structureid=6', 'http://www.bbc.co.uk/sport/football/results/partial/competition-119001017?structureid=6', 'http://www.espnfc.us/italian-serie-a/12/scores', 'calcio.png', 1),
(5, 'France Ligue 1', 'ลีคเอิง', 1, 4, 'http://www.odds88.com/index.php?league=23', 'http://www.espnfc.com/french-ligue-1/9/table', 'http://www.espnfc.com/french-ligue-1/9/statistics/scorers', 'http://www.bbc.co.uk/sport/football/fixtures/partial/competition-119000981?structureid=6', 'http://www.bbc.co.uk/sport/football/results/partial/competition-119000981?structureid=6', 'http://www.espnfc.us/french-ligue-1/9/scores', 'france.png', 0),
(6, 'Thai Premier League', 'ไทยพรีเมียร์ลีก', 2, 2, 'http://www.odds88.com/index.php?league=72', 'http://thaipremierleague.co.th/2015/tpl2015_Table.php', 'http://thaipremierleague.co.th/2015/tplscorers.php', 'http://thaipremierleague.co.th/tpl2014Table.php', 'http://thaipremierleague.co.th/tpl2014Table.php', 'http://www.espnfc.us/thai-premier-league/2341/scores', 'thaipremier.png', 0),
(7, 'UEFA Champions League', 'ยูฟ่า แชมเปี้ยนส์ลีก', 1, 1, 'http://www.odds88.com/index.php?league=186', 'http://www.bbc.co.uk/sport/football/tables/partial/118999958?structureid=6', 'none', 'http://www.bbc.co.uk/sport/football/fixtures/partial/competition-118999958?structureid=6', 'http://www.bbc.co.uk/sport/football/results/partial/competition-118999958?structureid=6', 'http://www.espnfc.us/uefa-champions-league/2/scores', 'championsleague.png', 0),
(8, 'UEFA Europa League', 'ยูโรปา ลีก', 1, 1, 'http://www.odds88.com/index.php?league=222', 'http://www.bbc.co.uk/sport/football/tables/partial/118999989?structureid=6&dateTimeNow=20130912', 'none', 'http://www.bbc.co.uk/sport/football/fixtures/partial/competition-118999989?structureid=6', 'http://www.bbc.co.uk/sport/football/results/partial/competition-118999989?structureid=6', 'http://www.espnfc.us/uefa-europa-league/2310/scores', 'europaleague.png', 0),
(9, 'FIFA World Cup', 'ฟุตบอลโลก', 1, 3, '', 'http://www.fifa.com/worldcup/groups/index.html', 'http://www.espnfc.com/fifa-world-cup/4/statistics/scorers', 'http://www.bbc.com/sport/football/fixtures/partial/competition-119001880?structureid=6', 'http://www.bbc.com/sport/football/results/partial/competition-119001880?structureid=6\r\n', 'http://www.espnfc.us/fifa-world-cup/4/scores', 'fifa.png', 0),
(10, 'UEFA Euro', 'ฟุตบอลยูโร', 1, 5, 'http://www.odds88.com/index.php?league=1044', 'http://www1.skysports.com/football/competitions/european-qualifiers/table', 'none', 'http://www.bbc.com/sport/football/fixtures/partial/competition-119002036?structureid=6', 'http://www.bbc.com/sport/football/results/partial/competition-119002036?structureid=6', 'http://www.espnfc.us/european-championship/74/scores', 'euro.png', 0),
(11, 'English Championship', 'แชมเปียนชิป อังกฤษ', 0, 0, 'http://www.odds88.com/index.php?league=286', 'none', 'none', 'none', 'none', 'http://www.espnfc.us/english-league-championship/24/scores', '-', 0),
(12, 'English FA Cup', 'เอฟเอ คัพ', 0, 0, 'http://www.odds88.com/index.php?league=385', '', '', '', '', 'http://www.espnfc.us/english-fa-cup/40/scores', '-', 0),
(13, 'World Cup 2018', 'World Cup 2018', 9, 1, 'https://www.asianbookie.com/index.cfm?league=4&tz=7', '', '', '', '2', 'http://www.fifa.com/worldcup/preliminaries/matches/index.html', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_league_scores`
--

CREATE TABLE IF NOT EXISTS `db_league_scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `league_id` tinyint(2) NOT NULL,
  `no` smallint(5) NOT NULL,
  `team_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `play` smallint(5) NOT NULL DEFAULT '0',
  `h_win` smallint(5) NOT NULL DEFAULT '0',
  `h_draw` smallint(5) NOT NULL DEFAULT '0',
  `h_lost` smallint(5) NOT NULL DEFAULT '0',
  `h_gfor` smallint(5) NOT NULL DEFAULT '0',
  `h_against` smallint(5) NOT NULL DEFAULT '0',
  `a_win` smallint(5) NOT NULL DEFAULT '0',
  `a_draw` smallint(5) NOT NULL DEFAULT '0',
  `a_lost` smallint(5) NOT NULL DEFAULT '0',
  `a_gfor` smallint(5) NOT NULL DEFAULT '0',
  `a_against` smallint(5) NOT NULL DEFAULT '0',
  `goal_dif` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `point` smallint(5) NOT NULL DEFAULT '0',
  `form` varchar(255) COLLATE utf8_bin DEFAULT '-',
  `type` tinyint(2) NOT NULL DEFAULT '1',
  `group_cup` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'Z',
  `season` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=79 ;

--
-- Dumping data for table `db_league_scores`
--

INSERT INTO `db_league_scores` (`id`, `league_id`, `no`, `team_name`, `play`, `h_win`, `h_draw`, `h_lost`, `h_gfor`, `h_against`, `a_win`, `a_draw`, `a_lost`, `a_gfor`, `a_against`, `goal_dif`, `point`, `form`, `type`, `group_cup`, `season`) VALUES
(1, 1, 1, 'Manchester United', 3, 2, 0, 0, 6, 0, 1, 0, 0, 4, 0, '10', 9, '-', 1, 'Z', '2015-2016'),
(2, 1, 2, 'Liverpool', 3, 2, 0, 0, 5, 0, 0, 1, 0, 3, 3, '5', 7, '-', 1, 'Z', '2015-2016'),
(3, 1, 3, 'Huddersfield Town', 3, 1, 1, 0, 1, 0, 1, 0, 0, 3, 0, '4', 7, '-', 1, 'Z', '2015-2016'),
(4, 1, 4, 'Manchester City', 3, 0, 1, 0, 1, 1, 2, 0, 0, 4, 1, '3', 7, '-', 1, 'Z', '2015-2016'),
(5, 1, 5, 'West Bromwich Albion', 3, 1, 1, 0, 2, 1, 1, 0, 0, 1, 0, '2', 7, '-', 1, 'Z', '2015-2016'),
(6, 1, 6, 'Chelsea', 3, 1, 0, 1, 4, 3, 1, 0, 0, 2, 1, '2', 6, '-', 1, 'Z', '2015-2016'),
(7, 1, 7, 'Watford', 3, 0, 2, 0, 3, 3, 1, 0, 0, 2, 0, '2', 5, '-', 1, 'Z', '2015-2016'),
(8, 1, 8, 'Southampton', 3, 1, 1, 0, 3, 2, 0, 1, 0, 0, 0, '1', 5, '-', 1, 'Z', '2015-2016'),
(9, 1, 9, 'Tottenham Hotspur', 3, 0, 1, 1, 2, 3, 1, 0, 0, 2, 0, '1', 4, '-', 1, 'Z', '2015-2016'),
(10, 1, 10, 'Burnley', 3, 0, 0, 1, 0, 1, 1, 1, 0, 4, 3, '0', 4, '-', 1, 'Z', '2015-2016'),
(11, 1, 11, 'Stoke City', 3, 1, 0, 0, 1, 0, 0, 1, 1, 1, 2, '0', 4, '-', 1, 'Z', '2015-2016'),
(12, 1, 12, 'Everton', 3, 1, 0, 0, 1, 0, 0, 1, 1, 1, 3, '-1', 4, '-', 1, 'Z', '2015-2016'),
(13, 1, 13, 'Swansea City', 3, 0, 0, 1, 0, 4, 1, 1, 0, 2, 0, '-2', 4, '-', 1, 'Z', '2015-2016'),
(14, 1, 14, 'Newcastle United', 3, 1, 0, 1, 3, 2, 0, 0, 1, 0, 1, '0', 3, '-', 1, 'Z', '2015-2016'),
(15, 1, 15, 'Leicester City', 3, 1, 0, 0, 2, 0, 0, 0, 2, 3, 6, '-1', 3, '-', 1, 'Z', '2015-2016'),
(16, 1, 16, 'Arsenal', 3, 1, 0, 0, 4, 3, 0, 0, 2, 0, 5, '-4', 3, '-', 1, 'Z', '2015-2016'),
(17, 1, 17, 'Brighton & Hove Albion', 3, 0, 0, 1, 0, 2, 0, 1, 1, 0, 2, '-4', 1, '-', 1, 'Z', '2015-2016'),
(18, 1, 18, 'AFC Bournemouth', 3, 0, 0, 2, 1, 4, 0, 0, 1, 0, 1, '-4', 0, '-', 1, 'Z', '2015-2016'),
(19, 1, 19, 'Crystal Palace', 3, 0, 0, 2, 0, 5, 0, 0, 1, 0, 1, '-6', 0, '-', 1, 'Z', '2015-2016'),
(20, 1, 20, 'West Ham United', 3, 0, 0, 0, 0, 0, 0, 0, 3, 2, 10, '-8', 0, '-', 1, 'Z', '2015-2016'),
(21, 2, 1, 'Barcelona', 30, 14, 1, 0, 54, 10, 10, 3, 2, 32, 14, '62', 76, '-', 1, 'Z', '2015-2016'),
(22, 2, 2, 'Atletico Madrid', 30, 10, 3, 1, 21, 6, 11, 1, 4, 25, 8, '32', 67, '-', 1, 'Z', '2015-2016'),
(23, 2, 3, 'Real Madrid', 30, 13, 1, 2, 60, 14, 7, 5, 2, 27, 14, '59', 66, '-', 1, 'Z', '2015-2016'),
(24, 2, 4, 'Villarreal', 30, 11, 3, 2, 24, 10, 4, 6, 4, 13, 15, '12', 54, '-', 1, 'Z', '2015-2016'),
(25, 2, 5, 'Celta Vigo', 30, 7, 4, 4, 24, 22, 7, 2, 6, 19, 29, '-8', 48, '-', 1, 'Z', '2015-2016'),
(26, 2, 6, 'Sevilla FC', 30, 13, 0, 2, 33, 14, 0, 9, 6, 10, 21, '8', 48, '-', 1, 'Z', '2015-2016'),
(27, 2, 7, 'Athletic Bilbao', 30, 8, 3, 3, 28, 13, 6, 2, 8, 20, 26, '9', 47, '-', 1, 'Z', '2015-2016'),
(28, 2, 8, 'Málaga', 30, 6, 4, 4, 17, 10, 4, 5, 7, 12, 18, '1', 39, '-', 1, 'Z', '2015-2016'),
(29, 2, 9, 'Eibar', 30, 7, 3, 5, 21, 17, 3, 5, 7, 21, 25, '0', 38, '-', 1, 'Z', '2015-2016'),
(30, 2, 10, 'Deportivo La Coruña', 30, 4, 8, 3, 24, 19, 3, 7, 5, 15, 24, '-4', 36, '-', 1, 'Z', '2015-2016'),
(31, 2, 11, 'Real Sociedad', 30, 5, 5, 5, 18, 16, 4, 3, 8, 19, 25, '-4', 35, '-', 1, 'Z', '2015-2016'),
(32, 2, 12, 'Espanyol', 30, 7, 4, 4, 15, 22, 3, 1, 11, 16, 34, '-25', 35, '-', 1, 'Z', '2015-2016'),
(33, 2, 13, 'Real Betis', 30, 3, 6, 6, 13, 20, 5, 4, 6, 14, 20, '-13', 34, '-', 1, 'Z', '2015-2016'),
(34, 2, 14, 'Valencia', 30, 4, 7, 4, 19, 19, 4, 3, 8, 14, 17, '-3', 34, '-', 1, 'Z', '2015-2016'),
(35, 2, 15, 'Las Palmas', 30, 6, 3, 6, 18, 15, 3, 3, 9, 14, 27, '-10', 33, '-', 1, 'Z', '2015-2016'),
(36, 2, 16, 'Rayo Vallecano', 30, 5, 4, 6, 20, 24, 1, 6, 8, 21, 39, '-22', 28, '-', 1, 'Z', '2015-2016'),
(37, 2, 17, 'Granada', 30, 4, 4, 7, 18, 25, 3, 3, 9, 14, 31, '-24', 28, '-', 1, 'Z', '2015-2016'),
(38, 2, 18, 'Getafe', 30, 6, 5, 5, 19, 12, 1, 2, 11, 9, 40, '-24', 28, '-', 1, 'Z', '2015-2016'),
(39, 2, 19, 'Sporting Gijón', 30, 4, 4, 7, 22, 26, 3, 2, 10, 10, 26, '-20', 27, '-', 1, 'Z', '2015-2016'),
(40, 2, 20, 'Levante', 30, 5, 3, 7, 17, 22, 1, 3, 11, 11, 32, '-26', 24, '-', 1, 'Z', '2015-2016'),
(41, 3, 1, 'Bayern Munich', 27, 12, 0, 1, 43, 6, 10, 3, 1, 22, 7, '52', 69, '-', 1, 'Z', '2015-2016'),
(42, 3, 2, 'Borussia Dortmund', 27, 11, 2, 0, 36, 9, 9, 2, 3, 28, 17, '38', 64, '-', 1, 'Z', '2015-2016'),
(43, 3, 3, 'Hertha Berlin', 27, 9, 4, 1, 21, 9, 5, 2, 6, 16, 18, '10', 48, '-', 1, 'Z', '2015-2016'),
(44, 3, 4, 'Schalke 04', 27, 8, 3, 3, 23, 18, 5, 2, 6, 16, 17, '4', 44, '-', 1, 'Z', '2015-2016'),
(45, 3, 5, 'Borussia Monchengladbach', 27, 10, 1, 3, 32, 16, 3, 2, 8, 22, 28, '10', 42, '-', 1, 'Z', '2015-2016'),
(46, 3, 6, 'Bayer Leverkusen', 27, 6, 3, 4, 20, 14, 6, 3, 5, 19, 19, '6', 42, '-', 1, 'Z', '2015-2016'),
(47, 3, 7, 'Mainz', 27, 7, 2, 4, 17, 13, 5, 3, 6, 18, 20, '2', 41, '-', 1, 'Z', '2015-2016'),
(48, 3, 8, 'VfL Wolfsburg', 27, 8, 4, 2, 28, 13, 2, 4, 7, 11, 21, '5', 38, '-', 1, 'Z', '2015-2016'),
(49, 3, 9, 'FC Cologne', 27, 4, 4, 6, 12, 15, 4, 5, 4, 16, 19, '-6', 33, '-', 1, 'Z', '2015-2016'),
(50, 3, 10, 'FC Ingolstadt 04', 27, 5, 4, 4, 15, 14, 3, 5, 6, 8, 17, '-8', 33, '-', 1, 'Z', '2015-2016'),
(51, 3, 11, 'VfB Stuttgart', 27, 6, 1, 7, 20, 23, 3, 4, 6, 23, 31, '-11', 32, '-', 1, 'Z', '2015-2016'),
(52, 3, 12, 'Hamburg SV', 27, 4, 4, 6, 17, 19, 4, 3, 6, 14, 19, '-7', 31, '-', 1, 'Z', '2015-2016'),
(53, 3, 13, 'SV Darmstadt 98', 27, 1, 5, 7, 10, 23, 5, 5, 4, 18, 18, '-13', 28, '-', 1, 'Z', '2015-2016'),
(54, 3, 14, 'Werder Bremen', 27, 2, 5, 6, 16, 24, 5, 2, 7, 20, 30, '-18', 28, '-', 1, 'Z', '2015-2016'),
(55, 3, 15, 'FC Augsburg', 27, 2, 5, 7, 16, 24, 4, 4, 5, 17, 19, '-10', 27, '-', 1, 'Z', '2015-2016'),
(56, 3, 16, 'TSG Hoffenheim', 27, 4, 5, 4, 16, 18, 2, 4, 8, 14, 25, '-13', 27, '-', 1, 'Z', '2015-2016'),
(57, 3, 17, 'Eintracht Frankfurt', 27, 4, 6, 4, 19, 21, 2, 3, 8, 10, 22, '-14', 27, '-', 1, 'Z', '2015-2016'),
(58, 3, 18, 'Hannover 96', 27, 2, 0, 11, 11, 24, 3, 2, 9, 11, 25, '-27', 17, '-', 1, 'Z', '2015-2016'),
(59, 4, 1, 'Juventus', 30, 11, 2, 1, 22, 6, 11, 2, 3, 33, 10, '39', 70, '-', 1, 'Z', '2015-2016'),
(60, 4, 2, 'Napoli', 30, 12, 3, 0, 34, 11, 8, 4, 3, 28, 13, '38', 67, '-', 1, 'Z', '2015-2016'),
(61, 4, 3, 'AS Roma', 30, 10, 4, 1, 36, 14, 7, 5, 3, 26, 17, '31', 60, '-', 1, 'Z', '2015-2016'),
(62, 4, 4, 'Fiorentina', 30, 10, 3, 2, 29, 12, 6, 4, 5, 21, 20, '18', 55, '-', 1, 'Z', '2015-2016'),
(63, 4, 5, 'Internazionale', 30, 10, 2, 3, 21, 11, 6, 5, 4, 19, 17, '12', 55, '-', 1, 'Z', '2015-2016'),
(64, 4, 6, 'AC Milan', 30, 9, 4, 2, 23, 14, 4, 6, 5, 17, 17, '9', 49, '-', 1, 'Z', '2015-2016'),
(65, 4, 7, 'Sassuolo', 30, 6, 7, 2, 21, 18, 5, 5, 5, 16, 15, '4', 45, '-', 1, 'Z', '2015-2016'),
(66, 4, 8, 'Lazio', 30, 8, 3, 4, 25, 15, 3, 6, 6, 13, 23, '0', 42, '-', 1, 'Z', '2015-2016'),
(67, 4, 9, 'Chievo Verona', 30, 4, 6, 4, 16, 16, 6, 2, 8, 18, 23, '-5', 38, '-', 1, 'Z', '2015-2016'),
(68, 4, 10, 'Bologna', 30, 4, 5, 6, 18, 18, 6, 1, 8, 12, 17, '-5', 36, '-', 1, 'Z', '2015-2016'),
(69, 4, 11, 'Empoli', 30, 4, 5, 6, 17, 19, 5, 4, 6, 17, 23, '-8', 36, '-', 1, 'Z', '2015-2016'),
(70, 4, 12, 'Genoa', 30, 8, 3, 4, 21, 14, 1, 4, 10, 11, 23, '-5', 34, '-', 1, 'Z', '2015-2016'),
(71, 4, 13, 'Torino', 30, 5, 6, 5, 21, 19, 3, 3, 8, 16, 23, '-5', 33, '-', 1, 'Z', '2015-2016'),
(72, 4, 14, 'Atalanta', 30, 6, 4, 5, 20, 16, 2, 5, 8, 8, 19, '-7', 33, '-', 1, 'Z', '2015-2016'),
(73, 4, 15, 'Sampdoria', 30, 6, 4, 5, 25, 20, 2, 4, 9, 18, 28, '-5', 32, '-', 1, 'Z', '2015-2016'),
(74, 4, 16, 'Udinese', 30, 4, 3, 7, 11, 19, 4, 4, 8, 15, 26, '-19', 31, '-', 1, 'Z', '2015-2016'),
(75, 4, 17, 'Carpi', 30, 4, 5, 6, 16, 19, 2, 5, 8, 12, 27, '-18', 28, '-', 1, 'Z', '2015-2016'),
(76, 4, 18, 'Palermo', 30, 4, 3, 8, 17, 23, 3, 4, 8, 11, 28, '-23', 28, '-', 1, 'Z', '2015-2016'),
(77, 4, 19, 'Frosinone', 30, 6, 4, 6, 18, 22, 1, 2, 11, 11, 33, '-26', 27, '-', 1, 'Z', '2015-2016'),
(78, 4, 20, 'Hellas Verona', 30, 2, 6, 8, 16, 26, 0, 7, 7, 10, 25, '-25', 19, '-', 1, 'Z', '2015-2016');

-- --------------------------------------------------------

--
-- Table structure for table `db_league_top_score`
--

CREATE TABLE IF NOT EXISTS `db_league_top_score` (
  `id_top_score` int(11) NOT NULL AUTO_INCREMENT,
  `id_league` int(11) NOT NULL,
  `rank` int(11) DEFAULT NULL,
  `player` varchar(255) NOT NULL,
  `team` varchar(255) NOT NULL,
  `goal` int(11) NOT NULL,
  `season` varchar(50) NOT NULL,
  PRIMARY KEY (`id_top_score`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `db_league_top_score`
--

INSERT INTO `db_league_top_score` (`id_top_score`, `id_league`, `rank`, `player`, `team`, `goal`, `season`) VALUES
(1, 1, 1, 'Romelu Lukaku', 'Manchester United', 3, '2015-2016'),
(2, 1, 2, 'Sadio Mané', 'Liverpool', 3, '2015-2016'),
(3, 1, 3, 'Raheem Sterling', 'Manchester City', 2, '2015-2016'),
(4, 1, 4, 'Javier Hernández', 'West Ham United', 2, '2015-2016'),
(5, 1, 5, 'Shinji Okazaki', 'Leicester City', 2, '2015-2016'),
(6, 1, 6, 'Mohamed Salah', 'Liverpool', 2, '2015-2016'),
(7, 1, 7, 'Roberto Firmino', 'Liverpool', 2, '2015-2016'),
(8, 1, 8, 'Sam Vokes', 'Burnley', 2, '2015-2016'),
(9, 1, 9, 'Marcos Alonso', 'Chelsea', 2, '2015-2016'),
(10, 1, 10, 'Anthony Martial', 'Manchester United', 2, '2015-2016'),
(11, 1, 11, 'Jamie Vardy', 'Leicester City', 2, '2015-2016'),
(12, 1, 12, 'Steve Mounie', 'Huddersfield Town', 2, '2015-2016'),
(13, 1, 13, 'Álvaro Morata', 'Chelsea', 2, '2015-2016'),
(14, 1, 14, 'Dele Alli', 'Tottenham Hotspur', 2, '2015-2016'),
(15, 1, 15, 'Paul Pogba', 'Manchester United', 2, '2015-2016'),
(16, 1, 16, 'Wayne Rooney', 'Everton', 2, '2015-2016'),
(17, 1, 17, 'Stephen Ward', 'Burnley', 1, '2015-2016'),
(18, 1, 18, 'Tammy Abraham', 'Swansea City', 1, '2015-2016'),
(19, 1, 19, 'Marouane Fellaini', 'Manchester United', 1, '2015-2016'),
(20, 1, 20, 'Peter Crouch', 'Stoke City', 1, '2015-2016'),
(21, 1, 21, 'Dusan Tadic', 'Southampton', 1, '2015-2016'),
(22, 1, 22, 'Olivier Giroud', 'Arsenal', 1, '2015-2016'),
(23, 1, 23, 'Hal Robson-Kanu', 'West Bromwich Albion', 1, '2015-2016'),
(24, 1, 24, 'Charlie Daniels', 'AFC Bournemouth', 1, '2015-2016'),
(25, 1, 25, 'Chris Wood', 'Burnley', 1, '2015-2016'),
(26, 1, 26, 'Sergio Agüero', 'Manchester City', 1, '2015-2016'),
(27, 1, 27, 'Eric Bailly', 'Manchester United', 1, '2015-2016'),
(28, 1, 28, 'Ben Davies', 'Tottenham Hotspur', 1, '2015-2016'),
(29, 1, 29, 'Aaron Mooy', 'Huddersfield Town', 1, '2015-2016'),
(30, 1, 30, 'Marcus Rashford', 'Manchester United', 1, '2015-2016'),
(31, 1, 31, 'Manolo Gabbiadini', 'Southampton', 1, '2015-2016'),
(32, 1, 32, 'Ahmed Hegazi', 'West Bromwich Albion', 1, '2015-2016'),
(33, 1, 33, 'Jay Rodriguez', 'West Bromwich Albion', 1, '2015-2016'),
(34, 1, 34, 'Étienne Capoue', 'Watford', 1, '2015-2016'),
(35, 1, 35, 'Jesé', 'Stoke City', 1, '2015-2016'),
(36, 1, 36, 'Danny Welbeck', 'Arsenal', 1, '2015-2016'),
(37, 1, 37, 'Miguel Britos', 'Watford', 1, '2015-2016'),
(38, 1, 38, 'Aaron Ramsey', 'Arsenal', 1, '2015-2016'),
(39, 1, 39, 'Ciaran Clark', 'Newcastle United', 1, '2015-2016'),
(40, 1, 40, 'Alexandre Lacazette', 'Arsenal', 1, '2015-2016'),
(41, 1, 41, 'Aleksandar Mitrovic', 'Newcastle United', 1, '2015-2016'),
(42, 1, 42, 'Richarlison', 'Watford', 1, '2015-2016'),
(43, 1, 43, 'Stefano Okaka', 'Watford', 1, '2015-2016'),
(44, 1, 44, 'Harry Maguire', 'Leicester City', 1, '2015-2016'),
(45, 1, 45, 'David Luiz', 'Chelsea', 1, '2015-2016'),
(46, 1, 46, 'Gabriel Jesus', 'Manchester City', 1, '2015-2016'),
(47, 1, 47, 'Charlie Austin', 'Southampton', 1, '2015-2016'),
(48, 1, 48, 'Daniel Sturridge', 'Liverpool', 1, '2015-2016'),
(49, 1, 49, 'Jordan Ayew', 'Swansea City', 1, '2015-2016'),
(50, 1, 50, 'Cesc Fàbregas', 'Chelsea', 1, '2015-2016');

-- --------------------------------------------------------

--
-- Table structure for table `db_like_data`
--

CREATE TABLE IF NOT EXISTS `db_like_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_like_cat` int(11) NOT NULL,
  `like_value` tinyint(4) NOT NULL,
  `main_category` varchar(128) NOT NULL,
  `sub_category` varchar(128) DEFAULT NULL,
  `create_date` date NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `db_like_data`
--

INSERT INTO `db_like_data` (`id`, `id_user`, `id_like_cat`, `like_value`, `main_category`, `sub_category`, `create_date`, `active`) VALUES
(1, 3, 6, 1, 'memory', NULL, '0000-00-00', 0),
(2, 1, 6, 1, 'memory', NULL, '0000-00-00', 1),
(3, 1, 5, 1, 'memory', NULL, '0000-00-00', 1),
(4, 1, 9, 1, 'gallery', NULL, '0000-00-00', 1),
(5, 3, 5, 1, 'memory', NULL, '2016-11-24', 1),
(6, 16, 11, 1, 'gallery', NULL, '2016-12-09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_loan_zeny`
--

CREATE TABLE IF NOT EXISTS `db_loan_zeny` (
  `id_loan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_loan_on` int(11) NOT NULL,
  `zeny` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_loan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `db_log_data`
--

CREATE TABLE IF NOT EXISTS `db_log_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) NOT NULL,
  `type` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `detail` varchar(128) NOT NULL,
  `create_date` date NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `db_log_data`
--

INSERT INTO `db_log_data` (`id`, `id_admin`, `type`, `name`, `detail`, `create_date`, `active`) VALUES
(1, 3, 'update-point', 'update-point', 'update-point-2016-12-06', '2016-11-06', 1),
(5, 3, 'update-point', 'update-point', 'update-point-2016-12-09', '2016-12-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_log_exp`
--

CREATE TABLE IF NOT EXISTS `db_log_exp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_cat` int(11) NOT NULL,
  `category` varchar(64) NOT NULL,
  `detail` varchar(512) NOT NULL,
  `exp` int(11) NOT NULL,
  `create_time` date NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `db_log_exp`
--

INSERT INTO `db_log_exp` (`id`, `id_user`, `id_admin`, `id_cat`, `category`, `detail`, `exp`, `create_time`, `active`) VALUES
(1, 3, 3, 7, 'memory', 'xxxx', 50, '2016-11-24', 1),
(2, 1, 3, 3, 'gallery', 'xxxx', 50, '2016-11-24', 1),
(3, 3, 3, 1, 'feeling', 'feelling to user', 20, '2016-12-01', 1),
(4, 3, 3, 1, 'feeling', 'feelling to user', 20, '2016-12-01', 1),
(5, 1, 3, 4, 'feeling', 'feelling to user', 20, '2016-12-01', 1),
(6, 3, 3, 3, 'feeling', 'feelling to user', -20, '2016-12-01', -1),
(7, 3, 3, 2, 'feeling', 'feelling to user', 20, '2016-12-01', 1),
(8, 3, 3, 2, 'feeling', 'feelling to user', 20, '2016-12-01', 1),
(9, 1, 3, 4, 'feeling', 'feelling to user', 20, '2016-12-01', 1),
(10, 1, 3, 2, 'like', 'like to user', 5, '2016-12-01', 1),
(11, 1, 3, 3, 'like', 'like to user', -5, '2016-12-01', -1),
(12, 3, 3, 4, 'like', 'like to user', 5, '2016-12-01', -1),
(13, 3, 3, 5, 'like', 'like to user', 5, '2016-12-01', -1),
(14, 3, NULL, 26, 'comment', 'gallery-comment', 5, '2016-12-02', 0),
(15, 3, NULL, 27, 'comment', 'memory-comment', 5, '2016-12-02', 0),
(16, 16, NULL, 28, 'comment', 'memory-comment', 5, '2016-12-06', 0),
(17, 3, NULL, 29, 'comment', 'memory-comment', 5, '2016-12-09', 0),
(18, 16, NULL, 30, 'comment', 'memory-comment', 5, '2016-12-12', 0),
(19, 3, 3, 4, 'report', 'report user', 10, '2016-12-12', 0),
(20, 3, 3, 2, 'report', 'report user', -10, '2016-12-12', 0),
(21, 3, NULL, 14, 'gallery', 'create gallery', 50, '2016-12-13', 0),
(22, 3, NULL, 8, 'memory', 'create memory', 50, '2016-12-13', 0),
(23, 3, NULL, 15, 'gallery', 'create gallery', 50, '2016-12-14', 0),
(24, 16, NULL, 31, 'comment', 'gallery-comment', 5, '2016-12-14', 0),
(25, 16, NULL, 32, 'comment', 'gallery-comment', 5, '2016-12-14', 0),
(26, 3, NULL, 1, 'gallery', 'create gallery', 50, '2016-12-22', 0),
(27, 3, NULL, 2, 'gallery', 'create gallery', 50, '2016-12-22', 0),
(28, 3, NULL, 3, 'gallery', 'create gallery', 50, '2016-12-22', 0),
(29, 3, NULL, 4, 'gallery', 'create gallery', 50, '2016-12-22', 0),
(30, 3, NULL, 5, 'gallery', 'create gallery', 50, '2017-01-11', 0),
(31, 3, NULL, 6, 'gallery', 'create gallery', 50, '2017-01-11', 0),
(32, 3, NULL, 7, 'gallery', 'create gallery', 50, '2017-01-11', 0),
(33, 3, NULL, 8, 'gallery', 'create gallery', 50, '2017-01-11', 0),
(34, 16, NULL, 9, 'gallery', 'create gallery', 50, '2017-01-13', 0),
(35, 3, NULL, 33, 'comment', 'gallery-comment', 5, '2017-01-19', 0),
(36, 3, NULL, 9, 'memory', 'create memory', 50, '2017-01-20', 0),
(37, 3, NULL, 34, 'comment', 'memory-comment', 5, '2017-01-20', 0),
(38, 3, NULL, 35, 'comment', 'memory-comment', 5, '2017-01-20', 0),
(39, 16, NULL, 36, 'comment', 'gallery-comment', 5, '2017-01-25', 0),
(40, 48, NULL, 39, 'comment', 'memory-comment', 5, '2017-01-26', 0),
(41, 48, NULL, 40, 'comment', 'memory-comment', 5, '2017-01-26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_log_game`
--

CREATE TABLE IF NOT EXISTS `db_log_game` (
  `id_game_log` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `game_type` int(11) NOT NULL,
  `play_count` int(11) NOT NULL,
  `zeny` int(11) NOT NULL,
  `play_date` date NOT NULL,
  `play_ip` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_game_log`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `db_log_game`
--

INSERT INTO `db_log_game` (`id_game_log`, `id_user`, `game_type`, `play_count`, `zeny`, `play_date`, `play_ip`, `status`) VALUES
(1, 3, 1, 2, 0, '2016-02-29', '127.0.0.1', 1),
(2, 3, 1, 0, 0, '2016-03-01', '127.0.0.1', 1),
(3, 3, 1, 2, 0, '2016-03-02', '127.0.0.1', 1),
(6, 3, 1, 1, 999, '2016-03-03', '127.0.0.1', 1),
(7, 3, 1, 2, 50, '2016-03-03', '127.0.0.1', 1),
(13, 3, 1, 1, 500, '2016-03-05', '127.0.0.1', -1),
(14, 3, 1, 2, 50, '2016-03-05', '127.0.0.1', 1),
(15, 3, 1, 1, 500, '2016-03-12', '127.0.0.1', -1),
(16, 3, 1, 2, 500, '2016-03-12', '127.0.0.1', -1),
(17, 3, 1, 3, 1000, '2016-03-12', '127.0.0.1', -1),
(18, 3, 1, 1, 200, '2016-03-13', '127.0.0.1', -1),
(19, 3, 1, 2, 100, '2016-03-13', '127.0.0.1', 1),
(20, 1, 1, 1, 1, '2016-03-13', '127.0.0.1', 1),
(21, 3, 1, 3, 50, '2016-03-13', '127.0.0.1', 0),
(22, 17, 11, 11, 11, '2016-03-24', '127.0.0.1', 11),
(23, 3, 1, 1, 100, '2017-09-04', '127.0.0.1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_log_rank`
--

CREATE TABLE IF NOT EXISTS `db_log_rank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `rank_up` int(11) NOT NULL,
  `create_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `db_log_rank`
--

INSERT INTO `db_log_rank` (`id`, `id_user`, `id_admin`, `rank`, `rank_up`, `create_date`) VALUES
(1, 16, 3, 1, 2, '2016-11-25'),
(2, 16, 3, 2, 3, '2016-11-25'),
(3, 16, 3, 3, 4, '2016-11-25'),
(4, 17, 3, 1, 2, '2016-11-25'),
(5, 3, 3, 2, 3, '2016-11-25'),
(6, 3, 3, 3, 4, '2016-11-25'),
(7, 3, 3, 4, 5, '2016-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `db_log_zeny`
--

CREATE TABLE IF NOT EXISTS `db_log_zeny` (
  `id_log_zeny` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_log_game` int(11) NOT NULL,
  `text` text NOT NULL,
  `zeny` double NOT NULL,
  `update_time` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_log_zeny`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `db_log_zeny`
--

INSERT INTO `db_log_zeny` (`id_log_zeny`, `id_user`, `id_log_game`, `text`, `zeny`, `update_time`, `status`) VALUES
(1, 3, 0, 'ชนะพนันบอล', 1398.6, '2016-03-04 00:00:00', 1),
(2, 3, 0, 'เล่นพนันบอล', 500, '2016-03-05 00:00:00', -1),
(3, 3, 0, 'เล่นพนันบอล', 50, '2016-03-05 18:03:37', -1),
(4, 3, 0, 'ชนะพนันบอล', 4398, '2016-03-05 00:00:00', 1),
(5, 3, 0, 'เล่นพนันบอล', 500, '2016-03-12 18:14:00', -1),
(6, 3, 0, 'เล่นพนันบอล', 500, '2016-03-12 18:23:28', -1),
(7, 3, 0, 'เล่นพนันบอล', 1000, '2016-03-12 18:25:54', -1),
(8, 3, 0, 'เล่นพนันบอล', 200, '2016-03-13 13:21:12', -1),
(9, 3, 0, 'เล่นพนันบอล', 100, '2016-03-13 13:36:59', -1),
(10, 3, 0, 'ชนะพนันบอล', 771, '2016-03-13 00:00:00', 1),
(11, 3, 0, 'เล่นพนันบอล', 50, '2016-03-13 18:36:45', -1),
(12, 3, 0, 'เล่นพนันบอล', 100, '2017-09-04 14:26:18', -1);

-- --------------------------------------------------------

--
-- Table structure for table `db_main_data`
--

CREATE TABLE IF NOT EXISTS `db_main_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` varchar(512) NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `db_main_data`
--

INSERT INTO `db_main_data` (`id`, `type`, `name`, `title`, `content`, `active`) VALUES
(1, 'icon', 'icon', 'in-memo-icon', '/uploads/img/main/20170126-061238-icon-in-memories-favicon.png', 1),
(2, 'logo', 'logo', 'in-memory-logo', '/uploads/img/main/20170106-045124-logo-logo-in-memories.png', 1),
(3, 'allowuser', 'allowuser', 'Username, nickname ห้ามใช้', 'admin,superuser,root,webmaster,hostmaster,customer,postmaster,member,service,5555', 1),
(4, 'email', 'email', 'admin email', 'wonderkide.sos@gmail.com', 1),
(5, 'phone', '1', 'phone 1', '999', 1),
(6, 'phone', '2', 'phone 2', '999', 1),
(7, 'feeling-icon', 'feeling-icon', 'in-memo-feeling-icon', '/uploads/img/main/20161212-111330feeling-icon-like2.png', 1),
(8, 'feeling-icon-active', 'feeling-icon-active', 'in-memo-feeling-icon-active', '/uploads/img/main/20161212-111409feeling-icon-active-like2-active.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_main_menu`
--

CREATE TABLE IF NOT EXISTS `db_main_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(256) NOT NULL,
  `icon` varchar(64) NOT NULL,
  `url` varchar(256) NOT NULL,
  `type` varchar(64) NOT NULL,
  `onMobile` tinyint(4) NOT NULL,
  `sort` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `db_main_menu`
--

INSERT INTO `db_main_menu` (`id`, `label`, `icon`, `url`, `type`, `onMobile`, `sort`, `active`) VALUES
(1, 'Home', 'hidden', '/', 'all', 1, 1, 1),
(2, 'Sign In', 'fa fa-sign-in', 'site/login', 'guest', 1, 2, 0),
(3, 'Sign Up', 'glyphicon glyphicon-edit', 'site/signup', 'guest', 1, 3, 0),
(4, 'Gallery', 'hidden', 'gallery', 'all', 1, 4, 1),
(5, 'Board', 'glyphicon glyphicon-comment', 'board', 'user', 1, 6, 0),
(6, 'User', 'glyphicon glyphicon-user', '#', 'user', 1, 9, 1),
(7, 'Memory', 'hidden', 'memory', 'all', 1, 5, 1),
(8, 'Contact', 'hidden', 'site/contact', 'all', 1, 8, 1),
(9, 'Games', 'fa fa-gamepad', 'games', 'user', 1, 7, 0),
(10, 'Sign Up/Sign In', 'hidden', '#', 'guest', 1, 10, 1),
(11, 'Notify', 'glyphicon glyphicon-bell', '#', 'user', 1, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_match`
--

CREATE TABLE IF NOT EXISTS `db_match` (
  `id_match` int(11) NOT NULL AUTO_INCREMENT,
  `id_league` int(11) NOT NULL,
  `home` varchar(255) NOT NULL,
  `away` varchar(255) NOT NULL,
  `play_time` varchar(255) NOT NULL,
  `h_odds` float NOT NULL,
  `a_odds` float NOT NULL,
  `bet` varchar(128) NOT NULL,
  `bet_team` varchar(5) NOT NULL,
  `h_score` int(11) NOT NULL,
  `a_score` int(11) NOT NULL,
  `comment` text NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_match`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `db_match`
--

INSERT INTO `db_match` (`id_match`, `id_league`, `home`, `away`, `play_time`, `h_odds`, `a_odds`, `bet`, `bet_team`, `h_score`, `a_score`, `comment`, `active`) VALUES
(1, 1, 'Manchester United', 'Arsenal', '2016-02-28 22:00:00', 1.94, 2, '0.25', 'a', 0, 0, '-', -1),
(2, 1, 'Tottenham Hotspur', 'Swansea City', '2016-02-28 22:00:00', 1.9, 2.04, '1', 'h', 0, 0, '-', -1),
(3, 1, 'Norwich City', 'Chelsea', '2016-02-02 04:00:00', 1.79, 2.13, '1', 'a', 0, 0, '-', 1),
(4, 1, 'Leicester City', 'W.B.A', '2016-02-02 04:00:00', 2.13, 1.79, '1', 'h', 0, 0, '-', 1),
(5, 1, 'Sunderland', 'Crystal Palace', '2016-02-02 04:00:00', 1.8, 2.11, '-', 'n', 0, 0, '-', 1),
(6, 1, 'Aston Villa', 'Everton', '2016-02-02 04:00:00', 1.89, 2.01, '0.75', 'a', 0, 0, '-', 1),
(7, 1, 'Bournemouth AFC', 'Southampton', '2016-02-02 04:00:00', 1.77, 2.15, '0.25', 'a', 0, 0, '-', 1),
(8, 2, 'Valencia', 'Athletic Bilbao', '2016-02-28 23:00:00', 1.83, 2.12, '0.25', 'h', 0, 0, '-', 1),
(9, 1, 'Arsenal', 'Swansea', '2016-03-02', 0.82, 1.11, '0.25', 'h', 1, 1, '-', 1),
(10, 1, 'Liverpool', 'Man City', '2016-03-02', 1, 1, '1', 'h', 3, 0, '-', 1),
(11, 1, 'Man Utd', 'Watford', '2016-03-02', 1, 1, '1', 'h', 1, 0, '-', 1),
(12, 1, 'Tottenham Hotspur', 'Arsenal', '2016-03-05 21:00:00', 2.09, 1.85, '0.25', 'h', 2, 2, '-', 1),
(13, 1, 'Chelsea', 'Stoke City', '2016-03-05 23:00:00', 1.85, 2.1, '1', 'h', 1, 1, '-', 1),
(14, 1, 'Everton', 'West Ham United', '2016-03-05 23:00:00', 1.97, 1.97, '0.75', 'h', 2, 3, '-', 1),
(15, 1, 'Swansea City', 'Norwich City', '2016-03-05 23:00:00', 2, 1.94, '0.5', 'h', 1, 0, '-', 1),
(16, 1, 'Manchester City', 'Aston Villa', '2016-03-05 23:00:00', 2.04, 1.9, '2', 'h', 4, 0, '-', 1),
(17, 1, 'Newcastle United', 'AFC Bournemouth', '2016-03-05 23:00:00', 1.96, 1.98, '-', 'n', 1, 3, '-', 1),
(18, 1, 'Southampton', 'Sunderland', '2016-03-05 23:00:00', 2.07, 1.88, '1', 'h', 1, 1, '-', 1),
(19, 1, 'Norwich City', 'Manchester City', '2016-03-12 21:00:00', 1.96, 1.98, '1', 'a', 0, 0, '-', 1),
(20, 1, 'AFC Bournemouth', 'Swansea City', '2016-03-12 23:00:00', 1.94, 2, '0.5', 'h', 3, 2, '-', 1),
(21, 1, 'Stoke City', 'Southampton', '2016-03-12 23:00:00', 1.91, 2.03, '-', 'n', 1, 2, '-', 1),
(22, 2, 'Barcelona', 'Getafe', '2016-03-12 23:00:00', 1.79, 2.17, '3.25', 'h', 6, 0, '-', 1),
(23, 3, 'Borussia Monchengladbach', 'Eintracht Frankfurt', '2016-03-12 23:00:00', 1.89, 2.05, '1', 'h', 3, 0, '-', 1),
(24, 3, 'Hannover 96', 'Koln', '2016-03-12 23:00:00', 2.02, 1.92, '0.25', 'a', 0, 2, '-', 1),
(25, 3, 'Ingolstadt 04', 'VfB Stuttgart', '2016-03-12 23:00:00', 1.85, 2.1, '0.25', 'a', 3, 3, '-', 1),
(26, 3, 'SV Darmstadt 98', 'Augsburg', '2016-03-12 23:00:00', 2, 1.92, '-', 'n', 2, 2, '-', 1),
(27, 4, 'Empoli', 'Sampdoria', '2016-03-13 01:00:00', 1.86, 2.08, '0.25', 'h', 1, 1, '-', 1),
(28, 4, 'Inter Milan', 'Bologna', '2016-03-13 04:00:00', 2.12, 1.83, '1', 'h', 2, 1, '-', 1),
(29, 5, 'Lorient', 'Marseille', '2016-03-13 00:00:00', 2.16, 1.78, '-', 'n', 1, 1, '-', 1),
(30, 5, 'Gazelec Ajaccio', 'Caen', '2016-03-13 03:00:00', 1.79, 2.14, '-', 'n', 1, 0, '-', 1),
(31, 5, 'Guingamp', 'Saint Etienne', '2016-03-13 03:00:00', 2.09, 1.83, '-', 'n', 2, 0, '-', 1),
(32, 5, 'Montpellier', 'Nice', '2016-03-13 03:00:00', 2.1, 1.83, '0.5', 'h', 0, 2, '-', 1),
(33, 5, 'SC Bastia', 'Lille', '2016-03-13 03:00:00', 2.11, 1.82, '-', 'n', 1, 2, '-', 1),
(34, 5, 'Toulouse', 'Bordeaux', '2016-03-13 03:00:00', 1.93, 1.99, '0.25', 'h', 4, 0, '-', 1),
(35, 2, 'Celta Vigo', 'Real Sociedad', '2016-03-13 01:00:00', 2.11, 1.84, '0.5', 'h', 1, 0, '-', 1),
(36, 2, 'Atletico Madrid', 'Deportivo La Coruna', '2016-03-13 04:00:00', 1.91, 2.03, '1.5', 'h', 3, 0, '-', 1),
(37, 2, 'Rayo Vallecano', 'Eibar', '2016-03-13 05:00:00', 1.99, 1.95, '0.5', 'h', 1, 1, '-', 1),
(38, 11, 'Blackburn Rovers', 'Leeds United', '2016-03-12 21:00:00', 2.07, 1.85, '0.75', 'h', 1, 2, '-', 1),
(39, 11, 'Bolton Wanderers', 'Preston North End', '2016-03-12 23:00:00', 1.91, 2.01, '-', 'n', 1, 2, '-', 1),
(40, 11, 'Hull City', 'Milton Keynes Dons', '2016-03-12 23:00:00', 1.88, 2.04, '1.25', 'h', 1, 1, '-', 1),
(41, 11, 'Nottingham Forest', 'Sheffield Wednesday', '2016-03-12 23:00:00', 2.02, 1.9, '-', 'n', 0, 3, '-', 1),
(42, 11, 'Cardiff City', 'Ipswich Town', '2016-03-12 23:00:00', 1.83, 2.1, '0.25', 'h', 1, 0, '-', 1),
(43, 11, 'Queens Park Rangers', 'Brentford', '2016-03-12 23:00:00', 1.92, 2, '0.25', 'h', 3, 0, '-', 1),
(44, 11, 'Fulham', 'Bristol City', '2016-03-12 23:00:00', 1.93, 1.99, '0.25', 'h', 1, 2, '-', 1),
(45, 11, 'Huddersfield Town', 'Burnley', '2016-03-12 23:00:00', 2.05, 1.87, '-', 'n', 1, 3, '-', 1),
(46, 11, 'Rotherham United', 'Derby County', '2016-03-12 23:00:00', 1.84, 2.09, '0.5', 'a', 3, 3, '-', 1),
(47, 12, 'Arsenal', 'Watford', '2016-03-13 23:00:00', 1.9, 2.02, '1', 'h', 0, 0, '-', 0),
(48, 12, 'Manchester United', 'West Ham United', '2016-03-14 01:00:00', 2.08, 1.83, '0.25', 'h', 0, 0, '-', -1),
(49, 1, 'Aston Villa', 'Tottenham Hotspur', '2016-03-13 23:00:00', 2.03, 1.91, '1', 'a', 1, 7, '-', 1),
(50, 4, 'Chievo', 'AC Milan', '2016-03-13 21:00:00', 1.96, 1.98, '0.5', 'a', 0, 0, '-', 0),
(51, 4, 'Lazio', 'Atalanta', '2016-03-13 23:00:00', 2.05, 1.89, '0.75', 'h', 0, 0, '-', 0),
(52, 4, 'Palermo', 'Napoli', '2016-03-13 23:00:00', 1.99, 1.95, '1.5', 'a', 0, 0, '-', 0),
(53, 4, 'Udinese', 'AS Roma', '2016-03-13 23:00:00', 2.04, 1.9, '0.5', 'a', 0, 0, '-', 0),
(54, 4, 'Carpi', 'Frosinone', '2016-03-13 23:00:00', 1.8, 2.16, '0.5', 'h', 0, 0, '-', 0),
(55, 4, 'Fiorentina', 'Hellas Verona', '2016-03-13 23:00:00', 2.1, 1.85, '1.5', 'h', 0, 0, '-', 0),
(56, 4, 'Genoa', 'Torino', '2016-03-13 23:00:00', 1.83, 2.13, '-', 'n', 0, 0, '-', 0),
(58, 13, 'Azerbaijan', 'San Marino', '2017-09-04 23:00:00', 2.05, 1.85, '2.75', 'h', 0, 0, '-', 0),
(60, 13, 'England', 'Slovakia', '2017-09-05 01:45:00', 1.95, 1.95, '1.25', 'h', 0, 0, '-', 0),
(65, 13, 'Scotland', 'Malta', '2017-09-05 01:45:00', 2.05, 1.875, '3', 'h', 0, 0, '-', 0),
(66, 13, 'Slovenia', 'Lithuania', '2017-09-05 01:45:00', 1.875, 2.05, '1.25', 'h', 0, 0, '-', 0),
(67, 13, 'Libya  (N)', 'Guinea', '2017-09-05 02:00:00', 2, 1.9, '0.25', 'a', 0, 0, '-', 0),
(68, 13, 'Armenia', 'Denmark', '2017-09-04 23:00:00', 2.025, 1.9, '1.25', 'a', 0, 0, '-', 0),
(69, 13, 'Cameroon', 'Nigeria', '2017-09-05 00:00:00', 2.225, 1.7, '0.25', 'h', 0, 0, '-', 0),
(70, 13, 'Germany', 'Norway', '2017-09-05 01:45:00', 1.875, 2.05, '2.25', 'h', 0, 0, '-', 0),
(71, 13, 'Montenegro', 'Romania', '2017-09-05 01:45:00', 2.1, 1.825, '0.25', 'h', 0, 0, '-', 0),
(72, 13, 'N.Ireland', 'Czech Republic', '2017-09-05 01:45:00', 1.925, 2, '-', 'n', 0, 0, '-', 0),
(73, 13, 'Poland', 'Kazakhstan', '2017-09-05 01:45:00', 2.075, 1.85, '2.75', 'h', 0, 0, '-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_match_ticket`
--

CREATE TABLE IF NOT EXISTS `db_match_ticket` (
  `id_match_ticket` int(11) NOT NULL AUTO_INCREMENT,
  `id_match` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_game_log` int(11) NOT NULL,
  `step` tinyint(4) NOT NULL,
  `team_selected` char(1) NOT NULL,
  `rate` float NOT NULL,
  `update_time` datetime NOT NULL,
  `ip_address` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_match_ticket`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `db_match_ticket`
--

INSERT INTO `db_match_ticket` (`id_match_ticket`, `id_match`, `id_user`, `id_game_log`, `step`, `team_selected`, `rate`, `update_time`, `ip_address`) VALUES
(1, 6, 3, 0, 0, 'h', 0, '2016-02-29 08:59:41', '127.0.0.1'),
(2, 7, 3, 0, 0, 'h', 0, '2016-02-29 08:59:41', '127.0.0.1'),
(3, 3, 3, 0, 0, 'a', 0, '2016-02-29 09:01:38', '127.0.0.1'),
(4, 3, 3, 0, 0, 'a', 0, '2016-02-29 09:31:14', '127.0.0.1'),
(5, 4, 3, 0, 0, 'h', 0, '2016-02-29 09:31:14', '127.0.0.1'),
(6, 5, 3, 0, 0, 'a', 0, '2016-02-29 09:31:15', '127.0.0.1'),
(7, 6, 3, 0, 0, 'h', 0, '2016-02-29 09:31:15', '127.0.0.1'),
(8, 7, 3, 0, 0, 'a', 0, '2016-02-29 09:31:15', '127.0.0.1'),
(9, 3, 3, 0, 0, 'a', 0, '2016-02-29 10:21:41', '127.0.0.1'),
(10, 4, 3, 0, 0, 'h', 0, '2016-02-29 10:21:42', '127.0.0.1'),
(11, 6, 3, 0, 0, 'a', 0, '2016-02-29 10:22:25', '127.0.0.1'),
(12, 7, 3, 0, 0, 'a', 0, '2016-02-29 10:22:25', '127.0.0.1'),
(13, 4, 3, 0, 0, 'h', 0, '2016-03-01 08:32:57', '127.0.0.1'),
(14, 4, 3, 0, 0, 'h', 0, '2016-03-01 08:53:09', '127.0.0.1'),
(15, 7, 3, 0, 0, 'a', 0, '2016-03-01 08:53:09', '127.0.0.1'),
(16, 3, 3, 0, 0, 'a', 0, '2016-03-01 11:51:10', '127.0.0.1'),
(17, 4, 3, 0, 0, 'h', 0, '2016-03-01 11:51:10', '127.0.0.1'),
(18, 7, 3, 0, 0, 'a', 0, '2016-03-01 11:51:10', '127.0.0.1'),
(19, 3, 3, 0, 0, 'h', 0, '2016-03-01 11:52:51', '127.0.0.1'),
(20, 4, 3, 0, 0, 'h', 0, '2016-03-01 11:52:51', '127.0.0.1'),
(21, 5, 3, 0, 0, 'h', 0, '2016-03-01 11:52:52', '127.0.0.1'),
(22, 3, 3, 0, 1, 'a', 0, '2016-03-02 10:39:28', '127.0.0.1'),
(23, 4, 3, 0, 1, 'h', 0, '2016-03-02 10:39:28', '127.0.0.1'),
(24, 7, 3, 0, 1, 'a', 0, '2016-03-02 10:39:28', '127.0.0.1'),
(31, 9, 3, 6, 1, 'a', 1.4, '2016-03-03 09:37:27', '127.0.0.1'),
(32, 10, 3, 6, 1, 'h', 1, '2016-03-03 09:37:27', '127.0.0.1'),
(33, 11, 3, 6, 1, 'h', 1, '2016-03-03 09:37:27', '127.0.0.1'),
(34, 9, 3, 7, 2, 'h', -1.4, '2016-03-03 09:38:28', '127.0.0.1'),
(35, 10, 3, 7, 2, 'a', -1, '2016-03-03 09:38:28', '127.0.0.1'),
(36, 11, 3, 7, 2, 'h', 1, '2016-03-03 09:38:28', '127.0.0.1'),
(37, 12, 3, 13, 1, 'a', 1.4, '2016-03-05 16:45:32', '127.0.0.1'),
(38, 13, 3, 13, 2, 'h', -1, '2016-03-05 16:45:32', '127.0.0.1'),
(39, 14, 3, 13, 3, 'h', -1, '2016-03-05 16:45:32', '127.0.0.1'),
(40, 15, 3, 13, 4, 'h', 2, '2016-03-05 16:45:32', '127.0.0.1'),
(41, 16, 3, 13, 5, 'a', -1, '2016-03-05 16:45:32', '127.0.0.1'),
(42, 17, 3, 13, 6, 'h', -1, '2016-03-05 16:45:32', '127.0.0.1'),
(43, 18, 3, 13, 7, 'h', -1, '2016-03-05 16:45:32', '127.0.0.1'),
(44, 12, 3, 14, 8, 'a', 1.4, '2016-03-05 18:03:37', '127.0.0.1'),
(45, 13, 3, 14, 9, 'a', 2.1, '2016-03-05 18:03:37', '127.0.0.1'),
(46, 14, 3, 14, 10, 'a', 1.97, '2016-03-05 18:03:38', '127.0.0.1'),
(47, 15, 3, 14, 11, 'h', 2, '2016-03-05 18:03:38', '127.0.0.1'),
(48, 16, 3, 14, 12, 'h', 2.04, '2016-03-05 18:03:38', '127.0.0.1'),
(49, 17, 3, 14, 13, 'a', 1.98, '2016-03-05 18:03:38', '127.0.0.1'),
(50, 18, 3, 14, 14, 'a', 1.88, '2016-03-05 18:03:38', '127.0.0.1'),
(51, 19, 3, 15, 1, 'h', -1, '2016-03-12 18:14:00', '127.0.0.1'),
(52, 23, 3, 15, 2, 'h', 1.89, '2016-03-12 18:14:00', '127.0.0.1'),
(53, 28, 3, 15, 3, 'h', 1, '2016-03-12 18:14:00', '127.0.0.1'),
(54, 20, 3, 16, 4, 'a', -1, '2016-03-12 18:23:28', '127.0.0.1'),
(55, 21, 3, 16, 5, 'a', 2.03, '2016-03-12 18:23:28', '127.0.0.1'),
(56, 22, 3, 16, 6, 'a', -1, '2016-03-12 18:23:28', '127.0.0.1'),
(57, 27, 3, 16, 7, 'a', 1.4, '2016-03-12 18:23:28', '127.0.0.1'),
(58, 38, 3, 17, 8, 'h', -1, '2016-03-12 18:25:54', '127.0.0.1'),
(59, 40, 3, 17, 9, 'h', -1, '2016-03-12 18:25:54', '127.0.0.1'),
(60, 46, 3, 17, 10, 'a', 2.09, '2016-03-12 18:25:54', '127.0.0.1'),
(61, 19, 3, 18, 1, 'h', -1, '2016-03-13 13:21:12', '127.0.0.1'),
(62, 20, 3, 18, 2, 'h', 1.94, '2016-03-13 13:21:12', '127.0.0.1'),
(63, 21, 3, 18, 3, 'a', 2.03, '2016-03-13 13:21:12', '127.0.0.1'),
(64, 19, 3, 19, 4, 'h', 1.96, '2016-03-13 13:36:59', '127.0.0.1'),
(65, 20, 3, 19, 5, 'h', 1.94, '2016-03-13 13:37:00', '127.0.0.1'),
(66, 21, 3, 19, 6, 'a', 2.03, '2016-03-13 13:37:00', '127.0.0.1'),
(67, 49, 3, 21, 7, 'a', 0, '2016-03-13 18:36:45', '127.0.0.1'),
(68, 50, 3, 21, 8, 'a', 0, '2016-03-13 18:36:45', '127.0.0.1'),
(69, 51, 3, 21, 9, 'h', 0, '2016-03-13 18:36:45', '127.0.0.1'),
(70, 47, 3, 21, 10, 'h', 0, '2016-03-13 18:36:45', '127.0.0.1'),
(71, 48, 3, 21, 11, 'h', 0, '2016-03-13 18:36:45', '127.0.0.1'),
(72, 60, 3, 23, 1, 'h', 0, '2017-09-04 14:26:19', '127.0.0.1'),
(73, 65, 3, 23, 2, 'h', 0, '2017-09-04 14:26:19', '127.0.0.1'),
(74, 70, 3, 23, 3, 'h', 0, '2017-09-04 14:26:19', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `db_memory`
--

CREATE TABLE IF NOT EXISTS `db_memory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime DEFAULT NULL,
  `image_thumb` varchar(128) DEFAULT NULL,
  `gallery_tags` varchar(32) DEFAULT NULL,
  `video_tags` varchar(32) DEFAULT NULL,
  `read` int(11) NOT NULL,
  `show` tinyint(4) NOT NULL DEFAULT '0',
  `banned` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `db_memory`
--

INSERT INTO `db_memory` (`id`, `id_user`, `title`, `content`, `create_time`, `update_time`, `image_thumb`, `gallery_tags`, `video_tags`, `read`, `show`, `banned`) VALUES
(1, 3, 'Kill', '<p>Kill 888888888888888888888888888888888888888888888888</p>\r\n\r\n<p>Kill</p>\r\n', '2016-10-26 00:00:00', '2016-11-10 18:59:13', '', '9', '', 0, 0, 1),
(2, 3, 'test', 'xxxxx', '2016-10-25 11:55:11', NULL, '/assets/dcb338f/filterizr/img/nature_3.jpg', '', '', 0, 1, 1),
(3, 3, 'asda', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; fugiat nulla pariatur....</p>\r\n', '2016-10-27 12:28:28', '2016-10-27 15:36:52', NULL, '10', '', 1, 1, 0),
(4, 3, 'testPT', '<p><img src="/uploads/img/editor/1474281326_หาดป่าตอง.jpg" class="img-responsive"></p>\r\n\r\n<p>ถ้าพูดถึง &lsquo;หาดป่าตอง&rsquo; เชื่อว่า...คงไม่มีใครไม่รู้จักชายหาดที่สวยที่สุดของภูเก็ต ที่นี่โด่งดังไปทั่วโลกจนนักท่องเที่ยวทั้งไทยและต่างชาติหลั่งไหลกันมาเยี่ยมชม ความงามจากหาดทรายขาวละเอียด น้ำทะเลสีฟ้าใส และเสน่ห์อันเป็นเอกลักษณ์ที่ไม่เหมือนใคร แถมยังเป็นศูนย์9</p>\r\n', '2016-10-27 13:12:07', '2016-10-27 14:16:51', '/uploads/img/editor/1474281326_หาดป่าตอง.jpg', '', '', 3, 1, 0),
(5, 3, '9999', '<p><span style="color:rgb(34, 34, 34)">ศูนย์การค้าสยามพารากอน เป็นศูนย์การค้าขนาดใหญ่ในกลุ่มสยามซินเนอร์จี เป็นศูนย์การค้าที่ใหญ่เป็นอันดับที่ 3 ของประเทศไทย รองจากศูนย์การค้าเซ็นทรัลเวิลด์ และเซ็นทรัลพลาซา เวสต์เกต บริหารงานโดย บริษัท สยามพิวรรธน์ จำกัด ร่วมกับ บริษัท เดอะมอลล์กรุ๊ป</span></p>\r\n', '2016-10-27 16:15:55', NULL, NULL, '10', '', 63, 1, 0),
(6, 1, 'fast7', '<p><img src="/uploads/img/editor/1479731290_Fast-Furious-7-Wallpaper.jpg" class="img-responsive"></p>\r\n\r\n<p><span style="background-color:rgb(255, 255, 255); color:rgb(102, 102, 102)">เตรียมพบกับการกลับมาอีกครั้งของอภิมหาภาพยนตร์แอ็คชั่นทริลเลอร์แห่งปี </span><strong>Fast &amp; Furious 7</strong><span style="background-color:rgb(255, 255, 255); color:rgb(102, 102, 102)"> เร็ว..แรงทะลุนรก 7 สุดยอดภาพยนตร์แฟรนไชส์ที่แฟนภาพยนตร์ทั่วโลกรอคอย&nbsp;นำแสดงโดย วิน ดีเซล,&nbsp;พอล วอล์กเกอร์,&nbsp;ดเวย์น จอห์นสัน,&nbsp;มิเชลล์ ร็อดดริเกซ,&nbsp;จอร์ดานา บริวสเตอร์,ไทรีส กิ๊บสัน,&nbsp;คริส บริดเจส (ลูดาคริส),&nbsp;เจสัน สเตแธม,&nbsp;โทนี่ จา และ เคิร์ท รัสเซล กำกับการแสดงโดย เจมส์ วาน</span></p>\r\n\r\n<p><span style="color:rgb(102, 102, 102)">เตรียมพบกับการกลับมาอีกครั้งของอภิมหาภาพยนตร์แอ็คชั่นทริลเลอร์แห่งปี&nbsp;</span><strong>Fast &amp; Furious 7</strong><span style="color:rgb(102, 102, 102)">&nbsp;เร็ว..แรงทะลุนรก 7 สุดยอดภาพยนตร์แฟรนไชส์ที่แฟนภาพยนตร์ทั่วโลกรอคอย&nbsp;นำแสดงโดย วิน ดีเซล,&nbsp;พอล วอล์กเกอร์,&nbsp;ดเวย์น จอห์นสัน,&nbsp;มิเชลล์ ร็อดดริเกซ,&nbsp;จอร์ดานา บริวสเตอร์,ไทรีส กิ๊บสัน,&nbsp;คริส บริดเจส (ลูดาคริส),&nbsp;เจสัน สเตแธม,&nbsp;โทนี่ จา และ เคิร์ท รัสเซล กำกับการแสดงโดย เจมส์ วาน</span></p>\r\n\r\n<p><span style="color:rgb(102, 102, 102)">เตรียมพบกับการกลับมาอีกครั้งของอภิมหาภาพยนตร์แอ็คชั่นทริลเลอร์แห่งปี&nbsp;</span><strong>Fast &amp; Furious 7</strong><span style="color:rgb(102, 102, 102)">&nbsp;เร็ว..แรงทะลุนรก 7 สุดยอดภาพยนตร์แฟรนไชส์ที่แฟนภาพยนตร์ทั่วโลกรอคอย&nbsp;นำแสดงโดย วิน ดีเซล,&nbsp;พอล วอล์กเกอร์,&nbsp;ดเวย์น จอห์นสัน,&nbsp;มิเชลล์ ร็อดดริเกซ,&nbsp;จอร์ดานา บริวสเตอร์,ไทรีส กิ๊บสัน,&nbsp;คริส บริดเจส (ลูดาคริส),&nbsp;เจสัน สเตแธม,&nbsp;โทนี่ จา และ เคิร์ท รัสเซล กำกับการแสดงโดย เจมส์ วาน</span></p>\r\n\r\n<p><span style="color:rgb(102, 102, 102)">เตรียมพบกับการกลับมาอีกครั้งของอภิมหาภาพยนตร์แอ็คชั่นทริลเลอร์แห่งปี&nbsp;</span><strong>Fast &amp; Furious 7</strong><span style="color:rgb(102, 102, 102)">&nbsp;เร็ว..แรงทะลุนรก 7 สุดยอดภาพยนตร์แฟรนไชส์ที่แฟนภาพยนตร์ทั่วโลกรอคอย&nbsp;นำแสดงโดย วิน ดีเซล,&nbsp;พอล วอล์กเกอร์,&nbsp;ดเวย์น จอห์นสัน,&nbsp;มิเชลล์ ร็อดดริเกซ,&nbsp;จอร์ดานา บริวสเตอร์,ไทรีส กิ๊บสัน,&nbsp;คริส บริดเจส (ลูดาคริส),&nbsp;เจสัน สเตแธม,&nbsp;โทนี่ จา และ เคิร์ท รัสเซล กำกับการแสดงโดย เจมส์ วาน</span></p>\r\n\r\n<p><span style="color:rgb(102, 102, 102)">เตรียมพบกับการกลับมาอีกครั้งของอภิมหาภาพยนตร์แอ็คชั่นทริลเลอร์แห่งปี&nbsp;</span><strong>Fast &amp; Furious 7</strong><span style="color:rgb(102, 102, 102)">&nbsp;เร็ว..แรงทะลุนรก 7 สุดยอดภาพยนตร์แฟรนไชส์ที่แฟนภาพยนตร์ทั่วโลกรอคอย&nbsp;นำแสดงโดย วิน ดีเซล,&nbsp;พอล วอล์กเกอร์,&nbsp;ดเวย์น จอห์นสัน,&nbsp;มิเชลล์ ร็อดดริเกซ,&nbsp;จอร์ดานา บริวสเตอร์,ไทรีส กิ๊บสัน,&nbsp;คริส บริดเจส (ลูดาคริส),&nbsp;เจสัน สเตแธม,&nbsp;โทนี่ จา และ เคิร์ท รัสเซล กำกับการแสดงโดย เจมส์ วาน</span></p>\r\n', '2016-11-09 17:36:56', NULL, '/uploads/img/memory/1479731290_Fast-Furious-7-Wallpaper.jpg', '', '', 28, 1, 0),
(7, 3, 'จังซีลอน', '<p><span style="color:#000080">ตื่นแล้วอาบน้ำอุ่นๆ สดชื่น ออกเดินจากโรงแรมเลี้ยวซ้าย<br />\r\n<br />\r\nถ้าเรียกตุ๊กๆ สองร้อย มอร์ไซด์คนละสี่สิบ ซ้อนสองก็แปดสิบ<br />\r\n<br />\r\nเดินดีกว่า พนักงานโรงแรมบอกเดินไม่นาน<br />\r\n<br />\r\nเอ้าเดินก็เดิน ไปตามถนนหน้าโรงแรม เขาเรียกเส้นกลางหาดป่าตอง<br />\r\n<br />\r\nเดินไม่ถึงสิบนาที ก็ถึง ดีใจที่ไม่เรียกรถ ถึงแล้ว จังซีลอน</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="color:#000080"><img src="/uploads/img/editor/1479460771_E9610804-0.jpg" class="img-responsive"></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="color:#000080"><img src="/uploads/img/editor/1479460788_Image.jpg" class="img-responsive"></span></p>\r\n', '2016-11-18 16:20:21', '2016-11-29 19:18:31', '/uploads/img/memory/1479460771_E9610804-0.jpg', '', '', 8, 1, 0),
(8, 3, 'ads', '<p>ads</p>\r\n', '2016-12-13 18:55:49', NULL, NULL, NULL, NULL, 0, 0, 0),
(9, 3, 'หัวหิน', '<p><img src="/uploads/img/editor/1484892465_huahin5.jpg" class="img-responsive"></p>\r\n\r\n<p><span style="color:rgb(0, 0, 0)">สถานที่ยอดนิยมตลอดกาลของหัวหินนั่นก็คือชายหาดหัวหิน ซึ่งตั้งอยู่ทางด้านทิศตะวันออกของตัวเมือง มีทางลงหาดอยู่ที่ถนนดำเนินเกษม สองข้างทางลงหาดมีโรงแรมและร้านจำหน่ายสินค้าที่ระลึก โดยหาดหัวหินมีความยาวประมาณ 5 กิโลเมตร ทรายขาวละเอียดเหมาะสำหรับเล่นน้ำทะเล</span></p>\r\n', '2017-01-20 13:07:58', NULL, '/uploads/img/memory/1484892465_huahin5.jpg', NULL, NULL, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_notify`
--

CREATE TABLE IF NOT EXISTS `db_notify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_user_owner` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `category` varchar(128) NOT NULL,
  `action` varchar(64) NOT NULL,
  `detail` varchar(128) DEFAULT NULL,
  `url` varchar(512) NOT NULL,
  `create_time` datetime NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `db_notify`
--

INSERT INTO `db_notify` (`id`, `id_user`, `id_user_owner`, `id_cat`, `category`, `action`, `detail`, `url`, `create_time`, `active`) VALUES
(1, 3, 1, 6, 'memory', 'like', '1', '/memory/view/6', '2016-11-10 16:12:14', 1),
(2, 1, 3, 5, 'memory', 'like', '1', '/memory/view/5', '2016-11-10 16:13:50', 1),
(3, 3, 1, 1, 'memory', 'comment', NULL, '/memory/view/6#data-comment-1', '2016-11-10 16:15:01', 0),
(4, 1, 3, 1, 'comment', 'comment', NULL, '/memory/view/6#data-comment-2', '2016-11-10 16:15:53', 1),
(5, 3, 1, 1, 'comment', 'comment', NULL, '/memory/view/6#data-comment-3', '2016-11-10 16:16:15', 0),
(7, 1, 3, 8, 'gallery', 'comment', NULL, '/gallery/view/qv2s0Ua9mK53EUvkruSYTS#data-comment-8', '2016-11-10 16:30:59', 1),
(8, 1, 3, 9, 'gallery', 'like', '1', '/gallery/view/qv2s0Ua9mK53EUvkruSYTS', '2016-11-10 16:53:40', 1),
(9, 3, 1, 10, 'memory', 'comment', NULL, '/memory/view/6#data-comment-10', '2016-11-22 13:47:34', 0),
(10, 3, 1, 1, 'comment', 'comment', NULL, '/memory/view/6#data-comment-24', '2016-11-22 19:33:35', 0),
(11, 3, 1, 25, 'memory', 'comment', NULL, '/memory/view/6#data-comment-25', '2016-11-22 19:34:04', 0),
(12, 3, 3, 3, 'rank', 'up', 'Soldier', '/personal/rank', '2016-11-25 19:45:33', 0),
(13, 3, 3, 4, 'rank', 'up', 'Captain', '/personal/rank', '2016-11-25 19:53:08', 1),
(14, 3, 3, 5, 'rank', 'up', 'Commander', '/personal/rank?pos=7', '2016-11-25 20:09:30', 1),
(16, 3, 1, 6, 'feeling', 'feeling', 'gallery', '/gallery/view/qv2s0Ua9mK53EUvkruSYTS#data-comment-8', '2016-12-02 13:18:13', 1),
(17, 3, 3, 7, 'feeling', 'feeling', 'memory', '/memory/view/6#data-comment-3', '2016-12-02 13:49:06', 1),
(18, 16, 1, 28, 'memory', 'comment', NULL, '/memory/view/6#data-comment-28', '2016-12-06 14:48:11', 0),
(19, 3, 16, 8, 'feeling', 'feeling', 'memory', '/memory/view/6#data-comment-28', '2016-12-06 19:30:05', 0),
(20, 3, 16, 28, 'comment', 'comment', NULL, '/memory/view/6#data-comment-29', '2016-12-09 13:26:09', 1),
(21, 16, 3, 11, 'gallery', 'like', '1', '/gallery/view/m9gSneIPICrbg06nCG6t_E', '2016-12-09 13:46:57', 0),
(22, 16, 3, 9, 'feeling', 'feeling', 'gallery', '/gallery/view/m9gSneIPICrbg06nCG6t_E#data-comment-11', '2016-12-09 13:47:05', 0),
(23, 16, 3, 10, 'feeling', 'feeling', 'gallery', '/gallery/view/m9gSneIPICrbg06nCG6t_E#data-comment-26', '2016-12-09 13:47:29', 0),
(24, 16, 3, 11, 'feeling', 'feeling', 'memory', '/memory/view/6#data-comment-29', '2016-12-09 15:48:49', 0),
(25, 16, 1, 12, 'feeling', 'feeling', 'memory', '/memory/view/6#data-comment-2', '2016-12-09 15:49:27', 0),
(26, 16, 3, 13, 'feeling', 'feeling', 'memory', '/memory/view/6#data-comment-10', '2016-12-09 16:49:41', 0),
(27, 3, 1, 1, 'feeling', 'feeling', 'gallery', '/gallery/view/qv2s0Ua9mK53EUvkruSYTS#data-comment-8', '2016-12-12 11:27:47', 0),
(28, 16, 3, 2, 'feeling', 'feeling', 'memory', '/memory/view/7#data-comment-9', '2016-12-12 11:41:30', 0),
(29, 16, 3, 30, 'memory', 'comment', NULL, '/memory/view/7#data-comment-30', '2016-12-12 11:41:47', 0),
(30, 3, 16, 3, 'feeling', 'feeling', 'memory', '/memory/view/7#data-comment-30', '2016-12-12 11:42:19', 1),
(31, 16, 3, 4, 'feeling', 'feeling', 'gallery', '/gallery/view/m9gSneIPICrbg06nCG6t_E#data-comment-11', '2016-12-12 16:47:34', 1),
(32, 16, 3, 5, 'feeling', 'feeling', 'gallery', '/gallery/view/m9gSneIPICrbg06nCG6t_E#data-comment-26', '2016-12-14 12:01:19', 1),
(33, 16, 3, 26, 'comment', 'comment', NULL, '/gallery/view/m9gSneIPICrbg06nCG6t_E#data-comment-31', '2016-12-14 12:01:58', 1),
(34, 16, 3, 23, 'comment', 'comment', NULL, '/gallery/view/m9gSneIPICrbg06nCG6t_E#data-comment-32', '2016-12-14 12:02:49', 1),
(35, 3, 1, 8, 'comment', 'comment', NULL, '/gallery/view/vmj3cQeCkJNnYelxpqhfzE#data-comment-33', '2017-01-19 15:51:16', 0),
(36, 3, 16, 6, 'feeling', 'feeling', 'gallery', '/gallery/view/vmj3cQeCkJNnYelxpqhfzE#data-comment-36', '2017-01-25 11:36:29', 1),
(37, 16, 3, 7, 'feeling', 'feeling', 'memory', '/memory/view/7#data-comment-27', '2017-01-25 19:23:52', 1),
(38, 48, 3, 37, 'memory', 'comment', NULL, '/memory/view/9#data-comment-37', '2017-01-26 16:50:40', 0),
(39, 48, 3, 38, 'memory', 'comment', NULL, '/memory/view/9#data-comment-38', '2017-01-26 16:51:38', 0),
(40, 48, 3, 39, 'memory', 'comment', NULL, '/memory/view/9#data-comment-39', '2017-01-26 16:52:37', 0),
(41, 48, 3, 35, 'comment', 'comment', NULL, '/memory/view/9#data-comment-40', '2017-01-26 16:53:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_personal_messages`
--

CREATE TABLE IF NOT EXISTS `db_personal_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_from` int(11) NOT NULL,
  `id_user_to` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `detail` text NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime DEFAULT NULL,
  `read` tinyint(4) NOT NULL DEFAULT '0',
  `show_sent` tinyint(4) NOT NULL DEFAULT '1',
  `delete` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `db_personal_messages`
--

INSERT INTO `db_personal_messages` (`id`, `id_user_from`, `id_user_to`, `title`, `detail`, `create_time`, `update_time`, `read`, `show_sent`, `delete`) VALUES
(3, 3, 3, 'adfasd', 'asdsa', '2016-11-08 14:32:58', NULL, 0, 0, 1),
(5, 3, 1, 'xxxx', 'xxxxx', '2016-11-08 16:56:16', NULL, 0, 1, 0),
(6, 3, 3, 'sdada', 'sadaaa', '2016-11-08 17:18:17', NULL, 1, 1, 0),
(7, 3, 1, '6666', '66666', '2016-11-16 17:31:52', NULL, 0, 1, 0),
(8, 3, 4, '555', 'Oh yeah', '2016-11-16 17:32:14', NULL, 0, 1, 0),
(9, 3, 16, 'ronaldo', 'xxxx', '2016-11-16 17:52:40', NULL, 1, 1, 0),
(10, 3, 1, 'xxx', 'xxx', '2016-11-17 17:28:07', NULL, 0, 1, 0),
(11, 3, 1, 'asda', 'asdsa', '2016-12-13 11:16:50', NULL, 0, 1, 0),
(12, 3, 1, 'sasda', 'sdadsa', '2016-12-13 11:18:40', NULL, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_rank`
--

CREATE TABLE IF NOT EXISTS `db_rank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `name_th` varchar(128) NOT NULL,
  `detail` varchar(256) DEFAULT NULL,
  `exp` int(11) NOT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `permission` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `db_rank`
--

INSERT INTO `db_rank` (`id`, `name`, `name_th`, `detail`, `exp`, `icon`, `permission`) VALUES
(1, 'Slave', 'ทาส', 'ผู้เริ่มต้น', 0, '', 1),
(2, 'Rookie', 'ลูกเด็ก', 'alert', 100, '', 1),
(3, 'Soldier', 'ลูกพี่', 'expend', 200, '', 1),
(4, 'Captain', 'หัวหน้า', 'img-profile', 400, '', 1),
(5, 'Commander', 'ผู้บังคับบัญชา', 'add-list-expend', 800, '', 1),
(6, 'Sir', 'ท่านผู้นำ', 'nickname', 1600, '', 1),
(7, 'King', 'พระราชา', 'update-credit', 3200, '', 1),
(8, 'Hero', 'ซุปเปอร์ฮีโร่', NULL, 6400, '', 1),
(9, 'Legend', 'บุคคลในตำนาน', NULL, 12800, '', 1),
(10, 'Immortal', 'ผู้เป็นอมตะ', NULL, 30000, '', 1),
(11, 'Master', 'เจ้าพิภพ', NULL, 999999, '', 10),
(12, 'Devil', 'ผู้คุมวิญญาณ', NULL, 9999999, '', 99),
(13, 'God', 'บร๊ะเจ้า', NULL, 2147483647, '', 100);

-- --------------------------------------------------------

--
-- Table structure for table `db_report`
--

CREATE TABLE IF NOT EXISTS `db_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_user_report` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `category` varchar(128) CHARACTER SET latin1 NOT NULL,
  `title` varchar(256) CHARACTER SET latin1 NOT NULL,
  `content` varchar(512) CHARACTER SET latin1 DEFAULT NULL,
  `create_time` datetime NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `db_report`
--

INSERT INTO `db_report` (`id`, `id_user`, `id_user_report`, `id_cat`, `category`, `title`, `content`, `create_time`, `active`) VALUES
(1, 3, 1, 3, 'memory', 'fuck', 'u', '2016-11-07 17:04:20', 1),
(2, 3, 1, 3, 'memory', 'test2', 's', '2016-11-07 17:04:49', 1),
(3, 3, 1, 3, 'memory', 'aa', 'a', '2016-11-07 17:15:22', 0),
(4, 3, 1, 3, 'memory', 'x', 'x', '2016-11-07 17:15:43', 1),
(5, 3, 1, 1, 'comment', 'dasd', 'asda', '2016-11-10 15:32:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_rules`
--

CREATE TABLE IF NOT EXISTS `db_rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(128) NOT NULL,
  `name` varchar(256) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `db_rules`
--

INSERT INTO `db_rules` (`id`, `type`, `name`, `content`) VALUES
(1, 'rules', 'กฏ กติกา และมารยาทในการใช้งานบนเว็บไซต์', '<p><strong><span style="color:rgb(0, 0, 255)">กรุณาอ่าน กฎ และเงื่อนไขในการใช้งาน Website โดยละเอียด</span></strong></p>\r\n\r\n<p><span style="color:rgb(42, 42, 42)">1. ห้ามเผยแพร่ข้อความเนื้อหาที่ทำให้สถาบันชาติ ศาสนา พระมหากษัตริย์และพระบรมวงศานุวงศ์เสื่อมเสีย ไม่ว่าจะเป็นทางข้อความ หรือทางภาพ</span><br />\r\n<span style="color:rgb(42, 42, 42)">2. ห้ามเผยแพร่ข้อความและเนื้อหาที่เป็นการโฆษณาชวนเชื่อและหลอกลวง ไม่ว่าจะเป็นทางข้อความ หรือทางภาพ หากฝ่าฝืนจะผิดกฎหมายในข้อหาโฆษณาหลอกลวงประชาชน</span><br />\r\n<span style="color:rgb(42, 42, 42)">3. ห้ามเผยแพร่ข้อความและเนื้อหาที่ทำให้ผู้อื่นนั้นเสียหาย รำคาญใจ หรือก่อเกิดความรู้สึกไม่ดีต่อผู้อื่น ไม่ว่าจะเกิดด้วยความตั้งใจหรือไม่</span><br />\r\n<span style="color:rgb(42, 42, 42)">4. ห้ามเผยแพร่ข้อความที่ส่อเสียดหรือว่ากล่าวให้ร้ายแก่สมาชิกผู้อื่น ไม่ว่าข้อความนั้นจะมีว่าอย่างไร จะกล่าวถึงชื่อผู้อื่นหรือไม่</span><br />\r\n<span style="color:rgb(42, 42, 42)">5. ห้ามเผยแพร่ข้อความที่ยุยงให้ผู้อื่นเกิดความขัดแย้งซึ่งกันและกัน ไม่ว่าผู้ตั้งกระทู้หรือผู้ตอบนั้นจะตั้งใจหรือไม่</span><br />\r\n<span style="color:rgb(42, 42, 42)">6. ห้ามเผยแพร่ข้อความ รูปภาพ ที่ส่อไปในเรื่องเพศ ลามกอนาจาร หรือขัดต่อศีลธรรมอันดีของไทย</span><br />\r\n<span style="color:rgb(42, 42, 42)">7. ห้ามเผยแพร่ข้อความที่ไม่ก่อให้เกิดประโยชน์แก่ผู้อื่น หรือข้อความที่ซ้ำๆ ในกระทู้เดียวกันหรือหลายกระทู้ ทั้งนี้ขึ้นอยู่กับความเหมาะสม เจตนาของผู้ตั้งกระทู้หรือผู้ตอบ และสถานการณ์ในกระทู้นั้น</span><br />\r\n<span style="color:rgb(42, 42, 42)">8. ห้ามเผยแพร่ข้อความหรือกระทู้ที่ส่อให้เห็นถึงเจตนาในการพนันต่างๆ ไม่ว่าจะวิธีใดก็ตาม</span><br />\r\n<span style="color:rgb(42, 42, 42)">9. ห้ามเผยแพร่ข้อมูลส่วนตัวของตนเองและของผู้อื่น ซึ่งสามารถสร้างความเสียหายให้กับบุคคลผู้เป็นเจ้าของหรือบุคคลที่สาม เช่นหมายเลขโทรศัพท์ หมายเลขบัตรเครดิต ฯลฯ ไม่ว่าผู้เผยแพร่จะมีเจตนาหรือไม่</span><br />\r\n<span style="color:rgb(42, 42, 42)">10. ขอสงวนสิทธิ์ไม่ให้บริการ Username บางคำที่เป็นของผู้ดูแลระบบ ได้แก่ &quot;webmaster&quot;, &quot;web editor&quot;, &quot;hostmaster&quot;, &quot;postmaster&quot;, &quot;admin&quot;, &quot;member(s)&quot;, &quot;customer / customer service&quot; หรือคำอื่นๆ ที่พิจารณาว่าไม่เหมาะสมสำหรับการใช้เป็น Username</span><br />\r\n<span style="color:rgb(42, 42, 42)">11. สมาชิกจะต้องใช้นามแฝงที่เหมาะสม ไม่หยาบคาย หรือส่อไปในทางลามกอนาจาร มิฉะนั้นทีมงานมีสิทธิ์ ไม่ให้สิทธิ์การเป็นสมาชิกได้</span><br />\r\n<span style="color:rgb(42, 42, 42)">12. ทีมงานขอสงวนสิทธิ์ในการยกเลิกความเป็นสมาชิกได้ โดยไม่ต้องบอกกล่าวให้ทราบล่วงหน้า</span><br />\r\n<span style="color:rgb(42, 42, 42)">13. ทีมงานขอสงวนสิทธิ์ในการหยุดให้บริการ เมื่อใดก็ได้ โดยไม่ต้องแจ้งให้สมาชิกทราบล่วงหน้า</span><br />\r\n<span style="color:rgb(42, 42, 42)">14. ทีมงานขอสงวนสิทธิ์ในการลบกระทู้ และความคิดเห็นใน Website&nbsp;โดยมิต้องแจ้งให้ทราบล่วงหน้า</span><br />\r\n<br />\r\n<span style="color:rgb(42, 42, 42)">*** ข้อความ และรูปภาพ ที่ถูกพิมพ์และเผยแพร่ออกจากเว็บบอร์ดแห่งนี้ เกิดขึ้นจากการเขียนโดยสาธารณชน และตีพิมพ์แบบอัตโนมัติ ซึ่งทางเว็บไซต์&nbsp;และทีมงาน ไม่จำเป็นต้องเห็นด้วย และ &quot;ไม่รับผิดชอบ&quot; ต่อข้อความ และรูปภาพใดๆ ผู้อ่านจึงต้องใช้วิจารณญาณในการกลั่นกรองด้วยตนเอง อย่างไรก็ตาม หากท่านพบข้อความ หรือรูปภาพที่ไม่เหมาะสม ได้ถูกเผยแพร่ลงในเว็บไซต์ อาทิเช่น คำพูดที่ลบหลู่ ดูหมิ่นต่อความมั่นคงของชาติ ศาสนา และพระมหากษัตริย์ สิ่งผิดกฎหมาย หรือขัดต่อศีลธรรมต่างๆ กรุณาแจ้งมาที่ webmaster ของแต่ละเว็บไซต์ เพื่อทีมงานจะได้ดำเนินการโดยเร็วที่สุด</span><br />\r\n<br />\r\n<strong><span style="color:rgb(255, 0, 68)">คำแนะนำในการตั้งชื่อ ห้ามใช้ชื่อไม่เหมาะสมดังต่อไปนี้</span></strong><br />\r\n<br />\r\n<span style="color:rgb(42, 42, 42)">1. มีความหมายไม่เหมาะสม หยาบคาย เป็นคำผวน หรือส่อไปในทาง ลามกอนาจาร</span><br />\r\n<span style="color:rgb(42, 42, 42)">2. กล่าวพาดพิง หรือล้อเลียน ถึงสถาบัน ยี่ห้อสินค้า บุคคลอื่น</span><br />\r\n<span style="color:rgb(42, 42, 42)">3. มีข้อมูลส่วนตัว เช่น ชื่อ-นามสกุล อีเมล์ เบอร์โทร ฯลฯ</span><br />\r\n<span style="color:rgb(42, 42, 42)">4. ชื่อคล้ายชื่อสมาชิกที่มีอยู่แล้ว หรือมีข้อความที่ทำให้เกิดความสับสน เช่น ตัวจริง ตัวปลอม</span><br />\r\n<span style="color:rgb(42, 42, 42)">5. ใช้ตัวอักษรซ้ำกันมากๆ หรือไม่มีความหมาย เช่น 55555, adsdsfsd 6. เป็นชื่อ web, ชื่อสินค้าและบริการ, ชื่อหน่วยงาน หรือชื่อเข้าข่ายโฆษณา ส่งเสริมการขาย</span></p>\r\n'),
(2, 'rank', 'รายละเอียดการเพิ่มยศ', '<p><strong><span style="color:rgb(0, 0, 255)">ข้อมูลระบบ Rank และรายละเอียดการเพิ่ม Rank</span></strong></p>\r\n\r\n<p><span style="color:#8B4513"><strong>***ข้อมูล Rank ทั้งหมด***</strong></span><br />\r\n<span style="color:rgb(42, 42, 42)">1. Slave หรือ ทาส สำหรับผู้เริ่มต้นก็ ต้องกลายเป็น *ทาส* ไม่พูด ไม่โวย ไม่บ่น</span><br />\r\n<span style="color:rgb(42, 42, 42)">2. Rookie หรือ ลูกเด็ก ปลดแอกความเป็นทาส เริ่มมีจุดหมายในชีวิตมากขึ้น ท่านจึงสมควรมีระบบเตือนความจำไว้ใช้</span><br />\r\n<span style="color:rgb(42, 42, 42)">3. </span><span style="color:rgb(68, 68, 68)">Soldier หรือ ลูกพี่ พอเป็นลูกพี่ก็เหมือนมีภาระที่มากขึ้น&nbsp;</span><span style="color:rgb(42, 42, 42)">ท่านสามารถใช้งานระบบ บัญชีรายรับรายจ่ายได้แล้วในขณะนี้</span><br />\r\n<span style="color:rgb(42, 42, 42)">4. Captain หรือ หัวหน้า&nbsp;</span><span style="color:rgb(68, 68, 68)">ระดับที่เริ่มมีคนรู้จักมากขึ้นแล้ว&nbsp;ท่านสามารถจัดการแก้ไขรูปโปรไฟล์ของท่านเองได้</span><br />\r\n<span style="color:rgb(42, 42, 42)">5. Commander หรือ ผู้บังคับบัญชา เริ่มมีฐานะที่ดีแล้ว&nbsp;ท่านสามารถปรับเพิ่มรายการหลักในบัญชีรายรับรายจ่ายได้แล้ว</span><br />\r\n<span style="color:rgb(42, 42, 42)">6. Sir หรือ ท่านผู้นำ เมื่อเข้าสู่การเป็นผู้นำระดับสูงก็ย่อมมีคนรู้จักเยอะ ยิ่งมีคนรู้จักเยอะก็ยิ่งมีคนเกลียดเยอะ ถึงตรงนี้ท่านสามารถตั้งนามแฝงให้กับตัวท่านเองได้</span><br />\r\n<span style="color:rgb(42, 42, 42)">7. King หรือ พระราชา ความสบายเริ่มเข้าครอบงำ อยู่สบายๆ แค่สั่งการเท่านั้น กว่าจะมาถึงขั้นนี้ได้คงเหนื่อยน่าดู รางวัลเล็กน้อย คือ ท่านจะได้รับเครดิตในการใช้งานต่อเดือนเพิ่มขึ้น</span><br />\r\n<span style="color:rgb(42, 42, 42)">8. Hero หรือ ซุปเปอร์ฮีโร่ ท่านคือผู้กล้าแห่งอาณาจักรนี้ แต่ก็ยังไม่ได้อัพเดทอะไรหรอก ยังคิดไม่ออก</span><br />\r\n<span style="color:rgb(42, 42, 42)">9. Legent หรือ บุคคลในตำนาน ท่านคือผู้ที่มีเกียรติประวัติอันน่าจดจำอาณาจักรแห่งนี้ เราจะเก็บท่านไว้ในความทรงจำ</span><br />\r\n<span style="color:rgb(42, 42, 42)">10. Immortal หรือ ผู้เป็นอมตะ ท่านช่างสุดยอดยิ่งกว่าตำนาน ไม่ว่าจะไปโผล่ที่ไหนๆ ท่านก็จะมีออร่าแห่งความยิ่งใหญ่ให้ผู้อื่นได้เห็นถึงพลังงานบางอย่างเสมอ</span></p>\r\n\r\n<p><span style="color:rgb(139, 69, 19)"><strong>***วิธีการเพิ่มค่าประสบการณ์***</strong></span><br />\r\n<span style="color:rgb(42, 42, 42)">1. เว็บของเราจะมีเนื้อหาหลัก คือ การสร้าง Memory และ Gallery เพิ่อเก็บไว้ดูย้อนหลัง หรือ เปิดให้ผู้อื่นได้เข้ามาติดตามได้ ท่านจะได้แต้มค่าประสบการณ์จากการสร้างเนื้อหาเหล่านี้</span><br />\r\n<span style="color:rgb(42, 42, 42)">2. ท่านจะได้แต้มค่าประสบการณ์เพิ่มเติมจากการที่มีผู้อื่นเข้ามาชม Memory หรือ Gallery ของท่าน และได้แสดงความรู้สึกถูกใจต่อ Memory หรือ Gallery ของท่าน</span><br />\r\n<span style="color:rgb(42, 42, 42)">3.&nbsp;</span><span style="color:rgb(42, 42, 42)">การเข้าชมเนื้อหาของผู้อื่นและแสดงความคิดเห็น หรือ Comment เพื่อแสดงความคิดเห็นท่านที่แสดงความคิดเห็นอาจจะได้ค่าประสบการณ์เล็กน้อยจากการ Comment แต่ท่านจะได้ค่าประสบการณ์ที่เยอะพอสมควรถ้ามีผู้อื่นมากดให้คะแนน Comment ของท่าน</span><br />\r\n<span style="color:rgb(42, 42, 42)">4. การ Report หรือ การรายงานข้อมูลที่ไม่พึงประสงค์ เป็นการช่วยกันตรวจสอบให้บ้านหลังนี้ของเราน่าอยู่และมีเนื้อหาที่เหมาะสม ท่านที่ Report ข้อมูลที่ไม่เหมาะสมต่างๆ จะได้รับแต้มค่าประสบการณ์เพิ่มเติมจากตรงนี้ด้วย</span></p>\r\n\r\n<p><span style="color:rgb(75, 0, 130)">***เพิ่มเติม***<br />\r\n- ท่านจะได้รับ Point 20 Point เป็นประจำทุกเดือน โดยท่านที่มี&nbsp;Rank ถึงระดับที่ได้โบนัสเพิ่มก็จะได้ Point เยอะขึ้น&nbsp;แต่ละเดือนถ้าใช่ Point ไม่หมด ก็จะยกยอดไปใช้ในเดือนต่อไปได้<br />\r\n- การให้คะแนน Comment จะเสีย 1 Point ทุกครั้งที่ท่านกดให้คะแนน ท่านสามารถกดยกเลิกการให้คะแนนได้ โดยเจ้าของ Comment จะไม่ได้รับค่าประสบการณ์ แต่ท่านจะไม่ได้รับ Point ในส่วนนั้นคืน แต่ท่านสามารถกดให้คะแนนแก่ Comment ที่ท่านกดยกเลิกไปใหม่โดยไม่เสีย Point เพิ่มเติม โดยเจ้าของ Comment ก้จะได้ค่าประสบการณ์ถ้าหากยังไม่ได้รับการตรวจสอบไปก่อนหน้านี้</span><br />\r\n<span style="color:#800000">-&nbsp;</span><span style="color:rgb(75, 0, 130)">การที่ท่านจะได้คะแนน Comment จากผู้อื่น เนื้อหาของท่านใน Comment จะต้องมีสาระ และสร้างความประทับใจให้แก่ผู้อ่านจนมีการกดให้คะแนน Comment&nbsp;ท่านถึงจะได้คะแนนในส่วนนี้<br />\r\n- การตรวจสอบการเพิ่ม Rank จะทำการตรวจเป็นประจำทุกเดือน ท่านไม่ต้องกังวัลว่าเล่นไปตั้งเยอะ แต่ Rank ไม่อัพเลย แต่พอมีการตรวจสอบใหม่ท่านอาจจะอัพทีเดียวหลาย Rank เลยก็เป็นได้</span></p>\r\n\r\n<p><br />\r\n<span style="color:#FF0000"><strong>***คำเตือน***</strong></span><br />\r\n<span style="color:#FF0000">- การ Report สามารถ Report ได้วันละ 5 ครั้ง เพื่อป้องกันการ Report ที่พร่ำเพรื่อ และถ้าหากพบการ Report ที่โดยผู้ที่โดน Report ไม่ได้กระทำผิดกฏใดๆ ท่านที่กด Report อาจจะโดนลดการ Reprot ลง หรืออาจโดนยกเลิกการ Report ไปเลย<br />\r\n- การตกลงสลับการกดให้คะแนน Comment กันเองระหว่างบุคคล 2 คน การกระทำดังกล่าวหากเกิดความสัมพันธ์กันอย่างมีนัยสำคัญ เราจะทำการตรวจสอบ และหากพบว่าการกระทำดังกล่าวผิดปกติ ท่านจะโดนยึดแต้มค่าประสบการณ์ที่เกี่ยวข้องกลับทั้งหมด โดยไม่ได้รับ Point คืน<br />\r\n- การโพสข้อความหรือเนื้อหาที่ไม่เหมาะสมลงไป แล้วทางเราพบเห็นหรือมีผู้รายงานเข้ามา การทำโทษเริ่มต้นท่านอาจจะถูกลดแต้มค่าประสบการณ์ลงตามความเหมาะสม หรืออาจโดนบล็อคการใช้งานเนื้อหาบางอย่างชั่วคราว ถ้าหากยังมีการกระทำผิดซ้ำๆ จะมีการพิจารณาถึงโทษหนัก คือ แบนการใช้งานทุกอย่างถาวร</span></p>\r\n\r\n<p><span style="color:#000000">***หากมีข้อสงสัยเพิ่มเติมสามารถ PM มาสอบถามทาง admin ได้ครับผม***</span></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `db_setting`
--

CREATE TABLE IF NOT EXISTS `db_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(64) NOT NULL,
  `name` varchar(128) NOT NULL,
  `data` varchar(256) NOT NULL,
  `setting` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `db_setting`
--

INSERT INTO `db_setting` (`id`, `type`, `name`, `data`, `setting`) VALUES
(1, 'sentmail', 'sentmail', 'กำหนดค่าการส่งอีเมล์ถึง admin เมื่อมีการติดต่อมา', 1),
(2, 'report_per_day', '5', 'จำนวนครั้งการรายงานผู้ใช้งานต่อวัน', 1),
(3, 'exp_for_comment', '1', 'ได้รับ exp เมื่อคอมเม้น', 1),
(4, 'post_point', '20', 'แต้มในการแสดงความรู้สึกบนคอมเม้นต่อเดือน', 1),
(5, 'home_slider', 'home slider', 'slide หน้าแรก', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tags`
--

CREATE TABLE IF NOT EXISTS `db_tags` (
  `id_tag` int(11) NOT NULL AUTO_INCREMENT,
  `name_th` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `group` tinyint(4) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `db_tags`
--

INSERT INTO `db_tags` (`id_tag`, `name_th`, `name_en`, `category`, `group`, `parent_id`) VALUES
(1, 'อาหาร', 'Food', 'expend', -1, 0),
(2, 'อาหารหลัก', 'main food', 'expend', -1, 1),
(3, 'เครื่องดื่ม', 'Beverage', 'expend', -1, 0),
(4, 'แอลกอฮอล์', 'Alcohol', 'expend', -1, 3),
(5, 'น้ำอัดลม', 'sparkling water', 'expend', -1, 3),
(6, 'ชา, กาแฟ', 'Tea, Coffee', 'expend', -1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `db_tags_custom`
--

CREATE TABLE IF NOT EXISTS `db_tags_custom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `category` varchar(128) NOT NULL,
  `detail` varchar(256) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `child` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `db_tags_custom`
--

INSERT INTO `db_tags_custom` (`id`, `id_user`, `name`, `category`, `detail`, `parent_id`, `child`) VALUES
(1, 3, 'ค่าเดินทาง', 'expend', 'xxxx', 0, 0),
(3, 3, 'ค่าน้ำมัน', 'expend', 'ptt', 1, 0),
(4, 3, 'ค่ารถเมล์', 'expend', '', 1, 0),
(5, 3, 'รับจ้าง', 'expend', '', 0, 0),
(6, 3, 'มือปืน', 'expend', '', 5, 0),
(7, 3, 'จีบสาว', 'expend', '', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_travel`
--

CREATE TABLE IF NOT EXISTS `db_travel` (
  `id_travel` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_create` int(11) NOT NULL,
  `id_user_update` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `rating` int(11) NOT NULL,
  `create_post` datetime NOT NULL,
  `update_post` datetime NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id_travel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `db_travel`
--

INSERT INTO `db_travel` (`id_travel`, `id_user_create`, `id_user_update`, `title`, `content`, `rating`, `create_post`, `update_post`, `image`) VALUES
(7, 1, 0, 'rrroo', '12', 1, '0000-00-00 00:00:00', '2016-01-01 00:00:00', 'http://www.basic.dev/uploads/img/gallery/'),
(8, 3, 3, 'แหลมพรหมเทพ', 'หากใครไปภูเก็ตแล้วไม่ได้มาชมอาทิตย์ตกที่ แหลมพรหมเทพ ถือว่ามาไม่ถึง แหลมพรหมเทพจัดเป็นหนึ่งในจุดชมอาทิตย์ตกก่อนใครที่สวยที่สุดในเมืองไทย เป็นจุดชมวิวที่สวยงามของภูเก็ตอยู่ห่างจากหาดราไวย์ ประมาณ 2 กิโลเมตร เป็นแหลมที่อยู่ตอนใต้สุดของเกาะภูเก็ต ชาวบ้านเรียกว่าแหลมเจ้า มีลักษณะเป็นแหลมโค้งไล่ระดับทอดตัวสู่ท้องทะเล รอบข้างแวดล้อมด้วยต้นตาลที่ขึ้นแทรกอยู่เรียงราย สามารถเดินไปจนถึงปลายแหลมได้ มองเห็นน้ำทะเลสีเขียวมรกต และสามารถเห็นเกาะแก้วอยู่ด้านหน้าแหลม ส่วนด้านซ้ายจะมองเห็นหาดในยะซึ่งเป็นหาดเล็กๆ ทางขวาจะเห็นแนวหาดทรายของหาดในหาน  นักท่องเที่ยวไม่ว่าจะเที่ยวหรือพักที่หาดใด พอช่วงใกล้เย็นพากันมาชมพระอาทิตย์ตกที่แหลมพรหมเทพ หากมาเที่ยวในวันที่อากาศดี ท้องฟ้าเปิด มีเมฆน้อย บรรยากาศพระอาทิตย์ตกที่แหลมพรหมเทพจะสวยงามมาก หากมาในฤดูร้อนมีทุ่งหญ้าสีทองขึ้นปกคลุมสวยงามมาก มองเห็นเกาะแก้วน้อย เกาะแก้วใหญ่และเกามัน ส่วน ในฤดูฝนจะเป็น เป็นสีเขียวรอบๆ แหลมพรหมเทพเป็นโขดหินขนาดใหญ่ยามคลื่นลมแรงจะเห็นฟองคลื่นสีขาวกระทบโขดหินซึ่งสวยงามมาก  นอกจากนั้นยังมี “ประภาคารกาญจนาภิเษก แหลมพรหมเทพ” สร้างขึ้นในวโรกาสที่พระบาทสมเด็จพระเจ้าอยู่หัวฉลองสิริราชสมบัติครบ 50 ปี มีขนาดความกว้างที่ฐาน 9 เมตร สูง 50 ฟุต และแสงไฟจากโคมไฟจะมองเห็นไกลถึง 39 กิโลเมตร ภายในประภาคารมีการแสดงนิทรรศการเกี่ยวกับการสร้างประภาคาร การรักษาเวลามาตรฐาน การคำนวณ และแสดงเวลาดวงอาทิตย์ขึ้นและตก จากบนยอดของประภาคารยังเป็นจุดชมวิว', 4, '0000-00-00 00:00:00', '2016-02-26 09:56:08', '20160209-091714-20150106_dybyqdjx.jpg'),
(9, 3, 3, 'หาดป่าตอง', 'ถ้าพูดถึง ‘หาดป่าตอง’ เชื่อว่า...คงไม่มีใครไม่รู้จักชายหาดที่สวยที่สุดของภูเก็ต ที่นี่โด่งดังไปทั่วโลกจนนักท่องเที่ยวทั้งไทยและต่างชาติหลั่งไหลกันมาเยี่ยมชม ความงามจากหาดทรายขาวละเอียด น้ำทะเลสีฟ้าใส และเสน่ห์อันเป็นเอกลักษณ์ที่ไม่เหมือนใคร แถมยังเป็นศูนย์', 4, '0000-00-00 00:00:00', '2016-02-26 09:56:02', '20160209-105521-หาดป่าตอง.jpg'),
(10, 3, 3, 'ปากเกร็ด', 'เป็ดกาก', 3, '2016-02-10 11:04:33', '2016-02-10 11:04:33', '20160210-110433-1418178930-1040910071-o.jpg'),
(11, 3, 3, ' อดีตดาวรุ่งผีไล่อัด"ปรัชญา"ตัวสร้างความแตกแยก', 'ไรอัน แม็คคอนเนลล์อดีตดาวรุ่งของ"ปีศาจแดง"แมนเชสเตอร์ ยูไนเต็ดออกมาแสดงความคิดเห็นว่าหลุยส์ ฟาน ฮาลเทรนเนอร์ดัตช์แมนคือคนที่ทำให้เกิดความแตกแยกภายในทีม\r\n\r\nดาวเตะวัย 20 ปีเคยลงเล่นที๋โอลด์ แทร็ฟฟอร์ดนาน 3 ฤดูกาลก่อนเซ็นสัญญาไปอยู่กับสโมสรฟินน์ ฮาร์ปส์ในไอร์แลนด์ พรีเมียร์ ดิวิชั่นเมื่อช่วงซัมเมอร์ที่แล้ว\r\n\r\nทั้งนี้แม็คคอนเนลล์ได้ออกมาแสดงความคิดเห็นถึงต้นสังกัดเก่าว่าฟาน ฮาลได้สร้างผลกระทบในเชิงลบต่อทีมเมื่อพูดถึงความสัมพันธ์ของบรรดานักเตะในสโมสร\r\n\r\n"ในปีสุดท้ายของผมที่นั่นภายใต้การทำทีมของฟาน ฮาล มันมีความแตกแยกมากๆและคุณไม่สามารถเข้าไปหานักเตะซีเนียร์ได้เลย"แม็คคอนเนลล์กล่าว\r\n\r\n"มันไม่มีความรู้สึกเหมือนกับเป็นครอบครัวอีกแล้ว"\r\n\r\n"ตอนที่เฟอร์กี้อยู่ที่นั่น มันสุดยอดมาก ทุกคนอยู่รวมกัน ทุกคนพูดคุยกันและไม่มีใครใหญ่กว่าใคร"', 5, '2016-02-26 09:57:02', '2016-02-26 09:57:02', '20160226-095702-2FB493FE00000578-0-image-a-2_1451668412655.jpg'),
(12, 3, 3, 'ผมนี่อึ้งเลย!LVGทึ่งมหัศจรรย์''แรชฟอร์ด'',ลุ้น"มาเที่ยว"บู๊ปืน', 'หลุยส์ ฟาน ฮาล กุนซือจอมปรัชญาทีมแมนเชสเตอร์ ยูไนเต็ดเป็นปลื้มหลังเหล่านักเตะโชว์ฟอร์มสุดอลังการแซงรัวถล่ม มิดทิลแลนด์ 5-1 พร้อมชื่นชมเจ้าหนู มาร์คัส แรชฟอร์ด ประเดิมชุดใหญ่แจ้งเกิดได้อย่างสวยสดงดงาม\r\n\r\nนัดนี้เหมือนฟ้าลิขิต อองโตนี่ มาร์กซิยาล ดันเจ็บระหว่างอบอุ่นร่างกายทำให้ ฟาน ฮาล จึงตัดสินใจเปิดโอกาส แรชฟอร์ด เจ้าหนูวัยทีน 18 ปีลงเล่นเป็นครั้งแรกและกลายเป็นผู้พลิกสถานการณ์จากที่สกอร์ยังเสมอ 1-1 รับเหมา 2 เม็ดรวดพลิกแซง 3-1 ตามด้วย อังเดร เอร์เรร่า กับ เมมฟิส เดปาย ปิดท้าย\r\n\r\n"ฟอร์มของ แรชฟอร์ด เหลือเชื่อเลยล่ะ" อดีตเทรนเนอร์ทีมชาติเนเธอร์แลนด์ตอบผ่านสำนักข่าวชื่อดังแห่งเกาะอังกฤษ บีที สปอร์ต ถามถึงฟอร์มของเจ้าหนูคนนี้\r\n\r\n"ครึ่งแรกเขาวิ่งตรงบริเวณเส้นข้างเยอะเกินไปและผมบอกเจ้าหนูคนนี้ให้เปลี่ยนมาวิ่งแถวๆหน้าเขตโทษให้มากขึ้นแล้วคุณจะยิงประตูได้เอง"\r\n\r\n"เขาทำตามที่ผมบอก เขายิงได้ 2 ประตู ดังนั้นต้องบอกเลยว่ามันเป็นฟอร์มมหัศจรรย์สำหรับเขา"\r\n\r\nอย่างไรก็ตามเมื่อถามถึงอาการบาดเจ็บของ มาร์กซิยาล นั้น ฟาน ฮาล ยันไม่เจ็บหนักที่ถอดออกก็คือป้องกันไว้ก่อนและหวังว่าจะฟิตทันเกมบิ๊กแมตช์กับ อาร์เซนอล วันอาทิตย์นี้\r\n\r\n"เรายังเหลือเวลาอีก 2 วันก่อนเจอ อาร์เซนอล นักเตะของคุณมีเวลาฟื้นตัวแต่เราหาทางรับมือได้"\r\n\r\n"เพราะฉะนั้นผมหวังว่าเมื่อเราเล่นกับ อาร์เซนอล ผมหวังมันจะเป็นเกมที่ดีมากๆ"', 5, '2016-02-26 09:58:10', '2016-02-26 09:58:10', '20160226-095810-4e6fdd9e-0c93-4826-acd6-5365957f8ddf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `db_url`
--

CREATE TABLE IF NOT EXISTS `db_url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `realpath` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `url` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pagetitle` text CHARACTER SET utf8 COLLATE utf8_bin,
  `keywords` text CHARACTER SET utf8 COLLATE utf8_bin,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin,
  `editable` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4579 ;

--
-- Dumping data for table `db_url`
--

INSERT INTO `db_url` (`id`, `realpath`, `url`, `pagetitle`, `keywords`, `description`, `editable`) VALUES
(4569, 'board/forum', 'forum', 'เว็บบอร์ด', 'WTF', 'WTF', 1),
(4571, 'site/pwreset', 'pwreset', '', '', '', 1),
(4572, 'wonder/index', 'index', '', '', '', 1),
(4573, 'wonder/report', 'report', NULL, NULL, NULL, 1),
(4574, 'site/contact', 'contact', '', '', '', 1),
(4575, 'site/login', 'login', '', '', '', 1),
(4576, 'site/signup', 'signup', '', '', '', 1),
(4577, 'site/resetpassword', 'resetpw', '', '', '', 1),
(4578, 'wonder/banned', 'banned', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE IF NOT EXISTS `db_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rank` int(11) NOT NULL,
  `exp` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_bin NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_bin NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `nickname` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `post_point` int(11) NOT NULL,
  `permission` int(11) NOT NULL,
  `zeny` double NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image_crop` varchar(255) CHARACTER SET utf8 NOT NULL,
  `notify` int(11) NOT NULL,
  `resetpw_r` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `resetpw_l` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `ip` varchar(128) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=49 ;

--
-- Dumping data for table `db_user`
--

INSERT INTO `db_user` (`id`, `id_rank`, `exp`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `nickname`, `status`, `created_at`, `updated_at`, `post_point`, `permission`, `zeny`, `image`, `image_crop`, `notify`, `resetpw_r`, `resetpw_l`, `ip`) VALUES
(1, 13, 12000, 'admin', 'TuInF_0DSmR4owmUbVPaDY2pz4gA_E4V', '$2y$13$/Vuk9cbqAGCnVtVFbSxrQO6ZVYyy5Um4vIahjaH2BBUJABWJBfa6C', 'N3s0mrWx0xi3UbAP9GwaOtR72zPaOGuv_1429870824', 'wonderkide3.sos@gmail.com', 'ฮะฮ่าโย่ว', 10, 1429870824, 1479900027, 130, 100, 0, '/uploads/img/profile/memo/20160922-041701-3431580-22751_one_piece_luffy__one_piece.jpg', '/uploads/img/profile/20160922-041710-1.jpg', 0, NULL, NULL, ''),
(2, 1, 0, 'moderator', 'cGmzysq2oZHbHfIwHWHDnfRwWLZydanQ', '$2y$13$FwmIpHwfh4pIk.qpVKD.AOy6OqZzbgcROh2evP/dXWcnWQkujipo6', 'NjYiySpft9voBJ_stGQj8ACM_rF-SSU9_1473923671', 'moderator@doofootball.com', NULL, 10, 1429870833, 1473923671, 110, 100, 0, '', '', 0, NULL, NULL, ''),
(3, 1, 100, 'wtf', 'kaLC5HThuOQK1fhpk_7IN0fOKGCyNwvR', '$2y$13$MsNdCkcYFxLzIqhd/nDJKuTxjH.PiFG9uUvWkutSbLoQVAghyd6TC', 'oYtT1KydgYE3nq1fqlKj8Xf8coVm-kJL_1484300307', 'wonderkide.sos@gmail.com', 'GGWP', 10, 1453787396, 1484300307, 107, 100, 100003567.71685, '/uploads/img/profile/memo/20160330-111457-mario-gotze-bayern_h0bta5fm4a6g1xuqrjqfmkv2w.jpg', '/uploads/img/profile/20160330-111513-3.jpg', 0, 'Ch_h9P2VPr65Y6W8awB1EP', 'd6dOZ9cEvelJoXjanhbliW', ''),
(4, 1, 0, 'test2', 'CbnR7YA7xd6VRIWq37cVOKDMJyCA_Utk', '$2y$13$coNkj4XAuX0KXtEvL7K.luXaUKi4F8jcA3/7Mhqb4X43.r2NpX29m', 'P9_SFrbD1QpbAeF81ZBpemUIuFORxo4C_1453974486', 'test28@gmail.com', 'คริสเตียน', 10, 1453974486, 1453974486, 110, 1, 0, '', '', 0, NULL, NULL, ''),
(7, 1, 0, 'save', 'uZyzngwQb1Ch7_JiBoVjXvG78iigz5s-', '$2y$13$IEUqVO70AVeb24tW0yKWEuGB3jvmLTWbNqk3i3OqPWPWQx9l/gP2y', 'oeqfrxn7rpdm8ujrdIRPyLYxS57xSQeD_1454490387', 'save@mail.com', 'adm', 10, 1454490387, 1454490387, 110, 1, 0, '', '', 0, NULL, NULL, ''),
(8, 1, 0, '111111', 'WR26g5QBqaNlVZAYHL1MjacLYF3pe7su', '$2y$13$9QxNaa0opn9fefScnzLdAeBaMw93R.QT9Lm.W09pbl4hUEEp0roPK', 'XQanJJDeZ9DdrFs5ggXmKxiKE-TXFkMp_1454490575', '11111@1.com', NULL, 10, 1454490575, 1454490575, 110, 1, 0, '', '', 0, NULL, NULL, ''),
(10, 1, 0, '191', '5bZfjrPm2d6p21NHzwqzCMuK5trrK7P8', '$2y$13$vxP.okc2f09w0xmBNctHfu77N8iv0HO/omPJcLlKBt9vT7Cgj/HCm', 'kWaDuBsMqJU_hY7EgvkM11jZZdWsjj0I_1454497502', '191@191.com', NULL, 10, 1454497502, 1454497502, 110, 1, 0, '', '', 0, NULL, NULL, ''),
(13, 1, 0, 'test', 'DusqBotrQbma3fveuctG4T6G9sRL25x1', '$2y$13$UYoF7Hi4y8JTJA.pJ9p8..XHKdCeULEkOEGXnxeP/GSX7gPzFDCzG', 'nTl1BFXe_NiByJVvuwHYUu18BmFm0JMQ_1455007268', 'test21@gmail.com', NULL, 10, 1454500173, 1455007268, 110, 1, 0, '', '', 0, NULL, NULL, ''),
(16, 1, 1, 'ronaldo', 'pP6fOV4h6H6CET8IxaGtoukJa_m_MqWM', '$2y$13$fNMaIFeLyH/nMYQgCD2By.swsU2abbHazFliGLMahR0abc55zOmvu', 'xSoRPGmjFYKw2mgQ5jL2rmA0whlG0uYF_1455007384', 'ronaldo@g.com', '', 10, 1455007384, 1481010461, 86, 1, 0, '/uploads/img/profile/memo/20161109-071822-CR7-MANDEM.jpg', '/uploads/img/profile/20161109-071839-16.jpg', 0, 'RQK-RCt8HZg8zlDf1MTW93', 'QjtppJdWKxF-Xoo18ltXOv', ''),
(17, 2, 200, 'limbiz', 'Yzg6HYbWjnh-Y3Au-bFVEy9f9QovUwE_', '$2y$13$SYxO5qOF00hqf0ktPzojg.RvsprFA1L5nkOuYCfJ27nXphYO.A2Wa', 'q_qPt8MCey528jioP6NDexbYE1ErYsDP_1457194920', 'lim@gmail.com', NULL, 10, 1457194920, 1458893027, 110, 1, 10000, '/uploads/img/profile/memo/20160325-030336-20160314113220_alexfergusonmanchesterunitedvstokecityrvu5r67dmzcl.jpg', '/uploads/img/profile/20160325-030347-17.jpg', 0, NULL, NULL, ''),
(18, 1, 199, 'user', '-mBeojGJOIZ0OE7w2JQ6OUmgA2bCxdG6', '$2y$13$Hm5SNJcbnkeVjQ6LwVCtn.eqaa54RkxdkPYvjxP0SF6Au74PjvYwO', 'HMsC4KLwSvXoOjykrsyxX_jgssJmAwGW_1473923749', 'test2@gmail.com', NULL, 10, 1473923749, 1473923749, 110, 100, 10000, '', '', 0, NULL, NULL, ''),
(41, 1, 0, 'rooney', 'XJAsKtyzW4pD6vaLSqEMJNFHkVJuotz-', '$2y$13$iVR4I8zdZ4odQFr4zwFnoO8TzK02PVJtPIC/6FVF80pw.TRDqN0Xy', 'rosID5NmoSHE3PiGAmPV-goeg3XA3u7U_1479729489', 'wonderkide8.sos@gmail.com', NULL, 10, 1479729489, 1479729489, 110, 1, 10000, '', '', 0, 'tgfOH7FGCv1teUmLaTAcGs', 'U5bfO_3XXnNoxX9_H7Xor5', '127.0.0.1'),
(42, 1, 0, 'trststs', 'Zxqa_EkCTSCeDppwAN6A2NoGDmpM6PMh', '$2y$13$MaGXKhT5enUTx/NEJLS4fO6yVKpigmqNt2qtp1Lb8jjoYhnOxRRga', 'GoIKw8xaJ-ADF_qUN2zbc75cFXbPHnak_1480997662', 'ff@fdas.com', NULL, 10, 1480997662, 1480997662, 110, 1, 10000, '', '', 0, NULL, NULL, '127.0.0.1'),
(43, 1, 0, 'supertest8', 'YDhuyofXjN-pszZx8kkyoFxDnDzqPTdk', '$2y$13$nlwKN/tGMFlw88tzKN4nQekXRneQ6aOnAn8lBaC5n9TZUagLI57CS', '8GjZvqKYE4wKnTf7UtiPx_fOzgJRlKEK_1481871162', 'g@g.com', NULL, 10, 1481871162, 1481871162, 20, 1, 10000, '', '', 0, NULL, NULL, '127.0.0.1'),
(44, 1, 0, 'fast123456', 'OEuIURYbGOgZGXVOw8OO6ixP4jH_oUGX', '$2y$13$W6702Bf4sw/vXlYei3JBeuRp20ZY14wJmTk0kPFe0aUHyR4iOJLyq', 'FHzuwFDcIvQy9vqtC_gRQWH6sEDqZXc0_1481880048', 'sda@g.com', NULL, 10, 1481880048, 1481880048, 20, 1, 10000, '', '', 0, NULL, NULL, '127.0.0.1'),
(45, 1, 0, 'test123456', '-PB1_dSfTCpWcL5tnxYT6LfTk8pdZRdW', '$2y$13$xo8OFYOOLaSyut4c3UFrSOa/0f3yL9SAZKJht4OOBA0kWTtcDsYDm', 'h7uD_rkdHXi1tqX_hN7FJBltOl75rkKk_1481883021', 'aaass@gmail.com', NULL, 10, 1481883021, 1481883021, 20, 1, 10000, '', '', 0, NULL, NULL, '127.0.0.1'),
(46, 1, 0, 'adadsdadsa', 'I81ORtRFcdCvY3bc4y_NaVCVEagAl1cM', '$2y$13$IT1GCDsYW3wPtA/CyAM3su1wO6ac23X8QhRSUhHASEXOhAUIjso16', 'yiutsAmOF98oW3_6QnfY1Wkt_rhJ0qW8_1481883356', 'fa@a.com', NULL, 10, 1481883356, 1481883356, 20, 1, 10000, '', '', 0, NULL, NULL, '127.0.0.1'),
(47, 1, 0, 'tetstssda', 'LQLE_aFXZ03jFCwNQbIgjM1gFtiEmSRu', '$2y$13$x904liVH3IxoXWP1WANnZeTrozJxVz/Ynl6UzTtt9xATrzTj2y6Wm', 'YTQbmVvZn87nqLgXbLtk0l0lOINj9Ju-_1481883698', 's@a.com', NULL, 10, 1481883698, 1481883698, 20, 1, 10000, '', '', 0, NULL, NULL, '127.0.0.1'),
(48, 1, 0, 'gggggg', 'SzLeODuS3dR3ULyUWzZ5Dwg9LmTtql5A', '$2y$13$R7vZI0CwqtYanNq6/zVe7.QG3vlGAO5fwneIY/Y6ZzYfVD4Wu4NLS', 'K5XbOVskxfazCtpFCsjT5WSJ7q4Ko1vA_1485423553', 'gg@g.com', NULL, 10, 1485423553, 1485423553, 20, 1, 10000, '', '', 0, NULL, NULL, '127.0.0.1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

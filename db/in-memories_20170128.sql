-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2017 at 11:55 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `basic_live2`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- Dumping data for table `db_league`
--

INSERT INTO `db_league` (`id_league`, `league_name_en`, `league_name_th`, `api_get_match`, `api_get_scores`, `link_get_odds`, `link_get_scores`, `link_get_topscore`, `link_get_fixt`, `link_get_result`, `link_get_result_sub`, `league_img`, `active`) VALUES
(1, 'English Premier League', 'พรีเมียร์ลีก', 1, 4, 'http://www.odds88.com/index.php?league=20', 'http://www.espnfc.com/barclays-premier-league/23/table', 'http://www.espnfc.com/barclays-premier-league/23/statistics/scorers', 'http://www.bbc.co.uk/sport/football/fixtures/partial/competition-118996114?structureid=5', 'http://www.bbc.co.uk/sport/football/results/partial/competition-118996114?structureid=5', 'http://www.espnfc.us/barclays-premier-league/23/scores', 'premier.png', 1),
(2, 'La Liga Spain', 'ลาลีก้า', 1, 4, 'http://www.odds88.com/index.php?league=31', 'http://www.espnfc.com/spanish-primera-division/15/table', 'http://www.espnfc.com/spanish-primera-divisi%C3%B3n/15/statistics/scorers', 'http://www.bbc.co.uk/sport/football/fixtures/partial/competition-119001074?structureid=6', 'http://www.bbc.co.uk/sport/football/results/partial/competition-119001074?structureid=6', 'http://www.espnfc.us/spanish-primera-division/15/scores', 'laliga.png', 1),
(3, 'Bundesliga', 'บุนเดสลีกา', 1, 4, 'http://www.odds88.com/index.php?league=6', 'http://www.espnfc.com/german-bundesliga/10/table', 'http://www.espnfc.com/german-bundesliga/10/statistics/scorers', 'http://www.bbc.co.uk/sport/football/fixtures/partial/competition-119000986?structureid=6', 'http://www.bbc.co.uk/sport/football/results/partial/competition-119000986?structureid=6', 'http://www.espnfc.us/german-bundesliga/10/scores', 'bundesliga.png', 1),
(4, 'Calcio Serie A', 'กัลโช่ เซเรีย เอ', 1, 4, 'http://www.odds88.com/index.php?league=65', 'http://www.espnfc.com/italian-serie-a/12/table', 'http://www.espnfc.com/italian-serie-a/12/statistics/scorers', 'http://www.bbc.co.uk/sport/football/fixtures/partial/competition-119001017?structureid=6', 'http://www.bbc.co.uk/sport/football/results/partial/competition-119001017?structureid=6', 'http://www.espnfc.us/italian-serie-a/12/scores', 'calcio.png', 1),
(5, 'France Ligue 1', 'ลีคเอิง', 1, 4, 'http://www.odds88.com/index.php?league=23', 'http://www.espnfc.com/french-ligue-1/9/table', 'http://www.espnfc.com/french-ligue-1/9/statistics/scorers', 'http://www.bbc.co.uk/sport/football/fixtures/partial/competition-119000981?structureid=6', 'http://www.bbc.co.uk/sport/football/results/partial/competition-119000981?structureid=6', 'http://www.espnfc.us/french-ligue-1/9/scores', 'france.png', 0),
(6, 'Thai Premier League', 'ไทยพรีเมียร์ลีก', 2, 2, 'http://www.odds88.com/index.php?league=72', 'http://thaipremierleague.co.th/2015/tpl2015_Table.php', 'http://thaipremierleague.co.th/2015/tplscorers.php', 'http://thaipremierleague.co.th/tpl2014Table.php', 'http://thaipremierleague.co.th/tpl2014Table.php', 'http://www.espnfc.us/thai-premier-league/2341/scores', 'thaipremier.png', 0),
(7, 'UEFA Champions League', 'ยูฟ่า แชมเปี้ยนส์ลีก', 1, 1, 'http://www.odds88.com/index.php?league=186', 'http://www.bbc.co.uk/sport/football/tables/partial/118999958?structureid=6', 'none', 'http://www.bbc.co.uk/sport/football/fixtures/partial/competition-118999958?structureid=6', 'http://www.bbc.co.uk/sport/football/results/partial/competition-118999958?structureid=6', 'http://www.espnfc.us/uefa-champions-league/2/scores', 'championsleague.png', 0),
(8, 'UEFA Europa League', 'ยูโรปา ลีก', 1, 1, 'http://www.odds88.com/index.php?league=222', 'http://www.bbc.co.uk/sport/football/tables/partial/118999989?structureid=6&dateTimeNow=20130912', 'none', 'http://www.bbc.co.uk/sport/football/fixtures/partial/competition-118999989?structureid=6', 'http://www.bbc.co.uk/sport/football/results/partial/competition-118999989?structureid=6', 'http://www.espnfc.us/uefa-europa-league/2310/scores', 'europaleague.png', 0),
(9, 'FIFA World Cup', 'ฟุตบอลโลก', 1, 3, '', 'http://www.fifa.com/worldcup/groups/index.html', 'http://www.espnfc.com/fifa-world-cup/4/statistics/scorers', 'http://www.bbc.com/sport/football/fixtures/partial/competition-119001880?structureid=6', 'http://www.bbc.com/sport/football/results/partial/competition-119001880?structureid=6\r\n', 'http://www.espnfc.us/fifa-world-cup/4/scores', 'fifa.png', 0),
(10, 'UEFA Euro', 'ฟุตบอลยูโร', 1, 5, 'http://www.odds88.com/index.php?league=1044', 'http://www1.skysports.com/football/competitions/european-qualifiers/table', 'none', 'http://www.bbc.com/sport/football/fixtures/partial/competition-119002036?structureid=6', 'http://www.bbc.com/sport/football/results/partial/competition-119002036?structureid=6', 'http://www.espnfc.us/european-championship/74/scores', 'euro.png', 0),
(11, 'English Championship', 'แชมเปียนชิป อังกฤษ', 0, 0, 'http://www.odds88.com/index.php?league=286', 'none', 'none', 'none', 'none', 'http://www.espnfc.us/english-league-championship/24/scores', '-', 0),
(12, 'English FA Cup', 'เอฟเอ คัพ', 0, 0, 'http://www.odds88.com/index.php?league=385', '', '', '', '', 'http://www.espnfc.us/english-fa-cup/40/scores', '-', 0);

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
(1, 1, 1, 'Manchester City', 4, 2, 0, 0, 5, 2, 2, 0, 0, 6, 2, '7', 12, '-', 1, 'Z', '2015-2016'),
(2, 1, 2, 'Chelsea', 4, 2, 0, 0, 5, 2, 1, 1, 0, 4, 2, '5', 10, '-', 1, 'Z', '2015-2016'),
(3, 1, 3, 'Everton', 4, 2, 0, 0, 5, 2, 1, 1, 0, 2, 0, '5', 10, '-', 1, 'Z', '2015-2016'),
(4, 1, 4, 'Manchester United', 4, 2, 0, 0, 5, 2, 1, 0, 1, 2, 1, '4', 9, '-', 1, 'Z', '2015-2016'),
(5, 1, 5, 'Tottenham Hotspur', 4, 2, 0, 0, 5, 2, 0, 2, 0, 2, 0, '5', 8, '-', 1, 'Z', '2015-2016'),
(6, 1, 6, 'Liverpool', 4, 2, 0, 0, 5, 2, 0, 1, 1, 4, 5, '2', 7, '-', 1, 'Z', '2015-2016'),
(7, 1, 7, 'Arsenal', 4, 2, 0, 0, 5, 2, 0, 1, 1, 3, 4, '2', 7, '-', 1, 'Z', '2015-2016'),
(8, 1, 8, 'Hull City', 4, 2, 0, 0, 5, 2, 0, 1, 1, 0, 1, '2', 7, '-', 1, 'Z', '2015-2016'),
(9, 1, 9, 'Middlesbrough', 4, 2, 0, 0, 5, 2, -1, 2, 1, -1, 2, '0', 5, '-', 1, 'Z', '2015-2016'),
(10, 1, 10, 'Watford', 4, 2, 0, 0, 5, 2, -1, 1, 2, 2, 6, '-1', 4, '-', 1, 'Z', '2015-2016'),
(11, 1, 11, 'Crystal Palace', 4, 2, 0, 0, 5, 2, -1, 1, 2, -2, 2, '-1', 4, '-', 1, 'Z', '2015-2016'),
(12, 1, 12, 'West Bromwich Albion', 4, 2, 0, 0, 5, 2, -1, 1, 2, -3, 1, '-1', 4, '-', 1, 'Z', '2015-2016'),
(13, 1, 13, 'Swansea City', 4, 2, 0, 0, 5, 2, -1, 1, 2, -1, 4, '-2', 4, '-', 1, 'Z', '2015-2016'),
(14, 1, 14, 'AFC Bournemouth', 4, 2, 0, 0, 5, 2, -1, 1, 2, -2, 3, '-2', 4, '-', 1, 'Z', '2015-2016'),
(15, 1, 15, 'Burnley', 4, 2, 0, 0, 5, 2, -1, 1, 2, -2, 3, '-2', 4, '-', 1, 'Z', '2015-2016'),
(16, 1, 16, 'Leicester City', 4, 2, 0, 0, 5, 2, -1, 1, 2, -1, 5, '-3', 4, '-', 1, 'Z', '2015-2016'),
(17, 1, 17, 'West Ham United', 4, 2, 0, 0, 5, 2, -1, 0, 3, 0, 7, '-4', 3, '-', 1, 'Z', '2015-2016'),
(18, 1, 18, 'Southampton', 4, 2, 0, 0, 5, 2, -2, 2, 2, -2, 4, '-3', 2, '-', 1, 'Z', '2015-2016'),
(19, 1, 19, 'Sunderland', 4, 2, 0, 0, 5, 2, -2, 1, 3, -2, 6, '-5', 1, '-', 1, 'Z', '2015-2016'),
(20, 1, 20, 'Stoke City', 4, 2, 0, 0, 5, 2, -2, 1, 3, -3, 8, '-8', 1, '-', 1, 'Z', '2015-2016'),
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
(1, 1, 1, 'Harry Kane', 'Tottenham Hotspur', 22, '2015-2016'),
(2, 1, 2, 'Jamie Vardy', 'Leicester City', 19, '2015-2016'),
(3, 1, 3, 'Romelu Lukaku', 'Everton', 18, '2015-2016'),
(4, 1, 4, 'Sergio Agüero', 'Manchester City', 17, '2015-2016'),
(5, 1, 5, 'Riyad Mahrez', 'Leicester City', 16, '2015-2016'),
(6, 1, 6, 'Odion Ighalo', 'Watford', 14, '2015-2016'),
(7, 1, 7, 'Olivier Giroud', 'Arsenal', 12, '2015-2016'),
(8, 1, 8, 'Jermain Defoe', 'Sunderland', 12, '2015-2016'),
(9, 1, 9, 'Diego Costa', 'Chelsea', 11, '2015-2016'),
(10, 1, 10, 'Gylfi Sigurdsson', 'Swansea City', 10, '2015-2016'),
(11, 1, 11, 'Marko Arnautovic', 'Stoke City', 10, '2015-2016'),
(12, 1, 12, 'Troy Deeney', 'Watford', 9, '2015-2016'),
(13, 1, 13, 'Dimitri Payet', 'West Ham United', 9, '2015-2016'),
(14, 1, 14, 'Georginio Wijnaldum', 'Newcastle United', 9, '2015-2016'),
(15, 1, 15, 'Graziano Pellé', 'Southampton', 9, '2015-2016'),
(16, 1, 16, 'Andre Ayew', 'Swansea City', 8, '2015-2016'),
(17, 1, 17, 'Roberto Firmino', 'Liverpool', 8, '2015-2016'),
(18, 1, 18, 'Anthony Martial', 'Manchester United', 8, '2015-2016'),
(19, 1, 19, 'Ross Barkley', 'Everton', 8, '2015-2016'),
(20, 1, 20, 'Aleksandar Mitrovic', 'Newcastle United', 8, '2015-2016'),
(21, 1, 21, 'Alexis Sánchez', 'Arsenal', 8, '2015-2016'),
(22, 1, 22, 'Christian Benteke', 'Liverpool', 7, '2015-2016'),
(23, 1, 23, 'Philippe Coutinho', 'Liverpool', 7, '2015-2016'),
(24, 1, 24, 'Salomon Rondon', 'West Bromwich Albion', 7, '2015-2016'),
(25, 1, 25, 'Shane Long', 'Southampton', 7, '2015-2016'),
(26, 1, 26, 'Dele Alli', 'Tottenham Hotspur', 7, '2015-2016'),
(27, 1, 27, 'Wayne Rooney', 'Manchester United', 7, '2015-2016'),
(28, 1, 28, 'Raheem Sterling', 'Manchester City', 6, '2015-2016'),
(29, 1, 29, 'Christian Eriksen', 'Tottenham Hotspur', 6, '2015-2016'),
(30, 1, 30, 'Yaya Touré', 'Manchester City', 6, '2015-2016'),
(31, 1, 31, 'Ayoze Pérez', 'Newcastle United', 6, '2015-2016'),
(32, 1, 32, 'Pedro', 'Chelsea', 6, '2015-2016'),
(33, 1, 33, 'Michail Antonio', 'West Ham United', 6, '2015-2016'),
(34, 1, 34, 'Bojan Krkic', 'Stoke City', 6, '2015-2016'),
(35, 1, 35, 'Manuel Lanzini', 'West Ham United', 6, '2015-2016'),
(36, 1, 36, 'Kevin De Bruyne', 'Manchester City', 6, '2015-2016'),
(37, 1, 37, 'Shinji Okazaki', 'Leicester City', 5, '2015-2016'),
(38, 1, 38, 'Juan Mata', 'Manchester United', 5, '2015-2016'),
(39, 1, 39, 'Dusan Tadic', 'Southampton', 5, '2015-2016'),
(40, 1, 40, 'Connor Wickham', 'Crystal Palace', 5, '2015-2016'),
(41, 1, 41, 'Mesut Özil', 'Arsenal', 5, '2015-2016'),
(42, 1, 42, 'Rudy Gestede', 'Aston Villa', 5, '2015-2016'),
(43, 1, 43, 'Nathan Redmond', 'Norwich City', 5, '2015-2016'),
(44, 1, 44, 'Jonathan Walters', 'Stoke City', 5, '2015-2016'),
(45, 1, 45, 'Yohan Cabaye', 'Crystal Palace', 5, '2015-2016'),
(46, 1, 46, 'Aaron Lennon', 'Everton', 5, '2015-2016'),
(47, 1, 47, 'Theo Walcott', 'Arsenal', 5, '2015-2016'),
(48, 1, 48, 'Bafetimbi Gomis', 'Swansea City', 5, '2015-2016'),
(49, 1, 49, 'Scott Dann', 'Crystal Palace', 5, '2015-2016'),
(50, 1, 50, 'Dieumerci Mbokani', 'Norwich City', 5, '2015-2016');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `db_tags`
--

INSERT INTO `db_tags` (`id_tag`, `name_th`, `name_en`, `category`, `group`, `parent_id`) VALUES
(1, 'รายรับ', 'in-come', 'expend', 0, 0),
(2, 'เงินเดือน', 'salary', 'expend', 0, 1),
(3, 'โบนัส', 'bonus', 'expend', 0, 1),
(4, 'โอที', 'OT', 'expend', 0, 1),
(5, 'รายได้พิเศษ', 'extra', 'expend', 0, 1),
(6, 'ค่าอาหาร', 'food', 'expend', 0, 0),
(7, 'อาหารหลัก', 'main', 'expend', 0, 6),
(8, 'อาหารเสริม', 'food', 'expend', 0, 6),
(9, 'ค่าเดินทาง', 'work', 'expend', 0, 0),
(10, 'ค่าน้ำมัน', 'oil', 'expend', 0, 9),
(11, 'ค่ารถประจำทาง', 'car', 'expend', 0, 9),
(12, 'ค่าใช้จ่ายภายในบ้าน', 'home', 'expend', 0, 0),
(13, 'ค่าน้ำ', 'water', 'expend', 0, 12),
(14, 'ค่าไฟ', 'e', 'expend', 0, 12),
(15, 'ค่าเน็ต', 'net', 'expend', 0, 12),
(16, 'เคเบิ้ลทีวี', 'cable', 'expend', 0, 12),
(17, 'ของใช้อื่นๆ', 'other', 'expend', 0, 12),
(18, 'ค่าใช้จ่ายอื่นๆ', 'other', 'expend', 0, 0),
(19, 'ค่าผ่อนบ้าน-รถ', 'p', 'expend', 0, 18),
(20, 'ค่าบัตรเครดิต', 'credit', 'expend', 0, 18),
(21, 'อื่นๆ', 'other', 'expend', 0, 18);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `db_user`
--

INSERT INTO `db_user` (`id`, `id_rank`, `exp`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `nickname`, `status`, `created_at`, `updated_at`, `post_point`, `permission`, `zeny`, `image`, `image_crop`, `notify`, `resetpw_r`, `resetpw_l`, `ip`) VALUES
(1, 11, 0, 'admin', 'aV2HuaT6VMGQTpK67ZCJzGkfMeV5jt4m', '$2y$13$O4NdS9wQr5VvVE4xjlFheOwuD9pJ4zGvIUJvK4Ik5cQzzTD/1ge82', 'gUHCS-25NDQ66exVQOqyvlJRYZVYT7-0_1481616016', 'wonderkide.sos@gmail.com', NULL, 10, 1481616017, 1481616017, 20, 100, 10000, '', '', 0, NULL, NULL, '127.0.0.1'),
(2, 13, 0, 'wonderkide', '7izyFgyw9rKm3AwiLtuSWFVjb7b4WRl3', '$2y$13$iZL6hDd38ckcDsu1ATmeGerTdpWpndLFuFk1GsKzj4BgOaQXza5Ci', 'ZVbBwutQC17OYsCixVOXzGLTjyTo8qxh_1481616170', 'wonderkide@in-memories.com', NULL, 10, 1481616170, 1481616170, 20, 100, 10000, '', '', 0, NULL, NULL, '127.0.0.1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

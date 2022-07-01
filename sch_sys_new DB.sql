-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2021 at 02:08 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sch_sys_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `agen_id` int(11) NOT NULL,
  `agen_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`agen_id`, `agen_name`) VALUES
(2, 'รัฐบาล.'),
(9, 'เอกชน'),
(10, 'สสวท');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_result`
--

CREATE TABLE `announcement_result` (
  `result_id` varchar(11) NOT NULL,
  `result_name` varchar(255) NOT NULL,
  `result_detail` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `main_scholar_id` varchar(11) NOT NULL,
  `adate` datetime NOT NULL,
  `addby` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement_result`
--

INSERT INTO `announcement_result` (`result_id`, `result_name`, `result_detail`, `file`, `main_scholar_id`, `adate`, `addby`) VALUES
('re95889948', 'asdasd', 'กหฟกหฟ', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/resultfile%2Fresult_1628159411?alt=media&token=aac905c6-8cdc-4064-b40d-99761cf3df32', 'sch35077004', '2021-08-05 17:30:12', 'st27777773');

-- --------------------------------------------------------

--
-- Table structure for table `anscom`
--

CREATE TABLE `anscom` (
  `Scom_id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `Scom_dt` varchar(250) NOT NULL,
  `cm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cm_id` int(11) NOT NULL,
  `cm_dt` varchar(2500) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `sch_id` varchar(11) NOT NULL,
  `Cm_Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cm_id`, `cm_dt`, `user_id`, `sch_id`, `Cm_Time`) VALUES
(192, '520', 'st63806496', 'sch35077004', '2021-08-18 19:02:17'),
(193, '60', 's76777504', 'sch35077004', '2021-08-18 19:02:32'),
(194, '60', 's76777504', 'sch35077004', '2021-08-18 19:02:33'),
(195, '80', 'st63806496', 'sch35077004', '2021-08-18 19:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `m_id` int(11) NOT NULL,
  `m_history` datetime NOT NULL,
  `msch_id` int(11) NOT NULL,
  `st_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `msch_table`
--

CREATE TABLE `msch_table` (
  `msch_id` varchar(11) NOT NULL,
  `msch_name` varchar(200) NOT NULL,
  `msch_detail` varchar(10000) NOT NULL,
  `msch_year` varchar(50) NOT NULL,
  `sch_type_id` int(11) NOT NULL,
  `ag_id` int(11) NOT NULL,
  `m_img` varchar(255) NOT NULL,
  `timeadd` datetime NOT NULL,
  `addby` varchar(11) NOT NULL,
  `lastupdate` datetime NOT NULL,
  `EditBy` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msch_table`
--

INSERT INTO `msch_table` (`msch_id`, `msch_name`, `msch_detail`, `msch_year`, `sch_type_id`, `ag_id`, `m_img`, `timeadd`, `addby`, `lastupdate`, `EditBy`) VALUES
('1', ' ทุนสำนักงานพัฒนาวิทยาศาสตร์และเทคโนโลยีแห่งชาติ (สวทช.)', 'โครงการทุนสถาบันบัณฑิตวิทยาศาสตร์และเทคโนโลยีไทย (Thailand Graduate Institute of Science and Technology: TGIST) โครงการทุนการศึกษาเพื่อวิทยานิพนธ์สำหรับนิสิต/นักศึกษาระดับปริญญาโทและปริญญาเอกสาขาวิทยาศาสตร์และเทคโนโลยี เพื่อผลิตบัณฑิตวิจัยคุณภาพสูง ภายใต้', '2564', 19, 2, 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/m_img%2Fms26859236_1628178091?alt=media&token=88045f76-ffd6-4cf1-826c-9580cd21f1da', '2021-08-05 23:51:16', 'st23987842', '2021-08-31 23:51:16', ''),
('3', 'ทุนมูลนิธิจรูญเอื้อชูเกียรติ', 'ทุนการศึกษาของมูลนิธิจรูญเอื้อชูเกียรติครอบคลุมการศึกษาสายสามัญในระดับมัธยมศึกษาตอนปลายถึงอุดมศึกษา (ปริญญาตรี) และการศึกษาสายวิชาชีพ ได้แก่ระดับ ปวช. และ ปวส. โดยทุนนี้เป็นทุนฟรีไม่มีเงื่อนไขคุณสมบัติทั่วไปของผู้รับทุนคือ เป็นผู้มีภูมิลำเนาอยู่นอกกรุงเทพ\', \'2564', '2564', 19, 9, 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/m_img%2Fms26859236_1628178091?alt=media&token=88045f76-ffd6-4cf1-826c-9580cd21f1da', '2021-07-21 23:54:48', 'st23987842', '2021-08-20 23:54:48', ''),
('4', 'ทุน ASEAN Scholarships', 'ASEAN Scholarships เป็นทุนการศึกษาระดับมัธยมที่มอบโดยกระทรวงศึกษาธิการจากประเทศสิงคโปร์ เพื่อเปิดโอกาสให้นักเรียนจากประเทศในอาเซียนได้เรียนต่อในสิงคโปร์ เมื่อเรียนจบแล้วจะได้รับวุฒิ Singapore-Cambridge General Certificate of Education Advanced Level (GCE A-Level)', '2564', 19, 9, 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/m_img%2Fms26859236_1628178091?alt=media&token=88045f76-ffd6-4cf1-826c-9580cd21f1da', '2021-07-14 23:56:46', 'st23987842', '2021-08-14 23:56:46', ''),
('ms25039872', 'ทุน ASEAN Scholarship จากกระทรวงศึกษาธิการประเทศสิงคโปร์\'', 'จะดีแค่ไหนถ้าเรามีโอกาสได้เรียนในโรงเรียนที่มีการศึกษาชั้นเลิศ พร้อมใช้ชีวิตวัยรุ่นทั้งในและนอกห้องเรียนร่วมกับเพื่อนๆ จาก 150 กว่าประเทศทั่วโลก! ขอพาทุกคนมารู้จักกับ United World College (UWC) องค์กรทางการศึกษาที่เปิดโอกาสให้นักเรียนอายุ 16-18 ปีจากทั่วทุกมุมโลก ได้มีโอกาสมาเรียนในระดับ International Baccalaureate (IB) ด้วยกันที่วิทยาลัย 18 แห่งทั่วโลก ไม่ว่าจะเป็นสาขาที่อเมริกา สวีเดน เยอรมนี ญี่ปุ่น และอีกมากมาย รวมถึงประเทศไทยเองด้วย ซึ่งโควตาโรงเรียนที่เปิดให้ทุนจะหมุนเวียนเปลี่ยนไปในแต่ละปี', '2562', 25, 9, 'https://c4.wallpaperflare.com/wallpaper/168/650/542/chainsaw-man-aki-hayakawa-hd-wallpaper-preview.jpg', '2021-08-05 12:25:27', 'st23987842', '0000-00-00 00:00:00', ''),
('ms26859236', 'ทุนการศึกษามูลนิธิยุวพัฒน์', 'นักเรียนฐานะยากจนที่กำลังเรียนอยู่มัธยมศึกษาชั้นปีที่ 1 (เฉพาะนักเรียนในโรงเรียนเครือข่ายโครงการร้อยพลังการศึกษาเท่านั้น) หรือ มัธยมศึกษาชั้นปีที่ 3 (นักเรียนที่เลือกเรียนต่อสายอาชีพเท่านั้น) สามารถสมัครเพื่อขอรับทุนการศึกษาต่อเนื่องจากมูลนิธิยุวพัฒน์ได้ โดยนักเรียนที่ได้รับคัดเลือกเป็นนักเรียนของมูลนิธิยุวพัฒน์จะได้รับทุนการศึกษาจนจบชั้นมัธยมศึกษาปีที่ 6 หรือ ปวช. 3', '2563', 26, 9, 'https://c4.wallpaperflare.com/wallpaper/168/650/542/chainsaw-man-aki-hayakawa-hd-wallpaper-preview.jpg', '2021-08-05 12:22:05', 'st23987842', '0000-00-00 00:00:00', ''),
('ms88884192', 'ทุนเรียนต่อต่างประเทศ และทุนระดับชั้น ม.ปลาย', 'Wesley College เป็นโรงเรียนประจำที่มีชื่อเสียงแห่งหนึ่งในออสเตรเลีย โดดเด่นในด้านวิชาการและกิจกรรม ท่ามกลางสภาพแวดล้อมที่สวยงามและสิ่งอำนวยความสะดวกที่ครบครันเหมาะแก่การเรียนรู้เป็นอย่างมาก', '2563', 21, 2, 'https://c4.wallpaperflare.com/wallpaper/168/650/542/chainsaw-man-aki-hayakawa-hd-wallpaper-preview.jpg', '2021-08-05 12:26:21', 'st23987842', '0000-00-00 00:00:00', ''),
('ms91436907', 'ทุนสำนักงานคณะกรรมการข้าราชการพลเรือน (สำนักงาน ก.พ.) 5 ', 'มีทุนการศึกษาสำหรับประชาชนทั่วไปอยู่หลากหลายประเภทด้วยกัน ซึ่งเยาวชนสามารถติดตามข่าวรับสมัครได้ ตัวอย่างทุนจากสำนักงาน ก.พ. เช่น ทุนในพระราชานุเคราะห์สมเด็จพระเทพรัตนราชสุดาฯ ทุนสำหรับผู้กำลังศึกษาระดับมัธยมศึกษา (ทุนศึกษาระดับปริญญาตรีขึ้นไป) ทุนรัฐบาลเพื่อดึงดูดผู้มีศักยภาพสูง (ทุน UIS) (ทุนศึกษาระดับ ปริญญาตรี ปีสุดท้าย และปริญญาโท) และ ทุนบุคคลทั่วไประดับปริญญา (ทุนศึกษาระดับปริญญาโทขึ้นไป)', '2564', 19, 10, 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/m_img%2Fms91436907_1628143034?alt=media&token=441573ad-89f6-4e9e-8b13-b300a3541f73', '2021-08-05 12:26:56', 'st23987842', '2021-08-05 12:57:15', 'st23987842');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `noti_id` int(11) NOT NULL,
  `scholar_id` varchar(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `fow_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`noti_id`, `scholar_id`, `student_id`, `fow_time`) VALUES
(119, 'sch35077004', 's76777504', '2021-08-13 18:20:53');

-- --------------------------------------------------------

--
-- Table structure for table `sch_type`
--

CREATE TABLE `sch_type` (
  `type_id` int(11) NOT NULL,
  `sch_typename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sch_type`
--

INSERT INTO `sch_type` (`type_id`, `sch_typename`) VALUES
(17, 'แจกฟรี3'),
(18, 'แจกฟรีสอง'),
(19, 'ทุนให้เปล่า'),
(20, 'ทุนกู้ยืม'),
(21, 'ทุนรางวัลผลการเรียนดี'),
(22, 'ทุนช่วยเหลือผู้ขาดแคลน'),
(23, 'ทุนส่งเสริมการศึกษาเฉพาะทาง'),
(24, 'ทุนสนับสนุนกิจกรรมเสริมหลักสูตร'),
(25, 'ทุนสำหรับผู้ด้อยโอกาสทางสังคมและวัฒนธรรม'),
(26, 'ทุนเงินยืมเพื่อการลงทุนพัฒนาบุคคล'),
(27, 'ทุนการศึกษาเพื่อส่งเสริมธุรกิจ');

-- --------------------------------------------------------

--
-- Table structure for table `staff_table`
--

CREATE TABLE `staff_table` (
  `st_id` varchar(11) NOT NULL,
  `st_title` varchar(10) NOT NULL,
  `st_fname` varchar(50) NOT NULL,
  `st_lname` varchar(50) NOT NULL,
  `st_tel` varchar(10) NOT NULL,
  `st_email` varchar(50) NOT NULL,
  `st_password` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL,
  `st_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_table`
--

INSERT INTO `staff_table` (`st_id`, `st_title`, `st_fname`, `st_lname`, `st_tel`, `st_email`, `st_password`, `status`, `st_img`) VALUES
('st23987842', 'ด.ญ.', 'Izumi', 'miyamura', '0910044851', 'fxcz.700@gmail.com', 'e4942f7821a41dccf6988af938ae69dd', 'อาจารย์', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st23987842%2Fst23987842_1616081174?alt=media&token=85d0d118-58f7-40e2-9dd6-a12963b5950d'),
('st27274527', 'ด.ช.', 'เฉลิมรัฐ', 'พรมสอาด', '0910044851', '614259007@gmail.com ', 'e4942f7821a41dccf6988af938ae69dd', 'อาจารย์', 'https://media1.tenor.com/images/2df7e3651741091c5e1b8f878e0f3bef/tenor.gif?itemid=13895878'),
('st27777773', 'ด.ช.', 'Thanapon', 'Jaitrong', '0910044851', 'fxcz.777@gmail.com', 'e4942f7821a41dccf6988af938ae69dd', 'อาจารย์', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1628228593?alt=media&token=30f95c2c-2aa4-462c-9350-2c064fa35467'),
('st46667599', 'นาย', 'sss', 'sss', '0910044851', 'sd@gmail.com', 'e4942f7821a41dccf6988af938ae69dd', 'อาจารย์', 'https://media1.tenor.com/images/2df7e3651741091c5e1b8f878e0f3bef/tenor.gif?itemid=13895878'),
('st63806496', 'ด.ช.', 'miku ', 'nakano', '0910044851', 'mxcz.777@gmail.com', 'e4942f7821a41dccf6988af938ae69dd', 'ผู้ดูแล', 'https://media1.tenor.com/images/2df7e3651741091c5e1b8f878e0f3bef/tenor.gif?itemid=13895878');

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `s_id` varchar(11) NOT NULL,
  `s_title` varchar(10) NOT NULL,
  `s_fname` varchar(50) NOT NULL,
  `s_lname` varchar(50) NOT NULL,
  `s_email` varchar(50) NOT NULL,
  `s_tel` char(10) NOT NULL,
  `s_class` varchar(20) NOT NULL,
  `grade` double NOT NULL,
  `s_password` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL,
  `s_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`s_id`, `s_title`, `s_fname`, `s_lname`, `s_email`, `s_tel`, `s_class`, `grade`, `s_password`, `status`, `s_img`) VALUES
('s00277456', 'นาย', 'เจษฎากร', 'โสดา', '614259006@webmail.npru.ac.th', '091-116-90', '6', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s00508657', 'นาย', 'ณัฐภูมิ', 'พันธ์มี', '624259013@hotmail.com', '091-116-90', '4', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s04076161', 'นาย', 'โชติกา', 'ปริตตะพงศาชัย', '624259010', '091-116-90', '1', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s08063642', 'นาย', 'จักรเพชร', 'สมฤทธิ์', '624259005@tzsmail.com', '091-116-90', '3', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s09236782', 'นาย', 'จิรโรชน์', 'จันทร์งาม', '614259003@webmail.npru.ac.th', '012-345-67', '6', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s11526151', 'นาย', 'เจษฎากร', 'เมืองนาม', '624259008@hotmail.com', '091-116-90', '4', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s12129145', 'นาย', 'จักรินทร์', 'คุ้มใหญ่โต', '624259006@mail.com', '091-116-90', '5', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s14076648', 'นาย', 'กนกพล', 'พวงวัดโพธิ์', '624259001@mail.com', '012-345-67', '5', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s15388283', 'นาย', 'พงศธร', 'จันทร์หา', '614259020@webmail.npru.ac.th', '091-116-90', '6', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s15476238', 'นาย', 'เจษฎากร', 'เมืองนาม', '624259008@tzsmail.com', '091-116-90', '3', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s16946942', 'นาย', 'เจษฎากร', 'เมืองนาม', '624259008@gmail.com', '091-116-90', '2', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s18982892', 'นาย', 'เจษฎากร', 'เมืองนาม', '624259008', '091-116-90', '1', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s20691836', 'นาย', 'จักรเพชร', 'สมฤทธิ์', '624259005@gmail.com', '091-116-90', '2', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s29260611', 'นาย', 'ธีรวัตร', 'ขวัญเพิ่มพร', '624259015@hotmail.com', '091-116-90', '4', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s30178981', 'นาย', 'จักรเพชร', 'สมฤทธิ์', '624259005@mail.com', '091-116-90', '5', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s30904512', 'นาย', 'กนกพล', 'พวงวัดโพธิ์', '624259001@tzsmail.com', '012-345-67', '3', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s31234398', 'นาย', 'ชนกานต์', 'บัวขาว', '624259009', '091-116-90', '1', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s32709056', 'นาย', 'ญาณสิชฌ์', 'สันติเอกชุน', '624259011@hotmail.com', '091-116-90', '4', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s33581927', 'นาย', 'ธนภัทร์', 'ปิ่นทอง', '614259017@webmail.npru.ac.th', '091-116-90', '6', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s34013176', 'นาย', 'จิรายุส', 'สหพรอุดมการ', '624259007', '091-116-90', '1', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s34326214', 'นาย', 'ขัตติยะ', 'สร้อยอูป', '624259002', '012-345-67', '1', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s35700422', 'นาย', 'จักรินทร์', 'คุ้มใหญ่โต', '624259006@gmail.com', '091-116-90', '2', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s36072656', 'นาย', 'ณัฐชัย', 'สุบรรณเกตุ', '614259014@webmail.npru.ac.th', '091-116-90', '6', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s36920705', 'นาย', 'จักรเพชร', 'สมฤทธิ์', '624259005@hotmail.com', '091-116-90', '4', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s37443542', 'นาย', 'โชติกา', 'ปริตตะพงศาชัย', '624259010@gmail.com', '091-116-90', '2', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s38790755', 'นาย', 'ขัตติยะ', 'สร้อยอูป', '624259002@mail.com', '012-345-67', '5', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s39127493', 'นาย', 'กนกพล', 'พวงวัดโพธิ์', '624259001@gmail.com', '012-345-67', '2', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s41252765', 'นาย', 'กรกฎ', 'ขาวนวล', '614259019@webmail.npru.ac.th', '091-116-90', '6', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s49679325', 'นาย', 'จักรินทร์', 'คุ้มใหญ่โต', '624259006@hotmail.com', '091-116-90', '4', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s50115079', 'นาย', 'ณัฐสิทธิ์', 'วรนิติเยาวภา', '624259014@hotmail.com', '091-116-90', '4', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s51416912', 'นาย', 'โชติกา', 'ปริตตะพงศาชัย', '624259010@hotmail.com', '091-116-90', '4', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s51902861', 'นาย', 'ณัฐพล', 'แซ่โฟ้ง', '624259012@mail.com', '091-116-90', '5', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s53182446', 'นาย', 'เกวลิน', 'ชิ้นไพบูลย์', '624259003', '091-116-90', '1', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s53970703', 'นาย', 'ขัตติยะ', 'สร้อยอูป', '624259002@hotmail.com', '012-345-67', '4', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s54799220', 'นาย', 'เกวลิน', 'ชิ้นไพบูลย์', '624259003@tzsmail.com', '091-116-90', '3', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s55769997', 'นาย', 'กนกพล', 'พวงวัดโพธิ์', '624259001', '012-345-67', '1', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s56370811', 'นาย', 'ณัฏฐณิชา', 'ปั้นเปี่ยมทอง', '614259012@webmail.npru.ac.th', '091-116-90', '6', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s56619152', 'นาย', 'ณัฐภูมิ', 'พันธ์มี', '624259013@gmail.com', '091-116-90', '2', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s56628768', 'นาย', 'จักรินทร์', 'คุ้มใหญ่โต', '624259006@tzsmail.com', '091-116-90', '3', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s58795573', 'นาย', 'เกียรติชัย', 'สุราราษฎร์', '624259004@hotmail.com', '091-116-90', '4', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s59159669', 'นาย', 'จิรายุส', 'สหพรอุดมการ', '624259007@hotmail.com', '091-116-90', '4', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s60431928', 'นาย', 'จิรายุส', 'สหพรอุดมการ', '624259007@mail.com', '091-116-90', '5', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s60583681', 'นาย', 'ชนกานต์', 'บัวขาว', '624259009@mail.com', '091-116-90', '5', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s61079612', 'นาย', 'ญาณสิชฌ์', 'สันติเอกชุน', '624259011', '091-116-90', '1', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s62164358', 'นาย', 'ณัฐพล', 'แซ่โฟ้ง', '624259012', '091-116-90', '1', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s69611692', 'นาย', 'จิรายุส', 'สหพรอุดมการ', '624259007@gmail.com', '091-116-90', '2', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s72664643', 'นาย', 'เกวลิน', 'ชิ้นไพบูลย์', '624259003@hotmail.com', '091-116-90', '4', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s73746171', 'นาย', 'ชนกานต์', 'บัวขาว', '624259009@hotmail.com', '091-116-90', '4', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s75850810', 'นาย', 'ญาณสิชฌ์', 'สันติเอกชุน', '624259011@mail.com', '091-116-90', '5', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s76621371', 'นาย', 'เกวลิน', 'ชิ้นไพบูลย์', '624259003@mail.com', '091-116-90', '5', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s76777504', 'นาย', 'จุฑามาศ', 'ชานุชิต', '614259005@webmail.npru.ac.th', '012-345-67', '6', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s77239672', 'นาย', 'จิรายุส', 'สหพรอุดมการ', '624259007@tzsmail.com', '091-116-90', '3', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s79146068', 'นาย', 'โชติกา', 'ปริตตะพงศาชัย', '624259010@mail.com', '091-116-90', '5', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s79870249', 'นาย', 'ชนกานต์', 'บัวขาว', '624259009@gmail.com', '091-116-90', '2', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s80348163', 'นาย', 'ญาณสิชฌ์', 'สันติเอกชุน', '624259011@gmail.com', '091-116-90', '2', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s82108800', 'นาย', 'ณัฐภูมิ', 'พันธ์มี', '624259013@mail.com', '091-116-90', '5', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s83211702', 'นาย', 'เกียรติชัย', 'สุราราษฎร์', '624259004@mail.com', '091-116-90', '5', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s83999194', 'นาย', 'เกียรติชัย', 'สุราราษฎร์', '624259004@tzsmail.com', '091-116-90', '3', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s85705360', 'นาย', 'เกวลิน', 'ชิ้นไพบูลย์', '624259003@gmail.com', '091-116-90', '2', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s88646625', 'นาย', 'ขัตติยะ', 'สร้อยอูป', '624259002@gmail.com', '012-345-67', '2', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s89943393', 'นาย', 'เกียรติชัย', 'สุราราษฎร์', '624259004@gmail.com', '091-116-90', '2', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s91105701', 'นาย', 'ณัฐพล', 'แซ่โฟ้ง', '624259012@gmail.com', '091-116-90', '2', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s92333334', 'นาย', 'ขัตติยะ', 'สร้อยอูป', '624259002@tzsmail.com', '012-345-67', '3', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s92635866', 'นาย', 'เกียรติชัย', 'สุราราษฎร์', '624259004', '091-116-90', '1', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s94014787', 'นาย', 'จักรเพชร', 'สมฤทธิ์', '624259005', '091-116-90', '1', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s94193930', 'นาย', 'กนกพล', 'พวงวัดโพธิ์', '624259001@hotmail.com', '012-345-67', '4', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s96997721', 'นาย', 'ณัฐพล', 'แซ่โฟ้ง', '624259012@hotmail.com', '091-116-90', '4', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s99340316', 'นาย', 'จักรินทร์', 'คุ้มใหญ่โต', '624259006', '091-116-90', '1', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0'),
('s99664967', 'นาย', 'เจษฎากร', 'เมืองนาม', '624259008@mail.com', '091-116-90', '5', 0, 'e4942f7821a41dccf6988af938ae69dd', 'นักเรียน', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/st27777773%2Fst27777773_1625745609?alt=media&token=23f0c083-0c9b-4bd9-bf6a-2d3737c586b0');

-- --------------------------------------------------------

--
-- Table structure for table `subsch_table`
--

CREATE TABLE `subsch_table` (
  `ssch_id` varchar(11) NOT NULL,
  `ssch_name` varchar(150) NOT NULL,
  `ssch_detail` mediumtext NOT NULL,
  `ssch_budget` int(11) NOT NULL,
  `Budget_per_capital` int(11) NOT NULL,
  `ssch_amount` int(11) NOT NULL,
  `ssch_other` varchar(10000) NOT NULL,
  `ssch_note` varchar(200) NOT NULL,
  `ssch_dopen` date NOT NULL,
  `ssch_dclose` date NOT NULL,
  `ssch_web` varchar(250) NOT NULL,
  `ssch_file` varchar(250) NOT NULL,
  `mainsch_id` varchar(11) NOT NULL,
  `by_st_id` varchar(11) NOT NULL,
  `timeadd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subsch_table`
--

INSERT INTO `subsch_table` (`ssch_id`, `ssch_name`, `ssch_detail`, `ssch_budget`, `Budget_per_capital`, `ssch_amount`, `ssch_other`, `ssch_note`, `ssch_dopen`, `ssch_dclose`, `ssch_web`, `ssch_file`, `mainsch_id`, `by_st_id`, `timeadd`) VALUES
('sch35077004', 'ทุนการศึกษาสายอาชีพ', 'โดยนักเรียนทุนจะได้รับทุนการศึกษาภาคเรียนละ 7,000 บาท ต่อเนื่องทุกภาคเรียนจนจบชั้น ปวช.3', 14000, 0, 10, '', '', '2021-08-05', '2021-08-06', 'https://www.yuvabadhanafoundation.org/th/join/', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/file%2Fms95962146_1616095930?alt=media&token=dac51050-7d0d-4dc0-9e17-ad26384715d7', 'ms26859236', 'st23987842', '2021-08-05 12:24:29'),
('sch44572261', 'ทุนการศึกษาระดับมัธยมศึกษา (มูลนิธิจรูญเอื้อชูเกียรติ) ปีการศึกษา  2564', 'การให้ทุนการศึกษาของมูลนิธิจรูญเอื้อชูเกียรติครอบคลุมการศึกษาสายสามัญในระดับมัธยมศึกษาตอนปลายถึงอุดมศึกษา (ปริญญาตรี) และการศึกษาสายวิชาชีพ ได้แก่ระดับ ปวช. และ ปวส.\nทุนของมูลนิธิจรูญเอื้อชูเกียรติไม่มีเงื่อนไขให้ต้องใช้ทุนคืน เพียงหวังให้ผู้รับทุนมุ่งมั่นในการศึกษา และมีความตั้งใจที่จะนำความรู้ที่ได้รับกลับไปช่วยสร้างความผาสุกแก่ท้องถิ่นตน โดยกำหนดคุณสมบัติทั่วไปของผู้รับทุน', 50000, 0, 0, '', '', '2021-07-13', '2021-08-13', 'https://www.cefoundation.or.th/node/9', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/file%2Fms95962146_1616095930?alt=media&token=dac51050-7d0d-4dc0-9e17-ad26384715d7', '3', 'st27274527', '2021-08-05 23:00:53'),
('sch74721899', 'ทุนระดับ ASEAN Secondary 3 Scholarship ปึการศึกษา 2564', 'ทุนระยะเวลา 4 ปี (เทียบเท่าประมาณม.3 – ม.6)\nผู้ที่ผ่านการคัดเลือกจะต้องเดินทางไปสิงคโปร์ช่วงปลายเดือนตุลาคม', 200000, 0, 10, '', '', '2021-08-05', '2021-08-31', 'https://thaiedunews.net/asean-scholarships/', 'https://firebasestorage.googleapis.com/v0/b/fileupload-89d50.appspot.com/o/file%2Fms95962146_1616095930?alt=media&token=dac51050-7d0d-4dc0-9e17-ad26384715d7', '4', 'st27274527', '2021-08-05 22:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `veriflyuser`
--

CREATE TABLE `veriflyuser` (
  `user_id` varchar(11) NOT NULL,
  `usertitle` varchar(10) NOT NULL,
  `username` varchar(60) NOT NULL,
  `userlastname` varchar(60) NOT NULL,
  `useremail` varchar(60) NOT NULL,
  `usertel` varchar(11) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `class` varchar(20) NOT NULL,
  `userstatus` varchar(20) NOT NULL,
  `allow_to_use` varchar(10) NOT NULL,
  `img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`agen_id`);

--
-- Indexes for table `announcement_result`
--
ALTER TABLE `announcement_result`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `main_scholar_id` (`main_scholar_id`),
  ADD KEY `addby` (`addby`);

--
-- Indexes for table `anscom`
--
ALTER TABLE `anscom`
  ADD PRIMARY KEY (`Scom_id`),
  ADD KEY `cm_id` (`cm_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cm_id`),
  ADD KEY `ssch_id` (`sch_id`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `msch_id` (`msch_id`),
  ADD KEY `st_id` (`st_id`);

--
-- Indexes for table `msch_table`
--
ALTER TABLE `msch_table`
  ADD PRIMARY KEY (`msch_id`),
  ADD KEY `Sch_agency` (`ag_id`),
  ADD KEY `Sch_type` (`sch_type_id`),
  ADD KEY `msch_table_ibfk_3` (`addby`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`noti_id`),
  ADD KEY `ssch_id` (`scholar_id`),
  ADD KEY `s_id` (`student_id`);

--
-- Indexes for table `sch_type`
--
ALTER TABLE `sch_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `staff_table`
--
ALTER TABLE `staff_table`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `subsch_table`
--
ALTER TABLE `subsch_table`
  ADD PRIMARY KEY (`ssch_id`),
  ADD KEY `msch_id` (`mainsch_id`),
  ADD KEY `by_st_id` (`by_st_id`);

--
-- Indexes for table `veriflyuser`
--
ALTER TABLE `veriflyuser`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agency`
--
ALTER TABLE `agency`
  MODIFY `agen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `anscom`
--
ALTER TABLE `anscom`
  MODIFY `Scom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `noti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `sch_type`
--
ALTER TABLE `sch_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement_result`
--
ALTER TABLE `announcement_result`
  ADD CONSTRAINT `announcement_result_ibfk_1` FOREIGN KEY (`main_scholar_id`) REFERENCES `subsch_table` (`ssch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `announcement_result_ibfk_2` FOREIGN KEY (`addby`) REFERENCES `staff_table` (`st_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `anscom`
--
ALTER TABLE `anscom`
  ADD CONSTRAINT `anscom_ibfk_1` FOREIGN KEY (`cm_id`) REFERENCES `comment` (`cm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `management`
--
ALTER TABLE `management`
  ADD CONSTRAINT `management_ibfk_2` FOREIGN KEY (`st_id`) REFERENCES `staff_table` (`st_id`);

--
-- Constraints for table `msch_table`
--
ALTER TABLE `msch_table`
  ADD CONSTRAINT `msch_table_ibfk_3` FOREIGN KEY (`addby`) REFERENCES `staff_table` (`st_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `msch_table_ibfk_4` FOREIGN KEY (`ag_id`) REFERENCES `agency` (`agen_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `msch_table_ibfk_5` FOREIGN KEY (`sch_type_id`) REFERENCES `sch_type` (`type_id`) ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student_table` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifications_ibfk_3` FOREIGN KEY (`scholar_id`) REFERENCES `subsch_table` (`ssch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subsch_table`
--
ALTER TABLE `subsch_table`
  ADD CONSTRAINT `subsch_table_ibfk_2` FOREIGN KEY (`by_st_id`) REFERENCES `staff_table` (`st_id`),
  ADD CONSTRAINT `subsch_table_ibfk_3` FOREIGN KEY (`mainsch_id`) REFERENCES `msch_table` (`msch_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

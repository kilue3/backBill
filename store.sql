-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2022 at 11:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bill`
--

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `Store_id` int(11) NOT NULL,
  `Store_name` varchar(50) NOT NULL,
  `Store_email` varchar(50) DEFAULT NULL,
  `Contact_name` varchar(50) NOT NULL,
  `Tel` varchar(10) DEFAULT NULL,
  `Store_username` varchar(20) NOT NULL,
  `Store_password` varchar(250) NOT NULL,
  `Store_status` varchar(20) NOT NULL,
  `bill_TaxGroup` varchar(250) DEFAULT NULL,
  `bill_BPC_WHTid` varchar(250) DEFAULT NULL,
  `bill_BPC_BranchNo` varchar(250) DEFAULT NULL,
  `VendGroup` varchar(50) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`Store_id`, `Store_name`, `Store_email`, `Contact_name`, `Tel`, `Store_username`, `Store_password`, `Store_status`, `bill_TaxGroup`, `bill_BPC_WHTid`, `bill_BPC_BranchNo`, `VendGroup`, `Address`) VALUES
(9, '7-11', '711@gmail.com', 'nope', '0910444853', 's711', '2e9ec317e197819358fbc43afca7d837', 'enable', '', '', '', '', ''),
(10, 'โลตัส', 'lotas@gmail.com', 'เด่น', '0123456789', 'lotus2', '20c7b8cf30d1492f695f0b9c3bbc186f', 'enable', '', '', '', '', ''),
(11, 'thaico', 'thaico@gmail.com', 'นาย ', '0454054554', 'thaico ', '20c7b8cf30d1492f695f0b9c3bbc186f', 'enable', '', '', '', '', ''),
(12, 'big c', 'bigc@gmail.com', 'นางสาว', '0803014546', 'bigc1', '20c7b8cf30d1492f695f0b9c3bbc186f', 'enable', '', '', '', '', ''),
(20, 'KISIKORNBANK PUBLIC  COMPANY  LIMITED.', NULL, 'KISIKORNBANK PUBLIC  COMPANY  LIMITED.', '', 'VB0004', 'ed0d35449ef869817def91d7e4da65f8', 'enable', NULL, NULL, NULL, 'FIN', 'INTERNATIONAL TRADE DEPARTMENT 7 th Floor, 400/22 Phahonyothin Road,Samsennai,Phayathai,Bangkok 10400'),
(21, 'EVERGREEN  SHIPPING  AGENCY (THAILAND) CO.,LTD.', NULL, 'EVERGREEN  SHIPPING  AGENCY (THAILAND) CO.,LTD.', '', 'VD0016', '789cdf6c467259d1a3809a931aa76b3d', 'enable', NULL, NULL, NULL, 'OTH', '3656/81 24-25 TH  FLR. GREEN  TOWER , RAMA IV ROAD, KLONGTOEY, BANGKOK 10110'),
(23, 'MDD BEVERAGE SDN BHD', NULL, 'MDD BEVERAGE SDN BHD', '', 'VF0231', '48d9565458ce31ccf46b85a1a1a57de0', 'enable', NULL, NULL, NULL, 'IMP', '\n13/1K,47500 SUBANG JAYA,SELANGOR,MALAYSIA'),
(24, 'Bureau  Veritas (Thailand) Ltd.', NULL, 'Bureau  Veritas (Thailand) Ltd.', '02-6704800', 'VD0076', '0adfc67204b17bd775a45e1dc5ab2b90', 'enable', NULL, NULL, NULL, 'OTH', '2170 Bangkok Tower,16 th Floor, New Petchburi Road, Bangkapi, Huaykwang Bangkok 10310 Thailand'),
(25, 'UNIVERSAL TRANSPORTATION   LTD.', NULL, 'UNIVERSAL TRANSPORTATION   LTD.', '', 'VD0381', 'a103d655a81aa23ddcf6362dd97a3621', 'enable', NULL, NULL, NULL, 'OTH', '21/30 THA WAH TOWER, SOUTH SATHORN ROAD, KWENG  TUNGMAHAMEK, KHET, SATHORN, BANKOK 10120'),
(26, 'THAI BONANZA INTERNATIONAL CORP.,LTD.', NULL, 'THAI BONANZA INTERNATIONAL CORP.,LTD.', '', 'VD1510', '2540fb11a2a3b04b8841481062e86319', 'enable', NULL, NULL, NULL, 'OTH', '61/8 Soi Thaveenutra 2, Rama 9 Road, Huaykwang, Bangkok 10320'),
(27, 'PT. INDO-THAICOCONUT', NULL, 'PT. INDO-THAICOCONUT', '', 'PCH047', 'd0956a6a87f44c4794858327a783788b', 'enable', NULL, NULL, NULL, 'ADV-INDO', ''),
(28, 'MR.ZEQI QIN', NULL, 'MR.ZEQI QIN', '', 'VD4338', '616a4b2955da86ccecf986190b53aac6', 'enable', NULL, NULL, NULL, 'OTH', 'YUNNAN NORMAL UNIVERSITY,NO.768,JUXIN RD.,CHENGGONG COUNTRY,MUNMING CITY,YUNNAN PROVINCE,CHINA'),
(29, 'EVERGREEN  MARINE CORPORATION (TAIWAN) LTD.', NULL, 'EVERGREEN  MARINE CORPORATION (TAIWAN) LTD.', '', 'VD0032', 'c269c7e7e8014285a16c71c36595ad4e', 'enable', NULL, NULL, NULL, 'OTH', '3656/81 24-25 TH  FLR. GREEN  TOWER , RAMA IV ROAD,  KLONGTON , KLONGTOEY, BANGKOK 10110'),
(30, 'CIMB Thai Bank Public Company Limited.', NULL, 'CIMB Thai Bank Public Company Limited.', '', 'VB0001', 'c74963042de8d60518e0dbc4466a49cc', 'enable', NULL, NULL, NULL, 'FIN', '44 Langsuan Road Lumphini Pathumwan Bangkok 10330 Thailand'),
(31, 'BOONNINTR COMPANY LIMITED', NULL, 'BOONNINTR COMPANY LIMITED', '081-736328', 'VD0065', 'd0e91862ffcd02e16805f59c3efc1b9a', 'enable', NULL, NULL, NULL, 'OTH', '87/29 หมู่ 6 ถ.รัตนาธิเบศร์ อ.บางบัวทอง ต.บางรักใหญ่ จ.นนทบุรี 11110'),
(32, 'บริษัท แอดวานซ์ อินโฟร์ เซอร์วิส จำกัด (มหาชน)', NULL, 'บริษัท แอดวานซ์ อินโฟร์ เซอร์วิส จำกัด (มหาชน)', '02-271-900', 'VD0044', 'f86a92ad70d9b2dafe08d65f4574b15e', 'enable', NULL, NULL, NULL, 'OTH', '414 ถนนพหลโยธิน  แขวงสามเสนใน  เขตพญาไท  กรุงเทพฯ 10400'),
(33, 'บริษัท อเมริกัน คอมเมอร์เชียล ทรานสปอร์ต (ประเทศไท', NULL, 'บริษัท อเมริกัน คอมเมอร์เชียล ทรานสปอร์ต (ประเทศไท', '', 'VD0051', '63bf7b962e1e6ab2ea8ab28936ffad9f', 'enable', NULL, NULL, NULL, 'OTH', '36 th Floor, Unit 3601,Exchange Tower,388 Sukhumvit Road,Klong Toey Bangkok 10110 Thailand'),
(34, 'บริษัท แปซิฟิค ห้องเย็น จำกัด', NULL, 'บริษัท แปซิฟิค ห้องเย็น จำกัด', '034-834224', 'VD0261', '285b4c29b0c3244147f3c81578f227b4', 'enable', 'VATHO', '', '', 'OTH', '47/19 หมู่ 2 ตำบลนาดี อำเภอเมือง จังหวัดสมุทรสาคร 74000'),
(35, 'บริษัท เอเวอร์กรีน คอนเทนเนอร์ เทอร์มินัล(ประเทศไท', NULL, 'บริษัท เอเวอร์กรีน คอนเทนเนอร์ เทอร์มินัล(ประเทศไท', '02-737-988', 'VD0024', 'e7e4360f3d760a2f97758ceb39efbcec', 'enable', 'VATHO', '', '', 'OTH', '108 หมู่ 14 ซ.กิ่งทอง ถ.กิ่งแก้ว ต.ราชาเทวะ อ.บางพลี จ.สมุทรปราการ 10540'),
(36, 'บจ.เอ็มไอเอสซี เบอร์ฮาทโดยบริษัท เอ็มไอเอสซี เอเยน', NULL, 'บจ.เอ็มไอเอสซี เบอร์ฮาทโดยบริษัท เอ็มไอเอสซี เอเยน', '', 'VD0210', '91b935b5f66586317a667c4b6c887e00', 'enable', 'VATHO', '0107551000151', '', 'OTH', 'อาคารกรีนทาวเวอร์ ชั้น4, 3656/9-10 ถนนพระราม4 คลองตัน คลองเตย กรุงเทพฯ 10110'),
(37, 'LIVERPOOL IMPORT&EXPORT (SHENZHEN) CO.,LTD', NULL, 'LIVERPOOL IMPORT&EXPORT (SHENZHEN) CO.,LTD', '', 'VF0251', '4ca396ba4f231df71fdaee37719cb18d', 'enable', '', '', '', 'IMP', '1702-1802, 1904-2004  ZHIBEN BUILDING, NO.12 FUMIN ROAD, FUTIAN, SHENZHEN GUANGDONG, CHINA'),
(38, 'คุณกนกพร พัฒจันทร์หอม', 'kanokporn05032522@gmail.com', 'คุณกนกพร พัฒจันทร์หอม', '', 'PCF106', 'ec97d9887bc242506973447d7a8b155e', 'enable', 'NOVAT', '3720100990183', '', 'ADV', '33 หมู่ที่ 1 ตำบลเขาแร้ง อำเภอเมืองราชบุรี จังหวัดราชบุรี'),
(39, 'SCHOLLE  IPN PACKAGING (SUZHOU)', '', 'SCHOLLE  IPN PACKAGING (SUZHOU)', '', 'VF0030', '05fe8687e8df4f78e624facef12b87c0', 'enable', 'NOVAT', '0105548022228', '', 'IMP', 'NO.579 FENGTING AVENUE SUZHOU INDUSTRIAL PARK JIANGSU PROVINCE 215122 CN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`Store_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `Store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

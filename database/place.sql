-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               11.4.0-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table ts.place
CREATE TABLE IF NOT EXISTS `place` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `uniqueID` varchar(10) DEFAULT NULL,
  `code_station` int(3) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `station` varchar(4) DEFAULT NULL,
  `adult_price` int(100) DEFAULT NULL,
  `child_price` int(100) DEFAULT NULL,
  `open_time` time DEFAULT NULL,
  `close_time` time DEFAULT NULL,
  `about_timeUse` float DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `link_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `uniqueID` (`uniqueID`),
  KEY `code_station_FK` (`station`),
  KEY `type` (`type`),
  CONSTRAINT `code_station_FK` FOREIGN KEY (`station`) REFERENCES `code_name_station` (`code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table ts.place: ~20 rows (approximately)
INSERT INTO `place` (`ID`, `uniqueID`, `code_station`, `name`, `type`, `station`, `adult_price`, `child_price`, `open_time`, `close_time`, `about_timeUse`, `lat`, `lng`, `link_img`) VALUES
	(1, 'P1', 1, 'พิพิธภัณฑ์เด็ก', 'museum', 'N8', 0, 0, '10:00:00', '16:00:00', 2, 13.803056, 100.551111, 'https://travel.mthai.com/app/uploads/2015/01/IMG_94891-1024x683.jpg'),
	(2, 'P2', 1, 'ตลาดนัดจตุจักร', 'market', 'N8', 0, 0, '08:00:00', '21:00:00', 2, 13.799722, 100.550278, 'https://image.kkday.com/v2/image/get/w_1900%2Cc_fit/s1.kkday.com/product_135974/20221117092427_TvyNN/jpg'),
	(3, 'P3', 3, 'พิพิธภัณฑ์กระจายเสียง', 'museum', 'N5', 0, 0, '10:00:00', '16:00:00', 2, 13.779722, 100.5375, 'https://db.sac.or.th/museum/images/Museum/59/20120210152131HQrL.jpg'),
	(4, 'P4', 3, 'เรือนจำสุดท้าย: ห้องหลบหนี', 'adventure', 'N5', 550, 550, '09:00:00', '21:00:00', 2, 13.778333, 100.543611, 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/23/fe/3d/ae/the-last-prison-escape.jpg?w=500&h=400&s=1'),
	(5, 'P5', 5, 'อนุเสาวรีย์ชัยสมรภูมิ', 'religious', 'N3', 0, 0, NULL, NULL, 0.5, 13.764722, 100.538056, 'https://upload.wikimedia.org/wikipedia/commons/9/94/Victory_Monument%2C_Bangkok_%288121170240%29_%282%29.jpg'),
	(6, 'P6', 6, 'วังสวนผักกาด', 'museum', 'N2', 50, 50, '09:00:00', '16:00:00', 2, 13.756667, 100.537222, 'https://ak-d.tripcdn.com/images/100t1f000001gqcsxB39E.jpg?proc=source%2Ftrip'),
	(7, 'P7', 7, 'Paragon', 'mall', 'Siam', 0, 0, '10:00:00', '22:00:00', 3, 13.745833, 100.533611, 'https://www.siamparagon.co.th/public/images/aboutus/SPD.jpg'),
	(8, 'P8', 8, 'ศาลพระพรหมเอราวัณ', 'religious', 'E1', 0, 0, '06:00:00', '23:00:00', 0.5, 13.744167, 100.540278, 'https://mpics.mgronline.com/pics/Images/563000003252701.JPEG'),
	(9, 'P9', 8, 'Central World', 'mall', 'E1', 0, 0, '10:00:00', '22:00:00', 3, 13.746389, 100.538889, 'https://positioningmag.com/wp-content/uploads/2019/11/002-e1574946222999.jpg'),
	(10, 'P10', 11, 'Terminal 21', 'mall', 'E4', 0, 0, '10:00:00', '22:00:00', 3, 13.737778, 100.560278, 'https://upload.wikimedia.org/wikipedia/commons/e/e5/Terminal21_after_a_rainy_day.jpg'),
	(11, 'P11', 11, 'สวนเบญจกิติ', 'park', 'E4', 0, 0, '05:00:00', '21:00:00', 3, 13.727778, 100.556944, 'https://mpics.mgronline.com/pics/Images/565000005720401.JPEG'),
	(12, 'P12', 12, 'Bounce Thailand', 'adventure', 'E5', 490, 390, '11:00:00', '20:00:00', 2, 13.731111, 100.569444, 'https://bk.asia-city.com/sites/default/files/styles/og_fb/public/bounch-1.jpg?itok=MU2WWEJE'),
	(13, 'P13', 14, 'ท้องฟ้าจำลองกรุงเทพ', 'family', 'E7', 50, 30, '09:00:00', '16:00:00', 4, 13.719722, 100.582778, 'https://ak-d.tripcdn.com/images/0104e223482kebcg00F89_W_800_0_R5_Q90.jpg'),
	(14, 'P14', 14, 'วัดธาตุทอง', 'religious', 'E7', 0, 0, '08:00:00', '22:30:00', 0.5, 13.719444, 100.585556, 'https://www.ananda.co.th/blog/thegenc/wp-content/uploads/2023/11/%E0%B8%A7%E0%B8%B1%E0%B8%94%E0%B8%98%E0%B8%B2%E0%B8%95%E0%B8%B8%E0%B8%97%E0%B8%AD%E0%B8%87.jpg'),
	(15, 'P15', 7, 'MBK Center', 'mall', 'Siam', 0, 0, '10:00:00', '22:00:00', 3, 13.744722, 100.53, 'https://www.mbkgroup.co.th/images/business/shopping/landing-mbk-center.jpg?v=1.0'),
	(16, 'P16', 7, 'Ban Jim Tomson Museum', 'museum', 'Siam', 100, 50, '09:00:00', '18:00:00', 2, 13.749167, 100.528056, 'https://storage-wp.thaipost.net/2022/10/1-37.jpg'),
	(17, 'P17', 7, 'หอศิลป์', 'museum', 'Siam', 0, 0, '10:00:00', '20:00:00', 3, 13.746667, 100.530556, 'https://res.cloudinary.com/pillarshotels/image/upload/f_auto/web/cms/resources/attractions/bangkok-art-culture-centre-w1800h1360.jpg'),
	(18, 'P18', 7, 'Madatusson Museum', 'museum', 'Siam', 515, 515, '10:00:00', '20:00:00', 2, 13.746667, 100.531389, 'https://cdn.esan108.com/main/wp-content/uploads/2020/04/image5054_4.jpg'),
	(19, 'P19', 7, 'Sea life', 'family', 'Siam', 990, 890, '10:00:00', '21:00:00', 2, 13.745833, 100.535, 'https://www.packgrapao.com/wp-content/uploads/2016/12/Image00024.jpg'),
	(20, 'P20', 20, 'The Orthodox St.Nicolas Church', 'religious', 'E12', 0, 0, '08:00:00', '20:00:00', 1, 13.683056, 100.625556, 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0b/50/a3/31/the-orthodox-stnicolas.jpg?w=1200&h=-1&s=1');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

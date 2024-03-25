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

-- Dumping structure for table ts.code_name_station
CREATE TABLE IF NOT EXISTS `code_name_station` (
  `code` varchar(4) DEFAULT NULL,
  `thai_name` varchar(50) DEFAULT NULL,
  `english_name` varchar(50) DEFAULT NULL,
  UNIQUE KEY `code_station` (`code`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table ts.code_name_station: ~22 rows (approximately)
INSERT INTO `code_name_station` (`code`, `thai_name`, `english_name`) VALUES
	('N8', 'หมอชิต', 'Mochit'),
	('N7', 'สะพานควาย', 'Saphan Khwai'),
	('N5', 'อารีย์', 'Ari'),
	('N4', 'สนามเป้า', 'Sanam Pao'),
	('N3', 'อนุเสาวรีย์ชัยสมรภูมิ', 'Victory Monument'),
	('N2', 'พญาไท', 'Phaya Thai'),
	('N1', 'ราชเทวี', 'Ratchathewi'),
	('Siam', 'สยาม', 'Siam'),
	('E1', 'ชิดลม', 'Chit Lom'),
	('E2', 'เพลินจิต', 'Phloen Chit'),
	('E3', 'นานา', 'Nana'),
	('E4', 'อโศก', 'Asok'),
	('E5', 'พร้อมพงษ์', 'Phrom Phong'),
	('E6', 'ทองหล่อ', 'Thong Lo'),
	('E7', 'เอกมัย', 'Ekkamai'),
	('E8', 'พระโขนง', 'Phra Khanong'),
	('E9', 'อ่อนนุช', 'On Nut'),
	('E10', 'บางจาก', 'Bang Chak'),
	('E11', 'ปุณณวิถี', 'Punnawithi'),
	('E12', 'อุดมสุข', 'Udom Suk'),
	('E13', 'บางนา', 'Bang Na'),
	('E14', 'แบริ่ง', 'Bearing');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

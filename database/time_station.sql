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

-- Dumping structure for table ts.time_station
CREATE TABLE IF NOT EXISTS `time_station` (
  `start` varchar(4) DEFAULT NULL,
  `N8` int(10) DEFAULT NULL COMMENT 'หมอชิต',
  `N7` int(10) DEFAULT NULL,
  `N5` int(10) DEFAULT NULL,
  `N4` int(10) DEFAULT NULL,
  `N3` int(10) DEFAULT NULL,
  `N2` int(10) DEFAULT NULL,
  `N1` int(10) DEFAULT NULL,
  `Siam` int(10) DEFAULT NULL,
  `E1` int(10) DEFAULT NULL,
  `E2` int(10) DEFAULT NULL,
  `E3` int(10) DEFAULT NULL,
  `E4` int(10) DEFAULT NULL,
  `E5` int(10) DEFAULT NULL,
  `E6` int(10) DEFAULT NULL,
  `E7` int(10) DEFAULT NULL,
  `E8` int(10) DEFAULT NULL,
  `E9` int(10) DEFAULT NULL,
  `E10` int(10) DEFAULT NULL,
  `E11` int(10) DEFAULT NULL,
  `E12` int(10) DEFAULT NULL,
  `E13` int(10) DEFAULT NULL,
  `E14` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table ts.time_station: ~22 rows (approximately)
INSERT INTO `time_station` (`start`, `N8`, `N7`, `N5`, `N4`, `N3`, `N2`, `N1`, `Siam`, `E1`, `E2`, `E3`, `E4`, `E5`, `E6`, `E7`, `E8`, `E9`, `E10`, `E11`, `E12`, `E13`, `E14`) VALUES
	('N8', 0, 75, 210, 300, 450, 545, 650, 780, 890, 985, 1080, 1160, 1290, 1400, 1500, 1595, 1725, 1825, 1920, 2030, 2145, 2240),
	('N7', 75, 0, 135, 225, 375, 470, 575, 705, 815, 910, 1005, 1085, 1215, 1325, 1425, 1520, 1650, 1750, 1845, 1955, 2070, 2165),
	('N5', 210, 135, 0, 90, 240, 335, 440, 570, 680, 775, 870, 950, 1080, 1190, 1290, 1385, 1515, 1615, 1710, 1820, 1935, 2030),
	('N4', 300, 225, 90, 0, 150, 245, 350, 480, 590, 685, 780, 860, 990, 1100, 1200, 1295, 1425, 1525, 1620, 1730, 1845, 1940),
	('N3', 450, 375, 240, 150, 0, 95, 200, 330, 440, 535, 630, 710, 840, 950, 1050, 1145, 1275, 1375, 1470, 1580, 1695, 1790),
	('N2', 545, 470, 335, 245, 95, 0, 105, 235, 345, 440, 535, 615, 745, 855, 955, 1050, 1180, 1280, 1375, 1485, 1600, 1695),
	('N1', 650, 575, 440, 350, 200, 105, 0, 130, 240, 335, 430, 510, 640, 750, 850, 945, 1075, 1175, 1270, 1380, 1495, 1590),
	('Siam', 780, 705, 570, 480, 330, 235, 130, 0, 110, 205, 300, 380, 510, 620, 720, 815, 945, 1045, 1140, 1250, 1365, 1460),
	('E1', 890, 815, 680, 590, 440, 345, 240, 110, 0, 95, 190, 270, 400, 510, 610, 705, 835, 935, 1030, 1140, 1255, 1350),
	('E2', 985, 910, 775, 685, 535, 440, 335, 205, 95, 0, 95, 175, 305, 415, 515, 610, 740, 840, 935, 1045, 1160, 1255),
	('E3', 1080, 1005, 870, 780, 630, 535, 430, 300, 190, 95, 0, 80, 210, 320, 420, 515, 645, 745, 840, 950, 1065, 1160),
	('E4', 1160, 1085, 950, 860, 710, 615, 510, 380, 270, 175, 80, 0, 130, 240, 340, 435, 565, 665, 760, 870, 985, 1080),
	('E5', 1290, 1215, 1080, 990, 840, 745, 640, 510, 400, 305, 210, 130, 0, 110, 210, 305, 435, 535, 630, 740, 855, 950),
	('E6', 1400, 1325, 1190, 1100, 950, 855, 750, 620, 510, 415, 320, 240, 110, 0, 100, 195, 325, 425, 520, 630, 745, 840),
	('E7', 1500, 1425, 1290, 1200, 1050, 955, 850, 720, 610, 515, 420, 340, 210, 100, 0, 95, 225, 325, 420, 530, 645, 740),
	('E8', 1595, 1520, 1385, 1295, 1145, 1050, 945, 815, 705, 610, 515, 435, 305, 195, 95, 0, 130, 230, 325, 435, 550, 645),
	('E9', 1725, 1650, 1515, 1425, 1275, 1180, 1075, 945, 835, 740, 645, 565, 435, 325, 225, 130, 0, 100, 195, 305, 420, 515),
	('E10', 1825, 1750, 1615, 1525, 1375, 1280, 1175, 1045, 935, 840, 745, 665, 535, 425, 325, 230, 100, 0, 95, 205, 320, 415),
	('E11', 1920, 1845, 1710, 1620, 1470, 1375, 1270, 1140, 1030, 935, 840, 760, 630, 520, 420, 325, 195, 95, 0, 110, 225, 320),
	('E12', 2030, 1955, 1820, 1730, 1580, 1485, 1380, 1250, 1140, 1045, 950, 870, 740, 630, 530, 435, 305, 205, 110, 0, 115, 210),
	('E13', 2145, 2070, 1935, 1845, 1695, 1600, 1495, 1365, 1255, 1160, 1065, 985, 855, 745, 645, 550, 420, 320, 225, 115, 0, 95),
	('E14', 2240, 2165, 2030, 1940, 1790, 1695, 1590, 1460, 1350, 1255, 1160, 1080, 950, 840, 740, 645, 515, 415, 320, 210, 95, 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
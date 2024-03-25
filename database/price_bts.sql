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

-- Dumping structure for table ts.price_bts
CREATE TABLE IF NOT EXISTS `price_bts` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table ts.price_bts: ~22 rows (approximately)
INSERT INTO `price_bts` (`start`, `N8`, `N7`, `N5`, `N4`, `N3`, `N2`, `N1`, `Siam`, `E1`, `E2`, `E3`, `E4`, `E5`, `E6`, `E7`, `E8`, `E9`, `E10`, `E11`, `E12`, `E13`, `E14`) VALUES
	('N8', 0, 17, 25, 28, 32, 35, 43, 47, 47, 47, 47, 47, 47, 47, 47, 47, 47, 62, 62, 62, 62, 62),
	('N7', 17, 0, 17, 25, 28, 32, 35, 43, 47, 47, 47, 47, 47, 47, 47, 47, 47, 62, 62, 62, 62, 62),
	('N5', 25, 17, 0, 17, 25, 28, 32, 35, 43, 47, 47, 47, 47, 47, 47, 47, 47, 62, 62, 62, 62, 62),
	('N4', 28, 25, 17, 0, 17, 25, 28, 32, 35, 43, 47, 47, 47, 47, 47, 47, 47, 62, 62, 62, 62, 62),
	('N3', 32, 28, 25, 17, 0, 17, 25, 28, 32, 35, 43, 47, 47, 47, 47, 47, 47, 62, 62, 62, 62, 62),
	('N2', 35, 32, 28, 25, 17, 0, 17, 25, 28, 32, 35, 43, 47, 47, 47, 47, 47, 62, 62, 62, 62, 62),
	('N1', 40, 35, 32, 28, 25, 17, 0, 17, 25, 28, 32, 35, 43, 47, 47, 47, 47, 62, 62, 62, 62, 62),
	('Siam', 43, 40, 35, 32, 28, 25, 17, 0, 17, 25, 28, 32, 35, 43, 47, 47, 47, 62, 62, 62, 62, 62),
	('E1', 47, 43, 40, 35, 32, 28, 25, 17, 0, 17, 25, 28, 32, 35, 43, 47, 47, 62, 62, 62, 62, 62),
	('E2', 47, 47, 43, 40, 35, 32, 28, 25, 17, 0, 17, 25, 28, 32, 35, 43, 47, 58, 58, 58, 58, 58),
	('E3', 47, 47, 47, 43, 40, 35, 32, 28, 25, 17, 0, 17, 25, 28, 32, 35, 43, 55, 55, 55, 55, 55),
	('E4', 47, 47, 47, 47, 43, 40, 35, 32, 28, 25, 17, 0, 17, 25, 28, 32, 35, 50, 50, 50, 50, 50),
	('E5', 47, 47, 47, 47, 47, 43, 40, 35, 32, 28, 25, 17, 0, 17, 25, 28, 32, 47, 47, 47, 47, 47),
	('E6', 47, 47, 47, 47, 47, 47, 443, 40, 35, 32, 28, 25, 17, 0, 17, 25, 28, 43, 43, 43, 43, 43),
	('E7', 47, 47, 47, 47, 47, 47, 47, 43, 40, 35, 32, 28, 25, 17, 0, 17, 25, 40, 40, 40, 40, 40),
	('E8', 47, 47, 47, 47, 47, 47, 47, 47, 43, 40, 35, 32, 28, 25, 17, 0, 17, 32, 32, 32, 32, 32),
	('E9', 47, 47, 47, 47, 47, 47, 47, 47, 47, 43, 40, 35, 32, 28, 25, 17, 0, 15, 15, 15, 15, 15),
	('E10', 62, 62, 62, 62, 62, 62, 62, 62, 62, 58, 55, 50, 47, 43, 40, 32, 15, 0, 15, 15, 15, 15),
	('E11', 62, 62, 62, 62, 62, 62, 62, 62, 62, 58, 55, 50, 47, 43, 40, 32, 15, 15, 0, 15, 15, 15),
	('E12', 62, 62, 62, 62, 62, 62, 62, 62, 62, 58, 55, 50, 47, 43, 40, 32, 15, 15, 15, 0, 15, 15),
	('E13', 62, 62, 62, 62, 62, 62, 62, 62, 62, 58, 55, 50, 47, 43, 40, 32, 15, 15, 15, 15, 0, 15),
	('E14', 62, 62, 62, 62, 62, 62, 62, 62, 62, 58, 55, 50, 47, 43, 40, 32, 15, 15, 15, 15, 15, 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

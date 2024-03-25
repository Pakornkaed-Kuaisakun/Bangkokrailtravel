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

-- Dumping structure for table ts.rating
CREATE TABLE IF NOT EXISTS `rating` (
  `ID` int(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `rating` varchar(50) DEFAULT NULL,
  KEY `userID_FK` (`ID`),
  KEY `type_FK` (`type`),
  CONSTRAINT `type_FK` FOREIGN KEY (`type`) REFERENCES `place` (`type`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `userID_FK` FOREIGN KEY (`ID`) REFERENCES `userdata` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table ts.rating: ~7 rows (approximately)
INSERT INTO `rating` (`ID`, `type`, `rating`) VALUES
	(1, 'adventure', '0'),
	(1, 'mall', '5'),
	(1, 'religious', '0'),
	(1, 'museum', '0'),
	(1, 'family', '0'),
	(1, 'park', '0'),
	(1, 'market', '0');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

sitophp-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              10.4.28-MariaDB - mariadb.org binary distribution
-- S.O. server:                  Win64
-- HeidiSQL Versione:            12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dump della struttura del database sitophp
CREATE DATABASE IF NOT EXISTS `sitophp` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `sitophp`;

-- Dump della struttura di tabella sitophp.preferiti
CREATE TABLE IF NOT EXISTS `preferiti` (
  `cod_utente` int(11) DEFAULT NULL,
  `cod_scarpa` int(11) DEFAULT NULL,
  KEY `FK_ordine_scarpa` (`cod_scarpa`),
  KEY `FK_ordine_utente` (`cod_utente`),
  CONSTRAINT `FK_ordine_scarpa` FOREIGN KEY (`cod_scarpa`) REFERENCES `scarpa` (`cod_scarpa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_ordine_utente` FOREIGN KEY (`cod_utente`) REFERENCES `utente` (`cod_utente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella sitophp.preferiti: ~4 rows (circa)
INSERT INTO `preferiti` (`cod_utente`, `cod_scarpa`) VALUES
	(1, 1),
	(2, 8),
	(3, 12),
	(2, 10);

-- Dump della struttura di tabella sitophp.scarpa
CREATE TABLE IF NOT EXISTS `scarpa` (
  `modello` text DEFAULT NULL,
  `marca` text DEFAULT NULL,
  `cod_scarpa` int(11) NOT NULL,
  `prezzo` float DEFAULT NULL,
  `foto` text DEFAULT NULL,
  PRIMARY KEY (`cod_scarpa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella sitophp.scarpa: ~13 rows (circa)
INSERT INTO `scarpa` (`modello`, `marca`, `cod_scarpa`, `prezzo`, `foto`) VALUES
	('Airforce1', 'Nike', 1, 99.99, 'nike-airforce1 \'07.jpg'),
	('Dunk Low Twist', 'Nike', 2, 129.99, 'scarpa-dunk-low-twist-Fg4g4j'),
	('SB Vertebrae', 'Nike', 3, 85.5, 'nike-sbvertebrae.png'),
	('P6000', 'Nike', 4, 111.99, 'nike-p6000.png'),
	('Jordan True Flight', 'Nike', 5, 149.99, 'nike-jordantrueflight.png'),
	('Zoom Vomero 5 SE', 'Nike', 6, 130, 'nike-zoomvomero5se.png'),
	('React Vision', 'Nike', 7, 140, 'nike-reactvision.png'),
	('Dunk Low Retro Premium', 'Nike', 8, 129, 'nike-dunklowretropremium.png'),
	('Air Jordan 1 Mid SE', 'Nike', 9, 149, 'nike-airjordan1midse.jpg'),
	('Air Max 90', 'Nike', 10, 124, 'nike-airmax90.png'),
	('Jordan Max Aura 5', 'Nike', 11, 80, 'nike-jordanmaxaura5.png'),
	('Air Humara', 'Nike', 12, 88, 'nike-airhumara.jpg'),
	('Nocta Air Zoom Drive', 'Nike', 13, 107, 'nike-noctaairzoomdrive.jpg');

-- Dump della struttura di tabella sitophp.utente
CREATE TABLE IF NOT EXISTS `utente` (
  `cod_utente` int(11) NOT NULL,
  `nome` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  PRIMARY KEY (`cod_utente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella sitophp.utente: ~3 rows (circa)
INSERT INTO `utente` (`cod_utente`, `nome`, `password`) VALUES
	(1, 'Carlo', '1234'),
	(2, 'Gabriele', '1234'),
	(3, 'Livieri', '1234');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

-- --------------------------------------------------------
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

-- Dump della struttura di tabella sitophp.scarpa
CREATE TABLE IF NOT EXISTS `scarpa` (
  `marca` text DEFAULT NULL,
  `modello` text DEFAULT NULL,
  `numeri` int(11) DEFAULT NULL,
  `cod_scarpa` int(11) DEFAULT NULL,
  `prezzo` float DEFAULT NULL,
  `colore` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella sitophp.scarpa: ~13 rows (circa)
INSERT INTO `scarpa` (`marca`, `modello`, `numeri`, `cod_scarpa`, `prezzo`, `colore`) VALUES
	('Nike', 'Airforce1', NULL, 1, 99.99, ''),
	('Nike', 'Dunk Low Twist', NULL, 2, 129.99, ''),
	('Nike', 'SB Vertebrae', NULL, 3, 85.5, ''),
	('Nike', 'P6000', NULL, 4, 111.99, ''),
	('Nike', 'Jordan True Flight', NULL, 5, 149.99, ''),
	('Nike', 'Zoom Vomero 5 SE', NULL, 6, 130, ''),
	('Nike', 'React Vision', NULL, 7, 140, ''),
	('Nike', 'Dunk Low Retro Premium', NULL, 8, 129, ''),
	('Nike', 'Air Jordan 1 Mid SE', NULL, 9, 149, ''),
	('Nike', 'Air Max 90', NULL, 10, 124, ''),
	('Nike', 'Nocta Air Zoom Drive', NULL, 13, 107, ''),
	('Nike', 'Jordan Max Aura 5', NULL, 11, 80, ''),
	('Nike', 'Air Humara', NULL, 12, 88, '');

-- Dump della struttura di tabella sitophp.utente
CREATE TABLE IF NOT EXISTS `utente` (
  `cod_utente` int(11) DEFAULT NULL,
  `nome` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `cod_scarpe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella sitophp.utente: ~3 rows (circa)
INSERT INTO `utente` (`cod_utente`, `nome`, `password`, `cod_scarpe`) VALUES
	(1, 'Carlo', '1234', NULL),
	(2, 'Gabriele', '1234', NULL),
	(3, 'Livieri', '1234', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

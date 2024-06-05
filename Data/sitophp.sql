-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              10.4.32-MariaDB - mariadb.org binary distribution
-- S.O. server:                  Win64
-- HeidiSQL Versione:            12.7.0.6850
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

-- Dump della struttura di tabella sitophp.ordine
CREATE TABLE IF NOT EXISTS `ordine` (
  `cod_utente` int(11) NOT NULL,
  `cod_scarpa` int(11) NOT NULL,
  KEY `cod_scarpa` (`cod_scarpa`),
  CONSTRAINT `FK_ordine_scarpa` FOREIGN KEY (`cod_scarpa`) REFERENCES `scarpa` (`cod_scarpa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella sitophp.ordine: ~1 rows (circa)
INSERT INTO `ordine` (`cod_utente`, `cod_scarpa`) VALUES
	(1, 1);

-- Dump della struttura di tabella sitophp.scarpa
CREATE TABLE IF NOT EXISTS `scarpa` (
  `modello` text DEFAULT NULL,
  `marca` set('Nike','Adidas','New Balance','Asics') DEFAULT NULL,
  `cod_scarpa` int(11) NOT NULL,
  `prezzo` float DEFAULT NULL,
  `immagine` char(50) DEFAULT NULL,
  PRIMARY KEY (`cod_scarpa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella sitophp.scarpa: ~8 rows (circa)
INSERT INTO `scarpa` (`modello`, `marca`, `cod_scarpa`, `prezzo`, `immagine`) VALUES
	('Airforce1', 'Nike', 1, 99.99, 'nike-airforce1 \'07.jpg'),
	('Dunk Low Twist', 'Nike', 2, 129.99, 'scarpa-dunk-low-twist-Fg4g4j.png'),
	('SB Vertebrae', 'Nike', 3, 85.5, 'nike-sbvertebrae.png'),
	('P6000', 'Nike', 4, 111.99, 'nike-p6000.png'),
	('Us4 gelterrain', 'Asics', 5, 149.99, 'asiscs-us4sgelterrain.png'),
	('Jordan Max Aura 5', 'Nike', 6, 80, 'nike-jordanmaxaura5.png'),
	('Ultraboost', 'Adidas', 7, 88, 'adidas-ultraboost1.0.jpg'),
	('Nocta Air Zoom Drive', 'Nike', 8, 107, 'nike-noctaairzoomdrive.jpg');

-- Dump della struttura di tabella sitophp.utente
CREATE TABLE IF NOT EXISTS `utente` (
  `nome` text DEFAULT NULL,
  `cod_utente` int(11) NOT NULL AUTO_INCREMENT,
  `password` text DEFAULT NULL,
  `username` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cognome` char(50) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `comune` char(50) DEFAULT NULL,
  `indirizzo` char(50) NOT NULL,
  PRIMARY KEY (`cod_utente`,`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella sitophp.utente: ~4 rows (circa)
INSERT INTO `utente` (`nome`, `cod_utente`, `password`, `username`, `cognome`, `email`, `comune`, `indirizzo`) VALUES
	('Carlo', 1, '1234', 'Carlo', 'Brambilla', 'carlo.brambilla@gmail.com', 'Brugherio', 'via torazza'),
	('Gabriele', 2, '1234', 'Gabriele', 'Rossetti', 'Gabriele.rossetti@gmail.com', 'Trezzo', 'via torino'),
	('francesco ', 3, '1234', 'sessus', 'Sborbsus', 'sessus.sbrìorbsus@gmail.com', 'Giara', 'via capri'),
	('Lorenzo', 4, '1234', 'Livieri', 'Livieri', 'lorenzo.livieri@gmail.com', 'vimercate', 'via napoli');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

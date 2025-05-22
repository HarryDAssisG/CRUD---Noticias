-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.4.3 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para p006
CREATE DATABASE IF NOT EXISTS `p006` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `p006`;

-- Copiando estrutura para tabela p006.categoria_noticia
CREATE TABLE IF NOT EXISTS `categoria_noticia` (
  `Categoria_ID` int NOT NULL AUTO_INCREMENT,
  `Categoria` varchar(50) DEFAULT NULL,
  `Sobre` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`Categoria_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela p006.categoria_noticia: ~5 rows (aproximadamente)
INSERT INTO `categoria_noticia` (`Categoria_ID`, `Categoria`, `Sobre`) VALUES
	(1, 'Política ', 'Notícias sobre governo, eleições, políticas públicas, debates e decisões legislativas.'),
	(2, 'Economia ', 'Informações sobre o mercado financeiro, inflação, emprego, negócios, investimentos e empreendedorismo.'),
	(3, 'Tecnologia ', 'Lançamentos de gadgets, inteligência artificial, segurança digital, startups e inovações.'),
	(6, 'Filmes e Series', 'Filmes e Series dublado, legendado, cinema Brasil'),
	(7, 'Categoria_nova', 'Nova categoria');

-- Copiando estrutura para tabela p006.tabela_noticias
CREATE TABLE IF NOT EXISTS `tabela_noticias` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Resumo` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Conteudo` varchar(700) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `Categoria_ID` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Categoria_CHAVE` (`Categoria_ID`),
  CONSTRAINT `Categoria_CHAVE` FOREIGN KEY (`Categoria_ID`) REFERENCES `categoria_noticia` (`Categoria_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela p006.tabela_noticias: ~1 rows (aproximadamente)
INSERT INTO `tabela_noticias` (`ID`, `Titulo`, `Resumo`, `Conteudo`, `Data`, `Categoria_ID`) VALUES
	(9, 'TESTE', 'TESTE', 'TESTE', '2025-05-22', 7);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

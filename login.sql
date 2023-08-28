-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 17-Mar-2023 às 19:21
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `login`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

DROP TABLE IF EXISTS `adm`;
CREATE TABLE IF NOT EXISTS `adm` (
  `idadm` int NOT NULL AUTO_INCREMENT,
  `adm` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idadm`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`idadm`, `adm`) VALUES
(1, 'não adm');

-- --------------------------------------------------------

--
-- Estrutura da tabela `certificado`
--

DROP TABLE IF EXISTS `certificado`;
CREATE TABLE IF NOT EXISTS `certificado` (
  `idcertificado` int NOT NULL AUTO_INCREMENT,
  `diciplina` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcertificado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `certificado`
--

INSERT INTO `certificado` (`idcertificado`, `diciplina`) VALUES
(1, 'não dicplina');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `idcursos` int NOT NULL AUTO_INCREMENT,
  `nomeCurso` varchar(100) DEFAULT NULL,
  `id_diciplina` int NOT NULL,
  PRIMARY KEY (`idcursos`,`id_diciplina`),
  KEY `id_diciplina` (`id_diciplina`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`idcursos`, `nomeCurso`, `id_diciplina`) VALUES
(0, 'não diciplina', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

DROP TABLE IF EXISTS `disciplinas`;
CREATE TABLE IF NOT EXISTS `disciplinas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomeDisciplina` varchar(100) DEFAULT NULL,
  `horasAula` int DEFAULT NULL,
  `cursos_idcursos` int NOT NULL,
  PRIMARY KEY (`id`,`cursos_idcursos`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id`, `nomeDisciplina`, `horasAula`, `cursos_idcursos`) VALUES
(1, 'não curso', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

DROP TABLE IF EXISTS `pagamentos`;
CREATE TABLE IF NOT EXISTS `pagamentos` (
  `idcursosPagos` int NOT NULL AUTO_INCREMENT,
  `curso` varchar(100) NOT NULL,
  `pagamento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcursosPagos`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `pagamentos`
--

INSERT INTO `pagamentos` (`idcursosPagos`, `curso`, `pagamento`) VALUES
(1, 'não curso', 'não pago');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE IF NOT EXISTS `pessoa` (
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `idadm` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `idpagamento` int NOT NULL,
  `idcertificado` int NOT NULL,
  `idcurso` int NOT NULL,
  PRIMARY KEY (`id`,`idadm`,`idpagamento`,`idcertificado`,`idcurso`),
  KEY `idadm` (`idadm`),
  KEY `idcertificado` (`idcertificado`),
  KEY `idpagamento` (`idpagamento`),
  KEY `idcurso` (`idcurso`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`email`, `senha`, `nome`, `idadm`, `id`, `idpagamento`, `idcertificado`, `idcurso`) VALUES
('william', '123', 'william', 1, 7, 1, 1, 0);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`id_diciplina`) REFERENCES `disciplinas` (`id`);

--
-- Limitadores para a tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD CONSTRAINT `pessoa_ibfk_1` FOREIGN KEY (`idadm`) REFERENCES `adm` (`idadm`),
  ADD CONSTRAINT `pessoa_ibfk_2` FOREIGN KEY (`idcertificado`) REFERENCES `certificado` (`idcertificado`),
  ADD CONSTRAINT `pessoa_ibfk_3` FOREIGN KEY (`idpagamento`) REFERENCES `pagamentos` (`idcursosPagos`),
  ADD CONSTRAINT `pessoa_ibfk_4` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`idcursos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

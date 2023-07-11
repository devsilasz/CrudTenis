-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 09-Jul-2023 às 22:04
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26


CREATE DATABASE `poo`;
USE `poo`;



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `poo`
--

DELIMITER $$
--
-- Procedimentos
--
DROP PROCEDURE IF EXISTS `AdicionarDados`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AdicionarDados` (IN `marca_param` VARCHAR(50), IN `size_param` VARCHAR(10), IN `modelo_param` VARCHAR(50))   BEGIN
  DECLARE marca_id INT;
  DECLARE size_id INT;

  -- Verifica se a marca já existe
  SELECT id INTO marca_id
  FROM marca
  WHERE marca = marca_param
  LIMIT 1;

  -- Se a marca não existe, cria uma nova
  IF marca_id IS NULL THEN
    INSERT INTO marca (marca) VALUES (marca_param);
    SET marca_id = LAST_INSERT_ID();
  END IF;

  -- Verifica se o tamanho já existe
  SELECT id INTO size_id
  FROM size
  WHERE size = size_param
  LIMIT 1;

  -- Se o tamanho não existe, cria um novo
  IF size_id IS NULL THEN
    INSERT INTO size (size) VALUES (size_param);
    SET size_id = LAST_INSERT_ID();
  END IF;

  -- Cria o modelo com as referências corretas
  INSERT INTO modelo (id_marca, id_size, modelo)
  VALUES (marca_id, size_id, modelo_param);

  SELECT LAST_INSERT_ID() AS modelo_id;
END$$

DROP PROCEDURE IF EXISTS `Proc_modelo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Proc_modelo` (IN `marca_param` VARCHAR(50), IN `size_param` VARCHAR(10), IN `modelo_param` VARCHAR(50))   BEGIN
  DECLARE marca_id INT;
  DECLARE size_id INT;
  
  -- Verifica se a marca já existe
  SELECT id INTO marca_id
  FROM marca
  WHERE marca = marca_param;
  
  -- Se a marca não existe, cria uma nova
  IF marca_id IS NULL THEN
    INSERT INTO marca (marca) VALUES (marca_param);
    SET marca_id = LAST_INSERT_ID();
  END IF;
  
  -- Verifica se o tamanho já existe
  SELECT id INTO size_id
  FROM size
  WHERE size = size_param;
  
  -- Se o tamanho não existe, cria um novo
  IF size_id IS NULL THEN
    INSERT INTO size (size) VALUES (size_param);
    SET size_id = LAST_INSERT_ID();
  END IF;
  
  -- Cria o modelo com as referências corretas
  INSERT INTO modelo (id_marca, id_size, modelo)
  VALUES (marca_id, size_id, modelo_param);
  
  SELECT LAST_INSERT_ID() AS modelo_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

DROP TABLE IF EXISTS `marca`;
CREATE TABLE IF NOT EXISTS `marca` (
  `id` int NOT NULL AUTO_INCREMENT,
  `marca` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf16;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`id`, `marca`) VALUES
(10, 'PUMA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo`
--

DROP TABLE IF EXISTS `modelo`;
CREATE TABLE IF NOT EXISTS `modelo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_marca` int DEFAULT NULL,
  `id_size` int DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_marca` (`id_marca`),
  KEY `id_size` (`id_size`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `modelospormarcaview`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `modelospormarcaview`;
CREATE TABLE IF NOT EXISTS `modelospormarcaview` (
`id` int
,`marca` varchar(50)
,`size` int
,`modelo` varchar(50)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `size`
--

DROP TABLE IF EXISTS `size`;
CREATE TABLE IF NOT EXISTS `size` (
  `id` int NOT NULL AUTO_INCREMENT,
  `size` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf16;

--
-- Extraindo dados da tabela `size`
--

INSERT INTO `size` (`id`, `size`) VALUES
(15, 41);

-- --------------------------------------------------------

--
-- Estrutura para vista `modelospormarcaview`
--
DROP TABLE IF EXISTS `modelospormarcaview`;

DROP VIEW IF EXISTS `modelospormarcaview`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `modelospormarcaview`  AS SELECT `m`.`id` AS `id`, `ma`.`marca` AS `marca`, `s`.`size` AS `size`, `m`.`modelo` AS `modelo` FROM ((`modelo` `m` join `marca` `ma` on((`m`.`id_marca` = `ma`.`id`))) join `size` `s` on((`s`.`id` = `m`.`id_size`)))  ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

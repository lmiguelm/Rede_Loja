-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 21-Maio-2019 às 03:11
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `rede_loja`
--
CREATE DATABASE IF NOT EXISTS `rede_loja` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rede_loja`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE IF NOT EXISTS `cidade` (
  `id_cidade` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cod_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_cidade`),
  KEY `cod_estado` (`cod_estado`),
  KEY `cod_estado_2` (`cod_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`id_cidade`, `nome`, `cod_estado`) VALUES
(21, 'Belo Horizonte', 11),
(22, 'Araraquara', 9),
(24, 'Curitiba', 14),
(25, 'Porto Alegre', 12),
(26, 'Florianópolis', 13),
(29, 'Bebedouro', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `data_nascimento` date NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `sexo`, `email`, `data_nascimento`) VALUES
(11, 'Miguel', 'm', 'miguel@ifsp.com', '2001-07-18'),
(19, 'João', 'm', 'joao@ifsp.com', '1991-02-11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_loja`
--

CREATE TABLE IF NOT EXISTS `cliente_loja` (
  `id_cliente_loja` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cliente` int(11) NOT NULL,
  `cod_loja` int(11) NOT NULL,
  PRIMARY KEY (`id_cliente_loja`),
  KEY `cod_cliente` (`cod_cliente`),
  KEY `cod_loja` (`cod_loja`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `cliente_loja`
--

INSERT INTO `cliente_loja` (`id_cliente_loja`, `cod_cliente`, `cod_loja`) VALUES
(5, 11, 11),
(8, 19, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `sigla` char(2) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`id_estado`, `nome`, `sigla`) VALUES
(9, 'São Paulo', 'SP'),
(11, 'Minas gerais', 'MG'),
(12, 'Rio grande do sul', 'RS'),
(13, 'Santa Catarina', 'SC'),
(14, 'Paraná', 'PR');

-- --------------------------------------------------------

--
-- Stand-in structure for view `info_cliente`
--
CREATE TABLE IF NOT EXISTS `info_cliente` (
`ID` int(11)
,`Cliente` varchar(50)
,`Loja` varchar(50)
,`Cidade` varchar(50)
,`Estado` char(2)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `info_cliente_loja`
--
CREATE TABLE IF NOT EXISTS `info_cliente_loja` (
`ID` int(11)
,`Cliente` varchar(50)
,`Loja` varchar(50)
,`Cidade` varchar(50)
,`Estado` char(2)
);
-- --------------------------------------------------------

--
-- Estrutura da tabela `loja`
--

CREATE TABLE IF NOT EXISTS `loja` (
  `id_loja` int(11) NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(50) NOT NULL,
  `nome_fantasia` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cod_cidade` int(11) NOT NULL,
  PRIMARY KEY (`id_loja`),
  KEY `cod_cidade` (`cod_cidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `loja`
--

INSERT INTO `loja` (`id_loja`, `razao_social`, `nome_fantasia`, `email`, `cod_cidade`) VALUES
(10, 'Alimentos', 'Extra', 'extra@email.com', 22),
(11, 'Roupas', 'Nike', 'nike@email.com', 21),
(12, 'Roupas', 'Adidas', 'adidas@email.com', 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `permissao` int(11) NOT NULL,
  `data_nascimento` date NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`, `sexo`, `permissao`, `data_nascimento`) VALUES
(10, 'Luis Miguel', 'lmiguelmarcelo1@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Masc', 0, '2001-07-18');

-- --------------------------------------------------------

--
-- Structure for view `info_cliente`
--
DROP TABLE IF EXISTS `info_cliente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_cliente` AS select `cliente_loja`.`id_cliente_loja` AS `ID`,`cliente`.`nome` AS `Cliente`,`loja`.`nome_fantasia` AS `Loja`,`cidade`.`nome` AS `Cidade`,`estado`.`sigla` AS `Estado` from ((((`cliente_loja` join `cliente` on((`cliente_loja`.`cod_cliente` = `cliente`.`id_cliente`))) join `loja` on((`cliente_loja`.`cod_loja` = `loja`.`id_loja`))) join `cidade` on((`loja`.`cod_cidade` = `cidade`.`id_cidade`))) join `estado` on((`cidade`.`cod_estado` = `estado`.`id_estado`))) order by `cliente`.`nome`;

-- --------------------------------------------------------

--
-- Structure for view `info_cliente_loja`
--
DROP TABLE IF EXISTS `info_cliente_loja`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_cliente_loja` AS (select `cliente_loja`.`id_cliente_loja` AS `ID`,`cliente`.`nome` AS `Cliente`,`loja`.`nome_fantasia` AS `Loja`,`cidade`.`nome` AS `Cidade`,`estado`.`sigla` AS `Estado` from ((((`cliente_loja` join `cliente` on((`cliente_loja`.`cod_cliente` = `cliente`.`id_cliente`))) join `loja` on((`cliente_loja`.`cod_loja` = `loja`.`id_loja`))) join `cidade` on((`loja`.`cod_cidade` = `cidade`.`id_cidade`))) join `estado` on((`cidade`.`cod_estado` = `estado`.`id_estado`))) order by `cliente`.`nome`);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `cidade_ibfk_1` FOREIGN KEY (`cod_estado`) REFERENCES `estado` (`id_estado`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `cliente_loja`
--
ALTER TABLE `cliente_loja`
  ADD CONSTRAINT `cliente_loja_ibfk_1` FOREIGN KEY (`cod_cliente`) REFERENCES `cliente` (`id_cliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_loja_ibfk_2` FOREIGN KEY (`cod_loja`) REFERENCES `loja` (`id_loja`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `loja`
--
ALTER TABLE `loja`
  ADD CONSTRAINT `loja_ibfk_1` FOREIGN KEY (`cod_cidade`) REFERENCES `cidade` (`id_cidade`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 15-Out-2015 às 15:07
-- Versão do servidor: 5.5.40-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `dash_db2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dash_bufferlevel`
--

CREATE TABLE IF NOT EXISTS `dash_bufferlevel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(300) NOT NULL,
  `level` varchar(300) NOT NULL,
  `fk_execution` int(11) NOT NULL,
  `bitrate` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_execucao` (`fk_execution`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dash_delay`
--

CREATE TABLE IF NOT EXISTS `dash_delay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(300) NOT NULL,
  `delay` varchar(300) NOT NULL,
  `quality` int(11) NOT NULL,
  `fk_execution` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_execution` (`fk_execution`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dash_emos`
--

CREATE TABLE IF NOT EXISTS `dash_emos` (
  `id` int(11) NOT NULL,
  `fk_execution` int(11) NOT NULL,
  `emos` float NOT NULL,
  `rqsr` int(11) NOT NULL,
  `amplitude_switch` int(11) NOT NULL,
  `rer` int(11) NOT NULL,
  `red` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dash_execution`
--

CREATE TABLE IF NOT EXISTS `dash_execution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `execution_inicial_time` varchar(300) NOT NULL,
  `execution_final_time` varchar(300) NOT NULL,
  `algorithm` varchar(300) NOT NULL,
  `url_mpd` varchar(300) NOT NULL,
  `stream` varchar(300) NOT NULL,
  `scenario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `execution_time` (`execution_inicial_time`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=259 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dash_experiments`
--

CREATE TABLE IF NOT EXISTS `dash_experiments` (
  `id_experiment` int(11) NOT NULL AUTO_INCREMENT,
  `num_experiment` int(11) NOT NULL,
  `fk_execution` int(11) NOT NULL,
  PRIMARY KEY (`id_experiment`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dash_throughseg`
--

CREATE TABLE IF NOT EXISTS `dash_throughseg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stream` varchar(10) NOT NULL,
  `time` varchar(300) NOT NULL,
  `start_time` varchar(300) NOT NULL,
  `response_time` varchar(300) NOT NULL,
  `finish_time` varchar(300) NOT NULL,
  `size_seg` varchar(300) NOT NULL,
  `duration` varchar(300) NOT NULL,
  `quality` int(11) NOT NULL,
  `bitrate` varchar(300) NOT NULL,
  `throughseg` varchar(300) NOT NULL,
  `fk_execution` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_execution` (`fk_execution`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46657 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

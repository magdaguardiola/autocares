-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 14, 2019 at 10:25 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `primerApellido` varchar(30) NOT NULL,
  `segundoApellido` varchar(30) NOT NULL,
  `edad` int(3) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `codigoPostal` varchar(5) DEFAULT NULL,
  `provincia` varchar(30) DEFAULT NULL,
  `municipio` varchar(30) DEFAULT NULL,
  `pais` varchar(30) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `telFijo` varchar(9) DEFAULT NULL,
  `telMovil` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nombre`, `primerApellido`, `segundoApellido`, `edad`, `direccion`, `codigoPostal`, `provincia`, `municipio`, `pais`, `email`, `telFijo`, `telMovil`) VALUES
(1, 'luisito', 'Gonzalez', 'Martinez', 22, 'C/luna nº 4,5B', '36845', 'Pontevedra', 'Vigo', 'España', 'LG@mail.com', '986742753', '686149832'),
(2, 'Marisita1', 'Graña', 'Toledo', 21, 'C/sol nº 5,4A', '36852', 'Pontevedra', 'Vigo', 'España', 'MG@mail.com', '986123587', '686452145'),
(3, 'Magdalena', 'Rios', 'Guardiola', 18, 'C/marte nº4,6A', '36820', 'Pontevedra', 'Porriño', 'España', 'magdarg@mail.com', '986336699', '676981547'),
(6, 'Marcos', 'Campos', 'Rios', 18, 'C/marte nº4,6A', '36820', 'Pontevedra', 'Porriño', 'España', 'marcoscr@mail.com', '986336699', '676922655');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

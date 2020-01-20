-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 06:29 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE tienda;

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(20,0) NOT NULL,
  `descripcion` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `descripcion`, `img`) VALUES
(1, 'GUITARRA ELECTRICA TAYLOR', '200', 'Fundada en 1974 por Bob Taylor y Kurt Listug, las guitarras Taylor han evolucionado hasta convertirse en uno de los mejores.', 'src\\productos\\taylor.png'),
(2, 'GUITARRA ELECTRICA TIPO JAZZ YAMAHA', '400', 'Las guitarras de semi-caja Yamaha han sufrido decenas de cambios y alteraciones desde 1966, siempre respondiendo a las exigencias. ', 'src\\productos\\yamahajazz.png'),
(3, 'GUITARRA ELECTRICA IBANEZ GORGE BENSON MARRON SUNBURST', '350', 'George Benson es uno de los guitarrista de jazz más populares de las últimas décadas, ha recibido múltiples elogios.', 'src\\productos\\ibane.png'),
(4, 'GUITARRA ELECTRICA GRETSCH G5420T', '430', 'Cuando el equipo de investigación y desarrollo de Gretsch desempolvó un micrófono Filter’Tron de los que ellos llaman el fenomenal. ', 'src\\productos\\gretsch.png'),
(5, 'GUITARRA ELECTRICA SQUIER STRATOCASTER', '150', 'La Squier Standard Stratocaster Left Handed (para zurdos) es una gran guitarra, con una sensación tradicional y un tacto moderno. ', 'src\\productos\\squier.png'),
(6, 'GUITARRA ELECTROACUSTICA YAMAHA SILENT', '550', 'La nueva Silent SLG110S, con cuerdas de acero, posee las características de una guitarra acústica. ', 'src\\productos\\silent.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

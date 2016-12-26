-- phpMyAdmin SQL Dump
-- version 4.5.0-rc1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 26, 2016 at 05:18 PM
-- Server version: 5.5.52-0+deb8u1
-- PHP Version: 5.6.27-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_iw_meuslivros`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_livro`
--

CREATE TABLE `tb_livro` (
  `id_livro` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `editora` varchar(100) NOT NULL,
  `ano` int(11) NOT NULL,
  `criado_em` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_livro`
--

INSERT INTO `tb_livro` (`id_livro`, `usuario_id`, `titulo`, `autor`, `editora`, `ano`, `criado_em`) VALUES
(1, 3, 'Mãe, por que 4:20 é a hora da maconha?', 'Junim do Zoião', 'Arqueiro', 2010, '26/12/2016 17:07:16'),
(2, 3, 'Você é... um caminhão carregado de Rapadura', 'Coxinha', 'Cia das Letras', 2014, '26/12/2016 17:07:53'),
(3, 3, 'Quer frescar fresque, mar num fique frascano não!', 'Bebado Tabosa', 'Novatec', 2004, '26/12/2016 17:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `nome`, `email`, `senha`) VALUES
(1, 'Alessandro Feitoza', 'eu@alessandrofeitoza.eu', '$2y$10$YPx2ZWRJS4KSsm9B4pFeSOKZzlAa5OUYpy/STxdMaYLTJ6fw7u8Ym'),
(2, 'Rapadura Doce', 'rapadura@doce.org', '$2y$10$yt5AwFR/CwMqNmmvwNsA3OBLEZvVSpfynw/La0BsTaePsZ8wGaTuu'),
(3, 'Zezim das Tapiocas', 'zezim@tapiocas.com', '$2y$10$iMGzpvXwdTXQwVhK93kjWepKgRx3GFjEmplLOAtnMDdc40OvAf1pG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_livro`
--
ALTER TABLE `tb_livro`
  ADD PRIMARY KEY (`id_livro`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_livro`
--
ALTER TABLE `tb_livro`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

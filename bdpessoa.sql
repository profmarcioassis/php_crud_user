-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Jan-2022 às 13:02
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdpessoa`
--
CREATE DATABASE IF NOT EXISTS `bdpessoa` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bdpessoa`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbestcivil`
--

CREATE TABLE `tbestcivil` (
  `idEstCivil` int(11) NOT NULL,
  `estadoCivil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONAMENTOS PARA TABELAS `tbestcivil`:
--

--
-- Extraindo dados da tabela `tbestcivil`
--

INSERT INTO `tbestcivil` (`idEstCivil`, `estadoCivil`) VALUES
(1, 'Casado(a)'),
(3, 'Divorciado(a)'),
(5, 'Enrolado'),
(6, 'Ficante'),
(2, 'Solteiro(a)'),
(7, 'Teste'),
(4, 'Viúvo(a)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbimagens`
--

CREATE TABLE `tbimagens` (
  `idImagem` int(11) NOT NULL,
  `nomeImagem` varchar(100) NOT NULL,
  `extensaoImagem` varchar(3) NOT NULL,
  `idPessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONAMENTOS PARA TABELAS `tbimagens`:
--   `idPessoa`
--       `tbpessoa` -> `idPessoa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpessoa`
--

CREATE TABLE `tbpessoa` (
  `idPessoa` int(11) NOT NULL,
  `nomePessoa` varchar(45) NOT NULL,
  `sobrenomePessoa` varchar(45) NOT NULL,
  `idEstCivil` int(11) NOT NULL,
  `Sexo` varchar(12) NOT NULL,
  `dataNasc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONAMENTOS PARA TABELAS `tbpessoa`:
--   `idEstCivil`
--       `tbestcivil` -> `idEstCivil`
--

--
-- Extraindo dados da tabela `tbpessoa`
--

INSERT INTO `tbpessoa` (`idPessoa`, `nomePessoa`, `sobrenomePessoa`, `idEstCivil`, `Sexo`, `dataNasc`) VALUES
(32, 'Daniel', 'Assis Miranda', 2, 'Masculino', '1980-12-07'),
(33, 'Márcio', 'Assis Miranda', 1, 'Masculino', '1979-11-17'),
(38, 'Pedro', 'Pereira da Silva', 2, 'Masculino', '1985-01-10'),
(39, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(47, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(49, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(50, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(51, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(52, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(53, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(54, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(55, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(56, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(57, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(58, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(59, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(60, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(61, 'Maria', 'da Penha Silva', 3, 'Feminino', NULL),
(62, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(63, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(64, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(65, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(66, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(67, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(68, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(69, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(70, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(71, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(72, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(73, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(74, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(75, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(76, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(77, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(78, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(79, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(80, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(81, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(82, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(83, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(84, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(85, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(86, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(87, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(88, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(89, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(90, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(91, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(92, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(93, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(94, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(95, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(96, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(97, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(98, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(99, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(100, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(101, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(102, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(103, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(104, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(105, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(106, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(107, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(108, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(109, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(110, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(111, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(112, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(113, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(114, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(115, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(116, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(117, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(118, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(119, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(120, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(121, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(122, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(123, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(124, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(125, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(126, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(127, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(128, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(129, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(130, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(131, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(132, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(133, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(134, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(135, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(136, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(137, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(138, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(139, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(140, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(141, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(142, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(143, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(144, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(145, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(146, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(147, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(148, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(149, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(150, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(151, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(152, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(153, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(154, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(155, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(156, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(157, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(158, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(159, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(160, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(161, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(162, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(163, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(164, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(165, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(166, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(167, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(168, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(169, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(170, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(171, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(172, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(173, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(174, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(175, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(176, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(177, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(178, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(179, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(180, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(181, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(182, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(183, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(184, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(185, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(186, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(187, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(188, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(189, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(190, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(191, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(192, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(193, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(194, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(195, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(196, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(197, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(198, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(199, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(200, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(201, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(202, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(203, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(204, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(205, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(206, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(207, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(208, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(209, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(210, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(211, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(212, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(213, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(214, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(215, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(216, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(217, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(218, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(219, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(220, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(221, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(222, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(223, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(224, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(225, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(226, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(227, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(228, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(229, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(230, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(231, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(232, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(233, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(234, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(235, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(236, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(237, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(238, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(239, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(240, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(241, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(242, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(243, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(244, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(245, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(246, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(247, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(248, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(249, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(250, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(251, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(252, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(253, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(254, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(255, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(256, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(257, 'Joquim', 'Silva', 3, 'Masculino', NULL),
(258, 'Maria', 'da Penha', 3, 'Feminino', NULL),
(260, 'Márcio', 'Assis', 1, 'Masculino', '2021-12-06'),
(261, 'Raquel', 'Arêdes', 1, 'Feminino', '1981-03-06'),
(262, 'José da ', 'Silva', 1, 'Masculino', '1970-04-06'),
(263, 'Anderson', 'gabriel', 2, 'Masculino', '1980-01-01'),
(264, 'Thulio', 'Fonseca', 2, 'Masculino', '2022-01-10'),
(265, 'Fabrício', 'Silva', 2, 'Masculino', '2022-01-09'),
(266, 'José', 'da Silva Oliveira', 2, 'Masculino', '2022-01-03'),
(267, 'Maria', 'da Penha', 6, 'Feminino', '2021-06-12'),
(268, 'MARCIO', 'MIRANDA', 1, 'Masculino', '2022-01-03'),
(269, 'MARCIO', 'MIRANDA', 1, 'Masculino', '2022-01-03'),
(270, 'MARCIO', 'MIRANDA', 1, 'Masculino', '2022-01-03'),
(271, 'MARCIO', 'MIRANDA', 1, 'Masculino', '2022-01-03'),
(272, 'MARCIO', 'MIRANDA', 1, 'Masculino', '2022-01-03'),
(273, 'MARCIO', 'MIRANDA', 1, 'Masculino', '2022-01-17'),
(274, 'MARCIO', 'MIRANDA', 1, 'Masculino', '2022-01-17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbuser`
--

CREATE TABLE `tbuser` (
  `iduser` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(1) NOT NULL DEFAULT 'N',
  `obsuser` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONAMENTOS PARA TABELAS `tbuser`:
--

--
-- Extraindo dados da tabela `tbuser`
--

INSERT INTO `tbuser` (`iduser`, `email`, `password`, `user`, `name`, `type`, `obsuser`) VALUES
(1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin', 'Márcio Assis', 'A', 'Usuário adminisrador'),
(2, 'ifmg@ifmg.edu.br', '202cb962ac59075b964b07152d234b70', 'ifmg', 'IFMG-OB', 'O', 'Usuário Comun'),
(3, 'info03@gmail.com', '202cb962ac59075b964b07152d234b70', 'info03', 'Informática 03', 'A', ''),
(6, 'miley@gmail.com', '202cb962ac59075b964b07152d234b70', 'miely', 'Miely Pereira', 'O', ''),
(22, 'assismiranda@gmail.com', '202cb962ac59075', 'marcio', 'Márcio Assis Miranda', 'O', ''),
(25, 'aredes@gmail.com', '4297f44b1395523', 'raquel', 'Raquel Arêdes', 'O', ''),
(29, 'fdsaf@gmail.com', 'c67b8c67558a2e6', 'fadsf', 'dfasdf', 'O', ''),
(33, 'daniel@gmail.com', '202cb962ac59075b964b07152d234b70', 'daniel', 'Daniel', 'O', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbestcivil`
--
ALTER TABLE `tbestcivil`
  ADD PRIMARY KEY (`idEstCivil`),
  ADD UNIQUE KEY `estadoCivil` (`estadoCivil`);

--
-- Índices para tabela `tbimagens`
--
ALTER TABLE `tbimagens`
  ADD PRIMARY KEY (`idImagem`),
  ADD KEY `idPessoa` (`idPessoa`);

--
-- Índices para tabela `tbpessoa`
--
ALTER TABLE `tbpessoa`
  ADD PRIMARY KEY (`idPessoa`),
  ADD KEY `idEstCivil` (`idEstCivil`);

--
-- Índices para tabela `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `email` (`email`,`user`),
  ADD UNIQUE KEY `email_3` (`email`,`user`),
  ADD UNIQUE KEY `email_4` (`email`,`user`),
  ADD UNIQUE KEY `email_5` (`email`,`user`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `email_2` (`email`,`user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbestcivil`
--
ALTER TABLE `tbestcivil`
  MODIFY `idEstCivil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tbimagens`
--
ALTER TABLE `tbimagens`
  MODIFY `idImagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbpessoa`
--
ALTER TABLE `tbpessoa`
  MODIFY `idPessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT de tabela `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbimagens`
--
ALTER TABLE `tbimagens`
  ADD CONSTRAINT `tbimagens_ibfk_1` FOREIGN KEY (`idPessoa`) REFERENCES `tbpessoa` (`idPessoa`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tbpessoa`
--
ALTER TABLE `tbpessoa`
  ADD CONSTRAINT `tbpessoa_ibfk_1` FOREIGN KEY (`idEstCivil`) REFERENCES `tbestcivil` (`idEstCivil`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

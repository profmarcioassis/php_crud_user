-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Fev-2021 às 22:41
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.1

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
CREATE DATABASE IF NOT EXISTS `bdpessoa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
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
-- Extraindo dados da tabela `tbestcivil`
--

INSERT INTO `tbestcivil` (`idEstCivil`, `estadoCivil`) VALUES
(1, 'Casado(a)'),
(3, 'Divorciado(a)'),
(5, 'Enrolado'),
(6, 'Ficante'),
(2, 'Solteiro(a)'),
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpessoa`
--

CREATE TABLE `tbpessoa` (
  `idPessoa` int(11) NOT NULL,
  `nomePessoa` varchar(45) NOT NULL,
  `sobrenomePessoa` varchar(45) NOT NULL,
  `idadePessoa` int(11) NOT NULL,
  `idEstCivil` int(11) NOT NULL,
  `Sexo` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbpessoa`
--

INSERT INTO `tbpessoa` (`idPessoa`, `nomePessoa`, `sobrenomePessoa`, `idadePessoa`, `idEstCivil`, `Sexo`) VALUES
(32, 'Samira', 'Borges', 18, 2, 'Feminino'),
(33, 'Márcio', 'Miranda', 41, 1, 'Masculino'),
(36, 'João ', 'Paulo', 25, 1, 'Masculino');

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
-- Extraindo dados da tabela `tbuser`
--

INSERT INTO `tbuser` (`iduser`, `email`, `password`, `user`, `name`, `type`, `obsuser`) VALUES
(1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin', 'Márcio Assis', 'A', 'Usuário adminisrador'),
(2, 'ifmg@ifmg.edu.br', '202cb962ac59075b964b07152d234b70', 'ifmg', 'IFMG-OB', 'O', 'Usuário Comun'),
(3, 'info03@gmail.com', '202cb962ac59075b964b07152d234b70', 'info03', 'Informática 03', 'A', ''),
(6, 'miley@gmail.com', '202cb962ac59075b964b07152d234b70', 'miely', 'Miely Pereira', 'O', ''),
(22, 'assismiranda@gmail.com', '202cb962ac59075', 'marcio', 'Márcio Assis Miranda', 'O', ''),
(25, 'aredes@gmail.com', '4297f44b1395523', 'raquel', 'Raquel Arêdes', 'O', ''),
(26, 'gracaassis@gmail.com', '202cb962ac59075', 'gracasassis', 'Maria das Gra?as Assis', 'O', ''),
(27, 'marcio@gmail.com', '81dc9bdb52d04dc', 'marcio', 'M?rcio', 'A', ''),
(29, 'fdsaf@gmail.com', 'c67b8c67558a2e6', 'fadsf', 'dfasdf', 'O', ''),
(32, 'assismiranda@gmail.com', '202cb962ac59075b964b07152d234b70', 'marcioassis', 'M?rcio Assis Miranda', 'A', '');

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
  MODIFY `idEstCivil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbimagens`
--
ALTER TABLE `tbimagens`
  MODIFY `idImagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbpessoa`
--
ALTER TABLE `tbpessoa`
  MODIFY `idPessoa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT;

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

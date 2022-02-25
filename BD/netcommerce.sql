-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17-Fev-2022 às 12:59
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netcommerce`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE `config` (
  `ID` varchar(10) NOT NULL DEFAULT '1',
  `Proximo_Prod` int(11) NOT NULL,
  `Proximo_User` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`ID`, `Proximo_Prod`, `Proximo_User`) VALUES
('1', 15, 'u10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `Id_Funcionario` varchar(10) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Tipo` varchar(5) NOT NULL,
  `Senha` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`Id_Funcionario`, `Nome`, `Tipo`, `Senha`) VALUES
('f0001', 'Mateus Tango', 'admin', 1234);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `Id_Produto` int(11) NOT NULL,
  `Id_Usuario` varchar(10) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Tipo` varchar(30) NOT NULL,
  `Preco` int(11) NOT NULL DEFAULT '0',
  `Imagem` varchar(100) NOT NULL,
  `Video` varchar(100) DEFAULT NULL,
  `Descricao` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`Id_Produto`, `Id_Usuario`, `Nome`, `Tipo`, `Preco`, `Imagem`, `Video`, `Descricao`) VALUES
(3, 'u1', 'Nokia', 'Eletronico', 10000, 'nokia.jpg', NULL, 'Telefone Nokia'),
(4, 'u1', 'Samsung', 'Eletronico', 40000, 'samsung.jpg', NULL, 'Telefone Samsung'),
(5, 'u2', 'Camiseta', 'Vesturario', 5000, 'camiseta.jpg\r\n', NULL, 'Camiseta'),
(7, 'u4', 'Itel', 'Eletronico', 3000, 's.jpg\r\n', NULL, 'Telefone Itel'),
(8, 'u5', 'Hp', 'Eletronico', 10000, 'pc.jpg\r\n', NULL, 'Computador HP'),
(10, 'u7', 'MAC OS', 'Eletronico', 250000, 'Macbook-Air.jpg\r\n', NULL, 'Comoutador MAC OS'),
(24, 'u9', 'Hyundai - Elantra', 'Viatura', 2500000, 'teste', NULL, 'Tempo de uso 2 anos. \nEm perfeitas condiÃ§Ãµes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtoaceite`
--

CREATE TABLE `produtoaceite` (
  `Id_Produto` int(11) NOT NULL,
  `Id_Usuario` varchar(10) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Tipo` varchar(50) NOT NULL,
  `Preco` int(11) NOT NULL,
  `Imagem` varchar(200) NOT NULL,
  `Video` varchar(200) DEFAULT NULL,
  `Descricao` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtoaceite`
--

INSERT INTO `produtoaceite` (`Id_Produto`, `Id_Usuario`, `Nome`, `Tipo`, `Preco`, `Imagem`, `Video`, `Descricao`) VALUES
(1, 'u1', 'Huawei', 'Eletronico', 50000, 'pink.jpg', NULL, 'Telefone Rosa'),
(2, 'u1', 'Alcatel', 'Eletronico', 11000, 'alcatel.jpg', NULL, 'Telefone Alcatel'),
(5, 'u2', 'Camisola - Zara', 'Roupa', 4000, 'camiseta.jpg', NULL, 'Camisola zara. 2 meses de uso em bom estado'),
(6, 'u3', 'Impressora', 'Eletronico', 125000, 'im.jpg', NULL, 'Impressora'),
(9, 'u6', 'LG', 'Eletronico', 72000, 'mLG.jpg', NULL, 'Televisor LG'),
(11, 'u8', 'MAC', 'Eletronico', 100000, 'mac.jpg', NULL, 'Computador MAC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `Id_Usuario` varchar(20) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Senha` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `Nome`, `Email`, `Senha`) VALUES
('u9', 'Mateus', 'mt@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`Id_Funcionario`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`Id_Produto`);

--
-- Indexes for table `produtoaceite`
--
ALTER TABLE `produtoaceite`
  ADD PRIMARY KEY (`Id_Produto`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_Usuario`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `Id_Produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

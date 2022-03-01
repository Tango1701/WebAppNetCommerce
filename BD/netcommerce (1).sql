-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Mar-2022 às 18:10
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
('1', 79, 'u14');

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
(4, 'u1', 'Samsung', 'Eletronico', 40000, 'samsung.jpg', NULL, 'Telefone Samsung'),
(76, 'u13', 'Auscultadores - Beats', 'Eletronico', 15000, 'h.jpg', 'null', 'Auscultadores Beats em bom estado. Como novo'),
(77, 'u9', 'Blue Shoes - Base', 'Indumentaria', 35000, 'blue_shoes.jpg', 'null', 'Sapatos em dia.'),
(78, 'u11', 'FogÃ£o - Eletrico', 'Eletrodomestico', 100000, '2f0b68862b5ffee44a94676.mobile-gallery-large.jpg', 'null', 'FogÃ£o eletrico como novo. 2 meses de uso.Â´\r\n5 bocas e forno.');

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
  `Descricao` varchar(1000) NOT NULL,
  `Estado` varchar(20) NOT NULL DEFAULT 'Activo',
  `Time` date NOT NULL DEFAULT '2022-01-01'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtoaceite`
--

INSERT INTO `produtoaceite` (`Id_Produto`, `Id_Usuario`, `Nome`, `Tipo`, `Preco`, `Imagem`, `Video`, `Descricao`, `Estado`, `Time`) VALUES
(1, 'u1', 'Huawei', 'Eletronico', 50000, 'pink.jpg', NULL, 'Telefone Rosa', 'Inactivo', '2022-03-01'),
(2, 'u1', 'Alcatel', 'Eletronico', 11000, 'alcatel.jpg', NULL, 'Telefone Alcatel', 'Inactivo', '2022-03-01'),
(3, 'u1', 'Nokia', 'Eletronico', 10000, 'nokia.jpg', NULL, 'Telefone Nokia', 'Inactivo', '2022-03-01'),
(5, 'u2', 'Camisola - Zara', 'Roupa', 4000, 'camiseta.jpg', NULL, 'Camisola zara. 2 meses de uso em bom estado', 'Inactivo', '2022-03-01'),
(6, 'u3', 'Impressora', 'Eletronico', 125000, 'im.jpg', NULL, 'Impressora', 'Inactivo', '2022-03-01'),
(7, 'u4', 'Itel', 'Eletronico', 3000, 's.jpg\r\n', NULL, 'Telefone Itel', 'Activo', '2022-03-01'),
(8, 'u5', 'Hp', 'Eletronico', 10000, 'pc.jpg', NULL, 'Computador HP', 'Activo', '2022-03-01'),
(9, 'u6', 'LG', 'Eletronico', 72000, 'mLG.jpg', NULL, 'Televisor LG', 'Activo', '2022-03-01'),
(10, 'u7', 'MacBook Pro', 'Eletronico', 250000, 'Macbook-Air.jpg', NULL, 'MacBook Pro\nRAM - 8GB\nSSD - 250GB\nHD - 1TB\nProcessador - Intel Core i7 (10th Generation)\nGPU - NVIDIA GeForce GTX\n2 anos de uso', 'Activo', '2022-03-01'),
(11, 'u8', 'MAC', 'Eletronico', 100000, 'mac.jpg', NULL, 'Computador MAC', 'Activo', '2022-03-01'),
(24, 'u9', 'Hyundai - Elantra', 'Viatura', 2500000, 'elantra.jpg', NULL, 'Tempo de uso 2 anos. \nEm perfeitas condiÃ§Ãµes', 'Inactivo', '2022-03-01'),
(30, 'u11', 'Mercedes - Benz', 'Viatura', 10000000, 'Mercedes_Car.jpg', NULL, 'Tempo de uso 2 anos. \nMercedez em boas condiÃ§Ãµes', 'Activo', '2022-03-01'),
(67, 'u11', 'Adidas - Terrain', 'Indumentaria', 12000, '4.png', NULL, 'Adidas das tropas', 'Activo', '2022-03-01'),
(68, 'u11', 'Adidas - Sangue', 'Indumentaria', 30000, '3.png', NULL, 'Adidas Vermelhas com 3 meses de uso. Em bom estado. \r\n', 'Activo', '2022-03-01'),
(69, 'u11', 'Iphone - 8', 'Eletronico', 240000, 'i3.jfif', NULL, '1 ano de uso. Em bom estado. \r\nUltimas actualizaÃ§Ãµes feitas.\r\n4GB RAM\r\nProcessador Radeon\r\nCamera 16MP\r\nArmazenamento 128GB', 'Activo', '2022-03-01'),
(70, 'u11', 'Nike - Jordan', 'Indumentaria', 150000, '2.png', NULL, 'Jordans da Regra. 7 meses de uso. Em bom estado.', 'Activo', '2022-03-01'),
(71, 'u11', 'Mercedes - Shoes', 'Indumentaria', 200000, 'Mercedes_Shoes.jpg', NULL, 'Mercedes Shoes. 1 mes de uso. Perfeitas condiÃ§Ãµes.\r\nPra ricos.', 'Activo', '2022-03-01'),
(72, 'u11', 'Iphone - X', 'Eletronico', 320000, 'iphone8.jpeg', NULL, 'Iphone da regra. 2 anos de uso. Bom estado\r\n128GB de Armazenamento\r\nCamera 32MP', 'Activo', '2022-03-01'),
(73, 'u11', 'BMX - Cross', 'Viatura', 30000, 'bicicleta.jpg', NULL, 'Bicicleta BMX em boas condiÃ§Ãµes\r\n1 ano de uso\r\n21 mudanÃ§as\r\nCor azul', 'Activo', '2022-03-01'),
(74, 'u11', 'Midea - Fridge', 'Eletrodomestico', 5000000, 'FrigorificoLg.jpg', NULL, 'Geladeira Midea. Como nova\r\n12 BTU\r\n900 Kg\r\nTemperatura minima 12 ÂºC', 'Activo', '2022-03-01'),
(75, 'u13', 'Midea - Crystal', 'Eletrodomestico', 100000, 'ac_midea.jpg', NULL, 'Ar condicionado Midea em boas condiÃ§Ãµes. 2 anos de uso. \r\n12 BTU\r\n220 V\r\n10A\r\n', 'Activo', '2022-03-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtopago`
--

CREATE TABLE `produtopago` (
  `ID` int(11) NOT NULL,
  `Id_Usuario` varchar(20) NOT NULL,
  `Id_Produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtopago`
--

INSERT INTO `produtopago` (`ID`, `Id_Usuario`, `Id_Produto`) VALUES
(1, 'u9', 6),
(2, 'u11', 24),
(3, 'u11', 5),
(4, 'u11', 1),
(7, 'u9', 2),
(8, 'u13', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `Nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`Nome`) VALUES
('Eletrodomestico'),
('Eletronico'),
('Indumentaria'),
('Viatura');

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
('u10', 'Teste', 'teste@gmail.com', 'teste'),
('u11', 'nome', 'email', 'senha'),
('u13', 'Deolinda Pacheco', 'dp@gmail.com', '1234'),
('u9', 'Mateus Tango', 'mt@gmail.com', '1234');

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
-- Indexes for table `produtopago`
--
ALTER TABLE `produtopago`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`Nome`);

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
  MODIFY `Id_Produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `produtopago`
--
ALTER TABLE `produtopago`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

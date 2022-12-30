-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 13-Jul-2020 às 11:27
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u162874783_inscricoes_ped`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `eve_id` int(11) NOT NULL,
  `eve_descricao` varchar(255) DEFAULT NULL,
  `eve_data` varchar(255) DEFAULT NULL,
  `eve_horas` varchar(255) DEFAULT NULL,
  `eve_termino` varchar(255) DEFAULT NULL,
  `eve_local` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`eve_id`, `eve_descricao`, `eve_data`, `eve_horas`, `eve_termino`, `eve_local`) VALUES
(1, '1° Período - Via Satélite', '15/03/20', '08H00', 'Indefinido', 'Vila Mollica'),
(2, 'Principiantes - Via Satélite', '15/03/20', '08H00', 'Indefinido', 'Pedregulho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `igreja`
--

CREATE TABLE `igreja` (
  `igr_id` int(11) NOT NULL,
  `igr_nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `igreja`
--

INSERT INTO `igreja` (`igr_id`, `igr_nome`) VALUES
(1, 'Guará_Pedregulho'),
(2, 'Guará_Vila Molica'),
(3, 'Guará_Vila Paulista'),
(4, 'Guará_Centro'),
(5, 'Guará_Colônia'),
(6, 'Aparecida'),
(7, 'Lorena'),
(8, 'Piquete'),
(9, 'Cruzeiro'),
(10, 'Cunha');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricoes`
--

CREATE TABLE `inscricoes` (
  `ins_id` int(11) NOT NULL,
  `ins_nome` varchar(255) DEFAULT NULL,
  `ins_cpf` char(11) DEFAULT NULL,
  `ins_eve_id` int(11) DEFAULT NULL,
  `ins_igr_id` int(11) DEFAULT NULL,
  `ins_sta_id` int(11) DEFAULT NULL,
  `ins_presenca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `inscricoes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `secretario`
--

CREATE TABLE `secretario` (
  `sec_id` int(11) NOT NULL,
  `sec_nome` varchar(255) DEFAULT NULL,
  `sec_igr_id` int(11) DEFAULT NULL,
  `sec_email` varchar(255) DEFAULT NULL,
  `sec_senha` varchar(255) DEFAULT NULL,
  `sec_tip_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `secretario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_secretario`
--

CREATE TABLE `tipo_secretario` (
  `tip_id` int(11) NOT NULL,
  `tip_descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_secretario`
--

INSERT INTO `tipo_secretario` (`tip_id`, `tip_descricao`) VALUES
(1, 'Administrador'),
(2, 'Secretário Local');

-- --------------------------------------------------------

--
-- Estrutura da tabela `_status`
--

CREATE TABLE `_status` (
  `sta_id` int(11) NOT NULL,
  `sta_descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `_status`
--

INSERT INTO `_status` (`sta_id`, `sta_descricao`) VALUES
(1, 'Em Andamento'),
(2, 'Inscrito'),
(3, 'Cancelado');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`eve_id`);

--
-- Índices para tabela `igreja`
--
ALTER TABLE `igreja`
  ADD PRIMARY KEY (`igr_id`);

--
-- Índices para tabela `inscricoes`
--
ALTER TABLE `inscricoes`
  ADD PRIMARY KEY (`ins_id`);

--
-- Índices para tabela `secretario`
--
ALTER TABLE `secretario`
  ADD PRIMARY KEY (`sec_id`);

--
-- Índices para tabela `tipo_secretario`
--
ALTER TABLE `tipo_secretario`
  ADD PRIMARY KEY (`tip_id`);

--
-- Índices para tabela `_status`
--
ALTER TABLE `_status`
  ADD PRIMARY KEY (`sta_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `evento`
--
ALTER TABLE `evento`
  MODIFY `eve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `igreja`
--
ALTER TABLE `igreja`
  MODIFY `igr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `inscricoes`
--
ALTER TABLE `inscricoes`
  MODIFY `ins_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de tabela `secretario`
--
ALTER TABLE `secretario`
  MODIFY `sec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tipo_secretario`
--
ALTER TABLE `tipo_secretario`
  MODIFY `tip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `_status`
--
ALTER TABLE `_status`
  MODIFY `sta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

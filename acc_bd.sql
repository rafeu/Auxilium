-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Nov-2019 às 09:52
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `acc_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `doacao`
--

CREATE TABLE `doacao` (
  `id_doacao` int(15) NOT NULL,
  `tipo_doacao` varchar(255) DEFAULT NULL,
  `qtd_doacao` int(11) NOT NULL,
  `id_evento_fk` int(11) NOT NULL,
  `cpf_fk` varchar(11) CHARACTER SET utf8 NOT NULL,
  `descricao_doacao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` varchar(655) NOT NULL,
  `id2` varchar(655) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `id2`, `rua`, `numero`, `bairro`) VALUES
('5dddea3583933', '', 'xesque', 5, 'Xiranha'),
('5dddeac206d68', '', 'Camões', 21, 'cocópolis'),
('5dddeb26080c8', '', 'broios', 3, 'não aguento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `descricao` varchar(2555) DEFAULT NULL,
  `id_endereco_fk` varchar(655) CHARACTER SET utf8 NOT NULL,
  `imagem_evento` varchar(655) NOT NULL DEFAULT 'evento.png',
  `dataInicio` varchar(10) DEFAULT NULL,
  `dataFim` varchar(10) DEFAULT NULL,
  `nome_evento` varchar(100) DEFAULT NULL,
  `id_evento` int(10) NOT NULL,
  `horaInicio` varchar(5) DEFAULT NULL,
  `horaFim` varchar(5) DEFAULT NULL,
  `tipo_doacao_requerida` varchar(255) NOT NULL,
  `iniciativa` varchar(255) NOT NULL,
  `iniciativa_cpf_fk` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`descricao`, `id_endereco_fk`, `imagem_evento`, `dataInicio`, `dataFim`, `nome_evento`, `id_evento`, `horaInicio`, `horaFim`, `tipo_doacao_requerida`, `iniciativa`, `iniciativa_cpf_fk`) VALUES
('Evento criado para testes.', '5dddea3583933', 'evento.png', '12/12/2019', '19/02/2019', 'teste', 174, '13:00', '14:00', 'Tecidos', 'Administrador', '12312345645'),
('Evento criado para testes. ', '5dddeac206d68', 'evento.png', '12/12/2012', '12/12/2012', 'teste2g ', 176, '13:00', '16:00', 'Brinquedos', 'Administrador', '12312345645'),
('Lorem ipsum dolor sit amet', '5dddeb26080c8', 'evento.png', '12/12/2012', '12/12/2019', 'mano', 177, '13:00', '18:30', 'Tecidos', 'Administrador', '12312345645');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `cpf` varchar(11) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `tip_user` int(11) NOT NULL DEFAULT 0,
  `nome_user` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `dt_nasc` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `telefone` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `senha` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `imagem_perfil` varchar(655) NOT NULL DEFAULT 'usuario.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cpf`, `email`, `tip_user`, `nome_user`, `dt_nasc`, `telefone`, `senha`, `imagem_perfil`) VALUES
('12312345645', 'admin@admin.com', 2, 'Administrador', '15/12/2000', '15 15151515', '21232f297a57a5a743894a0e4a801fc3', 'usuario.png'),
('21212211212', 'ciclano@gmail.com', 1, 'Ciclano', '15/02/1997', '11 11111111', 'fe798a81c2e1eb4fd9695138276e52ed', 'usuario.png'),
('51253515123', 'mod@mod.com', 1, 'Moderador', '13/11/2003', '88 88888888', 'ad148a3ca8bd0ef3b48c52454c493ec5', 'usuario.png'),
('54151135135', 'fulano@gmail.com', 0, 'Fulano', '31/05/1865', '99 999999999', '3342949e2e99fc2f304de6fdd626a188', 'usuario.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `doacao`
--
ALTER TABLE `doacao`
  ADD PRIMARY KEY (`id_doacao`),
  ADD KEY `Evento_doacao_fk` (`id_evento_fk`),
  ADD KEY `caduser_doacao` (`cpf_fk`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Índices para tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `iniciativa_cpf` (`iniciativa_cpf_fk`),
  ADD KEY `id_endereco_fk` (`id_endereco_fk`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cpf`),
  ADD KEY `id_tip_user_fk` (`tip_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `doacao`
--
ALTER TABLE `doacao`
  MODIFY `id_doacao` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `doacao`
--
ALTER TABLE `doacao`
  ADD CONSTRAINT `Evento_doacao_fk` FOREIGN KEY (`id_evento_fk`) REFERENCES `eventos` (`id_evento`),
  ADD CONSTRAINT `caduser_doacao` FOREIGN KEY (`cpf_fk`) REFERENCES `usuario` (`cpf`);

--
-- Limitadores para a tabela `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `id_endereco_fk` FOREIGN KEY (`id_endereco_fk`) REFERENCES `endereco` (`id_endereco`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 23, 2018 at 06:54 PM
-- Server version: 5.5.54
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quizcreator`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `cliente_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_empresa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_setor` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_ativo` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cliente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`cliente_id`, `cliente_nome`, `cliente_empresa`, `cliente_setor`, `cliente_ativo`) VALUES
('52ca2642-9bca-11e8-9448-00155d1bc31b', 'COSIN-A1', 'CELEPAR', 'COSIN-A1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `funcoes`
--

CREATE TABLE IF NOT EXISTS `funcoes` (
  `funcao_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `funcao_nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `funcao_chave` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `funcao_ativo` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`funcao_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `funcoes_perfil`
--

CREATE TABLE IF NOT EXISTS `funcoes_perfil` (
  `funcaoperfil_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `funcao_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfil_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `funcaoperfil_podeincluir` tinyint(4) NOT NULL DEFAULT '0',
  `funcaoperfil_podealterar` tinyint(4) NOT NULL DEFAULT '0',
  `funcaoperfil_podeexcluir` tinyint(4) NOT NULL DEFAULT '0',
  `funcaoperfil_podeconsultar` tinyint(4) NOT NULL DEFAULT '0',
  `funcaoperfil_podeacessar` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`funcaoperfil_id`),
  KEY `FK_funcoes_perfil_funcoes` (`funcao_id`),
  KEY `FK_funcoes_perfil_perfis` (`perfil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mudancas_quiz`
--

CREATE TABLE IF NOT EXISTS `mudancas_quiz` (
  `log_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `log_data` datetime NOT NULL,
  `log_comando` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opcoesrespostas`
--

CREATE TABLE IF NOT EXISTS `opcoesrespostas` (
  `opresposta_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pergunta_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opresposta_texto` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `opresposta_correta` tinyint(4) NOT NULL DEFAULT '0',
  `opresposta_nivelProximidadeCorreta` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`opresposta_id`),
  KEY `FK_opcoesrespostas_perguntas` (`pergunta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opcoesrespostas`
--

INSERT INTO `opcoesrespostas` (`opresposta_id`, `pergunta_id`, `opresposta_texto`, `opresposta_correta`, `opresposta_nivelProximidadeCorreta`) VALUES
('0cbb16c3-a6cc-11e8-bbc6-0800270a6e32', '31604841-a631-11e8-bbc6-0800270a6e32', 'O Nonato', 0, 3),
('7c5e34fa-a6ca-11e8-bbc6-0800270a6e32', '31604841-a631-11e8-bbc6-0800270a6e32', 'O chato', 0, 3),
('8bd6dba9-a63e-11e8-bbc6-0800270a6e32', '31604841-a631-11e8-bbc6-0800270a6e32', 'O gato', 0, 1),
('b3651c78-a63e-11e8-bbc6-0800270a6e32', '31604841-a631-11e8-bbc6-0800270a6e32', 'O Renato', 0, 1),
('b542dfc3-a6cd-11e8-bbc6-0800270a6e32', '31604841-a631-11e8-bbc6-0800270a6e32', 'O Travado', 0, 3),
('f5a2c9ca-a63c-11e8-bbc6-0800270a6e32', '31604841-a631-11e8-bbc6-0800270a6e32', 'O rato', 1, 1),
('f6f95e71-a63e-11e8-bbc6-0800270a6e32', '31604841-a631-11e8-bbc6-0800270a6e32', 'O sulicato', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `partidas`
--

CREATE TABLE IF NOT EXISTS `partidas` (
  `partida_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quc_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partida_data` datetime NOT NULL,
  `partida_pontos` int(11) NOT NULL DEFAULT '0',
  `partida_acertos` int(11) NOT NULL DEFAULT '0',
  `partida_erros` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`partida_id`),
  KEY `FK_partidas_quc` (`quc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perfis`
--

CREATE TABLE IF NOT EXISTS `perfis` (
  `perfil_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfil_nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfil_ativo` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`perfil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perfis_gerador`
--

CREATE TABLE IF NOT EXISTS `perfis_gerador` (
  `perfilgerador_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfilgerador_nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfilgerador_podecriar` tinyint(4) NOT NULL DEFAULT '0',
  `perfilgerador_podeselusu` tinyint(4) NOT NULL DEFAULT '0',
  `perfilgerador_podeaprovar` tinyint(4) NOT NULL DEFAULT '0',
  `perfilgerador_podecriarper` tinyint(4) NOT NULL DEFAULT '0',
  `perfilgerador_podevisualizarper` tinyint(4) NOT NULL DEFAULT '0',
  `perfilgerador_podetestar` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`perfilgerador_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perfis_usuario`
--

CREATE TABLE IF NOT EXISTS `perfis_usuario` (
  `perfilusuario_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfil_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`perfilusuario_id`),
  KEY `FK_perfis_usuario_usuarios` (`usuario_id`),
  KEY `FK_perfis_usuario_perfis` (`perfil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perfis_usuarios_cliente`
--

CREATE TABLE IF NOT EXISTS `perfis_usuarios_cliente` (
  `puc_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuariocliente_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfilgerador_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`puc_id`),
  KEY `FK_puc_usuarios_cliente` (`usuariocliente_id`),
  KEY `FK_puc_perfis_gerador` (`perfilgerador_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perguntas`
--

CREATE TABLE IF NOT EXISTS `perguntas` (
  `pergunta_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pergunta_enunciado` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiporesposta_id` int(11) NOT NULL,
  `pergunta_dificuldade` int(11) NOT NULL DEFAULT '1',
  `pergunta_respostasrandom` tinyint(4) NOT NULL DEFAULT '0',
  `pergunta_sequencia` int(11) NOT NULL DEFAULT '0',
  `pergunta_pontos` int(11) NOT NULL DEFAULT '1',
  `pergunta_cancelada` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pergunta_id`),
  KEY `FK_perguntas_tiposrespostas` (`tiporesposta_id`),
  KEY `FK_perguntas_quizzes` (`quiz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perguntas`
--

INSERT INTO `perguntas` (`pergunta_id`, `quiz_id`, `pergunta_enunciado`, `tiporesposta_id`, `pergunta_dificuldade`, `pergunta_respostasrandom`, `pergunta_sequencia`, `pergunta_pontos`, `pergunta_cancelada`) VALUES
('00b560c8-a6e6-11e8-bbc6-0800270a6e32', '1a7e6271-a631-11e8-bbc6-0800270a6e32', '', 1, 1, 1, 1, 0, 0),
('300b4ebc-a6e7-11e8-bbc6-0800270a6e32', '1a7e6271-a631-11e8-bbc6-0800270a6e32', '', 1, 1, 1, 1, 0, 0),
('31604841-a631-11e8-bbc6-0800270a6e32', '1a7e6271-a631-11e8-bbc6-0800270a6e32', 'Quem roeu a roupa do rei de Roma?', 1, 1, 1, 1, 0, 0),
('685350ed-a6e6-11e8-bbc6-0800270a6e32', '1a7e6271-a631-11e8-bbc6-0800270a6e32', '', 1, 1, 1, 1, 0, 0),
('83c8f7cf-a6e7-11e8-bbc6-0800270a6e32', '1a7e6271-a631-11e8-bbc6-0800270a6e32', '', 1, 1, 1, 1, 0, 0),
('a2e7f4ee-a6e6-11e8-bbc6-0800270a6e32', '1a7e6271-a631-11e8-bbc6-0800270a6e32', '', 1, 1, 1, 1, 0, 0),
('ba1e64cf-a6e5-11e8-bbc6-0800270a6e32', '1a7e6271-a631-11e8-bbc6-0800270a6e32', '', 1, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE IF NOT EXISTS `quizzes` (
  `quiz_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz_nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz_dataini` datetime NOT NULL,
  `quiz_datafim` datetime NOT NULL,
  `quiz_maxtentativas` int(11) NOT NULL DEFAULT '0',
  `quiz_logotipo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_estilo` longtext COLLATE utf8mb4_unicode_ci,
  `statusquiz_id` int(11) NOT NULL,
  `quiz_perguntasrandom` tinyint(4) NOT NULL DEFAULT '0',
  `quiz_aumdificprogr` tinyint(4) NOT NULL DEFAULT '0',
  `quiz_pontpadrao` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`quiz_id`),
  KEY `FK_quizzes_statusquiz` (`statusquiz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`quiz_id`, `quiz_nome`, `quiz_dataini`, `quiz_datafim`, `quiz_maxtentativas`, `quiz_logotipo`, `quiz_estilo`, `statusquiz_id`, `quiz_perguntasrandom`, `quiz_aumdificprogr`, `quiz_pontpadrao`) VALUES
('1a7e6271-a631-11e8-bbc6-0800270a6e32', 'QuizTeste', '2018-08-01 00:00:00', '2018-08-31 00:00:00', 0, '', '', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes_cliente`
--

CREATE TABLE IF NOT EXISTS `quizzes_cliente` (
  `quizcliente_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`quizcliente_id`),
  KEY `FK_quizzes_cliente_quizzes` (`quiz_id`),
  KEY `FK_quizzes_cliente_clientes` (`cliente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes_cliente`
--

INSERT INTO `quizzes_cliente` (`quizcliente_id`, `quiz_id`, `cliente_id`) VALUES
('1a7f0da3-a631-11e8-bbc6-0800270a6e32', '1a7e6271-a631-11e8-bbc6-0800270a6e32', '52ca2642-9bca-11e8-9448-00155d1bc31b');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes_usuarios_cliente`
--

CREATE TABLE IF NOT EXISTS `quizzes_usuarios_cliente` (
  `quc_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quizcliente_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuarioscliente_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`quc_id`),
  KEY `FK_quc_quizzes_cliente` (`quizcliente_id`),
  KEY `FK_quc_usuarios_cliente` (`usuarioscliente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `respostas_partida`
--

CREATE TABLE IF NOT EXISTS `respostas_partida` (
  `respart_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partida_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pergunta_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resposta_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `respart_correta` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`respart_id`),
  KEY `FK_respostas_partida_partidas` (`partida_id`),
  KEY `FK_respostas_partida_perguntas` (`pergunta_id`),
  KEY `FK_respostas_partida_respostas` (`resposta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_quiz`
--

CREATE TABLE IF NOT EXISTS `status_quiz` (
  `statusquiz_id` int(11) NOT NULL,
  `statusquiz_nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusquiz_rascunho` tinyint(4) NOT NULL DEFAULT '0',
  `statusquiz_teste` tinyint(4) NOT NULL DEFAULT '0',
  `statusquiz_publicado` tinyint(4) NOT NULL DEFAULT '0',
  `statusquiz_fechado` tinyint(4) NOT NULL DEFAULT '0',
  `statusquiz_cancelado` tinyint(4) NOT NULL DEFAULT '0',
  `statusquiz_aguardliberacao` tinyint(4) NOT NULL DEFAULT '0',
  `statusquiz_nivelliberacao` int(11) NOT NULL DEFAULT '0',
  `statusquiz_totalniveis` int(11) NOT NULL DEFAULT '0',
  `statusquiz_sequencia` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`statusquiz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_quiz`
--

INSERT INTO `status_quiz` (`statusquiz_id`, `statusquiz_nome`, `statusquiz_rascunho`, `statusquiz_teste`, `statusquiz_publicado`, `statusquiz_fechado`, `statusquiz_cancelado`, `statusquiz_aguardliberacao`, `statusquiz_nivelliberacao`, `statusquiz_totalniveis`, `statusquiz_sequencia`) VALUES
(1, 'Quiz Criado', 1, 0, 0, 0, 0, 0, 0, 0, 1),
(2, 'Em Testes', 0, 1, 0, 0, 0, 0, 1, 1, 2),
(3, 'Aguardando Aprovação', 0, 0, 0, 0, 0, 1, 1, 1, 3),
(4, 'Publicado', 0, 0, 1, 0, 0, 0, 0, 0, 4),
(5, 'Finalizado', 0, 0, 0, 1, 0, 0, 0, 0, 5),
(6, 'Cancelado', 0, 0, 0, 0, 1, 0, 0, 0, 99);

-- --------------------------------------------------------

--
-- Table structure for table `tiposrespostas`
--

CREATE TABLE IF NOT EXISTS `tiposrespostas` (
  `tiporesposta_id` int(11) NOT NULL,
  `tiporesposta_nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiporesposta_texto` tinyint(4) NOT NULL DEFAULT '0',
  `tiporesposta_opcoes` tinyint(4) NOT NULL DEFAULT '0',
  `tiporesposta_multiselecoes` tinyint(4) NOT NULL DEFAULT '0',
  `tiporesposta_qtdeopcoes` int(11) NOT NULL DEFAULT '4',
  `tiporesposta_constodascorretas` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tiporesposta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tiposrespostas`
--

INSERT INTO `tiposrespostas` (`tiporesposta_id`, `tiporesposta_nome`, `tiporesposta_texto`, `tiporesposta_opcoes`, `tiporesposta_multiselecoes`, `tiporesposta_qtdeopcoes`, `tiporesposta_constodascorretas`) VALUES
(1, 'Várias opções, única resposta', 0, 1, 0, 4, 1),
(2, 'Apenas texto', 1, 0, 0, 0, 0),
(3, 'Várias opções, várias respostas', 0, 1, 1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_nome` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_nomereal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_codigoldap` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario_ativo` tinyint(4) NOT NULL DEFAULT '0',
  `usuario_confirmado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_cliente`
--

CREATE TABLE IF NOT EXISTS `usuarios_cliente` (
  `usucliente_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`usucliente_id`),
  KEY `FK_usuarios_cliente_clientes` (`cliente_id`),
  KEY `FK_usuarios_cliente_usuarios` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `funcoes_perfil`
--
ALTER TABLE `funcoes_perfil`
  ADD CONSTRAINT `FK_funcoes_perfil_funcoes` FOREIGN KEY (`funcao_id`) REFERENCES `funcoes` (`funcao_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_funcoes_perfil_perfis` FOREIGN KEY (`perfil_id`) REFERENCES `perfis` (`perfil_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `opcoesrespostas`
--
ALTER TABLE `opcoesrespostas`
  ADD CONSTRAINT `FK_opcoesrespostas_perguntas` FOREIGN KEY (`pergunta_id`) REFERENCES `perguntas` (`pergunta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `partidas`
--
ALTER TABLE `partidas`
  ADD CONSTRAINT `FK_partidas_quc` FOREIGN KEY (`quc_id`) REFERENCES `quizzes_usuarios_cliente` (`quc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `perfis_usuario`
--
ALTER TABLE `perfis_usuario`
  ADD CONSTRAINT `FK_perfis_usuario_perfis` FOREIGN KEY (`perfil_id`) REFERENCES `perfis` (`perfil_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_perfis_usuario_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `perfis_usuarios_cliente`
--
ALTER TABLE `perfis_usuarios_cliente`
  ADD CONSTRAINT `FK_puc_perfis_gerador` FOREIGN KEY (`perfilgerador_id`) REFERENCES `perfis_gerador` (`perfilgerador_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_puc_usuarios_cliente` FOREIGN KEY (`usuariocliente_id`) REFERENCES `usuarios_cliente` (`usucliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `perguntas`
--
ALTER TABLE `perguntas`
  ADD CONSTRAINT `FK_perguntas_quizzes` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`quiz_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_perguntas_tiposrespostas` FOREIGN KEY (`tiporesposta_id`) REFERENCES `tiposrespostas` (`tiporesposta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `FK_quizzes_statusquiz` FOREIGN KEY (`statusquiz_id`) REFERENCES `status_quiz` (`statusquiz_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `quizzes_cliente`
--
ALTER TABLE `quizzes_cliente`
  ADD CONSTRAINT `FK_quizzes_cliente_clientes` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_quizzes_cliente_quizzes` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`quiz_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `quizzes_usuarios_cliente`
--
ALTER TABLE `quizzes_usuarios_cliente`
  ADD CONSTRAINT `FK_quc_quizzes_cliente` FOREIGN KEY (`quizcliente_id`) REFERENCES `quizzes_cliente` (`quizcliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_quc_usuarios_cliente` FOREIGN KEY (`usuarioscliente_id`) REFERENCES `usuarios_cliente` (`usucliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `respostas_partida`
--
ALTER TABLE `respostas_partida`
  ADD CONSTRAINT `FK_respostas_partida_partidas` FOREIGN KEY (`partida_id`) REFERENCES `partidas` (`partida_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_respostas_partida_perguntas` FOREIGN KEY (`pergunta_id`) REFERENCES `perguntas` (`pergunta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_respostas_partida_respostas` FOREIGN KEY (`resposta_id`) REFERENCES `opcoesrespostas` (`opresposta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuarios_cliente`
--
ALTER TABLE `usuarios_cliente`
  ADD CONSTRAINT `FK_usuarios_cliente_clientes` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_usuarios_cliente_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
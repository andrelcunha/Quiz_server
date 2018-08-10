-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: quizcreator
-- ------------------------------------------------------
-- Server version	5.7.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `cliente_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_empresa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_setor` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_ativo` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cliente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES ('52ca2642-9bca-11e8-9448-00155d1bc31b','COSIN-A1','CELEPAR','COSIN-A1',1);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcoes`
--

DROP TABLE IF EXISTS `funcoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcoes` (
  `funcao_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `funcao_nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `funcao_chave` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `funcao_ativo` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`funcao_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcoes`
--

LOCK TABLES `funcoes` WRITE;
/*!40000 ALTER TABLE `funcoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcoes_perfil`
--

DROP TABLE IF EXISTS `funcoes_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcoes_perfil` (
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
  KEY `FK_funcoes_perfil_perfis` (`perfil_id`),
  CONSTRAINT `FK_funcoes_perfil_funcoes` FOREIGN KEY (`funcao_id`) REFERENCES `funcoes` (`funcao_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_funcoes_perfil_perfis` FOREIGN KEY (`perfil_id`) REFERENCES `perfis` (`perfil_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcoes_perfil`
--

LOCK TABLES `funcoes_perfil` WRITE;
/*!40000 ALTER TABLE `funcoes_perfil` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcoes_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mudancas_quiz`
--

DROP TABLE IF EXISTS `mudancas_quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mudancas_quiz` (
  `log_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `log_data` datetime NOT NULL,
  `log_comando` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mudancas_quiz`
--

LOCK TABLES `mudancas_quiz` WRITE;
/*!40000 ALTER TABLE `mudancas_quiz` DISABLE KEYS */;
/*!40000 ALTER TABLE `mudancas_quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opcoesrespostas`
--

DROP TABLE IF EXISTS `opcoesrespostas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opcoesrespostas` (
  `opresposta_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pergunta_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opresposta_texto` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `opresposta_peso` int(11) NOT NULL,
  `opresposta_correta` tinyint(4) NOT NULL DEFAULT '0',
  `opresposta_dificerrada` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`opresposta_id`),
  KEY `FK_opcoesrespostas_perguntas` (`pergunta_id`),
  CONSTRAINT `FK_opcoesrespostas_perguntas` FOREIGN KEY (`pergunta_id`) REFERENCES `perguntas` (`pergunta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opcoesrespostas`
--

LOCK TABLES `opcoesrespostas` WRITE;
/*!40000 ALTER TABLE `opcoesrespostas` DISABLE KEYS */;
/*!40000 ALTER TABLE `opcoesrespostas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partidas`
--

DROP TABLE IF EXISTS `partidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partidas` (
  `partida_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quc_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partida_data` datetime NOT NULL,
  `partida_pontos` int(11) NOT NULL DEFAULT '0',
  `partida_acertos` int(11) NOT NULL DEFAULT '0',
  `partida_erros` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`partida_id`),
  KEY `FK_partidas_quc` (`quc_id`),
  CONSTRAINT `FK_partidas_quc` FOREIGN KEY (`quc_id`) REFERENCES `quizzes_usuarios_cliente` (`quc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partidas`
--

LOCK TABLES `partidas` WRITE;
/*!40000 ALTER TABLE `partidas` DISABLE KEYS */;
/*!40000 ALTER TABLE `partidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfis`
--

DROP TABLE IF EXISTS `perfis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfis` (
  `perfil_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfil_nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfil_ativo` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`perfil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfis`
--

LOCK TABLES `perfis` WRITE;
/*!40000 ALTER TABLE `perfis` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfis_gerador`
--

DROP TABLE IF EXISTS `perfis_gerador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfis_gerador` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfis_gerador`
--

LOCK TABLES `perfis_gerador` WRITE;
/*!40000 ALTER TABLE `perfis_gerador` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfis_gerador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfis_usuario`
--

DROP TABLE IF EXISTS `perfis_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfis_usuario` (
  `perfilusuario_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfil_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`perfilusuario_id`),
  KEY `FK_perfis_usuario_usuarios` (`usuario_id`),
  KEY `FK_perfis_usuario_perfis` (`perfil_id`),
  CONSTRAINT `FK_perfis_usuario_perfis` FOREIGN KEY (`perfil_id`) REFERENCES `perfis` (`perfil_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_perfis_usuario_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfis_usuario`
--

LOCK TABLES `perfis_usuario` WRITE;
/*!40000 ALTER TABLE `perfis_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfis_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfis_usuarios_cliente`
--

DROP TABLE IF EXISTS `perfis_usuarios_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfis_usuarios_cliente` (
  `puc_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuariocliente_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfilgerador_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`puc_id`),
  KEY `FK_puc_usuarios_cliente` (`usuariocliente_id`),
  KEY `FK_puc_perfis_gerador` (`perfilgerador_id`),
  CONSTRAINT `FK_puc_perfis_gerador` FOREIGN KEY (`perfilgerador_id`) REFERENCES `perfis_gerador` (`perfilgerador_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_puc_usuarios_cliente` FOREIGN KEY (`usuariocliente_id`) REFERENCES `usuarios_cliente` (`usucliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfis_usuarios_cliente`
--

LOCK TABLES `perfis_usuarios_cliente` WRITE;
/*!40000 ALTER TABLE `perfis_usuarios_cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfis_usuarios_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perguntas`
--

DROP TABLE IF EXISTS `perguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perguntas` (
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
  KEY `FK_perguntas_quizzes` (`quiz_id`),
  CONSTRAINT `FK_perguntas_quizzes` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`quiz_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_perguntas_tiposrespostas` FOREIGN KEY (`tiporesposta_id`) REFERENCES `tiposrespostas` (`tiporesposta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perguntas`
--

LOCK TABLES `perguntas` WRITE;
/*!40000 ALTER TABLE `perguntas` DISABLE KEYS */;
/*!40000 ALTER TABLE `perguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quizzes`
--

DROP TABLE IF EXISTS `quizzes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quizzes` (
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
  KEY `FK_quizzes_statusquiz` (`statusquiz_id`),
  CONSTRAINT `FK_quizzes_statusquiz` FOREIGN KEY (`statusquiz_id`) REFERENCES `status_quiz` (`statusquiz_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quizzes`
--

LOCK TABLES `quizzes` WRITE;
/*!40000 ALTER TABLE `quizzes` DISABLE KEYS */;
/*!40000 ALTER TABLE `quizzes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quizzes_cliente`
--

DROP TABLE IF EXISTS `quizzes_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quizzes_cliente` (
  `quizcliente_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`quizcliente_id`),
  KEY `FK_quizzes_cliente_quizzes` (`quiz_id`),
  KEY `FK_quizzes_cliente_clientes` (`cliente_id`),
  CONSTRAINT `FK_quizzes_cliente_clientes` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_quizzes_cliente_quizzes` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`quiz_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quizzes_cliente`
--

LOCK TABLES `quizzes_cliente` WRITE;
/*!40000 ALTER TABLE `quizzes_cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `quizzes_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quizzes_usuarios_cliente`
--

DROP TABLE IF EXISTS `quizzes_usuarios_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quizzes_usuarios_cliente` (
  `quc_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quizcliente_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuarioscliente_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`quc_id`),
  KEY `FK_quc_quizzes_cliente` (`quizcliente_id`),
  KEY `FK_quc_usuarios_cliente` (`usuarioscliente_id`),
  CONSTRAINT `FK_quc_quizzes_cliente` FOREIGN KEY (`quizcliente_id`) REFERENCES `quizzes_cliente` (`quizcliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_quc_usuarios_cliente` FOREIGN KEY (`usuarioscliente_id`) REFERENCES `usuarios_cliente` (`usucliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quizzes_usuarios_cliente`
--

LOCK TABLES `quizzes_usuarios_cliente` WRITE;
/*!40000 ALTER TABLE `quizzes_usuarios_cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `quizzes_usuarios_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respostas_partida`
--

DROP TABLE IF EXISTS `respostas_partida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respostas_partida` (
  `respart_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partida_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pergunta_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resposta_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `respart_correta` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`respart_id`),
  KEY `FK_respostas_partida_partidas` (`partida_id`),
  KEY `FK_respostas_partida_perguntas` (`pergunta_id`),
  KEY `FK_respostas_partida_respostas` (`resposta_id`),
  CONSTRAINT `FK_respostas_partida_partidas` FOREIGN KEY (`partida_id`) REFERENCES `partidas` (`partida_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_respostas_partida_perguntas` FOREIGN KEY (`pergunta_id`) REFERENCES `perguntas` (`pergunta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_respostas_partida_respostas` FOREIGN KEY (`resposta_id`) REFERENCES `opcoesrespostas` (`opresposta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respostas_partida`
--

LOCK TABLES `respostas_partida` WRITE;
/*!40000 ALTER TABLE `respostas_partida` DISABLE KEYS */;
/*!40000 ALTER TABLE `respostas_partida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_quiz`
--

DROP TABLE IF EXISTS `status_quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_quiz` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_quiz`
--

LOCK TABLES `status_quiz` WRITE;
/*!40000 ALTER TABLE `status_quiz` DISABLE KEYS */;
INSERT INTO `status_quiz` VALUES (1,'Quiz Criado',1,0,0,0,0,0,0,0,1),(2,'Em Testes',0,1,0,0,0,0,1,1,2),(3,'Aguardando Aprovação',0,0,0,0,0,1,1,1,3),(4,'Publicado',0,0,1,0,0,0,0,0,4),(5,'Finalizado',0,0,0,1,0,0,0,0,5),(6,'Cancelado',0,0,0,0,1,0,0,0,99);
/*!40000 ALTER TABLE `status_quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiposrespostas`
--

DROP TABLE IF EXISTS `tiposrespostas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiposrespostas` (
  `tiporesposta_id` int(11) NOT NULL,
  `tiporesposta_nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiporesposta_texto` tinyint(4) NOT NULL DEFAULT '0',
  `tiporesposta_opcoes` tinyint(4) NOT NULL DEFAULT '0',
  `tiporesposta_multiselecoes` tinyint(4) NOT NULL DEFAULT '0',
  `tiporesposta_qtdeopcoes` int(11) NOT NULL DEFAULT '4',
  `tiporesposta_constodascorretas` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tiporesposta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiposrespostas`
--

LOCK TABLES `tiposrespostas` WRITE;
/*!40000 ALTER TABLE `tiposrespostas` DISABLE KEYS */;
INSERT INTO `tiposrespostas` VALUES (1,'Várias opções, única resposta',0,1,0,4,1),(2,'Apenas texto',1,0,0,0,0),(3,'Várias opções, várias respostas',0,1,1,5,1);
/*!40000 ALTER TABLE `tiposrespostas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `usuario_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_nome` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_nomereal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_codigoldap` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario_ativo` tinyint(4) NOT NULL DEFAULT '0',
  `usuario_confirmado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_cliente`
--

DROP TABLE IF EXISTS `usuarios_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_cliente` (
  `usucliente_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`usucliente_id`),
  KEY `FK_usuarios_cliente_clientes` (`cliente_id`),
  KEY `FK_usuarios_cliente_usuarios` (`usuario_id`),
  CONSTRAINT `FK_usuarios_cliente_clientes` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_usuarios_cliente_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_cliente`
--

LOCK TABLES `usuarios_cliente` WRITE;
/*!40000 ALTER TABLE `usuarios_cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios_cliente` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-09 18:54:32

-- CRIAÇÃO DA TABELA
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

-- SELEÇÃO DA TABELA
SELECT * FROM status_quiz;

-- ALGUMAS INSERÇÕES NA TABELA
INSERT INTO status_quiz VALUES (1, 'Quiz Criado', 1, 0, 0, 0, 0, 0, 0, 0, 1);
INSERT INTO status_quiz VALUES (2, 'Em Testes', 0, 1, 0, 0, 0, 0, 1, 1, 2);
INSERT INTO status_quiz VALUES (3, 'Aguardando Aprovação', 0, 0, 0, 0, 0, 1, 1, 1, 3);
INSERT INTO status_quiz VALUES (4, 'Publicado', 0, 0, 1, 0, 0, 0, 0, 0, 4);
INSERT INTO status_quiz VALUES (5, 'Finalizado', 0, 0, 0, 1, 0, 0, 0, 0, 5);
INSERT INTO status_quiz VALUES (6, 'Cancelado', 0, 0, 0, 0, 1, 0, 0, 0, 99);
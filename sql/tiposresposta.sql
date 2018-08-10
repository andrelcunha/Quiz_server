-- CRIAÇÃO DA TABELA
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

-- SELEÇÃO DA TABELA
SELECT * FROM tiposrespostas;

-- ALGUMAS INSERÇÕES NA TABELA
INSERT INTO tiposrespostas VALUES(1, 'Várias opções, única resposta', 0, 1, 0, 4, 1);
INSERT INTO tiposrespostas VALUES(2, 'Apenas texto', 1, 0, 0, 0, 0);
INSERT INTO tiposrespostas VALUES(3, 'Várias opções, várias respostas', 0, 1, 1, 5, 1);
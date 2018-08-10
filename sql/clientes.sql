-- CRIAÇÃO DA TABELA
CREATE TABLE `clientes` (
  `cliente_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_empresa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_setor` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_ativo` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cliente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- SELEÇÃO DA TABELA
SELECT * FROM clientes;

-- ALGUMAS INSERÇÕES NA TABELA
INSERT INTO clientes VALUES (UUID(), 'COSIN-A1', 'CELEPAR', 'COSIN-A1', 1);
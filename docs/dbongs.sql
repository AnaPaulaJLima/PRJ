CREATE DATABASE IF NOT EXISTS `dbongs`;

CREATE USER IF NOT EXISTS 'ongs'@'localhost' IDENTIFIED BY 'ongs';

GRANT ALL PRIVILEGES ON dbongs.* TO 'ongs'@'localhost';

FLUSH PRIVILEGES;

USE `dbongs`;

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
	`id`	INTEGER PRIMARY KEY AUTO_INCREMENT,
    `email`	VARCHAR(255),
    `senha`	VARCHAR(255),
	`nome`	VARCHAR(255),
    `celular`	VARCHAR(255), 
    `admin`     BOOLEAN
    	
);

INSERT INTO usuario(email,senha,nome,celular,admin) 
    VALUES("paulinhasjlima@gmail.com","1234","Ana","99400-5564", '1');


CREATE TABLE `ong`(
    `id`            INTEGER PRIMARY KEY AUTO_INCREMENT,
    `nome_fantasia` VARCHAR(255),
    `ano_fundacao`  YEAR,
    `descricao`     TEXT,
    `ativo`         BOOLEAN,
    `imagem_principal`   VARCHAR(255),
    `imagem_secundaria`  VARCHAR(255),
    `video`         VARCHAR(255), 
    `endereco`      VARCHAR(255),
    `email` VARCHAR(100),
    `telefone` VARCHAR(30),
    `celular` VARCHAR(30)
); 

INSERT INTO ong(nome_fantasia, ano_fundacao, descricao, ativo) 
    VALUES("Hospital de Retaguarda Franscico de Assis","1978-01-01","O Hospital de Retaguarda Francisco de Assis é uma instituição filantrópica sem fins lucrativos, que atua em Ribeirão Preto e região, com a finalidade de prestar assistência a enfermos acamados com doenças crônicas e em situação estável.","1");

ALTER TABLE ong ADD COLUMN imagem_sec1 VARCHAR(255);
ALTER TABLE ong ADD COLUMN endereco VARCHAR(255);
ALTER TABLE ong ADD COLUMN email VARCHAR(100);
ALTER TABLE ong ADD COLUMN telefone VARCHAR(30);
ALTER TABLE ong ADD COLUMN celular VARCHAR(30);

CREATE TABLE `doacao`(
    `id`            INTEGER PRIMARY KEY AUTO_INCREMENT,
    `id_usuario`    INTEGER, 
    `id_ong`        INTEGER,
    `valor`         FLOAT,
    `tipo_pagamento` INTEGER,       
    `hora`          TIME,
    `data`          date,

    FOREIGN KEY(`id_usuario`) REFERENCES `usuario`(`id`),
    FOREIGN KEY(`id_ong`) REFERENCES `ong` (`id`),
    FOREIGN KEY(`tipo_pagamento`) REFERENCES `pagamento`(`id`)
);

/*VER DIREITO ESSA TABELA DOAÇÃO.. PRECISO GUARDA AS INFORMAÇÕES DO CARTÃO DE CRÉDITO OU DEBITO(POSSO PENSAR NA 
POSSIBILIDADE DE FAZER DEPOSITO --PESQUISAR--*/

CREATE TABLE `pagamento`(
    `id`	INTEGER PRIMARY KEY AUTO_INCREMENT,
    `nome_cartao`	VARCHAR(255),
    `numero_cartao`	VARCHAR(255),
	`mes_vencimento` INTEGER,
    `ano_vencimento` YEAR,
    `credito`	    BOOLEAN,
    `debito`        BOOLEAN
);

INSERT INTO doacao(valor, tipo_pagamento, id_usuario, id_ong) 
    VALUES(50.00,"1","2","1");


UPDATE usuario SET ADMIN = 0 WHERE ID = 2;

ALTER TABLE ong CHANGE imagem_sec1 imagem_secundaria VARCHAR(255),
ALTER TABLE ong CHANGE imagem_sec2 video VARCHAR(255),

SELECT o.nome_fantasia AS nomeOng, d.data AS dataDoacao, d.valor AS valor, p.credito 
AS credito, p.debito AS debito FROM doacao d INNER JOIN ONG o on d.id_ong = o.id 
INNER JOIN pagamento p on d.tipo_pagamento = p.id;
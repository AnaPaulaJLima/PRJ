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
    `celular`	VARCHAR(255)
    	
);

INSERT INTO usuario(email,senha,nome,celular) 
    VALUES("paulinhasjlima@gmail.com","123456","Ana","99400-5564");


CREATE TABLE `ong`(
    `id`            INTEGER PRIMARY KEY AUTO_INCREMENT,
    `nome_fantasia` VARCHAR(255),
    `ano_fundacao`  YEAR,
    `descricao`     TEXT,
    `imagem`        VARCHAR(255),
    `ativo`         BOOLEAN
); 

INSERT INTO ong(nome_fantasia, ano_fundacao, descricao, ativo) 
    VALUES("Hospital de Retaguarda Franscico de Assis","1978-01-01","O Hospital de Retaguarda Francisco de Assis é uma instituição filantrópica sem fins lucrativos, que atua em Ribeirão Preto e região, com a finalidade de prestar assistência a enfermos acamados com doenças crônicas e em situação estável.","1");

CREATE TABLE `doacao`(
    `id`            INTEGER PRIMARY KEY AUTO_INCREMENT,
    `valor`         FLOAT,
    `tipo_pagamento` INTEGER,       
    `id_usuario`    INTEGER, 
    `id_ong`        INTEGER,
    FOREIGN KEY(`id_usuario`) REFERENCES `usuario`(`id`),
    FOREIGN KEY(`id_ong`) REFERENCES `ong` (`id`)
);

/*VER DIREITO ESSA TABELA DOAÇÃO.. PRECISO GUARDA AS INFORMAÇÕES DO CARTÃO DE CRÉDITO OU DEBITO(POSSO PENSAR NA 
POSSIBILIDADE DE FAZER DEPOSITO --PESQUISAR--*/


INSERT INTO doacao(valor, tipo_pagamento, id_usuario, id_ong) 
    VALUES(50.00,"1","2","1");


UPDATE usuario SET ADMIN = 0 WHERE ID = 2;
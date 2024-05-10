CREATE DATABASE cadastro
	DEFAULT CHARACTER SET utf8
	DEFAULT COLLATE utf8_general_ci;

USE cadastro;

CREATE TABLE usuarios (
	id				INT NOT NULL AUTO_INCREMENT,
    nome			VARCHAR(80) NOT NULL,
    email			VARCHAR(60),
    senha			VARCHAR(255) NOT NULL,
    telefone		VARCHAR(16),
	dataNasc		DATE,
    especialidade	VARCHAR(100),
    cpf				CHAR(11),
    rg				CHAR(10),
    perm			ENUM('adm','usr','prof'),
    PRIMARY KEY (id,cpf,rg)
)DEFAULT CHARSET = utf8;



CREATE TABLE busca(
	ultBusca varchar(80)
)default charset = utf8;

CREATE TABLE fotos(
    nomeOriginal 	VARCHAR(100),
    diretorio		VARCHAR(100),
    nome			VARCHAR(100),
    dataUpload		DATE
)DEFAULT CHARSET = utf8;

CREATE TABLE cursos(
	id 				INT NOT NULL AUTO_INCREMENT,
	nome          	VARCHAR(100) NOT NULL,
	descricaoCurta	VARCHAR(1000) NOT NULL,
	descricao     	VARCHAR(10000) NOT NULL,
	duracao       	INT,
	tipo          	VARCHAR(20),
	preco         	INT,
	dataIni       	DATE,       
	idadeMin      	INT,
	preReq        	VARCHAR(200),
	foto      		VARCHAR(100),
    PRIMARY KEY(id),
    FOREIGN KEY(foto) REFERENCES fotos(diretorio)
)DEFAULT CHARSET = utf8;


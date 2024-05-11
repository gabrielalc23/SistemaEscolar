CREATE DATABASE cadastro
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE cadastro;

CREATE TABLE usuarios (
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(80) NOT NULL,
  email VARCHAR(60),
  senha VARCHAR(255) NOT NULL,
  telefone VARCHAR(15),
  data_nascimento DATE,
  especialidade VARCHAR(100),
  cpf CHAR(11) NOT NULL,
  rg CHAR(10) NOT NULL,
  turma_id INT,
  permission_level ENUM('adm', 'usr', 'prof') NOT NULL,
  FOREIGN KEY (turma_id) REFERENCES turma(id) ,
  PRIMARY KEY (id),
  UNIQUE INDEX idx_cpf (cpf),
  UNIQUE INDEX idx_rg (rg)
) DEFAULT CHARSET = utf8;

CREATE TABLE turma(
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(200) NOT NULL,
  descricao VARCHAR(255),
  PRIMARY KEY (id)
);

CREATE TABLE busca (
  ultima_busca VARCHAR(80)
) DEFAULT CHARSET = utf8;

CREATE TABLE fotos (
  nome_original VARCHAR(100),
  diretorio VARCHAR(100),
  nome VARCHAR(100),
  data_upload DATE,
  PRIMARY KEY (diretorio)
) DEFAULT CHARSET = utf8;

CREATE TABLE cursos (
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  descricao_curta VARCHAR(1000) NOT NULL,
  descricao VARCHAR(10000) NOT NULL,
  duracao INT,
  tipo VARCHAR(20),
  preco INT,
  data_inicio DATE,
  idade_min INT,
  pre_requisito VARCHAR(200),
  foto VARCHAR(100),
  aluno VARCHAR(255),
  PRIMARY KEY (id),
  FOREIGN KEY (aluno) REFERENCES usuarios(nome),
  FOREIGN KEY (foto) REFERENCES fotos(diretorio)
) DEFAULT CHARSET = utf8;

CREATE TABLE presenca (
  id INT PRIMARY KEY AUTO_INCREMENT,
  usuario_id INT NOT NULL,
  data DATE NOT NULL,
  presente TINYINT(1) NOT NULL DEFAULT 0,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
CREATE TABLE notas (
    id INT NOT NULL AUTO_INCREMENT,
    id_aluno INT NOT NULL,
    primeira_nota FLOAT NOT NULL,
    segunda_nota FLOAT,
    terceira_nota FLOAT,
    quarta_nota FLOAT,
    media FLOAT,
    PRIMARY KEY (id),
    FOREIGN KEY (id_aluno) REFERENCES usuarios(id)
);

INSERT INTO usuarios (nome, email, senha, cpf, rg, permission_level)
VALUES ('admin', 'admin@example.com', '$2y$10$xdWelFBtuP5UpovmnyxwOuOatf/V0tTQOcTNkJdM0SqciUCFAKF6W', '12345678901', '1234567890', 'adm');

drop database cadastro;
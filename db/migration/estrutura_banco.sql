CREATE TABLE convernio (
    id int(11) NOT NULL auto_increment,
    descricao varchar(100) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO convernio (descricao)
VALUES
('Essencial'),
('Básico'),
('Prêmio');


CREATE TABLE paciente (
    id int(11) NOT NULL auto_increment,
    nome varchar(100) NOT NULL,
    sexo char(1) NOT NULL,
    data_nascimento date NOT NULL,
    id_convernio int NOT NULL,
    FOREIGN KEY (id_convernio) REFERENCES convernio(id)
    PRIMARY KEY (id)
);

INSERT INTO paciente 
VALUES
(null, 'Wilker','m', '1988-09-09', 3),
(null, 'Maria','f', '1996-06-07', 2),
(null, 'João','m','1994-06-04', 1);


CREATE TABLE servico (
    id int(11) NOT NULL auto_increment,
    descricao varchar(100) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO servico (descricao)
VALUES
('Convernio'),
('Parciente');
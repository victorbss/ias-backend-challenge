CREATE DATABASE projeto_cruds;

CREATE TABLE tb_cliente (
    cli_id_cliente INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    cli_tx_nome_cliente VARCHAR(30),
    cli_tx_endereco VARCHAR(100),
    cli_tx_telefone VARCHAR(20),
    cli_in_desativado CHAR DEFAULT FALSE
);

CREATE TABLE tb_funcionario (
	func_id_funcionario INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	func_tx_nome_funcionario VARCHAR(60),
	func_cd_username VARCHAR(16),
	func_cd_senha VARCHAR(32),
	func_in_desativado CHAR DEFAULT FALSE
);

CREATE TABLE tb_ordem_servico (
	os_id_ordem_servico INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	os_id_funcionario INT,
	os_id_cliente INT,
	os_dt_abertura DATE,
	os_dt_fechamento DATE,
	os_vl_servico REAL(5,2),
	os_cd_status CHAR,
	os_in_desativado CHAR DEFAULT FALSE
);
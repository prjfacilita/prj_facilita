-- MySQL Script generated by MySQL Workbench
-- Wed Nov 14 11:50:27 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema emprestimopf
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema emprestimopf
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `emprestimopf` DEFAULT CHARACTER SET utf8 ;
USE `emprestimopf` ;

-- -----------------------------------------------------
-- Table `emprestimopf`.`precadastro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emprestimopf`.`precadastro` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(20) NULL,
  `nome_completo` VARCHAR(30) NULL,
  `email` VARCHAR(50) NULL,
  `celular` VARCHAR(20) NULL,
  `status` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emprestimopf`.`login`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emprestimopf`.`login` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(20) NULL,
  `email` VARCHAR(50) NULL,
  `password` VARCHAR(45) NULL,
  `permissao` VARCHAR(200) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emprestimopf`.`cadastropf`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emprestimopf`.`cadastropf` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(20) NULL,
  `nome` VARCHAR(30) NULL,
  `email` VARCHAR(50) NULL,
  `dt_nasc` DATE NULL,
  `nat_ocup` VARCHAR(45) NULL,
  `sexo` VARCHAR(1) NULL,
  `nacionalidade` VARCHAR(45) NULL,
  `cidade` VARCHAR(45) NULL,
  `uf_nasc` VARCHAR(2) NULL,
  `tp_doc` VARCHAR(45) NULL,
  `nr_doc` VARCHAR(45) NULL,
  `emissor` VARCHAR(45) NULL,
  `nome_mae` VARCHAR(60) NULL,
  `grau_instr` VARCHAR(45) NULL,
  `nome_conj` VARCHAR(45) NULL,
  `cpf_conj` VARCHAR(20) NULL,
  `dt_nasc_conj` DATE NULL,
  `sexo_conj` VARCHAR(1) NULL,
  `cep_res` VARCHAR(8) NULL,
  `end_res` VARCHAR(45) NULL,
  `num_res` VARCHAR(6) NULL,
  `compl_res` VARCHAR(20) NULL,
  `bairro_res` VARCHAR(45) NULL,
  `cidade_res` VARCHAR(45) NULL,
  `uf_res` VARCHAR(2) NULL,
  `tipo_res` VARCHAR(45) NULL,
  `tel_fixo` VARCHAR(20) NULL,
  `tel_cel` VARCHAR(20) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emprestimopf`.`infcomercial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emprestimopf`.`infcomercial` (
  `id` INT NOT NULL,
  `cpf` VARCHAR(20) NULL,
  `cargo` VARCHAR(45) NULL,
  `profissao` VARCHAR(45) NULL,
  `renda_bruta_mensal` DECIMAL(15,2) NULL,
  `tipo_compra_renda` VARCHAR(45) NULL,
  `nome_empresa` VARCHAR(45) NULL,
  `dt_admissao` DATE NULL,
  `cep_com` VARCHAR(8) NULL,
  `end_com` VARCHAR(45) NULL,
  `num_com` VARCHAR(6) NULL,
  `compl_com` VARCHAR(20) NULL,
  `bairro_com` VARCHAR(45) NULL,
  `cidade_com` VARCHAR(45) NULL,
  `uf_res` VARCHAR(2) NULL,
  `tel_com` VARCHAR(20) NULL,
  `ramal` VARCHAR(10) NULL,
  `pessoa_publica_exp` VARCHAR(200) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emprestimopf`.`referencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emprestimopf`.`referencia` (
  `id` INT NOT NULL,
  `cpf` VARCHAR(20) NULL,
  `grau_relacionaento` VARCHAR(45) NULL,
  `telefone` VARCHAR(20) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emprestimopf`.`pagina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emprestimopf`.`pagina` (
  `id` INT NOT NULL,
  `tipo` VARCHAR(45) NULL,
  `descricao` VARCHAR(45) NULL,
  `posicao` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = '				';


-- -----------------------------------------------------
-- Table `emprestimopf`.`solicitacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emprestimopf`.`solicitacao` (
  `id` INT NOT NULL,
  `cpf` VARCHAR(20) NULL,
  `banco` VARCHAR(45) NULL,
  `valor_total` DECIMAL(15,2) NULL,
  `data` DATE NULL,
  `parcela` INT NULL,
  `valor` DECIMAL(15,2) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emprestimopf`.`pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emprestimopf`.`pedido` (
  `id` INT NOT NULL,
  `nr_pedido` VARCHAR(45) NULL,
  `nro_proc_banco` VARCHAR(45) NULL,
  `data_inicial` DATE NULL,
  `banco` VARCHAR(45) NULL,
  `montante` DECIMAL(15,2) NULL,
  `juros` DECIMAL(15,2) NULL,
  `prazo` VARCHAR(45) NULL,
  `vencimento` DATE NULL,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emprestimopf`.`comissao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emprestimopf`.`comissao` (
  `id` INT NOT NULL,
  `nr_pedido` VARCHAR(45) NULL,
  `banco` VARCHAR(45) NULL,
  `data` DATE NULL,
  `parcela` VARCHAR(45) NULL,
  `valor` DECIMAL(15,2) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emprestimopf`.`conta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emprestimopf`.`conta` (
  `id` INT NOT NULL,
  `nr_pedido` VARCHAR(45) NULL,
  `cpf` VARCHAR(20) NULL,
  `banco` VARCHAR(45) NULL,
  `agencia` VARCHAR(45) NULL,
  `dig_ag` VARCHAR(1) NULL,
  `conta` VARCHAR(45) NULL,
  `dig_agencia` VARCHAR(1) NULL,
  `tipo` VARCHAR(45) NULL,
  `conta_desde` DATE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emprestimopf`.`processo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emprestimopf`.`processo` (
  `id` INT NOT NULL,
  `banco` VARCHAR(45) NULL,
  `comissao_princ` DECIMAL(10,4) NULL,
  `comissao_parc` DECIMAL(10,4) NULL,
  `processo_seq` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emprestimopf`.`aviso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emprestimopf`.`aviso` (
  `id` INT NOT NULL,
  `status_ped` VARCHAR(45) NULL,
  `tipo` VARCHAR(45) NULL,
  `mensagem` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emprestimopf`.`documento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emprestimopf`.`documento` (
  `id` INT NOT NULL,
  `tipo` VARCHAR(45) NULL,
  `data` DATE NULL,
  `status_doc` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emprestimopf`.`logs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emprestimopf`.`logs` (
  `id` INT NOT NULL,
  `created` TIMESTAMP NULL,
  `id_user` INT NULL,
  `id_precadastro` INT NULL,
  `id_infcomercial` INT NULL,
  `id_cadastro` INT NULL,
  `id_solicitacao` INT NULL,
  `id_pedido` INT NULL,
  `id_referencia` INT NULL,
  `id_comissao` INT NULL,
  `id_conta` INT NULL,
  `id_processo` INT NULL,
  `id_aviso` INT NULL,
  `id_documento` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

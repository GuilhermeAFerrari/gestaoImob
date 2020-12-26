-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 26-Dez-2020 às 04:10
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `imob`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_centrocusto`
--

DROP TABLE IF EXISTS `tb_centrocusto`;
CREATE TABLE IF NOT EXISTS `tb_centrocusto` (
  `id_centroCusto` int(11) NOT NULL AUTO_INCREMENT,
  `ds_classe` varchar(50) NOT NULL,
  `ds_descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`id_centroCusto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_contabancaria`
--

DROP TABLE IF EXISTS `tb_contabancaria`;
CREATE TABLE IF NOT EXISTS `tb_contabancaria` (
  `id_conta` int(11) NOT NULL AUTO_INCREMENT,
  `nm_conta` varchar(100) NOT NULL,
  `nr_agencia` varchar(15) NOT NULL,
  `nr_conta` varchar(30) NOT NULL,
  `ds_observacao` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_conta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_contacts`
--

DROP TABLE IF EXISTS `tb_contacts`;
CREATE TABLE IF NOT EXISTS `tb_contacts` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `nm_contact` varchar(50) NOT NULL,
  `nr1_contact` varchar(20) NOT NULL,
  `nr2_contact` varchar(20) DEFAULT NULL,
  `ds_email` varchar(30) DEFAULT NULL,
  `ds_endereco` varchar(50) DEFAULT NULL,
  `nr_endereco` varchar(5) DEFAULT NULL,
  `ds_bairro` varchar(20) DEFAULT NULL,
  `nm_cidade` varchar(20) DEFAULT NULL,
  `nm_uf` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_contaspagar`
--

DROP TABLE IF EXISTS `tb_contaspagar`;
CREATE TABLE IF NOT EXISTS `tb_contaspagar` (
  `id_contaPagar` int(11) NOT NULL AUTO_INCREMENT,
  `nm_responsavel` varchar(100) DEFAULT NULL,
  `ds_pagamento` varchar(200) DEFAULT NULL,
  `ds_centroCusto` varchar(50) DEFAULT NULL,
  `dt_vencimento` date DEFAULT NULL,
  `ds_formaPagamento` varchar(50) DEFAULT NULL,
  `ds_contaBancaria` varchar(50) DEFAULT NULL,
  `nr_valorBruto` decimal(10,2) DEFAULT NULL,
  `nr_juros` varchar(20) DEFAULT NULL,
  `nr_desconto` varchar(20) DEFAULT NULL,
  `ds_quitado` char(3) DEFAULT NULL,
  `dt_registro` date DEFAULT NULL,
  `ds_observacao` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_contaPagar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_contasreceber`
--

DROP TABLE IF EXISTS `tb_contasreceber`;
CREATE TABLE IF NOT EXISTS `tb_contasreceber` (
  `id_contaReceber` int(11) NOT NULL AUTO_INCREMENT,
  `nm_responsavel` varchar(100) DEFAULT NULL,
  `ds_recebimento` varchar(200) DEFAULT NULL,
  `ds_centroCusto` varchar(50) DEFAULT NULL,
  `dt_vencimento` date DEFAULT NULL,
  `ds_formaPagamento` varchar(50) DEFAULT NULL,
  `ds_contaBancaria` varchar(50) DEFAULT NULL,
  `nr_valorBruto` decimal(10,2) DEFAULT NULL,
  `nr_juros` decimal(10,2) DEFAULT NULL,
  `nr_desconto` decimal(10,2) DEFAULT NULL,
  `ds_quitado` varchar(20) DEFAULT NULL,
  `ds_observacao` varchar(200) DEFAULT NULL,
  `dt_registro` date DEFAULT NULL,
  PRIMARY KEY (`id_contaReceber`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_contratos`
--

DROP TABLE IF EXISTS `tb_contratos`;
CREATE TABLE IF NOT EXISTS `tb_contratos` (
  `id_contrato` int(11) NOT NULL AUTO_INCREMENT,
  `tp_contrato` varchar(20) NOT NULL,
  `nm_inquilino` varchar(100) DEFAULT NULL,
  `nm_proprietario` varchar(100) DEFAULT NULL,
  `nm_fiador` varchar(100) DEFAULT NULL,
  `ds_imovel` varchar(400) DEFAULT NULL,
  `dt_contrato` date NOT NULL,
  `nm_vendedor` varchar(100) DEFAULT NULL,
  `st_contrato` varchar(15) NOT NULL,
  `nr_valor` decimal(10,0) DEFAULT NULL,
  `dt_vencimento` date DEFAULT NULL,
  `ds_observacao` varchar(800) DEFAULT NULL,
  PRIMARY KEY (`id_contrato`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_empresa`
--

DROP TABLE IF EXISTS `tb_empresa`;
CREATE TABLE IF NOT EXISTS `tb_empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nm_fantasia` varchar(50) NOT NULL,
  `nm_razaoSocial` varchar(80) DEFAULT NULL,
  `ds_cnpj` varchar(25) DEFAULT NULL,
  `ds_inscricaoEstadual` varchar(30) DEFAULT NULL,
  `ds_inscricaoMunicipal` varchar(30) DEFAULT NULL,
  `ds_email` varchar(30) DEFAULT NULL,
  `nr_telefone` varchar(30) DEFAULT NULL,
  `nm_site` varchar(30) DEFAULT NULL,
  `nm_rua` varchar(30) DEFAULT NULL,
  `nr_numero` varchar(5) DEFAULT NULL,
  `nm_bairro` varchar(30) DEFAULT NULL,
  `nm_cidade` varchar(30) DEFAULT NULL,
  `ds_uf` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_imoveis`
--

DROP TABLE IF EXISTS `tb_imoveis`;
CREATE TABLE IF NOT EXISTS `tb_imoveis` (
  `id_imovel` int(11) NOT NULL AUTO_INCREMENT,
  `nm_responsavel` varchar(100) NOT NULL,
  `nm_endereco` varchar(100) DEFAULT NULL,
  `nm_bairro` varchar(100) DEFAULT NULL,
  `nm_cidade` varchar(100) DEFAULT NULL,
  `ds_uf` char(2) DEFAULT NULL,
  `ds_cep` varchar(20) DEFAULT NULL,
  `tp_imovel` varchar(20) DEFAULT NULL,
  `nr_dormitorios` varchar(4) DEFAULT NULL,
  `nr_areaConstruida` decimal(10,2) DEFAULT NULL,
  `nr_areaTotal` decimal(10,2) DEFAULT NULL,
  `tp_negocio` varchar(30) DEFAULT NULL,
  `nr_valor` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_imovel`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_notas`
--

DROP TABLE IF EXISTS `tb_notas`;
CREATE TABLE IF NOT EXISTS `tb_notas` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `ds_nota` varchar(300) NOT NULL,
  `nm_responsavel` varchar(30) NOT NULL,
  `tp_nota` varchar(10) NOT NULL,
  PRIMARY KEY (`id_nota`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pessoas`
--

DROP TABLE IF EXISTS `tb_pessoas`;
CREATE TABLE IF NOT EXISTS `tb_pessoas` (
  `id_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `st_pessoa` varchar(10) NOT NULL,
  `nm_pessoa` varchar(100) NOT NULL,
  `ds_email` varchar(30) DEFAULT NULL,
  `nr_telefone1` varchar(15) DEFAULT NULL,
  `nr_telefone2` varchar(15) DEFAULT NULL,
  `nm_rua` varchar(30) DEFAULT NULL,
  `nm_bairro` varchar(30) DEFAULT NULL,
  `nm_cidade` varchar(20) DEFAULT NULL,
  `nm_uf` char(2) DEFAULT NULL,
  `ds_cep` varchar(15) DEFAULT NULL,
  `ds_complemento` varchar(50) DEFAULT NULL,
  `nr_numero` varchar(5) DEFAULT NULL,
  `tp_pessoa` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pessoa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE IF NOT EXISTS `tb_users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nm_user` varchar(50) NOT NULL,
  `ds_login` varchar(20) NOT NULL,
  `ds_password` varchar(100) NOT NULL,
  `tp_user` varchar(15) NOT NULL,
  `st_user` varchar(10) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nm_user`, `ds_login`, `ds_password`, `tp_user`, `st_user`) VALUES
(1, 'Administrador', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrador', 'Ativo');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

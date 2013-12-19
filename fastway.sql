CREATE TABLE produto (
  id_produto INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  codigo_personalizado INTEGER UNSIGNED NULL,
  unidade_tributada VARCHAR(50) NULL,
  margem_de_lucro INTEGER UNSIGNED NULL,
  preco_custo DOUBLE NULL,
  preco_venda DOUBLE NULL,
  codigo_barras VARCHAR(100) NULL,
  ncm VARCHAR(50) NULL,
  execao_ipi VARCHAR(50) NULL,
  estoque_minimo INTEGER UNSIGNED NULL,
  descricao VARCHAR(200) NULL,
  quantidade INTEGER UNSIGNED NULL,
  PRIMARY KEY(id_produto)
);

CREATE TABLE estado (
  id_estado INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(50) NULL,
  sigla VARCHAR(2) NULL,
  PRIMARY KEY(id_estado)
);

CREATE TABLE tipo_funcionario (
  id_tipo_funcionario INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tipo VARCHAR(100) NULL,
  PRIMARY KEY(id_tipo_funcionario)
);

CREATE TABLE cliente (
  id_cliente INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  estado_id_estado INTEGER UNSIGNED NOT NULL,
  nome VARCHAR(100) NULL,
  cpf INTEGER UNSIGNED NULL,
  endereco VARCHAR(200) NULL,
  telefone INT NULL,
  email VARCHAR(100) NULL,
  data_nascimento DATE NULL,
  cidade VARCHAR(100) NULL,
  PRIMARY KEY(id_cliente),
  INDEX cliente_FKIndex1(estado_id_estado)
);

CREATE TABLE fornecedor (
  id_fornecedor INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  estado_id_estado INTEGER UNSIGNED NOT NULL,
  nome_fantasia VARCHAR(100) NULL,
  cnpj VARCHAR(14) NULL,
  razao_social VARCHAR(200) NULL,
  inscricao_estadual VARCHAR(50) NULL,
  email VARCHAR(200) NULL,
  endereco VARCHAR(200) NULL,
  telefone VARCHAR(20) NULL,
  celular VARCHAR(20) NULL,
  cidade VARCHAR(50) NULL,
  representante VARCHAR(100) NULL,
  PRIMARY KEY(id_fornecedor),
  INDEX fornecedor_FKIndex1(estado_id_estado)
);

CREATE TABLE funcionario (
  id_funcionario INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  estado_id_estado INTEGER UNSIGNED NOT NULL,
  tipo_funcionario_id_tipo_funcionario INTEGER UNSIGNED NOT NULL,
  nome_funcionario VARCHAR(100) NULL,
  login VARCHAR(50) NULL,
  senha VARCHAR(50) NULL,
  cpf VARCHAR(11) NULL,
  rg VARCHAR(20) NULL,
  orgao VARCHAR(20) NULL,
  data_expedicao DATE NULL,
  data_nascimento DATE NULL,
  telefone VARCHAR(20) NULL,
  celular VARCHAR(20) NULL,
  endereco VARCHAR(200) NULL,
  tipo_contrato VARCHAR(50) NULL,
  data_admissao DATE NULL,
  salario DOUBLE NULL,
  email VARCHAR(200) NULL,
  banco VARCHAR(20) NULL,
  agencia VARCHAR(20) NULL,
  conta VARCHAR(20) NULL,
  cidade VARCHAR(50) NULL,
  uf_orgao VARCHAR(20) NULL,
  PRIMARY KEY(id_funcionario),
  INDEX funcionario_FKIndex1(tipo_funcionario_id_tipo_funcionario),
  INDEX funcionario_FKIndex2(estado_id_estado)
);

CREATE TABLE venda (
  id_venda INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  funcionario_id_funcionario INTEGER UNSIGNED NOT NULL,
  data_venda DATE NULL,
  data_entrega DATE NULL,
  valor_total DOUBLE NULL,
  PRIMARY KEY(id_venda),
  INDEX venda_FKIndex1(funcionario_id_funcionario)
);

CREATE TABLE produto_venda (
  produto_id_produto INTEGER UNSIGNED NOT NULL,
  venda_id_venda INTEGER UNSIGNED NOT NULL,
  codigo INTEGER UNSIGNED NULL,
  descricao VARCHAR(100) NULL,
  preco_unitario DOUBLE NULL,
  quantidade INTEGER UNSIGNED NULL,
  valor_total DOUBLE NULL,
  PRIMARY KEY(produto_id_produto, venda_id_venda),
  INDEX produto_venda_FKIndex1(produto_id_produto),
  INDEX produto_venda_FKIndex2(venda_id_venda)
);



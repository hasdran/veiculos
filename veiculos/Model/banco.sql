
-- ESTE ARQUIVO CONTEM AS TABELAS DO BANCO DE DADOS 
-- A CONEXAO COM O BANCO DE DADOS ENCONTRA-SE NO ARQUIVO ConexaoBD.PHP

CREATE DATABASE veiculosbd;     

CREATE TABLE `veiculosbd`.`Veiculo` (   
    `idVeiculo` INT NOT NULL AUTO_INCREMENT , 
    `placa` VARCHAR(10) NOT NULL ,
    `numChassi` VARCHAR(20) NOT NULL , 
    `cor` VARCHAR(20) NOT NULL , 
    `ano` VARCHAR(10) NOT NULL , 
    `marca` VARCHAR(20) NOT NULL , 
    `modelo` VARCHAR(20) NOT NULL , 
    `pesoMaximo` INT NOT NULL , 
    `preco` FLOAT NOT NULL , 
    `numRodas` INT NOT NULL , 
    PRIMARY KEY (`idVeiculo`)
) ENGINE = InnoDB;

CREATE TABLE `veiculosbd`.`Carro` ( 
    `idCarro` INT NOT NULL AUTO_INCREMENT , 
    `idVeiculo` INT NOT NULL , 
    `qtdPassageiros` INT NOT NULL , 
    `numPortas` INT NOT NULL , 
    PRIMARY KEY (`idCarro`),
    CONSTRAINT fk_VeiculoCarro FOREIGN KEY (idVeiculo) REFERENCES Veiculo (idVeiculo)
) ENGINE = InnoDB;

CREATE TABLE `veiculosbd`.`Onibus` ( 
    `idOnibus` INT NOT NULL AUTO_INCREMENT , 
    `idVeiculo` INT NOT NULL , 
    `qtdPassageiro` INT NOT NULL , 
    `quantidadeEixo` INT NOT NULL , 
    PRIMARY KEY (`idOnibus`),
    CONSTRAINT fk_VeiculoOnibus FOREIGN KEY (idVeiculo) REFERENCES Veiculo (idVeiculo)
) ENGINE = InnoDB;

CREATE TABLE `veiculosbd`.`Caminhao` ( 
    `idCaminhao` INT NOT NULL AUTO_INCREMENT , 
    `idVeiculo` INT NOT NULL , 
    `pesoMaximo` INT NOT NULL , 
    `quantidadeEixo` INT NOT NULL , 
    PRIMARY KEY (`idCaminhao`),
    CONSTRAINT fk_VeiculoCaminhao FOREIGN KEY (idVeiculo) REFERENCES Veiculo (idVeiculo)
) ENGINE = InnoDB;


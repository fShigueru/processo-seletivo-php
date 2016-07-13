CREATE TABLE `psp_ph2`.`produto` (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(50) NOT NULL,
descricao TEXT NOT NULL,
preco decimal(6,2)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

insert into psp_ph2.produto (nome,descricao,preco) value ('Teste nome','Teste desc',5.00);
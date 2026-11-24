create database lanchonete2026;

use lanchonete2026;



create table if not exists ingredientes (
cd_ingredientes int not null primary key auto_increment, 
nome varchar (50), 
preco decimal (10, 2)
);

create table if not exists item (
cd_item int not null primary key auto_increment, 
nome varchar (100), 
ds_tipo text,
preco decimal (10,2)
); 


create table if not exists pedido (
cd_pedido int not null primary key auto_increment, 
preco_total decimal (10, 2), 
quantidade int
 );
 
 
create table if not exists ordem(
cd_ordem int primary key auto_increment, 
cd_ingredientes int,
cd_item int, 
cd_pedido int,
FOREIGN KEY (cd_ingredientes) REFERENCES ingredientes(cd_ingredientes),
foreign key(cd_item) references item(cd_item),
foreign key(cd_pedido) references pedido(cd_pedido)
);


ALTER TABLE ordem ADD COLUMN quantidade INT DEFAULT 1;
 
 insert into  ingredientes(cd_ingredientes, nome, preco) values
 (1,'Bacon', 2.50), 
 (2, 'Queijo', 1.00), 
 (3, 'Cebolas', 1.50), 
 (4, 'Queijo Prato', 2.50),
 (5, 'Molho Verde', 0.50), 
 (6, 'Ketchup', 0.50),
 (7, 'Mostarda', 0.50), 
 (8, 'Maionese', 0.50), 
 (9, 'Alho', 0.75), 
 (10, 'Molho de Pimenta', 1.50), 
 (11, 'Gergilhim', 0.50), 
 (12, 'Cauda de Morango', 1.00), 
 (13, 'Cauda de Chocolate', 1.00), 
 (14, 'Cauda de Caramelo', 1.00), 
 (15, 'Amendoim', 0.50);
 
 
insert into item(cd_item, nome, ds_tipo, preco) values 
(1, 'Hambúrguer de Carne', 'Hambúrguer', 27.50),
(2, 'Hambúrguer com Bacon', 'Hambúrguer', 32.50),
(3, 'Hambúrguer de Frango', 'Hambúrguer', 27.50),
(4, 'Hambúrguer de Peixe', 'Hambúrguer', 26.25),
(5, 'Hambúrguer Double Cheese', 'Hambúrguer', 25.50),
(6, 'Hambúrguer Vegano', 'Hambúrguer', 24.75),
(7, 'Quarteirão', 'Hambúrguer', 36.60), 
(8, 'Casquinha', 'Sobremesa', 3.00),
(9, 'Sundae', 'Sobremesa', 6.00),
(10, 'Batata Frita', 'Acompanhamento', 7.00),
(11, 'Nuggets', 'Acompanhamento', 5.00), 
(12, 'Refrigerante', 'Bedida', 12.50), 
(13, 'Suco', 'Bedida', 15.75), 
(14, 'Água', 'Bedida', 4.00), 
(15, 'Combo de Quarteirão, Fritas e Refri', 'Combo', 55.75),
(16, 'Combo de Double Cheese, Fritas e Refri', 'Combo', 40.35),
(17, 'Combo Full Meal', 'Combo', 40.35);

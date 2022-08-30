-- create database sistemaDb;
 -- use sistemaDb;
-- estrutura da Tabela de produtos
create table tbprodutos(
id_produto int(11) not null,
id_tipo_produto int not null,
descri_produto varchar(100) not null,
resumo_produto varchar(1000) default null,
valor_produto decimal(10,2) default null,
imagem_produto varchar(50) default null, -- caminho da imagem
destaque_produto enum('Sim','Não') not null
)engine=InnoDB default charset=utf8;

-- Extraindo dados da tabela `tbprodutos`
INSERT INTO `tbprodutos` (`id_produto`, `id_tipo_produto`, `descri_produto`, `resumo_produto`, `valor_produto`, `imagem_produto`, `destaque_produto`) VALUES
(1, 1, 'Picanha ao alho', ' Esta e a combinação do sabor inconfundível da picanha com o aroma acentuado do alho. Condimento que casa perfeitamente com este corte nobre', '29.90', 'picanha_alho.jpg', 'Sim'),
(2, 1, 'Fraldinha', 'Uma das carnes mais suculentas do cardápio. Requintada, com maciez particular e pouca gordura, e uma carne que chama atenção pela sua textura', '29.90', 'fraldinha.jpg', 'Não'),
(3, 1, 'Costela', 'A mais procurada! Feita na churrasqueira ou ao fogo de chão, e preparada por mais de 08 horas para atingir o ponto ideal e torna-la a referência de nossa churrascaria', '29.90', 'costelona.jpg', 'Sim'),
(4, 1, 'Cupim', 'Uma referência especial dos paulistas. Bastante gordurosa e macia, o cupim e uma carne fibrosa, que se desfia quando bem preparada ', '29.90', 'cupim.jpg', 'Sim'),
(5, 1, 'Picanha ', 'Considerada por muitos como a mais nobre e procurada carne de churrasco, a picanha pode ser servida ao ponto , mal passada ou bem passada. Suculenta e com sua característica capa de gordura', '29.90', 'picanha_sem.jpg', 'Não'),
(6, 1, 'Apfelstrudel', 'Sobremesa tradicional austro-germânica e um delicioso folhado de maça e canela com sorvete', '29.90', 'strudel.jpg', 'Não'),
(7, 1, 'Alcatra', 'Carne com muitas fibras, porém macia. Sua lateral apresenta uma boa parcela de gordura. Equilibrando de forma harmônica maciez e fibras.', '29.90', 'alcatra_pedra.jpg', 'Não'),
(8, 1, 'Maminha', 'Vem da parte inferior da Alcatra. E uma carne com fibras, porém macia e saborosa.', '29.90', 'maminha.jpg', 'Não'),
(9, 2, 'Abacaxiiiiiiii', 'Abacaxi assado com canela ao creme de leite condensado ', '29.90', 'abacaxi.jpg', 'Não');

-- estrutura da tabela tbtipos
create table tbtipos(
id_tipo int(11) not null,
sigla_tipo varchar(3) not null,
rotulo_tipo varchar(15) not null 
)engine=InnoDB default charset=utf8;

-- Extraindo dados da tabela `tbtipos`
INSERT INTO `tbtipos` (`id_tipo`, `sigla_tipo`, `rotulo_tipo`) VALUES
(1, 'chu', 'Churrasco'),
(2, 'sob', 'Sobremesa');

INSERT INTO `tbtipos` (`id_tipo`, `sigla_tipo`, `rotulo_tipo`) VALUES
(3, 'beb', 'Bebidas');




-- Estrutura da tabela tbusarios
create table tbusuarios(
id_usuario int(11) primary key auto_increment  not null,
login_usuario varchar(30) not null unique,
senha_usuario varchar(8) not null,
id_nivel_usuario int(11) not null
)engine=InnoDB default charset=utf8;

INSERT INTO `tbusuarios` (`id_usuario`, `login_usuario`, `senha_usuario`, `id_nivel_usuario`) VALUES
(1, 'senac', '1234', 1),
(2, 'joao', '4568', 2),
(3, 'maria', '7894', 3),
(4, 'well', '1234', 1),
(5, 'vini', '111', 1);


create table tbnivel(
id_nivel int(11) primary key auto_increment not null,
nome_nivel varchar(20) not null
)engine=InnoDB default charset=utf8;

insert into tbnivel (id_nivel, nome_nivel) 
values (1,'Supervisor'),(2,'Comercial'),(3,'Cliente');


-- Reserva
create table tbreserva(
id_reserva int(11) not null,
id_tipo_reserva int not null,
nome_nivel  varchar(20) not null,
data_reserva date not null,
hora_reserva time not null,
numero_mesa_reserva int (11) not null,
numero_pessoas_reserva int (11) not null,
login_reserva varchar(30) not null unique,
email_reserva varchar(30) not null,
cpf_reserva varchar(11) not null,
senha_reserva varchar(8) not null,
tipo_reserva enum('aniversario','confraternizacao','casamento','outros') not null
)engine=InnoDB default charset=utf8;

INSERT INTO `tbreserva` (`id_reserva`,`id_tipo_reserva`,`nome_nivel`,`data_reserva`,`hora_reserva`,`numero_mesa_reserva`,`numero_pessoas_reserva`, `login_reserva`, `email_reserva`, `cpf_reserva`,`senha_reserva`,`tipo_reserva`) VALUES
(1, '01','cliente','2022-09-10','19:00:00','3','8','josue', 'josue@hotmail.com', '52659874521','1212','outros'),
(3, '03','cliente','2022-09-11','19:00:00','2','6','vini', 'vini@vini.com', '11111111111','1313','outros'),
(2, '02','cliente','2022-09-12','19:00:00','1','3','bili', 'bili@gmail.com', '15987536547','3232','casamento');



-- índices da tabela tbprodutos
alter table tbprodutos
add primary key(id_produto),
add key id_tipo_produto_fk (id_tipo_produto);

-- índices da tabela tbtipos
alter table tbtipos
add primary key(id_tipo); 

-- índices da tabela tbusuarios
alter table tbusuarios
add primary key (id_usuario);

-- auto incremento da tbprodutos
alter table tbprodutos
modify id_produto int(11) not null auto_increment, auto_increment=10;

-- auto incremento da tbtipos
alter table tbtipos
modify id_tipo int(11) not null auto_increment, auto_increment=3;

-- auto incremento da tbusuarios
alter table tbusuarios
modify id_usuario int(11) not null auto_increment, auto_increment=5;

-- restrição (constraint) da tabela tbusuario
alter table tbusuarios
add constraint id_nivel_usuario_fk foreign key (id_nivel_usuario)
references tbnivel (id_nivel) on delete no action  on update no action;


-- Restrição (constraint) da tabela tbprodutos
alter table tbprodutos
add constraint id_tipo_produto_fk foreign key (id_tipo_produto)
references tbtipos (id_tipo) on delete no action on update no action;

create view vw_tbprodutos as
select 
p.id_produto,
      p.id_tipo_produto,
      t.sigla_tipo,
      t.rotulo_tipo,
      p.descri_produto,
      p.resumo_produto,
      p.valor_produto, 
      p.imagem_produto, 
      p.destaque_produto
      
      
from tbprodutos p 
join tbtipos t 
where p.id_tipo_produto = t.id_tipo;
update tbprodutos set deletado = null where id_produto between 1 and 9;

select * from  vw_tbprodutos;
select * from tbtipos order by rotulo_tipo;

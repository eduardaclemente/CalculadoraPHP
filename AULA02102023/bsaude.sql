create table if not exists paciente (
	id_pac int(4) auto_increment not null primary key,
	nome varchar(25) not null);

create table if not exists medico (
	crm char(6) not null primary key,
	nome varchar(25) not null,
	especialidade varchar(15) not null);

create table if not exists consulta (
	id_consulta int(6) auto_increment not null primary key,
	data datetime not null,
	id_pac int(4) not null,
	crm char(6) not null,
	carteira varchar(12) not null,
	foreign key (crm) references medico(crm),
	foreign key (id_pac) references paciente(id_pac),
	unique key (data, crm));

insert into paciente (nome) values ('Latussa Natividade');
insert into paciente (nome) values ('Guigliermo Vilas');
insert into paciente (nome) values ('Diorone Nolasco');
insert into paciente (nome) values ('Elvispresley Barreira');
insert into paciente (nome) values ('Cristhaldo Paranhos');
insert into paciente (nome) values ('Dhesiani Schultz');
insert into paciente (nome) values ('Julesio Calisto');
insert into paciente (nome) values ('Leotrice Paranhos');
insert into paciente (nome) values ('Inizele Filgueira');
insert into paciente (nome) values ('Loraidy do Amparo');

insert into medico (crm, nome, especialidade) values ('123456', 'Adinire Schultz', 'Cardiologia');
insert into medico (crm, nome, especialidade) values ('123457', 'Rafelly Avelino', 'Plástica');
insert into medico (crm, nome, especialidade) values ('123458', 'Esthfanny Avelino', 'Nutrologia');
insert into medico (crm, nome, especialidade) values ('123459', 'Calibson Belchior', 'Dermatologia');
insert into medico (crm, nome, especialidade) values ('123460', 'Lindeglaciene LeBlanc', 'Mastologia');
insert into medico (crm, nome, especialidade) values ('123461', 'Leliciene Belchior', 'Hematologia');
insert into medico (crm, nome, especialidade) values ('123462', 'Jasminder Watanabe', 'Oncologia');
insert into medico (crm, nome, especialidade) values ('123463', 'Sanddyna LeBlanc', 'Fisiatria');

insert into consulta (data, id_pac, crm, carteira) values (str_to_date('2023-10-9 8:00','%Y-%m-%d %H:%i'), 3, 123462, 'Particular');
insert into consulta (data, id_pac, crm, carteira) values (str_to_date('2023-10-9 8:20','%Y-%m-%d %H:%i'), 6, 123463, 'Plano');
insert into consulta (data, id_pac, crm, carteira) values (str_to_date('2023-10-11 8:00','%Y-%m-%d %H:%i'), 1, 123462, 'Convênio');
insert into consulta (data, id_pac, crm, carteira) values (str_to_date('2023-10-11 14:00','%Y-%m-%d %H:%i'), 1, 123458, 'Particular');
insert into consulta (data, id_pac, crm, carteira) values (str_to_date('2023-10-13 9:00','%Y-%m-%d %H:%i'), 4, 123462, 'Convênio');
insert into consulta (data, id_pac, crm, carteira) values (str_to_date('2023-10-13 9:20','%Y-%m-%d %H:%i'), 8, 123463, 'Plano');
insert into consulta (data, id_pac, crm, carteira) values (str_to_date('2023-10-13 9:20','%Y-%m-%d %H:%i'), 9, 123461, 'Particular');
insert into consulta (data, id_pac, crm, carteira) values (str_to_date('2023-10-13 9:40','%Y-%m-%d %H:%i'), 10, 123463, 'Plano');
insert into consulta (data, id_pac, crm, carteira) values (str_to_date('2023-10-16 14:00','%Y-%m-%d %H:%i'), 5, 123456, 'Particular');
insert into consulta (data, id_pac, crm, carteira) values (str_to_date('2023-10-16 14:20','%Y-%m-%d %H:%i'), 7, 123457, 'Particular');
insert into consulta (data, id_pac, crm, carteira) values (str_to_date('2023-10-17 14:40','%Y-%m-%d %H:%i'), 2, 123459, 'Convênio');
insert into consulta (data, id_pac, crm, carteira) values (str_to_date('2023-10-17 14:40','%Y-%m-%d %H:%i'), 3, 123458, 'Particular');
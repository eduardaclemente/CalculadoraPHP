create database boasaude;

use boasaude;

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

create view vProxConsultas as 
	select id_consulta, date_format(data, "%e/%c/%Y") as data_c, 
	 date_format(data, "%k:%i") as hora, paciente.nome as paciente, 
	 medico.nome as medico, carteira, timestampdiff(HOUR, curtime(), data) as dif 
	 from consulta inner join paciente on consulta.id_pac = paciente.id_pac 
	 inner join medico on consulta.crm = medico.crm 
	 where data > now() 
	 order by data, medico;	 

create view vPacientesPorNome as
 select * from paciente order by nome;

create view vMedicosPorNome as 
 select * from medico order by nome;

create view vCarteiras as 
 select distinct carteira from consulta order by carteira; 

delimiter $$

create procedure spConsultaPorId (IN id INT(6))
	begin
  select paciente.nome as paciente, medico.nome as medico 
   from consulta inner join paciente on consulta.id_pac = paciente.id_pac 
   inner join medico on consulta.crm = medico.crm where id_consulta = id;	 
	end $$

create procedure spIncluiPaciente (IN pac varchar(25), OUT id INT(4))
	begin
	 insert into paciente (nome) values (pac);
	 select id_pac from paciente where nome = pac;
	end $$

create procedure spIncluiMedico (IN crm char(6), IN nome varchar(25), IN especialidade varchar(15))
	begin
	 insert into medico (crm, nome, especialidade) values (crm, nome, especialidade);
	end $$

create procedure spIncluiConsulta (IN data varchar(20), IN paciente int(4), 
	IN medico char(6), IN carteira varchar(12))
 begin
  insert into consulta (data, id_pac, crm, carteira) 
  	values (str_to_date(data,'%Y-%m-%d %H:%i'), paciente, medico, carteira);
 end $$

create procedure spCancelaConsulta (IN id INT(6))
 begin
  delete from consulta where id_consulta = id;
 end $$ 

create procedure spAlteraConsulta (IN id INT(6), IN data_c varchar(20))
	begin
	 update consulta set data = str_to_date(data_c,'%Y-%m-%d %H:%i') where id_consulta = id;
	end $$

delimiter ; 

call spIncluiPaciente('Latussa Natividade', @id);
call spIncluiPaciente('Guigliermo Vilas', @id);
call spIncluiPaciente('Diorone Nolasco', @id);
call spIncluiPaciente('Elvispresley Barreira', @id);
call spIncluiPaciente('Cristhaldo Paranhos', @id);
call spIncluiPaciente('Dhesiani Schultz', @id);
call spIncluiPaciente('Julesio Calisto', @id);
call spIncluiPaciente('Leotrice Paranhos', @id);
call spIncluiPaciente('Inizele Filgueira', @id);
call spIncluiPaciente('Loraidy do Amparo', @id);

call spIncluiMedico('123456', 'Adinire Schultz', 'Cardiologia');
call spIncluiMedico('123457', 'Rafelly Avelino', 'Plástica');
call spIncluiMedico('123458', 'Esthfanny Avelino', 'Nutrologia');
call spIncluiMedico('123459', 'Calibson Belchior', 'Dermatologia');
call spIncluiMedico('123460', 'Lindeglaciene LeBlanc', 'Mastologia');
call spIncluiMedico('123461', 'Leliciene Belchior', 'Hematologia');
call spIncluiMedico('123462', 'Jasminder Watanabe', 'Oncologia');
call spIncluiMedico('123463', 'Sanddyna LeBlanc', 'Fisiatria');

call spIncluiConsulta('2023-10-9 10:30', 3, '123462', 'Particular');
call spIncluiConsulta('2023-10-16 8:20', 6, '123463', 'Plano');
call spIncluiConsulta('2023-10-17 8:00', 1, '123462', 'Convenio');
call spIncluiConsulta('2023-10-18 14:00', 1, '123458', 'Particular');
call spIncluiConsulta('2023-10-19 9:00', 4, '123462', 'Convenio');
call spIncluiConsulta('2023-10-20 9:20', 8, '123463', 'Plano');
call spIncluiConsulta('2023-10-22 9:20', 9, '123461', 'Particular');
call spIncluiConsulta('2023-10-23 9:40', 10, '123463', 'Plano');
call spIncluiConsulta('2023-10-24 14:00', 5, '123456', 'Particular');
call spIncluiConsulta('2023-10-26 14:20', 7, '123457', 'Particular');
call spIncluiConsulta('2023-10-28 14:40', 2, '123459', 'Convenio');
call spIncluiConsulta('2023-10-30 14:40', 3, '123458', 'Particular');
<!DOCTYPE html>
<html>
	<head>
		<title>Agendamento da Clínica Boa Saúde</title>
		<style>
			* {font-family: Verdana, sans-serif; background-color: #EDE5DF; color: #252525;}
			div {margin: 2px;}
			h1, h2 {text-align: center; background-color: #FFB486;}
			img {background-color: #FFB486;}
			table {border-collapse: collapse; margin: auto;}
			th {background-color: #82FA91; color: #EDE5DF;}
			th, td {padding: 5px;}
			table, th, td {border: 1px solid #82FA91;}
			#cab {clear: both; display: flex; background-color: #FFB486;}
			#logo {width: 20%; float: left;}
			#topo {width: 70%; float: left;}
			#logo, #topo {height: 90%; background-color: #FFB486;}
			#area {text-align: center; width: 95%;}
			#bot {margin-bottom: 10px;}
			#rodape {text-align: center; font-size: 60%; background-color: #FFB486;}
			#rodape p {background-color: #FFB486; padding: 3px; margin: 2px;}
			.botao {display: inline-block; padding: 10px 20px; font-size: 16px;
				font-weight: bold; text-align: center; text-decoration: none;
				background-color: #FFF06F; color: #252525; border-radius: 5px;
				border: 2px solid #FFB486;}
		</style>
	</head>
	<body>
		<div id="cont">
			<div id="cab">
				<div id="logo">
					<img src="logo.png">
				</div>
				<div id="topo">
					<h1>Clínica Boa Saúde</h1>
					<h2>Agendamento de consulta</h2>
				</div>
			</div>
			<div id="area">
				<h3>Agenda</h3>
				<table>
					<tr><th>Data</th><th>Horário</th><th>Paciente</th><th>Médico</th><th>Carteira</th><th></th></tr>
<?php
$sql = "select id_consulta, date_format(data, \"%e/%c/%Y\") as data_c, date_format(data, \"%k:%i\") as hora, paciente.nome as paciente, medico.nome as medico, carteira from consulta inner join paciente on consulta.id_pac=paciente.id_pac inner join medico on consulta.crm=medico.crm order by data, medico";
$con = mysqli_connect('localhost', 'root', '12345678', 'boasaude');
$dados = mysqli_query($con, $sql);
mysqli_close($con);
while ($linha = mysqli_fetch_assoc($dados)) {
	$dia = $linha["data_c"];
	$hora = $linha["hora"];
	$pac = $linha["paciente"];
	$med = $linha["medico"];
	$cart = $linha["carteira"];
 echo "<tr><td>$dia</td><td>$hora</td><td>$pac</td><td>$med</td><td>$cart</td><td></td></tr>";
}
?>
				</table>
				<p id="bot">
					<a href="controle.php?op=nova" class="botao">Novo agendamento</a>
				</p>
			</div>
			<div id="rodape">
				<p>Clínica Boa Saúde</p>
				<p>Travessa das Trapalhadas, 789</p>
				<p>Hospitápolis, Felicidade do Norte</p>
			</div>
		</div>
	</body>
</html>